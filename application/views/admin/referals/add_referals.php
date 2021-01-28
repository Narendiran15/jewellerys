<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Referals</li>
        <li class="active"><?php echo $heading;?></li>
      </ol>
</section>
<!--End-breadcrumbs-->
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!--<div class="box-header with-border">
              <h3 class="box-title"><?php echo $heading;?></h3>
            </div>-->
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="listing_type<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/referals/add_edit_insert/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
             <div class="box-body">            
			 <div class="form-group">
                  <label for="">Prospect's Company Name</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->prospect_company; } ?>" name="prospect_company" class="form-control required input_width" title="Please enter prospect company name">
             </div>
             <div class="form-group">
                  <label for="">Prospect's Contact Name</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->prospect_contact_name; } ?>" name="prospect_contact_name" class="form-control required input_width" title="Please enter prospect contact name">
             </div>
             <div class="form-group">
                  <label for="">Prospect's Email Address</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->prospect_email; } ?>" name="prospect_email" class="form-control required input_width email" title="Please enter email">
             </div>
             <div class="form-group">
                  <label for="">Your Name</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->member_name; } ?>" name="member_name" class="form-control required input_width" title="Please enter member name">
             </div>
             <div class="form-group">
                  <label for="">Email</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->member_email; } ?>" name="member_email" class="form-control required input_width email" title="Please enter member email">
             </div>
             <div class="form-group">
                  <label for="">Reg Date</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo date("Y-m-d",strtotime($service->reg_date)); } ?>" name="reg_date" id="reg_date" class="form-control input_width" title="Please enter reg date">
             </div>
             <div class="form-group">
                 
				 
					<div class="checkbox">
					<label>
					<input type="checkbox" <?php if(!empty($service)){ if($service->is_registered==1){ echo "checked";} } ?> id="referral-is_registered" name="is_registered" value="1">
					Is Registered
					</label>
					</div>
					
					
			</div>
              </div>           
                 <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
				<div id="status"></div>
              </div>
				<div id="submitted"></div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
 <script type="text/javascript" src="<?php echo base_url();?>js/site/flatpickr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/highlight.pack.js"></script>
<script>
$(document).ready(function(){
if($("#reg_date").length==1){
	flatpickr("#reg_date", { 
		altInput: true,
		minDate: "today",
		altFormat: "j-n-Y"						
	});
}
});
</script>
<?php $this->load->view('admin/common/footer.php');?>
