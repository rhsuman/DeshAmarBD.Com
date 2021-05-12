<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Categories
 *
 * @author suman
 */
class Categories extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
    
    
    public function index() {
        $data['title'] = 'Category List';
        $data['categories'] = $this->category_model->get_categories();
        $data['settings'] = $this->settings_model->get_setting();
        $data['content'] = $this->load->view('admin/category/home', $data, true);
        $this->load->view('admin/index', $data);
    }
    
    public function create() {
        //Form validation
        $this->form_validation->set_rules('name', 'Category Name', 'trim|xss_clean|required|is_unique[categories.name]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
                )
        );
        $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_rules('description', 'Details', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Create New Page';
            $data['categories'] = $this->category_model->get_top_categories();
            $data['settings'] = $this->settings_model->get_setting();
            $data['content'] = $this->load->view('admin/category/create', $data, true);
            $this->load->view('admin/index', $data);
        } else {
            $this->category_model->add_category();
            $this->session->set_flashdata('massage', '<p class="card-alert alert alert-success mb-0" role="alert">Your Category has been created</p>');
            redirect('categories');
        }
    }
    
    public function edit($id) {
        $data['categories'] = $this->category_model->get_top_categories();
        $data['category'] = $this->category_model->get_category($id);
        $data['title'] = $data['category']->name;
        $data['settings'] = $this->settings_model->get_setting();
        $data['content'] = $this->load->view('admin/category/edit', $data, true);
        $this->load->view('admin/index', $data);
    }
    
    //Update By Id
    function update() {
        $slug = str_slug(trim($this->input->post('name')));
        $data = array();
        $id = $this->input->post('category_id', true);
        $data['name'] = $this->input->post('name', true);
        $data['slug'] = $slug;
        $data['parent_id'] = $this->input->post('parent_id', true);
        $data['description'] = $this->input->post('description', true);
        $data['color'] = $this->input->post('color', true);
        $data['keywords'] = $this->input->post('keywords', true);
        $data['status'] = $this->input->post('status', true);
        $data['show_at_homepage'] = $this->input->post('show_at_homepage', true);
        $data['block_type'] = $this->input->post('block_type', true);
        $this->category_model->update_category_by_id($data, $id);
        $this->session->set_flashdata('massage', '<p class="card-alert alert alert-info mb-0" role="alert">Update category Successfully !</p>');
        redirect('categories');
    }
    
    //Delete Pages
    public function delete($id) {
        $this->category_model->delete_cat_by_id($id);
        $ddata = array();
        $this->session->set_flashdata('massage', 'Your Category has been Deleted');
        redirect($this->agent->referrer());
    }

    //Unpublish category
    public function unpublish($id) {
        $this->category_model->unpublish_cat_by_id($id);
        $this->session->set_flashdata('massage', 'Your Category has been Druft');
        redirect($this->agent->referrer());
    }

    //publish category
    public function publish($id) {
        $this->category_model->publish_cat_by_id($id);
        $this->session->set_flashdata('massage', 'Your Category has been Published');
        redirect($this->agent->referrer());
    }
}
