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

class Page_mod extends CI_Model {

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
	
	//function for page view detail
	
	public function listing($page_id)
	{
		$this->db->select('*');
		$this->db->from('static_page');
		$this->db->where('id',$page_id);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->row();
		return $result;
	}
	
	public function inst($table,$data)
	{
		
		if(!empty($data) && !empty($table))
		{
			if(!empty($where_con)){
				foreach($where_con as $key=>$val)
				{
					$this->db->where($key,$val,false);
				}
			} 
			$this->db->insert($table,$data);
			//echo $this->db->last_query();	
			return $this->db->insert_id();
		}
	}
	
}
