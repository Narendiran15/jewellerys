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
            
			<form enctype="multipart/form-data" data-user-id="<?php if(!empty($user)){ echo $user->id; } ?>" id="student_register<?php if(!empty($user)){ echo "_edit"; } ?>" action="<?php echo base_url();?>admin/users/add_edit_insert/<?php if(!empty($user)){ echo $user->id; } ?>" method="post" novalidate="novalidate">
			<div class="box-body">
                <div class="form-group">
                  <label for="">Company</label>
                 <div class="form-group"><?php echo get_company_name($user->company_id);?></div>
                </div>
				
				<div class="form-group">
                  <label for="">Email</label>
                  <input value="<?php if(!empty($user)){ echo $user->email; } ?>" type="text" name="email"  class="form-control">
                </div>
				<div class="form-group">
                  <label for="">Password</label>
                  <input  type="password" name="password" class="form-control">
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
<?php $this->load->view('admin/common/footer.php');?>
