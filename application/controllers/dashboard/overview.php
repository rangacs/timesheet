<?php

Class Overview extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        checklogin();
    }
    
	
    function index()
    {
	$this->load->model('projects_model');
        
	if($projects = $this->projects_model->getAll()){
	    
	    arsort($projects);
	    foreach($projects as $project)
	    {
		$return[$project->id] = $project->project_name;
	    }
	    $data['projects'] = $return;
	}
	$data = array(
	'main_content' => 'dashboard/new_overview_view',
	'page_title' => 'Dashboard',
        'hours' => $this->hours_model->getAllGroup(),
	'page_tagline' => 'Overview'
		);
	
        $this->load->view('dashboard/inc/template2', $data);
	
    }
    
    function add_hours()
    {
        $this->load->model('hours_model');
        if($this->hours_model->add_hours())
        {
            $this->index();
        }
        else
        {
            echo 'error';
        }
        
	
    }
    
    function view_hours()
    {
        $this->load->model('hours_model');
        $data['hours'] = $this->hours_model->getAll();
        
        $data['main_content'] = 'members_view_hours_view';
        $this->load->view('dashboard/inc/template', $data);
    }
}