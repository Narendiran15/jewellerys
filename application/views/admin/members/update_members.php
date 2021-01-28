<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); 

if(!empty(unserialize($previllage))){extract(unserialize($previllage));}?>
<link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<style>
#others_hide{
	display:none;
}
#ref_hide{
	display:none;
}
.testing_link{
	float:right;
}
.label-control {
    font-size: 19px ;
    color: #0e4880;
    letter-spacing: 2px;
    line-height: 30px;
    position: relative;
}
.input-control {
   background: #fff;
    font-size: 18px;
	width:100%;
	border:1px solid #ccc;
	margin-bottom:10px;
    color: #0e4880;
    padding: 14px 29px;
    border-radius: 5px;
    -moz-border-radius:5px;
    -webkit-border-radius: 5px;
}
.nopadd {
    padding: 0 !important;
}
.left-input {
    padding-left: 0;
}
.right-input {
    padding-right: 0;
}
.textarea-control {
    background: #DFE6EB;
    font-size: 18px ;
    border: none;
    color: #0e4880;
    resize: none;
    width: 100%;
    min-height: 250px;
    padding: 14px 29px;
    border-radius: 20px;
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
}
.form-title {
    text-align: center;
    font-size: 20px ;
    color: #fff;
    background: #0e4880;
    padding: 15px;
    margin-top: 65px;
    margin-bottom: 30px;
    letter-spacing: 2px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
}
.page-title {
    font-size: 36px;
    color: #0e4880;
	display:inline-block;
    letter-spacing: 2px;
}
.border-btn {
    font-size: 22px;
    border: 2px solid #5abce0;
    color: #5abce0;
    padding: 15px 51px;
    background: #fff;
    -webkit-box-shadow: 0 2px 29px rgba(0, 0, 0, 0.22);
    -moz-box-shadow: 0 2px 29px rgba(0, 0, 0, 0.22);
    box-shadow: 0 2px 29px rgba(0, 0, 0, 0.22);
    border-radius: 28px;
    -moz-border-radius: 28px;
    -webkit-border-radius: 28px;
	float:right;
}
.form-head {
    font-size: 20px ;
    color: #082949;
    display: inline-block;
    margin-top: 51px;
}
.grey-title {
    background: #B8B8B8;
    padding: 15px;
    font-size: 18px ;
    text-align: center;
    color: #000000;
}
.submit-btn {
    background: #5abce0;
    font-size: 20px;
    color: #fff;
    padding: 15px;
    border: none;
    padding: 22px 62px;
    -webkit-box-shadow: 0 2px 29px rgba(0, 0, 0, 0.22);
    -moz-box-shadow: 0 2px 29px rgba(0, 0, 0, 0.22);
    box-shadow: 0 2px 29px rgba(0, 0, 0, 0.22);
    border-radius: 13px;
    -moz-border-radius: 13px;
    -webkit-border-radius: 13px;
}
.reset-btn {
    background: #f38758;
    font-size: 20px ;
    color: #fff;
    padding: 15px;
    border: none;
    padding: 22px 62px;
    -webkit-box-shadow: 0 2px 29px rgba(0, 0, 0, 0.22);
    -moz-box-shadow: 0 2px 29px rgba(0, 0, 0, 0.22);
    box-shadow: 0 2px 29px rgba(0, 0, 0, 0.22);
    border-radius: 13px;
    -moz-border-radius: 13px;
    -webkit-border-radius: 13px;
}

</style>
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
            
