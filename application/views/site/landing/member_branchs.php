<?php $this->load->view('site/common/header');	?>
<section>

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-base">

<div class="container nopadd">

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-inner nopadd">

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-nav">

			<ul class="list-inline">

					<li><a href="#"><span class="step-icon">1</span> Company Information</a></li>

					<li><a href="#"><span class="step-icon">2</span> Industry References</a></li>

					<li class="active"><a href="#"><span class="step-icon">3</span> Branch Information</a></li>

					<li class=""><a href="#"><span class="step-icon">4</span> Membership Option</a></li>

			</ul>

	</div>      

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-cotent-base">

			
             <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 ">
				   <h2 class="site-head">Branch Information</h2>
			</div>
			 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 ">
				   <a href="javascript:void(0);" data-toggle="modal" data-target="#add_branch_modal" class="themebtn pull-right"><span class="arrow-icon">+</span>Add another Branch</a>
			</div>
		   

			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 office-list-base" id="branch_inner_html">
				   
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 office-list-inner"> 

				<ul class="list-unstyled">
								<?php if($branch_list->num_rows()>0){ foreach($branch_list->result() as $branch){?>
								<li>
								<a href="javascript:void(0);" data-id="<?php echo $branch->id; ?>" data-name="<?php echo get_iata_name($branch->iata_id);?>" class="edit_branch_info_btn port_count ">
																<h4><?php echo get_iata_name($branch->iata_id);?> </h4>
																<h6 class="h_active1">update</h6>
										
								</a>
								</li>
								<?php } } ?>
								
				</ul>
				</div>
				</div>

	</div>
	

</div>

</div>

</div>
<script>
$(document).ready(function(){
	load_branches();
});
$(document).on("click",".edit_branch_info_btn",function(){
	$("#branch_inner_html").html("<div class='text-center sivspin'><img src='"+baseurl+"images/site/loadspin.gif"+"'/></div>");
	var office_id=$(this).attr("data-id");
	var office_name=$(this).attr("data-name");
	$.post(baseurl+"site/landing/update_branch",{"office_id":office_id,"office_name":office_name},function(data){
		var data=JSON.parse(data);
		if(data.status==1){
			$("#branch_inner_html").html(data.html);
		}
	});
})
$(document).on("click","#cont_membership_opt_btn",function(){
	$.post(baseurl+'site/landing/save_all_branches',{},function(data){
	    var data=JSON.parse(data);
		if(data.status==1){
			swal({title: "Success", text: "Successfully branches saved", type: "success"},
								   function(){ 						   	
										 window.location.href=data.url;
									   }
									);	
		}
		else{
			swal("Error","Please fill all the branches","error");
		}
	});
})

</script>
<div class="modal fade" id="add_branch_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="<?php echo base_url();?>site/landing/add_branch" method="post">
	<div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Branch</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <ul class="list-inline">
		<?php
			if($locations->num_rows()>0){ foreach($locations->result() as $iata){?>
			<li class="col-md-4">
			<div class="custom_check not_applicaple_base">

				<label class="control control--checkbox">

					<input type="checkbox" name="locations[]" location_name="<?php echo $iata->short_code;?>" value="<?php echo $iata->id;?>" class="select_port">

					 <?php echo $iata->short_code;?> (<?php echo $iata->code;?>)		

					<div class="control__indicator"></div>

				</label>

			</div>

			</li>
		<?php }} ?>
	   </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
	</form>
  </div>
</div>
</section>
<?php $this->load->view('site/common/footer');?>
