<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); if(!empty(unserialize($previllage))){extract(unserialize($previllage));} ?>
<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active">Email</li>
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
           
			<div class="box-body">
			<table id="email_table" class="table table-bordered table-striped">
                <thead>
                <tr>
															<th id="ajax_url" data-url="<?php echo base_url('admin/questions/display_questions') ?>" data-name="id">Sno</th>
															<th data-name="title">Question Option</th>
															<th data-name="template">Template Name</th>
															<th data-name="status">Status</th>
															<th data-name="update" class="no-sort orderClasses" orderClasses="false">
																Update
															</th>
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
