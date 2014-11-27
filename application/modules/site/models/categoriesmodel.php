<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//require_once APPPATH.'models/datamapperext.php';	
/**
 * CategoriesModel Model Class
 *
 * Transforms Categories table into an object.
 *
 * @package             Sites
 * @category            Models
 * @author				syamasundar chettu
 */
class CategoriesModel extends DataMapperExt {
	var $table = 'categories';
    // Include the custom rules extension
    var $extensions = array('custom_rules');
    // --------------------------------------------------------------------
    
    // following lines for server side validation
   /* var $validation = array(
        
		'location' => array(
            'label' => 'location',
            'rules' => array('required', 'trim', 'unique', 'min_length' => 5, 'valid_email', 'my_validate_location')
        ),
		'catagory' => array(
            'label' => 'catogiry',
            'rules' => array('required', 'trim', 'unique', 'min_length' => 5, 'valid_email', 'my_validate_category')
        ),
		'complaint_description' => array(
            'label' => 'complaint',
            'rules' => array('required', 'trim', 'unique', 'min_length' => 5, 'valid_email', 'my_validate_complaint')
        ),
    );*/

    // --------------------------------------------------------------------
}

// END PostComplaint Class

/* End of file PostComplaints.php */
    