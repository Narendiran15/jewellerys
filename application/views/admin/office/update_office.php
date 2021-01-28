<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); 

if(!empty(unserialize($previllage))){extract(unserialize($previllage));}?>
<link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<style>
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
    -moz-border-radius: 5px;
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
.select-control {
    background: #DFE6EB url(../images/drop-icon.png);
    font: 18px RalewaySemiBold;
    color: #0e4880;
    padding: 14px 29px;
    border: none;
	margin-bottom:10px;
    width: 100%;
    background-position: 96% center;
    background-repeat: no-repeat;
    border-radius: 20px;
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
.sub-office-base ul li {
    width: 48%;
    display: inline-block;
    margin-bottom: 30px;
}
.contact-info-table table td{
	padding:10px;
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
<h2 class="page-title"><span>Update-</span> Branch <?php
$office_name=get_iata_name($office_info->iata_id);
 echo $office_name;?>, <?php echo get_country_name($office_info->country_id);?></h2>
<button class="border-btn back-page" onclick="window.history.go(-1); return false;">Back</button>
<form id="branch_form" enctype="multipart/form-data" method="post">
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 update-profile-inner">

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 nopadd">
		<h6 class="form-head">Branch Details :</h6>
		<?php
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
		<?php /* <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
                        <label class="label-control">Info</label>
                     </div>
                     <div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <input type="text" class="input-control" name="info" id="info"  value="<?php echo $office_info->info;?>">
                     </div>
                  </div>	 */	  ?>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Address (I) <span class="mandatory-field">*</span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control" name="address1"  value="<?php echo $office_info->address1;?>">
										<input type="hidden" class="input-control" name="office_id" value="<?php echo $office_info->id;?>">
										<input type="hidden" class="input-control" name="comp_id" 
										value="<?php echo $office_info->company_id;?>">
										
										
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Address (II) </label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control" name="address2" value="<?php echo $office_info->address2;?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch City <span class="mandatory-field">*</span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control" name="city"  value="<?php echo $office_info->city;?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch State/Zip or Postcode </label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5 ">
								<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 left-input">
												<input type="text" class="input-control" placeholder="State" name="state"  value="<?php echo $office_info->state;?>">
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 right-input">
												<input type="text" class="input-control" placeholder="Postcode" name="zip"  value="<?php echo $office_info->zip;?>">
								</div>
										
						</div>
		</div>
		
		
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Telephone <span class="mandatory-field">*</span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control dialingcode_check" data-code="<?php echo $calling_code;?>" name="phone"  value="<?php echo $office_info->phone;?>" >
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Fax<span class="mandatory-field"></span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control dialingcode_check" data-code="<?php echo $calling_code;?>" name="fax"  value="<?php echo $office_info->fax;?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<label class="label-control">Branch Email<span class="mandatory-field">*</span></label>
						</div>
						<div class="input-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
										<input type="text" class="input-control" name="branch_email"  value="<?php echo $office_info->branch_email;?>">
						</div>
		</div>

		
</div>

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 contact-info-base">
				<h4 class="form-title">Contact Information</h4>

<div class="co-lg-12 col-md-12 col-sm-12 col-xs-12 contact-info-table">

				<div class="table-responsive">

						<table style="width: 100%;" id="ref_table">

								<thead>

										<tr style="width: 100%;">

												<th style="width: 20%;">Contact Name</th>

												<th style="width: 20%;">Contact Job Title</th>

												<th style="width: 20%;">Email</th>

												<th style="width: 20%;">Skype</th>

												<th style="width: 20%;">Mobile</th>

										</tr>

								</thead>

								<tbody>
										<?php 
										if($office_info->contact_info==""){
										?>
										<tr class="ref_clone existingitem">

												<td> <input type="text" class="app-input-control input-control" name="name[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="job_title[]"></td>

												<td> <input type="text" class="app-input-control input-control email" name="email[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="skype[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="mobile[]"></td>

										</tr>

										
										<tr class="existingitem">

												<td> <input type="text" class="app-input-control input-control" name="name[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="job_title[]"></td>

												<td> <input type="text" class="app-input-control input-control email" name="email[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="skype[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="mobile[]"></td>

										</tr>

										
										<tr class="existingitem">

												<td> <input type="text" class="app-input-control input-control" name="name[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="job_title[]"></td>

												<td> <input type="text" class="app-input-control input-control email" name="email[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="skype[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="mobile[]"></td>

										</tr>

										
										<tr class="existingitem">

												<td> <input type="text" class="app-input-control input-control" name="name[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="job_title[]"></td>

												<td> <input type="text" class="app-input-control  input-control email" name="email[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="skype[]"></td>

												<td> <input type="text" class="app-input-control input-control" name="mobile[]"></td>

										</tr>
										<?php } else{ $i=1;
										$contact_array=json_decode($office_info->contact_info,true);
										if(!empty($contact_array)){ foreach($contact_array as $contact){
										?>
										<tr class="<?php if($i==1){ echo "ref_clone";}?> existingitem">

												<td> <input type="text" class="app-input-control input-control" name="name[]" value="<?php echo $contact["name"];?>"></td>

												<td> <input type="text" class="app-input-control input-control" name="job_title[]" value="<?php echo $contact["job_title"];?>"></td>

												<td> <input type="text" class="app-input-control input-control email" name="email[]" value="<?php echo $contact["email"];?>"></td>

												<td> <input type="text" class="app-input-control input-control" name="skype[]" value="<?php echo $contact["skype"];?>"></td>

												<td> <input type="text" class="app-input-control input-control" name="mobile[]" value="<?php echo $contact["mobile"];?>"></td>
												<?php if($i>4){?>
												<td><a href="javascript:void(0)" class="del_ref_class">X</a></td><?php } ?>			
										</tr>
										<?php $i++;}}} ?>

								</tbody>

						</table>
						<label for="email[]" generated="true" class="error" style=""></label>
						<a href="javascript:void(0);" id="add_branch_contact_btn" class="add-text">+ add another contact info</a>

				</div>

</div>
</div>



<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 submit-application-base">
				<h5 class="grey-title">It may take a minute for all information to upload, please be patient!</h5>

				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center submit-application-btn">
								<div class="input-container col-md-6 col-sm-6 col-xs-12 col-lg-6 text-center">
								<button type="submit" id="branch_form" class="submit-btn">UPDATE</button>
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
if($("#actived_date").length==1){
	flatpickr("#actived_date", { 
		altInput: true,
		minDate: "today",
		altFormat: "j-n-Y"						
	});
}
$("#add_branch_contact_btn").click(function(){
 var $refclone=$(".ref_clone").clone();
 $refclone.removeClass("ref_clone");
 $refclone.removeClass("existingitem");
 $refclone.find("input").val('');
 $refclone.closest("tr").append("<td><a href='javascript:void(0)' class='del_ref_class'>X</a></td>"); console.log($refclone);
 $refclone.insertAfter("#ref_table tbody tr:last");
})
$(document).on("click",".del_ref_class",function(){
	$(this).parent().parent().remove();
})
$("#branch_btn_save").click(function(){
		$("#branch_form").submit();
	});
	   
            $("#branch_form").validate({
                rules: {
                    info: {
					  required: true
					},
					address1: {
					  required: true
					},
                    city: {
					  required: true
					},
                   
                    phone: {
					  required: true
					},
                   
                    branch_email: {
					  required: true,
					  email:true
					}
                      
				   },
                messages: {
                  
					info: {
                        required: "Please enter branch information."
                    },
					address1: {
                        required: "Please enter address1."
                    },
					city: {
                        required: "Please enter city."
                    },
					phone: {
                        required: "Please enter telephone."
                    },
					branch_email: {
                        required: "Please enter branch email."
                        
                    }					
					}, 
					
   
                 submitHandler: function(form) {
                    
					$.ajax(
						{
							type: "POST",
							url: baseurl+'admin/office/edit_update_office',
							dataType: "json",
							data: $("#branch_form").serialize(),
							success: function(data)
							{  
							
							   if (data['status'] == 1)
								{
								   swal({title: "Success", text: "Successfully branch saved", type: "success"},
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


</script>
</div>
</div>
</div>
</section>
</div>
<?php $this->load->view('admin/common/footer.php');?>