<?php $this->load->view('site/common/header');	?><div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-details-base" >
  <div class="container nopadd">
	 <p class="back-page"><a href="<?php echo base_url();?>" ><span class="back-icon"><img src="<?php echo base_url();?>images/site/back-icon.png" alt="GSLN"></span>Back</a></p>
	 <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-details-inner">
		<h4 class="site-head text-center"><?php echo ucfirst($company_info->name);?></h4>
		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile">
		   <h5 class="text-center">HEAD OFFICE PROFILE</h5>
		   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile-inner">
			  <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3 member-directory-profile-lft">
				  <?php if($company_info->logo!=""){?>
					<img class="company-logo detail-logo-page" src="<?php echo base_url();?>images/site/files/thumb/<?php echo $company_info->logo;?>" alt="">
				  <?php }?>
			  </div>
			  <div class="col-md-9 col-sm-9 col-xs-12 col-lg-9 member-directory-profile-rgt">
				 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 nopadd">
					<p><b><?php echo ucfirst($company_info->name);?></b></p>
					<p><?php echo $company_info->address1;?></p>
					<p><?php if($company_info->address2!=""){echo $company_info->address2.','; } ?> </p>
					<p><?php if($company_info->city!=""){echo $company_info->city.','; } ?><?php if($company_info->state!=""){echo $company_info->state.','; } ?> <?php echo get_country_name($company_info->country_id); ?> <?php if($company_info->zip!=""){echo "- ".$company_info->zip.'.'; } ?></p>
					<ul class="list-inline social-ul">
					   
					   <!--<li><a href="#"><img src="<?php echo base_url();?>images/site/skype.png" alt="GSLN Skype"></a></li>-->
					   <?php if($company_info->mobile!=""){
						    $android = stripos($_SERVER['HTTP_USER_AGENT'], "android");
							$iphone = stripos($_SERVER['HTTP_USER_AGENT'], "iphone");
							$ipad = stripos($_SERVER['HTTP_USER_AGENT'], "ipad");

							$whatsappNumber =$company_info->mobile;
							$whatsappLink = '';
							if($android !== false || $ipad !== false || $iphone !== false) {//For mobile
								$whatsappLink = "https://api.whatsapp.com/send?phone='".$whatsappNumber."'";
							} else {//For desktop
								$whatsappLink = "https://web.whatsapp.com/send?phone='".$whatsappNumber."'";
							}
						   
						   ?>
					   <li><a target="new" href="<?php echo $whatsappLink;?>&text=Hi%20There!"><img src="<?php echo base_url();?>images/site/whtsapp.png"/></a></li>
					   <?php } ?>
					</ul>
				 </div>
				 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6   member-directory-profile-rgtinner nopadd">
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
					
					<?php if($company_info->contact_name!=""){?><p><b>Contact</b> <?php echo $company_info->contact_name;?></p><?php } ?>
					<p><b>Website</b> <?php if($company_info->corp_website!=""){?><a href="<?php echo $corp_website;?>" target="new"> Click to Visit</a><?php } else{ echo "-"; } ?></p>
					<?php
						  if($logincheck==""){		
						  $email="";
						  if($company_info->corp_email!=""){
							  $email=explode("@",$company_info->corp_email);
							  $email='***@'.$email[1];
						  }
						  else{
							  $email="-";
						  }
						  }else{
							if($company_info->corp_email!=""){
							  $email=$company_info->corp_email;
						  }
						  else{
							  $email="-";
						  }  
						  }
					?>
					
					<p><b>Corp. Email</b>
					<?php if($logincheck==""){	 echo $email; } else{?>
					<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
					<?php } ?>
					</p> 
					<p><b>Telephone</b> <?php echo $company_info->mobile==""?"-":$company_info->mobile;?></p>
					<p><b>Fax</b> <?php echo $company_info->fax==""?"-":$company_info->fax;?></p>
				 </div>
			  </div>
		   </div>
		</div>		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile">				 <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile-inner">			     <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile-rgt">				 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 nopadd">					<p><b>Overview</b></p>					<p><?php echo strip_tags($company_info->description);?>					</p>														 </div>					  <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 news-base-new-base">										<p><b>Member News</b></p>										<?php if($member_news_list->num_rows()>0){ foreach($member_news_list->result() as $news ){?>										<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 news-profiledetail-new nopadd">												<p><span class="date-news"><?php echo date("Y-m-d",strtotime($news->post_date));?> </span><a href="<?php echo base_url("member_news/".url_title(convert_accented_characters($news->title), 'dash', true).'/'.$news->id);?>"><?php echo substr($news->title,0,50);?>...</a></p>										</div>										<?php }}else{ ?>										<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 news-profiledetail-new nopadd">												<p><span class="date-news">No Member News Found. </span></p>										</div>										<?php } ?>				   </div>				   </div>				   </div>		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 select-branch-inner">
		   <p>Select Branch</p>
		   <div class="col-md-4 col-sm-4 col-xs-12 col-lg-3 nopadd">
			  <select class="select-control" id="branch_search_dropdown">
				 <option value="">Select Branch</option>
				 <?php if($all_other_branches->num_rows()>0){ foreach($all_other_branches->result() as $branches){?>
				 <option <?php if($branches->id==$office_info->id){ echo "selected";}?> value="<?php echo $branches->id;?>"><?php echo $branches->short_code.'('.$branches->code.')'?></option>
				 <?php }} ?>
			  </select>
		   </div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile" id="append_branch_search_html_div">
		   <!--<h5 class="text-center"><?php echo get_iata_name($office_info->iata_id); ?> - PROFILE </h5>-->
		   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile-inner">
			  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-profile-rgt nopadd">
				
				 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6   member-directory-profile-rgtinner margin-small nopadd">
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd">
						<!--<p><b><?php echo ucfirst($office_info->info);?></b></p>-->
						<p><?php echo $office_info->address1;?></p>
						<p><?php if($office_info->address2!=""){echo $office_info->address2.','; } ?> </p>
						<p><?php if($office_info->city!=""){echo $office_info->city.','; } ?><?php if($office_info->state!=""){echo $office_info->state.','; } ?> <?php echo get_country_name($office_info->country_id); ?> <?php if($office_info->zip!=""){echo "- ".$office_info->zip.'.'; } ?></p>
					   
					</div>					</div>                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6   member-directory-profile-rgtinner  nopadd">
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
				<div class="table-responsive margin-small">

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
								            <?php 
											$i=0;
											$contact_list=json_decode($office_info->contact_info,true);
											if(!empty($contact_list)){foreach($contact_list as $contact){ if($contact["email"]!=""){ $i++;?>
											<tr class="">

												<td><p><?php echo $contact["name"];?> </p></td>					
												<td><p><?php echo $contact["job_title"];?> </p></td>					
																								<td><p><?php 																  if($logincheck==""){						  $email="";				  if($contact["email"]!=""){					  $email=explode("@",$contact["email"]);					  $email='***@'.$email[1];				  }				  else{					  $email="-";				  }				  }else{					if($contact["email"]!=""){					  $email=$contact["email"];				  }				  else{					  $email="-";				  }  				  }			?>																								<?php if($logincheck==""){	 echo $email; } else{?>										<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>										<?php } ?>																	 </p></td>						
												<td><p><?php  if($contact["skype"]!=""){?><a href="skype:<?php echo $contact["skype"];?>?chat">Link</a><?php }else{ echo "-"; } ?> </p></td>					
												<td><p><?php echo $contact["mobile"];?> </p></td>					
												<td><a href="javascript:void(0);" class="contact_mail_send_btn themebtn" data-office_id="<?php echo $office_info->id;?>" data-company_name="<?php echo $company_info->name;?>"  data-email="<?php echo $contact["email"]; ?>" data-name="<?php echo $contact["name"]; ?>">Contact </a></td>						
															
										    </tr>
											<?php } }} if($i==0){ ?>
											<tr class="">

												<td colspan="5"><p>No Contacts found. </p></td>					
															
										    </tr>
											<?php }?>
				
										
								</tbody>

						</table>
						

				</div>

</div>
		   </div>
		</div>
	 </div>
  </div>
</div><script>$(document).on("change","#branch_search_dropdown",function(){	var branch_id=$(this).val();	if(branch_id!=""){	  $.post(baseurl+"site/landing/ajax_branch",{"branch_id":branch_id},function(data){		  var data=JSON.parse(data);		  if(data.status==1){			  $("#append_branch_search_html_div").html(data.html);		  }	  });	}});</script><?php $this->load->view('site/common/footer');?>