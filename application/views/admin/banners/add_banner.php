<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
			<h1><?php echo $heading;?></h1>
			  <ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		        <li class="active">Users</li>
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
            
			<form enctype="multipart/form-data" data-user-id="<?php if(!empty($banners)){ echo $banners->id; } ?>" id="student_register<?php if(!empty($banners)){ echo "_edit"; } ?>" action="<?php echo base_url();?>admin/banners/add_edit_insert/<?php if(!empty($banners)){ echo $banners->id; } ?>" method="post" novalidate="novalidate">
			<div class="box-body">
                <div class="form-group">
                  <label for="">Name</label>
                  <input  type="text" value="<?php if(!empty($banners)){ echo $banners->name; } ?>" name="name" class="form-control">
                </div>
				 <div class="form-group">
                  <label for="">Description</label>
				   <div>
				   <textarea name="description" style="height:100px;width: 100%;"  class="ui-wizard-content input_width siv des" title="Please enter description"><?php if(!empty($banners)){ echo $banners->description; }?></textarea>
				   </div>
                 </div>
				 <div class="form-group">
                  <label for="">Image (1400px X 500px)</label>
                  <input  type="file"  name="banner_image" class="ui-wizard-content"><br/><br/>
					<?php if(!empty($banners) && $banners->banner_image!=""){?> 
					<div class="form_input"><img  class="display_user_pro" src="<?php if(empty($banners)){ echo base_url().'images/site/profile/avatar.png';}else{ echo base_url();?>images/site/banners/<?php echo $banners->banner_image;}?>" width="100px" height="100px"/></div>
					<?php }?>
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
<?php $this->load->view('admin/common/footer.php');?>
