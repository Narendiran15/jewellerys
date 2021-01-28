<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); if(!empty(unserialize($previllage))){extract(unserialize($previllage));} ?>
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
<!--payfully model-->
<!-- Button trigger modal -->

<input type="hidden" class="form-control" name="base" id="base" value="<?php echo base_url();?>">
		
<!-- Modal -->
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <!-- payment form-->
	 <form  id="payment_form" role="search" method="post" >
      <div class="modal-header">
        <h5 class="modal-title text-center" id="paymentLabel">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"id="modal-body">
         <div class="form-group">
			<label for="exampleInputEmail1">Name of the company</label>
			<input type="hidden" class="form-control" name="inv_id" id="inv_id">
		
			<input type="text" readonly class="form-control" id="company_name" name="company_name">
		 </div>
		<div class="form-group">
		 <label>Paid Date</label>
			<input type="text" class="form-control required pay_date" id="pay_date" name="pay_date">
		</div>	
		  <div class="form-group">
			<label for="Pay_amount">Amount</label>
			<input type="text" class="form-control decimal text-right" name="Pay_amount" id="Pay_amount" placeholder="0" value="0">
		  </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="paymentfromsubmit" class="btn btn-primary">Save Payment</button>
      </div>
	  </form><!--form close -->
    </div>
  </div>
</div>
<!-- end payfully model-->
<!--Action boxes-->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           <!-- <div class="box-header">
              <h3 class="box-title"><?php echo $heading;?></h3>
            </div>-->
			<div class="box-body">
			<table id="review_table" class="table table-bordered table-striped">
                <thead>
														<tr>

															
															<th id="ajax_url" data-url="<?php echo base_url()?>admin/invoice/display_invoice/<?php echo$status ?>" data-name="id">Sno</th>
															<th data-name="company_name">Company</th>
															<th data-name="inv_number">Invoice No</th>
															<th data-name="inv_date">Invoice date</th>
															<th data-name="amount">Amount</th>
															<th data-name="status">Status</th>
															<th data-name="paid_date">Paid Date</th>
															<th data-name="update" class="text-center">
																Action
															</th>
														</tr>
													</thead>

													<tbody>
														 													
													</tbody>
											</table>
		  </div>
        </div>
      </div>
    </div>
  </section>

</div>

<link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>
<script type="text/javascript" src="<?php echo base_url();?>js/site/flatpickr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/highlight.pack.js"></script>
<script>
$(document).ready(function () {
	var urls=$('#base').val();
	if($("#pay_date").length==1){
		flatpickr("#pay_date", {
			altInput: true,
			altFormat: "F j, Y"						
		});
	}

$.validator.addMethod('decimal', function(value, element) {
  return this.optional(element) || /^((\d+(\\.\d{0,2})?)|((\d*(\.\d{1,2}))))$/.test(value);
}, "Please enter a correct number, format 0.00");

$(document).on("click",".pay_full",function(){
	
	var inv_id =$(this).attr("data");
			$.ajax({
				type: "POST",
				url: $(this).attr("data-url"),
				
				data:'inv_id='+inv_id,
				dataType: 'json',
				success: function(results){
				if(results.status==1){
					
					$('#inv_id').val(results.id);
					$('#company_name').val(results['company_name']);
					$('#Pay_amount').val(results['amount']);
					$('#Pay_amount').prop('readonly','true');
					$('#Pay_amount').attr('data',results['amount']);
					$('#payment_form').attr('action',urls+"admin/invoice/save_payment")
				}
				else{
					
				}
				}
			});
		});
		
$(document).on("click",".pay_partial",function(){
	var inv_id =$(this).attr("data");
			$.ajax({
				type: "POST",
				url: $(this).attr("data-url"),
				
				data:'inv_id='+inv_id,
				dataType: 'json',
				success: function(results){
				if(results.status==1){
					$('#payment_form').attr('action',urls+"admin/invoice/update_payment")
					$('#inv_id').val(results.id);
					$('#company_name').val(results['company_name']);
					$('#Pay_amount').val(results['balance']);
					
					$('#Pay_amount').attr('data',results['balance']);
					$("#Pay_amount").removeAttr('readonly');
				}
				else{
					
				}
				}
			});
		});
		$(document).on("click","#paymentfromsubmit",function(e){
			e.preventDefault();
			var amount=$('#Pay_amount').val();
			var amount1=$('#Pay_amount').attr("data");
			if(Number(amount1) >= Number(amount)){
			
			$("#payment_form").submit();
			
			}
			else{
				swal("Error","Amount is greater than estimated","error");
				
			}
		});

		$("#payment_form").validate({
			});	
	
});
</script>
<?php $this->load->view('admin/common/footer');?>
