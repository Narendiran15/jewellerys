<?php if($search_result->num_rows()>0){foreach($search_result->result() as $res){?>

<tr>
 <td><a href="javascript:void(0);" class="click_company_btn" data-id="<?php echo $res->company_id?>" data-officeid="<?php echo $res->id;?>"><?php echo ucfirst($res->company_name);?></a> </td>
 <td> <?php echo get_iata_name($res->iata_id);?></td>
 <td><?php echo ucfirst($res->country_name);?></td>
 <td><?php echo date("Y",strtotime($res->reg_date));?></td>
 <td><?php 
    if($res->status=="new"||$res->status=="pending"){
		echo "Applicant";
	}
	else{
	echo ucfirst($res->membership_status);
	}
 ?></td>
 <td><a href="javascript:void(0);"><?php echo get_recent_summit($res->company_id);?></a></td>
 <td><a href="javascript:void(0);" class="contact_mail_send_btn themebtn" data-office_id="<?php echo $res->id?>" data-company_name="<?php echo $res->company_name;?>" data-email="<?php echo $res->branch_email; ?>" data-name="<?php echo $res->contact_name; ?>">Contact</a></td>
</tr>
<?php } } else{ ?>
<tr><td>No Members Found... </td></tr>
 <?php }?>