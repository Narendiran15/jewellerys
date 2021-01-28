<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Common_model_backend extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	 
	/*** Naren */

	function get_total_post()
	{
		$this->db->select('count(c.id) as total_post');
		$this->db->from(POST.' as c');
		return $query = $this->db->get();
		
	}
	function get_total_application($id=false)
	{
		$this->db->select('count(c.id) as total_application');
		$this->db->from(APPLICATION.' as c');
		if($id !="")
		{
			$this->db->where('c.post_id',$id);
		}
		return $query = $this->db->get()->row();
		
	}
	





	/**End Naren  */




	function map_country_list()
	{
		$this->db->select('u.name,c.country_id as cid,count(c.country_id) as visitor_count');
		$this->db->from(COMPANY.' as c');
		$this->db->join(COUNTRY.' as u','u.id=c.country_id');
		$this->db->group_by('c.country_id');
		return $query = $this->db->get();
		
	}
	
	function export_user_details($table,$fields_wanted)
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

	
	function total_members()
	{
		$this->db->select('count(c.id) as total_members');
		$this->db->from(COMPANY.' as c');
		return $query = $this->db->get();
		
	}

    function quotations_count()
	{
		$this->db->select('count(c.id) as quotations_count');
		$this->db->from(QUOTATION.' as c');
		return $query = $this->db->get();
		
	}


	function adv_request()
	{
		$this->db->select('count(c.id) as adv_request');
		$this->db->from(ADVERTISING.' as c');
		$this->db->where("status","hold");
		return $query = $this->db->get();
		
	}


	function new_members()
	{
		$this->db->select('count(c.id) as new_members');
		$this->db->from(COMPANY.' as c');
		$this->db->where("c.status","new");
		return $query = $this->db->get();
		
	}

    function pending_members()
	{
		$this->db->select('count(c.id) as pending_members');
		$this->db->from(COMPANY.' as c');
		$this->db->where("c.status","pending");
		return $query = $this->db->get();
		
	}
    function hold_members()
	{
		$this->db->select('count(c.id) as hold_members');
		$this->db->from(COMPANY.' as c');
		$this->db->where("c.status","hold");
		return $query = $this->db->get();
		
	}
	function active_members()
	{
		$this->db->select('count(c.id) as active_members');
		$this->db->from(COMPANY.' as c');
		$this->db->where("c.status","active");
		return $query = $this->db->get();
		
	}

    function terminated_members()
	{
		$this->db->select('count(c.id) as terminated_members');
		$this->db->from(COMPANY.' as c');
		$this->db->where("c.status","terminated");
		return $query = $this->db->get();
		
	}
    function get_used_service($id)
	{
		$this->db->select('c.id');
		$this->db->from(OFFICE.' as c');
		$this->db->where("FIND_IN_SET('".$id."', services_selected)");
		return $query = $this->db->get();
		
	}
    
	function founder_members()
	{
		$this->db->select('count(c.id) as founder_members');
		$this->db->from(COMPANY.' as c');
		$this->db->where("c.membership_status","founder");
		return $query = $this->db->get();
		
	}
	function associate_members()
	{
		$this->db->select('count(c.id) as associate_members');
		$this->db->from(COMPANY.' as c');
		$this->db->where("c.membership_status","associate");
		return $query = $this->db->get();
		
	}
	function regular_members()
	{
		$this->db->select('count(c.id) as regular_members');
		$this->db->from(COMPANY.' as c');
		$this->db->where("c.membership_status","regular");
		return $query = $this->db->get();
		
	}

	
	
	/*Ajax Based Users List*/
	public function get_ajax_summits_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$query = $this->db->get(SUMMITS);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(SUMMITS);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			$this->db->where("(name like '%$search%' or start_date like '%$search%' or end_date like '%$search%' or venue like '%$search%' )");
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			$query = $this->db->get(SUMMITS);
			return $query; 
		}
		else if($model_function_name == "search_record_count")
			$query = $this->db->where("(name like '%$search%' or start_date like '%$search%' or end_date like '%$search%' or venue like '%$search%' )")->get(SUMMITS);       
			return $query->num_rows();
	}
   
	/*Ajax Based Users List*/
	public function get_ajax_service_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$query = $this->db->get(SERVICES);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(SERVICES);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			$this->db->where("(name like '%$search%')");
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			$query = $this->db->get(SERVICES);
			return $query; 
		}
		else if($model_function_name == "search_record_count")
			$query = $this->db->where("(name like '%$search%')")->get(SERVICES);       
			return $query->num_rows();
	}
	
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
	
	
    public function get_ajax_news_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$query = $this->db->get(NEWS);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(NEWS);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			$this->db->where("(title like '%$search%')");
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			$query = $this->db->get(NEWS);
			return $query; 
		}
		else if($model_function_name == "search_record_count")
			$query = $this->db->where("(title like '%$search%')")->get(NEWS);       
			return $query->num_rows();
	}
	public function get_ajax_mailing_list($limit,$start,$search,$col,$dir,$model_function_name,$type)
    {   
		if($model_function_name == "total_record_count")
		{
			
			$where="$type='1'";
			$query = $this->db->where($where)->get(MAILING_LIST);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$where="$type='1'";
			$query = $this->db->limit($limit,$start)->where($where)->order_by($col,$dir)->get(MAILING_LIST);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			$where="$type='1'";
			$this->db->where("(email like '%$search%') and  ".$where);
			$this->db->limit($limit,$start);  
			$this->db->order_by($col,$dir);
			$query = $this->db->get(MAILING_LIST);
			return $query; 
		}
		else if($model_function_name == "search_record_count"){
			$where="$type='1'";
			$query = $this->db->where("(email like '%$search%') and ".$where)->get(MAILING_LIST);       
			return $query->num_rows();
		}
	}
	function export_mail($table,$fields_wanted,$type)
	{
		$query='SELECT ';
		foreach($fields_wanted as $field)
		{
		$query .=$field.',';
		}
		$query=substr($query,0,-1);
		$where="$type='1'";
		$query .=' FROM '.$table.' where '.$where.' order by id desc';
		$data['mail']=$this->ExecuteQuery($query);
		
		return $data;
	}
	
	
	public function get_ajax_Assignsummits_list($limit,$start,$search,$col,$dir,$model_function_name,$summit_id)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('s.name as summit_name,c.name as company_name,a.*');
			$this->db->from(ASSIGN_SUMMITS.' as a');
			$this->db->join(SUMMITS.' as s','s.id=a.summit_id',"left");
			$this->db->join(COMPANY.' as c','c.id=a.company_id',"left");
			if($summit_id!=""){
				$this->db->where("a.summit_id",$summit_id);
			}
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('s.name as summit_name,c.name as company_name,a.*');
			$this->db->from(ASSIGN_SUMMITS.' as a');
			$this->db->join(SUMMITS.' as s','s.id=a.summit_id',"left");
			$this->db->join(COMPANY.' as c','c.id=a.company_id',"left");
			if($summit_id!=""){
				$this->db->where("a.summit_id",$summit_id);
			}
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('s.name as summit_name,c.name as company_name,a.*');
			$this->db->from(ASSIGN_SUMMITS.' as a');
			$this->db->join(SUMMITS.' as s','s.id=a.summit_id',"left");
			$this->db->join(COMPANY.' as c','c.id=a.company_id',"left");
			if($summit_id!=""){
				$this->db->where("a.summit_id",$summit_id);
			}
			$this->db->where("( s.name LIKE '%$search%' or c.name LIKE '%$search%'  )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('s.name as summit_name,c.name as company_name,a.*');
			$this->db->from(ASSIGN_SUMMITS.' as a');
			$this->db->join(SUMMITS.' as s','s.id=a.summit_id',"left");
			$this->db->join(COMPANY.' as c','c.id=a.company_id',"left");
			if($summit_id!=""){
				$this->db->where("a.summit_id",$summit_id);
			}
			$this->db->where("( s.name LIKE '%$search%' or c.name LIKE '%$search%'  )");		
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
	public function get_ajax_users_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('u.*,c.name');
			$this->db->from(USERS.' as u');
			$this->db->join(COMPANY.' as c','c.id=u.company_id');
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('u.*,c.name');
			$this->db->from(USERS.' as u');
			$this->db->join(COMPANY.' as c','c.id=u.company_id');
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('u.*,c.name');
			$this->db->from(USERS.' as u');
			$this->db->join(COMPANY.' as c','c.id=u.company_id');
			$this->db->where("( c.email LIKE '%$search%' or c.name LIKE '%$search%'  )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('u.*,c.name');
			$this->db->from(USERS.' as u');
			$this->db->join(COMPANY.' as c','c.id=u.company_id');
			$this->db->where("( c.email LIKE '%$search%' or c.name LIKE '%$search%'  )");	
					
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
	public function ajax_question_template($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('e.title as template,q.*');
			$this->db->from(QUESTIONS.' as q');
			$this->db->join(EMAIL.' as e','q.email_template=e.id',"left");
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('e.title as template,q.*');
			$this->db->from(QUESTIONS.' as q');
			$this->db->join(EMAIL.' as e','q.email_template=e.id',"left");
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('e.title as template,q.*');
			$this->db->from(QUESTIONS.' as q');
			$this->db->join(EMAIL.' as e','q.email_template=e.id',"left");
			$this->db->where("( q.title LIKE '%$search%' or  e.title LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('e.title as template,q.*');
			$this->db->from(QUESTIONS.' as q');
			$this->db->join(EMAIL.' as e','q.email_template=e.id',"left");
			$this->db->where("( q.title LIKE '%$search%' or  e.title LIKE '%$search%' )");
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	public function display_members_news($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('c.name,n.*');
			$this->db->from(MEMBER_NEWS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where('n.post_type',"0");
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('c.name,n.*');
			$this->db->from(MEMBER_NEWS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where('n.post_type',"0");
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('c.name,n.*');
			$this->db->from(MEMBER_NEWS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where('n.post_type',"0");
			$this->db->where("( n.title LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('c.name,n.*');
			$this->db->from(MEMBER_NEWS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where('n.post_type',"0");
			$this->db->where("( n.title LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
	public function get_ajax_referal_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('c.name as company_name,n.*');
			$this->db->from(REFERRALS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('c.name as company_name,n.*');
			$this->db->from(REFERRALS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('c.name as company_name,n.*');
			$this->db->from(REFERRALS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where("( c.trading_name LIKE '%$search%' or n.member_name LIKE '%$search%'  or n.prospect_company LIKE '%$search%'  or n.prospect_contact_name LIKE '%$search%'  )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('c.name as company_name,n.*');
			$this->db->from(REFERRALS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where("( c.trading_name LIKE '%$search%' or n.member_name LIKE '%$search%'  or n.prospect_company LIKE '%$search%'  or n.prospect_contact_name LIKE '%$search%'  )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
	public function get_ajax_advertising_list($limit,$start,$search,$col,$dir,$model_function_name,$type)
    {   
		if($model_function_name == "total_record_count")
		{
			$where="n.status='".$type."'";
			$this->db->select('c.name as company_name,n.*');
			$this->db->from(ADVERTISING.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where($where);
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$where="n.status='".$type."'";
			$this->db->select('c.name as company_name,n.*');
			$this->db->from(ADVERTISING.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where($where);
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$where="n.status='".$type."'";
			$this->db->select('c.name as company_name,n.*');
			$this->db->from(ADVERTISING.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where($where);
			$this->db->where("( c.trading_name LIKE '%$search%' or n.link LIKE '%$search%'   )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$where="n.status='".$type."'"; 	
			$this->db->select('c.name as company_name,n.*');
			$this->db->from(ADVERTISING.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where($where);
			$this->db->where("( c.trading_name LIKE '%$search%' or n.link LIKE '%$search%'   )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
	public function get_ajax_country_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('c.*,r.name as region_name');
			$this->db->from(COUNTRY.' as c');
			$this->db->join(REGION.' as r','c.region_id=r.id',"left");
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('c.*,r.name as region_name');
			$this->db->from(COUNTRY.' as c');
			$this->db->join(REGION.' as r','c.region_id=r.id',"left");
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('c.*,r.name as region_name');
			$this->db->from(COUNTRY.' as c');
			$this->db->join(REGION.' as r','c.region_id=r.id',"left");
			$this->db->where("( c.name LIKE '%$search%' or  c.alpha2 LIKE '%$search%'  or  c.alpha3 LIKE '%$search%' or  c.calling_code  LIKE '%$search%' or  r.name LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('c.*,r.name as region_name');
			$this->db->from(COUNTRY.' as c');
			$this->db->join(REGION.' as r','c.region_id=r.id',"left");
			$this->db->where("( c.name LIKE '%$search%' or  c.alpha2 LIKE '%$search%'  or  c.alpha3 LIKE '%$search%' or  c.calling_code  LIKE '%$search%' or  r.name LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	public function get_ajax_invoice_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('c.trading_name as company_name,n.*');
			$this->db->from(INVOICE.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('c.trading_name as company_name,n.*');
			$this->db->from(INVOICE.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('c.trading_name as company_name,n.*');
			$this->db->from(INVOICE.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where("( c.trading_name LIKE '%$search%' or n.status LIKE '%$search%' or n.inv_number LIKE '%$search%' or n.amount LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('c.trading_name as company_name,n.*');
			$this->db->from(INVOICE.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where("( c.trading_name LIKE '%$search%' or n.status LIKE '%$search%' or n.inv_number LIKE '%$search%' or n.amount LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
		
	public function display_industry_news($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('c.name,n.*');
			$this->db->from(MEMBER_NEWS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where('n.post_type',"1");
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('c.name,n.*');
			$this->db->from(MEMBER_NEWS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where('n.post_type',"1");
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('c.name,n.*');
			$this->db->from(MEMBER_NEWS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where('n.post_type',"1");
			$this->db->where("( n.title LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('c.name,n.*');
			$this->db->from(MEMBER_NEWS.' as n');
			$this->db->join(COMPANY.' as c','n.company_id=c.id',"left");
			$this->db->where('n.post_type',"1");
			$this->db->where("( n.title LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
		
	public function get_ajax_port_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('p.*,cy.name as country_name');
			$this->db->from(PORTS.' as p');
			$this->db->join(COUNTRY.' as cy','cy.id=p.country_id');			
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('p.*,cy.name as country_name');
			$this->db->from(PORTS.' as p');
			$this->db->join(COUNTRY.' as cy','cy.id=p.country_id');			
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('p.*,cy.name as country_name');
			$this->db->from(PORTS.' as p');
			$this->db->join(COUNTRY.' as cy','cy.id=p.country_id');	
			$this->db->where("( p.name LIKE '%$search%' or  cy.name LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('p.*,cy.name as country_name');
			$this->db->from(PORTS.' as p');
			$this->db->join(COUNTRY.' as cy','cy.id=p.country_id');	
			$this->db->where("( p.name LIKE '%$search%' or  cy.name LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
		
	public function get_ajax_all_members_list($limit,$start,$search,$col,$dir,$model_function_name,$type='all')
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('c.*,cy.name as country_name');
			$this->db->from(COMPANY.' as c');
			$this->db->join(COUNTRY.' as cy','cy.id=c.country_id');
			if($type=="active"){
				$this->db->where('c.status',"active");
			}
			else if($type=="pending"){
				$this->db->where('c.status',"pending");
			}
			else if($type=="hold"){
				$this->db->where('c.status',"hold");
			}
			else if($type=="new"){
				$this->db->where('c.status',"new");
			}
			else if($type=="terminated"){
				$this->db->where('c.status',"terminated");
			}
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('c.*,cy.name as country_name');
			$this->db->from(COMPANY.' as c');
			$this->db->join(COUNTRY.' as cy','cy.id=c.country_id');
			if($type=="active"){
				$this->db->where('c.status',"active");
			}
			else if($type=="pending"){
				$this->db->where('c.status',"pending");
			}
			else if($type=="hold"){
				$this->db->where('c.status',"hold");
			}
			else if($type=="new"){
				$this->db->where('c.status',"new");
			}
			else if($type=="terminated"){
				$this->db->where('c.status',"terminated");
			}
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('c.*,cy.name as country_name ');
			$this->db->from(COMPANY.' as c');
			$this->db->join(COUNTRY.' as cy','cy.id=c.country_id');
			if($type=="active"){
				$this->db->where('c.status',"active");
			}
			else if($type=="pending"){
				$this->db->where('c.status',"pending");
			}
			else if($type=="hold"){
				$this->db->where('c.status',"hold");
			}
			else if($type=="new"){
				$this->db->where('c.status',"new");
			}
			else if($type=="terminated"){
				$this->db->where('c.status',"terminated");
			}
			$this->db->where("( c.trading_name LIKE '%$search%' or c.email LIKE '%$search%' or cy.name LIKE '%$search%' or c.status LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('c.*,cy.name as country_name');
			$this->db->from(COMPANY.' as c');
			$this->db->join(COUNTRY.' as cy','cy.id=c.country_id');
			if($type=="active"){
				$this->db->where('c.status',"active");
			}
			else if($type=="pending"){
				$this->db->where('c.status',"pending");
			}
			else if($type=="hold"){
				$this->db->where('c.status',"hold");
			}
			else if($type=="new"){
				$this->db->where('c.status',"new");
			}
			else if($type=="terminated"){
				$this->db->where('c.status',"terminated");
			}
			$this->db->where("( c.trading_name LIKE '%$search%' or c.email LIKE '%$search%' or cy.name LIKE '%$search%' or c.status LIKE '%$search%' )");		
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
		
	public function get_ajax_all_members_list_title($limit,$start,$search,$col,$dir,$model_function_name,$type='all')
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('c.*,cy.name as country_name');
			$this->db->from(COMPANY.' as c');
			$this->db->join(COUNTRY.' as cy','cy.id=c.country_id');
			$this->db->where('c.membership_status',$type);
			
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('c.*,cy.name as country_name');
			$this->db->from(COMPANY.' as c');
			$this->db->join(COUNTRY.' as cy','cy.id=c.country_id');
			$this->db->where('c.membership_status',$type);
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('c.*,cy.name as country_name ');
			$this->db->from(COMPANY.' as c');
			$this->db->join(COUNTRY.' as cy','cy.id=c.country_id');
			$this->db->where('c.membership_status',$type);
			$this->db->where("( c.trading_name LIKE '%$search%' or c.email LIKE '%$search%' or cy.name LIKE '%$search%' or c.status LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('c.*,cy.name as country_name');
			$this->db->from(COMPANY.' as c');
			$this->db->join(COUNTRY.' as cy','cy.id=c.country_id');
			$this->db->where('c.membership_status',$type);
			$this->db->where("( c.trading_name LIKE '%$search%' or c.email LIKE '%$search%' or cy.name LIKE '%$search%' or c.status LIKE '%$search%' )");		
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
		
	public function get_ajax_all_offices_list($limit,$start,$search,$col,$dir,$model_function_name,$type='all')
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('o.*,cy.name as country_name,p.short_code as port_name,c.trading_name as company_name');
			$this->db->from(OFFICE.' as o');
			$this->db->join(COMPANY.' as c','c.id=o.company_id');
			$this->db->join(COUNTRY.' as cy','cy.id=o.country_id');
			$this->db->join(IATA.' as p','p.id=o.iata_id');
			if($type!="all"){
			$this->db->where('o.status',$type);
			}
			
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('o.*,cy.name as country_name,p.short_code as port_name,c.trading_name as company_name');
			$this->db->from(OFFICE.' as o');
			$this->db->join(COMPANY.' as c','c.id=o.company_id');
			$this->db->join(COUNTRY.' as cy','cy.id=o.country_id');
			$this->db->join(IATA.' as p','p.id=o.iata_id');
			if($type!="all"){
			$this->db->where('o.status',$type);
			}
			
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('o.*,cy.name as country_name,p.short_code as port_name,c.trading_name as company_name');
			$this->db->from(OFFICE.' as o');
			$this->db->join(COMPANY.' as c','c.id=o.company_id');
			$this->db->join(COUNTRY.' as cy','cy.id=o.country_id');
			$this->db->join(IATA.' as p','p.id=o.iata_id');
			if($type!="all"){
			$this->db->where('o.status',$type);
			}
			$this->db->where("( c.trading_name LIKE '%$search%' or c.email LIKE '%$search%' or cy.name LIKE '%$search%' or c.status LIKE '%$search%' or p.short_code LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('o.*,cy.name as country_name,p.short_code as port_name,c.trading_name as company_name');
			$this->db->from(OFFICE.' as o');
			$this->db->join(COMPANY.' as c','c.id=o.company_id');
			$this->db->join(COUNTRY.' as cy','cy.id=o.country_id');
			$this->db->join(IATA.' as p','p.id=o.iata_id');
			if($type!="all"){
			$this->db->where('o.status',$type);
			}
			$this->db->where("( c.trading_name LIKE '%$search%' or c.email LIKE '%$search%' or cy.name LIKE '%$search%' or c.status LIKE '%$search%' or p.short_code LIKE '%$search%' )");		
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
		
	public function get_ajax_quotation_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$this->db->select('o.*,cy.name as country_name,p.name as port_name');
			$this->db->from(QUOTATION.' as o');
			$this->db->join(COUNTRY.' as cy','cy.id=o.country_id');
			$this->db->join(PORTS.' as p','p.id=o.port_id');
			$this->db->order_by($col,$dir);
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$this->db->select('o.*,cy.name as country_name,p.name as port_name');
			$this->db->from(QUOTATION.' as o');
			$this->db->join(COUNTRY.' as cy','cy.id=o.country_id');
			$this->db->join(PORTS.' as p','p.id=o.port_id');
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			$query = $this->db->get(); 
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
			
			$this->db->select('o.*,cy.name as country_name,p.name as port_name');
			$this->db->from(QUOTATION.' as o');
			$this->db->join(COUNTRY.' as cy','cy.id=o.country_id');
			$this->db->join(PORTS.' as p','p.id=o.port_id');
			$this->db->where("( c.trading_name LIKE '%$search%' or c.email LIKE '%$search%' or cy.name LIKE '%$search%' or c.status LIKE '%$search%' or p.name LIKE '%$search%' )");	
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
						
			return $query = $this->db->get(); 
		}
		else if($model_function_name == "search_record_count")
			$this->db->select('o.*,cy.name as country_name,p.name as port_name');
			$this->db->from(QUOTATION.' as o');
			$this->db->join(COUNTRY.' as cy','cy.id=o.country_id');
			$this->db->join(PORTS.' as p','p.id=o.port_id');
			$this->db->where("( c.trading_name LIKE '%$search%' or c.email LIKE '%$search%' or cy.name LIKE '%$search%' or c.status LIKE '%$search%' or p.name LIKE '%$search%' )");		
			$this->db->limit($limit,$start);
			$this->db->order_by($col,$dir);
			return $query = $this->db->get()->num_rows();
			
	}
	
	public function get_ajax_iata_list($limit,$start,$search,$col,$dir,$model_function_name)
    {   
		if($model_function_name == "total_record_count")
		{
			$query = $this->db->get(IATA);
			return $query->num_rows(); 
		}
		else if($model_function_name == "total_records")
		{
			$query = $this->db->limit($limit,$start)->order_by($col,$dir)->get(IATA);
			return $query; 
		}
		else if($model_function_name == "record_search")
		{
					 $this->db->where("(country_name like '%$search%' or code like '%$search%' or short_code like '%$search%')");
					 $this->db->limit($limit,$start);
					 $this->db->order_by($col,$dir);
			$query = $this->db->get(IATA);
			return $query; 
		}
		else if($model_function_name == "search_record_count")
			$query =  $this->db->where("(country_name like '%$search%' or code like '%$search%' or short_code like '%$search%')")->get(IATA);       
			return $query->num_rows();
	}
	
	
	

	
}