<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Site
 *
 * @author suman
 */
class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //Settings
        if (empty($this->settings)) {
            $this->settings = $this->settings_model->get_setting();
        }

        //Page Meu
        if (empty($this->pagemenu)) {
            $this->pagemenu = $this->site_model->page_menu();
        }

        //main Menu
        if (empty($this->menu_links)) {
            $this->menu_links = $this->site_model->get_menu_links();
        }

        //Ticket
        if (empty($this->tickers)) {
            $this->tickers = $this->site_model->ticker();
        }

        //Recent post
        if (empty($this->latest)) {
            $this->latest = $this->site_model->get_latest_post();
        }

        //Popular post
        if (empty($this->populars)) {
            $this->populars = $this->site_model->get_popular_post();
        }

        //Popular Week
        if (empty($this->popular_posts_week)) {
            $this->popular_posts_week = $this->site_model->get_popular_posts(7);
        }
        //Popular Month
        if (empty($this->popular_posts_month)) {
            $this->popular_posts_month = $this->site_model->get_popular_posts(30);
        }
        //Popular Year
        if (empty($this->popular_posts_year)) {
            $this->popular_posts_year = $this->site_model->get_popular_posts(365);
        }

        //Get publish Category
        if (empty($this->categories)) {
            $this->categories = $this->site_model->get_top_categories();
        }
    }

    public function generate_posts_array_by_category() {
        $array_posts = array();
        if (!empty($this->categories)) {
            foreach ($this->categories as $category) {
                $array_posts['category_' . $category->id] = $this->site_model->get_latest_posts_by_category($category, 8);
            }
        }
        return $array_posts;
    }

    public function index() {
        $data['title'] = 'Homepage';
        $data['slider'] = 1;
        $data['description'] = $this->settings['site_description'];
        $data['keywords'] = $this->settings['site_tag'];
        $data['url'] = base_url();
        $data['author'] = $this->settings['site_author'];

        $data['sliders'] = $this->site_model->slider();
        $data['feature'] = $this->site_model->featured();

        $this->category_posts = $this->generate_posts_array_by_category();
        $data['content'] = $this->load->view('homepage', $data, true);
        $this->load->view('index', $data);
    }

    public function all() {
        $data['title'] = 'Latest Post';
        $data['description'] = $this->settings['site_description'];
        $data['keywords'] = $this->settings['site_tag'];
        $data['url'] = base_url('all');
        $data['author'] = $this->settings['site_author'];
        //initialize pagination
        $config['base_url'] = base_url() . 'site/all/';
        $config["total_rows"] = $this->site_model->get_post_count();
        $config['per_page'] = '8';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['posts'] = $this->site_model->get_post($config['per_page'], $page);
        $data['content'] = $this->load->view('home', $data, true);
        $this->load->view('index', $data);
    }

    public function category($slug = NULL) {
        $slug = clean_slug($slug);
        $data['category'] = $this->site_model->get_category_by_slug($slug); //get single page by slug
        $category_id = $data['category']->id;
        $data['title'] = $data['category']->name;
        $data['description'] = $data['category']->description;
        $data['keywords'] = $data['category']->keywords;
        $data['url'] = base_url('category/' . $slug . '/');
        $data['author'] = $this->settings['site_author'];
        //category type
        $data['category_type'] = "";
        if ($data['category']->parent_id == 0) {
            $data['category_type'] = "parent";
        } else {
            $data['category_type'] = "sub";
        }

        //initialize pagination
        $config['base_url'] = base_url() . 'site/category/' . $slug . '/';
        $config["total_rows"] = $this->site_model->get_post_count_by_category($data['category_type'], $category_id);
        $config['per_page'] = '8';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['posts'] = $this->site_model->get_category_posts($data['category_type'], $category_id, $config['per_page'], $page);
        $data['content'] = $this->load->view('home', $data, true);
        $this->load->view('index', $data);
    }

    public function page($slug = NULL) {
        $slug = clean_slug($slug);
        $data['page'] = $this->site_model->get_page_by_slug($slug);
        $page_id = $data['page']->id;
        $data['title'] = $data['page']->title;
        $data['description'] = $data['page']->description;
        $data['keywords'] = $data['page']->keywords;
        $data['url'] = base_url('page/' . $slug . '/');
        $data['author'] = get_user($data['page']->user_id)->username;

        $data['content'] = $this->load->view('page-view', $data, true);
        $this->load->view('index', $data);
    }

    public function view($slug = NULL) {
        $slug = clean_slug($slug);
        $data['post'] = $this->site_model->get_post_by_slug($slug); //get post
        //check Post exists
        if (empty($data['post'])) {
            redirect(base_url());
        }
        $post_id = $data['post']->id;
        $data['title'] = $data['post']->title; //Title
        //
        $data['description'] = $data['post']->description;
        $data['keywords'] = $data['post']->keywords;
        $data['url'] = base_url('view/' . $data['post']->title_slug . '/');
        $data['author'] = get_user($data['post']->user_id)->username;
        $data['tags'] = $this->tag_model->get_tags($post_id);
        $data['comments'] = $this->comment_model->get_comments($post_id); //get comment by post
        $data['previous_post'] = $this->site_model->get_previous_post($post_id); //prev post
        $data['next_post'] = $this->site_model->get_next_post($post_id); //next post
        $data['related_posts'] = $this->site_model->get_related_posts($data['post']->category_id, $post_id); //related
        //$data['mrpost'] = $this->site_model->most_read_post($data['post']->category_id); //Most read Post
        $data['content'] = $this->load->view('post-view', $data, true);
        $this->load->view('index', $data);
        //increase post hit
        $this->site_model->increase_post_hit($data['post']);
    }

    public function contact() {
        //Form Validation
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('massage', 'Massege', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Contact';
            $data['description'] = $this->settings['site_description'];
            $data['keywords'] = $this->settings['site_tag'];
            $data['url'] = base_url('contact/');
            $data['author'] = $this->settings['site_author'];
            $data['content'] = $this->load->view('contact-page', $data, true);
            $this->load->view('index', $data);
        } else {
            // User data array
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
            $data['mobile'] = $this->input->post('mobile');
            $data['massage'] = $this->input->post('massage');
            $this->site_model->contact($data);
            $this->session->set_flashdata('contact_massage', 'Massage Sent');
            redirect('contact');
        }
    }

    public function author($username) {
        $data['user_post'] = $this->site_model->get_post_by_user($username); //get single page by slug
        $user_id = $data['user_post']->id;

        //check User exists
        if (empty($data['user_post'])) {
            redirect(base_url());
        }
        $data['title'] = $data['user_post']->username;

        $config['base_url'] = base_url() . 'site/author/' . $username . '/';
        $config["total_rows"] = $this->site_model->get_post_count_by_user($user_id);
        $config['per_page'] = '8';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['description'] = $this->settings['site_description'];
        $data['keywords'] = $this->settings['site_tag'];
        $data['url'] = base_url('author/' . $username . '/');
        $data['author'] = $data['user_post']->username;
        $data['posts'] = $this->site_model->get_author_posts($user_id, $config['per_page'], $page);
        $data['content'] = $this->load->view('home', $data, true);
        $this->load->view('index', $data);
    }
    
    public function search() {
        $q = $this->input->get('q', TRUE);
        $data['q'] = $q;
        $data['title'] = "search" . ': ' . $q;
        //initialize pagination
        $config['base_url'] = base_url() . 'site/tag/' . $q . '/';
        $config["total_rows"] = $this->site_model->search_post_count($q);
        $config['per_page'] = '8';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['description'] = $this->settings['site_description'];
        $data['keywords'] = $this->settings['site_tag'];
        $data['url'] = base_url('search/' . $q . '/');
        $data['author'] = $this->settings['site_author'];
        $data['posts'] = $this->site_model->get_search_posts($q, $config['per_page'], $page);
        $data['content'] = $this->load->view('home', $data, true);
        $this->load->view('index', $data);
    }
    
    public function tag(){
        $q = $this->input->get('q', TRUE);
        $data['q'] = $q;
        $data['title'] = "tag" . ': ' . $q;
        $data['description'] = $this->settings['site_description'];
        $data['keywords'] = $q;
        $data['url'] = base_url('tag/' . $q . '/');
        $data['author'] = $this->settings['site_author'];
        $data['posts'] = $this->tag_model->get_search_post($q);
        $data['content'] = $this->load->view('home', $data, true);
        $this->load->view('index', $data);
    }

    public function subscribe() {
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[subscriber.email]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
                )
        );
        if ($this->form_validation->run() === FALSE) {
            
        } else {
            $email = $this->input->post('email', true);
            $this->site_model->add_subscriber($email);
            redirect($this->agent->referrer());
        }
        redirect($this->agent->referrer());
    }
    
    public function error404() {
        $data['title'] = '404';

        $data['description'] = $this->settings['site_description'];
        $data['keywords'] = $this->settings['site_tag'];
        $data['url'] = base_url('error404/');
        $data['author'] = $this->settings['site_author'];
        $data['content'] = $this->load->view('error404', $data, true);
        $this->load->view('index', $data);
    }

}
