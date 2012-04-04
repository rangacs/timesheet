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
        $data['hours'] = $this->hours_model->getAll();
        
        $data['main_content'] = 'members_view_hours_view';
        $this->load->view('dashboard/inc/template', $data);
    }
    
    function date()
    {
        $date = $this->uri->segment(4) . '-' . $this->uri->segment(5) . '-' . $this->uri->segment(6);
        $date2 = $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6);
        
        $hours = $this->hours_model->find(array('date' => $date));
        $materials = $this->materials_model->find(array('matDate' => $date));
        
        $data = array(
            'main_content' => 'dashboard/overview/date_view.php',
            'date' => $date2,
            'hours' => $hours,
            'materials' => $materials
            );
        
        $this->load->view('dashboard/inc/template', $data);
    }
}