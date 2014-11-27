<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Roles Class
 *
 * Transforms roles table into an object.
 *
 * @package             Datamapper
 * @category            Models
 * @author		Nageswara Rao S
 */
class RoleModel extends DataMapperExt {

    public $table = 'roles';
    // --------------------------------------------------------------------
    // Relationships
    // --------------------------------------------------------------------
    public $has_many = array(
        'user' => array(
            'class' => 'usermodel',
            'other_filed' => 'role',
        //'join_self_as' => 'role',
        )
    );

    // --------------------------------------------------------------------
    // Validation
    // --------------------------------------------------------------------
}

// END Role Class

    /* End of file rolemodel.php */
    /* Location: ./application/modules/users/models/rolemodel.php */
    