<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Posts
 *
 * @author suman
 */
class Posts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        $data['title'] = 'Post List';
        $data['posts'] = $this->post_model->get_posts();
        $data['settings'] = $this->settings_model->get_setting();
        $data['content'] = $this->load->view('admin/posts/home', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function create() {
        $this->form_validation->set_rules('title', 'Title', 'xss_clean|required|is_unique[posts.title]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
                )
        );
        $this->form_validation->set_rules('content', 'Details', 'xss_clean|required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data = array();
            $data['title'] = "Create New Post";
            //Setings
            $data['settings'] = $this->settings_model->get_setting();
            $data['categories'] = $this->category_model->get_top_categories(); //Publish Category
            $data['content'] = $this->load->view('admin/posts/create', $data, true);
            $this->load->view('admin/index', $data);
        } else {
            // Upload Image
             $config['upload_path'] = 'images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $error = array();
            $fdata = array();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
            } else {
                $fdata = $this->upload->data();
                $image = $fdata['file_name'];
                $this->_create_thumbs($fdata['file_name']);

                //$this->_create_thumbs($fdata['file_name']);
            }
            if ($this->post_model->create_post($image)) {
                $post_id = $this->db->insert_id();
                $this->tag_model->add_post_tags($post_id);
                $this->session->set_flashdata('post_created', 'Your Post has been created');
                redirect('posts');
            }
        }
    }

    public function edit($id) {
        $data['post'] = $this->post_model->get_post($id);
        $data['title'] = $data['post']->title;
        //Setings
        $data['settings'] = $this->settings_model->get_setting();
        $data['categories'] = $this->category_model->get_top_categories(); //Publish Category
        $data['subcategories'] = $this->category_model->get_subcategories_by_parent_id($data['post']->category_id); //Publish Category
        $data['content'] = $this->load->view('admin/posts/edit', $data, true);
        $this->load->view('admin/index', $data);
    }

    function update() {
        $data = array();
        /* -----------Upload Start--------------- */
        $config['upload_path'] = 'images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
        } else {
            $fdata = $this->upload->data();
            $this->_create_thumbs($fdata['file_name']);
            $data['image'] = $fdata['file_name'];
        }

        $id = $this->input->post('post_id', true);
        $data["title_slug"] = str_slug(trim($this->input->post('title', true)));
        $data['title'] = trim($this->input->post('title', true));
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_id'] = $this->input->post('subcategory_id', true);
        $data['content'] = $this->input->post('content', true);
        $data['need_auth'] = $this->input->post('need_auth', true);
        $data['is_slider'] = $this->input->post('is_slider', true);
        $data['is_featured'] = $this->input->post('is_featured', true);
        $data['is_recommended'] = $this->input->post('is_recommended', true);
        $data['is_breaking'] = $this->input->post('is_breaking', true);
        $data['description'] = $this->input->post('description', true);
        $data['keywords'] = $this->input->post('keywords', true);
        $data['image_description'] = $this->input->post('image_description', true);

        $this->post_model->update_post($data, $id);
        $this->session->set_flashdata('massage', 'update post Successfully !');
        redirect('posts');
    }

    //Unpublish Page
    public function unpublish($id) {
        $this->post_model->unpublish_post_by_id($id);
        $this->session->set_flashdata('massage', 'Your post has been Druft');
        redirect('posts');
    }

    //Publish Page
    public function publish($id) {
        $this->post_model->publish_post_by_id($id);
        $this->session->set_flashdata('massage', 'Your post has been Published');
        redirect('posts');
    }

    //Delete Pages
    public function delete($id) {
        $this->post_model->delete_post_by_id($id);
        $data = array();
        $this->session->set_flashdata('massage', 'Your post has been Deleted');
        redirect('posts');
    }

    function _create_thumbs($file_name) {
        // Image resizing config
        $config = array(
            // Large Image
            array(
                'image_library' => 'GD2',
                'source_image' => './images/' . $file_name,
                'maintain_ratio' => FALSE,
                'width' => 500,
                'height' => 500,
                'new_image' => './images/thumblail/' . $file_name
            ),
                /* ----
                  // Medium Image
                  array(
                  'image_library' => 'GD2',
                  'source_image' => './images/' . $file_name,
                  'maintain_ratio' => FALSE,
                  'width' => 400,
                  'height' => 300,
                  'new_image' => './images/image_mid/' . $file_name
                  ),
                  // Small Image
                  array(
                  'image_library' => 'GD2',
                  'source_image' => './images/' . $file_name,
                  'maintain_ratio' => FALSE,
                  'width' => 100,
                  'height' => 80,
                  'new_image' => './images/image_small/' . $file_name
                  )
                 * */
        );

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item) {
            $this->image_lib->initialize($item);
            if (!$this->image_lib->resize()) {
                return false;
            }
            $this->image_lib->clear();
        }
    }

    function get_sub_category() {
        $category_id = $this->input->post('id', TRUE);
        $data = $this->category_model->get_sub_category($category_id)->result();
        echo json_encode($data);
    }

}
