<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active">Questions</li>
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
            
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="email_register<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/questions/add_edit_email_insert/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
			<div class="box-body">
                <div class="form-group">
                  <label for="">Option:</label>
                    <input  type="text" value="<?php if(!empty($service)){ echo $service->title; } ?>" name="title" class="form-control required input_width" title="Please enter title">
                </div>
               
               <div class="form-group">
                  <label for="">Questions</label>
                  <textarea name="description" id="editor1" class="form-control des" title="Please enter content"><?php if(!empty($service)){ echo $service->description;}?></textarea>
                </div>
                <div class="form-group">
                  <label for="">Email Template</label>
                    <select name="email_template" class="form-control required" title="Please select email template">
					<option value="">Select Email template</option>
					<?php if($email_list->num_rows()>0){ foreach($email_list->result() as $em){ ?>
					<option <?php if(!empty($service)){ if($em->id==$service->email_template){ echo "selected"; }}?> value="<?php echo $em->id;?>"><?php echo $em->title;?></option>
					<?php }}?>
					</select>
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
