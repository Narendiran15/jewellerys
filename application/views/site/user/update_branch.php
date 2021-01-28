<form method="post" id="branch_form" enctype="multipart/form-data">
<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-cotent-base">

<h2 class="site-head"><?php echo $office_name;?> Information</h2>



<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 membership-input-base">



<!--<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

		<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

				<label class="label-control">Branch Information<sup>*</sup></label>

				<input type="text" class="app-input-control" name="info" value="<?php echo $branch_info->info;?>">
				

		</div>

		 

</div>-->
<input type="hidden" class="app-input-control" name="branch_id" id="branch_id" value="<?php echo $branch_info->id;?>">				<input type="hidden" class="app-input-control" name="company_id" value="<?php echo $branch_info->company_id;?>">
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

		<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 app_input_common">

				<label class="label-control">Same as your Corporate Information?</label>

				<ul class="list-inline radio-ul">

								<li>

												<div class="custom_check not_applicaple_base">

																<label class="control control--radio ">

																				<input type="radio" id="is_ho_btn" name="is_ho" <?php if($branch_info->is_ho=="1"){ echo "checked";}?> value="1" class="statuscheck alwayscheck">

																				<div class="control__indicator"></div>

																				<span> Yes  </span>

																</label>

												</div>

								</li>

								<li>

												<div class="custom_check not_applicaple_base">

																<label class="control control--radio ">

																				<input type="radio" id="is_ho_btn1" name="is_ho" <?php if($branch_info->is_ho=="0"){
																					echo "checked";
																				}?>  class="statuscheck alwayscheck" value="0">

																				<div class="control__indicator"></div>

																				<span>  No </span>

																</label>

												</div>

								</li>

				</ul>

		</div>

		 

</div>



<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

		<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

				<label class="label-control">Address 1<sup>*</sup></label>

				<input type="text" class="app-input-control address1" name="address1" value="<?php echo $branch_info->address1;?>">

		</div>

		<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

						<label class="label-control">Address 2 </label>

						<input type="text" class="app-input-control address2" name="address2" value="<?php echo $branch_info->address2;?>">

				</div>

		<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

				  <label class="label-control">City<sup>*</sup></label>

				   <input type="text" class="app-input-control city" name="city" value="<?php echo $branch_info->city;?>">

		</div>    

</div>



<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

		<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

				<label class="label-control">State<sup></sup></label>

				<input type="text" class="app-input-control state" name="state" value="<?php echo $branch_info->state;?>">

		</div>

		<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

						<label class="label-control">Zip/Postcode</label>

						<input type="text" class="app-input-control zip" name="zip" value="<?php echo $branch_info->zip;?>">

				</div>

		<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

				  <label class="label-control">Tel<sup>*</sup></label>

				  <input type="text" class="app-input-control phone dialingcode_check" data-code="<?php echo $calling_code;?>" name="phone"  value="<?php echo $branch_info->phone;?>">

		</div>    

</div>





<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

		<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

				<label class="label-control">Fax<sup></sup></label>

				<input type="text" class="app-input-control fax dialingcode_check"  data-code="<?php echo $calling_code;?>"  name="fax"  value="<?php echo $branch_info->fax;?>">

		</div>

		<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

						<label class="label-control">Branch Email <sup>*</sup></label>

						<input type="text" class="app-input-control" name="branch_email" value="<?php echo $branch_info->branch_email;?>">

				</div>

</div>

<h3 class="sub-head">Contact Information</h3>



