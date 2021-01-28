<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">
<style>
select {
    width: 100%;
    height: 35px;
}
#specific_users_div,#specific_subscriber_div{
	display:none;
}
</style>
<!--breadcrumbs-->
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Newsletter</li>
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
            <form enctype="multipart/form-data" id="listing_type<?php if(!empty($service)){ echo "_edit"; } ?>" class="" action="<?php echo base_url();?>admin/newsletter/send_newsletter_mail/" method="post" novalidate="novalidate">
             <div class="box-body">            
			 
              <div class="form-group">
                  <label for="">Subject</label>
				  <input  type="text" name="subject" class="form-control required input_width" title="Please enter subject">
             </div>
              <div class="form-group">
                  <label for="">Users</label>
				   <select name="user_type" id="user_type" class="ui-formwizard-content">
					  <option value="0">All Users</option>	
					  <option value="1">All Subscribe</option>	
					  <option value="2">Select Specific users</option>	
					  <option value="3">Select Specific subscribers</option>	
					  
				   </select>
             </div>
              <div class="form-group" id="specific_users_div" >
                  <label for="">Specific Users</label>
				   <select name="specific_users[]"  id="specific_users" multiple class="ui-formwizard-content">
					<?php foreach($realusers->result() as $realuser){?>
					     <option value="<?php echo $realuser->email;?>"><?php echo $realuser->email;?></option>	
					  <?php }?>
				   </select>
             </div>
              <div class="form-group" id="specific_subscriber_div" >
                  <label for="">Specific Subscribers</label>
				   <select name="specific_users[]"  id="specific_subscribers" multiple class="ui-formwizard-content">
					 <?php foreach($users->result() as $user){?>
					     <option value="<?php echo $user->email;?>"><?php echo $user->email;?></option>	
					  <?php }?>
				      
				   </select>
             </div>
              <div class="form-group">
                  <label for="">Message</label>
				   <div>
				   <textarea name="detail" style="height:100px;width: 100%;"  class="ui-wizard-content input_width siv des" title="Please enter description"></textarea>
				   </div>
             </div>
              </div>           
                 <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send</button>
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
 <script>
 $(document).ready(function(){
 
   $('#specific_users').select2();
   $("#user_type").change(function(){
	   if($(this).val()==2){
		   $("#specific_subscriber_div").hide();		    
		   $("#specific_users_div").show();
		   $('#specific_users').select2();
	   }
	   else if($(this).val()==3){
		   $("#specific_users_div").hide(); 
		   $("#specific_subscriber_div").show();		    		   
		   $('#specific_subscribers').select2();
	   }
	   else{
		   $("#specific_users_div").hide();
		   $("#specific_subscriber_div").hide();
	   }
   })
 });
 </script>
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>js/admin/tiny.js"></script>
<?php $this->load->view('admin/common/footer.php');?>
