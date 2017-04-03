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

class Event_mod extends CI_Model {

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
	 
	 
	 //***** listing of all events****// 
		public function listing($added_by)
		{
			$limit		=	$this->input->post('page_size');
		    $page_no	=	$this->input->post('page_no');
			if((int)@$page_no === 1)
			{
				@$start=0;
			}
			else{
				@$start	=	($page_no-1)*@$limit;
			}
			$this->db->select("SQL_CALC_FOUND_ROWS m.*,et.event_type",false);
			$this->db->from("manage_event m",false);
			$this->db->join('event_type  et','m.event_type_id=et.id','left',false);
			$this->db->join('users u', 'u.id = m.added_by', 'left',false);
			$this->db->where('m.is_delete','0');
			$this->db->where('m.status','1');
			$this->db->where('u.status','active');
		    $this->db->where('u.is_delete','0');
			if($added_by!='')
		    {
			  $this->db->where("m.added_by",$added_by);
		    }
			$this->db->order_by('m.id','desc');
			$this->db->limit($limit,$start);
			$query	=	$this->db->get();
			//echo $this->db->last_query(); die;
			if($query->num_rows()>0)
			{
					$rs['result']	=	$query->result();
					$rs['status']	=	"success";
					$total_record = $this->db->query('SELECT FOUND_ROWS() AS `count`');
					$rs['total_data'] = $total_record->row()->count;
			}else{
					$rs['result']	=	'';
					$rs['status']	=	"error";
					$rs['total_data'] = 0;
			}
			return json_encode($rs);
		}
	 
	 
	/*  
	 //------- listing of particular service  provider events----------\\
		 public function particular_sp_list($current_id,$page,$offset)
		 {
			$this->db->select('*');
			$this->db->from('manage_event');
			$this->db->where('is_delete','0');
			$this->db->where('status','1');
			$this->db->where('added_by',$current_id);
			$this->db->order_by("id", "desc");
			$this->db->limit($page,$offset);
			$query = $this->db->get();
			$data = $query->result();
			return $data;
		 }
	  */
	 
	 // detail view of events 
	 
	 public function detail_view($id)
	 {
		$query=$this->db->query("SELECT id,title,description,venue,email,website,contact_no,added_by,startdate FROM manage_event WHERE is_delete = '0' and status='1' and id='$id' ");
		$data = $query->row();
		return $data;
	 }
	 
	 
	 
}
