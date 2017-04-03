<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Dashboard Model 
 *
 * @package		Auth
 * @subpackage	Models
 * @category	Authentication 
 * @author		Arvind Soni
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class Dashboard_mod extends CI_Model {

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
   
   
	 function count_details()
	 {
			$query1 = $this->db->query("select count(id) as id from users where user_type = '3'")->result();
			$query2 = $this->db->query("select count(id) as id from users where user_type = '2'")->result();
			$query3 = $this->db->query("select count(id) as id from feedback")->result();
			
			$rs['total_user']         = isset($query1)? $query1 : '';
			$rs['total_sp']           = isset($query2)? $query2 : '';
			$rs['total_feedback']     = isset($query3)? $query3 : ''; 
			
			return json_encode($rs);
	 }
	
	
	 function get_sp_list()
	 {
		 
		 $this->db->select('distinct(f.manage_service_id),u.business_name,u.first_name,u.last_name,m.service_provider_id');
		 $this->db->from('feedback f');
		 $this->db->join('manage_service m','f.manage_service_id = m.id','left');
		 $this->db->join('users u','m.service_provider_id = u.id','left');
		 $this->db->where('f.status','1');
		 $this->db->where('u.status','active');
		 $this->db->where('u.is_delete','0');
		 $query = $this->db->get();
		 $result = $query->result();
		 
		 if(!empty($result))
		 {
			 foreach($result as $result1)
			 {
				 
				 $rat_query = $this->db->query("select sum(rating) as rating, count(id) as id from feedback where manage_service_id = '$result1->manage_service_id' order by (select sum(rating) as rating from feedback where manage_service_id='$result1->manage_service_id') desc Limit 10")->result();
				 //pr($rat_query); die;
				 
				 $res1['total_rating']          = (round($rat_query[0]->rating / $rat_query[0]->id,1));
                 $res1['business_name']	        = $result1->business_name;
                 $res1['service_provider_id']	= $result1->service_provider_id;
                 $res1['name']	                = $result1->first_name.' '.$result1->last_name;
                 			 
                 
				 $rs[] = $res1;
					
			 }
			
            return json_encode($rs);			
		 }
	 }
   
         
}
