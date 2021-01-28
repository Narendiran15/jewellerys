<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active">Email</li>
		<li class="active"><?php echo $heading;?></li>
      </ol>
  </section>
<section class="content">
<!--End-breadcrumbs-->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="email_register<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/emailtemp/add_edit_email_insert/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
			<div class="box-body">
                <div class="form-group">
                  <label for="">Template Name</label>
                    <input  type="text" value="<?php if(!empty($service)){ echo $service->title; } ?>" name="title" class="form-control required input_width" title="Please enter title">
                </div>
               <div class="form-group">
                  <label for="">Subject</label>
                    <input  type="text" value="<?php if(!empty($service)){ echo $service->subject; } ?>" name="subject" class="form-control required input_width" title="Please enter title">
                </div>
               <div class="form-group">
                  <label for="">content</label>
                  <textarea name="email_desc" id="editor1" class="form-control des" title="Please enter content"><?php if(!empty($service)){ echo $service->email_desc;}?></textarea>
                </div>
                <div class="form-group">
                  <label for="">Bcc</label>
                    <input  type="text" value="<?php if(!empty($service)){ echo $service->bcc; } ?>" name="bcc" class="form-control input_width" >
                </div>
               
			  </div>
             
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
				<div id="status"></div>
              </div>
				<div id="submitted"></div>
				</div>
            </form>
          </div>
        </div>
</section>
      </div>
  <script src="<?php echo base_url();?>js/admin/jquery.min.js"></script>
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>js/admin/tiny.js"></script>	  
<?php $this->load->view('admin/common/footer');?>
