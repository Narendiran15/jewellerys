<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); 

if(!empty(unserialize($previllage))){extract(unserialize($previllage));}?>
<link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>

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
		<li class="active">Office</li>
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
   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 update-profile-base" style="">
<h2 class="page-title"><span>Update-</span> Port <?php echo $office_name;?>, <?php echo get_country_name($office_info->country_id);?></h2>
<button class="border-btn back-page" onclick="window.history.go(-1); return false;">Back</button>
<form id="port_add_form" enctype="multipart/form-data" method="post">
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 update-profile-inner">
<p class="text-center req-class">(Items with a <span class="red">*</span>  are mandatory and used for internal statiscal purposes)</p>
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 nopadd">
		<h6 class="form-head">Branch Details :</h6>
		<?php
		  $address1='';
		  $address2='';
		  $city='';
		  $state='';
		  $zip='';
		  $phone='';
		  $fax="";
		  $emergency_number='';
		  $whwday_from='';
		  $whwday_to='';
		  $whwend_from='';
		  $whwend_to='';
		  $p1='';
		  $p2='';
		  $p3='';
		  $p4='';
		  $p5='';
		  $p6='';
		  $o1='';
		  $o2='';
		  $o3='';
		  $o4='';
		  $o5='';
		  $o6='';
		  $s1='';
		  $s2='';
		  $s3='';
		  $s4='';
		  $s5='';
		  $s6='';
		  $calling_code="";
		 
		  if(!empty($office_info->address)){
			  $address_info=json_decode($office_info->address,true);
			  $address1=$address_info["address1"];
			  $address2=$address_info["address2"];
			  $city=$address_info["city"];
			  $state=$address_info["state"];
			  $zip=$address_info["zip"];
			  $phone=$address_info["phone"];
			  $fax=$address_info["fax"];
		  }
		  if(!empty($office_info->profile)){
			  $profile_info=json_decode($office_info->profile,true);
			   $emergency_number=$profile_info["emergency_number"];
			   $whwday_from=$profile_info["whwday_from"];
			   $whwday_to=$profile_info["whwday_to"];
			   $whwend_from=$profile_info["whwend_from"];
			   $whwend_to=$profile_info["whwend_to"];
		  }
		  if($primary_info->num_rows()>0){
			  $p1=$primary_info->row()->contact_name;
			  $p2=$primary_info->row()->job_title;
			  $p3=$primary_info->row()->email;
			  $p4=$primary_info->row()->mobile;
			  $p5=$primary_info->row()->skype;
			  $p6=$primary_info->row()->year_exp;
			  
		  }
		 //echo '<pre>'; print_r($operations_info));
		if($operations_info->num_rows()>0){ 
			  $o1=$operations_info->row()->contact_name;
			  $o2=$operations_info->row()->job_title;
			  $o3=$operations_info->row()->email;
			  $o4=$operations_info->row()->mobile;
			  $o5=$operations_info->row()->skype;
			  $o6=$operations_info->row()->year_exp;
			  
		  } 
		  if($sales_info->num_rows()>0){
			  $s1=$sales_info->row()->contact_name;
			  $s2=$sales_info->row()->job_title;
			  $s3=$sales_info->row()->email;
			  $s4=$sales_info->row()->mobile;
			  $s5=$sales_info->row()->skype;
			  $s6=$sales_info->row()->year_exp;
			  
		  }
		  if($country_code->num_rows()>0){
			  $calling_code =$country_code->row()->calling_code;
			 
			  
		  } 
		        
		
		?>	
		 <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Status</label>
                     </div>
					<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
					<div id="member-status"><label class="radio-inline">
					<input type="radio" name="status" <?php if($office_info->status=="new"){ echo "checked";}?>     value="new" > New</label>
					<input type="radio" name="status" <?php if($office_info->status=="active"){ echo "checked";}?>     value="active" > Active</label>
					<label class="radio-inline"><input <?php if($office_info->status=="hold"){ echo "checked";}?>     type="radio" name="status" value="hold"> Hold</label>
					<label class="radio-inline"><input <?php if($office_info->status=="pending"){ echo "checked";}?>     type="radio" name="status" value="pending"> Pending</label>
					<label class="radio-inline"><input <?php if($office_info->status=="terminated"){ echo "checked";}?>     type="radio" name="status" value="terminated"> Terminated</label></div>
					<label for="status" generated="true" class="error"></label>
					</div>
				  </div>
		 <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Join Date</label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="actived_date" id="actived_date"  value="<?php echo $office_info->actived_date;?>">
                     </div>
                  </div>		  
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Address (I) <span class="mandatory-field">*</span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control" name="address1"  value="<?php echo $address1;?>">
										<input type="hidden" class="input-control" name="office_id" value="<?php echo $office_info->id;?>">
										<input type="hidden" class="input-control" name="comp_id" 
										value="<?php echo $office_info->company_id;?>">
										<?php if($port_info->num_rows()>0){ 
											$lat=$port_info->row()->latitude;			
											$long=$port_info->row()->longitude;			
										}
										else{
											$lat=0;
											$long=0;
										}
										?>
										<input type="hidden" class="input-control" name="latitude" value="<?php echo $lat;?>">
										<input type="hidden" class="input-control" name="longitude" value="<?php echo $long;?>">
										
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Address (II) </label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control" name="address2" value="<?php echo $address2;?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch City <span class="mandatory-field">*</span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control" name="city"  value="<?php echo $city;?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch State/Zip or Postcode </label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5 ">
								<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 left-input">
												<input type="text" class="input-control" placeholder="State" name="state"  value="<?php echo $state;?>">
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 right-input">
												<input type="text" class="input-control" placeholder="Postcode" name="zip"  value="<?php echo $zip;?>">
								</div>
										
						</div>
		</div>
		
		
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Telephone <span class="mandatory-field">*</span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control dialingcode_check" data-code="<?php echo $calling_code;?>" name="phone"  value="<?php echo $phone;?>" >
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Fax<span class="mandatory-field">*</span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control dialingcode_check" data-code="<?php echo $calling_code;?>" name="fax"  value="<?php echo $fax;?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Emergency Telephone<span class="mandatory-field">*</span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control dialingcode_check" data-code="<?php echo $calling_code;?>"  name="emergency_number"  value="<?php echo $emergency_number;?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Week Day Office Hours</label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5 ">
										<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 left-input">
														<select id="officeprofile-whwday_from" class="select-control" name="whwday_from">
															<option <?php if($whwday_from=="00:00"){ echo "selected";}?> value="00:00">00:00</option>
															<option <?php if($whwday_from=="00:30"){ echo "selected";}?> value="00:30">00:30</option>
															<option <?php if($whwday_from=="01:00"){ echo "selected";}?> value="01:00">01:00</option>
															<option <?php if($whwday_from=="01:30"){ echo "selected";}?> value="01:30">01:30</option>
															<option <?php if($whwday_from=="02:00"){ echo "selected";}?> value="02:00">02:00</option>
															<option <?php if($whwday_from=="02:30"){ echo "selected";}?> value="02:30">02:30</option>
															<option <?php if($whwday_from=="03:00"){ echo "selected";}?> value="03:00">03:00</option>
															<option <?php if($whwday_from=="03:30"){ echo "selected";}?> value="03:30">03:30</option>
															<option <?php if($whwday_from=="04:00"){ echo "selected";}?> value="04:00">04:00</option>
															<option <?php if($whwday_from=="04:30"){ echo "selected";}?> value="04:30">04:30</option>
															<option <?php if($whwday_from=="05:00"){ echo "selected";}?> value="05:00">05:00</option>
															<option <?php if($whwday_from=="05:30"){ echo "selected";}?> value="05:30">05:30</option>
															<option <?php if($whwday_from=="06:00"){ echo "selected";}?> value="06:00">06:00</option>
															<option <?php if($whwday_from=="06:30"){ echo "selected";}?> value="06:30">06:30</option>
															<option <?php if($whwday_from=="07:00"){ echo "selected";}?> value="07:00">07:00</option>
															<option <?php if($whwday_from=="07:30"){ echo "selected";}?> value="07:30">07:30</option>
															<option <?php if($whwday_from=="08:00"){ echo "selected";}?> value="08:00">08:00</option>
															<option <?php if($whwday_from=="08:30"){ echo "selected";}?> value="08:30">08:30</option>
															<option <?php if($whwday_from=="09:00"){ echo "selected";}?> value="09:00" >09:00</option>
															<option <?php if($whwday_from=="09:30"){ echo "selected";}?> value="09:30">09:30</option>
															<option <?php if($whwday_from=="10:00"){ echo "selected";}?> value="10:00">10:00</option>
															<option <?php if($whwday_from=="10:30"){ echo "selected";}?> value="10:30">10:30</option>
															<option <?php if($whwday_from=="11:00"){ echo "selected";}?> value="11:00">11:00</option>
															<option <?php if($whwday_from=="11:30"){ echo "selected";}?> value="11:30">11:30</option>
															<option <?php if($whwday_from=="12:00"){ echo "selected";}?> value="12:00">12:00</option>
															<option <?php if($whwday_from=="12:30"){ echo "selected";}?> value="12:30">12:30</option>
															<option <?php if($whwday_from=="13:00"){ echo "selected";}?> value="13:00">13:00</option>
															<option <?php if($whwday_from=="13:30"){ echo "selected";}?> value="13:30">13:30</option>
															<option <?php if($whwday_from=="14:00"){ echo "selected";}?> value="14:00">14:00</option>
															<option <?php if($whwday_from=="14:30"){ echo "selected";}?> value="14:30">14:30</option>
															<option <?php if($whwday_from=="15:00"){ echo "selected";}?> value="15:00">15:00</option>
															<option <?php if($whwday_from=="15:30"){ echo "selected";}?> value="15:30">15:30</option>
															<option <?php if($whwday_from=="16:00"){ echo "selected";}?> value="16:00">16:00</option>
															<option <?php if($whwday_from=="16:30"){ echo "selected";}?> value="16:30">16:30</option>
															<option <?php if($whwday_from=="17:00"){ echo "selected";}?> value="17:00">17:00</option>
															<option <?php if($whwday_from=="17:30"){ echo "selected";}?> value="17:30">17:30</option>
															<option <?php if($whwday_from=="18:00"){ echo "selected";}?> value="18:00">18:00</option>
															<option <?php if($whwday_from=="18:30"){ echo "selected";}?> value="18:30">18:30</option>
															<option <?php if($whwday_from=="19:00"){ echo "selected";}?> value="19:00">19:00</option>
															<option <?php if($whwday_from=="19:30"){ echo "selected";}?> value="19:30">19:30</option>
															<option <?php if($whwday_from=="20:00"){ echo "selected";}?> value="20:00">20:00</option>
															<option <?php if($whwday_from=="20:30"){ echo "selected";}?> value="20:30">20:30</option>
															<option <?php if($whwday_from=="21:00"){ echo "selected";}?> value="21:00">21:00</option>
															<option <?php if($whwday_from=="21:30"){ echo "selected";}?> value="21:30">21:30</option>
															<option <?php if($whwday_from=="22:00"){ echo "selected";}?> value="22:00">22:00</option>
															<option <?php if($whwday_from=="22:30"){ echo "selected";}?> value="22:30">22:30</option>
															<option <?php if($whwday_from=="23:00"){ echo "selected";}?> value="23:00">23:00</option>
															<option <?php if($whwday_from=="23:30"){ echo "selected";}?> value="23:30">23:30</option>
															</select>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 right-input">
														<select id="officeprofile-whwday_to" class="select-control" name="whwday_to">
															<option <?php if($whwday_to=="00:00"){ echo "selected";}?> value="00:00">00:00</option>
															<option <?php if($whwday_to=="00:30"){ echo "selected";}?> value="00:30">00:30</option>
															<option <?php if($whwday_to=="01:00"){ echo "selected";}?> value="01:00">01:00</option>
															<option <?php if($whwday_to=="01:30"){ echo "selected";}?> value="01:30">01:30</option>
															<option <?php if($whwday_to=="02:00"){ echo "selected";}?> value="02:00">02:00</option>
															<option <?php if($whwday_to=="02:30"){ echo "selected";}?> value="02:30">02:30</option>
															<option <?php if($whwday_to=="03:00"){ echo "selected";}?> value="03:00">03:00</option>
															<option <?php if($whwday_to=="03:30"){ echo "selected";}?> value="03:30">03:30</option>
															<option <?php if($whwday_to=="04:00"){ echo "selected";}?> value="04:00">04:00</option>
															<option <?php if($whwday_to=="04:30"){ echo "selected";}?> value="04:30">04:30</option>
															<option <?php if($whwday_to=="05:00"){ echo "selected";}?> value="05:00">05:00</option>
															<option <?php if($whwday_to=="05:30"){ echo "selected";}?> value="05:30">05:30</option>
															<option <?php if($whwday_to=="06:00"){ echo "selected";}?> value="06:00">06:00</option>
															<option <?php if($whwday_to=="06:30"){ echo "selected";}?> value="06:30">06:30</option>
															<option <?php if($whwday_to=="07:00"){ echo "selected";}?> value="07:00">07:00</option>
															<option <?php if($whwday_to=="07:30"){ echo "selected";}?> value="07:30">07:30</option>
															<option <?php if($whwday_to=="08:00"){ echo "selected";}?> value="08:00">08:00</option>
															<option <?php if($whwday_to=="08:30"){ echo "selected";}?> value="08:30">08:30</option>
															<option <?php if($whwday_to=="09:00"){ echo "selected";}?> value="09:00" >09:00</option>
															<option <?php if($whwday_to=="09:30"){ echo "selected";}?> value="09:30">09:30</option>
															<option <?php if($whwday_to=="10:00"){ echo "selected";}?> value="10:00">10:00</option>
															<option <?php if($whwday_to=="10:30"){ echo "selected";}?> value="10:30">10:30</option>
															<option <?php if($whwday_to=="11:00"){ echo "selected";}?> value="11:00">11:00</option>
															<option <?php if($whwday_to=="11:30"){ echo "selected";}?> value="11:30">11:30</option>
															<option <?php if($whwday_to=="12:00"){ echo "selected";}?> value="12:00">12:00</option>
															<option <?php if($whwday_to=="12:30"){ echo "selected";}?> value="12:30">12:30</option>
															<option <?php if($whwday_to=="13:00"){ echo "selected";}?> value="13:00">13:00</option>
															<option <?php if($whwday_to=="13:30"){ echo "selected";}?> value="13:30">13:30</option>
															<option <?php if($whwday_to=="14:00"){ echo "selected";}?> value="14:00">14:00</option>
															<option <?php if($whwday_to=="14:30"){ echo "selected";}?> value="14:30">14:30</option>
															<option <?php if($whwday_to=="15:00"){ echo "selected";}?> value="15:00">15:00</option>
															<option <?php if($whwday_to=="15:30"){ echo "selected";}?> value="15:30">15:30</option>
															<option <?php if($whwday_to=="16:00"){ echo "selected";}?> value="16:00">16:00</option>
															<option <?php if($whwday_to=="16:30"){ echo "selected";}?> value="16:30">16:30</option>
															<option <?php if($whwday_to=="17:00"){ echo "selected";}?> value="17:00">17:00</option>
															<option <?php if($whwday_to=="17:30"){ echo "selected";}?> value="17:30">17:30</option>
															<option <?php if($whwday_to=="18:00"){ echo "selected";}?> value="18:00">18:00</option>
															<option <?php if($whwday_to=="18:30"){ echo "selected";}?> value="18:30">18:30</option>
															<option <?php if($whwday_to=="19:00"){ echo "selected";}?> value="19:00">19:00</option>
															<option <?php if($whwday_to=="19:30"){ echo "selected";}?> value="19:30">19:30</option>
															<option <?php if($whwday_to=="20:00"){ echo "selected";}?> value="20:00">20:00</option>
															<option <?php if($whwday_to=="20:30"){ echo "selected";}?> value="20:30">20:30</option>
															<option <?php if($whwday_to=="21:00"){ echo "selected";}?> value="21:00">21:00</option>
															<option <?php if($whwday_to=="21:30"){ echo "selected";}?> value="21:30">21:30</option>
															<option <?php if($whwday_to=="22:00"){ echo "selected";}?> value="22:00">22:00</option>
															<option <?php if($whwday_to=="22:30"){ echo "selected";}?> value="22:30">22:30</option>
															<option <?php if($whwday_to=="23:00"){ echo "selected";}?> value="23:00">23:00</option>
															<option <?php if($whwday_to=="23:30"){ echo "selected";}?> value="23:30">23:30</option>
															</select>
										</div>
												
								</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Week End Office Hours</label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5 ">
										<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 left-input">
														<select id="officeprofile-whwend_from" class="select-control" name="whwend_from">
															<option <?php if($whwend_from=="00:00"){ echo "selected";}?> value="00:00">00:00</option>
															<option <?php if($whwend_from=="00:30"){ echo "selected";}?> value="00:30">00:30</option>
															<option <?php if($whwend_from=="01:00"){ echo "selected";}?> value="01:00">01:00</option>
															<option <?php if($whwend_from=="01:30"){ echo "selected";}?> value="01:30">01:30</option>
															<option <?php if($whwend_from=="02:00"){ echo "selected";}?> value="02:00">02:00</option>
															<option <?php if($whwend_from=="02:30"){ echo "selected";}?> value="02:30">02:30</option>
															<option <?php if($whwend_from=="03:00"){ echo "selected";}?> value="03:00">03:00</option>
															<option <?php if($whwend_from=="03:30"){ echo "selected";}?> value="03:30">03:30</option>
															<option <?php if($whwend_from=="04:00"){ echo "selected";}?> value="04:00">04:00</option>
															<option <?php if($whwend_from=="04:30"){ echo "selected";}?> value="04:30">04:30</option>
															<option <?php if($whwend_from=="05:00"){ echo "selected";}?> value="05:00">05:00</option>
															<option <?php if($whwend_from=="05:30"){ echo "selected";}?> value="05:30">05:30</option>
															<option <?php if($whwend_from=="06:00"){ echo "selected";}?> value="06:00">06:00</option>
															<option <?php if($whwend_from=="06:30"){ echo "selected";}?> value="06:30">06:30</option>
															<option <?php if($whwend_from=="07:00"){ echo "selected";}?> value="07:00">07:00</option>
															<option <?php if($whwend_from=="07:30"){ echo "selected";}?> value="07:30">07:30</option>
															<option <?php if($whwend_from=="08:00"){ echo "selected";}?> value="08:00">08:00</option>
															<option <?php if($whwend_from=="08:30"){ echo "selected";}?> value="08:30">08:30</option>
															<option <?php if($whwend_from=="09:00"){ echo "selected";}?> value="09:00" >09:00</option>
															<option <?php if($whwend_from=="09:30"){ echo "selected";}?> value="09:30">09:30</option>
															<option <?php if($whwend_from=="10:00"){ echo "selected";}?> value="10:00">10:00</option>
															<option <?php if($whwend_from=="10:30"){ echo "selected";}?> value="10:30">10:30</option>
															<option <?php if($whwend_from=="11:00"){ echo "selected";}?> value="11:00">11:00</option>
															<option <?php if($whwend_from=="11:30"){ echo "selected";}?> value="11:30">11:30</option>
															<option <?php if($whwend_from=="12:00"){ echo "selected";}?> value="12:00">12:00</option>
															<option <?php if($whwend_from=="12:30"){ echo "selected";}?> value="12:30">12:30</option>
															<option <?php if($whwend_from=="13:00"){ echo "selected";}?> value="13:00">13:00</option>
															<option <?php if($whwend_from=="13:30"){ echo "selected";}?> value="13:30">13:30</option>
															<option <?php if($whwend_from=="14:00"){ echo "selected";}?> value="14:00">14:00</option>
															<option <?php if($whwend_from=="14:30"){ echo "selected";}?> value="14:30">14:30</option>
															<option <?php if($whwend_from=="15:00"){ echo "selected";}?> value="15:00">15:00</option>
															<option <?php if($whwend_from=="15:30"){ echo "selected";}?> value="15:30">15:30</option>
															<option <?php if($whwend_from=="16:00"){ echo "selected";}?> value="16:00">16:00</option>
															<option <?php if($whwend_from=="16:30"){ echo "selected";}?> value="16:30">16:30</option>
															<option <?php if($whwend_from=="17:00"){ echo "selected";}?> value="17:00">17:00</option>
															<option <?php if($whwend_from=="17:30"){ echo "selected";}?> value="17:30">17:30</option>
															<option <?php if($whwend_from=="18:00"){ echo "selected";}?> value="18:00">18:00</option>
															<option <?php if($whwend_from=="18:30"){ echo "selected";}?> value="18:30">18:30</option>
															<option <?php if($whwend_from=="19:00"){ echo "selected";}?> value="19:00">19:00</option>
															<option <?php if($whwend_from=="19:30"){ echo "selected";}?> value="19:30">19:30</option>
															<option <?php if($whwend_from=="20:00"){ echo "selected";}?> value="20:00">20:00</option>
															<option <?php if($whwend_from=="20:30"){ echo "selected";}?> value="20:30">20:30</option>
															<option <?php if($whwend_from=="21:00"){ echo "selected";}?> value="21:00">21:00</option>
															<option <?php if($whwend_from=="21:30"){ echo "selected";}?> value="21:30">21:30</option>
															<option <?php if($whwend_from=="22:00"){ echo "selected";}?> value="22:00">22:00</option>
															<option <?php if($whwend_from=="22:30"){ echo "selected";}?> value="22:30">22:30</option>
															<option <?php if($whwend_from=="23:00"){ echo "selected";}?> value="23:00">23:00</option>
															<option <?php if($whwend_from=="23:30"){ echo "selected";}?> value="23:30">23:30</option>
															</select>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 right-input">
														<select id="officeprofile-whwend_to" class="select-control" name="whwend_to">
															<option <?php if($whwend_to=="00:00"){ echo "selected";}?> value="00:00">00:00</option>
															<option <?php if($whwend_to=="00:30"){ echo "selected";}?> value="00:30">00:30</option>
															<option <?php if($whwend_to=="01:00"){ echo "selected";}?> value="01:00">01:00</option>
															<option <?php if($whwend_to=="01:30"){ echo "selected";}?> value="01:30">01:30</option>
															<option <?php if($whwend_to=="02:00"){ echo "selected";}?> value="02:00">02:00</option>
															<option <?php if($whwend_to=="02:30"){ echo "selected";}?> value="02:30">02:30</option>
															<option <?php if($whwend_to=="03:00"){ echo "selected";}?> value="03:00">03:00</option>
															<option <?php if($whwend_to=="03:30"){ echo "selected";}?> value="03:30">03:30</option>
															<option <?php if($whwend_to=="04:00"){ echo "selected";}?> value="04:00">04:00</option>
															<option <?php if($whwend_to=="04:30"){ echo "selected";}?> value="04:30">04:30</option>
															<option <?php if($whwend_to=="05:00"){ echo "selected";}?> value="05:00">05:00</option>
															<option <?php if($whwend_to=="05:30"){ echo "selected";}?> value="05:30">05:30</option>
															<option <?php if($whwend_to=="06:00"){ echo "selected";}?> value="06:00">06:00</option>
															<option <?php if($whwend_to=="06:30"){ echo "selected";}?> value="06:30">06:30</option>
															<option <?php if($whwend_to=="07:00"){ echo "selected";}?> value="07:00">07:00</option>
															<option <?php if($whwend_to=="07:30"){ echo "selected";}?> value="07:30">07:30</option>
															<option <?php if($whwend_to=="08:00"){ echo "selected";}?> value="08:00">08:00</option>
															<option <?php if($whwend_to=="08:30"){ echo "selected";}?> value="08:30">08:30</option>
															<option <?php if($whwend_to=="09:00"){ echo "selected";}?> value="09:00" >09:00</option>
															<option <?php if($whwend_to=="09:30"){ echo "selected";}?> value="09:30">09:30</option>
															<option <?php if($whwend_to=="10:00"){ echo "selected";}?> value="10:00">10:00</option>
															<option <?php if($whwend_to=="10:30"){ echo "selected";}?> value="10:30">10:30</option>
															<option <?php if($whwend_to=="11:00"){ echo "selected";}?> value="11:00">11:00</option>
															<option <?php if($whwend_to=="11:30"){ echo "selected";}?> value="11:30">11:30</option>
															<option <?php if($whwend_to=="12:00"){ echo "selected";}?> value="12:00">12:00</option>
															<option <?php if($whwend_to=="12:30"){ echo "selected";}?> value="12:30">12:30</option>
															<option <?php if($whwend_to=="13:00"){ echo "selected";}?> value="13:00">13:00</option>
															<option <?php if($whwend_to=="13:30"){ echo "selected";}?> value="13:30">13:30</option>
															<option <?php if($whwend_to=="14:00"){ echo "selected";}?> value="14:00">14:00</option>
															<option <?php if($whwend_to=="14:30"){ echo "selected";}?> value="14:30">14:30</option>
															<option <?php if($whwend_to=="15:00"){ echo "selected";}?> value="15:00">15:00</option>
															<option <?php if($whwend_to=="15:30"){ echo "selected";}?> value="15:30">15:30</option>
															<option <?php if($whwend_to=="16:00"){ echo "selected";}?> value="16:00">16:00</option>
															<option <?php if($whwend_to=="16:30"){ echo "selected";}?> value="16:30">16:30</option>
															<option <?php if($whwend_to=="17:00"){ echo "selected";}?> value="17:00">17:00</option>
															<option <?php if($whwend_to=="17:30"){ echo "selected";}?> value="17:30">17:30</option>
															<option <?php if($whwend_to=="18:00"){ echo "selected";}?> value="18:00">18:00</option>
															<option <?php if($whwend_to=="18:30"){ echo "selected";}?> value="18:30">18:30</option>
															<option <?php if($whwend_to=="19:00"){ echo "selected";}?> value="19:00">19:00</option>
															<option <?php if($whwend_to=="19:30"){ echo "selected";}?> value="19:30">19:30</option>
															<option <?php if($whwend_to=="20:00"){ echo "selected";}?> value="20:00">20:00</option>
															<option <?php if($whwend_to=="20:30"){ echo "selected";}?> value="20:30">20:30</option>
															<option <?php if($whwend_to=="21:00"){ echo "selected";}?> value="21:00">21:00</option>
															<option <?php if($whwend_to=="21:30"){ echo "selected";}?> value="21:30">21:30</option>
															<option <?php if($whwend_to=="22:00"){ echo "selected";}?> value="22:00">22:00</option>
															<option <?php if($whwend_to=="22:30"){ echo "selected";}?> value="22:30">22:30</option>
															<option <?php if($whwend_to=="23:00"){ echo "selected";}?> value="23:00">23:00</option>
															<option <?php if($whwend_to=="23:30"){ echo "selected";}?> value="23:30">23:30</option>
															</select>
										</div>
												
								</div>
		</div>
		
		
