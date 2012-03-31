<?php

Class Materials extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        checklogin();
    }
    
    function index()
    {
	redirect('dashboard/materials/view');
    }

    function view()
    {
        $data = array(
	    'main_content' => 'dashboard/materials/materials_list_view',
            'page_title' => 'Dashboard',
            'page_tagline' => 'Materials',
	    'materials' => $this->materials_model->getAll('DESC')
                    );
        
	$this->load->view('dashboard/inc/template2', $data);
    }
    
    function add()
    {
	
	if($this->input->post())
	{
	    $input = array(
		'matProId' => $this->input->post('matProId'),
		'matDate' => $this->input->post('matDate'),
		'matDescription' => $this->input->post('matDescription')
	    );
	    
	    try
	    {
		$this->materials_model->add($input);
		
		$this->message->success('Row added successfully!');
		redirect('dashboard/materials/view');
	    }
	    catch(exception $e)
	    {
		redirect('dashboard/materials/add');
	    }
	}
	
	foreach($this->projects_model->getAll('DESC') as $project)
        {
            $projects[$project->id] = $project->project_name;
        }

        $data = array(
                'main_content' => 'dashboard/materials/materials_add_view',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Materials',
                'projects' => $projects
                        );
        
        $this->load->view('dashboard/inc/template2', $data);
	
	
    }
    

}