<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Site_model
 *
 * @author suman
 */
class Site_model extends CI_Model {
    
    //Get Latest Post
    public function get_post($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by('posts.id', 'desc');
        $this->db->where('posts.status', 1);
        $query = $this->db->get('posts');
        return $query->result();
    }
    
    //Get page By slug
    public function get_page_by_slug($slug) {
        $slug = sql_escape_str($slug);
        $this->db->where('slug', $slug);
        $this->db->where('pages.status', 1);
        $query = $this->db->get('pages');
        return $query->row();
    }
    
    //Get post By Slug
    public function get_post_by_slug($slug) {
        $slug = sql_escape_str($slug);
        $this->db->where('title_slug', $slug);
        $this->db->where('posts.status', 1);
        $query = $this->db->get('posts');
        return $query->row();
    }
    
    //Post Count
    public function get_post_count() {
        $this->db->select('*');
        $this->db->where('posts.status', 1);
        $query = $this->db->get('posts');
        return $query->num_rows();
    }
    
    //Get Category By Slug
    public function get_category_by_slug($slug) {
        $slug = sql_escape_str($slug);
        $this->db->where('slug', $slug);
        $this->db->where('status', 1);
        $query = $this->db->get('categories');
        return $query->row();
    }

    //get post count by category
    public function get_post_count_by_category($type, $category_id) {

        if ($type == "parent") {
            $this->db->select('*');
            $this->db->where('posts.category_id', $category_id);
            $query = $this->db->get('posts');
            return $query->num_rows();
        } else {
            $this->db->select('*');
            $this->db->where('posts.subcategory_id', $category_id);
            $query = $this->db->get('posts');
            return $query->num_rows();
        }
    }

    //get paginated category posts
    public function get_category_posts($type, $category_id, $per_page, $offset) {
        if ($type == "parent") {
            $this->db->select('*');
            $this->db->from('posts');
            $this->db->where('posts.category_id', $category_id);
            $this->db->order_by('posts.id', 'desc');
            $this->db->where('posts.status', 1);
            $query_result = $this->db->get('', $per_page, $offset);
            $result = $query_result->result();
            return $result;
        } else {
            $this->db->select('*');
            $this->db->from('posts');
            $this->db->where('subcategory_id', $category_id);
            $this->db->order_by('posts.id', 'desc');
            $this->db->where('posts.status', 1);
            $query_result = $this->db->get('', $per_page, $offset);
            $result = $query_result->result();
            return $result;
        }
    }

    //Page Menu
    public function page_menu() {
        $this->db->order_by('id', 'ASC');
        $this->db->where('pages.status', 1);
        $query = $this->db->get('pages');
        return $query->result();
    }

    //main menu
    public function get_categories() {
        $this->db->where('categories.status', 1);
        $query = $this->db->get('categories');
        return $query->result();
    }

