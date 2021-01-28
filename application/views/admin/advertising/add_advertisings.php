<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Advertisings</li>
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
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="listing_type<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/advertisings/add_edit_insert/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
             <div class="box-body">            
			 <div class="form-group">
                  <label for="">Company Name</label>
				    <select name="company_id" class="form-control">
						<option value="">Choose company Name</option>
						<?php  if($company_list->num_rows()>0){ foreach($company_list->result() as $ct){?>
						<option <?php if(!empty($service)){ if($service->company_id==$ct->id){ echo "selected";}}?>    value="<?php echo $ct->id;?>"> <?php echo $ct->name;?></option>
						<?php }}?>
					</select>
				  <input type="hidden" name="ret" value="<?php if(isset($_GET['type'])){ echo $_GET["type"];}else { echo "active";}?>" />
             </div>
			 <div class="form-group">
                  <label for="">Link</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->link; } ?>" name="link" class="form-control required input_width" title="Please enter link">
             </div>
			 <div class="form-group field-advertising-status required">
				<label class="control-label" for="advertising-status">Status</label>
				<div id="advertising-status"><label>
				<input type="radio" name="status" value="active" <?php if(!empty($service)){ if($service->status=="active"){ echo "checked";} }?>> Active</label>
				<label><input type="radio" <?php if(!empty($service)){ if($service->status=="hold"){ echo "checked";} }?> name="status" value="hold"> Hold</label>
				<label><input type="radio" <?php if(!empty($service)){ if($service->status=="pending"){ echo "checked";} }?> name="status"  value="pending"> Pending</label>
				<label><input type="radio" <?php if(!empty($service)){ if($service->status=="terminate"){ echo "checked";} }?>  name="status" value="terminate"> Terminate</label>
				</div>

				<div class="help-block"></div>
			</div>
			<div class="form-group">
                  <label for="">Image (250px X 150px)</label>
                  <input  type="file"  name="logo" class="ui-wizard-content"><br/><br/>
					<?php if(!empty($service) && $service->logo!=""){?> 
					<div class="form_input"><img  class="display_user_pro1" src="<?php if(empty($service)){ echo base_url().'images/site/profile/avatar.png';}else{ echo base_url();?>images/site/files/thumb/<?php echo $service->logo;}?>" /></div>
					<?php }?>
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
 
<?php $this->load->view('admin/common/footer.php');?>
