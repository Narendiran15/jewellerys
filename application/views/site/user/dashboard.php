<?php $this->load->view('site/common/header');	?>
<section>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-base">

<div class="container">

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-inner">

<h1>Dashboard</h1>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-details">

	<h2><?php echo ucfirst($company->name); ?></h2>

	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-details-inner">

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 dashboard-details-lft">

					<p><span>Member</span> <b class="green-text"><?php echo $company->membership_status;?></b> </p>

					<p><span>Member Options</span> <b><?php if($company->featured_member==1){ echo "Featured Member"; } ?></b> </p>

					<p><span>Member Since</span> <b><?php echo date("Y-M-d",strtotime($company->created_at));?></b></p>

					<p><span>Renewal Date</span> <b><?php if($company->actived_date!=""){ $time= strtotime($company->actived_date);if($company->actived_date!="0000-00-00"){ echo date("Y-M-d",strtotime('+ 1 year',$time)); }else{ echo "-";} } else{ echo "-";} ?></b></p>
			</div> 

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 dashboard-details-rgt text-right">
					<?php 
					if($company->logo!=""){					
					?>
					<img src="<?php echo base_url();?>images/site/files/thumb/<?php echo $company->logo;?>" alt="GSLN Dashboard Logo">
					<?php }?>
			</div> 

	</div>

</div>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-update-base">

	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-update-inner">

					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-update-details">

							<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 nopadd">

									<p>Update Member Profile</p>

									<a href="<?php echo base_url("edit_profile");?>" class="themebtn">Update Now</a>

							</div>

                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 nopadd">

									<p>Update Branch</p>

									<a href="<?php echo base_url("edit_members");?>" class="themebtn">Update Now</a>

							</div>

					</div>   

					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-update-details">

									<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 nopadd">

											<p>Users list & Change Password</p>

											<a href="<?php echo base_url("change_password");?>" class="themebtn">Update Now</a>

									</div>

									<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 nopadd">

													<p>Download GLSN Logo</p>

													<a href="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item("site_logo");?>" download class="themebtn">Download</a>

									</div>

					</div> 

					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-update-details">

									<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 nopadd">

											<p>Spreadsheet of GLSN Member</p>

											<a href="<?php echo base_url("export_company");?>" download class="themebtn">Download Now</a>

									</div>

									<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 nopadd">

													<p>Submit News - View/Edit Submitted News</p>

													<a href="<?php echo base_url("members_news_list");?>" class="themebtn">Submit News</a>

									</div>

					</div>   

					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 dashboard-update-details">

									<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd">

											<p>Refer a Member</p>

											<h6>GLSN offers a FREE Featured Member or a Top-Listed Option for each 3 referrals that join GLSN</h6>

											<a href="<?php echo base_url("referrals");?>" class="themebtn">Refer Now</a>

									</div>

								   

					</div>         

	</div>

</div>

</div>

</div>

</div> 



</section>	
<?php $this->load->view('site/common/footer');?>