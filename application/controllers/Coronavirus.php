<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coronavirus extends CI_Controller {

    private $data;
    private $url = "https://coronavirus-19-api.herokuapp.com/countries";
    private $covidjson = "covidinfo.json";
    private $geochart_country = array("USA" => "US", "UK" => "United Kingdom", "BD" => "Bangladesh");
    private $continent = array("Europe", "North America", "Asia", "South America", "Africa", "Oceania", "", "World");
    private $img_url = array(
        "US" => "United States",
        "UK" => "United Kingdom",
        "BD" => "Bangladesh",
        "Czechia" => "Czech Republic",
        "UAE" => "United Arab Emirates",
        "Diamond Princess" => "United Kingdom",
        "Bosnia and Herzegovina" => "Bosnia Herzegovina",
        "North Macedonia" => "Macedonia",
        "Réunion" => "France",
        "Faeroe Islands" => "Faroe Islands",
        "Channel Islands" => "Jersey",
        "DRC" => "Denmark",
        "Isle of Man" => "Ireland",
        "Macao" => "China",
        "Saint Martin" => "France",
        "Eswatini" => "Swaziland",
        "Curaçao" => "Curacao",
        "Cabo Verde" => "Cape Verde",
        "Timor-Leste" => "East Timor",
        "St. Vincent Grenadines" => "St Vincent and Grenadines",
        "Saint Lucia" => "St Lucia",
        "Saint Kitts and Nevis" => "St Kitts and Nevis",
        "Congo" => "Democratic Republic Congo Brazzaville",
        "Sint Maarten" => "Netherlands",
        "MS Zaandam" => "Netherlands",
        "British Virgin Islands" => "United Kingdom",
        "Guinea-Bissau" => "Guinea Bissau",
        "St. Barth" => "France",
        "CAR" => "Central African Republic",
        "Caribbean Netherlands" => "Netherlands",
        "World" => "https://www.gstatic.com/images/icons/material/system_gm/1x/language_grey600_24dp.png");

    public function __construct() {
        parent::__construct();
        
        //Settings
        if (empty($this->settings)) {
            $this->settings = $this->settings_model->get_setting();
        }
        //main Menu
        if (empty($this->menu_links)) {
            $this->menu_links = $this->site_model->get_menu_links();
        }
        //Page Meu
        if (empty($this->pagemenu)) {
            $this->pagemenu = $this->site_model->page_menu();
        }
        //Ticket
        if (empty($this->tickers)) {
            $this->tickers = $this->site_model->ticker();
        }
        //Popular post
        if (empty($this->populars)) {
            $this->populars = $this->site_model->get_popular_post();
        }
        //Recent post
        if (empty($this->latest)) {
            $this->latest = $this->site_model->get_latest_post(4);
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

    public function index() {
        $data['title'] = "Coronavirus Map";
        
        $data['description'] = $this->settings['site_description'];
        $data['keywords'] = $this->settings['site_tag'];
        $data['url'] = base_url('coronavirus');
        
        $data['author'] = $this->settings['site_author'];
        
        $data['RESULT_DATA_COUNTRY'] = $this->fetch_data();
        usort($data['RESULT_DATA_COUNTRY'], array($this, 'cmp'));

        $data['TOTAL_CASES'] = number_format($data['RESULT_DATA_COUNTRY'][0]['cases']);
        $data['TOTAL_DEATHS'] = number_format($data['RESULT_DATA_COUNTRY'][0]['deaths']);
        $data['TOTAL_RECOVERED'] = number_format($data['RESULT_DATA_COUNTRY'][0]['recovered']);
        $data['NEW_CASES'] = number_format($data['RESULT_DATA_COUNTRY'][0]['todayCases']);
        
        $data['BD_TOTAL_CASES'] = number_format($data['RESULT_DATA_COUNTRY'][34]['cases']);
        $data['BD_TOTAL_DEATHS'] = number_format($data['RESULT_DATA_COUNTRY'][34]['deaths']);
        $data['BD_TOTAL_RECOVERED'] = number_format($data['RESULT_DATA_COUNTRY'][34]['recovered']);
        $data['BD_NEW_CASES'] = number_format($data['RESULT_DATA_COUNTRY'][34]['todayCases']);

        $data['RESULT_DATA_COUNTRY'] = array_splice($data['RESULT_DATA_COUNTRY'], 1);
        $this->load->view('coronavirus_vw', $data);
    }

    private function fetch_data() {
        $data = array();
        $contents = file_get_contents($this->url);
        if ($contents === false || empty($contents) || $contents === NULL)
            $data = json_decode(file_get_contents(base_url($this->covidjson)), true);
        else
            $data = json_decode($contents, true);

        $data = $this->change_country($data, $this->geochart_country);
        $data = $this->change_image_url($data, $this->img_url);
        return $data;
    }

    private function change_country($data, $geochart_country) {
        $i = 0;
        foreach ($data as $each) {
            if (array_key_exists($each['country'], $geochart_country))
                $data[$i]['country'] = $geochart_country[$each['country']];
            $i++;
        }
        return $data;
    }

    private function cmp($a, $b) {
        if ($a['cases'] == $b['cases'])
            return 0;
        return ($a['cases'] < $b['cases']) ? 1 : -1;
    }

    private function change_image_url($data, $img_url) {
        $i = 0;
        foreach ($data as $each) {
            if (array_key_exists($each['country'], $img_url))
                $data[$i]['image'] = $img_url[$each['country']];
            else
                $data[$i]['image'] = $each['country'];
            $i++;
        }
        return $data;
    }

}
