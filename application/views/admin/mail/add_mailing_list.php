<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Mailing List</li>
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
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="listing_type<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/mailing_list/add_edit_insert/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
             <div class="box-body">            
			 <div class="form-group">
                  <label for="">Email</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->email; } ?>" name="email" class="form-control required input_width email" title="Please enter email">
				  <input type="hidden" name="ret" value="<?php if(isset($_GET['type'])){ echo $_GET["type"];}else { echo "public";}?>" />
             </div>
             <div class="form-group">
                  <label for="">Type</label>
				 <div><label><input type="checkbox" name="type[]" value="member" <?php if(!empty($service)){ if($service->member=="1"){ echo "checked";}}?> name="member_type"/> Member</label></div>
				 <div><label><input type="checkbox" name="type[]"  <?php if(!empty($service)){ if($service->public=="1"){ echo "checked";}}?>  value="public" name="member_type"/> Public</label></div>
				 <div><label><input type="checkbox" name="type[]"  <?php if(!empty($service)){ if($service->reference=="1"){ echo "checked";}}?>  value="reference" name="member_type"/> Reference</label></div>
				 <div><label><input type="checkbox" name="type[]"  <?php if(!empty($service)){ if($service->port_estimates=="1"){ echo "checked";}}?>  value="port_estimates" name="member_type"/> Port Estimates</label></div>				
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
