<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 office-list-base">
<h2 class="page-title"><?php echo ucfirst($company_details->row()->name);?>.,</h2>
<h5 class="grey-title">Click List below to update Head Office or Office</h5>
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 office-list-inner"> 
<ul class="list-unstyled">
		<li>
				<a href="javascript:void(0);" data-id="<?php echo $comp_id;?>" data-name="Head Office" class="edit_headoffice_info_btn">
					<?php
					$city_country="";
					if(!empty($companyInfo->address)){
						$addressinfo=json_decode($companyInfo->address,true);
						if($addressinfo["city"]!=""){
							$city_country=ucfirst($addressinfo["city"]).",";
						}
					}
					?>	
						<h4>Head Office </h4>
						<h5><?php echo $city_country.''.ucfirst(get_country_name($companyInfo->country_id));?></h5>
						<h6><?php echo $companyInfo->status;?></h6>
						
				</a>
		</li>
		<?php if($all_ports->num_rows()>0){ foreach($all_ports->result() as $ports){ ?>
		<li>
				<a href="javascript:void(0);" data-id="<?php echo $ports->id;?>" data-name="<?php echo get_port_name($ports->port_id);?>" class="edit_port_info_btn port_count <?php if($ports->services_selected!=""){ echo "port_completed_done"; }?>">
						<?php
						$city_country="";
						if(!empty($ports->address)){
							$addressinfo=json_decode($ports->address,true);
							if($addressinfo["city"]!=""){
								$city_country=ucfirst($addressinfo["city"]).",";
							}
						}
						?>
						<h4><?php echo get_port_name($ports->port_id);?> </h4>
						<h5><?php echo $city_country.''.ucfirst(get_country_name($ports->country_id));?></h5>
						<h6><?php echo $ports->status;?></h6>
						
				</a>
		</li>
		<?php }} ?>
		
</ul>
</div>
</div>