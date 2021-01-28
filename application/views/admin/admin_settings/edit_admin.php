<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); #error_reporting(0); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
	<section class="content-header">
			<h1><?php echo $heading;?></h1>
			  <ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
				<li class="active">Admin</li>
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
           
			<form enctype="multipart/form-data" data-user-id="<?php if(!empty($user)){ echo $user->id; } ?>" id="subregister_form<?php if(!empty($user)){ echo "_edit"; } ?>" action="<?php echo base_url();?>admin/admin_settings/update_password/<?php if(!empty($user)){ echo $user->id; } ?>" method="post" novalidate="novalidate">
              <div class="box-body">
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" autocomplete="off" value="<?php if(!empty($user)){ echo $user->email; } ?>" class="form-control" name="email" id="email_id" placeholder="Enter Admin Email">
                </div>
				 <div class="control-group">
                  <label >Old Password</label>
                  <div class="controls">
                    <input  type="password" autocomplete="off" name="old_password" id="old_password" class="form-control <?php if(empty($user)){ echo "required"; } ?>">
                  </div>
                </div>
                 <div class="control-group">
                  <label >New Password</label>
                  <div class="controls">
                    <input  type="password" autocomplete="off" name="password" id="npassword" class="form-control <?php if(empty($user)){ echo "required"; } ?>">
                  </div>
                </div>
                <div class="control-group">
                  <label >Confirm Password</label>
                  <div class="controls">
                    <input  type="password" autocomplete="off" name="cpassword" id="cpassword" class="form-control <?php if(empty($user)){ echo "required"; } ?>">
                  </div>
                </div>
				</div>
				<div class="box-footer">
                <a class="btn btn-primary ui-wizard-content ui-formwizard-button" onclick="submit_form()" >Save</a>
              </div>
				</form>
			</div>
		</div>
	  </div>
	</section>
</div>
  <link href="<?php echo base_url();?>css/site/sweetalert.css" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url();?>js/admin/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/site/sweetalert.min.js"></script>
<script>
    function submit_form()
	{   
		var old_password=$("#old_password").val();
		var email_id=$("#email_id").val();
		var npassword=$("#npassword").val();
		var cpassword=$("#cpassword").val();
		if(npassword!=""){ 
			if(old_password=="")
			{
				swal("Oops","Please enter old password...","error");
				return false;
			}
			else if(npassword!=cpassword)
			{
				swal("Oops","Confirm password is wrong...","error");
				return false;
			}
			else
			{
				$.post("<?php echo base_url()?>admin/admin_settings/check_old_password_admin",{"password":old_password,"email":email_id},function(data){
					if(data=="0"){
						swal("Oops","Old password is wrong...","error");
				        return false;
					}
					else
					{
						$("#subregister_form_edit").submit();
					}						
				})
			}
		}
		else
		{
			$("#subregister_form_edit").submit();
		}
        
	}		
	$(document).ready(function() {
    $.validator.addMethod("nameRegex", function(value, element) {
        return this.optional(element) || /^[a-z\- . ]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");
    $.validator.addMethod("number", function(value, element) {
        return this.optional(element) || /^[0-9\-( ) + ]+$/i.test(value);
    }, "For Eg:1234567890, this field allows numbers,+,hyphen,(),single space only.");
    $("#subregister_form_edit").validate();
});
</script>
<?php $this->load->view('admin/common/footer');?>
