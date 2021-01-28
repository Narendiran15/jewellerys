<?php $this->load->view('site/common/header');	?>
<section>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 news-base">

<div class="container">

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-referral-base">
							<h3 class="sub-head">Quick Member Referral</h3>
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-referral-inner">
										<h5 class="grey-title">Please also consider recommending/referring your trustued Agents/Partners to join GSAN.
														In order for GSAN to give proper credit to you, the easiest way is to complete the following 
													   Referral Recommendation Notification</h5>
												<form id="referal_form" method="post">
												<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-referral-content">
													   <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
																<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
																		<label class="label-control">Company Name </label>
																</div>
																<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
																		<input type="text" name="prospect_company" class="app-input-control">
																</div>
														</div>
														<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
																				<label class="label-control">Contact Name</label>
																		</div>
																		<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
																				<input type="text" class="app-input-control" name="prospect_contact_name">
																		</div>
														</div>
														<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
																				<label class="label-control">Email</label>
																		</div>
																		<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
																				<input type="text" class="app-input-control" name="prospect_email">
																		</div>
														</div>
														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center submit-application-btn">
																		<button class="submit-btn themebtn">SUBMIT</button>
														</div>
												</div>
												</form>
							</div>

							</div>
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">
                                    <a href="<?php echo base_url("dashboard");?>" class="backbtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/back-icon.png"></span>Back</a>

									

							</div>
</div>
</div>
</section>
<?php $this->load->view('site/common/footer');?>