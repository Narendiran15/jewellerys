<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); 
if(!empty(unserialize($previllage))){extract(unserialize($previllage));}?>
<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
<?php if($this->session->flashdata('error_type')!='' && $this->session->flashdata('alert_message')!='' ){?>
<div class="callout callout-info <?php if(($this->session->flashdata('error_type')=='error')){?>modal-danger<?php }else{ echo "alert-success";}?>">
<a class="close" data-dismiss="modal" href="javascript:void(0);">x</a>

		<?php echo( $this->session->flashdata('alert_message'));?>
	<br>
</div>
	<?php } ?>
  <h1><small></small></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active">Offices</li>
		<li class="active"><?php echo $heading;?></li>
      </ol>
	  <!--<a style="float:right;" class="btn btn-success" href="<?php echo base_url();?>admin/student/export_student_list" >Export</a>-->
  </section>	
<!--End-breadcrumbs-->
<?php 
    $off_address1='';
    $off_address2='';
	$off_city='';
	$off_state="";
	$off_zip="";
	$off_phone="";
	$off_fax="";
	$comp_address_con="";
	$off_address_con="";
    if($office_info->address!=""){ 
	$office_profile=json_decode($office_info->address,true); 
	$off_address1=$office_profile["address1"]==""?"-":$office_profile["address1"];
	$off_address2=$office_profile["address2"]==""?"-":$office_profile["address2"];
	$off_city=$office_profile["city"]==""?"-":$office_profile["city"];
	$off_state=$office_profile["state"]==""?"-":$office_profile["state"];
	$off_zip=$office_profile["zip"]==""?"-":$office_profile["zip"];
	$addre=array();
	if($off_city!="-"){
		$addre[]=$off_city;
	}
	if($off_state!="-"){
		$addre[]=$off_state;
	}
	if($off_zip!="-"){
		$addre[]=$off_zip;
	}
	$off_address_con=implode(",",$addre);
	$off_phone=$office_profile["phone"]==""?"-":$office_profile["phone"];
	$off_fax=$office_profile["fax"]==""?"-":$office_profile["fax"];
}
if($office_info->profile!=""){ 
	$office_profile=json_decode($office_info->profile,true); 
	
	$emergency=$office_profile["emergency"]==""?"-":$office_profile["emergency"];
	$whwday_from=$office_profile["whwday_from"]==""?"-":$office_profile["whwday_from"];
	$whwday_to=$office_profile["whwday_to"]==""?"-":$office_profile["whwday_to"];
	$whwend_from=$office_profile["whwend_from"]==""?"-":$office_profile["whwend_from"];
	$whwend_to=$office_profile["whwend_to"]==""?"-":$office_profile["whwend_to"];
	$weekdays=$whwday_from.' - '.$whwday_to;
	$weekends=$whwend_from.' - '.$whwend_to;
	
}
?>
<!--Action boxes-->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
<div class="box-body">
<div class="container-fluid">
	        
<div class="member-office-view">

    <h1>
    <span class="pull-right">
        <a class="btn btn-default" href="javascript:void(0);" onclick="window.history.go(-1); return false;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>                <a class="btn btn-primary" href="<?php echo base_url("admin/office/update_office/".$office_info->id);?>">Update</a>        <a class="btn btn-danger" href="<?php echo base_url("admin/office/delete_office/".$office_info->id);?>" onclick="return confirm('Are you sure you want to delete this item?');return false;" data-method="post">Delete</a>    </span>
    <small>Office</small><br>
    <?php echo get_port_name($office_info->port_id);?>, <?php echo get_country_name($office_info->country_id);?>
	</h1>

    <table class="table table-striped table-bordered detail-view"><tbody><tr><th class="col-sm-2">Company Name</th><td><?php echo get_company_name($office_info->company_id);?></td></tr>
<tr><th class="col-sm-2">Country</th><td><?php echo get_country_name($office_info->country_id);?></td></tr>
<tr><th class="col-sm-2">Port</th><td><?php echo get_port_name($office_info->port_id);?></td></tr></tbody></table>    
    <h3>Address</h3>
    <table class="table table-striped table-bordered detail-view"><tbody><tr><th class="col-sm-2">Address 1</th><td><?php echo $off_address1;?></td></tr>
