<?php 
class  Parent_mod extends CI_Model
{
	
	
	function __construct() 
	{
		parent::__construct();
		
	}
    

	   
    /*End of Function*/
    
     /**
     * get_city_list
     *
     * This function check to fetch  city
     * 
     * @access	public
     * @return	boolean
    */ 
	   function get_parents_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('*')
					 ->from('users')
					  ->order_by('id','desc')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   } 
    /*End of Function*/
     /**
     * city_list_ajax
     *
     * This function check to list city
     * 
     * @access	public
     * @return	boolean
    */ 
    
    function parents_list_ajax()
    {
            $requestData = $_REQUEST;
            $columns = array(
                '',
                'id',
				'id',
                'first_name',
				'address',
				'email',
				'contact_number',
                'status',
                ''
            );
    
            $sql=$this->db->select('*')
                          ->from('users')
						  ->where('user_type','3');

                          // pr( $sql);die;
            if (!empty($requestData['search']['value'])) {
                $ser = $requestData['search']['value'];
                $sql->like('CONCAT(id,first_name,address,email,contact_number,status)',"$ser");
             }
             
             //$sql->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
             $sql->order_by('id', 'desc');
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
             }
             
            $query = $sql->get()->result();
            $totalData = $totalFiltered = $sql1->get()->num_rows();             
            $data = array();
            $sr_no = $requestData['start'];
        
            foreach ($query as $row) {
                $editstr= '<a class="Edit" title="Edit" href="'.base_url().'admin/parents/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;' ;
                $deltr='<a href="'.base_url().'admin/parents/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>';        
                
                $stat_sstr= ($row->status=='active') ? '<a href="javascript:void(0);" title="inactive" id="change_status_9795474665" onclick="return active_func_user(9795474665);"> <span class="label label-sm label-success"> Active </span> </a>' 
                                                  : ' <a href="javascript:void(0);" title="active" id="change_status_4461475241" onclick="return active_func_user(4461475241);"><span class="label label-sm label-danger">  Inactive </span> </a>';         
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_parents_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
                $nestedData[] = ucwords($row->first_name);
				$nestedData[] = $row->address;
			    $nestedData[] = $row->email;
				$nestedData[] = $row->contact_number;
                $nestedData[] = $stat_sstr;
                $nestedData[] = $editstr.$deltr;
                $data[] = $nestedData;
           }
            $json_data = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
            return $json_data;
   }
   /*End of Function*/
    

public function delete($mytable,$id,$field=null)
{
        if($field==null)
        {
        $this->db->where('id', $id);
        }
        else{
          $this->db->where($field, $id);   
        }
        $this->db->delete($mytable); 
}
	
	
	
	 function save_area($id=null)
	 {
		   $data ="";
		   $postdata = $this->input->post(NULL,TRUE);//print_r($postdata);
			 if($id)
			 {
				$postdata['modified']=date('Y-m-d h:i:s');
				$qry = $this->db->update('users',$postdata,array('id'=>$id));
			
			 } 
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   } 
	   
	   //=================Download sheet of Payroll input data  sheet========================//
function export_parents()
{
    $data=array();
  
     $parentsdata=$this->get_parents_list();
	 if(isset($parentsdata) && !empty($parentsdata))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"Id",
                        'first_name' =>  "First Name",
						'last_name' =>  "Last Name",
						'address' =>  "Address",
					    'email' =>  "Email Address",
					    'contact_number' =>  "Mobile Number",
						'status'=>  "Status"
                        ),
                    );
    

                   $i=0; 
                    foreach($parentsdata as $value)
                    { 
                        $data['parentsdata'][$i]['id']=$value->id;
                        $data['parentsdata'][$i]['first_name']=ucwords($value->first_name);
						$data['parentsdata'][$i]['last_name']=ucwords($value->last_name);
						$data['parentsdata'][$i]['address']=$value->address;
						$data['parentsdata'][$i]['email']=$value->email;
					    $data['parentsdata'][$i]['contact_number']=$value->contact_number;
                        $data['parentsdata'][$i]['status'] = $value->status;
                        $i++;
                  }
                 
      
         
     }
 
   return $data;   
}
//=================Download sheet of Payroll input data  sheet========================//
	public function find_area_list($id)
	{  	
		$rData = '<option>Select Area</option>';
		$this->db->select('id,area_name');  
						$this->db->from('area_master');  
						$this->db->where('city_id',$id);  
		  $query = $this->db->get(); 
		  //echo $this->db->last_query(); die;
		if($query->num_rows>0)
		{
			
			foreach($query->result() as  $value)
			 {	
				$rData .= '<option value="'.$value->id.'">'.$value->area_name.'</option>';
			 }
		}
		else{
			$rData= '<option value="">No Area Found</option>';
		}
		return $rData;  
}  


}
