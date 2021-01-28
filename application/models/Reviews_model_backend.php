<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Reviews_model_backend extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	
	function get_reviews()
	{
		$this->db->select('t.first_name as tfname,u.first_name as tname,b.*,r.rate_value,r.comments,r.id as rid,r.status as rstatus');
		$this->db->from(BOOKING.' as b');
		$this->db->join(USERS.' as t','t.id=b.host_id','left');
		$this->db->join(USERS.' as u','u.id=b.user_id','left');
		$this->db->join(REVIEWS.' as r','r.booking_id=b.id');
		$this->db->order_by('b.id','desc');
		return $query = $this->db->get();
		
	}
	function get_contactus($id="")
	{
		$this->db->select('b.*');
		$this->db->from(CONTACTUS.' as b');
		if($id!=""){
		$this->db->where('id',$id);
		}
		$this->db->order_by('b.id','desc');
		return $query = $this->db->get();
		
	}
	
	
	/*Ajax Based contacts List*/
	public function get_ajax_contacts_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$query = $this->db->get(CONTACTUS);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(CONTACTUS);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{	
			$this->db->like('email',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('phone',$search);
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			$query = $this->db->get(CONTACTUS);
			return $query; 
		}
		else if($model_function_name == "search_record_count")
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(CONTACTUS);
			return $query->num_rows(); 
	}
	
	/*Ajax Based Review List*/
	public function get_ajax_review_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('t.username as tfname,u.username as tname,b.*,r.rate_val,r.comments,r.id as rid,r.status as rstatus,r.report');
		    $this->db->from(BOOKING.' as b');
			$this->db->join(USERS.' as t','t.id=b.teacher_id','left');
			$this->db->join(USERS.' as u','u.id=b.user_id','left');
			$this->db->join(REVIEWS.' as r','r.booking_id=b.booking_id');
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows();
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('t.username as tfname,u.username as tname,b.*,r.rate_val,r.comments,r.id as rid,r.status as rstatus,r.report');
		    $this->db->from(BOOKING.' as b');
			$this->db->join(USERS.' as t','t.id=b.teacher_id','left');
			$this->db->join(USERS.' as u','u.id=b.user_id','left');
			$this->db->join(REVIEWS.' as r','r.booking_id=b.booking_id');
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			
			$query = $this->db->get();
			return $query;
		}
		else if($model_function_name == "record_search")
		{	
			$this->db->select('t.username as tfname,u.username as tname,b.*,r.rate_val,r.comments,r.id as rid,r.status as rstatus,r.report');
		    $this->db->from(BOOKING.' as b');
			$this->db->join(USERS.' as t','t.id=b.teacher_id','left');
			$this->db->join(USERS.' as u','u.id=b.user_id','left');
			$this->db->join(REVIEWS.' as r','r.booking_id=b.booking_id');
			$this->db->or_like('t.username',$search);
			$this->db->or_like('u.username',$search);
			$this->db->or_like('r.rate_val',$search);
			$this->db->or_like('r.comments',$search);  
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			
			return $query = $this->db->get();
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('t.username as tfname,u.username as tname,b.*,r.rate_val,r.comments,r.id as rid,r.status as rstatus,r.report');
		    $this->db->from(BOOKING.' as b');
			$this->db->join(USERS.' as t','t.id=b.teacher_id','left');
			$this->db->join(USERS.' as u','u.id=b.user_id','left');
			$this->db->join(REVIEWS.' as r','r.booking_id=b.booking_id');
			$this->db->order_by('b.booking_id','desc');
			$query = $this->db->get();
			return $query->num_rows();
	}
	
	
}