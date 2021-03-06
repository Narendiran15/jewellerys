<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); 
if(!empty(unserialize($previllage))){extract(unserialize($previllage));}?>

<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
<?php if($this->session->flashdata('error_type')!='' && $this->session->flashdata('alert_message')!='' ){?>
<div class="callout callout-info <?php if(($this->session->flashdata('error_type')=='error')){?>modal-danger<?php }else{ echo "alert-success";}?>">
<a class="close" data-dismiss="modal" href="javascript:void(0);">x</a>

		<?php echo( $this->session->flashdata('alert_message'));?>
	<br>
</div>
	<?php } ?>
  <h1><small><?php echo $heading;?></small></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active">Members</li>
		<li class="active"><?php echo $heading;?></li>
      </ol>
	  <!--<a style="float:right;" class="btn btn-success" href="<?php echo base_url();?>admin/student/export_student_list" >Export</a>-->
  </section>	
<!--End-breadcrumbs-->

<!--Action boxes-->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
			<div class="box-body">
              <table id="user_table" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th id="ajax_url" aria-sort="descending" data-url="<?php echo base_url('admin/members/display_terminatedMembers') ?>" data-name="id">Sno</th>
				<th data-name="name">Company Name</th>
				<th data-name="country_name">Country</th>
				<th data-name="email">Email</th>							
				<th data-name="status">status</th>
				<th data-name="update">			
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
<?php $this->load->view('admin/common/footer.php');?>
