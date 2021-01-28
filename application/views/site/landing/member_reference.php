<?php $this->load->view('site/common/header');	?>
<?php
$ref_array=array();
$ref1_name='';
$ref1_title='';
$ref1_email='';
$ref2_name='';
$ref2_title='';
$ref2_email='';
$ref3_name='';
$ref3_title='';
$ref3_email='';
$ref4_name='';
$ref4_title='';
$ref4_email='';
$ref5_name='';
$ref5_title='';
$ref5_email='';
if($company_info->reference_info!=""){
    $ref_array=json_decode($company_info->reference_info,true);
	$ref1_name=$ref_array["ref1"]["company_name"];
	$ref1_title=$ref_array["ref1"]["company_title"];
	$ref1_email=$ref_array["ref1"]["email"];
	$ref2_name=$ref_array["ref2"]["company_name"];
	$ref2_title=$ref_array["ref2"]["company_title"];
	$ref2_email=$ref_array["ref2"]["email"];
	$ref3_name=$ref_array["ref3"]["company_name"];
	$ref3_title=$ref_array["ref3"]["company_title"];
	$ref3_email=$ref_array["ref3"]["email"];
	$ref4_name=$ref_array["ref4"]["company_name"];
	$ref4_title=$ref_array["ref4"]["company_title"];
	$ref4_email=$ref_array["ref4"]["email"];
	$ref5_name=$ref_array["ref5"]["company_name"];
	$ref5_title=$ref_array["ref5"]["company_title"];
	$ref5_email=$ref_array["ref5"]["email"];
}

?>
<section>

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-base">

<div class="container nopadd">

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-inner nopadd">

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-nav">

		<ul class="list-inline">

				<li><a href="#"><span class="step-icon">1</span> Company Information</a></li>

				<li class="active"><a href="#"><span class="step-icon">2</span> Industry References</a></li>

				<li class=""><a href="#"><span class="step-icon">3</span> Branch Information</a></li>

				<li class=""><a href="#"><span class="step-icon">4</span> Membership Option</a></li>

		</ul>

