<?php 
class  Role_mod extends CI_Model
{
	
	
	function __construct() 
	{
		parent::__construct();
		
	}
    

   
	 /**
     * save_city
     *
     * This function check to save city
     * 
     * @access	public
     * @return	boolean
    */ 
	   function save_role($id=null)
	   {
		   $data ="";
		  $postdata = $this->input->post(NULL,TRUE);//print_r($postdata);
			 if($id)
			 {
				
				$postdata['modified_date']=date('Y-m-d h:i:s');
				$postdata['modified_by']=currUserId();
				$qry = $this->db->update('roles',$postdata,array('id'=>$id));
				// echo $this->db->last_query();die;
			 } 
			 else 
			 {
				  
				$postdata['created_date']=date('Y-m-d h:i:s');
				$postdata['created_by']=currUserId();
				$qry = $this->db->insert('roles',$postdata);
					// echo $this->db->last_query();die;
			 }
			 $data=($qry) ? "1" : "0";
			 return $data;
		
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
	   function get_role_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('*')
					 ->from('roles')
					  ->order_by('id','desc')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   } 
	   
	   	 function get_role($id=null,$permission)
	      {
		$qry=$this->db->select('*')
					  ->from('roles')
				      ->where('id',$id)
				      ->where('permissions',$permission)
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
    
    function role_list_ajax()
    {
            $requestData = $_REQUEST;
            $columns = array(
                '',
                'id',
                'name',
                'created_date',
				'modified_date',
				'status',
                ''
            );
            
            $sql=$this->db->select('*')
                          ->from('roles');
                          
            if (!empty($requestData['search']['value'])) {
               $ser = strtolower($requestData['search']['value']);
               if($ser=='active'){
					   $sql->where('status','1');
				   }else if($ser=='inactive'){
					    $sql->where('status','2');
				   }else{
					$sql->where("(LOWER(name) like '%$ser%'");
                $sql->or_where("created_date like '%$ser%' ");
                $sql->or_where("modified_date like '%$ser%')");
                }
                
			 }
             
           
             $sql->order_by('id', 'desc');
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
             }
             
            $query = $sql->get()->result();
            $totalData = $totalFiltered = $sql1->get()->num_rows();             
            $data = array();
            $sr_no = 0;
            
            foreach ($query as $row) {
				$created_date = $row->created_date;
				$modified_date = $row->modified_date;
				if($modified_date == '0000-00-00 00:00:00')
				{
						$modified = '';
				}else{
						$modified = date('d-m-y',strtotime($modified_date));
				}
				$created = date('d-m-y',strtotime($created_date));
			
                $editstr= '<a class="Edit" title="Edit" href="'.base_url().'admin/role/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;' ;
                $deltr='<a href="'.base_url().'admin/role/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;';  
				$permission='<a href="'.base_url().'admin/role/permission/'.ID_encode($row->id).'" id="">Assign Permission</a>&nbsp;&nbsp;&nbsp;';  				
                
                $stat_sstr= ($row->status=='1') ? '<span class="label label-sm label-success"> Active </span>' 
                                                  : ' <span class="label label-sm label-danger">  Inactive </span>';         
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
                $nestedData[] = ucwords($row->name);
			    $nestedData[] = $created;
                $nestedData[] = $modified;
				$nestedData[] = $stat_sstr;
                $nestedData[] = $editstr.$deltr.$permission;
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
	
	
	
	
	   
	   //=================Download sheet of Payroll input data  sheet========================//
function export_role()
{
    $data=array();
    $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	 if(!empty($all_id))
		{
			$this->db->where_in('id',$all_id);
		}
     $RoleData=$this->get_role_list();
	            // ->order_by('id','desc');
	 if(isset($RoleData) && !empty($RoleData))
     {  
         $header2=$newcomp=array();
         $data['header']=array(
                        '0' =>array(
                        'id'  =>"Role Id",
                        'name' =>  "Role Name",
						'created_date'=>  "Created On",
						'modified_date'=>  "Modified On",
						'status'=>  "Status"
                        ),
                    );
                  $i=1; 
                    foreach($RoleData as $value)
                    { 
					
					$created_date = $value->created_date;
				$modified_date = $value->modified_date;
				if($modified_date == '0000-00-00 00:00:00')
				{
						$modified = '';
				}else{
						$modified = date('d-m-y',strtotime($modified_date));
				}
				$created = date('d-m-y',strtotime($created_date));
			
                     if($value->status =='1')
					 {
						 $status = 'Active';
					 }else  if($value->status =='2'){
						 $status = 'Inactive';
					 }
                        $data['RoleData'][$i]['id']=+$i;
                        $data['RoleData'][$i]['name']=ucwords($value->name);
						$data['RoleData'][$i]['created_date']=$created;
						$data['RoleData'][$i]['modified_date']=$modified;
                        $data['RoleData'][$i]['status'] = $status;
                         $i++;
                     }
                  
     }
 
   return $data;   
}
//=================Download sheet of Payroll input data  sheet========================//
function permission()
{
	$qry =$this->db->select('*')
	           ->from('permissions')
			   ->get();
 return ($qry->num_rows()>0) ? $qry->result() : array();
}


		   function save($id=null)
	   {
		   $data ="";
		  if($id)
			 {
				 $prmsn_ids=implode(',',$this->input->post('prmsn_ids',true));
				 $qry = $this->db->update('roles',array('permissions'=>$prmsn_ids),array('id'=>$id));
                 
                 $qry1=$this->db->update('users',array('permissions'=>$prmsn_ids),array('role_id'=>$id));
                                         
				// echo $this->db->last_query();die;
			 } 
			 else 
			 {
			
				
			 }
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   } 
	   

	   
	   
	   
}
