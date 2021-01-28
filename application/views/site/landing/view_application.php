<?php $this->load->view('site/common/header');	?>
<section>
<div class="container">
	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-base" >
			<div class="row justify-content-md-center">
								<div class="col-lg-offset-4 col-md-offset-4 col-sm-4 col-xs-4 col-lg-4 common-header text-center">
									<h3>Please enter your Mobile No, Email Id and Aadhaar No to view your submitted application</h3>
								</div>
							<form name="find_application" id="find_application" action="#">
								<div class="col-lg-offset-4 col-md-offset-4 col-sm-4 col-xs-4 col-lg-4 app_input_common p-1">

									<label class="label-control">Mobile No<sup>*</sup></label>

										<input type="text" class="app-input-control" name="mobile" id="mobile" maxlength="10" minlength="10">

								</div>
								<div class="col-lg-offset-4 col-md-offset-4 col-sm-4 col-xs-4 col-lg-4 app_input_common p-1">

										<label class="label-control">Eamil Id<sup>*</sup></label>

									<input type="text" class="app-input-control " name="email" id="email">


								</div>
								<div class="col-lg-offset-4 col-md-offset-4 col-sm-4 col-xs-4 col-lg-4 app_input_common p-1">

									<label class="label-control">Aadhaar Number<sup>*</sup></label>
									<input type="text" class="app-input-control" maxlength="14" name="aadhar_number" id="adarcard">

								</div>
								<div class="col-lg-offset-4 col-md-offset-4 col-sm-4 col-xs-4 col-lg-4 app_input_common p-1 text-center">

									<button type="submit" class="themebtn" id="find_application_bt">Submit</button>

								</div>
							</form>
		 </div>
	</div>
	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-base" id="preview_application">
	
	</div>
	<form id="new_form" name="new_form" method="post" action="<?php echo base_url();?>get_application_form" target="_new">
		<input name="new_id" id="new_id" type="hidden" />
		<input name="new_mobile" id="new_mobile" type="hidden" />
		<input name="new_email" id="new_email" type="hidden" />
		<input name="new_aadhar_number" id="new_aadhar_number" type="hidden"/>
	</form>
</div>

</section>
<?php $this->load->view('site/common/footer'); ?>