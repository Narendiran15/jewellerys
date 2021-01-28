<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); if(!empty(unserialize($previllage))){extract(unserialize($previllage));} ?>
<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
<h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Contact</li>
        <li class="active"><?php echo $heading;?></li>
      </ol>
</section>
  <?php if($this->session->flashdata('error_type')!='' && $this->session->flashdata('alert_message')!='' ){?>
<div class="callout callout-info <?php if(($this->session->flashdata('error_type')=='error')){?>modal-danger<?php }else{ echo "alert-success";}?>">
<a class="close" data-dismiss="modal" href="javascript:void(0);">×</a>
<?php echo( $this->session->flashdata('alert_message'));?>
<br>
</div>
	<?php } ?>
<!--End-breadcrumbs-->

<!--Action boxes-->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              </div>
			<div class="box-body">
			<table id="contact_table" class="table table-bordered table-striped">
                <thead>
														<tr>
														<th id="ajax_url" data-url="<?php echo base_url('admin/contact/display_contacts') ?>" data-name="id">Sno</th>
															<th data-name="name">Name</th>
															<th data-name="email">Email</th>
															<th data-name="subject">Subject</th>
															<th data-name="action">Action</th>
															
														</tr>
													</thead>

													<tbody>
														 													
													</tbody>
											</table>
		  </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('admin/common/footer');?>
