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

class Service_mod extends CI_Model {

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
     * This function to insert data
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */
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
	 /*End of function*/
	 
	
	 public function detail_view($id)
	 {
		$query=$this->db->query("SELECT id,title,description,venue,email,website,contact_no,added_by,startdate FROM manage_event WHERE is_delete = '0' and status='1' and id='$id' ");
		$data = $query->row();
		return $data;
	 }
	 
	 public function add($image,$video)
	 {
		$this->form_validation->set_rules('category_id',"category", "required");
		$this->form_validation->set_rules('title',"title", "trim|required|min_length[5]|max_length[20]");
        $this->form_validation->set_rules('business_phone',"Business Phone", "trim|required|regex_match[/^[0-9]{10}$/]");
		$this->form_validation->set_rules('contact_email',"Contact Email", "trim|required|valid_email");
        $this->form_validation->set_rules('website',"website", "trim|required");
		$this->form_validation->set_rules('description',"description", "trim|required|min_length[0]|max_length[300]");
        $this->form_validation->set_rules('full_desc',"Full description", "trim|required");
		$this->form_validation->set_rules('state_id',"State", "trim|required");
        $this->form_validation->set_rules('city_id',"City", "trim|required");
		$this->form_validation->set_rules('location',"Location", "trim|required");
		
        if ($this->form_validation->run() == false) {

            $res['error_msg'] = validation_errors();
            $res['status'] = 'error';
            return json_encode($res);
        }else{
        
	        $data['title']				 = $this->input->post('title', true);
	        $data['business_phone']	     = $this->input->post('business_phone', true);
	        $data['contact_email']		 = $this->input->post('contact_email', true);
			$data['website']		     = $this->input->post('website', true);
	        $data['description']	     = $this->input->post('description', true);
	        $data['full_desc']		     = $this->input->post('full_desc', true);
			$data['state_id']			 = $this->input->post('state_id', true);
	        $data['city_id']	         = $this->input->post('city_id', true);
	        $data['location']		     = $this->input->post('location', true);
			
	        if ($image!='') {
	           $data['service_image']	= $image;
	        }
			if ($video!='') {
	           $data['service_video']	= $video;
	        }
	       
	        $data['service_provider_id']= $this->input->post('service_provider_id', true);
	        $data['status']             = '1';
	        $data['created_at']         = current_date();
	        $this->db->insert('manage_service', $data);
			$id = $this->db->insert_id();
			if($id)
	        {
				$category_id                  =  $this->input->post('category_id');
				foreach($category_id as $cat)
				{
					$data1[] = array('category_id'=>$cat, 'service_id'=>$id, 
					        'service_provider_id'=>$this->input->post('service_provider_id'));
				}
				$this->db->insert_batch('service_category', $data1); 
				$res['status']		=	"success";
			}else{
				$res['status']		=	"error";
				$res['error_msg']	=	"Somthing wrong try again !!";
			}
			return json_encode($res);
        } 
	 }
	
	public function edit($image,$video)
	{
		$this->form_validation->set_rules('category_id',"category", "required");
		$this->form_validation->set_rules('title',"title", "trim|required|min_length[5]|max_length[20]");
        $this->form_validation->set_rules('business_phone',"Business Phone", "trim|required|regex_match[/^[0-9]{10}$/]");
		$this->form_validation->set_rules('contact_email',"Contact Email", "trim|required|valid_email");
        $this->form_validation->set_rules('website',"website", "trim|required");
		$this->form_validation->set_rules('description',"description", "trim|required|min_length[0]|max_length[300]");
        $this->form_validation->set_rules('full_desc',"Full description", "trim|required");
		$this->form_validation->set_rules('state_id',"State", "trim|required");
        $this->form_validation->set_rules('city_id',"City", "trim|required");
		$this->form_validation->set_rules('location',"Location", "trim|required");
		
        if ($this->form_validation->run() == false) 
		{

            $res['error_msg'] = validation_errors();
            $res['status'] = 'error';
            return json_encode($res);
        }else
		{
        
	        $data['title']				 = $this->input->post('title', true);
	        $data['business_phone']	     = $this->input->post('business_phone', true);
	        $data['contact_email']		 = $this->input->post('contact_email', true);
			$data['website']		     = $this->input->post('website', true);
	        $data['description']	     = $this->input->post('description', true);
	        $data['full_desc']		     = $this->input->post('full_desc', true);
			$data['state_id']			 = $this->input->post('state_id', true);
	        $data['city_id']	         = $this->input->post('city_id', true);
	        $data['location']		     = $this->input->post('location', true);
			
	        if ($image!='') {
	           $data['service_image']	= $image;
	        }
			if ($video!='') {
	           $data['service_video']	= $video;
	        }
	       
	        $data['service_provider_id']= $this->input->post('service_provider_id', true);
	        $data['status']             = '1';
	        $data['created_at']         = current_date();
			$this->db->where('id',$this->input->post('id', true));
	        $result = $this->db->update('manage_service', $data);
			if($result)
	        {
				// delete from service category
				   $this->db->where('service_id',$this->input->post('id'));
				   $this->db->delete('service_category');
				// insert in service category
				$category_id  =  $this->input->post('category_id');
				foreach($category_id as $cat)
				{
					$data1[] = array('category_id'=>$cat, 'service_id'=>$this->input->post('id', true), 
					        'service_provider_id'=>$this->input->post('service_provider_id'));
				}
				$this->db->insert_batch('service_category', $data1); 
				$res['status']		=	"success";
			}else
			{
				$res['status']		=	"error";
				$res['error_msg']	=	"Somthing wrong try again !!";
			}
			return json_encode($res);
        } 
	}
	
	
	function fetch_city()
    {
        $this->input->post('state');
        
        $this->db->select("*");
        $this->db->where('id_state',  $this->input->post('state'));
        return $this->db->get('tbl_cities')->result();
    }
	
