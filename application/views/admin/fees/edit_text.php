<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
 <link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Edit Invoice Text</li>
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
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="listing_type<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/fees/edit_insert_fees_text/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
             <div class="box-body col-md-12">            
			 
              <div class="form-group">
                  <label for="">Member fee Text</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->head_text; } ?>" name="head_text" class="form-control required input_width" title="Please enter Member fee text">
              </div>
			  <div class="form-group">
                  <label for="">Branch fee Text</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->branch_text; } ?>" name="branch_text" class="form-control required input_width" title="Please enter featured member fee">
              </div>
			  <div class="form-group">
                  <label for="">Payment Text</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->payment_text; } ?>" name="payment_text" class="form-control  required input_width" title="Please enter payment text">
               </div>
			   <div class="form-group">
                  <label for="">Featured Text</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->featured_text; } ?>" name="featured_text" class="form-control required input_width" title="Please enter featured text">
               </div>
			  <div class="form-group">
                  <label for="">Top listed Text</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->toplist_text; } ?>" name="toplist_text" class="form-control required input_width" title="Please enter top listed text">
               </div>
			  <div class="form-group">
                  <label for="">Summit Text</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->summit_text; } ?>" name="summit_text" class="form-control required input_width" title="Please enter summit text">
               </div>
			   <div class="form-group">
                  <label for="">Additional Text</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->addtional_text; } ?>" name="addtional_text" class="form-control required input_width" title="Please enter branch fee ">
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
