<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Auth Model 
 *
 * @package		Auth
 * @subpackage	Models
 * @category	Authentication 
 * @author		Arvind Soni
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class Membershipplan_mod extends CI_Model {

    var $user_table	=	"users";

    /**
     * Constructor
    */
    function __construct() {
            parent::__construct();
    }
    /**
     * End
    */

    /**
     *
     * This function to fetch All US states
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */
    function fetch_states()
    {
        $this->db->select("*");
        $this->db->where('id_country','254');
        return $this->db->get('tbl_state')->result();
    }
    /*End of function*/

    /**
     *
     * This function to fetch cities 
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */
    function fetch_cities()
    {
        $this->input->post('state');
        
        $this->db->select("*");
        $this->db->where('id_state',  ID_decode($this->input->post('state')));
        return $this->db->get('tbl_cities')->result();
    }
    /*End of function*/
}
