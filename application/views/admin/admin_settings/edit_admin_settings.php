<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">
<style>
.form-group {
   min-height: 80px;
}
</style>
	<!--breadcrumbs-->
	  <section class="content-header">
		<h1><?php echo $heading;?></h1>
		  <ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
			<li class="active">Admin</li>
			<li class="active"><?php echo $heading;?></li>
		  </ol>
	  </section>
  <!--End-breadcrumbs-->

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" autocomplete="false"  id="admin_setting" action="<?php echo base_url();?>admin/admin_settings/save_admin_settings/1" method="post" novalidate="novalidate">
              <div class="box-body">
                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 admin_email">
                  <label for="">Admin Email</label>
                  <input type="email" value="<?php if(!empty($setting)){ echo $setting->admin_email; } ?>" name="admin_email" class="form-control" placeholder="Enter Admin Email">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_name">
                  <label for="">Site Name</label>
                  <input type="text"  value="<?php if(!empty($setting)){ echo $setting->site_name; } ?>" name="site_name" class="form-control" placeholder="Enter Site Name">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 meta_title">
                  <label for="">Meta Title</label>
                  <input type="text" value="<?php if(!empty($setting)){ echo $setting->meta_title; } ?>" name="meta_title" class="form-control" placeholder="Enter Meta Title">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 meta_description">
                  <label for="">Meta Description</label>
                  <input type="text" value="<?php if(!empty($setting)){ echo $setting->meta_description; } ?>" name="meta_description" class="form-control" placeholder="Enter Meta Description">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 meta_keyword">
                  <label for="">Meta Keywords</label>
                  <input type="text" value="<?php if(!empty($setting)){ echo $setting->meta_keywords; } ?>"name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_user_logo">
                  <label for="">Site User Logo</label>
                  <input type="file" name="site_logo">
				  <div class="form_input"><img  class="res_img_logo" src="<?php if($setting->site_logo==''){ echo base_url().'images/site/profile/avatar.png';}else{ echo base_url();?>images/site/logo/<?php echo $setting->site_logo;}?>" /></div>
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_host_logo">
                  <label for="">Site Footer Logo</label>
                  <input type="file" name="site_logo1">
				  <div class="form_input"><img  class="res_img_logo" src="<?php if($setting->site_logo1==''){ echo base_url().'images/site/profile/avatar.png';}else{ echo base_url();?>images/site/logo/<?php echo $setting->site_logo1;}?>" /></div>
                </div>				
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_favicon">
                  <label for="">Site Favicon</label>
                  <input type="file" name="site_favicon">
				  <div class="form_input"><img  class="res_img_logo" src="<?php if($setting->site_favicon==''){ echo base_url().'images/site/profile/avatar.png';}else{ echo base_url();?>images/site/logo/<?php echo $setting->site_favicon;}?>" /></div>
                </div>
				
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_copy_right">
                  <label for="">Copy Right</label>
                  <!--<input  type="text" value="<?php if(!empty($setting)){ echo $setting->copy_right; } ?>" name="copy_right" class="form-control" placeholder="Enter Copy Right">-->
				  <textarea name="copy_right"  rows="4" cols="55"><?php if(!empty($setting)){ echo $setting->copy_right; } ?></textarea>
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_copy_right">
                  <label for="">Whatsapp Join Group PopUP Text</label>
                  <!--<input  type="text" value="<?php if(!empty($setting)){ echo $setting->copy_right; } ?>" name="copy_right" class="form-control" placeholder="Enter Copy Right">-->
				  <textarea name="whatsapp_text"  rows="4" cols="55"><?php if(!empty($setting)){ echo $setting->whatsapp_text; } ?></textarea>
                </div>
				
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_fb_link">
                  <label for="">Whatsapp Join Group Email</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->whatsapp_email; } ?>" name="whatsapp_email" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_fb_link">
                  <label for="">Facebook link</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->facebook_link; } ?>" name="facebook_link" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 twitter_link">
                  <label for="">Twitter link</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->twitter_link; } ?>" name="twitter_link" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_instagram">
                  <label for="">LinkedIN link</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->linkedin_link; } ?>" name="linkedin_link" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_instagram">
                  <label for="">Instagramlink</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->instagram_link; } ?>" name="instagram_link" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_smtp_host">
                  <label for="">SMTP Host</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->smtp_host; } ?>" name="smtp_host" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_smtp_port">
                  <label for="">SMTP Port</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->smtp_port; } ?>" name="smtp_port" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_email">
                  <label for="">SMTP Email</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->smtp_user; } ?>" name="smtp_user" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_smtp_password">
                  <label for="">SMTP Password</label>
                  <input  type="password" autocomplete="off" value="<?php if(!empty($setting)){ echo $setting->smtp_pass; } ?>" name="smtp_pass" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <label class="control-label">Google Analytics</label>
                  <div class="controls">
                    <textarea name="google_analytics"  rows="4" cols="55"><?php if(!empty($setting)){ echo html_entity_decode($setting->google_analytics); } ?></textarea>
                  </div>
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_twillio_id">
                  <label for="">Google Data Studio Link</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->google_data_studio_link; } ?>" name="google_data_studio_link" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_fb_link">
                  <label for="">Facebook App id</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->fb_app_id; } ?>" name="fb_app_id" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_fb_link">
                  <label for="">Facebook App Secret</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->fb_app_secret; } ?>" name="fb_app_secret" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_fb_link">
                  <label for="">Facebook Access token</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->fb_access_token; } ?>" name="fb_access_token" class="form-control">
                </div>
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_fb_link">
                  <label for="">Twitter App key</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->twitter_api_key; } ?>" name="twitter_api_key" class="form-control">
                </div>	
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_fb_link">
                  <label for="">Twitter App secret</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->twitter_api_secrete; } ?>" name="twitter_api_secrete" class="form-control">
                </div>	
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_fb_link">
                  <label for="">Twitter Access token</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->twitter_access_token; } ?>" name="twitter_access_token" class="form-control">
                </div>	
				<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 site_fb_link">
                  <label for="">Twitter Access token Secret</label>
                  <input  type="text" value="<?php if(!empty($setting)){ echo $setting->twitter_access_secrete; } ?>" name="twitter_access_secrete" class="form-control">
                </div>	
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
			    <input  type="hidden" value="<?php echo base_url(); ?>" name="base_url"  class="ui-wizard-content">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
</div>
</div>
</section>
</div>

<?php $this->load->view('admin/common/footer.php');?>
