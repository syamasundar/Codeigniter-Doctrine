<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User Controller Class
 *
 * @package             CodeIgniter
 * @category            controllers
 * @author		Nageswara Rao S <nag.samayam@gmail.com>
 * @copyright           2014 Janaagraha
 */
class User extends MX_Controller {

    /**
     * Constructor
     * 
     * Set the preferences
     */
    public function __construct() {
        parent::__construct();
        // Load site module models
        DataMapper::add_model_path(array(APPPATH . 'modules/site'));
        $this->load->library('login_manager', array('autologin' => FALSE));
    }

    // --------------------------------------------------------------------

    /**
     * Index Page for this controller. - User dashboard
     *
     * Maps to the following URL
     * 		http://cms.ichangemycity.in/users/user
     * 	- or -  
     * 		http://cms.ichangemycity.in/users/user/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://cms.ichangemycity.in/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/users/<method_name>
     */
    public function index() {
        $user = $this->login_manager->get_user();
        if ($user !== FALSE) {
            // already logged in, redirect to welcome page
            $data = array();
            $data['user_obj'] = $user;
            $this->template->set_theme('default');
            $this->template->title('User activity feed');
            $this->breadcrumb->append('Home', '/');
            /* $this->breadcrumb->add_multiple(
              array('Home' => '/',
              'Page1' => '/page1',
              'Page2' => 'page1/page2',
              'Page3' => 'page2/page3'
              )); */

            $this->output->enable_profiler(TRUE);
            $this->template->load_view('index', $data);
        } else {
            redirect('users/user/login');
        }
    }

    // --------------------------------------------------------------------
    /**
     * user registration
     * 
     * @access public
     */
    public function add_user() {
        // Create user model object
        $user_obj = new UserModel();

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $user_obj->user_name = 'nagsamayam12';
        $user_obj->mail = 'nag.samayaml12@abc1.com';
        $user_obj->password = 'Welcome123@';
        $user_obj->confirm_password = 'Welcome123@';
        $user_obj->full_name = 'Nageswarao';
        $user_obj->mobile = 7845464463;
        $user_obj->gender = 'M';
        $user_obj->role_id = 3;
        //$user_obj->file_id = 0;
        $user_obj->user_source_id = 1;
        $user_obj->access = $user_obj->login = date('Y-m-d H:i:s');
        $user_obj->ip = ip2long($this->input->ip_address());
        $user_obj->user_agent = $this->input->user_agent();


        // Attempt to save user
        try {
            if ($user_obj->save()) {
                // Saved successfully
                echo 'success';
                if ($this->_after_save($user_obj)) {
                    echo 'url inserted';
                }
            } else {
                // Show all errors
                echo $user_obj->error->string;

                // Or just show the transaction error
                echo $user_obj->error->transaction;
            }
        } catch (Exception $error) {
            log_message('error', 'Invalid query: ' . $error->getMessage());
            echo $error->getMessage();
        }
    }

    // --------------------------------------------------------------------

    /**
     * 
     * Get all users details
     * 
     * @access public
     * @return object
     */
    public function get_users() {
        $user = new UserModel();
        $user->get();
        foreach ($user as $obj) {

            echo $obj->mobile;
        }
        //echo $user->mail;
        //print_r($user);
    }

    // --------------------------------------------------------------------

    /**
     * 
     * Get a particular user details
     * 
     * @access public
     * @return object
     */
    public function get_user($id) {
        $user = new UserModel();
        $user->get_by_id($id);
        foreach ($user as $obj) {

            echo $obj->mobile;
        }
        //echo $user->mail;
        //print_r($user);
    }

    // --------------------------------------------------------------------

    /**
     * 
     * Update a particular user details
     * 
     * @access public
     * @return object
     */
    public function edit_user($id) {
        $user = new UserModel();
        $user->get_by_id($id);
        foreach ($user as $obj) {

            echo $obj->mobile;
        }
        //echo $user->mail;
        //print_r($user);
    }

    // --------------------------------------------------------------------

    /**
     * 
     * Update a particular user details
     * 
     * @access public
     * @return object
     */
    public function delete_user($id = 0) {
        $user_obj = new UserModel();
        $user_obj->get_by_id($id);
        // Lets check user object exists or not
        if (!$user_obj->exists()) {
            show_error('Invalid User Id');
        }
        if ($this->input->post('deleteok') !== FALSE) {
            $name = $user_obj->full_name;
            // Delete the user
            $user_obj->delete();
            $this->session->set_flashdata('message', 'The user ' . $name . ' was successfully deleted.');
            redirect('users/user');
        } else if ($this->input->post('cancel') !== FALSE) {
            redirect('users/user');
        }
    }

    // --------------------------------------------------------------------

    /**
     * login
     */
    public function login() {

        echo 'welcome to user login page<br/>';
        $user = $this->login_manager->get_user();

        if ($user !== FALSE) {
            // already logged in, redirect to welcome page
            redirect('users/user/welcome');
        }
        // Create a user to store the login validation
        $user = new UserModel();
        $user->user_name = 'nagsamayam1';
        $user->password = 'Welcome123@';
        // get the result of the login request
        $login_redirect = $this->login_manager->process_login($user);
        if ($login_redirect) {
            if ($login_redirect === TRUE) {
                // if the result was simply TRUE, redirect to the welcome page.
                redirect('users/user/welcome');
            } else {
                // otherwise, redirect to the stored page that was last accessed.
                redirect($login_redirect);
            }
        }
        // If login failed - show error messages;
        else {
            echo $user->user_name;
            echo $user->error->error_login;
            exit;
        }
    }

    // --------------------------------------------------------------------

    /**
     * logout
     */
    public function logout() {
        $this->login_manager->logout();
        echo 'We have succesfull loggedout';
        exit;
        //redirect($this->login());
    }

    // --------------------------------------------------------------------

    /**
     * Before save
     * 
     * Actions needs to be taken before register a user
     * @access private
     * 
     */
    private function _before_save() {
        
    }

    /**
     * After save
     * 
     * Actions needs to be taken after register a user
     * @access private
     * 
     */
    private function _after_save($user_obj) {
        // Save into url alias table
        // return $this->url_alias_save($user_obj);
        return TRUE;
    }

    /**
     * Save into url alias table
     */
    public function url_alias_save($obj) {
        // Lets create an object for url alias model
        $url_alias_obj = new UrlAliasModel();
        // Put  supplied data into url alias object
        $url_alias_obj->content_type_id = 1;
        $url_alias_obj->source_id = $obj->id;
        $url_alias_obj->source_path = 'kfjdskj';
        $url_alias_obj->alias = 'fkdsjkfjsk123';
        if ($url_alias_obj->save()) {
            return TRUE;
        }
        // Error in saving url alias
        return FALSE;
    }

    // --------------------------------------------------------------------

    /**
     * user welcome page
     */
    public function welcome() {
        $user = $this->login_manager->get_user();
        //var_dump($user);
        echo 'Welcome user - ' . $user->full_name;
        exit;
    }

}

// END User Class

    /* End of file user.php */
    /* Location: ./application/modules/users/controllers/user.php */
    