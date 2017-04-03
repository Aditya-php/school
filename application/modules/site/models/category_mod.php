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

class Category_mod extends CI_Model {

    var $user_table	=	"users";
    var $tbl_users				=	"users";
    var $tbl_service_category	=	"service_category";
    var $tbl_manage_service		=	"manage_service";
    var $tbl_category			=	"category";

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
     * This function login authenticate 
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */

	function login_authorize($data=array()) 
        {    
            $this->db->select('*');
            $this->db->where('user_name',$data['username']);
            $this->db->where('password',$data['password']);
            return $query          =	$this->db->get($this->user_table)->result();
        }
		
	function listing($arr	=	null)
	{
		$this->db->select('id,title');
		$this->db->from('category');
		$this->db->where('status','1');
		$this->db->where('is_delete','0');
		if(@$arr['item'])
		$this->db->like('title', $arr['item'], 'after');
		
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
		
	}	
	
	function detail_view($id1)
	{
		$this->db->select('id,title,description');
		$this->db->from('category');
		$this->db->where('id',$id1);
		$this->db->where('status','1');
		$this->db->where('is_delete','0');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
		
	}
	
	
	/**
     * get_service_providers_detail
     *
     * This function fatch fatch service provider details and service info
     * 
     * @access	public
     * @return	html data
     */
    public function get_service_providers_detail($category_id = null) 
    {   
	   
		$this->db->select("c.title as category_name,sc.category_id,CONCAT(u.first_name,' ',u.last_name) as service_provider,u.contact_number,u.email,u.business_name,u.profile_image,u.address,s.title,s.service_image,s.description,s.id as service_id,s.state_id,s.city_id,s.location,s.contact_email,s.business_phone",FALSE);
		$this->db->join("$this->tbl_manage_service as s","s.service_provider_id =sc.service_provider_id","left");
		$this->db->join("$this->tbl_category as c","c.id=sc.category_id","left");
		$this->db->join("$this->tbl_users as u","u.id=s.service_provider_id","left");
		$this->db->where("sc.category_id",$category_id);
		$this->db->where("u.status",'active');
		$this->db->where("u.is_delete",'0');
		$query	=	$this->db->get("$this->tbl_service_category as sc");
				
        if($query->num_rows()>0)
   		{
				$rs['result']	=	$query->result();
				$rs['status']	=	"success";
				
		}else{
				$rs['result']	=	'';
				$rs['status']	=	"error";
		}
        return json_encode($rs);
    }
    /*End of Function*/
	
	/* function alphabet_filter($num)
	{
		$this->db->select('id,title');
		$this->db->from('category');
		$this->db->where('status','1');
		$this->db->where('is_delete','0');
		$this->db->like('title', $num, 'after'); 
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;
	} */
}
