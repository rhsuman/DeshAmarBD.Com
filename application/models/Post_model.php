<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Post_model
 *
 * @author suman
 */
class Post_model extends CI_Model {

    //Create Post
//create Post
    public function create_post($image) {
        $slug = str_slug(trim($this->input->post('title')));
        $data = array(
            'title' => $this->input->post('title'),
            'title_slug' => $slug,
            'content' => $this->input->post('content'),
            'category_id' => $this->input->post('category_id'),
            'subcategory_id' => $this->input->post('subcategory_id'),
            'status' => $this->input->post('status'),
            'need_auth' => $this->input->post('need_auth'),
            'is_slider' => $this->input->post('is_slider'),
            'is_featured' => $this->input->post('is_featured'),
            'is_recommended' => $this->input->post('is_recommended'),
            'is_breaking' => $this->input->post('is_breaking'),
            'description' => $this->input->post('description'),
            'keywords' => $this->input->post('keywords'),
            'image_description' => $this->input->post('image_description'),
            'video_path' => $this->input->post('video_path'),
            'user_id' => $this->session->userdata('user_id'),
            'image' => $image
        );
        return $this->db->insert('posts', $data);
    }

    //Get Posts
    public function get_posts() {
        $this->db->order_by('posts.id', 'ASC');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get category
    public function get_post($id) {
        $id = sql_escape_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('posts');
        return $query->row();
    }

    //update post
    public function update_post($data, $post_id) {
        $post_id = sql_escape_number($post_id);
        //$data = $this->input_values();
        $this->db->where('id', $post_id);
        $this->db->update('posts', $data);
    }

    //Unpublish categories
    public function unpublish_post_by_id($id) {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('posts');
    }

    //Publish categories
    public function publish_post_by_id($id) {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('posts');
    }

    //Delete categories
    public function delete_post_by_id($id) {
        $this->db->where('id', $id);
        $this->db->delete('posts');
    }

}
