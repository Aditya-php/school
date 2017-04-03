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
class Invoice extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
       $user_type=array('4'); //allowed user type to access
        is_protect($user_type);
        $this->load->model('invoice_mod');
    }

    /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */	
	
	 
 public function add() {
	 // pr($_POST);die;
  if (isPostBack()) 
        {
		   $this->form_validation->set_rules('kid_detail', 'Kid', 'trim|required');
			$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
			$this->form_validation->set_rules('due_date', 'Due date', 'trim|required');
			$this->form_validation->set_rules('invoice_date', 'Invoice Date', 'trim|required');
			 if ($this->form_validation->run() == false)
               {
		       $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
                }
              else
                { 	
			    $response = $this->invoice_mod->save_invoice();//pr($response);
                $msg=($response!='' && $response!=0) ? 'Great!! Invoice is created successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('vendors/invoice/listing') ; 
                }
		}
		$data['data1'] = $this->invoice_mod->get_record();//pr($response);
        $data['title'] = "C3 || Add Invoice";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'invoice/add';
        $data['page'] = $page;
	   _layout_vendor($data);
    }
	
	
	
  function invoice_list_ajax(){
		  // $parent_id=currUserId(); 
          $res=$this->invoice_mod->invoice_list_ajax(); //sssspr($res);die;//pending loan list
          echo json_encode($res);
    }
	
		
	function listing(){
	    $data['title'] = "C3 || List invoice";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'invoice/listing';
        $data['page'] = $page;
	 _layout_vendor($data);
	}
	

		function export_invoice(){
		 $vendor_id=currUserId();
            $response= $this->invoice_mod->export_invoice($vendor_id);
		    if(isset($response['InvoiceData']) && !empty($response['InvoiceData'])){
            $datamrg = array_merge( $response['header'] , $response['InvoiceData'] );
            array_to_csv($datamrg,'InvoiceData List-'.date('d-m-y H:i:s').'.csv');
              }else{
              $msg=($response!='' && $response!=0) ? 'Invoice data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
				redirect('vendors/invoice/listing');
               } 
        }
	
		public function  multi_delete(){
		$all_id = $this->input->post('id',true);
        if(!empty($all_id))
		   {
			$ids=explode(',',$all_id);
            $this->db->where_in('id',$ids);
            $result = $this->db->delete("vendor_invoice");
         //   echo $this->db->last_query(); die;
                echo 1; die;
		   }else{
			   echo 0; die;
		    }
	    }
	
	
	   public function  delete($id=null){
	    if($id!='')
		  {
			$result = $this->invoice_mod->deletedata($mytable="vendor_invoice",ID_decode($id));
			 $msg=($response!='' && $response!=0) ? 'Some error, try again' :  'Invoice deleted successfully';
			 $this->session->set_flashdata('account_create', $msg); redirect('vendors/invoice/listing') ; 
		   }else{
			 $msg="Unable to delete,Id not found";
		 }
		 $this->session->set_flashdata('account_create', $msg);
         redirect('vendors/invoice/listing') ; 
	 
	}
	
	
	 public function edit($id = null) {
   
        if ($id != NULL) {
            $id = ID_decode($id); 
        }
		 if (isPostBack()) 
        {
		
           
            $this->form_validation->set_rules('kid_detail', 'Kid', 'trim|required');
			$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
			$this->form_validation->set_rules('due_date', 'Due date', 'trim|required');
			$this->form_validation->set_rules('invoice_date', 'Invoice Date', 'trim|required');
 
            if ($this->form_validation->run() == false)
            {
		       $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
            else
            { 
	            $response = $this->invoice_mod->save_invoice($id);//pr($response);
                $msg=($response!='' && $response!=0) ? 'Great!! Invoice is created successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                 redirect('vendors/invoice/listing') ; 
            }
		}
		$data['data1'] = $this->invoice_mod->get_record();
		$data['res'] = $this->invoice_mod->get_invoice_list($id);//pr($data);die;
	    $data['title'] = "C3 || Edit Invoice";
        $data['breadcum'] = array("" => "", "" => "");
        $page = 'invoice/edit';
        $data['page'] = $page;
	 _layout_vendor($data);
	}

	function raiseInvoice($id = null)
	{
		 if ($id != NULL) {
            $id = ID_decode($id); 
			// pr( $id );die;
        }
		
		  $qry= $this->db->update('vendor_invoice',array('invoice_status'=>'1','modified_date'=>date('Y-m-d h:i:s')),array('id'=>$id));
		  
		 $msg=($qry!='' && $qry!=0) ? 'Great!! Invoice is created successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                 redirect('vendors/invoice/listing') ; 
	}


}
