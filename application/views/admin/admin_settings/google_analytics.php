<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">
<!--breadcrumbs-->
<section class="content-header">
  <h1>Dashboard<small>Home</small></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active">Admin</li>
		<li class="active"><?php echo $heading;?></li>
      </ol>
  </section>
<!--End-breadcrumbs-->

<section class="content">
<div class="row">
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $heading;?></h3>
            </div>
           <iframe src="<?php echo $this->config->item('google_data_studio_link')==""?"https://datastudio.google.com/embed/reporting/15Fq4mFrujVwyD8lURpx_gOx0qrWWLe43/page/1M":$this->config->item('google_data_studio_link');?>" width="100%" height="800px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
		  </div>
        </div>
      </div>
	 		
     </section>
  </div>

<style>
.row-fluid [class*="span"]:first-child {
    margin-left: 2.5%;
}
.row-fluid .span5 {
    width: 47.17094%;
}
</style>
<?php $this->load->view('admin/common/footer');?>
