<?php

Class Projects extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        checklogin();
    }

    function index()
    {
        
        
        $data = array(
                'main_content' => 'dashboard/projects/projects_list_view_new',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Projects',
                'projects' => $this->projects_model->getAll()
                        );
        $this->load->view('dashboard/inc/template2', $data);
    }
    
    function add()
    {
        if($this->input->post())
        {
            $data = array(
                'project_name' => $this->input->post('name'),
                'project_description' => $this->input->post('description')
            );
            if($this->projects_model->add($data))
            {
                redirect(base_url('dashboard/projects/index'));
            }
            else
            {
                echo 'error';
            }
        }
        
        $data = array(
                'main_content' => 'dashboard/projects/projects_add_view_new',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Projects'
                        );
        
        $this->load->view('dashboard/inc/template2', $data);
    }
    
    function view()
    {
        if($this->uri->segment(4)){
            $find = array(
                'id' => $this->uri->segment(4)
            );
            
            $result = $this->projects_model->find($find);
            $data = array(
                'main_content'  => 'dashboard/projects/projects_single_view_new',
                'page_title'    => 'Dashboard',
                'page_tagline'  => 'Projects',
                'project'       => $result->row(),
                'materials'     => $this->materials_model->find(array('matProId' => $this->uri->segment(4))),
                'hours'         => $this->hours_model->find(array('project_id' => $this->uri->segment(4)))
                        );
            
            
            $this->load->view('dashboard/inc/template2', $data);
            
        }
        
        else
        {
            redirect(base_url('dashboard'));
        }
    }

}