<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
 <link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Edit Fees</li>
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
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="listing_type<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/fees/edit_insert_fees/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
             <div class="box-body col-md-12">            
			 
              <div class="form-group">
                  <label for="">Application Fee</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->application_fee; } ?>" name="application_fee" class="form-control required input_width" title="Please enter application fee">
              </div>
			  <div class="form-group">
                  <label for="">Featured Member Fee</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->featured_member; } ?>" name="featured_member" class="form-control required input_width" title="Please enter featured member fee">
              </div>
			  <div class="form-group">
                  <label for="">Featured Member Discount</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->featured_member_discount; } ?>" name="featured_member_discount" class="form-control  input_width" title="Please enter featured member discount ">
               </div>
			   <div class="form-group">
                  <label for="">Top Listed Member Fee</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->top_listed_member; } ?>" name="top_listed_member" class="form-control required input_width" title="Please enter price for year logo advertisement ">
               </div>
			  <div class="form-group">
                  <label for="">Top Listed Member Discount Fee</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->top_listed_member_discount; } ?>" name="top_listed_member_discount" class="form-control  input_width" title="Please enter top
				    listed member discount fee">
               </div>
			   <div class="form-group">
                  <label for="">Each Branch Fee</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->branch; } ?>" name="branch" class="form-control required input_width" title="Please enter branch fee ">
               </div>
			   <div class="form-group">
                  <label for="">Payment Protection Pay1 Fee</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->pay1; } ?>" name="pay1" class="form-control required input_width" title="Please enter payment protection pay1 fee ">
               </div>
			   <div class="form-group">
                  <label for="">Payment Protection Pay1 Debt Amount</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->pay1_desc; } ?>" name="pay1_desc" class="form-control required input_width" title="Please enter payment protection pay1 fee ">
               </div>
			   <div class="form-group">
                  <label for="">Payment Protection Pay2 Fee</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->pay2; } ?>" name="pay2" class="form-control required input_width" title="Please enter payment protection pay2 fee ">
               </div>
			   <div class="form-group">
                  <label for="">Payment Protection Pay2 Debt Amount</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->pay2_desc; } ?>" name="pay2_desc" class="form-control required input_width" title="Please enter payment protection pay2 fee ">
               </div>
			  <div class="form-group">
                  <label for="">Additional Person</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->additional_person; } ?>" name="additional_person" class="form-control required input_width" title="Please enter additional person">
               </div>
			   <div class="form-group">
                  <label for="">Inbound Wire Transfer Fee</label>
                   <input  type="text" value="<?php if(!empty($service)){ echo $service->wire; } ?>" name="wire" class="form-control required input_width" title="Please enter wire transfer fee">
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
