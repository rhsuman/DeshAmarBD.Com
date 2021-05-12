<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Tag_model
 *
 * @author suman
 */
class Tag_model extends CI_Model {

    //Post Tag
    public function add_post_tags($post_id) {
        $post_id = sql_escape_number($post_id);
        //tags
        $tags = trim($this->input->post('tags', true));

        $tags_array = explode(",", $tags);
        if (!empty($tags_array)) {
            foreach ($tags_array as $tag) {
                $tag = trim($tag);
                if (strlen($tag) > 1) {
                    $data = array(
                        'post_id' => $post_id,
                        'tag' => trim($tag),
                        'tag_slug' => str_slug(trim($tag)),
                    );
                    if (empty($data["tag_slug"]) || $data["tag_slug"] == "-") {
                        $data["tag_slug"] = "tag-" . uniqid();
                    }
                    //insert tag
                    $this->db->insert('tags', $data);
                }
            }
        }
    }

    //Get tags
    public function get_tags($post_id) {
        $post_id = sql_escape_str($post_id);
        $query = $this->db->get_where('tags', array('post_id' => $post_id));
        return $query->result_array();
    }
    
    public function get_search_post($q) {
        $this->db->like('tags.tag', $q);
        $this->db->join('tags', 'posts.id = tags.post_id');
        //$this->db->where('tags.tag_slug', $slug);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //update post tags
    public function update_post_tags($post_id) {
        $post_id = sql_escape_str($post_id);
        //delete old tags
        $this->delete_post_tags($post_id);
        //add new tags
        $tags = trim($this->input->post('post_tag', true));
        $tags_array = explode(",", $tags);
        if (!empty($tags_array)) {
            foreach ($tags_array as $tag) {
                $tag = trim($tag);
                if (strlen($tag) > 1) {
                    $data = array(
                        'post_id' => $post_id,
                        'tag_title' => trim($tag),
                        'tag_slug' => str_slug(trim($tag)),
                    );
                    if (empty($data["tag_slug"]) || $data["tag_slug"] == "-") {
                        $data["tag_slug"] = "tag-" . uniqid();
                    }
                    //insert tag
                    $this->db->insert('tag', $data);
                }
            }
        }
    }

    //delete tags
    public function delete_post_tags($post_id) {
        $post_id = sql_escape_number($post_id);
        //find tags
        $tags = $this->get_tags($post_id);
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                //delete
                $this->db->where('tag_id', $tag->tag_id);
                $this->db->delete('tag');
            }
        }
    }

}
