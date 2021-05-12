<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Feed
 *
 * @author suman
 */
class Feed extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('xml');
    }

    function index() {
        $data['feed_name'] = 'Feed'; // your website
        $data['encoding'] = 'utf-8'; // the encoding
        $data['feed_url'] = base_url() .'feed'; // the url to your feed
        $data['page_language'] = 'en-en'; // the language
        $data['creator_email'] = 'admin@deshamarbd.com'; // your email
        $data['posts'] = $this->post_model->get_posts(10);
        $data['settings'] = $this->settings_model->get_setting(); //Setings
       // header("Content-Type: application/rss+xml"); // important!
        $this->load->view('feeds', $data); //Page Load

    }

}