<div class="co-lg-12 col-md-12 col-sm-12 col-xs-12 contact-info-table">

				<div class="table-responsive">

						<table style="width: 100%;" id="ref_table">

								<thead>

										<tr style="width: 100%;">

												<th style="width: 20%;">Contact Name</th>

												<th style="width: 20%;">Contact Job Title</th>

												<th style="width: 20%;">Email</th>

												<th style="width: 20%;">Skype</th>

												<th style="width: 20%;">Mobile</th>

										</tr>

								</thead>

								<tbody>
										<?php 
										if($branch_info->contact_info==""){
										?>
										<tr class="existingitem">

												<td> <input type="text" class="app-input-control required contact_name" title="Please enter contact name" name="name[]"></td>												<td> <input type="text" class="app-input-control required" title="Please enter job title" name="job_title[]"></td>												<td> <input type="text" class="app-input-control email contact_email required" title="Please enter valid email" name="email[]"></td>												<td> <input type="text" class="app-input-control" name="skype[]"></td>												<td> <input type="text"  data-code="<?php echo $calling_code;?>"  class="app-input-control dialingcode_check" name="mobile[]"></td>

										</tr>

										
										<tr class="ref_clone existingitem">

												<td> <input type="text" class="app-input-control" name="name[]"></td>

												<td> <input type="text" class="app-input-control" name="job_title[]"></td>

												<td> <input type="text" class="app-input-control email" name="email[]"></td>

												<td> <input type="text" class="app-input-control" name="skype[]"></td>

												<td> <input type="text"  data-code="<?php echo $calling_code;?>"  class="app-input-control dialingcode_check" name="mobile[]"></td>

										</tr>

										
										<tr class="existingitem">

												<td> <input type="text" class="app-input-control" name="name[]"></td>

												<td> <input type="text" class="app-input-control" name="job_title[]"></td>

												<td> <input type="text" class="app-input-control email" name="email[]"></td>

												<td> <input type="text" class="app-input-control" name="skype[]"></td>

												<td> <input type="text"  data-code="<?php echo $calling_code;?>"  class="app-input-control dialingcode_check" name="mobile[]"></td>

										</tr>

										
										<tr class="existingitem">

												<td> <input type="text" class="app-input-control" name="name[]"></td>

												<td> <input type="text" class="app-input-control" name="job_title[]"></td>

												<td> <input type="text" class="app-input-control email" name="email[]"></td>

												<td> <input type="text" class="app-input-control" name="skype[]"></td>

												<td> <input type="text"  data-code="<?php echo $calling_code;?>"  class="app-input-control dialingcode_check" name="mobile[]"></td>

										</tr>
										<?php } else{ $i=1;
										$contact_array=json_decode($branch_info->contact_info,true);
										if(!empty($contact_array)){ foreach($contact_array as $contact){
										?>
										<tr class="<?php if($i==2){ echo "ref_clone";}?> existingitem">

												<td> <input type="text" class="app-input-control <?php if($i==1){ echo "contact_name required";}?>" title="Please enter contact name." name="name[]" value="<?php echo $contact["name"];?>"></td>												<td> <input type="text" class="app-input-control <?php if($i==1){ echo "required";}?>" name="job_title[]" title="Please enter job title" value="<?php echo $contact["job_title"];?>"></td>												<td> <input type="text" class="app-input-control email <?php if($i==1){ echo "contact_email required";}?>" title="Please enter valid email" name="email[]" value="<?php echo $contact["email"];?>"></td>												<td> <input type="text" class="app-input-control" name="skype[]" value="<?php echo $contact["skype"];?>"></td>												<td> <input type="text" class="app-input-control dialingcode_check" name="mobile[]"  data-code="<?php echo $calling_code;?>"  value="<?php echo $contact["mobile"];?>"></td>												<?php if($i>4){?>												<td><a href="javascript:void(0)" class="del_ref_class">X</a></td><?php } ?>		
										</tr>
										<?php $i++;}}} ?>

								</tbody>

						</table>
						<!--<label for="email[]" generated="true" class="error" style=""></label>-->
						<a href="javascript:void(0);" id="add_branch_contact_btn" class="add-text">+ add another contact info</a>

				</div>

</div>







<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">

		<a href="javascript:void();" onclick="load_edit_branches()" class="backbtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/back-icon.png"></span>Back</a>

		
<?php if($branch_info->status=="draft"){?>
<a href="javascript:void(0);" class="themebtn" id="send_for_approval_Newbtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon.png"></span>Send For Approval</a>
<?php }?>
<a href="javascript:void(0);" class="themebtn" id="branch_btn_save"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon.png"></span>Save Branch</a>
<input type="hidden" class="input-control" id="office_id_admin_approval" name="office_id" value="<?php echo $branch_info->id;?>">
</div>