</div>

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 contact-info-base">
				<h4 class="form-title">Contact Information</h4>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 contact-info-inner">
					 <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3 contact-info-section">
                        <h5 class="label-control">Primary Contact<span class="mandatory-field">*</span></h5>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 contact-info-section-base">
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Name" name="Contact[primaryContact][contact_name]" value="<?php echo $p1;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Job Title" name="Contact[primaryContact][job_title]" value="<?php echo $p2;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Email" name="Contact[primaryContact][email]" value="<?php echo $p3;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control dialingcode_check" data-code="<?php echo $calling_code;?>"  placeholder="Mobile" name="Contact[primaryContact][mobile]" value="<?php echo $p4;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Skype " name="Contact[primaryContact][skype]" value="<?php echo $p5;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Experience(Years)" name="Contact[primaryContact][year_exp]" value="<?php echo $p6;?>" >
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3 contact-info-section">
                        <h5 class="label-control"> Operation Contact </h5>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 contact-info-section-base">
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Name" name="Contact[operationsContact][contact_name]" value="<?php echo $o1;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Job Title" name="Contact[operationsContact][job_title]" value="<?php echo $o2;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control email" placeholder="Email" name="Contact[operationsContact][email]" value="<?php echo $o3;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control dialingcode_check" data-code="<?php echo $calling_code;?>"  placeholder="Mobile" name="Contact[operationsContact][mobile]" value="<?php echo $o4;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Skype " name="Contact[operationsContact][skype]" value="<?php echo $o5;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Experience(Years)" name="Contact[operationsContact][year_exp]" value="<?php echo $o6;?>" >
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3 contact-info-section">
                        <h5 class="label-control">Sales Contact </h5>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 contact-info-section-base">
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Name" name="Contact[salesContact][contact_name]" value="<?php echo $s1;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Job Title" name="Contact[salesContact][job_title]" value="<?php echo $s2;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control email" placeholder="Email" name="Contact[salesContact][email]" value="<?php echo $s3;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control  dialingcode_check" data-code="<?php echo $calling_code;?>" placeholder="Mobile" name="Contact[salesContact][mobile]" value="<?php echo $s4;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control"  placeholder="Skype " name="Contact[salesContact][skype]" value="<?php echo $s5;?>" >
                           </div>
                           <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <input type="text" class="input-control" placeholder="Experience(Years)" name="Contact[salesContact][year_exp]" value="<?php echo $s6;?>" >
                           </div>
                        </div>
                     </div>			
								
				</div>
