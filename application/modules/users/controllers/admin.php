<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {
        // Set the theme
        //$this->template->set_theme('default');
        // Set the meta data
        $this->template->set_meta_data('description', 'Free Web tutorials');
        // Set the title for current page
        $this->template->title('title123');
        // Set the JS for this view
        $data['body_top_js'] = array(
            'libraries/jquery-2.1.1.min.js'
        );
        $data['body_bottom_js'] = array(
            'libraries/jquery-2.1.1.min.js'
        );
        // Load template default_theme
        //$this->template->display('default', 'welcome', $data);
        $this->template->load_view('content', $data);
    }

    public function test() {
        // Set the theme
        $this->template->set_theme('simple');
        // Set the meta data
        $this->template->set_meta_data('description', 'Free Web tutorials');
        // Set the title for current page
        $this->template->title('simple theme');
        // Set the JS for this view
        $data['body_top_js'] = array(
            'libraries/jquery-2.1.1.min.js'
        );
        $data['body_bottom_js'] = array(
            'libraries/jquery-2.1.1.min.js'
        );
        // Load template default_theme
        //$this->template->display('default', 'welcome', $data);
        $this->template->load_view('content', $data);
    }
    public function test1234() { 
        $this->load->view('welcome');
    }

}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
?>
