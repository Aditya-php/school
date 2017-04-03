<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Account Controller
 *
 * @package		Account
 * @category	Account 
 * @author		Kumar Gaurav
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class Admin extends CI_Controller {
    
     /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
		$user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		
    }
}