</div>

</div>
</form>
<script>


$("#add_branch_contact_btn").click(function(){
 var $refclone=$(".ref_clone").clone();
 $refclone.removeClass("ref_clone");
 $refclone.removeClass("existingitem");
 $refclone.find("input").val('');
 $refclone.closest("tr").append("<td><a href='javascript:void(0)' class='del_ref_class'>X</a></td>"); console.log($refclone);
 $refclone.insertAfter("#ref_table tbody tr:last");
})
$(document).on("click",".del_ref_class",function(){
	$(this).parent().parent().remove();
})
$(document).ready(function(){
	
	$("#send_for_approval_Newbtn").click(function(){
	$("#send_for_approval_Newbtn").html("Processing...");
	$.post(baseurl+"site/landing/send_branch_request_toAdmin",{"office_id":$("#office_id_admin_approval").val()},function(data){
		$("#send_for_approval_Newbtn").html("Send For Approval");
		var data=JSON.parse(data);
		if(data.status==1){
			swal({title: "Success", text: "Request sent to admin successfully.", type: "success"},
								   function(){ 						   	
										 load_edit_branches();	
									   }
									);
		}
		else{
			swal("Error",data["message"],"error")
		}
	})
});
	
	$("#branch_btn_save").click(function(){
		$("#branch_form").submit();
	});
	   
            $("#branch_form").validate({
                rules: {
                    info: {
					  required: true
					},
					address1: {
					  required: true
					},
                    city: {
					  required: true
					},
                   
                    phone: {
					  required: true
					},
                   
                    branch_email: {
					  required: true,
					  email:true
					}
                      
				   },
                messages: {
                  
					info: {
                        required: "Please enter branch information."
                    },
					address1: {
                        required: "Please enter address1."
                    },
					city: {
                        required: "Please enter city."
                    },
					phone: {
                        required: "Please enter telephone."
                    },
					branch_email: {
                        required: "Please enter branch email."
                        
                    }					
					}, 
					
   
                 submitHandler: function(form) {
                    
					$.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/edit_save_branches',
							dataType: "json",
							data: $("#branch_form").serialize(),
							success: function(data)
							{  
							
							   if (data['status'] == 1)
								{
								   swal({title: "Success", text: "Successfully branch saved", type: "success"},
								   function(){ 						   	
										 load_edit_branches();
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
$(document).on("click","#is_ho_btn",function(e){
	var branch_id=$("#branch_id").val();
	//e.preventDefault();
	$.post(baseurl+"site/landing/check_headoffice",{"branch_id":branch_id},function(data){
		var data=JSON.parse(data); 
		if(data['status'] == 2){
			/*swal('Oops',data['message'],'error');*/
			/* $("#is_ho_btn").prop("checked",false);
			$("#is_ho_btn1").prop("checked",true); */			$(".address1").val(data["head_office"]["address1"]);			$(".address2").val(data["head_office"]["address2"]);			$(".city").val(data["head_office"]["city"]);			$(".state").val(data["head_office"]["state"]);			$(".zip").val(data["head_office"]["zip"]);			$(".phone").val(data["head_office"]["phone"]);			$(".fax").val(data["head_office"]["fax"]);			$(".contact_name").val(data["head_office"]["contact_name"]);			$(".contact_email").val(data["head_office"]["email"]);
		}
		else if(data['status']==1){
			$(".address1").val(data["head_office"]["address1"]);			$(".address2").val(data["head_office"]["address2"]);			$(".city").val(data["head_office"]["city"]);			$(".state").val(data["head_office"]["state"]);			$(".zip").val(data["head_office"]["zip"]);			$(".phone").val(data["head_office"]["phone"]);			$(".fax").val(data["head_office"]["fax"]);			$(".contact_name").val(data["head_office"]["contact_name"]);			$(".contact_email").val(data["head_office"]["email"]);
		}
		else{
			swal({title: "Oops", text: data['message'], type: "error"},
								   function(){ 						   	
										 window.location.href=baseurl;
									   }
									);
		}
	})
})
</script>
