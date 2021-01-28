<?php $this->load->view('site/common/header');	?>
<?php
$post_age_limit = '';
if ($post_details->num_rows() > 0) {
	$post_age_limit = "This post age limit for regular " . $post_details->row()->age_limit;
}
?>
<section>

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-base">

		<div class="container nopadd">

			<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-inner nopadd">

				<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-nav">

					<ul class="list-inline">

						<li class="t1 active"><a href="#"><span class="step-icon">1</span> Personal details</a></li>

						<li class="t2"><a href="#"><span class="step-icon">2</span> Communication Details</a></li>

						<li class="t3"><a href="#"><span class="step-icon">3</span> Education Details</a></li>

						<li class="t4"><a href="#"><span class="step-icon">4</span> Confirmation</a></li>

					</ul>

				</div>
				<form method="post" id="member_registeration_form" enctype="multipart/form-data" autocomplete="off">
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-cotent-base">



						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 membership-input-base" id="personal_tab">
							<h4 class="site-head">Personal details</h4>
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

								<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 app_input_common">

									<label class="label-control">Applying for the post of<sup>*</sup></label>

									<select class="select-control" name="post_id" id="post_id">
										<option value="">Select Post</option>
										<?php if ($post_list->num_rows() > 0) {
											foreach ($post_list->result() as $post) { ?>
												<option data-age="<?php echo $post->age_limit; ?>" <?php if ($post_id == $post->id) {
																										echo "selected";
											} ?> value="<?php echo $post->id; ?>"><?php echo $post->post_name; ?></option>
										<?php }
										} ?>

									</select>

								</div>



							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Initial<sup>*</sup></label>

									<input type="text" id="initial" class="app-input-control" name="initial">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Name<sup>*</sup></label>

									<input type="text" class="app-input-control" name="name">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Father's Name<sup>*</sup></label>

									<input type="text" class="app-input-control" name="fname">

								</div>

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Mother's Name</label>

									<input type="text" class="app-input-control" autocomplete="off" name="mname">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Date of Birth<sup>*</sup></label>

									<input type="text" autocomplete="false" class="app-input-control" data-age="0" name="dob" id="dob">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Age</label>

									<input type="text" readonly class="app-input-control" name="age" id="ageBox">
									<!--<div class="mt-2 text-danger" id="age_limit_box"><?php echo $post_age_limit; ?></div>-->
								</div>

							</div>


							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Place of Birth</label>

									<input type="text" class="app-input-control" name="pob">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Marital Status</label>
									<ul class="list-inline">
										<li class="list-inline-item pr-2">
											<div class=" custom_radio mt-0">
												<label class="control control--radio">
													<input type="radio" name="marital_status" value="Married" class="">
													<span class="f-regular f-small f-black">Married</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2">
											<div class=" custom_radio mt-0">
												<label class="control control--radio">
													<input type="radio" checked name="marital_status" value="Unmarried" class="">
													<span class="f-regular f-small f-black">Unmarried</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
									</ul>

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common" id="wife_box">

									<label class="label-control">Spouse Name</label>

									<input type="text" class="app-input-control" name="wife_name">

								</div>

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">



									<label class="label-control">Gender</label>

									<ul class="list-inline">
										<li class="list-inline-item pr-2">
											<div class=" custom_radio mt-0">
												<label class="control control--radio">
													<input type="radio" checked="" name="gender" value="Male" class="">
													<span class="f-regular f-small f-black">Male</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2">
											<div class=" custom_radio mt-0">
												<label class="control control--radio">
													<input type="radio" name="gender" value="Female" class="">
													<span class="f-regular f-small f-black">Female</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2">
											<div class=" custom_radio mt-0">
												<label class="control control--radio">
													<input type="radio" name="gender" value="Transgender" class="">
													<span class="f-regular f-small f-black">Transgender</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
									</ul>




								</div>
								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Mobile No<sup>*</sup></label>

									<input type="text" class="app-input-control" name="mobile" maxlength="10" minlength="10">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Email Address<sup>*</sup></label>

									<input type="text" class="app-input-control " name="email">

								</div>



							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">


								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Alternative Number</label>

									<input type="text" class="app-input-control " name="alternative_number">

								</div>
								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Nationality<sup>*</sup></label>

									<input type="text" class="app-input-control" name="nationality">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Aadhar Number (Format 1234 5678 9012)<sup>*</sup></label>

									<input type="text" class="app-input-control" maxlength="14" name="aadhar_number" id="adarcard">

								</div>



							</div>
							<input type="hidden" id="tab_view" value="1" />
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Current District</label>


									<input type="text" class="app-input-control" name="district_main">

								</div>
								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Mother Tongue </label>

									<input type="text" class="app-input-control" name="mother_tongue">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Native State</label>

									<input type="text" class="app-input-control" name="native_state">

								</div>



							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">
								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Community<sup>*</sup></label>

									<select name="community" class="select-control">
										<option value="">Select Community</option>
										<option value="BC">BC</option>
										<option value="BC Muslim">BC Muslim</option>
										<option value="DNC">DNC</option>
										<option value="MBC">MBC</option>
										<option value="OC">OC</option>
										<option value="SC">SC</option>
										<option value="SC(A)">SC(A)</option>
										<option value="ST">ST</option>

									</select>


								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Sub Caste</label>

									<input type="text" class="app-input-control" name="sub_caste">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Religion </label>

									<input type="text" class="app-input-control" name="religion">

								</div>

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Community Certificate Number</label>

									<input type="text" class="app-input-control" name="community_certificate_number">

								</div>


								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Date Of Issue</label>

									<input type="text" class="app-input-control" name="date_of_issue" id="date_of_issue">

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Issuing Authority</label>

									<input type="text" class="app-input-control" name="issuing_authority">

								</div>


							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Are You Registered in employment office ?</label>

									<ul class="list-inline">
										<li class="list-inline-item pr-2">
											<div class=" custom_radio mt-0">
												<label class="control control--radio">
													<input type="radio" name="employment_office_status" value="Yes" class="">
													<span class="f-regular f-small f-black">Yes</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2">
											<div class=" custom_radio mt-0">
												<label class="control control--radio">
													<input type="radio" checked name="employment_office_status" value="No" class="">
													<span class="f-regular f-small f-black">No</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
									</ul>

								</div>


								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common emp_hide">

									<label class="label-control">Registered Date</label>

									<input type="text" class="app-input-control " name="reg_date" id="reg_date" required>

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common emp_hide">

									<label class="label-control">Registration Number</label>

									<input type="text" class="app-input-control " name="reg_number" id="reg_number" required>

								</div>



							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Priority</label>

									<ul class="list-inline">
										<li class="list-inline-item pr-2">
											<div class=" custom_radio mt-0">
												<label class="control control--radio">
													<input type="radio" name="priorty_status" value="Yes" class="">
													<span class="f-regular f-small f-black">Yes</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2">
											<div class=" custom_radio mt-0">
												<label class="control control--radio">
													<input type="radio" checked name="priorty_status" value="No" class="">
													<span class="f-regular f-small f-black">No</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
									</ul>

								</div>


								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common priority_hide">

									<label class="label-control">Priority Category</label>

									<select name="priority_category" class="select-control app-input-control" required>
										<option value="">Select Priority Category</option>
										<?php if ($priority_list->num_rows() > 0) {
											foreach ($priority_list->result() as $priority) { ?>
												<option data-id="<?php echo $priority->id;?>" data-age="<?php echo $priority->age_limit; ?>" value="<?php echo $priority->priority_name; ?>"><?php echo $priority->priority_name; ?></option>
										<?php }
										} ?>

									</select>

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common priority_hide">

									<label class="label-control">Certificate Number</label>

									<input type="text" class="app-input-control " name="cer_no" required>

								</div>



							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Language Known<sup>*</sup></label>

									<input type="text" class="app-input-control" value="Tamil" readonly name="lang[]">

								</div>


								<div class="col-md-8 col-sm-8 col-xs-12 col-lg-8 app_input_common">


									<ul class="list-inline mt-3">
										<li class="list-inline-item pr-2 mr-3">
											<div class=" custom_check mt-0">
												<label class="control control--checkbox">
													<input type="checkbox" checked name="read[]" value="Read" class="">
													<span class="f-regular f-small f-black">Read</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2 mr-3">
											<div class=" custom_check mt-0">
												<label class="control control--checkbox">
													<input type="checkbox" checked name="write[]" value="Write" class="">
													<span class="f-regular f-small f-black">Write</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2 mr-3">
											<div class=" custom_check mt-0">
												<label class="control control--checkbox ">
													<input type="checkbox" checked name="speak[]" value="Speak" class="">
													<span class="f-regular f-small f-black">Speak</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
									</ul>


								</div>



							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Language Known<sup>*</sup></label>

									<input type="text" class="app-input-control" value="English" readonly name="lang[]">

								</div>


								<div class="col-md-8 col-sm-8 col-xs-12 col-lg-8 app_input_common">


									<ul class="list-inline mt-3">
										<li class="list-inline-item pr-2 mr-3">
											<div class=" custom_check mt-0">
												<label class="control control--checkbox">
													<input type="checkbox" name="read[]" value="Read" class="">
													<span class="f-regular f-small f-black">Read</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2 mr-3">
											<div class=" custom_check mt-0">
												<label class="control control--checkbox">
													<input type="checkbox" name="write[]" value="Write" class="">
													<span class="f-regular f-small f-black">Write</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2 mr-3">
											<div class=" custom_check mt-0">
												<label class="control control--checkbox ">
													<input type="checkbox" name="speak[]" value="Speak" class="">
													<span class="f-regular f-small f-black">Speak</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
									</ul>


								</div>



							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Language Known Other's</label>

									<input type="text" class="app-input-control" name="lang[]">

								</div>


								<div class="col-md-8 col-sm-8 col-xs-12 col-lg-8 app_input_common">


									<ul class="list-inline mt-3">
										<li class="list-inline-item pr-2 mr-3">
											<div class=" custom_check mt-0">
												<label class="control control--checkbox">
													<input type="checkbox" name="read[]" value="Read" class="">
													<span class="f-regular f-small f-black">Read</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2 mr-3">
											<div class=" custom_check mt-0">
												<label class="control control--checkbox">
													<input type="checkbox" name="write[]" value="Write" class="">
													<span class="f-regular f-small f-black">Write</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
										<li class="list-inline-item pr-2 mr-3">
											<div class=" custom_check mt-0">
												<label class="control control--checkbox ">
													<input type="checkbox" name="speak[]" value="Speak" class="">
													<span class="f-regular f-small f-black">Speak</span>
													<div class="control__indicator"></div>
												</label>
											</div>
										</li>
									</ul>


								</div>



							</div>
							<!--<div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12  ">
								 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 padd-left text-center"><label class="label-control">Verification Code :</label></div>
								 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 padd-right">
									<div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd">
									   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 input-container">
										  <div id="recaptcha"><?php echo $captcha; ?></div>
										  <span class="captcha_reload_icon rotated">
											 <a href="javascript:void(0);" style="display:inline-block;" class="captcha_reload_btn">
												<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="40px" y="40px"
												   viewBox="0 0 489.711 489.711" style="enable-background:new 0 0 489.711 489.711;" xml:space="preserve">
												   <g>
													  <g>
														 <path d="M112.156,97.111c72.3-65.4,180.5-66.4,253.8-6.7l-58.1,2.2c-7.5,0.3-13.3,6.5-13,14c0.3,7.3,6.3,13,13.5,13
															c0.2,0,0.3,0,0.5,0l89.2-3.3c7.3-0.3,13-6.2,13-13.5v-1c0-0.2,0-0.3,0-0.5v-0.1l0,0l-3.3-88.2c-0.3-7.5-6.6-13.3-14-13
															c-7.5,0.3-13.3,6.5-13,14l2.1,55.3c-36.3-29.7-81-46.9-128.8-49.3c-59.2-3-116.1,17.3-160,57.1c-60.4,54.7-86,137.9-66.8,217.1
															c1.5,6.2,7,10.3,13.1,10.3c1.1,0,2.1-0.1,3.2-0.4c7.2-1.8,11.7-9.1,9.9-16.3C36.656,218.211,59.056,145.111,112.156,97.111z"/>
														 <path d="M462.456,195.511c-1.8-7.2-9.1-11.7-16.3-9.9c-7.2,1.8-11.7,9.1-9.9,16.3c16.9,69.6-5.6,142.7-58.7,190.7
															c-37.3,33.7-84.1,50.3-130.7,50.3c-44.5,0-88.9-15.1-124.7-44.9l58.8-5.3c7.4-0.7,12.9-7.2,12.2-14.7s-7.2-12.9-14.7-12.2l-88.9,8
															c-7.4,0.7-12.9,7.2-12.2,14.7l8,88.9c0.6,7,6.5,12.3,13.4,12.3c0.4,0,0.8,0,1.2-0.1c7.4-0.7,12.9-7.2,12.2-14.7l-4.8-54.1
															c36.3,29.4,80.8,46.5,128.3,48.9c3.8,0.2,7.6,0.3,11.3,0.3c55.1,0,107.5-20.2,148.7-57.4
															C456.056,357.911,481.656,274.811,462.456,195.511z"/>
													  </g>
												   </g>
												</svg>
											 </a>
										  </span>
									   </div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 nopadd margin-10"><input class="app-input-control" type="text" name="cid"></div>
								 </div>
							  </div>-->



						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 membership-input-base" id="address_tab">

							<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 app_input_base">
								<h4 class="site-head">Permanent Address</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common">

									<label class="label-control">Door number<sup>*</sup></label>

									<input type="text" class="app-input-control d1" name="door_no[]">

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common mt-2">

									<label class="label-control">Street<sup>*</sup></label>

									<textarea type="text" class="app-input-control s1" name="street[]"></textarea>

								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 app_input_common mt-2">

									<label class="label-control">State<sup>*</sup></label>

									<select class="select-control app-input-control st1" name="state[]">
										<option value="">Select State</option>
										<?php if ($state_list->num_rows() > 0) {
											foreach ($state_list->result() as $st) { ?>
												<option value="<?php echo $st->name; ?>"><?php echo $st->name; ?></option>
										<?php }
										} ?>
									</select>

								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 app_input_common mt-2">

									<label class="label-control">District<sup>*</sup></label>

									<input type="text" class="app-input-control dt1" name="district[]">

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common mt-2">

									<label class="label-control">Taluk</label>

									<input type="text" class="app-input-control tal1" name="taluk[]">

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common mt-2">
									<div class=" custom_check mt-2">
										<label class="control control--checkbox">
											<input type="checkbox" id="same_address" name="same_address" value="Read" class="">
											<span class="f-regular f-small f-black">Permanent and Communication address same</span>
											<div class="control__indicator"></div>
										</label>
									</div>
								</div>



							</div>

							<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 app_input_base">
								<h4 class="site-head">Communication Address</h4>

								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common">

									<label class="label-control">Door number<sup>*</sup></label>

									<input type="text" class="app-input-control d2" name="door_no[]">

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common mt-2">

									<label class="label-control">Street<sup>*</sup></label>

									<textarea type="text" class="app-input-control s2" name="street[]"></textarea>

								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 app_input_common mt-2">

									<label class="label-control">State<sup>*</sup></label>

									<select class="select-control app-input-control st2" name="state[]">
										<option value="">Select State</option>
										<?php if ($state_list->num_rows() > 0) {
											foreach ($state_list->result() as $st) { ?>
												<option value="<?php echo $st->name; ?>"><?php echo $st->name; ?></option>
										<?php }
										} ?>
									</select>

								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 app_input_common mt-2">

									<label class="label-control">District<sup>*</sup></label>

									<input type="text" class="app-input-control dt2" name="district[]">

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common mt-2">

									<label class="label-control">Taluk</label>

									<input type="text" class="app-input-control tal2" name="taluk[]">

								</div>



							</div>



						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 membership-input-base" id="qualification_tab">


							<div id="sslc">
								<h4 class="site-head">SSLC Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua sslc" name="qualification_sslc" value="S.S.L.C" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control sslc" name="yop_sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control sslc" name="grade_sslc">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_sslc">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control " name="marksheet_sslc">

									</div>

								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base ">
								<h4 class="site-head">Add More Qualification</h4>
								<ul class="list-inline mt-3">
									<?php 
									
											$qualification_option_array = explode(",", $post_details->row()->qualification_option);

									?>
									 <?php if(in_array("2", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox">
												<input type="checkbox" name="qualification_checkbox" value="p12" class="">
												<span class="f-regular f-small f-black">+2</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									 <?php } ?>
									 <?php if(in_array("3", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox">
												<input type="checkbox" name="qualification_checkbox" value="iti" class="">
												<span class="f-regular f-small f-black">ITI</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<?php } ?>
									 <?php if(in_array("4", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_checkbox" value="diploma" class="">
												<span class="f-regular f-small f-black">Diploma</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<?php } ?>
									 <?php if(in_array("5", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_checkbox" value="ug" class="">
												<span class="f-regular f-small f-black">UG Degree</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<?php } ?>
									 <?php if(in_array("6", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_checkbox" value="pg" class="">
												<span class="f-regular f-small f-black">PG Degree</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<?php } ?>
									 <?php if(in_array("7", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_checkbox" value="typewriting" class="">
												<span class="f-regular f-small f-black">Typewriting</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<?php } ?>
									 <?php if(in_array("8", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_checkbox" value="shorthand" class="">
												<span class="f-regular f-small f-black">Shorthand</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<?php } ?>
									 <?php if(in_array("9", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_checkbox" value="other1" class="">
												<span class="f-regular f-small f-black">Others 1</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<?php } ?>
									 <?php if(in_array("10", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_checkbox" value="other2" class="">
												<span class="f-regular f-small f-black">Others 2</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<?php } ?>
									 <?php if(in_array("11", $qualification_option_array)) { ?>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_checkbox" value="other3" class="">
												<span class="f-regular f-small f-black">Others 3</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<?php } ?>
								</ul>
							</div>

							<div id="other1">
								<h4 class="site-head">Other 1 Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua other1" name="qualification_other1" value="Others 1" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control other1" name="yop_other1">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control other1" name="grade_other1">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_other1">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_other1">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_other1">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control total_marks" name="medium__other1">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_other1">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control other1" name="marksheet_other1">

									</div>

								</div>
							</div>



							<div id="other2">
								<h4 class="site-head">Other 2 Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua other2" readonly name="qualification_other2" value="Other 2" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control other2" name="yop_other2">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control other2" name="grade_other2">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_other2">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_other2">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_other2">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_other2">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_other2>

									</div>

									<div class=" col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control other2" name="marksheet_other2">

									</div>

								</div>
							</div>



							<div id="other3">
								<h4 class="site-head">Other3 Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua other3" name="qualification_other3" readonly value="Other 3" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control other3" name="yop_other3">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control other3" name="grade_other3">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_other3">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_other3">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_other3">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_other3">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_other3">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control other3" name="marksheet_other3">

									</div>

								</div>
							</div>



							<div id="shorthand">
								<h4 class="site-head">Shorthand Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua shorthand" name="qualification_shorthand" readonly value="Shorthand" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control shorthand" name="yop_shorthand">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control shorthand" name="grade_shorthand">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_shorthand">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_shorthand">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_shorthand">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_shorthand">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_shorthand">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control shorthand" name="marksheet_shorthand">

									</div>

								</div>
							</div>



							<div id="typewriting">
								<h4 class="site-head">Typewriting Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua typewrite" name="qualification_typewriting" value="Typewriting" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control typewrite" name="yop_typewriting">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control typewrite" name="grade_typewriting">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_typewriting">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_typewriting">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_typewriting">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_typewriting">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_typewriting">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control typewrite" name="marksheet_typewriting">

									</div>

								</div>
							</div>



							<div id="pg">
								<h4 class="site-head">PG Degree Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua pg" name="qualification_pg" readonly value="PG" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control pg" name="yop_pg">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control pg" name="grade_pg">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_pg">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_pg">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_pg">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_pg">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_pg">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control pg" name="marksheet_pg">

									</div>

								</div>
							</div>



							<div id="ug">
								<h4 class="site-head">UG Degree Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua ug" readonly name="qualification_ug" value="UG" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control ug" name="yop_ug">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control ug" name="grade_ug">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_ug">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_ug">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_ug">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_ug">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_ug">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control ug" name="marksheet_ug">

									</div>

								</div>
							</div>



							<div id="diploma">
								<h4 class="site-head">Diploma Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua diploma" name="qualification_diploma" readonly value="Diploma" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control diploma" name="yop_diploma">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control diploma" name="grade_diploma">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_diploma">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_diploma">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_diploma">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_diploma">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_diploma">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control diploma" name="marksheet_diploma">

									</div>

								</div>
							</div>



							<div id="p12">
								<h4 class="site-head">+2 Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua p12" name="qualification_p12" readonly value="+2" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control p12" name="yop_p12">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control p12" name="grade_p12">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_p12">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_p12">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_p12">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_p12">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_p12">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control p12" name="marksheet_p12">

									</div>

								</div>
							</div>



							<div id="iti">
								<h4 class="site-head">ITI Details</h4>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Education Qualification</label>

										<input type="text" class="app-input-control qua iti" readonly name="qualification_iti" value="ITI" data-type="sslc">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Year of Passing</label>

										<input type="text" class="app-input-control iti" name="yop_iti">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Grade</label>

										<input type="text" class="app-input-control iti" name="grade_iti">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Total Marks</label>

										<input type="text" class="app-input-control total_marks" name="total_marks_iti">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Secured</label>

										<input type="text" class="app-input-control mark_secured" name="mark_secured_iti">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Percentage</label>

										<input type="text" class="app-input-control percentage" name="percentage_iti">

									</div>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Medium of instruction</label>

										<input type="text" class="app-input-control " name="medium_iti">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Name and Address of Institution</label>

										<input type="text" class="app-input-control " name="ins_iti">

									</div>

									<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

										<label class="label-control">Mark Sheet / Reg no.</label>

										<input type="text" class="app-input-control iti" name="marksheet_iti">

									</div>

								</div>
							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">
								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Photo (100kb)</label>

									<div><input type="file" class="" name="photo" id="mem_image"></div>

								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

									<label class="label-control">Signature (50kb)</label>

									<div><input type="file" class="" name="signature" id="mem_signature"></div>

								</div>

							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 membership-input-base" id="preview_tab">

							
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">

							<a href="javascript:void(0);" class="backbtn"><span class="arrow-icon"><img src="<?php echo base_url(); ?>images/site/back-icon.png"></span>Back</a>

							<a href="javascript:void(0);" id="register_signup_btn" class="themebtn"><span class="arrow-icon"><img src="<?php echo base_url(); ?>images/site/arrow-icon.png"></span>Next</a>
							<a href="<?php echo base_url('pay');?>" id="confirm_btn" class="themebtn"><span class="arrow-icon"><img src="<?php echo base_url(); ?>images/site/arrow-icon.png"></span>Submit</a>

						</div>

					</div>
				</form>

			</div>

		</div>

	</div>

</section>
<script>
	$(document).on("click", "#register_signup_btn", function() {
		$("#member_registeration_form").submit();
	})

	$(document).ready(function() {
		$("input[name='employment_office_status']").click(function() {
			if ($(this).val() == "Yes") {
				$(".emp_hide").show().fadeIn(1000);
			} else {
				$(".emp_hide").hide().fadeOut(1000);
			}
		});

		$("input[name='priorty_status']").click(function() {
			if ($(this).val() == "Yes") {
				$(".priority_hide").show().fadeIn(1000);
			} else {
				$(".priority_hide").hide().fadeOut(1000);
			}
		});
		$("input[name='marital_status']").click(function() {
			if ($(this).val() == "Married") {
				$("#wife_box").show().fadeIn(1000);
			} else {
				$("#wife_box").hide().fadeOut(1000);
			}
		});
		$("#same_address").click(function() {
			if ($(this).is(':checked')) {
				$(".d2").val($('.d1').val());
				$(".s2").val($('.s1').val());
				$(".st2").val($('.st1').val());
				$(".dt2").val($('.dt1').val());
				$(".tal2").val($('.tal1').val());
			} else {
				$(".d2").val('');
				$(".s2").val('');
				$(".st2").val('');
				$(".dt2").val('');
				$(".tal2").val('');
			}
		});
		$(".backbtn").click(function() {
			if ($("#tab_view").val() == '4') {
				$("#tab_view").val('3');
				$(".t4").removeClass('active');
				$(".t3").addClass('active');
				$("#preview_tab").hide();
				$("#personal_tab").hide();
				$("#qualification_tab").show();
				$("#address_tab").hide();
				$(".backbtn").show();
				$("#register_signup_btn").show();
				$("#confirm_btn").hide();
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
			} 
			else if ($("#tab_view").val() == '3') {
				$("#tab_view").val('2');
				$(".t3").removeClass('active');
				$(".t2").addClass('active');
				$("#personal_tab").hide();
				$("#preview_tab").hide();
				$("#qualification_tab").hide();
				$("#address_tab").show();
				$(".backbtn").show();
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
			} else if ($("#tab_view").val() == '2') {
				$("#tab_view").val('1');
				$(".t3").removeClass('active');
				$(".t2").removeClass('active');
				$("#personal_tab").show();
				$("#preview_tab").hide();
				$("#qualification_tab").hide();
				$("#address_tab").hide();
				$(".backbtn").hide();
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
			}

		});

		$("input[name='qualification_checkbox']").click(function() {
			if ($(this).is(":checked")) {
				$('#' + $(this).val()).show();
			} else {
				$('#' + $(this).val()).hide();
			}
		});


		$('.mark_secured').change(function() {
			var total = $(this).closest('.app_input_base').find('.total_marks').val();
			var percentage = (parseFloat($(this).val()) / parseFloat(total)) * 100;
			$(this).closest('.app_input_base').find('.percentage').val(percentage.toFixed(2));
			if (parseFloat(percentage) > 100) {
				$(this).closest('.app_input_base').find('.percentage').val('');
				swal("Error", "Percentage Must be below 100", 'error');
			}
		});

		$('.percentage').change(function() {
			if (parseFloat($(this).val()) > 100) {
				$(this).val('');
				swal("Error", "Percentage Must be below 100", 'error');
			}
		});




		$(document).on("change", "#post_id", function() {
			$.get(baseurl + 'site/landing/get_age_limit/' + $(this).val(), function(data) {
				var data = JSON.parse(data);
				$("#age_limit_box").text(data.html);
			});
		});

		if ($("#dob").length == 1) {
			<?php
			$time = strtotime("-18 year", time());
			$date = date("Y-m-d", $time); ?>
			flatpickr("#dob", {
				altInput: true,
				maxDate: "<?php echo $date; ?>",
				altFormat: "j-n-Y",
				onClose: function(selectedDates, dateStr, instance) {
					console.log(dateStr + "" + Date.parse(dateStr));
					var ageDifMs = Date.now() - Date.parse(dateStr);
					var ageDate = new Date(ageDifMs); // miliseconds from epoch
					var res = Math.abs(ageDate.getUTCFullYear() - 1970);
					if(!isNaN(res))
					{
						$("#ageBox").val(res);
						$("#ageBox").attr('data-age', res);
					}
					

				}
			});
		}
		if ($("#date_of_issue").length == 1) {

			flatpickr("#date_of_issue", {
				altInput: true,
				altFormat: "j-n-Y",

			});
		}
		if ($("#reg_date").length == 1) {

			flatpickr("#reg_date", {
				altInput: true,
				altFormat: "j-n-Y",
			});
		}
	});
	$("#post_id").on('change',function(){
var val = $(this).val();
	if(val == "")
	{
		val = 1;
	}
	swal({
  title: "Are you sure ?",
  text: "You will not be able to recover input data! ",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes",
  cancelButtonText: "No",
  closeOnConfirm: false,
  closeOnCancel: true
},
function(isConfirm) {
  if (isConfirm) {
   
		location.href = "<?php echo base_url();?>membership_register/"+val;
  } else {
	  
  $('#post_id option[value=<?php echo $post_id; ?>]').prop('selected', true);
				
  }
});
		
	});

	$(".captcha_reload_icon").click(function() {

		$(".captcha_reload_icon").toggleClass("rotated");
		$("#recaptcha").hide(1000);
		$.post(baseurl + 'site/landing/ajax_captcha_application', {}, function(data) {
			$("#recaptcha").html(data);
			$("#recaptcha").show(1000);
		})
	})
	document.getElementById('adarcard').addEventListener('input', function(e) {
		e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
	});
</script>
<?php $this->load->view('site/common/footer'); ?>