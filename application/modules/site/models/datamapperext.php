<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * DataMapperExt Class
 *
 * Extends the DataMapper class
 *
 * @package             Datamapper
 * @category            Extensions
 * @author		Nageswara Rao S
 */
class DataMapperExt extends DataMapper {

    /**
     * constructor
     * 
     * @param int $id
     */
    public function __construct($id = NULL) {
        parent::__construct($id);
    }

    /**
     * save
     * 
     */
    // --------------------------------------------------------------------

    function _save($posts) {
        $CI = & get_instance();
        if (is_array($posts)) {
            foreach ($posts as $key => $value) {
                $this->$key = $CI->security->xss_clean($value);
            }
            return $this->save();
        }
    }

    // --------------------------------------------------------------------

    /**
     * get_once
     * 
     * only get if $this wasn't already loaded
     * 
     * @access public
     * @return mixed 
     */
    function get_once() {
        if (!$this->exists()) {
            $this->get();
        }
        return $this;
    }

    // --------------------------------------------------------------------

    /**
     * Encrypt (prep)
     *
     * Encrypts this objects password with a random salt.
     *
     * @access	private
     * @param	string
     * @return	void
     */
    function _encrypt($field) {
        // Don't encrypt an empty string
        if (!empty($this->{$field})) {
            // Generate a random salt if empty
            if (empty($this->salt)) {
                $this->salt = md5(uniqid(rand(), true));
            }

            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }

    // --------------------------------------------------------------------

    /**
     * Sanitize name (prep)
     * 
     * Sanitize the full name properly

     * @access	private
     * @param	string
     * @return	void
     */
    function _sanitize_name($field) {
        // Don't sanitize an empty string
        if (!empty($this->{$field})) {
            $this->{$field} = strip_tags($this->{$field});
            $this->{$field} = stripslashes($this->{$field});
            $this->{$field} = htmlspecialchars($this->{$field});
            $this->{$field} = ucwords(preg_replace('#\s{2,}#', ' ', $this->{$field}));
        }
    }

    // --------------------------------------------------------------------
    function _hash_password($field) {
        // Don't encrypt an empty string
        if (!empty($this->{$field})) {
            // Generate a random salt if empty

            $this->{$field} = md5($this->{$field});
        }
    }

}
