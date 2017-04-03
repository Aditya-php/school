<?php 
class  City_mod extends CI_Model
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
	   function save_city($id=null)
	   {
		   $data ="";
		  $postdata = $this->input->post(NULL,TRUE);//print_r($postdata);
			 if($id)
			 {
				
				$postdata['modified_date']=date('Y-m-d h:i:s');
				$postdata['modified_by']=currUserId();
				$qry = $this->db->update('city_master',$postdata,array('id'=>$id));
				// echo $this->db->last_query();die;
			 } 
			 else 
			 {
				  
				$postdata['created_date']=date('Y-m-d h:i:s');
				$postdata['created_by']=currUserId();
				$qry = $this->db->insert('city_master',$postdata);
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
	   function get_city_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('id,city_name,status')
					 ->from('city_master')
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
    
    function city_list_ajax()
    {
            $requestData = $_REQUEST;
            $columns = array(
                '',
                'id',
                'city_name',
                'status',
                ''
            );
            
            $sql=$this->db->select('id,city_name,status')
                          ->from('city_master');
                          
            if (!empty($requestData['search']['value'])) {
                 $ser = strtolower($requestData['search']['value']);
				    if($ser=='active'){
					   $sql->where('status','active');
				    }else if($ser=='inactive'){
					    $sql->where('status','inactive');
				    }else{
					  $sql->where("(LOWER(city_name) like '%$ser%')"); 
				    }
              }
             
             $sql->order_by('id', 'desc');
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
             }
             
            $query = $sql->get()->result();
			//echo $this->db->last_query(); die;
            $totalData = $totalFiltered = $sql1->get()->num_rows();             
            $data = array();
            $sr_no = $requestData['start'];
            
            foreach ($query as $row) {
                $editstr= '<a class="Edit" title="Edit" href="'.base_url().'admin/city/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;' ;
                $deltr='<a href="'.base_url().'admin/city/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>';        
                
                $stat_sstr= ($row->status=='active') ? '<span class="label label-sm label-success"> Active </span>' 
                                                  : ' <span class="label label-sm label-danger">  Inactive </span>';         
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
                $nestedData[] = ucwords($row->city_name);
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
				
				$postdata['modified_date']=date('Y-m-d h:i:s');
				$postdata['modified_by']=currUserId();
				$qry = $this->db->update('area_master',$postdata,array('id'=>$id));
				// echo $this->db->last_query();die;
			 } 
			 else 
			 {
				  
				$postdata['created_date']=date('Y-m-d h:i:s');
				$postdata['created_by']=currUserId();
				$qry = $this->db->insert('area_master',$postdata);
					// echo $this->db->last_query();die;
			 }
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   } 
	   
	   //=================Download sheet of Payroll input data  sheet========================//
function export_city()
{
    $data=array();
   $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	 if(!empty($all_id))
		{
			$this->db->where_in('id',$all_id);
			 // echo $this->db->last_query();die;
		}
     $qry=$this->db->select('id,city_name,status')
					 ->from('city_master')
					 ->order_by('id', 'desc')
					 ->get();
					 
	$citydata=($qry->num_rows()>0)? $qry->result() :array();
     
     if(isset($citydata) && !empty($citydata))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"S.No",
                        'city_name' =>  "City Name",
						'status'=>  "Status"
                        ),
                    );
    
     
                   $i=1; 
                    foreach($citydata as $value)
                    { 
                     
                    
                        $data['citydata'][$i]['id']= +$i;
                        $data['citydata'][$i]['city_name']=ucwords($value->city_name);
                        $data['citydata'][$i]['status'] = $value->status;
                        
                        
                        $i++;
                       
                  }
                 
      
         
     }
 
   return $data;   
}
//=================Download sheet of Payroll input data  sheet========================//

}
