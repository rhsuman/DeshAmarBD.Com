<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Auth model
 *
 * @author suman
 */
class Auth_model extends CI_Model {

    //Register
    public function register() {
        // User data array
        $data = array(
            'username' => remove_special_characters($this->input->post('username', true)),
            'email' => $this->input->post('email', true),
            'password' => md5($this->input->post('password')),
            'role' => 'user',
            'avatar' => 'avatar.png',
            'is_active' => 0,
            'ipaddress' => $this->input->ip_address(),
        );

        // Insert user
        return $this->db->insert('auth', $data);
    }

    // Log user in
    function validate_login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->where('is_active', 1);
        $this->db->from('auth');
        $query = $this->db->get();
        if ($query->num_rows() == 0)
            return false;
        else
            return $query->result();
    }

    //Token 
    function token($email, $token) {
        $data = array(
            'email' => $email,
            'token' => $token,
        );
        // Insert token
        return $this->db->insert('user_token', $data);
    }
    
    //Get All User
    public function get_users() {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('auth');
        return $query->result();
    }
    
    //Unpublish Pages
    public function inactive_user($id) {
        $id = sql_escape_str($id);
        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('auth');
    }

    //Publish Pages
    public function active_user($id) {
        $id = sql_escape_str($id);
        $this->db->set('is_active', 1);
        $this->db->where('id', $id);
        $this->db->update('auth');
    }
    
    //update User Info
    function update($data, $id) {
        $id = sql_escape_str($id);
        $this->db->where('id', $id);
        $this->db->update('auth ', $data);
    }
    
    //User name For Single User
    public function get_usersname($id) {
        $id = sql_escape_str($id);
        $this->db->where('id', $id);
        $query = $this->db->get('auth');
        return $query->row();
    }


}
