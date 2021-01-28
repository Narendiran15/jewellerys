<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<div class="content-wrapper">
<style>
.select_drop {
    width: 100%;
}
</style>
<!--breadcrumbs-->
<section class="content-header">
			<h1><?php echo $heading;?></h1>
			  <ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		        <li class="active">Summits</li>
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
            
			<form enctype="multipart/form-data" data-user-id="<?php if(!empty($service)){ echo $service->id; } ?>" id="assign_summits" action="<?php echo base_url();?>admin/summits/add_edit_insert/<?php if(!empty($service)){ echo $service->id; } ?>" method="post" novalidate="novalidate">
			<div class="box-body">
                 
				  <div class="form-group">
                  <label for="">Company Name</label>
				   <select class="select_drop required" name="company_id">
					 <option value="">Select Company</option>	
					 <?php if($company_list->num_rows()>0){ foreach($company_list->result() as $comp){?>
					 <option  <?php if(!empty($service)){ if($service->company_id==$comp->id){ echo "selected";}} ?>  value="<?php echo $comp->id;?>"><?php echo ucfirst($comp->name);?></option>	
					 <?php }} ?>
				   </select>
                 </div>
				 <div class="form-group">
                  <label for="">Summits</label>
				   <select  class="select_drop required"  name="summit_id">
					 <option value="">Select Summits</option>	
					 <?php if($summits_list->num_rows()>0){ foreach($summits_list->result() as $summit){?>
					 <option <?php if(!empty($service)){ if($service->summit_id==$summit->id){ echo "selected";}} ?> value="<?php echo $summit->id;?>"><?php echo ucfirst($summit->name);?></option>	
					 <?php }} ?>
				   </select>
                 </div>
				  <input type="hidden" name="id" <?php if(!empty($service)){ ?>value="<?php echo $service->id;?>" <?php }?> />
				
				
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
  <script type="text/javascript" src="<?php echo base_url();?>js/site/flatpickr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/highlight.pack.js"></script>
<script>
$(document).ready(function(){
            $("#assign_summits").validate({
                rules: {
                    company_id: {
					  required: true
					},
					summits_id: {
					  required: true
					}
                      
				   },
                messages: {
                  
					company_id: {
                        required: "Please select company."
                    },
					summits_id: {
                        required: "Please select summits."
                    }				
					}, 
					
   
                 submitHandler: function(form) {
                    
					$.ajax(
						{
							type: "POST",
							url: baseurl+'admin/summits/save_summits',
							dataType: "json",
							data: $("#assign_summits").serialize(),
							success: function(data)
							{  
							
							   if (data['status'] == 1)
								{
								   swal({title: "Success", text: "Successfully summit assigned.", type: "success"},
								   function(){ 						   	
										 window.location.href=baseurl+"admin/summits/view_assign/"+data["conf_id"];
									   }
									);								  
								}
								else if (data['status'] == 2)
								{
								   swal('Oops',data['message'],'error');
								}
								else
								{
								  swal('Oops',data['message'],'error');
								}	
							}
						});
                } 
            });
});
</script>
<?php $this->load->view('admin/common/footer.php');?>
