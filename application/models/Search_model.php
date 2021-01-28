<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Search_model extends My_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	function get_search_result($where,$search_keyword)
	{
		$this->db->select('(u.quality_score*1+(select IFNULL(avg(rate_val),0) from '.REVIEWS.' where teacher_id=u.id and status="1")*1) as sortkey,c.course_title,c.lession_type,c.course_id,c.teacher_id,c.class_description,c.cover_image,c.created as course_created,c.user_views,c.course_status,c.booked_count,c.price_per_hour,c.size_class,u.username,u.photo,(select avg(rate_val) from '.REVIEWS.' where teacher_id=u.id and status="1")as rate,(select count(id) from '.REVIEWS.' where teacher_id=u.id and status="1")as rate_count,c.age,c.gender,ca.category_name,c.course_no');
		$this->db->from(COURSE.' as c');
		$this->db->join(USERS.' as u','u.id=c.teacher_id');
		$this->db->join(CATEGORY.' as ca','ca.cat_id=c.cat_id');
		$this->db->join(SUBCATEGORY.' as sc','sc.subcat_id=c.subcat_id');
		if($search_keyword!=""){
		   $this->db->where("((c.course_title like '%$search_keyword%') or (u.username like '%$search_keyword%') or (ca.category_name like '%$search_keyword%') or (c.district_name like '%$search_keyword%')or (c.districts_name like '%$search_keyword%')or (c.address like '%$search_keyword%') or (sc.subcat_name like '%$search_keyword%') )");
		}
		$this->db->where($where);
		
		return $query = $this->db->get();
		
	}
	function total_course_list($where,$search_keyword)
	{
		$this->db->select('c.course_id');
		$this->db->from(COURSE.' as c');
		$this->db->join(USERS.' as u','u.id=c.teacher_id');
        $this->db->join(CATEGORY.' as ca','ca.cat_id=c.cat_id');
		$this->db->join(SUBCATEGORY.' as sc','sc.subcat_id=c.subcat_id');
        if($search_keyword!=""){
		     $this->db->where("((c.course_title like '%$search_keyword%') or (u.username like '%$search_keyword%') or (ca.category_name like '%$search_keyword%') or (c.district_name like '%$search_keyword%')or (c.districts_name like '%$search_keyword%')or (c.address like '%$search_keyword%') or (sc.subcat_name like '%$search_keyword%') )");
		}
		$this->db->where($where);
		return $query = $this->db->get();
		
	}
	function get_bookings($checkin_month,$checkin_year,$checkout_month,$checkout_year)
	{
		$this->db->select('b.pid,b.date_set');
		$this->db->from(BOOKING.' as b');
		$this->db->where("(month(b.checkin)='".$checkin_month."' and year(b.checkin)='".$checkin_year."') or (month(b.checkout)='".$checkout_month."' and year(b.checkout)='".$checkout_year."')");		
		$this->db->where("b.booking_status","3");
		return $query = $this->db->get();
		
	}
	function get_block_dates($checkin,$checkout)
	{
		$this->db->select('b.*');
		$this->db->from(BLOCK_DATES.' as b');
		$this->db->where("(DATE(b.dates)>='".$checkin."' and DATE(b.dates)<='".$checkout."')");		
		$this->db->where("b.day_type","1");
		return $query = $this->db->get();
		
	}
	function get_minprice()
	{
		$this->db->select('min(p.price) as minprice');
		$this->db->from(PRODUCT.' as p');
		$this->db->join(USERS.' as u','u.id=p.user_id');
		return $query = $this->db->get();
		
	}
	function get_maxprice()
	{
		$this->db->select('max(p.price) as maxprice');
		$this->db->from(PRODUCT.' as p');
		$this->db->join(USERS.' as u','u.id=p.user_id');
		return $query = $this->db->get();
		
	}
	function get_search_result_for_wishlist($where)
	{
		$this->db->select('p.id,p.photos,p.listing_title,p.address,p.beds_count,p.city,p.latitude,p.longitude,p.room_type,p.price,p.cover_photo');
		$this->db->from(PRODUCT.' as p');
		$this->db->join(USERS.' as u','u.id=p.user_id');
		$this->db->where('p.id',$where);
		return $query = $this->db->get();
		
	}
	
}