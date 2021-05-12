<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Setting_model
 *
 * @author suman
 */
class Settings_model extends CI_Model{
    public function get_setting() {
        $query = $this->db->get_where('settings');
        return $query->row_array();
    }
    
    //update settings
    function update_settings($data) {
        $this->db->where('site_id', 1);
        $this->db->update('settings ', $data);
    }
}
