<?php $this->load->view('site/common/header');	?>
<section>
<form method="post" id="membership_option_form" enctype="multipart/form-data">
	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-base">

	<div class="container nopadd">

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-inner nopadd">

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-nav">

	<ul class="list-inline">

	<li><a href="#"><span class="step-icon">1</span> Company Information</a></li>

	<li><a href="#"><span class="step-icon">2</span> Industry References</a></li>

	<li><a href="#"><span class="step-icon">3</span> Branch Information</a></li>

	<li class="active"><a href="#"><span class="step-icon">4</span> Membership Option</a></li>

	</ul>

	</div>      

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-cotent-base">

	<h2 class="site-head">Membership Options</h2>

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-base">

	<h3>Summit Selection</h3>

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-question">

	<h6 class="option-ques">Which upcoming Summit would you prefer to attend</h6>

	<ul class="list-inline membership-options-ul">
  <?php if($get_next_summits->num_rows()>0){ foreach($get_next_summits->result() as $summit){ ?>
	<li>

	<div class="custom_check not_applicaple_base">

	<label class="control control--checkbox">

					 <input type="checkbox" name="summits[]" value="<?php echo $summit->id;?>">

					 <?php echo ucfirst($summit->name);?>					 					 <div><strong><?php echo ucfirst($summit->venue);?>, <?php echo ucfirst($summit->city);?>, <?php echo ucfirst($summit->country);?>.</strong></div>					 <div><strong><?php					 $fromdate=date("F d",strtotime($summit->start_date));										$todate=date("d, Y",strtotime($summit->end_date));										echo $fromdate.' - '.$todate;					 ?></strong></div>					 

					 <div class="control__indicator"></div>

	</label>

	</div>

	</li>  <?php }} ?>
 <input type="hidden"  name="comp_id" value="<?php echo $id;?>">
	<!--<li>

	<div class="custom_check not_applicaple_base">

	<label class="control control--checkbox">

					 <input type="checkbox"  name="october" value="1">
					

					 October

					 <div class="control__indicator"></div>

	</label>

	</div>

	</li>-->

	</ul>	<label for="summits[]" generated="true" class="error"></label>

	</div>



	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-note">

	<p><sup>*</sup> Note that the Summit Fee associated with one of the 2 above Summits is included in your Membership Fee.  If you are unable to attend either of the 2 upcoming Summits, there will be no discounts or refunds applicable.</p>

	</div>      
	<?php 			$featured_member=$fees->featured_member;				$featured_member_discount=$fees->featured_member_discount;				$top_listed_member=$fees->top_listed_member;				$top_listed_member_discount=$fees->top_listed_member_discount;				$featured_discount=$fees->featured_discount;				$top_listed_discount=$fees->top_listed_discount;							$additional_person=$fees->additional_person;				$pay1=$fees->pay1;				$pay2=$fees->pay2;				$pay1_desc=$fees->pay1_desc;				$pay2_desc=$fees->pay2_desc;			?>


	</div>		<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-base">	<h3>Additional Person</h3>	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-question">	<h6 class="option-ques">Additional person for the summits </h6>	<ul class="list-inline radio-list">	<li>					<div class="custom_check not_applicaple_base">									<label class="control control--radio ">													<input type="radio" name="additional_person" checked class="statuscheck alwayscheck" value="1">													<div class="control__indicator"></div>													 <span class="cost-class">Yes (USD <?php echo $additional_person;?>)</span>									</label>					</div>	</li>	<li>					<div class="custom_check not_applicaple_base">									<label class="control control--radio ">													<input type="radio" name="additional_person" class="statuscheck alwayscheck" value="0">													<div class="control__indicator"></div>													 <span class="cost-class">No</span>									</label>					</div>	</li>		</ul>	</div>	</div>

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-base">



	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-question">

	<h3>Membership Promotion</h3>       

	<ul class="list-inline radio-list">

	<li>

					<div class="custom_check not_applicaple_base">

									<h6 class="option-ques">As a Featured Member, your hyperlinked logo will appear on the GLSN homepage</h6>

									<label class="control control--checkbox ">

													<input type="checkbox" name="featured_member" value="1"   class="">

													<div class="control__indicator"></div>

													<span> Featured member 
													<?php if($featured_discount==1){?><del>USD <?php echo $featured_member;?>/year</del>  <?php } else{ echo "USD ".$featured_member;}?>
													</span> 
													<?php if($featured_discount==1){?><span class="cost-class">USD <?php echo $featured_member_discount;?>/year</span><?php } ?>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<h6 class="option-ques">As a Top-Listed Member, your listing will appear at the top of the GLSN Member Directory</h6>

									<label class="control control--checkbox ">

													<input type="checkbox" name="top_listed_member" value="1" class="statuscheck alwayscheck">

													<div class="control__indicator"></div>

													<span>  Top-Listed Member 
													<?php if($top_listed_discount==1){?>
													<del>USD <?php echo $top_listed_member;?>/year</del><?php } else{ echo "USD ".$top_listed_member;}?> 
													</span> 
													<?php if($top_listed_discount==1){?><span class="cost-class">USD <?php echo $top_listed_member_discount;?>/year</span><?php } ?>

									</label>

					</div>

	</li>

	</ul>

	</div>



	</div>

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-base">

	<h3>Payment Protection</h3>

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-question">

	<h6 class="option-ques">Bad Debt Coverage with other GLSN Members:   

	(Note that this does NOT cover operational errors - only non-payment of legitimate debts) </h6>

	<ul class="list-inline radio-list">

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="debts" checked class="statuscheck alwayscheck" value="0">

													<div class="control__indicator"></div>

													 <span class="cost-class">None</span>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="debts" class="statuscheck alwayscheck" value="1">

													<div class="control__indicator"></div>

													 <span class="cost-class">USD <?php echo $pay1_desc;?> for USD <?php echo $pay1;?>/year</span>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="debts" class="statuscheck alwayscheck" value="2">

													<div class="control__indicator"></div>

													<span class="cost-class">USD <?php echo $pay2_desc;?> for USD <?php echo $pay2;?>/year</span>

									</label>

					</div>

	</li>

	</ul>

	</div>



	</div>

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-base">

	<h3>Preferred Vendors</h3>

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-options-question">


   <?php if($questions_list->num_rows()>0){ $i=0; foreach($questions_list->result() as $quest){   ?>
	<ul class="list-inline radio-list">

	<li>

					<div class="custom_check not_applicaple_base">

									<h6 class="option-ques"><?php echo html_entity_decode($quest->description);?></h6>

									<label class="control control--radio ">

													<input type="radio" name="quest_<?php echo $i;?>" checked class="statuscheck alwayscheck" value="1">													<input type="hidden" name="quest_id_<?php echo $i;?>" value="<?php echo $quest->id;?>">

													<div class="control__indicator"></div>

													 <span>Yes - send me information</span>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="quest_<?php echo $i;?>" class="statuscheck alwayscheck" value="0">

													<div class="control__indicator"></div>

													<span>Not at this time</span>

									</label>

					</div>

	</li>

	</ul>   <?php $i++; }} ?>
   <input name="question_count" type="hidden" value="<?php echo $i;?>"/><?php /*
	<ul class="list-inline radio-list">

	<li>

					<div class="custom_check not_applicaple_base">

									<h6 class="option-ques">Are you interested in additional information on the Riege Software System?   </h6>

									<label class="control control--radio ">

													<input type="radio" name="riege_software" checked="checked" class="statuscheck alwayscheck" value="1">

													<div class="control__indicator"></div>

													 <span>Yes - send me information</span>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="riege_software" class="statuscheck alwayscheck" value="0">

													<div class="control__indicator"></div>

													<span>Not at this time</span>

									</label>

					</div>

	</li>

	</ul>

	<ul class="list-inline radio-list">

	<li>

					<div class="custom_check not_applicaple_base">

									<h6 class="option-ques">Are you interested in additional information on WiseTech &amp; their Cargowise Software System?</h6>

									<label class="control control--radio ">

													<input type="radio" name="cargowise_software" checked="checked" class="statuscheck alwayscheck" value="1">

													<div class="control__indicator"></div>

													 <span>Yes - send me information</span>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="cargowise_software" value="0">

													<div class="control__indicator"></div>

													<span>Not at this time</span>

									</label>

					</div>

	</li>

	</ul>

	<ul class="list-inline radio-list">

	<li>

					<div class="custom_check not_applicaple_base">

									<h6 class="option-ques">Are you interested in additional information about NetworkPay? (a multi-currency &amp; non-fee payment/receipt facility)</h6>

									<label class="control control--radio ">

													<input type="radio" name="networkpay" checked="checked" class="statuscheck alwayscheck" value="1">

													<div class="control__indicator"></div>

													 <span>Yes - send me information</span>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="networkpay" value="0" class="statuscheck alwayscheck">

													<div class="control__indicator"></div>

													<span>Not at this time</span>

									</label>

					</div>

	</li>

	</ul>

	<ul class="list-inline radio-list">

	<li>

					<div class="custom_check not_applicaple_base">

									<h6 class="option-ques">Are you interested in additional information about BuyTasker? (a trading platform for your clients combined with a freight RFQ facility)   </h6>

									<label class="control control--radio ">

													<input type="radio" name="buytasker" checked="checked" class="statuscheck alwayscheck" value="1">

													<div class="control__indicator"></div>

													 <span>Yes - send me information</span>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="buytasker"  class="statuscheck alwayscheck" value="0">

													<div class="control__indicator"></div>

													<span>Not at this time</span>

									</label>

					</div>

	</li>

	</ul>

	<ul class="list-inline radio-list">

	<li>

					<div class="custom_check not_applicaple_base">

									<h6 class="option-ques">Are you interested in joining TransferWise? (a multi-currency &amp; non-fee payment/receipt facility)</h6>

									<label class="control control--radio ">

													<input type="radio" name="multi_currency" checked="checked" class="statuscheck alwayscheck" value="1">

													<div class="control__indicator"></div>

													 <span>Yes - send me information</span>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="multi_currency" value="0" class="statuscheck alwayscheck" >

													<div class="control__indicator"></div>

													<span>Not at this time</span>

									</label>

					</div>

	</li>

	</ul>

	<ul class="list-inline radio-list">

	<li>

					<div class="custom_check not_applicaple_base">

									<h6 class="option-ques">Are you a Ships Agency interested in joining Global Ships Agency Network (GSAN)?</h6>

									<label class="control control--radio ">

													<input type="radio" name="gsan" checked="checked" class="statuscheck alwayscheck" value="1">

													<div class="control__indicator"></div>

													 <span>Yes - send me information</span>

									</label>

					</div>

	</li>

	<li>

					<div class="custom_check not_applicaple_base">

									<label class="control control--radio ">

													<input type="radio" name="gsan"  class="statuscheck alwayscheck" value="0">

													<div class="control__indicator"></div>

													<span>Not at this time</span>

									</label>

					</div>

	</li>

	</ul> */ ?>

	</div>



	</div>

	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">

	<a href="<?php echo base_url("member_branchs/".$id);?>" class="backbtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/back-icon.png"></span>Back</a>

	<a href="javascript:void(0);" class="themebtn" id="final_submit_btn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/tick-icon.png"></span>Submit</a>

	</div>

	</div>

	</div>

	</div>

	</div>
    </form>
	</section>
<script>
$(document).ready(function(){
	
	$("#final_submit_btn").click(function(){
		$("#membership_option_form").submit();
	});
	   
            $("#membership_option_form").validate({
                rules: {
                    "summits[]": {
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
                  
					"summits[]": {
                        required: "Please select summits."
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
                    $("#final_submit_btn").html("Processing...");
					$.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/submit_form',
							dataType: "json",
							data: $("#membership_option_form").serialize(),
							success: function(data)
							{  
							
							   if (data['status'] == 1)
								{
								   swal({title: "Success", text: data["message"], type: "success"},
								   function(){ 						   	
										window.location.href=baseurl;
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
<?php $this->load->view('site/common/footer');?>