<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Banners_model_backend extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
 	
	

	
	
	/*Ajax Based Users List*/
	public function get_ajax_banners_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$query = $this->db->get(BANNER);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(BANNER);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			$this->db->where("(name like '%$search%')");
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			$query = $this->db->get(BANNER);
			return $query; 
		}
		else if($model_function_name == "search_record_count")
			$query = $this->db->where("(username like '%$search%')")->get(BANNER);       
			return $query->num_rows();
	}
	

	
}