<footer>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 footer-base">

<div class="container nopadd">

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 footer-inner nopadd"> 

	  <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5 footer-section nopadd">

			 

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 newsletter-base ">

											<h5>Subscribe</h5>

											<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 newsletter-inner nopadd">

													<p><?php echo $general_info->subscriber_text;?></p>

															
												<form method="post" id="newsletter_form">	
													<input type="text" placeholder="Enter your email Id :" class="foot-input" id="newsletter_email" name="email" >
													<input type="hidden" name="newslettersession_id" value="<?php echo $newslettersession_id;?>">
													<button id="subscribe_btn"  class="footer-submit">Subscribe Now</button>
													
												</form>	
                                                <label for="newsletter_email" generated="true" class="error"></label>

											</div>

							</div>
							
			  

					

	  </div>

	  <div class="col-md-7 col-sm-7 col-xs-12 col-lg-7 nopadd">

					<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 footer-section">

									<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 sitemap-base">

									<h5>Quick Links</h5>

									<ul class="list-unstyled">

													<li><a href="<?php echo base_url();?>">Home</a></li>

													

													<li><a href="<?php echo base_url("news");?>">Aavin News</a></li>

													<li><a href="<?php echo base_url("contact");?>">Contact Aavin</a></li>

													

											</ul>

									</div>

					  </div>

					  <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 footer-section border-none">

									<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 footlogo-base">

													<h5>Social Links</h5>
													<ul class="list-inline">
															<?php if($this->config->item('facebook_link')!=""){?>
															<li><a target="new"  href="<?php echo $this->config->item('facebook_link')==""?"javascript:void(0)":$this->config->item('facebook_link');?>"><img src="<?php echo base_url();?>images/site/fb.png" alt="Facebook"></a></li>
															<?php } if($this->config->item('twitter_link')!=""){?>
															<li><a target="new"  href="<?php echo $this->config->item('twitter_link')==""?"javascript:void(0)":$this->config->item('twitter_link');?>"><img src="<?php echo base_url();?>images/site/twitter.png" alt="Twitter"></a></li>
                                                            <?php } if($this->config->item('linkedin_link')!=""){?>
															<li><a target="new"  href="<?php echo $this->config->item('linkedin_link')==""?"javascript:void(0)":$this->config->item('linkedin_link');?>"><img src="<?php echo base_url();?>images/site/in.png" alt="LinkedIn"></a></li>
															 <?php } if($this->config->item('instagram_link')!=""){?>
															<li><a target="new" href="<?php echo $this->config->item('instagram_link')==""?"javascript:void(0)":$this->config->item('instagram_link');?>"><img src="<?php echo base_url();?>images/site/insta.png" alt="Instagram"></a></li>
															 <?php }?>	


													</ul>

													<div class="contact-foot nopadd col-md-12 col-sm-12 col-xs-12 col-lg-12">

														<?php if($general_info->phone!=""){ ?>	<p>TELEPHONE  : <span><?php echo ($general_info->phone);?></span> </p>
														<?php }?>
														<?php if($general_info->email!=""){ ?>	<p>EMAIL : <span><a class="ahover_email" href="mailto:<?php echo ($general_info->email);?>" target="_top"><?php echo ($general_info->email);?></a></span> </p><?php }?>

													</div>

									</div>



					  </div>

	  </div>

	 



</div>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 copyright-content-base text-center">

	<p><?php echo $this->config->item('copy_right');?> </p>

</div>

</div>   

</div>

</footer>

		<!--Modal-->
		<div class="modal login-base-modal bs-example-modal-lg modal_base fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-md" role="document">
			 
			<div class="modal-content col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="modal-header col-md-12 col-sm-12 col-lg-12 col-xs-12">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Login</h4>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center login-inner-modal">
							<div class="login-inner">
									<!--<div class="login_image text-left">
											<img src="<?php echo base_url();?>images/site/sign_in.png">
									</div>-->
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in text-left active" id="login">
											<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 login_inputs nopadd">
														  <form action="" method="post" id="login_form" novalidate="novalidate"> 
															<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">
																<label class="label-control">Email</label>
																<input class="app-input-control" name="login_email" type="text">
															</div>
															<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">
																<label class="label-control">Password</label>
																<input class="app-input-control" name="login_password" type="password">
															</div>
															<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 input-base-sction">
															
															</div>
															<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base nopadd">
																<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 add_fields_lft_divide">
																		<div class="custom_check">
																			<label class="control control--checkbox">
																				<input type="checkbox" name="rem" id="remember_student" value="2" class="apply_filter amtype">
																				Remember 
																				<div class="control__indicator"></div>
																			</label>
																		</div>
																</div>
																<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 add_fields_rgt_divide forgot_password">
															<a href="#" data-toggle="modal" data-dismiss="modal" data-target=".bs-example-modal-sm">Forgot Password?</a>
																</div>
																</div>	
															<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 add_fields_input login_btn_base">
																	
																	<button  id="loginbtn_submit" data-text="Login"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Wait Processing..." class="themebtn loginbtn" type="submit"> Login</button>
															</div>
															
															
														  </form>
														</div>
										</div>
										
									</div>
									
							</div>
				</div>
					
			</div>
			</div>
		</div>
		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		  <div class="modal-dialog modal-sm" role="document">
		  
			<div class="modal-content forgot_psw_base col-md-12 col-sm-12 col-lg-12 col-xs-12 nopadd ">
				<form id="forgot-form">
					 <div class="modal-header col-md-12 col-sm-12 col-lg-12 col-xs-12">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><?php echo  $this->lang->line('forgot_password'); ?></h4>
					</div>
					 <div class="modal-body col-md-12 col-sm-12 col-lg-12 col-xs-12">
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 forgot_modal_div">
                                <input type="text" placeholder="email" name="email"  class="app-input-control">
						        <label for="email" generated="true" class="error"></label>
                    </div>
					<div class="col-md-12 col-sm-12 col-xs-12 forgot_modal_div">
							<input type="hidden" name="cid" value="<?php echo $newslettersession_id;?>">	
                             <button  id="forgot_btn" data-text="Submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Wait Processing..." class="themebtn" type="submit"> <?php echo  $this->lang->line('submit'); ?></button>	
                    </div>
					</div>
				</form>	
			</div>
		  </div>
		</div>

	<script type="text/javascript" src="<?php echo base_url();?>js/site/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/site/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/site/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/site/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/site/sweetalert.min.js"></script>
	<script src="<?php echo base_url();?>js/admin/select2.full.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/site/flatpickr.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/site/highlight.pack.js"></script>
	<script src="<?php echo base_url();?>js/site/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/site/jquery.flipster.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/site/application.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/site/site_script.js"></script>
	<script>
	$(document).ready(function(){
			if(popup_error_type!="" &&popup_message!=""){ 
				if(popup_error_type=="Error" || popup_error_type=="錯誤"){
					var pop_type="error";
				}
				else{
					var pop_type="success";
				}
				swal(popup_error_type,popup_message,pop_type);
			}
		});
	</script>	
  </body>
</html>
