<?php

Class Login extends CI_Controller{
    
    function index()
    {
        if($this->session->userdata('is_logged_in'))
        {
            redirect('dashboard/overview');
            return;
        }
        
        $data['main_content'] = 'login_form';
        
        $this->load->view('inc/template', $data);
    }
    
    function validate_login()
    {
        $this->load->model('user_model');
        
        if($this->user_model->validate())
        {
    
            $data = array(
                'username' => $this->input->post('username'),
                'user_id' => $query,
                'is_logged_in' => true
                );
                
            $this->session->set_userdata($data);
                
            redirect('dashboard/overview/index');
        }
        
        else
        {
            $this->notify->add('error', 'Login failed');
                
            redirect(base_url('login'));     
        }
        
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        
        redirect('login');
    }
    
}