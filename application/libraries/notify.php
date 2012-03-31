<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notify
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
        
        function add($type, $message)
        {
            $field = array(
                'message_type' => $type,
                'message_string' => $message
            );
            
            $this->CI->session->set_userdata($field);
            
            return;
            
        }
        
        function output()
        {
            if($this->CI->session->userdata('message_type') && $this->CI->session->userdata('message_string'))
            {
                $message_type = $this->CI->session->userdata('message_type');
                $message_string = $this->CI->session->userdata('message_string');
                
                $message = "<div class='alert alert-$message_type'>";
                        
                if($message_type == 'error')
                {
                    $message .= "<strong>Woops!</strong>";
                }
                elseif($message_type == 'success')
                {
                    $message .= "<strong>Weeho!</strong>";
                }
                elseif($message_type == 'info')
                {
                    $message .= "<strong>Heads up!</strong>";
                }
                
                $message .= "\n $message_string </div>";
                
                echo $message;
                
                $this->CI->session->unset_userdata('message_type');
                $this->CI->session->unset_userdata('message_string');
            
            }
            
            else
            {
                return;    
            }
        }
        
}