</div>      

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-cotent-base">

		<h2 class="site-head">Industry References</h2>

		<p class="plain-content">GLSN requires 5 references from freight forwarders that you currently work with and that are located outside of your country. 

						References from shippers, airlines and steamship lines cannot be accepted. </p>

		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 membership-input-base">
                       <form method="post" id="reference_form" enctype="multipart/form-data" autocomplete="off">
						<h3 class="sub-head">Reference #1</h3>

						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												<label class="label-control">Company Name<sup>*</sup></label>

												<input type="text" class="app-input-control" name="ref1[company_name]" value="<?php echo $ref1_name;?>">

										</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

														<label class="label-control">Contact Name, Title<sup>*</sup></label>

														<input type="text" class="app-input-control"  name="ref1[company_title]" value="<?php echo $ref1_title;?>">

												</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												  <label class="label-control">Email Address<sup>*</sup></label>

												   <input type="text" class="app-input-control"  name="ref1[email]"  value="<?php echo $ref1_email;?>">

										</div>    

						</div>

						<h3 class="sub-head">Reference #2</h3>

						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												<label class="label-control">Company Name<sup>*</sup></label>

												<input type="text" class="app-input-control" name="ref2[company_name]" value="<?php echo $ref2_name;?>">

										</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

														<label class="label-control">Contact Name, Title<sup>*</sup></label>

														<input type="text" class="app-input-control"  name="ref2[company_title]"  value="<?php echo $ref2_title;?>">

												</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												  <label class="label-control">Email Address<sup>*</sup></label>

												   <input type="text" class="app-input-control" name="ref2[email]"  value="<?php echo $ref2_email;?>">

										</div>    

						</div>

						<h3 class="sub-head">Reference #3</h3>

						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												<label class="label-control">Company Name<sup>*</sup></label>

												<input type="text" class="app-input-control" name="ref3[company_name]" value="<?php echo $ref3_name;?>">

										</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

														<label class="label-control">Contact Name, Title<sup>*</sup></label>

														<input type="text" class="app-input-control"  name="ref3[company_title]" value="<?php echo $ref3_title;?>">

												</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												  <label class="label-control">Email Address<sup>*</sup></label>

												   <input type="text" class="app-input-control" name="ref3[email]"  value="<?php echo $ref3_email;?>">

										</div>    

						</div>

						

						<h3 class="sub-head">Reference #4</h3>

						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												<label class="label-control">Company Name<sup>*</sup></label>

												<input type="text" class="app-input-control" name="ref4[company_name]" value="<?php echo $ref4_name;?>">

										</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

														<label class="label-control">Contact Name, Title<sup>*</sup></label>

														<input type="text" class="app-input-control"  name="ref4[company_title]" value="<?php echo $ref4_title;?>">

												</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												  <label class="label-control">Email Address<sup>*</sup></label>

												   <input type="text" class="app-input-control" name="ref4[email]"  value="<?php echo $ref4_email;?>">

										</div>    

						</div>

						<h3 class="sub-head">Reference #5</h3>

						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												<label class="label-control">Company Name<sup>*</sup></label>

												<input type="text" class="app-input-control" name="ref5[company_name]" value="<?php echo $ref5_name;?>">

										</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

														<label class="label-control">Contact Name, Title<sup>*</sup></label>

														<input type="text" class="app-input-control" name="ref5[company_title]" value="<?php echo $ref5_title;?>">

												</div>

										<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

												  <label class="label-control">Email Address<sup>*</sup></label>

												   <input type="text" class="app-input-control" name="ref5[email]"  value="<?php echo $ref5_email;?>">

										</div>    

						</div>
 </form>                    <?php /*<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 change-code-base margin-small chnge-pass">								<h2 class="site-head">User Accounts</h2>					<p class="plain-content">Here create your users login accounts. </p>                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 create-contact-form nopadd">                                        <h2 class="sub-head">Create User</h2>                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 nopadd create-contact-inner" id="create_user_box">                                                 <form method="post" id="user_account_create_form" enctype="multipart/form-data" autocomplete="off">												<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12   cloning_div nopadd">                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common padd-left">                                                                <label class="label-control">Email<sup>*</sup></label>                                                                <input type="text" id="create_email" name="email"  class="app-input-control required email emailexist_checker" placeholder="Please enter valid email" >                                                        </div>                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">                                                                        <label class="label-control">Password <sup>*</sup></label>                                                                        <input name="password" id="create_password" type="text" class="app-input-control">                                                                </div>                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common margin-small text-left">                                                                <button type="button" id="save_user_account_btn" class="themebtn ">Save</button>                                                        </div>                                                    </div>												</form>  												<form method="post" id="user_account_create_form_edit" enctype="multipart/form-data" autocomplete="off">												<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12  margin-small cloning_div">                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">                                                                <label class="label-control">Email<sup>*</sup></label>                                                                <input type="text" id="edit_email" name="email"  class="app-input-control required email emailexist_checker" placeholder="Please enter valid email" >                                                        </div>                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">                                                                        <label class="label-control">Password <sup></sup></label>                                                                        <input name="password" id="edit_password" type="text" class="app-input-control">                                                                </div>                                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common margin-small text-left">														<input type="hidden" id="user_edit_id" name="user_edit_id"/>                                                                <button type="button" id="update_user_account_btn" class="themebtn cust-margin">Update</button>                                                        </div>                                                    </div>												</form>                                        </div>										                                        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-10 create-contact-inner margin-small nopadd" id="create_user_box">										<h2 class="sub-head text-left">Created Users List</h2>                                               <table class="table user-create-table">											     <tr><td>Email</td><td>Action</td></tr>											     <tbody id="tbody_user_created">													<?php if($users_list->num_rows()>0){ foreach($users_list->result() as $user){?>													 <tr><td><?php echo $user->email; ?></td><td><a href="javascript:void(0);" class="btn btn-success editaccount_btn" data-id="<?php echo $user->id;?>"  data-email="<?php echo $user->email;?>">Edit</a><a href="javascript:void(0);" class="btn btn-danger deleteaccount_btn"  data-id="<?php echo $user->id;?>" data-email="<?php echo $user->email;?>">Delete</a> </td></tr>													<?php }} else{ ?>													 <tr><td colspan="2">No Users found...</td></tr>													 <?php } ?>												 </tbody>	 											   </table>                                        </div>                                                          </div></div> */ ?>
						

					   

					  

					  

					  

						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">

										<a href="<?php echo base_url("edit_membership_register/".$id);?>" class="backbtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/back-icon.png"></span>Back</a>

								<a href="javascript:void(0);" class="themebtn" id="branchinfo_btn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon.png"></span>Continue to Branch Information</a>

						</div>

		</div>

</div>


</div>

</div>

</div>

</section>
<script>
$(document).on("click","#branchinfo_btn",function(){
	$("#reference_form").submit();
});
$(document).on("click","#save_user_account_btn",function(){
	$("#user_account_create_form").submit();
});
$(document).on("click","#update_user_account_btn",function(){
	$("#user_account_create_form_edit").submit();
});
$(document).on("click",".editaccount_btn",function(){
	var userid=$(this).attr("data-id");	var email=$(this).attr("data-email");	$("#user_edit_id").val(userid);	$("#edit_email").val(email);	$("#user_account_create_form").hide();	$("#user_account_create_form_edit").show();	
});$(document).on("click",".deleteaccount_btn",function(){		var userid=$(this).attr("data-id");	var email=$(this).attr("data-email");	var thisvar=$(this);	$.post(baseurl+"site/landing/delete_user_account",{"user_id":userid},function(data){		var data=JSON.parse(data);				if(data['status']==1){			thisvar.closest("tr").remove();;			swal("Success","Successfully user deleted..","success");		}		else{			swal("Error","Something went to wrong...","error");		}	})});
</script>
<?php $this->load->view('site/common/footer');?>