</div>

<!---Different page refer PSD-->
<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<h5 class="grey-title">Other Service(s) Offered in House (You can select maximal of 10 services)</h5>
				<div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12 sub-office-base">
								<ul class="list-unstyled">
												
												<?php if($all_services->num_rows()>0){ foreach($all_services->result() as $service){
													
													$selected_services=explode(",",$office_info->services_selected);
													?>
												<li>
														<div class="custom_check">
																<label class="control control--checkbox">
																		<input type="checkbox" name="services[]" value="<?php echo $service->id;?>" <?php if(!empty($selected_services)){if(in_array($service->id,$selected_services)){
																			echo "checked";
																		} }?>>
																		<?php echo $service->name;?>				
																		<div class="control__indicator"></div>
																</label>
														</div>
												</li>
												<?php }}else{
													?><li>
															<span class="error">No service found.</span>
													  </li><?php 
												} ?>


											   
											   
										</ul>
				</div>
</div>


<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 submit-application-base">
				<h5 class="grey-title">It may take a minute for all information to upload, please be patient!</h5>

				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center submit-application-btn">
								<div class="input-container col-md-6 col-sm-6 col-xs-12 col-lg-6 text-center">
								<button type="submit" class="submit-btn">UPDATE</button>
								</div>
								<div class="input-container col-md-6 col-sm-6 col-xs-12 col-lg-6 text-center">
												<button onclick="window.history.go(-1); return false;" type="button" class="reset-btn back-page">BACK</button>
								 </div>
				</div>
