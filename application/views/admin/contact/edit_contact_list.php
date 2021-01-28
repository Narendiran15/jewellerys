<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
 <link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Contact list</li>
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
            <h1>
			<span class="pull-right">
			<a class="btn btn-default" href="<?php echo base_url("admin/contact/display_contact_list");?>"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>            </span>
				 
		</h1>
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="listing_type<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/contact/edit_insert_contactlist/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
             <div class="box-body col-md-12">            
			 
              <div class="form-group">
                  <label for="">Contact Name</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->contact_name; } ?>" name="contact_name" class="form-control required input_width" title="Please enter email">
              </div>
			   <div class="form-group">
                  <label for="">Job Title</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->job_title; } ?>" name="job_title" class="form-control required input_width" title="Please enter job title">
              </div>
			   <div class="form-group">
                  <label for="">Email</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->email; } ?>" name="email" class="form-control required input_width" title="Please enter email">
              </div>
			   <div class="form-group">
                  <label for="">Phone</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->mobile; } ?>" name="mobile" class="form-control required input_width" title="Please enter phone">
              </div>
			  <div class="form-group">
                  <label for="">Skype</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->skype; } ?>" name="skype" class="form-control required input_width" title="Please enter skype">
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
   <script src="<?php echo base_url();?>js/admin/jquery.min.js"></script>
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>js/admin/tiny.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/site/flatpickr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/highlight.pack.js"></script>
<script>
$(document).ready(function(){
if($("#post_date").length==1){
	flatpickr("#post_date", { 
		altInput: true,
		minDate: "today",
		altFormat: "j-n-Y"						
	});
}
});
</script>
<?php $this->load->view('admin/common/footer.php');?>
