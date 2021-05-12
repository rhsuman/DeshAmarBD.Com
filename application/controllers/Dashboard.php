<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Dashboard
 *
 * @author suman
 */
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
    
    public function index() {
        $data['title'] = 'dashboard';
        $data['content'] = $this->load->view('admin/main-content', $data, true);
        $this->load->view('admin/index', $data);
    }
    
    //Settings
    public function settings() {
        //Title
        $data['title'] = 'Site Settings';
        $data['settings'] = $this->settings_model->get_setting();
        $data['content'] = $this->load->view('admin/settings', $data, true);
        $this->load->view('admin/index', $data);
    }
    
    //Settings Update
    function update() {
        $data = array();
            /* -----------Upload Start logo--------------- */
            $config['upload_path'] = 'img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $error = array();
            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('logo')) {
                $error = $this->upload->display_errors();
            } else {
                $fdata = $this->upload->data();
                $data['logo'] = $fdata['file_name'];
            }
            
            /* -----------Upload Start favicon--------------- */
            $config['upload_path'] = 'img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $error = array();
            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('favicon')) {
                $error = $this->upload->display_errors();
            } else {
                $fdata = $this->upload->data();
                $data['favicon'] = $fdata['file_name'];
            }
        $data['site_title'] = $this->input->post('site_title', true);
        $data['site_description'] = $this->input->post('site_description', true);
        $data['site_tag'] = $this->input->post('site_tag', true);
        $data['site_author'] = $this->input->post('site_author', true);
        $data['copyright'] = $this->input->post('copyright', true);
        //Social
        $data['facebook'] = $this->input->post('facebook', true);
        $data['twitter'] = $this->input->post('twitter', true);
        $data['instagram'] = $this->input->post('instagram', true);
        $data['pinterest'] = $this->input->post('pinterest', true);
        $data['telegram'] = $this->input->post('telegram', true);
        $data['youtube'] = $this->input->post('youtube', true);
        $this->settings_model->update_settings($data);
        $data['settings'] = $this->settings_model->get_setting(); //Setings
        $this->session->set_flashdata('Site_update', 'Update Settings Successfully !');
        redirect('settings');
    }
    
    //Contact
    function contact_massage() {
        $data['title'] = 'Contact';
        $data['settings'] = $this->settings_model->get_setting();
        $data['contacts'] = $this->site_model->get_contact();
        $data['content'] = $this->load->view('admin/contact-massage', $data, true);
        $this->load->view('admin/index', $data);
    }

}
