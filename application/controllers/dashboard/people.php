<?php

Class People extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        checklogin();
    }
    
    function index()
    {
            
        $data = array(
                'main_content' => 'dashboard/people/people_list_view',
                'page_title' => 'Dashboard',
                'page_tagline' => 'People',
                'people' => $this->user_model->getAll()
                        );
        $this->load->view('dashboard/inc/template', $data);
        
    }
    
    function show()
    {
        $hours = $this->hours_model->find(array('user_id' => $this->uri->segment(4)));
        $user = $this->user_model->find(array('id' => $this->uri->segment(4)));
        $sumweek = $this->hours_model->sumweek($this->uri->segment(4));
        
        $data = array(
                'main_content' => 'dashboard/people/people_single_view',
                'page_title' => 'Dashboard',
                'page_tagline' => 'People',
                'hours' => $hours,
                'user' => $user,
                'sumweek' => $sumweek
                        );
        $this->load->view('dashboard/inc/template', $data);
    }
    
}
