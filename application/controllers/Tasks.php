<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller
{
    public function display($task_id)
    {
        $data['project_id'] = $this->task_model->get_task_project_id($task_id);
        $data['project_name'] = $this->task_model->get_project_name($data['project_id']);
        $data['task'] = $this->task_model->get_task($task_id);
        $data['main_view'] = "tasks/display";
        $this->load->view('layouts/main', $data);
    }

    public function index()
    {
        $project_id = $this->session->userdata('project_id');
        $data['tasks'] = $this->task_model->get_all_tasks($project_id);
        //$data['projects'] = $this->project_model->get_projects();

        $data['main_view'] = "tasks/index";

        $this->load->view('layouts/main', $data);
    }

    
    public function create($project_id)
    {
        $this->form_validation->set_rules('task_name', 'task Name', 'trim|required');
        $this->form_validation->set_rules('task_body', 'task Description', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['main_view'] = 'tasks/create_task';
            $this->load->view('layouts/main', $data);
        } else {
            $data = array(   
                'project_id' => $project_id,
                'due_date' => $this->input->post('due_date'),
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body')
            );

            if ($this->task_model->create_task($data)) {
                $this->session->set_flashdata('task_created', 'Your task has been created');

                redirect("tasks/index");
            }
        }
    }

    public function edit($task_id)
    {
        $this->form_validation->set_rules('task_name', 'task Name', 'trim|required');
        $this->form_validation->set_rules('task_body', 'task Description', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['main_view'] = 'tasks/edit_task';
            $this->load->view('layouts/main', $data);
        } else {
            $data = array(   
                'due_date' => $this->input->post('due_date'),
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body')
            );

            if ($this->task_model->edit_task($task_id, $data)) {
                $this->session->set_flashdata('task_edited', 'Your task has been edited');

                redirect("tasks/index");
            }
        }
    }


    public function delete($task_id)
    {
        
        $this->task_model->delete_task($task_id);
        $this->session->set_flashdata('task_deleted', 'Your task has been deleted');
        redirect("tasks/index");
    }

    
	
}
