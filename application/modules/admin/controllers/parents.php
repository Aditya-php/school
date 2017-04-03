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
class Parents extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('7');
        $this->load->model('parents_mod');
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
        $data['title'] = "C3 || Parents";
        $data['breadcum'] = array("" => "", "" => "");
        $page = 'parents/listing';
        $data['page'] = $page;
        _layout($data);
    }
    
	
	   function parents_list_ajax(){
          $res=$this->parents_mod->parents_list_ajax();
          echo json_encode($res);
    }
	

    

    public function edit($id = null) {
        
        if ($id != NULL) {
            $id = ID_decode($id);
        }
        if(isPostBack())
         {
			//pr($_POST); die;
	    $this->form_validation->set_rules('first_name',"First Name", 'trim|required');
        $this->form_validation->set_rules('last_name',"Last Name", 'trim|required');
        $this->form_validation->set_rules('email',"email", 'trim|required|is_unique_edit[users.email]');
		$this->form_validation->set_rules('contact_number',"Mobile No.", 'trim|required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('address',"Address", 'trim|required');
		$this->form_validation->set_rules('city_id',"City", 'trim|required');
		$this->form_validation->set_rules('area_id',"Area", 'trim|required');
		$this->form_validation->set_rules('status',"status", 'trim|required');
        if ($this->form_validation->run() === false)
            {
            // echo validation_errors();die;
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
			else{
				 $response = $this->parents_mod->save_area($id);
                $msg=($response!='' && $response!=0) ? 'Great!! Parents is updated successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/parents') ;
			}
         }
		 $qry=$this->db->select('id,city_name')->get_where('city_master',array('status'=>'active'));
		$data['city_list'] = ($qry->num_rows()>0)? $qry->result() :array();
		  $data['data1'] = $this->parents_mod->get_parents_list($id);
		

        $data['title'] = "C3 || Edit parents";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'parents/edit';
        $data['page'] = $page;
        _layout($data);
    }

   public function  delete($id=null)
	{
		if($id!='')
		{
			$parent_id=ID_decode($id);
			$count=$this->db->get_where("appointment_schedular",array("user_id"=>$parent_id))->num_rows();
			if($count>0)
			{
			   $this->session->set_flashdata('account_create', "Record can't delete due to process");
		       redirect('admin/parents') ;
			}
			else
			{
				$this->db->delete("kids",array("parent_id"=>$parent_id));
				$result = $this->parents_mod->delete($mytable="users",ID_decode($id));
				$msg="Parents deleted successfully";
			}
		}else{
			$msg="Unable to delete,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
		redirect('admin/parents') ;
	 
	}

   public function  multi_delete()
	{
		$all_id = $this->input->post('id',true);
        if(!empty($all_id))
		{
			$ids=explode(',',$all_id);
            $ids=array_filter($ids);
            $qry1=$this->db->select('user_id')
                              ->from('appointment_schedular')
                              ->where_in('user_id',$ids)
                              ->get();
            if($qry1->num_rows()>0){
                $user_ids=array_column($qry1->result_array(),"user_id");
                $ids=array_diff($ids,$user_ids);
            }
          if(isset($ids) && !empty($ids))
		  {
             $this->db->where_in('id',$ids);
            $result = $this->db->delete("users");
			$this->db->where_in('id',$ids);
            //$result = $this->db->delete("users");
            echo 1; die;
		  }
		  else if(empty($ids))
		  {
			 echo 2; die;
		  }
		 else
		  {
			echo 0; die;
		  }
	    }//end main if
	}
		//=================Download sheet of Payroll input data  sheet========================//
function export_parents()
{
   
        $response= $this->parents_mod->export_parents();
		if(isset($response['parentsdata']) && !empty($response['parentsdata'])){
            $datamrg = array_merge( $response['header'] , $response['parentsdata'] );
            array_to_csv($datamrg,'Parents List-'.date('d-m-y H:i:s').'.csv');
        } else {
       $msg=($response!='' && $response!=0) ? 'Parent data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
		redirect('admin/parents') ;
        }
        
}
//=================Download sheet of Payroll input data  sheet========================//

	
	public function find_area_list()
	{
		$id=$this->input->post('id');
		$result= $this->home_mod->find_area_list($id);
		echo $result; die;
    }
	
	//=================Download sheet of Payroll input data  sheet========================//
  function kid_list_ajax($parent_id){
		  $res=$this->parents_mod->kid_list_ajax(ID_decode($parent_id)); //sssspr($res);die;//pending loan list
          echo json_encode($res);
    }
	
    public function kid_listing($parent_id) {
		$qry  = $this->db->select('first_name,unique_id,last_name')
		                ->from('users')
	                    ->where('id',ID_decode($parent_id))
						->get();
						// echo $this->db->last_query();die;
		$data['data1'] = ($qry->num_rows()>0) ? $qry->result() : array();
		// pr($data['data1']);die;
        $data["result"] = array();
        $data['title'] = "C3 || Kids";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'parents/kid_listing';
		$data['parent_id']=$parent_id;
        $data['page'] = $page;
        _layout($data);
    }
	
		 
	   public function kid_edit($id = null) {
		  if ($id != NULL) {
            $id = ID_decode($id);
            }
          if(isPostBack())
           {
			 
	       $this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('dob', 'DOB', 'trim|required');
			$this->form_validation->set_rules('age', 'Age', 'trim|required');
			$this->form_validation->set_rules('liking', 'Liking', 'trim|required');
			$this->form_validation->set_rules('disliking', 'Disliking', 'trim|required');
			$this->form_validation->set_rules('scared_of', 'Scared Of', 'trim|required');
			$this->form_validation->set_rules('allergic_to', 'Allergic To', 'trim|required');
			$this->form_validation->set_rules('doctor_name', 'Doctor Name', 'trim|required');
			$this->form_validation->set_rules('doc_con_num', 'Doctor Contact Number', 'trim|required|min_length[10]|max_length[10]');
			
            if ($this->form_validation->run() == false)
            {
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
			else{
				 $response = $this->parents_mod->save_kids($id);
                $msg=($response!='' && $response!=0) ? 'Great!! Kid information is updated successfully.' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/parents') ;
			}
         }
		
	    $data['data1'] = $this->parents_mod->get_kid_list($id);
        $data['title'] = "C3 || Edit kids";
        $page = 'parents/kid_edit';
        $data['page'] = $page;
        _layout($data);
    }
	
	
		function export_kid($parent_id)
{
	    $response= $this->parents_mod->export_kid(ID_decode($parent_id));
		if(isset($response['kidData']) && !empty($response['kidData'])){
            $datamrg = array_merge( $response['header'] , $response['kidData'] );
            array_to_csv($datamrg,'kidData List-'.date('d-m-y H:i:s').'.csv');
        } else {
        $msg=($response!='' && $response!=0) ? 'Kids record not found for export...!!' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
            
           if( is_numeric(@end($this->uri->segment_array()))){
            $id_val= @end($this->uri->segment_array());
            redirect('admin/parents/kid_listing/'.$id_val) ;
    		}else{
			
            redirect('admin/parents/') ;
		}
            
        }
        
}
   public function  kid_delete($id=null)
	{
		if($id!='')
		{
			$result = $this->parents_mod->delete($mytable="kids",ID_decode($id));
			$msg="Kids deleted successfully";
		}else{
			$msg="Unable to delete,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
		redirect('admin/parents') ;
	 
	}
		public function  kid_multi_delete()
	{
		$all_id = $this->input->post('id',true);
        if(!empty($all_id))
		{
			$ids=explode(',',$all_id);
            $this->db->where_in('id',$ids);
            $result = $this->db->delete("kids");
            echo ($result) ? 1 : 0; die;
		}else{
			echo 0; die;
		}
	}
	/*
	@desc: used to display kids log
	*/
    public function view_kid_log($kid_id)
	{
		$qry  = $this->db->select('k.name, u.unique_id, u.first_name, u.last_name')
		                ->from('kids k')
						->join('parents_detail p','p.parent_id=k.parent_id')
						->join('users u','u.id=k.parent_id')
	                    ->where('k.id',ID_decode($kid_id))
						->get();
						// echo $this->db->last_query();die;
		$data['data1'] = ($qry->num_rows()>0) ? $qry->result() : array();
		// pr($data['data1']);die;
       
		$data["result"] = array();
        $data['title'] = "C3 || Kids";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'parents/kid_log_listing';
		$data['kid_id']=$kid_id;
        $data['page'] = $page;
        _layout($data);
    }
	/*
	@desc: accept ajax request and display kids log
	*/
	function kid_log_list_ajax($kid_id)
	{
		  $res=$this->parents_mod->kid_log_list_ajax(ID_decode($kid_id)); //sssspr($res);die;//pending loan list
          echo json_encode($res);
    }
   function export_log_kids($kid_id)
	{
            $kid_id=ID_decode($kid_id);
			$response= $this->parents_mod->export_kids_log($kid_id);
		    if(isset($response['kidsData']) && !empty($response['kidsData'])){
            $datamrg = array_merge( $response['header'] , $response['kidsData'] );
            array_to_csv($datamrg,'KidsLogData List-'.date('d-m-y H:i:s').'.csv');
              }else{
              $msg=($response!='' && $response!=0) ? 'Kids Log data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
				redirect('admin/parents/view_kid_log/'.ID_encode($kid_id));
               }
    }//end method
  public function archieve($id)
  {
      $id=ID_decode($id);
      if($this->db->update('users',array('status'=>'archieve'),array('id'=>$id)))
      {
       $this->session->set_flashdata('account_create','Parents moved into archieve');
  		 redirect('admin/parents');
      }//end if
      else
      {
       $this->session->set_flashdata('account_create','Some db problem in parents/archieve');
  		 redirect('admin/parents');
      }
  }//end method
}
