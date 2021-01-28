<?php $this->load->view('site/common/header');	?>
<section>

<div class="col-lg-12 col-sm-12 col-xs-12 col-lg-12 section-base">


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome-base">

					<div class="container nopadd">

							<div class="col-xs-12 co-lg-12 col-md-12 col-sm-12 welcome-inner">

									<div class="col-xs-12 co-lg-12 col-md-12 col-sm-12 welcome-left">

											<div class="col-xs-12 co-lg-12 col-md-12 col-sm-12 common-header">

													<h1>Welcome to Vellore District Co-operative Milk Producer’s Union Ltd !</h1>
											</div>

											<div class="col-xs-12 co-lg-12 col-md-12 col-sm-12 welcome-content">

															
															<?php //echo html_entity_decode($general_info->home_about_text1);?>
									<h3>Guidelines / Instructions to the Candidates: </h3>

<p><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon-black.png"></span>	Eligible candidates should apply through online mode only. Candidates who have been sponsored by Employment Exchange and Ex-Serviceman candidates sponsored by the Directorate of Ex-serviceman Welfare should also apply through online mode only.</p><p><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon-black.png"></span>
The applicants applying for the post should go through the employment notification and other guidelines carefully and ensure that they fulfill all the eligibility conditions for the post before applying online. Their selection will be purely subject to satisfying of all the eligibility conditions.</p><p><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon-black.png"></span>
If a candidate is eligible for more than one post, he / she should apply for each post separately.</p><p><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon-black.png"></span>
In case of a candidate applying without being eligible to the post, his/ her application will be summarily rejected and his / her fee will be forfeited. No communication will be entertained in this matter.</p><p><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon-black.png"></span>
Incomplete application and applications containing false claims or incorrect particulars relating to category of reservation / education qualification / other basic qualification / age / communal categories, etc. will be liable for rejection.</p><p><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon-black.png"></span>
The claim of the candidate with regard to the date of birth, educational / technical qualifications and community are accepted only on the information furnished by them in their online applications. Their candidature therefore will be provisional and subject to the Management satisfying itself, about their age, educational / technical qualifications, community, etc. The candidature is therefore, provisional at all stages and the Management reserves the right to reject any candidature at any stage, even after the selection has been made.</p><p><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon-black.png"></span>
In case of a candidate not able to produce the original certificates when called for verification, his / her application will be liable for rejection.</p>
</br>
</br>
</br>
</div>

<div class="col-xs-12 co-lg-12 col-md-12 col-sm-12" >
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th scope="col">S.No</th>
		  <th scope="col">Position</th>
		  
		  <th scope="col">Qualification</th>
		  <th scope="col">Description</th>
		  <th scope="col">Last Date</th>
		  <th scope="col">Action</th>
		</tr>
	  </thead>
	  <tbody>
		<?php $i=1; foreach($post as $postss): ?>
			<tr>
			  <th scope="row"><?php echo $i; ?></th>
			  <td ><?php echo $postss->post_name; ?></td>
			
			  <td>
			    <?php $qualification =  (explode(",",$postss->qualification_option)); ?>
			  <?php foreach($qualification as $qualificationss): ?>
				<?php echo ($qualification_name[$qualificationss] != "")?$qualification_name[$qualificationss].", ":""; ?>
			  <?php endforeach; ?>
			  </td>
			  <td width="500"><?php echo $postss->post_description; ?></td>
			   <td class="nowrap"><?php
				$date=date_create($postss->end_date);
				echo date_format($date,"d/m/Y h:i a");
						?></td>
			   <td class="nowrap"><a href="<?php echo base_url()."membership_register/".$postss->id; ?>"  class="btn btn-success">Apply Now !</a></td>
			</tr>
		<?php $i++; endforeach; ?>
	  </tbody>
	</table>
</div>
											<div class="col-xs-12 co-lg-6 col-md-6 col-sm-12 apply-membership-btn left">

															<a href="<?php echo base_url("membership_register/1");?>" class="themebtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon.png"></span>Apply Now</a>

											</div>
											<div class="col-xs-12 co-lg-6 col-md-6 col-sm-12 apply-membership-btn" style="    text-align: right;">

															<a href="<?php echo base_url("view_application");?>" class="themebtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon.png"></span>View Your Submitted Application</a>

											</div>

									</div>       



							</div>

					</div>

		</div>
	



</div>







</section>
		
<script src="<?php echo base_url();?>js/site/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>js/site/landing_script.js"></script>

<?php $this->load->view('site/common/footer');?>