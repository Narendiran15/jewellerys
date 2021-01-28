<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cms_model_backend extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_ajax_cms_list($limit,$start,$search,$col,$dir,$model_function_name)
    {  
		if($model_function_name == "total_record_count")
		{
			$query = $this->db->get(CMS);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(CMS);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			$this->db->like('title',$search)->or_like('footer_menu_status',$search)->or_like('footer_order',$search);
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			$query = $this->db->get(CMS);
			return $query; 
		}
		else if($model_function_name == "search_record_count")
			$query = $this->db->like('title',$search)->or_like('footer_menu_status',$search)->or_like('footer_order',$search)->get(CMS);       
			return $query->num_rows(); 
	}
	
}