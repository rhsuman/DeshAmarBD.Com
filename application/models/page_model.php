<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page_model
 *
 * @author suman
 */
class page_model extends CI_Model{
    
    //Create New Page
    public function create_page() {
        $slug = str_slug(trim($this->input->post('title')));
        $data = array(
            'title' => $this->input->post('title', true),
            'slug' => $slug,
            'details' => $this->input->post('details', true),
            'parent_id' => $this->input->post('parent_id', true),
            'description' => $this->input->post('description', true),
            'keywords' => $this->input->post('keywords', true),
            'status' => $this->input->post('status', true),
            'user_id' => $this->session->userdata('user_id')
        );
        return $this->db->insert('pages', $data);
    }
    
    //Get Pages
    public function get_pages() {
        $this->db->order_by('pages.created_at');
        $query = $this->db->get('pages');
        return $query->result();
    }
    
    //get Parent Page By page Id
    public function get_page($id) {
        $id = sql_escape_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('pages');
        return $query->row();
    }
    
    //Get Pages
    public function get_top_pages() {
        $this->db->order_by('pages.id');
        $this->db->where('parent_id', 0);
        $query = $this->db->get('pages');
        return $query->result();
    }
    
    //Update Pages
    function update_page_by_id($data, $id) {
        $id = sql_escape_str($id);
        $this->db->where('id', $id);
        $this->db->update('pages', $data);
    }
    
    //Delete Pages
    public function delete_page_by_id($id) {
        $id = sql_escape_str($id);
        $this->db->where('id', $id);
        $this->db->delete('pages');
    }

    //Unpublish Pages
    public function unpublish_page_by_id($id) {
        $id = sql_escape_str($id);
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('pages');
    }

    //Publish Pages
    public function publish_page_by_id($id) {
        $id = sql_escape_str($id);
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('pages');
    }
}
