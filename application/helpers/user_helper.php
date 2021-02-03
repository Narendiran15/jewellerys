<?php
	function get_all_subcat_menus($id)
	{   
		$ci=& get_instance();
		$ci->load->database(); 
		
		$sql 	= "select * from ".SUBCATEGORY." where cid='".$id."' and status='Active' order by id limit 4"; 
		$query 	= $ci->db->query($sql);
		if($query->num_rows()>0){
		$row 	= $query->result();
		}
		else{
			$row=array();
		}
		return $row;
	}

	function get_our_product_by_cat($cid)
	{   
		$ci=& get_instance();
		$ci->load->database(); 
		$ci->db->select('p.*,c.*');
		$ci->db->from(PRODUCTMANAGEMENT.' as p');
		$ci->db->join(SUBCATEGORY.' as c','p.sub_cid=c.id');
		$ci->db->where('p.cid',$cid);
		$ci->db->where('p.our_products_status','Active');
		$ci->db->where('p.status','Active');
		$ci->db->where('c.status','Active');
		$ci->db->order_by('c.id','asc');
		return $query = $ci->db->get();
	
	}
?>