<?php

Class Clockout extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        checklogin();
        
    }
    
    
    function index()
    {
	/** Getting projects */
	foreach($this->projects_model->getall('DESC') as $project)
	{
	    $projects[$project->id] = $project->project_name;
	}
	
	$data = array(
                'main_content' => 'dashboard/clockout/clockout_view',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Clockout',
		'projects' => $projects,
                'users' => $this->user_model->getAll(),
                'hours' => $this->hours_model->getAll()
                        );
	
	
        $this->load->view('dashboard/clockout/clockout_view', $data);
    }
}