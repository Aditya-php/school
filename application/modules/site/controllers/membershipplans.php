<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *  Site Controller
 *
 * @package		Site
 * @category            Site 
 * @author		Ankit Rajput 
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since		Version 1.0
 */

class Membershipplans extends CI_Controller {

    private $data = array();

    /**
     * Constructor
     * This function to retrive college instance from url and get instance ID and store in session
     * 
     * @access	public
     * @return	
     */
    function __construct() 
    {
        parent::__construct();
        $this->load->model('membershipplan_mod');
    }

    /**
     *index
     *
     * This function dispaly main site page
     * 
     * @access	public
     * @return	html data
     */
    public function index() 
    {   
        $data['page']           =   'membershipplan/membershipplan';
        $data['breadcum']	=   array('"'.base_url().'"' => "Home",""=>"Membership Plans");
        $data['title']          =   "Directory || Membership Plans";
        /*Fetching US States*/
        $data['states']         =   $this->membershipplan_mod->fetch_states();
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/    
}
?>