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
class City extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('1');
        $this->load->model('city_mod');
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
        //$data['result'] = array(); $this->city_mod->listing();
        $data['title'] = "C3 || City Listing";
        $data['breadcum'] = array("" => "", "" => "");
        $page = 'city/listing';
        $data['page'] = $page;
        _layout($data);
    }
    function city_list_ajax(){
          $res=$this->city_mod->city_list_ajax(); //pending loan list
          echo json_encode($res);
    }
    public function add() {

        if (isPostBack()) 
        {
			
            $this->form_validation->set_rules('city_name', 'City Name', 'trim|required|is_unique[city_master.city_name]');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false)
            {
				
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
            else
            { 
                $response = $this->city_mod->save_city();
                $msg=($response!='' && $response!=0) ? 'Great!! City is created sucessfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/city') ; 
            }
        }
        $data['title'] = "C3 || Create City";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'city/add';
        $data['page'] = $page;
        _layout($data);
    }

   

    

    public function edit($id = null) {
        
        if ($id != NULL) {
            $id = ID_decode($id);
        }
        if(isPostBack())
         {
			 
			 $this->form_validation->set_rules('city_name', 'City Name', 'trim|required|is_unique_edit[city_master.city_name]');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false)
            {	
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
			else{
				 $response = $this->city_mod->save_city($id);
                $msg=($response!='' && $response!=0) ? 'Great!! City is updated successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/city') ; 
			}
         }
		  $data['data1'] = $this->city_mod->get_city_list($id);
			// pr($data); die;

        $data['title'] = "C3 || Edit city";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'city/edit';
        $data['page'] = $page;
        _layout($data);
    }

   public function  delete($id=null)
	{
		if($id!='')
		{
			$cityId= ID_decode($id);
			
			$checkexist=checkCityexist($cityId);
			if($checkexist==1){
				$msg="This City Used Some Where!";
			} else{
			$result = $this->city_mod->delete($mytable="city_master",ID_decode($id));
			$msg="City deleted successfully";	
			}
		}else{
			$msg="Unable to delete,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
		redirect('admin/city') ; 
	 
	}
	public function  multi_delete()
	{
		$all_id = $this->input->post('id',true);
        if(!empty($all_id))
		{
			$city_ids1=$city_ids2=array();
			$ids=explode(',',$all_id);
            $ids=array_filter($ids);
            $qry1=$this->db->select('city_id')
                              ->from('users')
                              ->where_in('city_id',$ids)
                              ->get();
            if($qry1->num_rows()>0){
                $city_ids1=array_column($qry1->result_array(),"city_id");
            }
			$qry2=$this->db->select('city_id')
                              ->from('area_master')
                              ->where_in('city_id',$ids)
                              ->get();
            if($qry2->num_rows()>0){
                $city_ids2=array_column($qry2->result_array(),"city_id");
                
            }
			$all_city_id=array_merge( $city_ids1,$city_ids2);
			if(!empty($all_city_id)){
				$ids=array_diff($ids,$all_city_id);
			}
			
            if(isset($ids) && !empty($ids)){
             $this->db->where_in('id',$ids);
             $result = $this->db->delete("city_master"); 
            echo 1; die;   
            }
			else if(empty($ids)){
				echo 2; die;
			}
				else{
                echo 0; die;
            }                    
        }else{
			echo 0; die;
		}
	}
	
	//=================Download sheet of Payroll input data  sheet========================//
function export_city()
{
   
        $response= $this->city_mod->export_city();
		if(isset($response['citydata']) && !empty($response['citydata'])){
            $datamrg = array_merge( $response['header'] , $response['citydata'] );
            array_to_csv($datamrg,'City List-'.date('d-m-y H:i:s').'.csv');
        } else {
         $msg=($response!='' && $response!=0) ? 'City data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
		redirect('admin/city') ;       
        } 
        
}
//=================Download sheet of Payroll input data  sheet========================//


}
