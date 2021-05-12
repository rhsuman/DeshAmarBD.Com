<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * My Helpers
 *
 */
//get user by id
if (!function_exists('get_user')) {

    function get_user($user_id) {
        // Get a reference to the controller object
        $ci = & get_instance();
        return $ci->auth_model->get_usersname($user_id);
    }

}

//get category
if (!function_exists('helper_get_pages')) {

    function helper_get_pages($page_id) {
        $ci = & get_instance();
        return $ci->page_model->get_page($page_id);
    }

}

//get category
if (!function_exists('helper_get_category')) {

    function helper_get_category($category_id) {
        // Get a reference to the controller object
        $ci = & get_instance();
        return $ci->category_model->get_category($category_id);
    }

}

//get sub menu links
if (!function_exists('helper_get_sub_menu_links')) {

    function helper_get_sub_menu_links($parent_id) {
        // Get a reference to the controller object
        $ci = & get_instance();
        return $ci->site_model->get_sub_links($parent_id);
    }

}

//Comment Count
if (!function_exists('comment_count')) {

    function helper_comment_count($post_id) {
        // Get a reference to the controller object
        $ci = & get_instance();
        return $ci->comment_model->comment_count($post_id);
    }

}

//clean slug
if (!function_exists('clean_slug')) {
    function clean_slug($slug)
    {
        $ci =& get_instance();
        $slug = urldecode($slug);
        $slug = $ci->security->xss_clean($slug);
        return $slug;
    }
}

//Generator
function time_ago($timestamp) {
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes = round($seconds / 60);           // value 60 is seconds
    $hours = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
    $days = round($seconds / 86400);          //86400 = 24 * 60 * 60;
    $weeks = round($seconds / 604800);          // 7*24*60*60;
    $months = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
    $years = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
    if ($seconds <= 60) {
        return "just_now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "1 " . "minute" . " " . "ago";
        } else {
            return $minutes . " " . "minutes" . " " . "ago";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "1 " . "hour" . " " . "ago";
        } else {
            return $hours . " " . "hours" . " " . "ago";
        }
    } else if ($days <= 30) {
        if ($days == 1) {
            return "1 " . "day" . " " . "ago";
        } else {
            return $days . " " . "days" . " " . "ago";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "1 " . "month" . " " . "ago";
        } else {
            return $months . " " . "months" . " " . "ago";
        }
    } else {
        if ($years == 1) {
            return "1 " . "year" . " " . "ago";
        } else {
            return $years . " " . "years" . " " . "ago";
        }
    }
}

//SQL escape str
if (!function_exists('sql_escape_str')) {

    function sql_escape_str($str) {
        $ci = & get_instance();
        $str = $ci->security->xss_clean($str);
        $str = str_slug($str);
        $str = mysqli_real_escape_string($ci->db->conn_id, $str);
        return $str;
    }

}

//generate slug
if (!function_exists('str_slug')) {

    function str_slug($str) {
        return url_title(convert_accented_characters($str), "underscore", true);
    }

}

//SQL escape number
if (!function_exists('sql_escape_number')) {

    function sql_escape_number($num) {
        $ci = & get_instance();
        $num = $ci->security->xss_clean($num);
        $num = str_slug($num);
        $num = intval($num);
        $num = mysqli_real_escape_string($ci->db->conn_id, $num);
        return $num;
    }

}

//set cookie
if (!function_exists('helper_setcookie')) {
    function helper_setcookie($name, $value)
    {
        setcookie($name, $value, time() + (86400 * 30), "/"); //30 days
    }
}

//delete cookie
if (!function_exists('helper_deletecookie')) {
    function helper_deletecookie($name)
    {
        if (isset($_COOKIE[$name])) {
            setcookie($name, "", time() - 3600, "/");
        }
    }
}

//menu ancher
if (!function_exists('menu_anchor')) {

    function menu_anchor($uri = '', $title = '', $attributes = '') {
        $title = (string) $title;

        if (!is_array($uri)) {
            $site_url = (!preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;
        } else {
            $site_url = site_url($uri);
        }

        if ($title == '') {
            $title = $site_url;
        }

        if ($attributes != '') {
            $attributes = _parse_attributes($attributes);
        }
        $current_url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $attributes .= ($site_url == $current_url) ? 'class="active nav-link"' : 'class="nav-link"';
        return '<li class="nav-item"><a  ' . $attributes . ' href="' . $site_url . '">' . $title . '</a></li>';
    }

}
?>