<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Post_model_backend extends My_Model
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
	
	public function get_ajax_post_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$query = $this->db->get(POST);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(POST);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
					 $this->db->where("(name like '%$search%')");
					 $this->db->limit($limit,$start);
					 $this->db->order_by($col,$dir);
			$query = $this->db->get(POST);
			return $query; 
		}
		else if($model_function_name == "search_record_count")
			$query =  $this->db->where("(name like '%$search%')")->get(POST);       
			return $query->num_rows();
	}
	
	
	
		
}