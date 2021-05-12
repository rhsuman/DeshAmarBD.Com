<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Category_model
 *
 * @author suman
 */
class Category_model extends CI_Model{
    
    //Create New Page
    public function add_category() {
        $slug = str_slug(trim($this->input->post('name')));
        $data = array(
            'name' => $this->input->post('name', true),
            'slug' => $slug,
            'description' => $this->input->post('description', true),
            'parent_id' => $this->input->post('parent_id', true),
            'keywords' => $this->input->post('keywords', true),
            'color' => $this->input->post('color', true),
            'status' => $this->input->post('status', true),            
            'show_at_homepage' => $this->input->post('show_at_homepage', true),
            'block_type' => $this->input->post('block_type', true),
            'user_id' => $this->session->userdata('user_id')
        );
        return $this->db->insert('categories', $data);
    }
    
    //Get category
    public function get_categories() {
        $this->db->order_by('categories.id');
        $query = $this->db->get('categories');
        return $query->result();
    }
    
    //Get top category
    public function get_top_categories() {
        $this->db->order_by('categories.id');
        $this->db->where('parent_id', 0);
        $this->db->where('status', 1);
        $query = $this->db->get('categories');
        return $query->result();
    }
    
    //get parent category by category id
    public function get_category($id) {
        $id = sql_escape_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('categories');
        return $query->row();
    }
    
    //Update Pages
    function update_category_by_id($data, $id) {
        $id = sql_escape_str($id);
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }

    //Delete Pages
    public function delete_cat_by_id($id) {
        $id = sql_escape_str($id);
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }

    //Unpublish Pages
    public function unpublish_cat_by_id($id) {
        $id = sql_escape_str($id);
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('categories');
    }

    //Publish Pages
    public function publish_cat_by_id($id) {
        $id = sql_escape_str($id);
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('categories');
    }
    
    //Get publish Sub Category
    function get_sub_category($category_id) {
        $category_id = sql_escape_str($category_id);
        $this->db->where('status', 1);
        $query = $this->db->get_where('categories', array('parent_id' => $category_id));
        return $query;
    }
    
    //Get Subcategory by parent id
    public function get_subcategories_by_parent_id($parent_id) {
        $parent_id = sql_escape_number($parent_id);
        $this->db->where('parent_id', $parent_id);
        $this->db->where('status', 1);
        $query = $this->db->get('categories');
        return $query->result();
    }
    
}
