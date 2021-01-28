<?php $this->load->view('site/common/header');	?>
<section>

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-base">

<div class="container nopadd">

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-inner nopadd">

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-nav">

			<ul class="list-inline">

					<li class="active"><a href="#"><span class="step-icon">1</span> Company Information</a></li>

					<li class=""><a href="#"><span class="step-icon">2</span> Industry References</a></li>

					<li class=""><a href="#"><span class="step-icon">3</span> Branch Information</a></li>

					<li class=""><a href="#"><span class="step-icon">4</span> Membership Option</a></li>

			</ul>

	</div>      
   <form method="post" id="edit_member_registeration_form" enctype="multipart/form-data" autocomplete="off">
	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-cotent-base">

			<h2 class="site-head">Company Information</h2>

			<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 upload-container">  

					<div class="photo_inner_li">

							<div class="photo_preview_inner">

											<div class="last_photo_plus">

															<div class="browse_photo" id="add_last_index">

																			<label for="upload_img">

																			<span class="browse_photo_inner"><img src="<?php echo base_url();?>images/site/plus.png" alt="GLSN"></span> <span class="upload-title">Upload Logo</span></label>
																					<input type="file" class="browse_img" name="logo"  id="upload_img" onchange="preview_image(this,'pro_img','upload_img')" >

															</div>

											</div>

							</div>

					</div>

					<div class="upload-container-content">
                                    <?php if($company_info->logo==""){?>
									    <img id="pro_img" src="<?php echo base_url();?>images/site/files/dummy.png" />
									<?php }else { ?>
										<img id="pro_img" src="<?php echo base_url();?>images/site/files/<?php echo $company_info->logo; ?>" />
									<?php } ?>
									<p>(supported formats: GIF, JPG, PNG. Size limit: 200x200px)</p>

					</div>

			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 membership-input-base">

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													<label class="label-control">Company Legal Name<sup>*</sup></label>

													<input type="text" id="edit_legal_name" class="app-input-control" name="name" value="<?php echo $company_info->name;?>">
													<input type="hidden" id="comp_id" class="app-input-control" name="comp_id" value="<?php echo $company_info->id;?>">

											</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

															<label class="label-control">Company Trading Name</label>

															<input type="text" class="app-input-control"  name="trading_name"  value="<?php echo $company_info->trading_name;?>">

													</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													  <label class="label-control">Contact Name<sup>*</sup></label>

													   <input type="text" class="app-input-control" name="contact_name"  value="<?php echo $company_info->contact_name;?>">

											</div>    

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													<label class="label-control">Contact Email<sup>*</sup></label>

													<input type="text" class="app-input-control" autocomplete="off"  name="email"  value="<?php echo $company_info->email;?>">

											</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

															<label class="label-control">Login Password<sup></sup></label>

															<input type="password" autocomplete="false" class="app-input-control"  name="password" id="reg_password">

													</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													  <label class="label-control">Re-Enter Login Password<sup></sup></label>

													   <input type="password" class="app-input-control"  name="confirm_password">

											</div>    

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

											<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common">

													<label class="label-control">Company Head Office Country<sup>*</sup></label>

													<select class="select-control" name="country_id" id="edit_head_office_country">
															<option value="">Country name</option>
															  <?php if($country_list->num_rows()>0){foreach($country_list->result() as $countrylist){?>
															   <option <?php if($countrylist->id==$company_info->country_id){ echo "selected";}?> value="<?php echo $countrylist->id;?>"><?php echo $countrylist->name;?></option>
															  <?php }}?>

													</select>

											</div>

										 

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base location-member-base">

											<label class="label-control">Select Locations to be included in Application (You must have a physical presence in the location(s) selected</label>

											<ul class="list-inline" id="edit_locations_list_html">

											   <?php
												$location_array=explode(",",$company_info->locations);
												if($locations->num_rows()>0){ foreach($locations->result() as $iata){?>
												<li>
												<div class="custom_check not_applicaple_base">

													<label class="control control--checkbox">

														<input type="checkbox" <?php if(in_array($iata->id,$location_array)){echo "checked";}?> name="locations[]" location_name="<?php echo $iata->short_code;?>" value="<?php echo $iata->id;?>" class="select_port">

														 <?php echo $iata->short_code;?> (<?php echo $iata->code;?>)		

														<div class="control__indicator"></div>

													</label>

												</div>

												</li>
												<?php }} ?>

											</ul>
										<label for="locations[]" generated="true" class="error"></label>
										   

							</div>

							<h3 class="sub-head">Upon acceptance, your Membership Fee will be USD <b id="tot_payable_amount"><?php echo $fees->application_fee==0?"1250":$fees->application_fee; ?></b>/annum.</h3>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													<label class="label-control">Address 1<sup>*</sup></label>

													<input type="text" class="app-input-control"  name="address1"  value="<?php echo $company_info->address1;?>">

											</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

															<label class="label-control">Address 2</label>

															<input type="text" class="app-input-control"  name="address2"  value="<?php echo $company_info->address2;?>">

													</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 padd-left">

													  <label class="label-control">City<sup>*</sup></label>

													   <input type="text" class="app-input-control" name="city"    value="<?php echo $company_info->city;?>">

											        </div> 		
													 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 padd-right">

													  <label class="label-control">State</label>

													   <input type="text" class="app-input-control"  name="state"  value="<?php echo $company_info->state;?>">

											        </div> 		
													 

											</div>    

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													<label class="label-control">Zip/Postcode</label>

													<input type="text" class="app-input-control"  name="zip"  value="<?php echo $company_info->zip;?>">

											</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

															<label class="label-control">Tel<sup>*</sup></label>

															<input type="text" class="app-input-control dialingcode_check"  name="mobile"  value="<?php echo $company_info->mobile;?>">

													</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													  <label class="label-control">Fax</label>

													   <input type="text" class="app-input-control dialingcode_check"  name="fax"  value="<?php echo $company_info->fax;?>">

											</div>    

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													<label class="label-control">Corp Email<sup>*</sup></label>

													<input type="text" class="app-input-control"  name="corp_email"  value="<?php echo $company_info->corp_email;?>">

											</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

															<label class="label-control">Corp Webiste<sup>*</sup></label>

															<input type="text" class="app-input-control"  name="corp_website"  value="<?php echo $company_info->corp_website;?>">

													</div>

											<?php 
											 
											  if(strpos($company_info->facebook_link, "facebook.com") !== false){
												$facebook_link=$company_info->facebook_link;
											  }
											  else{
												$facebook_link="https://www.facebook.com/".$company_info->facebook_link;   
											  }
											  
											  
											  if(strpos($company_info->linkedin_link, "linkedin.com") !== false){
												$linkedin_link=$company_info->linkedin_link;
											  }
											  else{
												$linkedin_link="https://www.linkedin.com/in/".$company_info->linkedin_link;   
											  }
													  
												?>
											
											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													  <label class="label-control">LinkedIn Page URL (Corporate)  <span class="testing_link"><a class="linkedin_link" target="new"  href="<?php echo $linkedin_link; ?>">Test</a></span></label>

													  
						                               <input type="text" class="app-input-control" id="linkedin_link" placeholder="https://www.linkedin.com/in/glsn or glsn" name="linkedin_link"  value="<?php echo $company_info->linkedin_link;?>">

											</div>    

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													<label class="label-control">Facebook Page URL (Corporate) <span class="testing_link"><a class="facebook_link" target="new"  href="<?php echo $facebook_link;?>">Test</a></span></label>
													
						                             <input type="text" class="app-input-control"  placeholder="https://www.facebook.com/glsn or glsn "   id="facebook_link"  name="facebook_link"  value="<?php echo $company_info->facebook_link;?>">

											</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

															<label class="label-control">Year Started<sup>*</sup></label>

															<input type="text" class="app-input-control"  name="year_started" value="<?php echo $company_info->year_started;?>">

													</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													  <label class="label-control">Number of Employees<sup>*</sup></label>

													   <input type="text" class="app-input-control"  name="no_of_employees" value="<?php echo $company_info->no_of_employees;?>">

											</div>    

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													<label class="label-control">Licenses</label>

													<input type="text" class="app-input-control"  name="licenses" value="<?php echo $company_info->licenses;?>">

											</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

															<label class="label-control">Forwarding Software System</label>

															<input type="text" class="app-input-control"  name="software" value="<?php echo $company_info->software;?>">

													</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													  <label class="label-control">Tax ID No. (If needed on Invoice) </label>

													   <input type="text" class="app-input-control"  name="tax_id" value="<?php echo $company_info->tax_id;?>">

											</div>    

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

													<label class="label-control">Total Annual Billing Revenue (USD)<sup>*</sup></label>

													<input type="text" class="app-input-control"  name="annual_revenue" value="<?php echo $company_info->annual_revenue;?>">

											</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

															<label class="label-control">How did you hear of GLSN<sup>*</sup></label>

															<select name="hear_about" id="hear_about" class="select-control">
																<option value="">Select one:</option>
																<?php if($hears_list->num_rows()>0){ foreach($hears_list->result() as $hears){?>
																<option <?php if($hears->id==$company_info->hear_about){ echo "selected";}?> value="<?php echo $hears->id;?>"><?php echo $hears->hears_name;?></option><?php }}?> 
																<option value="0" <?php if($company_info->hear_about=="0"){ echo "selected";}?>>Others</option>																<option value="-1" <?php if($company_info->hear_about=="-1"){ echo "selected";}?>>Referred by GLSN Member (Specify)</option>
															 </select>

													</div>

											<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common " style="<?php if($company_info->hear_about=="0"){ echo "display:block;";}?>" id="others_hide">

													  <label class="label-control">Specify If Other</label>

													   <input type="text" class="app-input-control secify_text"  name="others" value="<?php echo $company_info->others;?>">

											</div> 											 <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common" style="<?php if($company_info->hear_about=="-1"){ echo "display:block;";}?>"  id="ref_hide">													  <label class="label-control">Specify GLSN Member</label>													   <input type="text" value="<?php echo $company_info->specify;?>" class="app-input-control secify_text"  name="specify">											</div>	

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

											<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common">

													<label class="label-control">Detailed description/overview of your Company to be displayed on the website entry</label>

												   <textarea class="textarea-control" name="description"><?php echo $company_info->description;?></textarea>

											</div>

											

							</div>
							

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">

									<a href="javascript:void(0);" id="edit_register_signup_btn" class="themebtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon.png"></span>Continue to Industry References</a>

							</div>

			</div>

	</div>
	</form>

</div>

</div>

</div>

</section>
<script>
$(document).on("click","#edit_register_signup_btn",function(){
	$("#edit_member_registeration_form").submit();
})

$(document).ready(function(){
	$("#twitter_link").change(function(){
		var twitter_link=$(this).val();
		/*var twitter_link = twitter_link.replace("https://twitter.com/", "");*/
		if(twitter_link.indexOf("twitter.com")!=-1){
			var twitter_link=twitter_link;
		}
		else{
		var twitter_link="https://twitter.com/"+twitter_link;
			
		}
		$(".twitter_link").attr("href",twitter_link);
	})
	
	$("#facebook_link").change(function(){
		var facebook_link=$(this).val();
		if(facebook_link.indexOf("facebook.com")!=-1){
		var facebook_link=facebook_link;
		
		}
		else{
		var facebook_link="https://www.facebook.com/"+facebook_link;	
		}
		$(".facebook_link").attr("href",facebook_link);
	})
	$("#linkedin_link").change(function(){
		var linkedin_link=$(this).val();
		if(linkedin_link.indexOf("linkedin.com")!=-1){
		var linkedin_link=linkedin_link;
		
		}
		else{
		var linkedin_link="https://www.linkedin.com/in/"+linkedin_link;	
		}
		$(".linkedin_link").attr("href",linkedin_link);
	})
});

$(document).on("click","#hear_about",function(){
	var hearinfo=$(this).val();
	if(hearinfo==0&& hearinfo!=""){		$("#others_hide").show();		$("#ref_hide").hide();	}	else if(hearinfo==-1&& hearinfo!=""){		$("#others_hide").hide();		$("#ref_hide").show();	}	else{		$("#others_hide").hide();		$("#ref_hide").hide();	}
});
$(".captcha_reload_icon").click(function(){
	
	$(".captcha_reload_icon").toggleClass("rotated");
	$("#recaptcha").hide(1000);
	$.post(baseurl+'site/landing/ajax_captcha_application',{},function(data){
		$("#recaptcha").html(data);
		$("#recaptcha").show(1000);
	})
});$(document).ready(function(){	/* setTimeout(function(){ */	var selected_count='<?php echo count($location_array);?>';		var main_amount='<?php echo $fees->application_fee==0?"1250":$fees->application_fee;?>';		var general_branch='<?php echo $fees->branch==0?"250":$fees->branch;?>';			if(selected_count==0){		total_amount=main_amount;	}	else{		var total_amount=parseFloat(main_amount)+(parseFloat(general_branch)*parseFloat(selected_count-1));	}	$("#tot_payable_amount").html(total_amount);	/* },2000); */});
$(document).on("click",".select_port",function(){	var selected_count=$('input.select_port:checked').length;	var main_amount='<?php echo $fees->application_fee==0?"1250":$fees->application_fee;?>';	var general_branch='<?php echo $fees->branch==0?"250":$fees->branch;?>';			if(selected_count==0){		total_amount=main_amount;	}	else{		var total_amount=parseFloat(main_amount)+(parseFloat(general_branch)*parseFloat(selected_count-1));	}	$("#tot_payable_amount").html(total_amount);	});
</script>
<?php $this->load->view('site/common/footer');?>