    //get menu links
    public function get_menu_links() {
        $menu = array();
        $categories = $this->get_categories();
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $item = array(
                    'id' => $category->id,
                    'parent_id' => $category->parent_id,
                    'title' => $category->name,
                    'slug' => $category->slug,
                    'link' => base_url() . "category/" . $category->slug,
                );
                array_push($menu, $item);
            }
        }

        sort($menu);
        return $menu;
    }

    //get sub links
    public function get_sub_links($parent_id) {
        $menu = array();
        $categories = $this->get_categories();
        if (!empty($categories)) {
            foreach ($categories as $category) {
                if ($category->parent_id == $parent_id) {
                    $item = array(
                        'id' => $category->id,
                        'parent_id' => $category->parent_id,
                        'title' => $category->name,
                        'slug' => $category->slug,
                        'link' => base_url() . "category/" . $category->slug,
                    );
                    array_push($menu, $item);
                }
            }
        }

        sort($menu);
        return $menu;
    }

    //Ticker
    public function ticker() {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('status', 1);
        $this->db->where('is_breaking', 1);
        $this->db->limit(10);
        $query = $this->db->get('posts');
        return $query->result();
    }
    
    //Recent Post
    public function get_latest_post() {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('status', 1);
        $this->db->limit(4);
        $query = $this->db->get('posts');
        return $query->result();
    }
    
    //get popular posts
    public function get_popular_post() {
        $this->db->order_by('hit', 'DESC');
        $this->db->where('status', 1);
        $this->db->limit(4);
        $query = $this->db->get('posts');
        return $query->result();
    }
    
    //get popular posts by day
    public function get_popular_posts($day_count)
    {
        $day_count = sql_escape_number($day_count);
        $sql = "SELECT posts.id, posts.title, posts.title_slug, posts.image, auth.username AS username, posts.created_at, hit_counts.count AS hit FROM posts 
                INNER JOIN (SELECT COUNT(post_hits.post_id) AS count, post_hits.post_id FROM post_hits WHERE post_hits.created_at > DATE_SUB(NOW(), INTERVAL ? DAY) GROUP BY post_hits.post_id) AS hit_counts ON hit_counts.post_id = posts.id 
                INNER JOIN auth ON auth.id = posts.user_id 
                INNER JOIN categories ON categories.id = posts.category_id
                WHERE posts.status = 1 ORDER BY hit_counts.count DESC LIMIT 4";
        $query = $this->db->query($sql, array($day_count));
        return $query->result();
    }
    
    //Slider
    public function slider() {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('status', 1);
        $this->db->where('is_slider', 1);
        $query = $this->db->get('posts');
        return $query->result();
    }
    
    //Recommended
    public function featured() {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('status', 1);
        $this->db->where('is_featured', 1);
        $this->db->limit(4);
        $query = $this->db->get('posts');
        return $query->result();
    }
    
    public function get_top_categories() {
        $this->db->where('categories.status', 1);
        $this->db->where('categories.parent_id', 0);
        $query = $this->db->get('categories');
        return $query->result();
    }
    
    //get previous post
    public function get_previous_post($id) {
        $id = sql_escape_number($id);
        $this->db->where('posts.id <', $id);
        $this->db->where('status', 1);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->row();
    }

    //get next post
    public function get_next_post($id) {
        $id = sql_escape_number($id);
        $this->db->where('posts.id >', $id);
        $this->db->where('status', 1);
        $this->db->order_by('posts.id');
        $query = $this->db->get('posts');
        return $query->row();
    }

    //get related posts
    public function get_related_posts($category_id, $post_id) {
        $post_id = sql_escape_number($post_id);
        $category_id = sql_escape_number($category_id);
        $this->db->where('posts.id !=', $post_id);
        $this->db->where('posts.category_id', $category_id);
        $this->db->where('status', 1);
        $this->db->order_by('rand()');
        $this->db->limit(6);
        $query = $this->db->get('posts');
        return $query->result();
    }
    
    
    //get latest posts by category
    public function get_latest_posts_by_category($category, $count)
    {
        $count = sql_escape_number($count);
        $this->db->join('auth', 'posts.user_id = auth.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, auth.username as username');
        $this->db->where('posts.status', 1);
        
        if ($category->parent_id == 0) {
            $this->db->where('category_id', $category->id);
        } else {
            $this->db->where('subcategory_id', $category->id);
        }
        $this->db->order_by('posts.created_at', 'DESC');
        $this->db->limit($count);
        $query = $this->db->get('posts');
        return $query->result();
    }
    
    //increase post hit
    public function increase_post_hit($post)
    {
        if (!empty($post)):
            if (!isset($_COOKIE['var_post_' . $post->id])):
                //increase hit
                helper_setcookie('var_post_' . $post->id, '1');
                $data = array(
                    'hit' => $post->hit + 1
                );

                $this->db->where('id', $post->id);
                $this->db->update('posts', $data);

                $data = array(
                    'post_id' => $post->id,
                );
                $this->db->insert('post_hits', $data);
            endif;
        endif;
    }
    
    //Add Subscriber
    public function add_subscriber($email) {
        $data = array(
            'email' => $email
        );
        return $this->db->insert('subscriber', $data);
    }
    
    function contact($data) {
        // Insert Massage
        $this->db->insert('contact', $data);
    }
    
    function get_contact(){
        $query = $this->db->get('contact');
        return $query->result();
    }
    
    //get username
    public function get_post_by_user($username) {
        $username = sql_escape_str($username);
        $this->db->where('username', $username);
        $query = $this->db->get('auth');
        return $query->row();
    }
    
    //get post count by user
    public function get_post_count_by_user($user_id) {
        $user_id = sql_escape_number($user_id);
        $this->db->select('*');
        $this->db->where('posts.user_id', $user_id);
        $query = $this->db->get('posts');
        return $query->num_rows();
    }
    
    //get paginated Author posts
    public function get_author_posts($user_id, $per_page, $offset) {
        $user_id = sql_escape_number($user_id);
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $query_result = $this->db->get('', $per_page, $offset);
        $result = $query_result->result();
        return $result;
    }
    
    //get search post
    public function get_search_posts($q, $per_page, $offset) {
        $this->db->like('posts.title', $q);
        $this->db->or_like('posts.content', $q);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts', $per_page, $offset);
        return $query->result();
    }

    //get post count by category
    public function search_post_count($q) {
        $this->db->select('*');
        $this->db->where('posts.id', $q);
        $query = $this->db->get('posts');
        return $query->num_rows();
    }
}
