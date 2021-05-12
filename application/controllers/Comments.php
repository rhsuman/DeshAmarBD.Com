<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Comments
 *
 * @author suman
 */
class Comments extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        //Title
        $data['title'] = "Comments";
        $data['comments'] = $this->comment_model->get_comment();
        $data['settings'] = $this->settings_model->get_setting();
        $data['content'] = $this->load->view('back/comments', $data, true);
        $this->load->view('back/index', $data);
        
    }
    //create Comment
    public function create($post_id) {
        $slug = $this->input->post('slug');
        $data['post'] = $this->site_model->get_post_by_slug($slug); //get post
        $data['settings'] = $this->settings_model->get_setting(); //Setings
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');


        if ($this->form_validation->run() === FALSE) {
            
        } else {
            $this->comment_model->create_comment($post_id);
            $this->session->set_flashdata('comment', 'Your Comment Send Successfully,<br> After Admin review Wil Be Publish !');
            redirect('view/' . $slug);
        }
    }
    
    //Delete Pages
    public function delete($id) {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $id = $this->input->post('id', true);
        $this->comment_model->delete_comment($id);
        $data = array();
        $this->session->set_flashdata('delete_comment', 'Your Comment has been Deleted');
        redirect('comments');
    }

    public function unpublish($id) {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $this->comment_model->unpublish_comment_by_id($id);
        $this->session->set_flashdata('comment_draft', 'Your Comment has been Druft');
        redirect('comments');
    }

    public function publish($id) {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $this->comment_model->publish_comment_by_id($id);
        $this->session->set_flashdata('comment_publish', 'Your Comment has been Published');
        redirect('comments');
    }
}