</div>

</div>
</form>
<script>
$(document).ready(function(){
	            $("#port_add_form").validate({
                rules: {
                    
                    address1: {
					  required: true
					},
                   status: {
					  required: true
					},
                    city: {
					  required: true
					},
                    
                    emergency_number: {
					  required: true,
					 
					},
                    phone: {
					  required: true
					},
                     fax: {
					  required: true
					},
                     "Contact[primaryContact][contact_name]": {
					  required: true
					},
                     "Contact[primaryContact][job_title]": {
					  required: true
					},
                     "Contact[primaryContact][email]": {
					  required: true,
					  email:true
					},
                     "Contact[primaryContact][skype]": {
					  required: true					  
					},
                     "Contact[primaryContact][mobile]": {
					  required: true
					},
                     "Contact[primaryContact][year_exp]": {
					  required: true
					}
                      
				   },
                messages: {
                    
					address1: {
                        required: "Please enter address1"
                    },
					status: {
                        required: "Please select status"
                    },
					city: {
                        required: "Please enter city"
                    },					
					emergency_number: {
                        required: "Please enter emergency number"
                    },
					phone: {
                        required: "Please enter telephone"
                    },
					fax: {
                        required: "Please enter fax"
                    },
					"Contact[primaryContact][contact_name]": {
                        required: "Please enter contact name"
                    },
					"Contact[primaryContact][job_title]": {
                        required: "Please enter job title"
                    },
					"Contact[primaryContact][email]": {
                        required: "Please enter email",
						
                    },
					"Contact[primaryContact][mobile]": {
                        required: "Please enter mobile"
                    },
					"Contact[primaryContact][skype]": {
                        required: "Please enter skype"
                    },
					"Contact[primaryContact][year_exp]": {
                        required: "Please enter year"
                    }
					
					}, 
					
   
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'admin/office/edit_update_office',
							dataType: "json",
							data: $('#port_add_form').serialize(),
							success: function(data)
							{ 
								if (data['status'] == 1)
								{
								   swal({title: "Success", text: data["message"], type: "success"},
								   function(){ 						   	
										 window.location.reload();
									   }
									);								  
								}
								else if (data['status'] == 2)
								{
								   swal('Oops',data['message'],'error');
								}
								else
								{
								  swal('Oops',data['message'],'error');
								}	
							}
						});
                } 
            });
})

$(document).on("click","input[name='services[]']",function(){
	var selected_count=0;
	    
	    if($(this).is(":checked")){ 
			if($('input[name="services[]"]:checked').length<=10){
			$(this).prop("checked",true);
			}
			else{
				$(this).prop("checked",false);	
				swal("Error","Only allowed max 10 services","error")
			}
		}
		else  if($(this).is(":checked")==false){
			
		}
		else{	
		if($('input[name="services[]"]:checked').length<=10){
			$(this).prop("checked",true);
		}
		else{
			$(this).prop("checked",false);	
			swal("Error","Only allowed max 10 services","error")
		}
		}
		
	
});
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/flatpickr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/highlight.pack.js"></script>
<script>
$(document).ready(function(){
if($("#actived_date").length==1){
	flatpickr("#actived_date", { 
		altInput: true,
		minDate: "today",
		altFormat: "j-n-Y"						
	});
}
});
</script>
</div>
</div>
</div>
</section>
</div>
<?php $this->load->view('admin/common/footer.php');?>