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

class Site_mod extends CI_Model {

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
    
    /**
     * add_user
     * This function add new user
     * 
     * @access	public
     * @param  array
     * @return	array
     */
    public function add_user()
    {
    	$this->form_validation->set_rules('user_name',"Username", 'trim|required|is_unique[users.user_name]');
        $this->form_validation->set_rules('first_name',"First Name", 'trim|required');
        $this->form_validation->set_rules('last_name',"Last Name", 'trim|required');
        if($this->input->post('is_service_provider', true) == 1)
        {
			$this->form_validation->set_rules('business_name',"Business Name", 'trim|required');
		}
        $this->form_validation->set_rules('password',"Password", 'trim|required');
        $this->form_validation->set_rules('confirm_password',"Confirm Password", 'trim|required');
        $this->form_validation->set_rules('email',"Email Addess", 'trim|required|email|is_unique[users.email]');
        if ($this->form_validation->run() === false) {
			$res['error_msg']	=	validation_errors();
			$res['status']		=	'error';
			
			return json_encode($res);
		}
		$confirm_password = $this->input->post('confirm_password', true);
        $password = $this->input->post('password', true);
		if ($password != $confirm_password) {
            $return['error_msg']	=	"Password and Confirm password must be same";
            $return['status']		=	'error';
            return json_encode($return);
        }
        
        //----------------------------------------------
        $username = $this->security->xss_clean($this->input->post('username', true));
        $password = $this->security->xss_clean($this->input->post('password', true));
        $salt = '';
        $salt = generate_salt();
        $salt = '$6$rounds=5000$' . $salt . '$';
        $password_encrypt = crypt($password,$salt);
        $arr_encrypt = explode('$', $password_encrypt);
        $password = $arr_encrypt['4'];
        //-----------------------------------------
        $data['user_name'] = strtolower($this->input->post('user_name', true));
        $data['first_name'] = strtolower($this->input->post('first_name', true));
        $data['last_name'] = strtolower($this->input->post('last_name', true));      
              
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $password;
        $data['salt'] = $salt;
        if($this->input->post('is_service_provider', true) == 0)
        {
			$data['user_type'] = 3;
		}else if($this->input->post('is_service_provider', true) == 1)
		{
			$data['user_type'] = 2;
			$data['business_name'] = $this->input->post('business_name', true);
		}
		$data['created'] 	= current_date();
        $data['modified'] 	= current_date();       
        $data['status'] 	= 'active';
        $this->db->insert("users",$data);
        $ins_id = $this->db->insert_id();
        if ($ins_id) {

            $res['status'] = 'success';
            $res['id'] = $ins_id;
        }else {
            $res['error_msg']	=	"Somthing wrong try again";
            $res['status']		=	'error';          
        }
		return json_encode($res);
        
    }
    /*End of function*/
    
    
	function fetch_events()
	{
		$this->db->select('m.id,m.title,m.description,m.startdate,m.enddate');
		$this->db->from('manage_event m');
		$this->db->join('users u','u.id = m.added_by','left');
		$this->db->where('m.startdate >=',date("Y-m-d h:i:s"));
		$this->db->where('m.status','1');
		$this->db->where('u.status','active');
		$this->db->where('m.is_delete','0');
		$this->db->where('u.is_delete','0');
		$this->db->order_by('m.id','desc');
		$this->db->limit(6);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;
	}
	
	function fetch_article()
	{
		$this->db->select('a.id,a.title,a.description,a.article_image');
		$this->db->from('articles a');
		$this->db->join('users u','u.id = a.added_by','left');
		$this->db->where('a.status','1');
		$this->db->where('u.status','active');
		$this->db->where('u.is_delete','0');
		$this->db->order_by('a.id','desc');
		$this->db->limit(6);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function fetch_services()
	{
		/* $this->db->select('id,title,description,service_image,business_phone,service_provider_id');
		$this->db->from('manage_service');
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
		$this->db->limit(6); */
		
		$this->db->select('m.id,m.title,m.description,m.service_image,m.business_phone,m.service_provider_id');
		$this->db->from('manage_service m'); 
	    $this->db->join('users u', 'u.id=m.service_provider_id', 'left');
		$this->db->where('m.status','1');
		$this->db->where('u.status','active');
		$this->db->where('u.is_delete','0');
		$this->db->order_by('m.id','desc');
		$this->db->limit(6);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	
    
}
