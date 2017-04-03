<?php 
class  Testmonial_mod extends CI_Model
{
	
	
	function __construct() 
	{
		parent::__construct();
		
	}
    

	   

	
	function save_area($id=null)
	   {
		   // pr($id);die;
		   $data ="";
		   $postdata = $this->input->post(NULL,TRUE);//print_r($postdata);
			 if($id)
			 {
				
				$postdata['modified_date']=date('Y-m-d h:i:s');
				$postdata['modified_by']=currUserId();
				$qry = $this->db->update('testimonial',$postdata,array('id'=>$id));
			 } 
			 else 
			 {
				  
				$postdata['created_date']=date('Y-m-d h:i:s');
                $postdata['parent_id']=currUserId();
				$postdata['created_by']=currUserId();
				$qry = $this->db->insert('testimonial',$postdata);
			 }
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   } 
	   
	       /*End of Function*/
    
     /**
     * get_description_list
     *
     * This function check to fetch  description
     * 
     * @access	public
     * @return	boolean
    */ 
	   function get_description_list($parent_id=null)
	   {
			if(isset($parent_id) && !empty($parent_id))
			{
				$this->db->where('parent_id',$parent_id);
			}
			$qry=$this->db->select('*')
					 ->from('testimonial')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   } 
	   

}
