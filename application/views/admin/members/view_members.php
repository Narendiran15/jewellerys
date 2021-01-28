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
  <h1><small></small></h1>
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
<div class="container-fluid">
   <div class="member-view">
      <h1>
         <span class="pull-right">
         <a class="btn btn-default" href="<?php echo $_GET['ret'];?>" ><i class="glyphicon glyphicon-arrow-left"></i> Back</a>                        <a class="btn btn-primary" href="<?php echo base_url();?>admin/members/update_members/<?php echo $company_info->id;?>?ret=<?php echo $_GET['ret'];?>">Update</a>        <a class="btn btn-danger" href="<?php echo base_url();?>admin/members/delete_members/<?php echo $company_info->id;?>?ret=<?php echo $_GET['ret'];?>" onclick="return confirm('Are you sure you want to delete this item?');" data-method="post">Delete</a>    </span>
         <?php echo $company_info->name;?>
      </h1>
      <?php
		 
		  
			  $address1=$company_info->address1;
			  $address2=$company_info->address2;
			  $city=$company_info->city;
			  $state=$company_info->state;
			  $zip=$company_info->zip;
			  $phone=$company_info->mobile;
			  $fax=$company_info->fax;
			  
	
		 
		        
		
		?>
	  <table class="table table-striped table-bordered detail-view">
         <tbody>
            <tr>
               <th class="col-sm-2">ID</th>
               <td><?php echo $company_info->id;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Company Name</th>
               <td><?php echo $company_info->name;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Trading Name</th>
               <td><?php echo $company_info->trading_name;?></td>
            </tr>
			<tr>
               <th class="col-sm-2">Contact Name</th>
               <td><?php echo $company_info->contact_name;?></td>
            </tr>
           <tr>
               <th class="col-sm-2">Contact Email</th>
               <td><?php echo $company_info->email;?></td>
            </tr>
			 <tr>
               <th class="col-sm-2">Country</th>
               <td><?php echo get_country_name($company_info->country_id);?></td>
            </tr>
            
            <tr>
               <th class="col-sm-2">Corp.Email</th>
               <td><a href="mailto:<?php echo $company_info->corp_email;?>"><?php echo $company_info->corp_email;?></a></td>
            </tr>
            
            <tr>
               <th class="col-sm-2">Corp.Website</th>
               <?php
				$weblink=$company_info->corp_website;
				if($weblink!=""){
				if(strpos($weblink, "http://") !== false){ }
				else if(strpos($weblink, "https://") !== false){ }
				else { $weblink = "http://".$weblink; }
				}
				else{
					$weblink="#";
				}
				
				?>
			   <td><a href="<?php echo $weblink;?>"><?php echo $weblink;?></a></td>
            </tr>
			<?php 
											 
			  if(strpos($company_info->facebook_link, "facebook.com") !== false){
				$facebook_link=$company_info->facebook_link;
			  }
			  else{
				$facebook_link="https://www.facebook.com/".$company_info->facebook_link;   
			  }
			  
			  
			  if(strpos($company_info->linkedin_link, "linkedin.com") !== false){
				$linkedin_link=$company_info->linkedin_link;
			  }
			  else{
				$linkedin_link="https://www.linkedin.com/in/".$company_info->linkedin_link;   
			  }
					  
				?>
			<tr>
               <th class="col-sm-2">Linked In</th>
               <td><?php echo $linkedin_link;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Facebook Link</th>
               <td><?php echo $facebook_link;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Year Started</th>
               <td><?php echo $company_info->year_started;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Number of Employees</th>
               <td><?php echo $company_info->no_of_employees;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Licenses</th>
               <td><?php echo $company_info->licenses;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Forwarding Software System</th>
               <td><?php echo $company_info->software;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Tax ID No. (If needed on Invoice)</th>
               <td><?php echo $company_info->tax_id;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Total Annual Billing Revenue (USD)</th>
               <td><?php echo $company_info->annual_revenue;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">How did you hear of GLSN</th>
               <td><?php  if($company_info->hear_about!=0 && $company_info->hear_about!=-1){ echo get_hear_name($company_info->hear_about); } else if($company_info->hear_about==-1){ echo "Referred by GLSN Member: ".$company_info->specify;} else{ echo "Others";} ?></td>
            </tr>
            <?php if($company_info->hear_about==0){?>
			<tr>
               <th class="col-sm-2">Others</th>
               <td><?php echo $company_info->others;?></td>
            </tr>
			<?php } ?>
            <tr>
               <th class="col-sm-2">Description</th>
               <td><?php echo $company_info->description;?></td>
            </tr>
           
         </tbody>
      </table>
      <h3>Address</h3>
      <table class="table table-striped table-bordered detail-view">
         <tbody>
            <tr>
               <th class="col-sm-2">Address 1</th>
               <td><?php echo $company_info->address1;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Address 2</th>
               <td><?php echo $company_info->address2;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Phone</th>
               <td><?php echo $company_info->mobile;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Fax</th>
               <td><?php echo $company_info->fax;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">City</th>
               <td><?php echo $company_info->city;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">State</th>
               <td><?php echo $company_info->state;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Zip/Postcode</th>
               <td><?php echo $company_info->zip;?></td>
            </tr>
         </tbody>
      </table>
      <h3>Branches</h3>
      <div class="row">
         <div class="col-sm-12">
            <div id="w0" class="panel-group collapse in" aria-expanded="true" style="">
               <?php if($all_ports->num_rows()>0){ $all_port=0; foreach($all_ports->result() as $office_info){?>
			   
			  
			   <div class="panel panel-default">
                  <div class="panel-heading">
                     <h4 class="panel-title"><a class="collapse-toggle" href="#w0-collapse<?php echo $office_info->id;?>" data-toggle="collapse" data-parent="#w0"><?php echo get_iata_name($office_info->iata_id);?>, <?php echo get_country_name($office_info->country_id);?><span class="pull-right label label-success"><?php echo $office_info->status;?></span></a></h4>
                  </div>
                  <div id="w0-collapse<?php echo $office_info->id; ?>" class="panel-collapse collapse">
                     <div class="panel-body">
                        <div class="member-office-view">
                           <h1>
                              <div class="pull-right">
                                 <a class="btn btn-primary" href="<?php echo base_url();?>admin/office/update_office/<?php echo $office_info->id;?>">Update</a>        <a class="btn btn-danger" href="<?php echo base_url();?>admin/office/delete_office/<?php echo $office_info->id;?>" onclick="return confirm('Are you sure you want to delete this item?'); " data-method="post">Delete</a>    
                              </div>
                             <?php echo get_iata_name($office_info->iata_id);?>, <?php echo get_country_name($office_info->country_id);?>
                           </h1>
                           <table class="table table-striped table-bordered detail-view">
                              <tbody>
                                 <tr>
                                    <th class="col-sm-2">Info</th>
                                    <td><?php echo $office_info->info;?></td>
                                 </tr>
                                 <tr>
                                    <th class="col-sm-2">Country</th>
                                    <td><?php echo get_country_name($office_info->country_id);?></td>
                                 </tr>
                                 <tr>
                                    <th class="col-sm-2">Location</th>
                                    <td><?php echo get_iata_name($office_info->iata_id);?></td>
                                 </tr>
                                 <tr>
                                    <th class="col-sm-2">Branch Email</th>
                                    <td><?php echo ($office_info->branch_email);?></td>
                                 </tr>
                              </tbody>
                           </table>
                           <h3>Address</h3>
                           <table class="table table-striped table-bordered detail-view">
                              <tbody>
                                 <tr>
                                    <th class="col-sm-2">Address 1</th>
                                    <td><?php echo $office_info->address1;?></td>
                                 </tr>
                                 <tr>
                                    <th class="col-sm-2">Address 2</th>
                                    <td><?php echo $office_info->address2;?></td>
                                 </tr>
                                 <tr>
                                    <th class="col-sm-2">Phone</th>
                                    <td><?php echo $office_info->phone;?></td>
                                 </tr>
                                 <tr>
                                    <th class="col-sm-2">Fax</th>
                                   <td><?php echo $office_info->fax;?></td>
                                 </tr>
                                 <tr>
                                    <th class="col-sm-2">City</th>
                                    <td><?php echo $office_info->city;?></td>
                                 </tr>
                                 <tr>
                                    <th class="col-sm-2">State</th>
                                    <td><?php echo $office_info->state;?></td>
                                 </tr>
                                 <tr>
                                    <th class="col-sm-2">Zip/Postcode</th>
                                    <td><?php echo $office_info->zip;?></td>
                                 </tr>
                              </tbody>
                           </table>
                          
						   <br/>
						   
						  
                            
						  <?php $i=1;$contacts=json_decode($office_info->contact_info,true);if(!empty($contacts)){   ?>
						  <h3>Contacts</h3>
						 
						  <table class="table table-striped table-bordered detail-view">
							 <tbody>
								<tr>
								<th class="col-sm-2">Name</th>
								<th class="col-sm-2">Title</th>
								<th class="col-sm-2">Email</th>
								<th class="col-sm-2">Skype</th>
								<th class="col-sm-2">Mobile</th>
								</tr>
								<?php foreach($contacts as $con){ ?>
								<tr>
								   
								   <td><?php echo $con["name"];?></td>
									<td><?php echo $con["job_title"];?></td>
									 <td><a href="mailto:<?php echo $con["email"];?>"><?php echo $con["email"];?></a></td>
								   <td><?php echo $con["skype"];?></td>
								   <td><?php echo $con["mobile"];?></td>	
								</tr>
								<?php } ?>
							   
							 </tbody>
						  </table>
						  <?php } ?>	
                           
                        </div>
                     </div>
                  </div>
               </div>
               <?php $i++;}} else { echo "<p>No office found.</p>";}?>
         </div>
      </div>
      
      <h3>References</h3>
      <?php $refernce=json_decode($company_info->reference_info,true);if(!empty($refernce)){   ?>
	  
	  
      <table class="table table-striped table-bordered detail-view">
         <tbody>
            <tr>
			<th class="col-sm-2">Company Name</th>
			<th class="col-sm-2">Job Title</th>
			<th class="col-sm-2">Email</th>
			</tr>
			<?php foreach($refernce as $ref){ ?>
			<tr>
               
               <td><?php echo $ref["company_name"];?></td>
			    <td><?php echo $ref["company_title"];?></td>
				 <td><a href="mailto:<?php echo $ref["email"];?>"><?php echo $ref["email"];?></a></td>
            </tr>
			<?php } ?>
           
         </tbody>
      </table>
	  <?php } ?>	
      <h4>Reference Responses</h4>
       <table class="table table-striped table-bordered detail-view">
         <thead>
		 <tr    style="color: white;background: #3c8dbc;">
			<td>Sno.</td>
			<td>Email</td>
			<td>How many years have you done business with this company?</td>
			<td>Are they timely with their communications?</td>
			<td>Do they perform with honesty, integrity and impartiality?</td>
			<td>Are they competent and perform services in a conscientious, diligent and efficient manner?</td>
			<td>Do you have any reservations in recommending this company as a GSAN Member?</td>
			<td>Notes</td>
		 </tr>
		 </thead>
		 <tbody>
           <?php $i=1;if($references->num_rows()>0){ foreach($references->result() as $ref){?>
		   <tr>
			<td><?php echo $i;$i++;?></td>
			<td><?php echo $ref->reference_email;?></td>
			<td><?php echo $ref->q1;?></td>
			<td><?php echo $ref->q2;?></td>
			<td><?php echo $ref->q3;?></td>
			<td><?php echo $ref->q4;?></td>
			<td><?php echo $ref->q5;?></td>
			<td><?php echo $ref->notes;?></td>
		 </tr>
		   <?php }} else{?>
		   <tr><td colspan="6">No reference response found.</td></tr>
		   <?php }?>
         </tbody>
      </table>
	  <h3>Membership Options</h3>
      <table class="table table-striped table-bordered detail-view">
         <tbody>
            <tr>
               <th class="col-sm-2">Application Fee</th>
               <td>USD <?php echo $company_info->application_fee;?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Summit Selection</th>
               <td><?php 			   $summitarray=array();			   $summit=explode(",",$company_info->summits);			   if(!empty($summit)){				   foreach($summit as $su){					   $summitarray[]=get_summit_name($su);				   }			   }			   			   echo !empty($summitarray)?implode(", ",$summitarray):"-";			   			   ?>
			   </td>
            </tr>
            <tr>
               <th class="col-sm-2">Featured member </th>
               <td><?php echo $company_info->featured_member=="1"?"Yes":"No";?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Top-Listed Member</th>
               <td><?php echo $company_info->top_listed_member=="1"?"Yes":"No";?></td>
            </tr>
            <tr>
               <th class="col-sm-2">Payment Protection</th>
               <td><?php if($company_info->debts==0){
				   echo "None";
			   }
			   else if($company_info->debts==1){
				   echo "USD 5000";
			   } else{
				   echo "USD 10000";
			   }
			   ?></td>
            </tr> <?php if($questions_list->num_rows()>0){                 $question_array=array();			   if(!empty($company_info->questions)){			   $question_array=json_decode($company_info->questions,true);			   			   } $i=0; foreach($questions_list->result() as $quest){   ?>
            <tr>
               <th class="col-sm-2"><?php echo html_entity_decode($quest->description);?></th>
               <td>			   <?php 			   			   if(isset($question_array[$quest->id])){				    echo $question_array[$quest->id]=="1"?"Yes":"No";			   }			  			  ?></td>
            </tr> <?php } } ?>
         </tbody>
      </table>
   </div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<script>
$(document).on("click",".delContact",function(data){
	var thisval=$(this);
	if (confirm('Are you sure you want to remove this contact?')) {
	$.post(baseurl+"admin/members/delete_contacts",{"id":$(this).attr("data-id")},function(data){
		thisval.parent().parent().remove();
	});
	}
});
</script>
<?php $this->load->view('admin/common/footer.php');?>