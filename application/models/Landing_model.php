<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Landing_model extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	function get_export_column()
	{
		
		$this->db->select('o.*,c.name,c.corp_website,c.trading_name,c.contact_name');
		$this->db->from(OFFICE.' as o');
		$this->db->join(COMPANY.' as c','c.id=o.company_id');
		$this->db->where('c.status','active');
		$this->db->where('o.status','active');
		$this->db->order_by('o.id','desc');
		return $query = $this->db->get();
		
	}
	
	function get_next_summits()
	{
		
		$this->db->select('s.*');
		$this->db->from(SUMMITS.' as s');
		$this->db->where('s.status','1');
		$this->db->where("date(s.start_date)>'".date("Y-m-d")."'");
		$this->db->limit(2);
		$this->db->order_by('date(s.start_date)','asc');
		return $query = $this->db->get();
		
	}
	
	
	
	function all_other_branches($company_id)
	{
		
		$this->db->select('o.*,i.short_code,i.code');
		$this->db->from(OFFICE.' as o');
		$this->db->join(IATA.' as i','i.id=o.iata_id');
		$this->db->where('o.status','active');
		$this->db->where('o.company_id',$company_id);
		$this->db->order_by('o.id','desc');
		return $query = $this->db->get();
		
	}
	
	function get_featured_member()
	{
		
		$this->db->select('a.*,c.name,c.trading_name,c.description,c.country_id');
		$this->db->from(ADVERTISING.' as a');
		$this->db->join(COMPANY.' as c','c.id=a.company_id');
		$this->db->where('a.status','active');
		$this->db->order_by('a.id','desc');
		return $query = $this->db->get();
		
	}
	
	function get_gsan_news($page_no=0,$limit)
	{
		$this->db->select('o.*');
		$this->db->from(NEWS.' as o');
		$this->db->where('(o.status="publish")');		
		
		if($page_no != 0){
          $page_no = ($page_no-1) * $limit;
        }
		if($limit!="0"){
		$this->db->limit($limit,$page_no);
		}
		$this->db->order_by('o.id','desc');		
		return $query = $this->db->get();
		
	}
	
	
	function get_gsanmembers_news($page_no=0,$limit)
	{
		$this->db->select('o.*');
		$this->db->from(MEMBER_NEWS.' as o');
		$this->db->where('(o.status="1" and date(archeived_date)>"'.date("Y-m-d").'")');		
		
		if($page_no != 0){
          $page_no = ($page_no-1) * $limit;
        }
		if($limit!="0"){
		$this->db->limit($limit,$page_no);
		}
		$this->db->order_by('o.id','desc');		
		return $query = $this->db->get();
		
	}
	
	
	
	function ajax_search($where,$search_keyword)
	{
		$this->db->select('c.course_id');
		$this->db->from(OFFICE.' as o');
		$this->db->join(COMPANY.' as cy','cy.id=o.company_id');
        $this->db->join(COUNTRY.' as co','co.id=o.country_id');
		if($search_keyword!=""){
		     $this->db->where("((cy.name like '%$search_keyword%') )");
		}
		$this->db->where($where);
		$this->db->order_by("cy.id","desc");
		return $query = $this->db->get();
		
	}
	
	function get_search_limit($page_no,$country,$iata,$company_name,$limit,$members)
	{
		
		
		$this->db->select('o.*,cy.contact_name,cy.trading_name as company_name,cy.membership_status,co.name as country_name');
		$this->db->from(OFFICE.' as o');
		$this->db->join(COMPANY.' as cy','cy.id=o.company_id');
        $this->db->join(COUNTRY.' as co','co.id=o.country_id');
		
		$this->db->where('(o.status="active" or o.status="pending" )');
		#$this->db->where('(o.is_ho="1" )');
		
		if($company_name!=""){
		  $this->db->where("(cy.trading_name LIKE '%$company_name%' or cy.name LIKE '%$company_name%')");
		}
		if($country!=""){
		  $this->db->where("o.country_id ='$country'");
		}
		if($members!=""){
		  if($members==0){
			  
		  }	
		  else if($members==1){
			 $this->db->where("cy.membership_status ='Member'"); 
		  }
		  else if($members==2){
			 $this->db->where("cy.membership_status ='Associate'"); 
		  }
		  
		}
		if($iata!=""){
		$this->db->where("o.iata_id ='$iata'");
		}
		if($page_no != 0){
          $page_no = ($page_no-1) * $limit;
        }
		$this->db->limit($limit,$page_no);
		$this->db->order_by('cy.id','asc');
		$this->db->order_by('cy.top_listed_member','desc');
		return $query = $this->db->get();
		
	}
	
	function get_total_search_limit($page,$country,$iata,$company_name,$limit,$members)
	{   
		$this->db->select('o.*,cy.contact_name,cy.trading_name as company_name,cy.membership_status,co.name as country_name');
		$this->db->from(OFFICE.' as o');
		$this->db->join(COMPANY.' as cy','cy.id=o.company_id');
        $this->db->join(COUNTRY.' as co','co.id=o.country_id');
		
		$this->db->where('(o.status="active" or o.status="pending" )');
		#$this->db->where('(o.is_ho="1" )');
		
		if($company_name!=""){
		   $this->db->where("(cy.trading_name LIKE '%$company_name%' or cy.name LIKE '%$company_name%')");
		}
		if($country!=""){
		  $this->db->where("o.country_id ='$country'");
		}
		if($members!=""){
		  if($members==0){
			  
		  }	
		  else if($members==1){
			 $this->db->where("cy.membership_status ='Member'"); 
		  }
		  else if($members==2){
			 $this->db->where("cy.membership_status ='Associate'"); 
		  }
		  
		}
		if($iata!=""){
		$this->db->where("o.iata_id ='$iata'");
		}
		$this->db->order_by('o.id','desc');
		$this->db->order_by('cy.top_listed_member','desc');
		#$this->db->order_by("o.id asc,cy.top_listed_member desc");
		return $query = $this->db->get();
		
	}
	
	function search_filter_company($search_keyword)
	{
		 $query =$this->db->query("SELECT name FROM ".COMPANY." WHERE status='Active' and (name LIKE '%$search_keyword%' or trading_name LIKE '%$search_keyword%') limit 4");
		return $query ;
		
	}

	
	
    
}