	/**
     * get_category for service 
     *
     * This function  fetch  get_category
     * 
     * @access	public
     * @return	html data
     */
	function get_service($id)
	{
		$this->db->select('*');
		$this->db->from("manage_service");
		$this->db->where('status','1');
		$this->db->where('id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->row();
		return $result;
	}
	
	/**
     * get_category for service 
     *
     * This function  fetch  get_category
     * 
     * @access	public
     * @return	html data
     */
	function get_category_list($id)
	{
		$this->db->select('*');
		$this->db->from("service_category");
		$this->db->where('service_id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->result();
		foreach($result as $result1)
		{
			$result_new[] = $result1->category_id;
		}
		
		return @$result_new;
	}
	
	/**
     * get_city on the basis of state id
     *
     * This function  fetch  get_city
     * 
     * @access	public
     * @return	html data
     */
	
	function get_state_list($service_id)
	{
		$query1=$this->db->query("SELECT city_id,state_id FROM manage_service WHERE id = '$service_id'  AND status = '1'");
		//echo $this->db->last_query();
		$result = $query1->row();	
		if(!empty($result))
		{
			$this->db->select("id_state,Name,ID as city_id");
			$this->db->from("tbl_cities");
			$this->db->where('status','1');
			$this->db->where('id_state',$result->state_id);
			$this->db->where('ID',$result->city_id);
			$query1= $this->db->get();
			//echo $this->db->last_query(); die;
			$result1 = $query1->row();
			return $result1;
			
		}			
	}
	
	
	/**
     * get_myservice_listing
     *
     * This function  fetch  get_myservice_listing
     * 
     * @access	public
     * @return	html data
     */
	function listing($sp_id)
	{
		$this->db->select('*');
		$this->db->from("manage_service");
		$this->db->where('status','1');
		$this->db->where('service_provider_id',$sp_id);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->row();
		return $result;
	}
	
	/**
     * get_service_info
     *
     * This function  fetch  service info
     * 
     * @access	public
     * @return	html data
     */
	function get_service_info($id = null){
		
		$this->db->select("u.first_name,u.last_name,s.service_provider_id,group_concat(c.title) as category_name,CONCAT(u.first_name,' ',u.last_name) as service_provider,u.contact_number,u.email,u.business_name,u.profile_image,u.address,s.title,s.*",FALSE);
		$this->db->join("$this->tbl_manage_service as s","s.service_provider_id =sc.service_provider_id","left");
		$this->db->join("$this->tbl_category as c","c.id=sc.category_id","left");
		$this->db->join("$this->tbl_users as u","u.id=s.service_provider_id","left");
		$this->db->where("sc.service_id",$id);
		$this->db->group_by("sc.service_id");
		$query	=	$this->db->get("$this->tbl_service_category as sc");
				
        if($query->num_rows()>0)
   		{
				$rs['result']	=	$query->row();
				$rs['status']	=	"success";
				
		}else{
				$rs['result']	=	'';
				$rs['status']	=	"error";
		}
        return json_encode($rs);
	}
	/*End of Function*/ 
	
	// fetch service list on the basis of state and city
	function fetch_service_list($state_id=null,$city_id=null,$string=null)
	{
		   $string_new =  urldecode($string);
			
		   
		    $limit		=	$this->input->post('page_size');
		    $page_no	=	$this->input->post('page_no');
			if((int)@$page_no === 1)
			{
				@$start=0;
			}
			else{
				@$start	=	($page_no-1)*@$limit;
			}
		 
             //$this->db->limit($limit,$start);
			 $query =  $this->db->query("select SQL_CALC_FOUND_ROWS m.*,u.email,u.contact_number,u.business_name from (manage_service m) LEFT JOIN users u on m.service_provider_id = u.id where m.id in (select service_id from service_category where  category_id in (SELECT `id` FROM (`category`) WHERE `title` LIKE '%$string_new%')) and m.city_id = '$city_id' and m.state_id = '$state_id' and m.status ='1' and u.status ='active' and u.is_delete = '0' order by m.id desc LIMIT $start,$limit")->result();
			//echo $this->db->last_query(); die;
		    if(!empty($query))
			{
					$rs['result']	=	$query;
					$rs['status']	=	"success";
					$total_record = $this->db->query('SELECT FOUND_ROWS() AS `count`');
        		    $rs['total_data'] = $total_record->row()->count;
					//$rs['total_data'] = count($query);
					
			}else{
					$rs['result']	=	'';
					$rs['status']	=	"error";
					$rs['total_data'] = 0;
			}
			return json_encode($rs);
			
	}
	
	/*
	function for 
	 getting the overall rating 
	*/
	function get_overall_rating($id=null)
	{
		$this->db->select_sum("rating");
		$this->db->from('feedback');
		$this->db->where("manage_service_id",$id);
		$this->db->where("status",'1');
		$query	=	$this->db->get();
			
        if($query->num_rows()>0)
   		{
				@$result         =  $query->result(); 
				$this->db->where('manage_service_id', $id);
				$this->db->where("status",'1');
		        @$num_rows = $this->db->count_all_results('feedback');
				@$total_rating   =  (round(@$result[0]->rating / @$num_rows,1));
				
				$rs['rating']	=	$total_rating;
				$rs['feedbacks']=   $num_rows;
				$rs['status']	=	"success";
				
		}else{
				$rs['result']	=	'';
				$rs['status']	=	"error";
		}
        return json_encode($rs);
	}
	
	
	
}
