<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
			<h1><?php echo $heading;?></h1>
			  <ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		        <li class="active">Summits</li>
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
            
			<form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="student_register<?php if(!empty($service)){ echo "_edit"; } ?>" action="<?php echo base_url();?>admin/summits/add_edit_insert/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
			<div class="box-body">
                 
				  <div class="form-group">
                  <label for="">Name</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->name; } ?>" name="name" class="form-control required input_width" title="Please enter name">
                 </div>
				  <div class="form-group">
                  <label for="">Start Date</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->start_date; } ?>" name="start_date" id="start_date" class="form-control required input_width" title="Please enter start date">
                 </div>
				  <div class="form-group">
                  <label for="">End Date</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->end_date; } ?>" name="end_date" id="end_date" class="form-control required input_width" title="Please enter end date">
                 </div>
				 <div class="form-group">
                  <label for="">Venue</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->venue; } ?>" name="venue" class="form-control required input_width" title="Please enter venue">
                 </div>
				<div class="form-group">
                  <label for="">City</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->city; } ?>" name="city" class="form-control required input_width" title="Please enter city">
                 </div>
				<div class="form-group">
                  <label for="">Country</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->country; } ?>" name="country" class="form-control required input_width" title="Please enter country">
                 </div>
				 <div class="form-group">
                  <label for="">Description</label>
				   <div>
				   <textarea name="description" style="height:100px;width: 100%;"  class="ui-wizard-content input_width siv des" title="Please enter description"><?php if(!empty($service)){ echo $service->description; }?></textarea>
				   </div>
                 </div>
				 <div class="form-group">
                  <label for="">Image</label>
                  <input  type="file"  name="img" class="ui-wizard-content"><br/><br/>
					<?php if(!empty($service) && $service->img!=""){?> 
					<div class="form_input"><img  class="display_user_pro" src="<?php if(empty($service)){ echo base_url().'images/site/profile/avatar.png';}else{ echo base_url();?>images/site/summits/<?php echo $service->img;}?>" style="width:20%;height: 50px;"/></div>
					<?php }?>
                </div>
				<div class="form-group">
                  <label for="">Link</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->link; } ?>" name="link" class="form-control required input_width" title="Please enter link">
                 </div>
				 
				
				
				</div>
				<div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
if($("#start_date").length==1){
	flatpickr("#start_date", { 
		altInput: true,
		minDate: "today",
		altFormat: "Y-n-j"					
	});
}if($("#end_date").length==1){
	flatpickr("#end_date", { 
		altInput: true,
		minDate: "today",
		altFormat: "Y-n-j"						
	});
}
});
</script>
<?php $this->load->view('admin/common/footer.php');?>
