<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User Controller
 *
 * @package		User
 * @category	User 
 * @author		
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */
class Area extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
      $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('2');
        $this->load->model('area_mod');
    }

    /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */
    public function index() {
        $data["result"] = array();
        $data['title'] = "C3 || Area Listing";
        $data['breadcum'] = array("" => "", "" => "");
        $page = 'area/listing';
        $data['page'] = $page;
        _layout($data);
    }
    
	
	   function area_list_ajax(){
          $res=$this->area_mod->area_list_ajax(); //pending loan list
          echo json_encode($res);
    }
	
    public function add() {
 
 
        if (isPostBack()) 
        {
			
            $this->form_validation->set_rules('city_id', 'City Name', 'trim|required');
			$this->form_validation->set_rules('area_name', 'Area Name', 'trim|required|callback_is_unique_area');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false)
            {
				
           $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
            else
            { 	
	
	            $response = $this->area_mod->save_area();
                $msg=($response!='' && $response!=0) ? 'Great!! Area is created successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/area') ; 
            }
        }
		$qry=$this->db->select('id,city_name')->get_where('city_master',array('status'=>'active'));
		$data['city_list'] = ($qry->num_rows()>0)? $qry->result() :array();
        $data['title'] = "C3 || Add Area";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'area/add';
        $data['page'] = $page;
	
        _layout($data);
    }

    //=======================Callback function to check unique area===============================//  
   public function is_unique_area()
   {
      $city_id=$this->input->post('city_id',true);
      $area_name=$this->input->post('area_name',true);
      if(!empty($city_id)){
            if( is_numeric(@end($this->uri->segment_array()))){ //this works only for edit area
    			$id_val= @end($this->uri->segment_array());
    			$id = ID_decode($id_val);
                $this->db->where('id !=',$id);
    		}
            $qry = $this->db->select('id')->get_where('area_master',array('city_id'=>$city_id,'area_name'=>$area_name));
      }
      if ($qry->num_rows() > 0){
           $this->form_validation->set_message('is_unique_area', 'Area name already exists in this city');
		   return FALSE; 
      }
	  else{ 
	     return TRUE;
      }
   }
 //=======================Callback function to check unique area===============================// 

    

    public function edit($id = null) {
       
        if ($id != NULL) {
            $id = ID_decode($id);
        }
        if(isPostBack())
         {
			 
			 $this->form_validation->set_rules('city_id', 'City Name', 'trim|required');
					 $this->form_validation->set_rules('area_name', 'Area Name', 'trim|required|callback_is_unique_area');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false)
            {	
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
			else{
				 $response = $this->area_mod->save_area($id);
                $msg=($response!='' && $response!=0) ? 'Great!! Area is updated successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/area') ; 
			}
         }
		 $qry=$this->db->select('id,city_name')->get_where('city_master',array('status'=>'active'));
	    	$data['city_list'] = ($qry->num_rows()>0)? $qry->result() :array();
		  $data['data1'] = $this->area_mod->get_area_list($id);
		

       $data['title'] = "C3 ||Edit  Area";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'area/edit';
        $data['page'] = $page;
        _layout($data);
    }

   public function  delete($id=null)
	{
		$this->load->model('city_mod');
		if($id!='')
		{
			$areaId= ID_decode($id);
			
			$checkexist=checkAreaexist($areaId);
			if($checkexist==1){
				$msg="This Area Used Some Where!";
			}	
			else{
			$result = $this->city_mod->delete($mytable="area_master",ID_decode($id));
			$msg="Area deleted successfully";
			}			
		}else{
			$msg="Unable to delete,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
		redirect('admin/area') ; 
	 
	}

		public function  multi_delete()
	{
		$all_id = $this->input->post('id',true);
        if(!empty($all_id))
		{
			$ids=explode(',',$all_id);
			
			$ids=array_filter($ids);
            $qry1=$this->db->select('id,area_id')
                              ->from('users')
                              ->where_in('area_id',$ids)
                              ->get();
            if($qry1->num_rows()>0){
                $area_ids=array_column($qry1->result_array(),"area_id");
                $ids=array_diff($ids,$area_ids);
            }
			
			
			if(isset($ids) && !empty($ids)){
             $this->db->where_in('id',$ids);
            $result = $this->db->delete("area_master"); 
            echo 1; die;   
            }else if(empty($ids)){
                echo 2; die;
            }else{
                echo 0; die;
            }
		}else{
			echo 0; die;
		}
	}
		//=================Download sheet of Payroll input data  sheet========================//
function export_area()
{
   
        $response= $this->area_mod->export_area();
		if(isset($response['areadata']) && !empty($response['areadata'])){
            $datamrg = array_merge( $response['header'] , $response['areadata'] );
            array_to_csv($datamrg,'Area List-'.date('d-m-y H:i:s').'.csv');
        } else {
      $msg=($response!='' && $response!=0) ? 'Some error, try again' :   'Area data not found for export......';
       $this->session->set_flashdata('account_create', $msg);
		redirect('admin/area') ;       
        } 
        
}
//=================Download sheet of Payroll input data  sheet========================//


}
