<?php

Class Hours extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        checklogin();
        
    }
    
    function index()
    {
        
        $data = array(
                'main_content' => 'dashboard/hours/hours_list_view_new',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Hours',
                'users' => $this->user_model->getAll(),
                'hours' => $this->hours_model->getAll()
                        );
        $this->load->view('dashboard/inc/template2', $data);
    }

/**
 * Displays single hours record from database
*/

    function view()
    {

        if($this->uri->segment(4)){
            $find = array(
                'id' => $this->uri->segment(4)
            );
            
            $result = $this->hours_model->find($find);
            
            $data = array(
                'main_content' => 'dashboard/hours/hours_single_view_new',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Hours',
                'hour' => $result
                        );
            
            $this->load->view('dashboard/inc/template2', $data);
            
        }
        
        else
        {
            redirect(base_url('dashboard'));
        }        
    }
    
    function sortby()
    {
        // SORTING BY USER:
        
        if($this->uri->segment(4) == 'user'){
            $hours = $this->hours_model->find(array('user_id' => $this->uri->segment(5)));
            $user = $this->user_model->find(array('id' => $this->uri->segment(5)));
            $data = array(
                'main_content' => 'dashboard/hours/hours_by_sort_view',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Hours',
                'under_title' => "User &raquo; " . getUserName($this->uri->segment(5), 'return'),
                'user' => $user,
                'users' => $this->user_model->getAll(),
                'hours' => $hours
                        );
            
            $this->load->view('dashboard/inc/template', $data);
        }
        
        // SORTING BY WEEK:
        
        if($this->uri->segment(4) == 'week'){
            $hours = $this->hours_model->find(array('week' => $this->uri->segment(5)));
            $sort = $this->user_model->find(array('id' => $this->uri->segment(5)));
            $data = array(
                'main_content' => 'dashboard/hours/hours_by_sort_view',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Hours',
                'under_title' => "Week &raquo; " . $this->uri->segment(5),
                'user' => $sort,
                'users' => $this->user_model->getAll(),
                'hours' => $hours
                        );
            
            $this->load->view('dashboard/inc/template', $data);
        }
        
    }
    

    
    
/**
 * Displays form to add hours, and adds hours if input->post is set.
*/

    function add()
    {
        if($this->input->post())
        {
            $start = $this->input->post('start-hour');
            $start .= $this->input->post('start-minute');
            
            $end = $this->input->post('end-hour');
            $end .= $this->input->post('end-minute');
            
            $input = array(
                'user_id' => $this->input->post('user_id'),
                'project_id' => $this->input->post('project_id'),
                'date' => $this->input->post('date'),
                'week' => date('W', strtotime($this->input->post('date'))),
                'hours' => total_hours($start, $end, $this->input->post('break')),
                'start' => $start,
                'end' => $end,
                'break' => $this->input->post('break'),
                'comment' => $this->input->post('comment'),
            );
            
            if($this->input->post('user_id') == 3){
                $input['user_id'] = 1;
                
                if($this->hours_model->add_hours($input))
                {
                    $input['user_id'] = 2;
                    if($this->hours_model->add_hours($input))
                    {
                        $this->notify->add('success', 'Record added successfully!');
                
                        redirect(base_url('dashboard/hours/index'));    
                    }
                    
                    else
                    {
                        $this->notify->add('error', '<b>ERROR</b> Reccord was not added!!!');
                        
                        redirect(base_url('dashboard/hours/index'));
                    }
                }
                
                else
                {
                    $this->notify->add('error', '<b>ERROR</b> Reccord was not added!!!');
                        
                    redirect(base_url('dashboard/hours/index'));
                }
            }
            
            else
            {
            
                if($this->hours_model->add_hours($input))
                {
                    $this->notify->add('success', 'Record added successfully!');
                    
                    redirect(base_url('dashboard/hours/index'));
                }
                else
                {
                    $this->notify->add('error', '<b>ERROR</b> Reccord was not added!!!');
                        
                    redirect(base_url('dashboard/hours/index'));
                }
            }
        }
        
        foreach($this->projects_model->getAll('DESC') as $project)
        {
            $projects[$project->id] = $project->project_name;
        }
        
        
        $data = array(
                'main_content' => 'dashboard/hours/hours_add_view_new',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Hours',
                'projects' => $projects
                        );
        
        $this->load->view('dashboard/inc/template2', $data);
    }
    
    function edit()
    {
        if($this->input->post())
        {
            $update_id = $this->input->post('id');
            $update_data = array(
                        "project_id" => $this->input->post('project_id'),
                        "date" => $this->input->post('date'),
                        "week" => $this->input->post('week'),
                        "hours" => $this->input->post('hours'),
                        "start" => $this->input->post('start'),
                        "end" => $this->input->post('end'),
                        "break" => $this->input->post('break'),
                        "comment" => $this->input->post('comment'),
                    );
            
            if($this->hours_model->update($update_id, $update_data))
            {
                redirect(base_url('dashboard/hours/view') . '/' . $update_id);
            }
            else
            {
                echo 'error';
            }
        }
        
        elseif($this->uri->segment(4)){
            $find = array(
                'id' => $this->uri->segment(4)
            );
            
            $result = $this->hours_model->find($find);
            
            foreach($this->projects_model->getAll('DESC') as $project)
            {
                $projects[$project->id] = $project->project_name;
            }            
            
            $data = array(
                'main_content' => 'dashboard/hours/hours_edit_single_view_new',
                'page_title' => 'Dashboard',
                'page_tagline' => 'Hours',
                'projects' => $projects,
                'hour' => $result
                        );
            
            $this->load->view('dashboard/inc/template2', $data);
            
        }
        
        else
        {
            redirect(base_url('dashboard'));
        }        
    }
    
    function delete()
    {


            if($this->hours_model->delete($this->uri->segment(4)))
            {
                $this->notify->add('success', 'Record deleted successfully!');
                
                redirect(base_url('dashboard/hours/index'));
            }
            else
            {
                $this->notify->add('error', 'Record not deleted');
                
                redirect(base_url('dashboard/hours/index'));
            }
            
            
    }
    
}