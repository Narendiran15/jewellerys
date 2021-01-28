<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">
<style>
select {
    width: 100%;
    height: 35px;
}
</style>
<!--breadcrumbs-->
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Category</li>
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
            <form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="listing_type<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/iata/add_edit_insert/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
             <div class="box-body">            
			 <div class="form-group">
                  <label for="">Code</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->code; } ?>" name="code" class="form-control required input_width" title="Please enter code">
             </div>
              <div class="form-group">
                  <label for="">Name</label>
				  <input  type="text" value="<?php if(!empty($service)){ echo $service->short_code; } ?>" name="short_code" class="form-control required input_width " title="Please enter name">
             </div>
              <div class="form-group">
                  <label for="">Country</label>
				  <select required name="country_id" title="Please choose country">
					<option value="">Select country</option>
					<?php foreach($country_list->result() as $country){?>
					<option <?php if(!empty($service)){ if($service->country_id==$country->id){ echo "selected";} } ?> value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
					<?php }?>
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
 
<?php $this->load->view('admin/common/footer.php');?>