<div class="box-body ">
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 update-profile-base" style="">
<h3 class="form-title"><span>Update-</span> Company Details:-</h3>
<!--<button class="border-btn back-page" onclick="window.history.go(-1); return false;" >Back</button>-->
<form id="edit_member_user_form" method="post">
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 update-profile-inner">

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 nopadd">

       <?php
		  if($country_code->num_rows()>0){
			  $calling_code =$country_code->row()->calling_code;
			 
			  
		  } 
		        
		
		?>	
		  <div class="application-form-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Status</label>
                     </div>
					<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
					<div id="member-status"><label class="radio-inline">
					<input type="radio" name="status" <?php if($company_info->status=="new"){ echo "checked";}?>     value="new" > New</label>
					<input type="radio" name="status" <?php if($company_info->status=="active"){ echo "checked";}?>     value="active" > Active</label>
					<label class="radio-inline"><input <?php if($company_info->status=="hold"){ echo "checked";}?>     type="radio" name="status" value="hold"> Hold</label>
					<label class="radio-inline"><input <?php if($company_info->status=="pending"){ echo "checked";}?>     type="radio" name="status" value="pending"> Pending</label>
					<label class="radio-inline"><input <?php if($company_info->status=="terminated"){ echo "checked";}?>     type="radio" name="status" value="terminated"> Terminated</label></div>
					<div class="help-block help-block-error "></div>
					</div>
				  </div>
				  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Membership Status</label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="hidden" name="membership_status" value="">
						<div id="member-membership_status">
						<label class="radio-inline"><input <?php if($company_info->membership_status=="Regular"){ echo "checked";} if($company_info->membership_status==""){ echo "checked";}?>  type="radio" name="membership_status" value="Regular" > Regular</label>
						
						<label class="radio-inline"><input <?php if($company_info->membership_status=="Member"){ echo "checked";}?>  type="radio" name="membership_status" value="Member" > Member</label>
						<label class="radio-inline"><input <?php if($company_info->membership_status=="Prime"){ echo "checked";}?>  type="radio" name="membership_status" value="Prime" > Prime</label>
						<label class="radio-inline"><input <?php if($company_info->membership_status=="Associate"){ echo "checked";}?> type="radio" name="membership_status" value="Associate"> Associate</label>
						<label class="radio-inline"><input <?php if($company_info->membership_status=="Founder"){ echo "checked";}?> type="radio" name="membership_status" value="Founder"> Founder</label>
						
						</div>
                     </div>
                  </div>
                   <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Join Date</label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="actived_date" id="actived_date"  value="<?php echo $company_info->actived_date;?>">
                     </div>
                  </div>
				    <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Company Legal Name </label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control " name="name" value="<?php echo $company_info->name;?>">
                     </div>
                  </div>
				    <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Company Trading name </label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control required" name="trading_name" value="<?php echo $company_info->trading_name;?>" placeholder="Please enter trading name">
                     </div>
                  </div>
                   
                 
                 
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                      <h6 class="form-title">Corporate Office Details :</h6>
					 <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Address (I) <span class="mandatory-field">*</span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="address1" value="<?php echo $company_info->address1;?>">
                     </div>
                  </div>
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Address (II) </label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="address2" value="<?php echo $company_info->address2;?>">
                     </div>
                  </div>
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">City <span class="mandatory-field">*</span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="city" value="<?php echo $company_info->city;?>">
                     </div>
                  </div>
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">State/Zip or Postcode <span class="mandatory-field"></span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5 ">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 left-input">
                           <input type="text" class="input-control" placeholder="State" name="state" value="<?php echo $company_info->state;?>">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 right-input">
                           <input type="text" class="input-control" placeholder="Postcode" name="zip" value="<?php echo $company_info->zip;?>">
                        </div>
                     </div>
                  </div>
                  
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Corporate Email <span class="mandatory-field">*</span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="corp_email" value="<?php echo $company_info->corp_email;?>">
                     </div>
                  </div>
				   <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Company Website</label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="corp_website"  value="<?php echo $company_info->corp_website;?>">
                     </div>
                  </div>
                  
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Main Telephone <span class="mandatory-field">*</span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control dialingcode_check" data-code="<?php echo $calling_code;?>" name="mobile" value="<?php echo $company_info->mobile;?>">
                     </div>
                  </div>
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Main Fax<span class="mandatory-field"></span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control dialingcode_check" data-code="<?php echo $calling_code;?>" name="fax" value="<?php echo $company_info->fax;?>">
                     </div>
                  </div>
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
				   <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">LinkedIn Link<span class="mandatory-field"></span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <label class="testing_link"><a class="linkedin_link" target="new"  href="<?php echo $linkedin_link;?>">Test</a></label>
						<input type="text" class="input-control " id="linkedin_link" placeholder="https://www.linkedin.com/in/gsan or gsan" value="<?php echo $company_info->linkedin_link;?>"    name="linkedin_link">
                     </div>
                  </div>
                   <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Facebook Link<span class="mandatory-field"></span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <label class="testing_link"><a class="facebook_link" target="new"  href="<?php echo $facebook_link;?>">Test</a></label>
						<input type="text" class="input-control " value="<?php echo $company_info->facebook_link;?>" placeholder="https://www.facebook.com/gsan or gsan "   id="facebook_link"  name="facebook_link">
                     </div>
                  </div>
                 
				  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control"> Year Started (YYYY) <span class="mandatory-field">*</span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control number" maxlength="4" name="year_started"  value="<?php echo $company_info->year_started;?>">
                     </div>
                  </div>  
				  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control"> Number of Employees <span class="mandatory-field">*</span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control number"  name="no_of_employees"  value="<?php echo $company_info->no_of_employees;?>">
                     </div>
                  </div>  
				  
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Licenses</label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="licenses" value="<?php echo $company_info->licenses;?>">
                     </div>
                  </div>
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Forwarding Software System</label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="software" value="<?php echo $company_info->software;?>">
                     </div>
                  </div>
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Tax ID No</label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="tax_id" value="<?php echo $company_info->tax_id;?>">
                     </div>
                  </div>
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Total Annual Billing Revenue (USD) <span class="mandatory-field">*</span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="annual_revenue" value="<?php echo $company_info->annual_revenue;?>">
                     </div>
                  </div>
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">How did you hear of GLSN <span class="mandatory-field">*</span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <select name="hear_about" id="hear_about" class="input-control">
																<option value="">Select one:</option>
																<?php if($hears_list->num_rows()>0){ foreach($hears_list->result() as $hears){?>
																<option <?php if($hears->id==$company_info->hear_about){ echo "selected";}?> value="<?php echo $hears->id;?>"><?php echo $hears->hears_name;?></option><?php }}?> 
																<option value="0" <?php if($company_info->hear_about=="0"){ echo "selected";}?>>Others</option>
																<option value="-1" <?php if($company_info->hear_about=="-1"){ echo "selected";}?>>Referred by GLSN Member (Specify)</option>
															 </select>
                     </div>
                  </div>
				 
				<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12" id="others_hide" <?php if($company_info->hear_about!=""&& $company_info->hear_about==0){?>style="display:block;" <?php }?>>
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Specify If Other<span class="mandatory-field"></span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="others" value="<?php echo $company_info->others;?>">
                     </div>
                  </div>	
                 <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12" id="ref_hide" <?php if($company_info->hear_about==-1){?>style="display:block;" <?php }?>>
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Specify GLSN Member<span class="mandatory-field"></span></label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="specify" value="<?php echo $company_info->specify;?>">
                     </div>
                  </div>	
                					  
               </div>


				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 other-company-info-base">
                                  
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Detailed description/overview of your Company to be displayed on the website entry<span class="mandatory-field">*</span></label>
                     </div>
                     <div class="input-container textarea-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <textarea class="textarea-control" name="description"><?php echo $company_info->description;?></textarea>
                     </div>
                  </div>

               </div>


				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 other-company-info-base">
                                  
                  <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Logo</label>
                     </div>
                     <div class="input-container textarea-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                      
						<input type="hidden" class="browse_img" name="company_id"  value="<?php echo $company_info->id;?>"  >
						<input type="file" class="browse_img" name="logo"  id="upload_img"  >
						<br/>
						 <?php if($company_info->logo!=""){?>
						 <img width="100px" id="pro_img" src="<?php echo base_url();?>images/site/files/<?php echo $company_info->logo;?>" alt="GLSN">
						 <?php } ?>
						 <br/><br/>
                     </div>
                  </div>

               </div>





