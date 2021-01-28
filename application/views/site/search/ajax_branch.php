<!--<h5 class="text-center"><?php echo get_iata_name($office_info->iata_id); ?> - PROFILE </h5>-->
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile-inner">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile-rgt nopadd">
	
	 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6   member-directory-profile-rgtinner margin-small nopadd">
		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd">
			<!--<p><b><?php echo ucfirst($office_info->info);?></b></p>-->
			<p><?php echo $office_info->address1;?></p>
			<p><?php if($office_info->address2!=""){echo $office_info->address2.','; } ?> </p>
			<p><?php if($office_info->city!=""){echo $office_info->city.','; } ?><?php if($office_info->state!=""){echo $office_info->state.','; } ?> <?php echo get_country_name($office_info->country_id); ?> <?php if($office_info->zip!=""){echo "- ".$office_info->zip.'.'; } ?></p>
		   
		</div>		</div>       <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6   member-directory-profile-rgtinner nopadd">
		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd margin-small">
			<?php
				$corp_website=$company_info->corp_website;
				if($corp_website!=""){
				if(strpos($corp_website, "http://") !== false){ }
				else if(strpos($corp_website, "https://") !== false){ }
				else { $corp_website = "http://".$corp_website; }
				}
				else{
					$corp_website="#";
				}
			?>
			
			<p><b>Website</b> <?php if($company_info->corp_website!=""){?><a href="<?php echo $corp_website;?>" target="new"> Click to Visit</a><?php } else{ echo "-"; } ?></p>
			<?php
				  if($logincheck==""){		
				  $email="";
				  if($office_info->branch_email!=""){
					  $email=explode("@",$office_info->branch_email);
					  $email='***@'.$email[1];
				  }
				  else{
					  $email="-";
				  }
				  }else{
					if($office_info->branch_email!=""){
					  $email=$office_info->branch_email;
				  }
				  else{
					  $email="-";
				  }  
				  }
			?>
			
			<p><b>Email</b>
			<?php if($logincheck==""){	 echo $email; } else{?>
			<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
			<?php } ?>
			</p> 
			<p><b>Telephone</b> <?php echo $office_info->phone==""?"-":$office_info->phone;?></p>
			<p><b>Fax</b> <?php echo $office_info->fax==""?"-":$office_info->fax;?></p>
		   
		</div>
	 </div>
  </div>
  			 
			 <div class="co-lg-12 col-md-12 col-sm-12 col-xs-12 contact-info-table">
               <p><b>Contact List</b></p>
				<div class="table-responsive  margin-small">

						<table style="width: 100%;" id="ref_table">

								<thead>

										<tr style="width: 100%;">

												<th style="width: 20%;">Contact Name</th>

												<th style="width: 20%;">Job Title</th>

												<th style="width: 20%;">Email</th>

												<th style="width: 20%;">Skype</th>

												<th style="width: 20%;">Mobile</th>
												<th style="width: 20%;">Contact</th>

										</tr>

								</thead>

								<tbody>
								            <?php $i=0;
											$contact_list=json_decode($office_info->contact_info,true);
											if(!empty($contact_list)){foreach($contact_list as $contact){ if($contact["email"]!=""){ $i++; ?>
											<tr class="">

												<td><p><?php echo $contact["name"];?> </p></td>					
												<td><p><?php echo $contact["job_title"];?> </p></td>					
												<td><p><?php 																  if($logincheck==""){						  $email="";				  if($contact["email"]!=""){					  $email=explode("@",$contact["email"]);					  $email='***@'.$email[1];				  }				  else{					  $email="-";				  }				  }else{					if($contact["email"]!=""){					  $email=$contact["email"];				  }				  else{					  $email="-";				  }  				  }			?>												<?php if($logincheck==""){	 echo $email; } else{?>										<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>										<?php } ?> </p></td>					
												<td><p><?php  if($contact["skype"]!=""){?><a href="skype:<?php echo $contact["skype"];?>?chat">Link</a><?php }else{ echo "-"; } ?> </p></td>				
												<td><p><?php echo $contact["mobile"];?> </p></td>					
												<td><a href="javascript:void(0);" class="contact_mail_send_btn themebtn" data-office_id="<?php echo $office_info->id;?>" data-company_name="<?php echo $company_info->name;?>"  data-email="<?php echo $contact["email"]; ?>" data-name="<?php echo $contact["name"]; ?>">Contact </a></td>					
															
										    </tr>
											<?php }} }if($i==0){ ?>
											<tr class="">

												<td colspan="5"><p>No Contacts found. </p></td>					
															
										    </tr>
											<?php }?>
				
										
								</tbody>

						</table>
						

				</div>

</div>
</div>