<tr><th class="col-sm-2">Address 2</th><td><?php echo $off_address2;?></td></tr>
<tr><th class="col-sm-2">Phone</th><td><?php echo $off_phone;?></td></tr>
<tr><th class="col-sm-2">Fax</th><td><?php echo $off_fax;?></td></tr>
<tr><th class="col-sm-2">City</th><td><?php echo $off_city;?></td></tr>
<tr><th class="col-sm-2">State</th><td><?php echo $off_state;?></td></tr>
<tr><th class="col-sm-2">Zip/Postcode</th><td><?php echo $off_zip;?></td></tr></tbody></table>
    <?php $services_list=explode(",",$office_info->services_selected);
	
	if(!empty($services_list)){ ?>
	<h3>Services Offered</h3>
        <?php foreach($services_list as $ser){?>
		<div class="row"><label class="col-sm-6"><?php echo get_services_name($ser);?> </label>
		</div>
		<?php } ?>
        	
        
	<?php }?>	
    
    <h3>Contacts</h3>
    <div class="row">
    	<div class="col-sm-12">
    		    		
    		<?php  if($primary_info->num_rows()>0){?>
			<div class="col-sm-6 contact primary">
               <div class="inner">
                  <a class="label label-danger pull-right delContact" href="javascript:void(0);" data-id="<?php echo $primary_info->row()->id;?>"  data-method="post">Remove</a>	    			
                  <p><strong>Primary Contact</strong></p>
                  <p align="left">
                     <img class="contact-photo" src="/gsan_old/gsannew/backend/web/images/person.jpg" alt="">    			<a href="mailto:<?php echo $primary_info->row()->email;?>"><?php echo $primary_info->row()->contact_name==""?"-":$primary_info->row()->contact_name;?></a><br>
                     <?php echo $primary_info->row()->contact_name;?><br>
                     <?php if($primary_info->row()->mobile!=""){?><i class="fa fa-phone-square"></i> <?php echo $primary_info->row()->mobile;?><br><?php } if($primary_info->row()->skype!=""){?>    				    			
                     <i class="fa fa-skype"></i> <?php echo $primary_info->row()->skype;?><br><?php } ?>    				    			
                        				    			
                  </p>
               </div>
            </div>
			<?php } ?>
    		
    		    		
    		 <?php  if($sales_info->num_rows()>0){?>
			<div class="col-sm-6 contact primary">
               <div class="inner">
                  <a class="label label-danger pull-right delContact" href="javascript:void(0);" data-id="<?php echo $sales_info->row()->id;?>" data-method="post">Remove</a>	    			
                  <p><strong>Sales Contact</strong></p>
                  <p align="left">
                     <img class="contact-photo" src="/gsan_old/gsannew/backend/web/images/person.jpg" alt="">    			<a href="mailto:<?php echo $sales_info->row()->email;?>"><?php echo $sales_info->row()->contact_name==""?"-":$sales_info->row()->contact_name;?></a><br>
                     <?php echo $sales_info->row()->contact_name;?><br>
                     <?php if($sales_info->row()->mobile!=""){?><i class="fa fa-phone-square"></i> <?php echo $sales_info->row()->mobile;?><br><?php } if($sales_info->row()->skype!=""){?>    				    			
                     <i class="fa fa-skype"></i> <?php echo $sales_info->row()->skype;?><br><?php } ?>    				    			
                        				    			
                  </p>
               </div>
            </div>
			<?php } ?>
    		    		
    		<?php  if($operations_info->num_rows()>0){?>
			<div class="col-sm-6 contact primary">
               <div class="inner">
                  <a class="label label-danger pull-right delContact" href="javascript:void(0);" data-id="<?php echo $operations_info->row()->id;?>"  data-method="post">Remove</a>	    			
                  <p><strong>Operations Contact</strong></p>
                  <p align="left">
                     <img class="contact-photo" src="/gsan_old/gsannew/backend/web/images/person.jpg" alt="">    			<a href="mailto:<?php echo $operations_info->row()->email;?>"><?php echo $operations_info->row()->contact_name==""?"-":$operations_info->row()->contact_name;?></a><br>
                     <?php echo $operations_info->row()->contact_name;?><br>
                     <?php if($operations_info->row()->mobile!=""){?><i class="fa fa-phone-square"></i> <?php echo $operations_info->row()->mobile;?><br><?php } if($operations_info->row()->skype!=""){?>    				    			
                     <i class="fa fa-skype"></i> <?php echo $operations_info->row()->skype;?><br><?php } ?>    				    			
                        				    			
                  </p>
               </div>
            </div>
			<?php } ?>
    		
    		    	</div>
    </div>
</div>
	        </div>
</div>
</div>
</div>
</section>
</div>
<script>
$(document).on("click",".delContact",function(data){
	var thisval=$(this);
	if (confirm('Are you sure you want to remove this contact?')) {
	$.post(baseurl+"admin/members/delete_contacts",{"id":$(this).attr("data-id")},function(data){
		thisval.parent().parent().remove();
	});
	}
});
</script>
<?php $this->load->view('admin/common/footer.php');?>