<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
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
<!--End-breadcrumbs-->
<section class="content">
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
			 <form enctype="multipart/form-data" class="" action="#" method="post" novalidate="novalidate">
			 <div class="box-body">
			 <div class="form-group">
                    <label for="">Name:</label>
                    <?php echo ucfirst($task->row()->name);?>
             </div>
			  <div class="form-group">
                    <label for="">Email:</label>
                    <?php echo $task->row()->email;?>
             </div>
			  <div class="form-group">
                    <label for="">Subject:</label>
                    <?php 
					
					echo $task->row()->subject;?>
             </div>
			  <div class="form-group">
                    <label for="">Message:</label>
                    <?php echo $task->row()->body;?>
             </div>
			 </div> 
				<div class="box-footer">
                <a type="submit" class="btn btn-success" href="<?php echo base_url()?>admin/contact/display_contact_list/">Back</a>
				<div id="status"></div>
				</div>
				<div id="submitted"></div>          
				</div>
            </form>
        </div>
  </div>
    </section>

</div>

<?php $this->load->view('admin/common/footer.php');?>
