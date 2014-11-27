<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User Class
 *
 * Transforms users table into an object.
 *
 * @package             Datamapper
 * @category            Models
 * @author		Nageswara Rao S
 */
class UserModel extends DataMapperExt {

    public $table = 'users';
    // --------------------------------------------------------------------
    // Relationships
    // --------------------------------------------------------------------
    public $has_one = array(
        'role' => array(
            'class' => 'rolemodel',
            'other_field' => 'user',
        //'join_other_as' => 'role',
        )
    );
    // Include the custom rules extension
    var $extensions = array('custom_rules');
    // --------------------------------------------------------------------
    // Validation
    // --------------------------------------------------------------------

    var $validation = array(
        /**
         *
         * @Column(name="user_name", type="string", length=64, nullable=false, unique=true)
         */
        'user_name' => array(
            'rules' => array('required', 'trim', 'min_length' => 10, 'unique')
        ),
        /**
         *
         * @Column(name="mail", type="string", length=255, nullable=true, unique=true)
         */
        'mail' => array(
            'rules' => array('required', 'trim', 'unique', 'min_length' => 5, 'valid_email', 'my_validate_email')
        ),
        /**
         *
         * @Column(name="password", type="string", length=255, nullable=false, unique=false)
         */
        'password' => array(
            'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 100, 'hash_password'),
            'type' => 'password'
        ),
        'confirm_password' => array(
            'rules' => array('hash_password', 'matches' => 'password'),
            'type' => 'password'
        ),
        /**
         *
         * @Column(name="full_name", type="string", length=255, nullable=false, unique=false)
         */
        'full_name' => array(
            'rules' => array('required', 'trim', 'min_length' => 3, 'my_validate_name', 'sanitize_name')
        ),
        /**
         *
         * @Column(name="mobile", type="integer", length=10, nullable=false, unique=true)
         */
        'mobile' => array(
            'rules' => array('required', 'trim', 'exact_length' => 10, 'unique', 'my_validate_mobile')
        ),
        /**
         *
         * @Column(name="gender", type="string", length=1, nullable=false, unique=true)
         */
        'gender' => array(
            'rules' => array('requied', 'trim', 'exact_length' => 1, 'my_validate_gender')
        )
    );

    // --------------------------------------------------------------------

    /**
     * Login
     *
     * Authenticates a user for logging in.
     *
     * @access	public
     * @return	bool
     */
    public function login() {
        // backup username for invalid logins
        $uname = $this->user_name;

        // Create a temporary user object
        $tmp_user_obj = new UserModel();

        // Get this users stored record via their username
        $array = array('user_name' => $uname, 'is_active' => '1');
        $tmp_user_obj->where($array)->get();
        if ($tmp_user_obj->exists()) {

            // Validate and get this user by their property values,
            // this will see the 'encrypt' validation run, encrypting the password with the salt
            if ($this->validate()) {
                if ($this->password === $tmp_user_obj->password) {
                    $this->get();
                    // If the username and encrypted password matched a record in the database,
                    // this user object would be fully populated, complete with their ID.
                    // If there was no matching record, this user would be completely cleared so their id would be empty.
                    if ($this->exists()) {
                        // Login succeeded
                        return TRUE;
                    }
                } else {
                    // Login failed, so set a custom error message
                    //$this->error_message('login', 'Invalid password');
                    $this->error_message('error_login', $this->localize_label('error_login'));

                    // restore username for login field
                    $this->user_name = $uname;

                    return FALSE;
                }
            }
        } else {
            // User existed but blocked, so set a custom error message
            //$this->error_message('user_blocked', 'Invalid username');
            $this->error_message('error_login', $this->localize_label('error_login_block'));

            // restore username for login field
            $this->user_name = $uname;

            return FALSE;
        }
    }

}

// END User Class

    /* End of file usermodel.php */
    /* Location: ./application/modules/users/models/usermodel.php */
    