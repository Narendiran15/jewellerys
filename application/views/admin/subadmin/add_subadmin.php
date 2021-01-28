<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); #error_reporting(0); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
  <?php if($this->session->flashdata('error_type')!='' && $this->session->flashdata('alert_message')!='' ){?>
	<div class="alert <?php if(($this->session->flashdata('error_type')=='error')){?>alert-danger<?php }else{ echo "alert-success";}?>">
	<a class="close" data-dismiss="alert" href="javascript:void(0);">×</a>
		<?php echo( $this->session->flashdata('alert_message'));?><br>
	</div>
	<?php } ?>
		<h1><?php echo $heading;?></h1>
		  <ol class="breadcrumb">
			 <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		     <li class="active">Subadmin</li>
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
            
			<form enctype="multipart/form-data" data-user-id="<?php if(!empty($user)){ echo $user->id; } ?>" id="subadmin_register<?php if(!empty($user)){ echo "_edit"; } ?>" action="<?php echo base_url();?>admin/subadmin/add_edit_insert/<?php if(!empty($user)){ echo $user->id; } ?>" method="post" novalidate="novalidate">
              <div class="box-body">
                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                  <label for="">Firstname</label>
                  <input type="text" value="<?php if(!empty($user)){ echo $user->firstname; } ?>" class="form-control <?php if(empty($user)){ echo "required"; } ?>" name="firstname" placeholder="Enter Admin First Name">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6">
                  <label for="">Lastname</label>
                  <input type="text" value="<?php if(!empty($user)){ echo $user->lastname; } ?>" class="form-control <?php if(empty($user)){ echo "required"; } ?>" name="lastname" placeholder="Enter Admin Last Name">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6">
                  <label for="">Email</label>
                  <input type="text" autocomplete="off" value="<?php if(!empty($user)){ echo $user->email; } ?>" class="form-control <?php if(empty($user)){ echo "required"; } ?>" name="email" placeholder="Enter Admin Email">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6">
                  <label for="">Password</label>
                  <input type="password" autocomplete="off" class="form-control <?php if(empty($user)){ echo "required"; } ?>" name="password" placeholder="Enter a password">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 access_base">
                  <h5>Access Permissions</h5>
				  <div class="clearfix"></div>
				  <?php if(!empty($user)){ $per_exist= unserialize($user->permission); 
				  }else {$per_exist=array();}  ?>
				  <label>Management</label>          
						<ul class="list-inline management_title">
						 <li>View </li>
						 <li>Add</li>
						 <li> Edit </li>
						 <li>Delete</li>
						</ul>
					<div class="admin_edit">
					<?php $per=explode(',',$this->config->item('permissions')); $i=0; foreach($per as $pr){ ?> 	
					<div class="admin_edit_inner">
						<label><?php echo $pr;?></label>
							<ul class="list-inline management_title management_edit">
							<li>
							<input title="View" <?php if(!empty($per_exist["$pr"])){if(is_array($per_exist["$pr"])){  if(in_array('0',$per_exist["$pr"])){ echo "checked"; }}}?> type="checkbox" value="0"  name="<?php echo $pr;?>[]" />
							</li>
							<li>
							<input title="Add" type="checkbox" value="1" <?php if(!empty($per_exist["$pr"])){ if(is_array($per_exist["$pr"])){ if(in_array('1',$per_exist["$pr"])){ echo "checked"; }}}?> name="<?php echo $pr;?>[]" />
							</li>
							<li>
							<input type="checkbox" title="Edit" value="2"  <?php if(!empty($per_exist["$pr"])){ if(is_array($per_exist["$pr"])){ if(in_array('2',$per_exist["$pr"])){ echo "checked"; }}}?> name="<?php echo $pr;?>[]" />
							</li>
							<li>
							<input type="checkbox" <?php if(!empty($per_exist["$pr"])){ if(is_array($per_exist["$pr"])){ if(in_array('3',$per_exist["$pr"])){ echo "checked"; }}}?> name="<?php echo $pr;?>[]" title="Delete" value="3" />
							</li>
							</ul>
					</div>
							<div class="clearfix"></div>
							<?php $i++;}?>
					</div>
                </div>
				</div>
				<div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
				</form>
			</div>
		</div>
	  </div>
	</section>
</div>
<?php $this->load->view('admin/common/footer.php');?>
