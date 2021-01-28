<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if(isset($heading)){ echo $heading!=''?$heading.' - ':'';echo ucfirst($this->config->item('site_name'));} else { echo ucfirst($this->config->item('site_name')); }?></title>
<link rel="alternate" href="<?php echo base_url();?>">
<meta content="<?php echo $this->config->item('site_name');?>" name="author">
<meta content="<?php echo $this->config->item('meta_description');?>" name="description">
<meta content="<?php echo $this->config->item('meta_keywords');?>" name="keywords">
<meta property="fb:app_id" content="<?php echo $this->config->item('fb_app_id');?>">
<meta property="og:site_name" content="<?php echo ucfirst($this->config->item('site_name'));?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo base_url();?>">
<meta property="og:title" content="<?php echo $this->config->item('meta_title');?>">
<meta property="og:description" content="<?php echo $this->config->item('meta_description');?>">
<meta property="og:image" content="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_logo')!=''?$this->config->item('site_logo'):'logo.png';?>">
<meta property="og:locale" content="en_US">
<meta name="twitter:widgets:csp" content="on">
<meta name="twitter:url" content="<?php echo base_url();?>">
<meta name="twitter:description" content="<?php echo $this->config->item('meta_description');?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $this->config->item('meta_title');?>">
<meta name="twitter:site" content="<?php echo $this->config->item('twitter_name');?>">
<meta name="twitter:app:id" content="<?php echo $this->config->item('twitter_app_id');?>">
<meta name="twitter:app:name:iphone" content="<?php echo ucfirst($this->config->item('site_name'));?>">
<meta name="twitter:app:name:ipad" content="<?php echo ucfirst($this->config->item('site_name'));?>">
<meta name="twitter:app:name:googleplay" content="<?php echo ucfirst($this->config->item('site_name'));?>">
<meta name="twitter:app:id:googleplay" content="<?php echo base_url();?>">
<meta name="twitter:app:url:iphone" content="<?php echo base_url();?>">
<meta name="twitter:app:url:ipad" content="<?php echo base_url();?>">
<meta name="twitter:app:url:googleplay" content="<?php echo base_url();?>">
<link rel="shortcut icon" sizes="76x76" type="image/x-icon" href="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_favicon')!=''?$this->config->item('site_favicon'):'favicon.ico';?>" />    <?php echo stripcslashes($this->config->item('google_analytics'));?>
<script>
	var baseurl="<?php echo base_url();?>";         
	var popup_error_type="<?php echo $this->session->flashdata('error_type')=="success"?$this->lang->line('success'):$this->lang->line('error');?>"; 
	var popup_message="<?php echo $this->session->flashdata('alert_message');?>";		
	var slider_timings="<?php echo ($admin_settings->row()->banner_timings=="" || $admin_settings->row()->banner_timings=="0")?6000:$admin_settings->row()->banner_timings;?>";
</script>
<link href="<?php echo base_url();?>css/site/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/site/animate.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/site/owl.theme.default.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/site/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/site/jquery.flipster.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/site/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/site/developer.css" rel="stylesheet">	
<link href="<?php echo base_url();?>css/site/sweetalert.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/admin/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<script  type="text/javascript"  src="<?php echo base_url();?>js/site/jquery-3.1.1.min.js"></script>
</head>
<body>
	<header>

                <div class="col-md-12 col-sm-12 co-lg-12 col-xs-12 head-base">

                         <div class="container">

					<div class="col-md-12 col-sm-12 col-xs-12 col-sm-12 header-inner">

																						 

									<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3 logo">

											<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_logo')!=''?$this->config->item('site_logo'):'logo.png';?>" alt="GLSN"> </a>
											

									</div>

									<div class="col-md-9 col-sm-9 col-xs-12 col-lg-9 menu-base">

											<nav class="navbar navbar-default">

													<div class="container-fluid">

													  <!-- Brand and toggle get grouped for better mobile display -->

													  <div class="navbar-header">

														<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

														  <span class="sr-only">Toggle navigation</span>

														  <span class="icon-bar"></span>

														  <span class="icon-bar"></span>

														  <span class="icon-bar"></span>

														</button>								   
															<a class="navbar-brand" href="<?php echo base_url();?>" <img src="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_logo')!=''?$this->config->item('site_logo'):'logo.png';?>"></a>
													  </div>												  

													  <!-- Collect the nav links, forms, and other content for toggling -->

													  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

														<ul class="nav navbar-nav navbar-right">
														<?php 
														$member_app=array("join","membership_register","member_reference","edit_membership_register","member_branchs","membership_option");
														?>	
														  <!--li <?php if($this->uri->segment(1)=="" ){ ?> class="active" <?php } ?>><a href="<?php echo base_url();?>">Home</a></li-->

														 
														 <!--li <?php if($this->uri->segment(2)=="join" || in_array($this->uri->segment(1),$member_app)){ ?> class="active" <?php } ?>><a href="<?php echo base_url("page/join");?>">Membership Application</a></li>

														  <li class="<?php if($this->uri->segment(1)=="summits"){ echo "active";}?>" ><a href="<?php echo base_url("summits");?>"> Upcoming Summits  </a></li>

														  <li  class="<?php if($this->uri->segment(1)=="members"){ echo "active";}?>" ><a href="<?php echo base_url("members");?>">Members Directory </a></li>

														  <li class="<?php if($this->uri->segment(1)=="news"){ echo "active";}?>" ><a href="<?php echo base_url("news");?>">News </a></li>

														  <li class="<?php if($this->uri->segment(1)=="contact"){ echo "active";}?>"><a href="<?php echo base_url("contact");?>"> Contact</a></li-->						  

														 

														</ul>

													  </div><!-- /.navbar-collapse -->

													</div><!-- /.container-fluid -->

												  </nav>

												  

									</div>

					</div>

                         </div>

                </div>

        </header>