<?php 
class  Area_mod extends CI_Model
{
	
	
	function __construct() 
	{
		parent::__construct();
		
	}
    

       /**
     * get_area_list
     *
     * This function check to fetch  city
     * 
     * @access	public
     * @return	boolean
    */ 
	   function get_area_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			
		         $sql=$this->db->select('id,city_id,area_name,status')
						   ->from('area_master')
						   ->get();
			return ($sql->num_rows()>0) ? $sql->result() : array();
			
	   } 
    /*End of Function*/
	
       function area_list_ajax()
    {
            $requestData = $_REQUEST;
            $columns = array(
                '',
				'id',
                'city_name',
				'area_name',
                'status',
                ''
            );
          
            $sql=$this->db->select('am.id,cm.city_name,am.area_name,am.status')
						  ->from('area_master am')
						  ->join('city_master cm','am.city_id=cm.id');
        
		if (!empty($requestData['search']['value'])) {
             $ser = strtolower($requestData['search']['value']);
                   if($ser=='active'){
					   $sql->where('am.status','active');
				   }else if($ser=='inactive'){
					    $sql->where('am.status','inactive');
				   }else{
					$sql->where("(LOWER(cm.city_name) like '%$ser%'");
                $sql->or_where("LOWER(am.area_name) like '%$ser%') ");
                   }
                }
			
             $sql->order_by('am.id', 'desc');
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
             }
             
            $query = $sql->get()->result();
            $totalData = $totalFiltered = $sql1->get()->num_rows();             
            $data = array();
            $sr_no = $requestData['start'];
            
            foreach ($query as $row) {
                $editstr= '<a class="Edit" title="Edit" href="'.base_url().'admin/area/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;' ;
                $deltr='<a href="'.base_url().'admin/area/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>';        
                
                $stat_sstr= ($row->status=='active') ? '<span class="label label-sm label-success"> Active </span>' 
                                                  : ' <span class="label label-sm label-danger">   Inactive </span>';         
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
				$nestedData[] = ucwords($row->city_name);
                $nestedData[] = ucwords($row->area_name);
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
			 } 
			 else 
			 {
				  
				$postdata['created_date']=date('Y-m-d h:i:s');
				$postdata['created_by']=currUserId();
				$qry = $this->db->insert('area_master',$postdata);
			 }
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   } 
	 
	   //=================Download sheet of Payroll input data  sheet========================//
function export_area()
{
   $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	 if(!empty($all_id))
		{
			$this->db->where_in('am.id',$all_id);
		}
	$qry = $this->db->select('am.id,cm.city_name,am.area_name,am.status')
						  ->from('area_master am')
						  ->join('city_master cm','am.city_id=cm.id')
						   ->order_by('id', 'desc')
						  ->get();
    $areadata = ($qry->num_rows()>0)? $qry->result() :array();
	 
     if(isset($areadata) && !empty($areadata))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"S.No.",
                        'city_name' =>  "City Name",
						'area_name' =>  "Area Name",
						'status'=>  "Status"
                        ),
                    );
    
    
                   $i=1; 
                    foreach($areadata as $value)
                    { 
     					$data['areadata'][$i]['id']=+$i;
                        $data['areadata'][$i]['city_name']=ucwords($value->city_name);
						$data['areadata'][$i]['area_name']=ucwords($value->area_name);
                        $data['areadata'][$i]['status'] = $value->status;
                          $i++;
                    }
          }
 
   return $data;   
}
//=================Download sheet of Payroll input data  sheet========================//
	 
	   
}
