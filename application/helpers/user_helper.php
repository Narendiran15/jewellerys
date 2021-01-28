<?php
function get_post_detail($id)
{   
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select * from ".FC_POST." where id='".$id."'"; 
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0){
	$row 	= $query->row();
	}
	else{
		$row="-";
	}
	return $row;
}
function get_country_name($id)
{   
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select name from ".COUNTRY." where id='".$id."'"; 
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0){
	$row 	= $query->row()->name;
	}
	else{
		$row="-";
	}
	return $row;
}
function get_last_invoice_no()
{   
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select max(id)+1 as invoice_id from ".INVOICE." "; 
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0){
	$row 	= $query->row()->invoice_id;
	}
	else{
		$row="360";
	}
	return $row;
}
function get_recent_summit($id)
{   
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= 'SELECT s.name,a.* FROM `fc_assign_summits` as a  join fc_summits as s on a.summit_id=s.id where a.company_id="'.$id.'" and date(s.end_date)>="'.date("Y-m-d").'"'; 
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0){
	$row 	= $query->row()->name;
	}
	else{
		$row="-";
	}
	return $row;
}

	
function get_iata_name($id)
{   
    if($id!=""){
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select short_code,code from ".IATA." where id='".$id."'"; 
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0){
	$row 	= $query->row()->short_code.' ('.$query->row()->code.')';
	}
	else{
		$row="No Name";
	}
	return $row;
	}
	else{
	return '';	
	}
}

		
function get_company_name($id)
{   
    if($id!=""){
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select name from ".COMPANY." where id='".$id."'"; 
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0){
	$row 	= $query->row()->name;
	}
	else{
		$row="No Name";
	}
	return $row;
	}
	else{
	return '';	
	}
}		
function get_summit_name($id)
{   
    if($id!=""){
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select name from ".SUMMITS." where id='".$id."'"; 
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0){
	$row 	= $query->row()->name;
	}
	else{
		$row="No Name";
	}
	return $row;
	}
	else{
	return '';	
	}
}		
function get_hear_name($id)
{   
    if($id!=""){
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select hears_name from fc_hears where id='".$id."'"; 
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0){
	$row 	= $query->row()->hears_name;
	}
	else{
		$row="No Name";
	}
	return $row;
	}
	else{
	return '';	
	}
}

	


	
?>