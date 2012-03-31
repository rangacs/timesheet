<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Single click deploy mechanism, upload your project with ease!
 *
 * Written by Jeroen Schaftenaar
 *
 * Monday January 2th, 2012
 *
 */

class Transfer extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		// needed for some projects
		$this->config->set_item('compress_output', FALSE); 

		// basic setup
		$this->data = array();
		$this->data['local_dir'] = realpath('.').'/';
		$this->data['temp_dir'] = 'files/temp/';
		$this->data['remote_dir'] = '/home/user/domains/webroot/'; // the directory on the remote server
		$this->data['base_url'] = 'http://localhost/project_dir/index.php/transfer'; 
		$this->data['config'] = array();
		$this->data['config']['hostname'] = '';
		$this->data['config']['username'] = '';
		$this->data['config']['password'] = '';
		$this->data['config']['port']     = 21;
		$this->data['config']['passive']  = FALSE;

		// if this is set to yes it will keep retrying the to upload in case an error occurs.
		// this is mainly handy if you don't have a very stable internet connection!
		$this->data['force_success_upload'] = false;

		// files and directories we do not wish to transfer
		$this->data['excludes'] = array(
					'assets/uploads',						// never do this
					'application/controllers/transfer.php', // we have our unencoded password in here, don't upload!
					'designs', 								// we don't need to upload the design files
					'old', 									// older project files, no need to upload
					'files', 								// files created by the app such as temp, log, cache and sitepillar files, no need to upload
					'index.php',							// we set this up manually, see the prefix and suffix array
					'maintenance.png',						// again manually
					'svr_index.php',						// the file to display the 503 message while updating the project, again manually...
				);

		// files, directories we never wish to include in any case
		$this->data['all_excludes'] = array(
					'.',
					'..',
					'.DS_Store',
					'Thumbs.db',
					'.git',
					'.htaccess',
					'.htpasswd',
					'svr_.htaccess',
					'svr_.htpasswd',
					'.gitignore',
					'.hg_archival.txt',
					'.hgignore',
					'.hgtags',
					'phpinfo.php'
				);

		// actions we process before the actual transfer takes place
		$this->data['prefix'] = array( 
			'maintenance.png',
			array('src' => 'svr_maintenance.php', 'dest' => 'index.php'),
		);

		// actions we process after the actual transfer has taken place
		$this->data['suffix'] = array(
			array('src' => 'svr_.htaccess', 'dest' => '.htaccess'),
			array('src' => 'svr_.htpasswd', 'dest' => '.htpasswd'),
			'index.php',
				);

		// we want to continue on errors because creating directories usually makes trouble here
		$this->data['config']['debug']    = FALSE;
	}

	function countlines()
	{
		$path = $this->data['local_dir'].'application/'; // only get it from the application directory!
		$files = $this->get_dir_listing($path, '', array(), $this->data['all_excludes']);
		$count = 0;
		foreach ($files as $file) 
			if (!is_dir($path . $file))
				$count+=$this->countfilelines($path . $file);
		echo $count . ' lines of code';
	}

	function countfilelines($filepath) 
	{
	    $handle = fopen( $filepath, "r" );
	    $count = 0;
	    while( fgets($handle) ) 
	    {
	        $count++;
	    }
	    fclose($handle);
	    return $count;
	 }

	function getfilesize()
	{
		$files = $this->get_dir_listing($this->data['local_dir'], '', $this->data['excludes'], $this->data['all_excludes']);
		$count = 0;
		foreach ($files as $file) 
			if (!is_dir($this->data['local_dir'] . $file))
				$count += filesize($this->data['local_dir'] . $file);
		echo round($count / 1024 / 1024,2) . ' size of files is in mb';
	}

	function index()
	{
		echo '<p><a href="' . $this->data['base_url'] . '/countlines">Count lines of code in app dir</a></p>';
		echo '<p><a href="' . $this->data['base_url'] . '/getfilesize">Get file size of code</a></p>';
		echo '<p><a href="' . $this->data['base_url'] . '/view">View files</a></p>';
		echo '<p><a href="' . $this->data['base_url'] . '/execute_smart">Transfer files</a></p>';
	}

	function view()
	{
		$files = $this->get_dir_listing($this->data['local_dir'], '', $this->data['excludes'], $this->data['all_excludes']);
		sort($files);		
		echo "<pre>\r\n";
		print_r($files, FALSE);
		echo "</pre>\r\n";
	}

	// this one only uploads the altered files 
	function execute_smart()
	{
		set_time_limit (99999999);
		// get the total list of files and directories!
		$files = $this->get_dir_listing($this->data['local_dir'], '', $this->data['excludes'], $this->data['all_excludes']);
		// needed for correctly creating directories!
		sort($files);
		// get the md5 hashes of the files
		$md5_listing_new = $this->generate_md5s();
		// get the old md5 hashes of the files
		$md5_listing_old = $this->load_md5_listing();
		//die_r($md5_listing_old);
		// now delete all the files with the same md5
		$new_set = $this->data['prefix']; // we always have the prefixes!

		foreach ($files as $file)
		{
			if (is_array($file))
				$check = $file['src'];
			else
				$check = $file;
			if (array_key_exists($check, $md5_listing_old) &&
				array_key_exists($check, $md5_listing_new) &&
				$md5_listing_old[$check] == $md5_listing_new[$check])
			{
				// it's a match so no need to update!
			} else
			{
				// we need to update because it doesn't exist or there is a difference
				$new_set[] = $file;
			}
		}
		$files = array_merge($new_set, $this->data['suffix']); // add the rest of the files and combine!

		$failed_files = $this->upload_list($files);
		foreach ($failed_files as $file)
		{
			unset($md5_listing_new[$file]);
		}
		$this->save_md5_listing($md5_listing_new);
		// we now have a list of files to be uploaded!
	}

	function generate_md5s()
	{
		$files = $this->get_dir_listing($this->data['local_dir'], '', $this->data['excludes'], $this->data['all_excludes']);
		sort($files);
		$new_set = array();
		foreach ($files as $file)
		{
			if (!is_dir($this->data['local_dir'].$file))
				$new_set[$file] = md5_file($this->data['local_dir'].$file);
		}
		return $new_set;
	}

	function load_md5_listing()
	{
		$file = $this->data['local_dir'].$this->data['temp_dir'].'md5_listing.txt';
		if (file_exists($file))
		{
			$md5_listing = file_get_contents($file);
			$md5_listing = (array)JSON_DECODE($md5_listing);
			return $md5_listing;
		}
		else
			return array(); // in case nothing can be loaded just return an empty array!
	}
	
	function save_md5_listing($list)
	{
		$file = $this->data['local_dir'].$this->data['temp_dir'].'md5_listing.txt';
		$md5_listing = JSON_ENCODE($list);
		file_put_contents($file, $md5_listing);
	}

	function upload_list($files)
	{
		$failed_files = array();
		$this->load->library('ftp');

		echo "trying: connect " . $this->data['config']['hostname'] . " as " . $this->data['config']['username'];
		if ($this->ftp->connect($this->data['config']))
		{
			echo " - success<br/>\r\n";
			$number = count($files);
			
			// first copy
			
			$i = 0;
			foreach ($files as $totransfer)
			{
				$i++;
				echo "[" . $i . '/' . $number . "] ";
				// we want to see what is happening
				flush();	
			
							
				if (!is_array($totransfer) && is_dir($this->data['local_dir'] . $totransfer))
				{
					echo "trying: create directory " . $totransfer;
					// if the following fails it is not a problem because it means the dir already exitsts
					if ($this->ftp->mkdir($this->data['remote_dir'] . $totransfer))
						echo " - succes<br/>\r\n";
					else
						echo " - error<br/>\r\n";
				} else
				{
					if (is_array($totransfer))
					{
						$srcfile = $totransfer['src'];
						$dstfile = $totransfer['dest'];
					}
					else
					{
						$srcfile = $totransfer;
						$dstfile = $totransfer;
					}
					
					$upload_success = false;
					
					while (!$upload_success)
					{	
						echo "trying: upload file " . $srcfile . " to " . $dstfile;
						// do the actual upload of the file
						if ($this->ftp->upload($this->data['local_dir'] . $srcfile, $this->data['remote_dir'] . $dstfile))
						{
							echo " - succes<br/>\r\n";
							$upload_success = true;
						}
						else
							echo " - error<br/>\r\n";
							
						if (!$this->data['force_success_upload'])
						{
							$upload_success = true;
						}
						if (!$upload_success)
						{
							$failed_files[] = $srcfile;
						}
					}
				}
			}
			//gracefully close!
			$this->ftp->close();
			echo "done...<br/>\r\n";
			return $failed_files; // to write the md5 file!
		} else
		{
			echo " - error<br/>\r\n";
		}		
		
	}

	function get_dir_listing($path,$prefix='',$excludes=array(),$all_excludes=array())
	{
		$result = array();
		if ($handle = opendir($path))
		{
		    while (false !== ($file = readdir($handle)))
		        if (!in_array($file, $all_excludes) && !in_array($prefix.$file, $excludes))
				{					
					if (is_dir($path . $file))
						$result=array_merge($result, $this->get_dir_listing($path . $file . '/', $prefix . $file . '/', $excludes, $all_excludes));
					$result[] = $prefix . $file;
				}
			closedir($handle);
			return $result;
		} else
			return false;
	}
}

/* End of file transfer.php */
/* Location: ./application/controllers/transfer.php */