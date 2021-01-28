<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); if(!empty(unserialize($previllage))){extract(unserialize($previllage));} ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<style>
table input {
    width: 100%;
    height: 35px;
    border: none !important;
}
.hideremovebtn{
	display:none;
}
input#total_amount {
	float: right;
    width: 45%;
    height: 50px;
    padding: 5px;
    border: 3px solid #000 !important;
}

.amount_txt {
	float: right;
    
    border: 1px solid #000 !important;
}
.totalbox {
    float: right;
    /* width: 89%; */
}
button{
	border:none !important;
}
</style>
<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Invoices</li>
        <li class="active"><?php echo $heading;?></li>
      </ol>
</section>
  <?php if($this->session->flashdata('error_type')!='' && $this->session->flashdata('alert_message')!='' ){?>
<div class="callout callout-info <?php if(($this->session->flashdata('error_type')=='error')){?>modal-danger<?php }else{ echo "alert-success";}?>">
<a class="close" data-dismiss="modal" href="javascript:void(0);">×</a>
<?php echo( $this->session->flashdata('alert_message'));?>
<br>
</div>
	<?php } ?>
<!--End-breadcrumbs-->

<!--Action boxes-->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           <!-- <div class="box-header">
              <h3 class="box-title"><?php echo $heading;?></h3>
            </div>-->
			<div class="box-body">
				<!--invoce form-->
				
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 our_guru_base" style="min-height:800px;">
						<h3 class="text-center">Invoice Creation</h3><br>			
						<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 our_guru_inner">
							<form class="" id="invoiceform1" role="search" method="post" action="<?php echo base_url();?>admin/invoice/save_invoice" >	
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>Invoice to</label>
										<input type="text" class="form-control required" name="company_name">
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>Address 1</label>
										<input type="text" class="form-control required" name="address1">
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>Address 2</label>
										<input type="text" class="form-control " name="address2">
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>City</label>
										<input type="text" class="form-control required" name="city">
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>State </label>
										<input type="text" class="form-control required" name="state">
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>Zipcode </label>
										<input type="text" class="form-control required" name="zip">
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>Country </label>
										<input type="text" class="form-control required" name="country">
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
									
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>Invoice Id </label>
										<input type="text" class="form-control required" readonly name="invoiceid" value="<?php echo get_last_invoice_no();?>">
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>Invoice Date </label>
										<input type="text" class="form-control required" id="inv_date" name="inv_date">
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group"><label>Terms </label>
										<input type="text" class="form-control required" name="terms">
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
									<div class="form-group"><label>Invoice Description </label>
										<textarea type="text" class="form-control required" name="inv_desc"></textarea>
									</div>
								</div>
								<div class=" top_guru">
								<!-- Editable table -->
									<div class="card">
										<div class="card-body">
											<div id="table" class="table-editable">
												<table class="table table-bordered table-responsive-md table-striped text-center">
													<thead>
													  <tr>
														
														<th class="text-center">Invoice Line</th>
														<th class="text-center">Amount</th>
														<th class="text-center">Action</th>
													  </tr>
													</thead>
													<tbody id="tbody_appendhtml">
													  <tr class="billing_tr">
														
														<td class="pt-6-half qty" width="50%" >
														<textarea type="text" class="form-control required" name="description[]" cols="5" rows="3"required></textarea>
														</td>
														<td class="pt-3-half amount" >
														<input type="text" style="text-align:right;" name="amount[]" class="amount_txt form-control required decimal" /></td>
														<td>
														  <span class="table-remove"><button type="button"
															  class="btn btn-success btn-rounded btn-sm my-0 add_row">+ Add</button></span>
														
														  <span class="table-remove hideremovebtn"><button type="button"
															  class="btn btn-danger btn-rounded btn-sm my-0 remove_btn">Remove</button></span>
														</td>
													  </tr>
													  
													</tbody>
												</table>
												
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group">
									<h3>Invoice Total</h3>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<div class="form-group">
										<h5><input type="text" style="text-align:right;" class="form-control decimal required" id="total_amount" readonly name="total_amount" value="0"></h5>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
									<div class="form-group">
									<label>Transfer Instructions</label>
										<textarea type="text" class="form-control required"  name="transfer_desc" cols="5" rows="5">Bank: Wells Fargo Bank, N.A. 420 Montgomery St, San Francisco, CA 94104 A/C: Lighthouse Network Management, Inc. Account #: 1384802359 ABA: 063107513 - SWIFT/BIC: WFBIUS6S</textarea>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
									<div class="form-group">
									<label>Notes</label>
										<textarea type="text" class="form-control required"  name="notes" cols="5" rows="4">Thank you - we appreciate your support of the Global Logistics Summit Network!</textarea>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
									<div class="form-group">
									<label>Email id to invoice sent</label>
										<input type="email" class="form-control required email" name="company_mail"/>
									</div>
								</div>
								
								<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
											<div class="text-center">
												 <button type="submit" id="invoiceformsubmit1" class="btn btn-success btn-lg">Submit</button>
											</div>
								</div>				
							</form>
						</div>
					</div>
				
		    </div>
        </div>
      </div>
    </div>
  </section>

</div>

<script>
 $(document).ready(function(){
	$.validator.addMethod('decimal', function(value, element) {
	  return this.optional(element) || /^((\d+(\\.\d{0,2})?)|((\d*(\.\d{1,2})))|((\-\d*(\.\d{1,2})))|((\-\d*)))$/.test(value);
	}, "Please enter a correct number, format 0.00");
    $(document).on("click",".add_row",function(){
	   
		var reqlength = $('.amount_txt').length;
		var value = $('.amount_txt').filter(function () {
			return this.value != '';
		});

		if (value.length>=0 && (value.length !== reqlength)) {
			alert('Please fill out all required fields.');
		} else {
			$("#tbody_appendhtml").append($(".billing_tr").clone().find("input").val("").end().find("textarea").val("").end().find(".hideremovebtn").removeClass('hideremovebtn').end().find(".removeempty").remove().end().removeClass('billing_tr').addClass('billing_tr_sub'));
		}
		count_total();
	 });
   
	$(document).on("click",".remove_btn",function(){
	   $(this).parent().parent().parent().remove();
	   count_total();
   });
   
   $(document).on("change",".amount_txt",function(){
	   
	   count_total();
   });
   
   function count_total(){
	    $("#error").html("");
	   var total_amount=0;
		$('.amount_txt').each(function (index, elem) {
			if($(elem).val()!=""){
			total_amount=parseFloat(total_amount)+ parseFloat($(elem).val());
			}
		});
		if(total_amount < 0)
		{
			swal("Error","Total must greater than 0","error");
			$("#total_amount").val("");
		}
		else{
		$("#total_amount").val(total_amount);
		}
	}

	if($("#inv_date").length==1){
		flatpickr("#inv_date", {
			altInput: true,
			altFormat: "F j, Y"						
		});
	}
	
	//form submit
	$(document).ready(function(){ $('#invoiceform1').validate();});
});
</script>
</script>

<?php $this->load->view('admin/common/footer');?>
