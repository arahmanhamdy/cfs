<?php
class Site_settings {

    //holds the CI instance
    protected $CI;

    //the array the settings will be stored as
    public $site_config = array();

    //
    public function __construct()
    {
        //load CI instance
        $this->CI =& get_instance();

        //fire the method loading the data
        $this->init();
    }

    public function init()
    {
        //load the model that gets the data
        $this->CI->load->model('setting_model');

        //retrieve/set the data
        $this->site_settings = $this->CI->setting_model->get_all();
    }
}