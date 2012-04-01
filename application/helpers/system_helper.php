<?php

function is_active($name)
{
    $CI = get_instance();
    
    if($CI->uri->segment(2) == $name)
    {
        return 'active';
    }
    else
    {
        return false;
    }
}

function getUserName($id, $r="echo")
{  
    $CI =& get_instance();
    
    $CI->load->model('user_model');
    $q = $CI->user_model->find(array('id' => $id));
    
    if(!$q[0])
    {
        return 'no user';
    }
    elseif($r == 'return')
    {
        return $q[0]->username;
    }
    else
    {
        echo $q[0]->username;
    }
 
}

function getName($id)
{
    $CI =& get_instance();
    
    $CI->load->model('user_model');
    $q = $CI->user_model->find(array('id' => $id));
    
    if(!$q[0])
    {
        return 'no user';
    }
    
    else
    {
        echo $q[0]->name;
    }
    
}

function total_hours($start, $end, $break="0")
{
        $sa = explode(':', $start);
        $s = ($sa[0] * 60) + $sa[1];
        
        $ea = explode(':', $end);
        $e = ($ea[0] * 60) + $ea[1];
        
        $total = (($e - $s)-$break)/60;
        
        return $total;
}

function checklogin()
{
        $CI = get_instance();

        $is_logged_in = $CI->session->userdata('is_logged_in');
        
        if(!isset($is_logged_in) || $is_logged_in !== true)
        {
                redirect('login/index');
                die();
        }

}

function projectName($id)
{
    $CI = get_instance();
    $CI->load->model('projects_model');
    
    $q = $CI->projects_model->find(array('id' => $id));
    
    foreach($q->result() as $row){
        echo $row->project_name;
    }
}


  