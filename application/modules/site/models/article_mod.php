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

class Article_mod extends CI_Model {

    var $tbl_user			=	"users";
    var $tbl_articles		=	"articles";
    var $tbl_articles_cat	=	"article_category";

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
     * get_article_categories
     * This function to fetch articles categories
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */
    function get_article_categories($status = NULL)
    {
        $this->db->select("id,title");
        if($status!=NULL)
        {
			 $this->db->where("status",$status);
		}
		    $this->db->where("is_delete",'0');
        $query	=	$this->db->get($this->tbl_articles_cat);
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
    /*End of function*/
    
     /**
     * add
     * This function add new articles
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */
    function add($thumb = NULL)
    {
    	$this->form_validation->set_rules('article_category',"Article Category", "trim|required");
        $this->form_validation->set_rules('article_title',"Article Title", "trim|required");
        $this->form_validation->set_rules('description',"Description", "trim|required");
        if ($this->form_validation->run() == false) {

            $res['error_msg'] = validation_errors();
            $res['status'] = 'error';
            return json_encode($res);
        }else{
        
	        $data['title']				= $this->input->post('article_title', true);
	        $data['article_category']	= $this->input->post('article_category', true);
	        $data['description']		= $this->input->post('description', true);
	        if ($thumb!='') {
	           $data['article_image']	= $thumb;
	        }
	       
	        $data['added_by']			= $this->input->post('user_id', true);
	        $data['status']             = '1';
	        $data['created_at']         = current_date();
	        $data['modified_at']        = current_date();
	        $this->db->insert($this->tbl_articles, $data);
	        $id = $this->db->insert_id();
	        if($id)
	        {
				$res['status']		=	"success";
			}else{
				$res['status']		=	"error";
				$res['error_msg']	=	"Somthing wrong try again !!";
			}
			return json_encode($res);
        }
        
		
    }
    /*End of function*/
    
     /**
     * add
     * This function add new articles
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */
    function edit($thumb = NULL)
    {
    	$this->form_validation->set_rules('article_category',"Article Category", "trim|required");
        $this->form_validation->set_rules('article_title',"Article Title", "trim|required");
         $this->form_validation->set_rules('description',"Description", "trim|required");
        if ($this->form_validation->run() == false) {

            $res['error_msg'] = validation_errors();
            $res['status'] = 'error';
            return json_encode($res);
        }else{
        
	        $data['title']				= $this->input->post('article_title', true);
	        $data['article_category']	= $this->input->post('article_category', true);
	        $data['description']		= $this->input->post('description', true);
	        if ($thumb!='') {
	           $data['article_image']	= $thumb;
	        }
	        $data['modified_at']        = current_date();
	        $this->db->where('id',$this->input->post('id', true));
	        $result=$this->db->update($this->tbl_articles, $data);
	        
	        if($result)
	        {
				$res['status']		=	"success";
			}else{
				$res['status']		=	"error";
				$res['error_msg']	=	"Somthing wrong try again !!";
			}
			return json_encode($res);
        }
        
		
    }
    /*End of function*/
     /**
     * get_articles_list
     * This function to fetch articles list
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */
    function get_articles_list()
    {
    	$added_by   =   '';
    	$added_by	=	$this->input->post('added_by',true);
    	$limit		=	$this->input->post('page_size',true);
		$page_no	=	$this->input->post('page_no',true);
		$status		=	$this->input->post('status',true);
		
		if((int)$page_no === 1)
		{
			$start=0;
		}
		else{
			$start	=	($page_no-1)*$limit;
		}
		$this->db->select("SQL_CALC_FOUND_ROWS a.*,ac.title as cat_name",FALSE);
		$this->db->join("$this->tbl_articles_cat as ac","ac.id=a.article_category","left");
		$this->db->join('users u', 'u.id = a.added_by', 'left',false);
		
		if($added_by!='')
		{
			$this->db->where("a.added_by",$added_by);
		}
		
		if($status!='')
		{
			$this->db->where_in("a.status",$status);
		}
		$this->db->where('u.status','active');
		$this->db->where('u.is_delete','0');
		$this->db->order_by('a.id','desc');
        $this->db->limit($limit,$start);
        $query	=	$this->db->get("$this->tbl_articles as a");
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
	/*End of function*/
	
	function get_article_view($id=NULL){
		$added_by	=	$this->input->post('added_by',true);
		$this->db->select("a.*,ac.title as cat_name,CONCAT(u.first_name,' ',u.last_name) as auther,u.id as user_id,u.business_name",FALSE);
		$this->db->join("$this->tbl_articles_cat as ac","ac.id=a.article_category","left");
		$this->db->join("$this->tbl_user as u","u.id=a.added_by","left");
		if($added_by!='')
		{
			$this->db->where("a.added_by",$added_by);
		}
		
		if($id!='')
		{
			$this->db->where("a.id",$id);
		}


        $query	=	$this->db->get("$this->tbl_articles as a");
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
	
	/**
     * delete_article
     * This function delete article
     * 
     * @access	public
     * @param  array
     * @return	array
     */
    public function delete_article($id=NULL)
    {
    	
	        $this->db->set('status','3');
	        $this->db->set('modified_at',current_date());
	        $this->db->where('id',$id);
	        $result=$this->db->update($this->tbl_articles);
	        
	        
	        if($result)
	        {
				$res['status']		=	"success";
			}else{
				$res['status']		=	"error";
				$res['error_msg']	=	"Somthing wrong try again !!";
			}
			return json_encode($res);
        
    }
    /*End of function*/
}
