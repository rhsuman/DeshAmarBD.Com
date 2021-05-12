<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Pages
 *
 * @author suman
 */
class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        $data['title'] = 'Page List';
        $data['pages'] = $this->page_model->get_pages();
        $data['settings'] = $this->settings_model->get_setting();
        $data['content'] = $this->load->view('admin/pages/home', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function create() {
        //Form validation
        $this->form_validation->set_rules('title', 'Page Title', 'trim|xss_clean|required|is_unique[pages.title]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
                )
        );
        $this->form_validation->set_rules('details', 'Details', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Create New Page';
            $data['pages'] = $this->page_model->get_top_pages();
            $data['settings'] = $this->settings_model->get_setting();
            $data['content'] = $this->load->view('admin/pages/create', $data, true);
            $this->load->view('admin/index', $data);
        } else {
            $this->page_model->create_page();
            $this->session->set_flashdata('massage', '<p class="card-alert alert alert-success mb-0" role="alert">Your Page has been created</p>');
            redirect('pages');
        }
    }
    
    public function edit($id) {
        $data['pages'] = $this->page_model->get_top_pages();
        $data['page'] = $this->page_model->get_page($id);
        $data['title'] = $data['page']->title;
        $data['settings'] = $this->settings_model->get_setting();
        $data['content'] = $this->load->view('admin/pages/edit', $data, true);
        $this->load->view('admin/index', $data);
    }
    
    //Update By Id
    function update() {
        
        $slug = str_slug(trim($this->input->post('title')));
        $data = array();
        $id = $this->input->post('page_id', true);
        $data['title'] = $this->input->post('title', true);
        $data['slug'] = $slug;
        $data['details'] = $this->input->post('details', true);
        $data['parent_id'] = $this->input->post('parent_id', true);
        $data['description'] = $this->input->post('description', true);
        $data['keywords'] = $this->input->post('keywords', true);
        $data['status'] = $this->input->post('status', true);
        $this->page_model->update_page_by_id($data, $id);
        $this->session->set_flashdata('massage', '<p class="card-alert alert alert-info mb-0" role="alert">update Page Successfully !</p>');
        redirect('pages');
    }    
    
    //Unpublish Page
    public function unpublish($id) {
        $this->page_model->unpublish_page_by_id($id);
        $this->session->set_flashdata('massage', '<p class="card-alert alert alert-warning mb-0" role="alert">Your Page has been Druft</p>');
        redirect('pages');
    }

    //Publish Page
    public function publish($id) {
        $this->page_model->publish_page_by_id($id);
        $this->session->set_flashdata('massage', '<p class="card-alert alert alert-success mb-0" role="alert">Your Page has been Published</p>');
        redirect('pages');
    }

    //Delete Pages
    public function delete($id) {
        $this->page_model->delete_page_by_id($id);
        $data = array();
        $this->session->set_flashdata('massage', '<p class="card-alert alert alert-danger mb-0" role="alert">Your Page has been Deleted</p>');
        redirect('pages');
    }

}
