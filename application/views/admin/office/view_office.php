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
    <small><?php if($office_info->is_ho=="1"){ echo  "Head";}?> Branch </small><br>
    <?php echo get_iata_name($office_info->iata_id);?>, <?php echo get_country_name($office_info->country_id);?>
	</h1>

    <table class="table table-striped table-bordered detail-view"><tbody><tr><th class="col-sm-2">Company Name</th><td><?php echo get_company_name($office_info->company_id);?></td></tr>
<tr><th class="col-sm-2">Country</th><td><?php echo get_country_name($office_info->country_id);?></td></tr>
</tbody></table>    
    <h3>Address</h3>
    <table class="table table-striped table-bordered detail-view"><tbody>

<tr><th class="col-sm-2">Location</th><td><?php echo get_iata_name($office_info->iata_id);?></td></tr>
<tr><th class="col-sm-2">Branch Email</th><td><?php echo $office_info->branch_email;?></td></tr>
<tr><th class="col-sm-2">Address 1</th><td><?php echo $office_info->address1;?></td></tr>
<tr><th class="col-sm-2">Address 2</th><td><?php echo $office_info->address2;?></td></tr>
<tr><th class="col-sm-2">City</th><td><?php echo $office_info->city;?></td></tr>
<tr><th class="col-sm-2">State</th><td><?php echo $office_info->state;?></td></tr>
<tr><th class="col-sm-2">Zip/Postcode</th><td><?php echo $office_info->zip;?></td></tr>
<tr><th class="col-sm-2">Phone</th><td><?php echo $office_info->phone;?></td></tr>
<tr><th class="col-sm-2">Fax</th><td><?php echo $office_info->fax;?></td></tr>
 </tbody></table>   	
    
   
  <?php $i=1;$contacts=json_decode($office_info->contact_info,true);if(!empty($contacts)){   ?>
						  <h3>Contacts</h3>
						 
						  <table class="table table-striped table-bordered detail-view">
							 <tbody>
								<tr>
								<th class="col-sm-2">Name</th>
								<th class="col-sm-2">Title</th>
								<th class="col-sm-2">Email</th>
								<th class="col-sm-2">Skype</th>
								<th class="col-sm-2">Mobile</th>
								</tr>
								<?php foreach($contacts as $con){ if($con["name"]!=""){ ?>
								<tr>
								   
								   <td><?php echo $con["name"];?></td>
									<td><?php echo $con["job_title"];?></td>
									 <td><a href="mailto:<?php echo $con["email"];?>"><?php echo $con["email"];?></a></td>
								   <td><?php echo $con["skype"];?></td>
								   <td><?php echo $con["mobile"];?></td>	
								</tr>
								<?php }} ?>
							   
							 </tbody>
						  </table>
						  <?php } ?>	
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