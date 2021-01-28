<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pressrelease_model_backend extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
 
	function export_host_details($table,$fields_wanted)
	{
		$query='SELECT ';
		foreach($fields_wanted as $field)
		{
		if($field=='created')
		{
		$query .='DATE('.$field.') AS created'.',';
		}
		else{
		$query .=$field.',';
		}
		}
		$query=substr($query,0,-1);
		$query .=' FROM '.$table.' order by id desc';
		$data['users_detail']=$this->ExecuteQuery($query);
		
		return $data;
	} 	
	
	public function get_ajax_pressrelease_list($limit,$start,$search,$col,$dir,$model_function_name,$id="")
    {   
	if($model_function_name == "total_record_count")
		{
			$this->db->select('ts.*');
			$this->db->from(PRESS_RELEASE.' as ts');
			if($id!="")
			{
			$this->db->where('ts.id',$id);
			}
			$this->db->where('ts.post_status','1');
			$this->db->order_by('ts.id','desc');
			$query = $this->db->get();
			return $query->num_rows();
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('ts.*');
			$this->db->from(PRESS_RELEASE.' as ts');
			$this->db->where('ts.post_status','1');
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			if($id!="")
			{
			$this->db->where('ts.id',$id);
			}
			$this->db->order_by('ts.id','desc');
			return $query = $this->db->get();
		}
		else if($model_function_name == "record_search")
		{
			$this->db->select('ts.*');
			$this->db->from(PRESS_RELEASE.' as ts');
			$this->db->where("ts.post_status='1' and ( ts.title LIKE '%$search%' OR ts.submitter_email LIKE '%$search%' OR ts.submitted_by LIKE '%$search%' OR date_format(date(ts.post_date),'%d-%M-%Y') LIKE '%$search%')");	
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			if($id!="")
			{
			$this->db->where('ts.id',$id);
			}
			$this->db->order_by('ts.id','desc');
			return $query = $this->db->get();
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('ts.*');
			$this->db->from(PRESS_RELEASE.' as ts');
			$this->db->where("ts.post_status='1' and ( ts.title LIKE '%$search%' OR ts.submitter_email LIKE '%$search%' OR ts.submitted_by LIKE '%$search%' OR date_format(date(ts.post_date),'%d-%M-%Y') LIKE '%$search%')");	
			if($id!="")
			{
			$this->db->where('ts.id',$id);
			}
			$this->db->order_by('ts.id','desc'); 
			$query = $this->db->get();
			return $query->num_rows();
	}
	public function get_ajax_pressrelease_list_request($limit,$start,$search,$col,$dir,$model_function_name,$id="")
    {   
	if($model_function_name == "total_record_count")
		{
			$this->db->select('ts.*');
			$this->db->from(PRESS_RELEASE.' as ts');
			if($id!="")
			{
			$this->db->where('ts.id',$id);
			}
			$this->db->where('ts.post_status','0');
			$this->db->order_by('ts.id','desc');
			$query = $this->db->get();
			return $query->num_rows();
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('ts.*');
			$this->db->from(PRESS_RELEASE.' as ts');
			$this->db->where('ts.post_status','0');
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			if($id!="")
			{
			$this->db->where('ts.id',$id);
			}
			$this->db->order_by('ts.id','desc');
			return $query = $this->db->get();
		}
		else if($model_function_name == "record_search")
		{
			$this->db->select('ts.*');
			$this->db->from(PRESS_RELEASE.' as ts');
			$this->db->where("ts.post_status='0' and ( ts.title LIKE '%$search%' OR ts.submitter_email LIKE '%$search%' OR ts.submitted_by LIKE '%$search%' OR date_format(date(ts.post_date),'%d-%M-%Y') LIKE '%$search%')");	
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			if($id!="")
			{
			$this->db->where('ts.id',$id);
			}
			$this->db->order_by('ts.id','desc');
			return $query = $this->db->get();
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('ts.*');
			$this->db->from(PRESS_RELEASE.' as ts');
			$this->db->where("ts.post_status='0' and ( ts.title LIKE '%$search%' OR ts.submitter_email LIKE '%$search%' OR ts.submitted_by LIKE '%$search%' OR date_format(date(ts.post_date),'%d-%M-%Y') LIKE '%$search%')");	
			if($id!="")
			{
			$this->db->where('ts.id',$id);
			}
			$this->db->order_by('ts.id','desc'); 
			$query = $this->db->get();
			return $query->num_rows();
	}
	
	
	
	
	
		
}