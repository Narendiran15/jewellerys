<?php $this->load->view('site/common/header');	?>

<section>

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-base change-password-base">

<div class="container nopadd">
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 change-code-base chnge-pass nopadd">
									<h3 class="sub-head">Change Email & Password</h3>
							 <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 change-code-inner text-center nopadd">     
											<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center nopadd">
															<form id="change_username_form" enctype="multipart/form-data" method="post"><div class=" input-container col-md-6 col-sm-6 col-xs-12 col-lg-6 text-left">
																	<label class="label-control">Change Email</label>
																	<input type="text" class="app-input-control" name="email">
																			<button class="themebtn">Submit</button>
															</div>
															</form>
															<form id="change_password_form" enctype="multipart/form-data" method="post">
															<div class="input-container col-md-6 col-sm-6 col-xs-12 col-lg-6 text-left ">
																			<label class="label-control">Change Password</label>
																			<input type="password" placeholder="Old Password" class="app-input-control" name="old_password">
																			
																			<input type="password" placeholder="New password" class="app-input-control" name="new_password">
																			<button class="themebtn">Submit</button>

															</div>
															</form>
											</div>
							</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 change-code-base margin-small chnge-pass">
								<h2 class="site-head">User Accounts</h2>

					<p class="plain-content">Here create your users login accounts. </p>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 create-contact-form nopadd">
                                        <h2 class="sub-head">Create User</h2>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 nopadd create-contact-inner" id="create_user_box">
                                                 <form method="post" id="user_account_create_form" enctype="multipart/form-data" autocomplete="off">
												<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12   cloning_div nopadd">
                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common padd-left">
                                                                <label class="label-control">Email<sup>*</sup></label>
                                                                <input type="text" id="create_email" name="email"  class="app-input-control required email emailexist_checker" placeholder="Please enter valid email" >
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">
                                                                        <label class="label-control">Password <sup>*</sup></label>
                                                                        <input name="password" id="create_password" type="text" class="app-input-control">
                                                                </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common margin-small text-left">
                                                                <button type="button" id="save_user_account_btn" class="themebtn ">Save</button>
                                                        </div>    
                                                </div>
												</form>  
												<form method="post" id="user_account_create_form_edit" enctype="multipart/form-data" autocomplete="off">
												<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12  margin-small cloning_div">
                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">
                                                                <label class="label-control">Email<sup>*</sup></label>
                                                                <input type="text" id="edit_email" name="email"  class="app-input-control required email emailexist_checker" placeholder="Please enter valid email" >
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">
                                                                        <label class="label-control">Password <sup></sup></label>
                                                                        <input name="password" id="edit_password" type="text" class="app-input-control">
                                                                </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common margin-small text-left">
														<input type="hidden" id="user_edit_id" name="user_edit_id"/>
                                                                <button type="button" id="update_user_account_btn" class="themebtn cust-margin">Update</button>
                                                        </div>    
                                                </div>
												</form>
                                        </div>
										
                                        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-10 create-contact-inner margin-small nopadd" id="create_user_box">
										<h2 class="sub-head text-left">Created Users List</h2>
                                               <table class="table user-create-table">
											     <tr><td>Email</td><td>Action</td></tr>
											     <tbody id="tbody_user_created">
													<?php if($users_list->num_rows()>0){ foreach($users_list->result() as $user){?>

													 <tr><td><?php echo $user->email; ?></td><td><a href="javascript:void(0);" class="btn btn-success editaccount_btn" data-id="<?php echo $user->id;?>"  data-email="<?php echo $user->email;?>">Edit</a><a href="javascript:void(0);" class="btn btn-danger deleteaccount_btn"  data-id="<?php echo $user->id;?>" data-email="<?php echo $user->email;?>">Delete</a> </td></tr>
													<?php }} else{ ?>

													 <tr><td colspan="2">No Users found...</td></tr>

													 <?php } ?>
												 </tbody>	 
											   </table>
                                        </div>
                                       
                   </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">
                                    <a href="<?php echo base_url("dashboard");?>" class="backbtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/back-icon.png"></span>Back</a>

									

							</div>
</div>
</div>
</section>
<script>
$(document).ready(function(){
	
	   
            $("#change_username_form").validate({
                rules: {
                    email: {
					  required: true
					}
                      
				   },
                messages: {
                  
					email: {
                        required: "Please enter email."
                    }
					
					}, 
					
   
                 submitHandler: function(form) {
                    
					$.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/change_username_form',
							dataType: "json",
							data: $("#change_username_form").serialize(),
							success: function(data)
							{  
							
							   if (data['status'] == 1)
								{
								   swal({title: "Success", text: "Successfully email changed", type: "success"},
								   function(){ 						   	
										 $("input[name=email]").val("");
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
	
$(document).ready(function(){
	
	   
            $("#change_password_form").validate({
                rules: {
                    old_password: {
					  required: true
					},
					new_password: {
					  required: true
					}
                      
				   },
                messages: {
                  
					old_password: {
                        required: "Please enter old password."
                    },
					new_password: {
                        required: "Please enter new password."
                    },
					
					}, 
					
   
                 submitHandler: function(form) {
                    
					$.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/change_password_form',
							dataType: "json",
							data: $("#change_password_form").serialize(),
							success: function(data)
							{  
							
							   if (data['status'] == 1)
								{
								   swal({title: "Success", text: "Successfully password changed", type: "success"},
								   function(){ 						   	
										 $("input[name=old_password]").val("");
										 $("input[name=new_password]").val("");
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

$(document).on("click","#save_user_account_btn",function(){

	$("#user_account_create_form").submit();

})
$(document).on("click","#update_user_account_btn",function(){

	$("#user_account_create_form_edit").submit();

})

$(document).on("click",".editaccount_btn",function(){

	var userid=$(this).attr("data-id");
	var email=$(this).attr("data-email");
	$("#user_edit_id").val(userid);
	$("#edit_email").val(email);
	$("#user_account_create_form").hide();
	$("#user_account_create_form_edit").show();
	

})


$(document).on("click",".deleteaccount_btn",function(){

	
	var userid=$(this).attr("data-id");
	var email=$(this).attr("data-email");
	var thisvar=$(this);
	$.post(baseurl+"site/landing/delete_user_account",{"user_id":userid},function(data){
		var data=JSON.parse(data);
		
		if(data['status']==1){
			thisvar.closest("tr").remove();;
			swal("Success","Successfully user deleted..","success");
		}
		else{
			swal("Error","Something went to wrong...","error");
		}
	})

})


</script>
<?php $this->load->view('site/common/footer');?>