<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 submit-application-base">
				
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center submit-application-btn">
								<div class="input-container col-md-6 col-sm-6 col-xs-12 col-lg-6 text-center">
								<button type="submit" id="edit_register_user_btn" class="submit-btn">UPDATE</button>
								</div>
								<div class="input-container col-md-6 col-sm-6 col-xs-12 col-lg-6 text-center">
												<button onclick="window.history.go(-1); return false;" type="button" class="reset-btn back-page">BACK</button>
								 </div>
				</div>
</div>

</div>
</form>
<script>



</script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/flatpickr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/highlight.pack.js"></script>
<script>
$(document).ready(function(){
if($("#license_exp_date").length==1){
	flatpickr("#license_exp_date", { 
		altInput: true,
		minDate: "today",
		altFormat: "Y-n-j"						
	});
}if($("#actived_date").length==1){
	flatpickr("#actived_date", { 
		altInput: true,
		minDate: "today",
		altFormat: "Y-n-j"						
	});
}
});
$(document).ready(function(){
	            	
					$.validator.addMethod('noemail', function (value) {
						return /^([\w-.]+@(?!gmail\.com)(?!yahoo\.com)(?!hotmail\.com)(?!mail\.ru)(?!yandex\.ru)(?!mail\.com)([\w-]+.)+[\w-]{2,4})?$/.test(value);
					}, 'Free email addresses are not allowed.');
					$("#edit_member_user_form").validate({ rules:{
                   
					corp_email: {
					  required: true,
					  noemail:true,
					  email:true
					},
					corp_website: {
					  required: true,
					 
					},
					year_started: {
					  required: true,
					  number:true,
					  maxlength:4,
					  minlength:4
					},
                    no_of_employees: {
					  required: true,
					  number:true
					},
                    annual_revenue: {
					  required: true,
					  number:true
					},
                    annual_revenue: {
					  required: true,
					  number:true
					},
                    address1: {
					  required: true
					},
                    city: {
					  required: true
					},
                   
                    mobile: {
					  required: true
					},
                    cid: {
					  required: true
					},
                    hear_about: {
					  required: true
					},
                    
                     description: {
					  required: true,
					  maxlength:500
					}
                   
                      
				   },
                messages: {
                    name: {
                        required: "Please enter company legal name"                       
                    },					 
					cid: {
                        required: "Please enter captcha"                       
                    },					 
					logo: {
                        required: "Please select logo"                       
                    },					 
					contact_name: {
                        required: "Please enter contact name"
                    },
					country_id: {
                        required: "Please select head office country"
                    },
					password: {
                        required: "Please enter password"
                    },
					confirm_password: {
                        required: "Please enter confirm password"
                    },
					"locations[]": {
                        required: "Please select locations"
                    },
					corp_website: {
                        required: "Please enter corporate website",
						validUrl:"Please enter valid url."
                    },
					year_started: {
                        required: "Please enter company started year",
						number:"Please enter valid year"
						
                    },
					
					annual_revenue: {
                        required: "Please enter annual revenue"
                    },
					hear_about: {
                        required: "Please select hear about"
                    },
					address1: {
                        required: "Please enter address1"
                    },
					
					city: {
                        required: "Please enter city"
                    },
					
					email: {
                        required: "Please enter contact email",
						remote:"Already exist."
                    },
					mobile: {
                        required: "Please enter telephone"
                    },
					no_of_employees: {
                        required: "Please enter number of employees"
                    },
					corp_email: {
                        required: "Please enter corporate email"
                    },
					
					description: {
                        required: "Please enter description"
                    }
					
					},  
					
   
                submitHandler: function(form) {
                    var formData = new FormData($('#edit_member_user_form')[0]);
                    formData.append('logo', $('input[type=file]')[0].files[0]);
					$("#edit_register_user_btn").html("Processing...");
					$.ajax(
						{
							type: "POST",
							url: baseurl+'admin/members/edit_update_company',
							dataType: "json",
							contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                            processData: false, 							
							data: formData,
							success: function(data)
							{ 
								
								$("#edit_register_user_btn").html("UPDATE");
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
});
$(document).ready(function(){
	$("#twitter_link").change(function(){
		var twitter_link=$(this).val();
		/*var twitter_link = twitter_link.replace("https://twitter.com/", "");*/
		if(twitter_link.indexOf("twitter.com")!=-1){
			var twitter_link=twitter_link;
		}
		else{
		var twitter_link="https://twitter.com/"+twitter_link;
			
		}
		$(".twitter_link").attr("href",twitter_link);
	})
	
	$("#facebook_link").change(function(){
		var facebook_link=$(this).val();
		if(facebook_link.indexOf("facebook.com")!=-1){
		var facebook_link=facebook_link;
		
		}
		else{
		var facebook_link="https://www.facebook.com/"+facebook_link;	
		}
		$(".facebook_link").attr("href",facebook_link);
	})
	$("#linkedin_link").change(function(){
		var linkedin_link=$(this).val();
		if(linkedin_link.indexOf("linkedin.com")!=-1){
		var linkedin_link=linkedin_link;
		
		}
		else{
		var linkedin_link="https://www.linkedin.com/in/"+linkedin_link;	
		}
		$(".linkedin_link").attr("href",linkedin_link);
	})
})
$(document).on("click","#hear_about",function(){
	var hearinfo=$(this).val();
	if(hearinfo==0&& hearinfo!=""){
		$("#others_hide").show();
		$("#ref_hide").hide();
	}
	else if(hearinfo==-1&& hearinfo!=""){
		$("#others_hide").hide();
		$("#ref_hide").show();
	}
	else{
		$("#others_hide").hide();
		$("#ref_hide").hide();
	}
});
</script>
</div>
</div>
</div>
</div>
</section>
</div>
<?php $this->load->view('admin/common/footer.php');?>