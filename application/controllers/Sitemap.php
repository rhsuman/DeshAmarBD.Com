<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Sitemap
 *
 * @author suman
 */
class Sitemap extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('xml');
    }

    public function index() {
        $data['posts'] = $this->post_model->get_posts(10);
        $this->load->view('sitemap', $data);
    }

}
