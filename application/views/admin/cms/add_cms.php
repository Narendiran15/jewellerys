<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
			<h1><?php echo $heading;?></h1>
			  <ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		        <li class="active">CMS</li>
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
            
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="cms_register<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/cms/add_edit_cms_insert/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
              <div class="box-body">
                <div class="form-group">
                  <label for="">Title</label>
                  <input  type="text" value="<?php if(!empty($service)){ echo $service->title; } ?>" name="title" class="form-control required input_width" title="Please enter title">
                </div>
                <div class="form-group">
                  <label for="">Page content</label>
                  <textarea name="content" id="editor1" class="form-control des" title="Please enter content"><?php if(!empty($service)){ echo html_entity_decode($service->content);}?></textarea>
                </div>
			   <div class="form-group">
                  <label for="">Page type</label>
				  <select class="form-control select2" name="footer_order" style="width: 100%;">
						<option value=""></option>
						<option value="row1" <?php if(!empty($service)){ if($service->footer_order=="row1"){ echo "selected";}}?>>Footer</option>
						<option value="other" <?php if(!empty($service)){ if($service->footer_order=="other"){ echo "selected";}}?>>Other</option>						
				  </select>
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
<?php $this->load->view('admin/common/footer');?>
