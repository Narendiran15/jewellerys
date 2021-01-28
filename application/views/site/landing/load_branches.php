<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 office-list-inner"> 

				<ul class="list-unstyled">
								<?php if($branch_list->num_rows()>0){ foreach($branch_list->result() as $branch){?>
								<li>
								<a href="javascript:void(0);" data-id="<?php echo $branch->id; ?>" data-name="<?php echo get_iata_name($branch->iata_id);?>" class="edit_branch_info_btn port_count ">
																<h4><?php echo get_iata_name($branch->iata_id);?> 
																<?php if($branch->branch_email!=""){?><img src="<?php echo base_url();?>images/site/success.png" class="checked_tick"/><?php }else{ ?>
																<img src="<?php echo base_url();?>images/site/warning.png" title="Please complete office details" class="checked_tick"/>
																<?php } ?>
																</h4>
																
										
								</a>								<h5><a href="javascript:void(0);" data-id="<?php echo $branch->id; ?>" data-name="<?php echo get_iata_name($branch->iata_id);?>" class="edit_branch_info_btn btn btn-primary">Add Branch Information</a></h5>
								<h5><a onclick="return confirm('Are you sure you want to delete this?');"  href="<?php echo base_url("delete_office/".$branch->id);?>" class="btn btn-danger">Delete</a></h5>
								</li>
								<?php } } ?>
								
				</ul>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">

		<a href="<?php echo base_url("member_reference/".$id);?>" onclick="load_branches();" class="backbtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/back-icon.png"></span>Back</a>

		

         <a href="javascript:void(0);" class="themebtn" id="cont_membership_opt_btn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon.png"></span>Continue to Membership Options</a>

</div>