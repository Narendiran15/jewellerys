<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Payment_model_backend extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_ajax_payment_list($limit,$start,$search,$col,$dir,$model_function_name,$condition)
    {   

		if($model_function_name == "total_record_count")
		{
			$this->db->select('p.*,i.*');
			$this->db->from(INVOICE_PAYMENT.' as p');
			
			$this->db->join(INVOICE.' as i','p.inv_id=i.id');
			$this->db->order_by($col,$dir);
			$this->db->order_by('p.inv_id','DESC');
			
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('p.*,i.*');
			$this->db->from(INVOICE_PAYMENT.' as p');
			$this->db->join(INVOICE.' as i','p.inv_id=i.id');
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$this->db->order_by('p.inv_id','DESC');
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			$this->db->select('p.*,i.*');
			$this->db->from(INVOICE_PAYMENT.' as p');
			$this->db->join(INVOICE.' as i','p.inv_id=i.id');
			
			$this->db->where("( status LIKE '%$search%' or inv_number LIKE '%$search%' or amount LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$this->db->order_by('p.inv_id','DESC');			
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count"){
			$this->db->select('p.*,i.*');
			$this->db->from(INVOICE_PAYMENT.' as p');
			$this->db->join(INVOICE.' as i','p.inv_id=i.id');
			
			$this->db->where("( status LIKE '%$search%' or inv_number LIKE '%$search%' or amount LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$this->db->order_by('p.inv_id','DESC');	
			return $query = $this->db->get()->num_rows();
		}
	}
	
	public function get_ajax_invoice_list($limit,$start,$search,$col,$dir,$model_function_name,$condition)
    {   

		if($model_function_name == "total_record_count")
		{
			$this->db->select('*');
			$this->db->from(INVOICE);
			$this->db->where($condition);
			
			$this->db->order_by($col,$dir);
			
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('*');
			$this->db->from(INVOICE);
			$this->db->where($condition);
			
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('*');
			$this->db->from(INVOICE);
			$this->db->where($condition);
			
			$this->db->where("( status LIKE '%$search%' or inv_number LIKE '%$search%' or amount LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('*');
			$this->db->from(INVOICE);
			$this->db->where($condition);
			
			$this->db->where("( status LIKE '%$search%' or inv_number LIKE '%$search%' or amount LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
 	
	

	
}