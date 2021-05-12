<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Comment_model
 *
 * @author suman
 */
class Comment_model extends CI_Model {

    //create Comment Single post
    public function create_comment($post_id) {
        $data = array(
            'post_id' => $post_id,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'body' => $this->input->post('body'),
            //'ipaddress' => $this->input->ip_address(),
        );
        return $this->db->insert('comments', $data);
    }

    // get Comment single Post
    public function get_comments($post_id) {
        $query = $this->db->get_where('comments', array('post_id' => $post_id, 'status' => 1));
        return $query->result();
    }

    //get all comments
    public function get_comment() {
        $this->db->join('posts', 'comments.post_id = posts.id');
        $this->db->select('comments.*,posts.title');
        $this->db->order_by('comments.created_at', 'DESC');
        $query = $this->db->get('comments');
        return $query->result();
    }

    //Unpublish Comment
    public function unpublish_comment_by_id($id) {
        $id = sql_escape_str($id);
        $this->db->set('status', 0);
        $this->db->where('comments.id', $id);
        $this->db->update('comments');
    }

    //Publish Comment
    public function publish_comment_by_id($id) {
        $id = sql_escape_str($id);
        $this->db->set('status', 1);
        $this->db->where('comments.id', $id);
        $this->db->update('comments');
    }

    public function delete_comment($id) {
        $id = sql_escape_number($id);
        $this->db->where('comments.id', $id);
        $this->db->delete('comments');
    }

    //Comment Count
    public function comment_count($post_id) {
        $this->db->select('*');
        $this->db->where('comments.post_id', $post_id);
        $this->db->where('status', 0);
        $query = $this->db->get('comments');
        return $query->num_rows();
    }
}
