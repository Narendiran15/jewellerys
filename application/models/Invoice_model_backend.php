<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Invoice_model_backend extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	
	
	/*Ajax Based get_ajax_invoice_list List*/
	public function get_ajax_invoice_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('i.*');
		    $this->db->from(INVOICE.' as i');
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows();
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('i.*');
		    $this->db->from(INVOICE.' as i');
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			
			$query = $this->db->get();
			return $query;
		}
		else if($model_function_name == "record_search")
		{	
			$this->db->select('i.*');
		    $this->db->from(INVOICE.' as i');
			$this->db->or_like('i.username',$search);
			$this->db->or_like('i.invoice_no',$search);
			$this->db->or_like('i.listing_name',$search);
			$this->db->or_like('i.plan_name',$search);
			$this->db->or_like('i.transaction_id',$search);
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			
			return $query = $this->db->get();
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('i.*');
		    $this->db->from(INVOICE.' as i');
			$this->db->or_like('i.username',$search);
			$this->db->or_like('i.invoice_no',$search);
			$this->db->or_like('i.listing_name',$search);
			$this->db->or_like('i.plan_name',$search);
			$this->db->or_like('i.transaction_id',$search);
			$query = $this->db->get();
			return $query->num_rows();
	}
	
	
}