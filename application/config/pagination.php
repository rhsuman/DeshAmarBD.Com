<?php

defined('BASEPATH') OR exit('No direct script access allowed');


$config['num_links'] = 2;
$config['use_page_numbers'] = false;
$config['page_query_string'] = false;
$config['query_string_segment'] = 'page';
$config['first_link'] = '&laquo';
$config['last_link'] = '&raquo';

$config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
$config['full_tag_close'] = '</ul>';
$config['num_tag_open'] = '<li class="page-link">';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] = '</span></li>';

$config['next_link'] = '<span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>';
$config['next_tag_open'] = '<li class="page-link">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '<span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>';
$config['prev_tag_open'] = '<li class="page-link">';
$config['prev_tag_close'] = '</li>';

$config['first_link'] = false;
$config['last_link'] = false;
$config['use_page_numbers'] = false;
$config['first_tag_open'] = '<li class="page-link">';
$config['first_tag_close'] = '</li>';

$config['last_tag_open'] = '<li class="page-link">';
$config['last_tag_close'] = '</li>';
