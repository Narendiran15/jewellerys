<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/site/jquery-ui.min.css"> 
     
<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
			<h1><?php echo $heading;?></h1>
			  <ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		        <li class="active">News</li>
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
            
			<form enctype="multipart/form-data" data-user-id="<?php if(!empty($news)){ echo $news->id; } ?>" id="student_register<?php if(!empty($news)){ echo "_edit"; } ?>" action="<?php echo base_url();?>admin/news/add_edit_insert_members/<?php if(!empty($news)){ echo $news->id; } ?>" method="post" novalidate="novalidate">
			<div class="box-body">
                <div class="form-group">
                  <label for="">Author</label>
                  <input  type="text" value="<?php if(!empty($news)){ echo $news->author; } ?>" name="author" class="form-control required" title="Please enter title">
                </div>
				<div class="form-group">
                  <label for="">Author Email</label>
                  <input  type="text" value="<?php if(!empty($news)){ echo $news->author_email; } ?>" name="author_email" class="form-control required email" title="Please enter email">
                </div>
				<div class="form-group">
                  <label for="">Post Date</label>
                  <input  type="text" value="<?php if(!empty($news)){ echo date("d-m-Y",strtotime($news->post_date)); } ?>" name="post_date" class="form-control datepicker required" title="Please enter date">
                </div>
				 
				<div class="form-group">
                  <label for="">Post Type</label>
                 <ul class="list-inline radio-ul">
							<li>                  
							<div class="custom_radio">
								 <label class="control control--radio">
									   <input type="radio" <?php if(!empty($news)){ if($news->post_type==0){ echo "checked";}}else { echo "checked";}?> name="post_type" value="0" class=" ">
									   Member News 																	<div class="control__indicator"></div>
								 </label>
							 </div>
							</li>
							<li>
								<div class="custom_radio">
												<label class="control control--radio">
													  <input <?php if(!empty($news)){ if($news->post_type==1){ echo "checked";}}?> type="radio" name="post_type" value="1" class=" ">
													  Industry News																	<div class="control__indicator"></div>
												</label>
								   </div>
							</li>
							</ul>
                </div>
				<div class="form-group">
                  <label for="">Subject</label>
                  <input  type="text" value="<?php if(!empty($news)){ echo $news->title; } ?>" name="title" class="form-control required" title="Please enter subject">
                </div>
				
				 <div class="form-group">
                  <label for="">Content</label>
				   <div>
				   <textarea name="content" style="height:100px;width: 100%;"  class="ui-wizard-content input_width " title="Please enter description"><?php if(!empty($news)){ echo $news->content; }?></textarea>
				   </div>
                 </div>
				  <div class="form-group">
                  <label for="">Archieve After</label>
				   <div>
				   <ul class="list-inline radio-ul">
						<li>                  
						<div class="custom_radio">
						 <label class="control control--radio">
							   <input <?php if(!empty($news)){ if($news->archive=="1week"){ echo "checked";}}else{ echo "checked";} ?> type="radio" name="archive" value="1week">
							   1 Week  																	<div class="control__indicator"></div>
						 </label>
						</div>
						</li>
						<li>
						<div class="custom_radio">
										<label class="control control--radio">
											  <input <?php if(!empty($news)){ if($news->archive=="1month"){ echo "checked";}} ?> type="radio" name="archive" value="1month">
											  1 Month 																	<div class="control__indicator"></div>
										</label>
						   </div>
						</li>
						<li>
						<div class="custom_radio">
										<label class="control control--radio">
											  <input <?php if(!empty($news)){ if($news->archive=="3months"){ echo "checked";}} ?> type="radio" name="archive" value="3months">
											  3 Months 																	<div class="control__indicator"></div>
										</label>
						   </div>
						</li>
						<li>
						<div class="custom_radio">
										<label class="control control--radio">
											  <input <?php if(!empty($news)){ if($news->archive=="6months"){ echo "checked";}} ?> type="radio" name="archive" value="6months" class=" ">
											  6 Months																	<div class="control__indicator"></div>
										</label>
						   </div>
						</li>
							</ul>
				   </div>
                 </div>
				 <div class="form-group">
                  <label for="">Image (344px X 226px)</label>
                  <input  type="file" title="Please upload image"  name="document" class="ui-wizard-content <?php if(empty($news)){?> <?php } ?>"><br/><br/>
					<?php if(!empty($news) && $news->document!=""){?> 
					<div class="form_input"><img  class="display_user_pro" src="<?php if(empty($news)){ echo base_url().'images/site/profile/avatar.png';}else{ echo base_url();?>images/site/news/<?php echo $news->document;}?>" width="100px" height="100px"/></div>
					<?php }?>
                </div>
				
				
				</div>
				<div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				<div id="status"></div>
				</div>
				<div id="submitted"></div>			  
			</form>
			</div>
			</div>
			</div>
			</section>
</div>
   <script src="<?php echo base_url();?>js/admin/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('.datepicker').datepicker({dateFormat: 'dd-mm-yy' ,changeYear:true});
	
});
</script> 
 
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>js/admin/tiny.js"></script>
  
<?php $this->load->view('admin/common/footer.php');?>
