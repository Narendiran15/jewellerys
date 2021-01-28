<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Emailtemp_model extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
    
	public function databale($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$query = $this->db->get(EMAIL);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(EMAIL);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			$query = $this->db->like('title',$search)->or_like('subject',$search)->limit($limit,$start)->order_by($col,$dir)->get(EMAIL);
			return $query; 
		}
		else if($model_function_name == "search_record_count")
			$query = $this->db->like('title',$search)->or_like('subject',$search)->get(EMAIL);       
			return $query->num_rows();
	}	 
	 
	
	
}