<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User Controller
 *
 * @package		User
 * @category	User 
 * @author		
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */
class Vendors extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
      $user_type=array('4'); //allowed user type to access
        is_protect($user_type);
        $this->load->model('vendor_mod');
    }

    /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */
    public function index() {
        $data["result"] = array();
        $data['title'] = "C3 || vendor";
        $data['breadcum'] = array("" => "Dashboard", "" => "Dashboard");
        $page = 'vandor/dashboard_admin';
        $data['page'] = $page;
        _layout_vendor($data);
    }
    

}
