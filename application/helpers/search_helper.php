<?php
function get_coverphoto($pid)
{
	if($pid!=""){
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select cover_photo from ".PRODUCT." where id='".$pid."'"; 
	$query 	= $ci->db->query($sql);
	$row 	= $query->row()->cover_photo;
	return $row;
	}
	else { return "";}
}

function get_property($pid)
{   if($pid!=""){
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "select property_type_name from ".PROPERTY_TYPE." where prop_id='".$id."'"; 
	$query 	= $ci->db->query($sql);
	$row 	= $query->row()->property_type_name;
	return $row;
	}
	else { return "";}
}


?>