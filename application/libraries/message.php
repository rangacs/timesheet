<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message
{
	/**
	 * Codeigniter instance variable
	 *
	 * @var object
	 */
	private $CI;
		

	/**
	 * Contructor method.
	 *
	 */
	function __construct()
	{
		$this->CI =& get_instance();
	}
	
	
	
	/**
	 * Saves a success message.
	 *
	 * @param string $message 
	 * @return array
	 * @author Anthoni Giskegjerde
	 */
	function success($message, $tag = false)
	{
		$fields = array(
			'message_type'		=>	'success',
			'message_string'	=>	$message
		);
		
		if($tag)
		{
			$fields['message_tag'] = $tag;
		}
		
		$this->CI->session->set_userdata($fields);
		
		return $fields;
	}
	
	
	
	/**
	 * Saves a notice message.
	 *
	 * @param string $message 
	 * @return array
	 * @author Anthoni Giskegjerde
	 */
	function notice($message, $tag = false)
	{
		$fields = array(
			'message_type'		=>	'notice'
		);
		
		if($tag)
		{
			$fields['message_tag'] = $tag;
		}
		
		if(is_array($message))
		{
			$formatted = "";
			foreach($message as $line)
			{
				$formatted .= $line . "\n";
			}
			
			$fields['message_string'] = $formatted;
		}
		else
		{
			$fields['message_string'] = $message;
		}
		
		$this->CI->session->set_userdata($fields);
		
		return $fields;
	}
	
	
	/**
	 * Saves an error message.
	 *
	 * @param string $message 
	 * @return array
	 * @author Anthoni Giskegjerde
	 */
	function error($message, $tag = false)
	{
		$fields = array(
			'message_type'		=>	'error',
			'message_string'	=>	$message
		);
		
		if($tag)
		{
			$fields['message_tag'] = $tag;
		}
		
		$this->CI->session->set_userdata($fields);
		
		return $fields;
	}
	
	
	
	/**
	 * Outputs any error or success message that is saved.
	 *
	 * @return mixed Message on success, else false.
	 * @author Anthoni Giskegjerde
	 */
	function output($tag = false)
	{
		if($this->CI->session->userdata('message_type') && $this->CI->session->userdata('message_string'))
		{
			$class = $this->CI->session->userdata('message_type');
			$string = strip_tags($this->CI->session->userdata('message_string'));
		}
		else
		{
			return false;
		}
		
		if($tag)
		{
			if($active_tag = $this->CI->session->userdata('message_tag'))
			{
				if($active_tag != $tag)
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		
		$messages = explode("\n", $string);
			
		foreach($messages as $key => $msg)
		{
			if(empty($msg))
			{
				unset($messages[$key]);
			}
		}
		
		
		$output = "";
		
		foreach($messages as $message)
		{
			$output.= '<span class="label label-warning" style="background-color:red">' . trim($message) . "</span>";
		}
		
		
		echo $output;
		
		$this->CI->session->unset_userdata('message_type');
		$this->CI->session->unset_userdata('message_string');
		$this->CI->session->unset_userdata('message_tag');
	}
	
	
}