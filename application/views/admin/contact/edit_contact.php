<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
 <link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Page Texts</li>
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
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="listing_type<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/contact/edit_insert_contactus/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
             <div class="box-body col-md-12">            
			 
              <div class="form-group">
                  <label for="">Email</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->email; } ?>" name="email" class="email form-control required input_width" title="Please enter email">
              </div>
			  <div class="form-group">
                  <label for="">General Email</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->general_email; } ?>" name="general_email" class="form-control required input_width" title="Please enter general email">
              </div>
			  <div class="form-group">
                  <label for="">Accounting Email</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->accounting_email; } ?>" name="accounting_email" class="form-control required input_width" title="Please enter accounting email">
              </div>
			  <div class="form-group">
                  <label for="">Phone</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->phone; } ?>" name="phone" class="form-control input_width" title="Please enter phone">
              </div>
			  <div class="form-group">
                  <label for="">Address</label>
                  <textarea name="address"  class="form-control" title="Please enter address"><?php if(!empty($service)){ echo html_entity_decode($service->address);}?></textarea>
               </div>
			    <div class="form-group">
                  <label for="">Homepage About Text</label>
                  <textarea name="home_about_text1"  class="form-control des" title="Please enter about glsn homepage"><?php if(!empty($service)){ echo html_entity_decode($service->home_about_text1);}?></textarea>
               </div>
			    <div class="form-group">
                  <label for="">Footer Subscriber Text</label>
                  <textarea name="subscriber_text"  class="form-control" title="Please enter subscriber text homepage"><?php if(!empty($service)){ echo html_entity_decode($service->subscriber_text);}?></textarea>
               </div>
			    <div class="form-group">
                  <label for="">Banner Text</label>
                  <textarea name="banner_text"  class="form-control" title="Please enter banner text homepage"><?php if(!empty($service)){ echo html_entity_decode($service->banner_text);}?></textarea>
               </div>
			   <div class="form-group">
                  <label for="">Banner Membership Text</label>
                  <textarea name="membership_text"  class="form-control" title="Please enter banner text homepage"><?php if(!empty($service)){ echo html_entity_decode($service->membership_text);}?></textarea>
               </div>
			   <div class="form-group">
                  <label for="">Banner Summits Text</label>
                  <textarea name="summit_text"  class="form-control" title="Please enter banner text homepage"><?php if(!empty($service)){ echo html_entity_decode($service->summit_text);}?></textarea>
               </div>
			   <div class="form-group">
                  <label for="">Banner Member Text</label>
                  <textarea name="member_text"  class="form-control" title="Please enter banner text homepage"><?php if(!empty($service)){ echo html_entity_decode($service->member_text);}?></textarea>
               </div>
			   <div class="form-group">
                  <label for="">Banner Contact Text</label>
                  <textarea name="contact_text"  class="form-control" title="Please enter banner text homepage"><?php if(!empty($service)){ echo html_entity_decode($service->contact_text);}?></textarea>
               </div>			   
              <div class="form-group">
                  <label for="">Summits Text</label>
                  <textarea name="summits_text"  class="form-control" title="Please enter banner text homepage"><?php if(!empty($service)){ echo html_entity_decode($service->summits_text);}?></textarea>
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
