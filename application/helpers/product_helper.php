<?php
$CI =& get_instance();
function get_coverphoto($pid)
{
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select cover_photo from ".PRODUCT." where id='".$pid."'"; 
	$query 	= $ci->db->query($sql);
	$row 	= $query->row()->cover_photo;
	return $row;
}

function get_property_type($pid)
{   
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select property_type_name from ".PROPERTY_TYPE." where prop_id='".$pid."'"; 
	$query 	= $ci->db->query($sql);
	$row 	= $query->row()->property_type_name;
	return $row;
}

function get_country($pid)
{   
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select nicename from ".COUNTRY." where id='".$pid."'"; 
	$query 	= $ci->db->query($sql);
	$row 	= $query->row()->nicename;
	return $row;
}


function get_product_review($pid)
{   
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select avg(total_rate_value) from ".REVIEWS." where id='".$pid."'"; 
	$query 	= $ci->db->query($sql);
	$row 	= $query->row()->nicename;
	return $row;
}


function get_countrywise_visitor_count($country_code)
{   
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select count(id) as countid from ".USERS." where country_code='".$country_code."'"; 
	$query 	= $ci->db->query($sql);
	$row 	= $query->row()->countid;
	return $row;
}


?>