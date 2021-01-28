<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">
<style>
span.total_label {
    padding-right: 18px;
    margin-top: 6px;
    font-weight: bold;
    font-size: 18px;
}
input[type="radio"] {
    opacity: 22 !important;
	margin-left: 5px !important;
    margin-top: -2px;
}
div.checker {
    margin-right: 32px;
    margin-left: 50px;
}
.chexright
{
	float:right;
	margin-right: 37%;
}
.widget-content.nopadding {
    text-align: center;
    margin-top: 30px;
}
label{
	float:left;
}
.nopadding {
    padding: 0px;
	margin-bottom: 15px;
}
.hideremovebtn{
	display:none;
}
input#total_amount {
    width: 45%;
    height: 50px;
    padding: 5px;
    border: 3px solid #000 !important;
}
p#total_amount {
    border: 2px solid #000;
    padding: 5px;
    float: right;
	font-weight: bold;
    font-size: 18px;
    color: green;
}
</style>
  <section class="content-header">
	
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Mailing List</li>
        <li class="active"><?php echo $heading;?></li>
      </ol>
</section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
			<div class="box-body">
              <form id="invoice_form_gen" validate action="<?php echo base_url();?>admin/members/generate_invoice/<?php echo $invoice_id;?>" method="post">
						<div class="form-group">
						  <label for="">Invoice To.</label>
							<input type="text" required="" name="company_name" value="<?php echo $company;?>" class="form-control input_width">
						</div>
						<div class="form-group">
						  <label for="">Address1</label>
							<input type="text" required="" name="address1" value="<?php echo $address1;?>" class="form-control input_width">
						</div>
						<div class="form-group">
						  <label for="">Address2</label>
							<input type="text" name="address2" value="<?php echo $address1;?>" class="form-control input_width">
						</div>
						<div class="form-group">
						  <label for="">City</label>
							<input type="text"  name="city" value="<?php echo $city;?>" class="form-control input_width">
						</div>
						<div class="form-group">
						  <label for="">State</label>
							<input type="text"  name="state" value="<?php echo $state;?>" class="form-control input_width">
						</div>
						<div class="form-group">
						  <label for="">Zip</label>
							<input type="text"  name="zip" value="<?php echo $zip;?>" class="form-control input_width">
						</div>
						<div class="form-group">
						  <label for="">Country</label>
							<input type="text" required="" name="country" value="<?php echo $country;?>" class="form-control input_width">
						</div>
						<div class="form-group">
						  <label for="">Invoice:</label>
							<div class="col-lg-12 nopadding">#<?php echo get_last_invoice_no();?></div>
							<br/>
						</div>
						<div class="form-group">
						  <label for="">Invoice Date:</label>
							 <input type="text" class="form-control" name="inv_date" id="inv_date"  value="<?php echo date("Y-m-d");?>">
						</div>
						
						<div class="form-group">
						  <label for="">Terms</label>
							<input type="text" name="terms" value="Due on receipt" class="form-control input_width">
						</div>
						<div class="form-group">
						  <label for="">Invoice description</label>
							<input type="text" required="" name="inv_desc" value='"GLOBAL LOGISTICS SUMMIT NETWORK" (GLSN) - MEMBERSHIP INVOICE' class="form-control input_width">
						</div>
						<div class="form-group">
						  <label for="">Notes</label>
						  <textarea name="notes" required="" class="form-control des" title="Please enter content" aria-hidden="true">Thank you - we appreciate your support of the Global Logistics Summit Network!</textarea>
						</div>
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
								  <?php $total_amount=0; if(count($items)>0){ $i=0; foreach($items as $item){ $total_amount=$total_amount+$item['amount']; ?>
								  <tr class="billing_tr<?php if($i>0){ echo "_sub";}?>">
									
									<td class="pt-3-half qty" width="30%" >
									<textarea type="text" class="form-control required" name="description[]" cols="5" rows="3"required><?php echo $item['description'];?></textarea>
									</td>
									<td class="pt-3-half amount" >
									<input type="text" style="text-align:right;" name="amount[]" value="<?php echo $item['amount'];?>" class="amount_txt form-control required decimal " /></td>
									<td>
									  <span class="table-remove"><button type="button"
										  class="btn btn-success btn-rounded btn-sm my-0 add_row">+ Add</button></span>
									
									  <span class="table-remove <?php if($i==0){?>hideremovebtn<?php } ?>"><button type="button"
										  class="btn btn-danger btn-rounded btn-sm my-0 remove_btn">Remove</button></span>
									</td>
								  </tr>
								  <?php $i++;}} else{ ?>
								  <tr class="billing_tr">
									
									<td class="pt-3-half qty" width="30%" >
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
								  <?php } ?>
								</tbody>
							</table>
						</div>
						<div class="form-group">
						  <label for="">Transfer Instructions</label>
						  <textarea name="transfer_desc" rows="7" class="form-control des" title="Please enter transfer instructions" aria-hidden="true">Bank: Wells Fargo Bank, N.A.
420 Montgomery St, San Francisco, CA 94104
A/C: Lighthouse Network Management, Inc.
Account #: 1384802359
ABA: 063107513 - SWIFT/BIC: WFBIUS6S
</textarea>
						</div>
						
						<div class="form-group">
						  <label for=""> </label>
						  <div class="pull-right">
						  <span class="total_label">Total:</span> <p id="total_amount"><?php echo $total_amount;?></p>
						  </div>
							
						</div>	<br><br>	
						<input class="btn btn-success" type="submit" name="Send Invoice"><br><br>
					</form>
		  </div>
        </div>
      </div>
    </div>
  </section>
<link rel="stylesheet" href="<?php echo base_url();?>css/site/flatpickr.min.css"/>  
<script type="text/javascript" src="<?php echo base_url();?>js/site/flatpickr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/highlight.pack.js"></script>
<script>
$(document).ready(function(){
$.validator.addMethod('decimal', function(value, element) {
  return this.optional(element) || /^((\d+(\\.\d{0,2})?)|((\d*(\.\d{1,2})))|((\-\d*(\.\d{1,2})))|((\-\d*)))$/.test(value);
}, "Please enter a correct number, format 0.00");

	
$("#invoice_form_gen").validate({ignore: [],
		rules:{
		company_name: {required: true},
		address1: {required: true},
		city: {required: true},
		country: {required: true},
		terms: {required: true},
		inv_desc: {required: true},
		notes: {required: true},
		transfer_desc: {required: true},
		'amount[]': {required: true,decimal:true}, 
		'description[]': {required: true}
		},
		messages:{
		company_name: "Please enter company name",
		address1: "Please enter address1",
		inv_desc: "Please enter invoice description",
		city: "Please enter city",
		country: "Please enter country",
		terms: "Please enter terms",
		transfer_desc: "Please enter transfer description",
		'amount[]':{required: "Please enter amount",
		decimal:"Please enter valid number"},
		'description[]':{required: "Please enter description"}		
}});	

});

$(document).on("change",".amount_txt",function(){
	count_total();
	if(parseFloat($("#total_amount").html())<0){
				$(this).val(0);
				count_total();
	}
	
});
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
   //form submit
   
   
   function count_total(){
	    $("#error").html("");
	   var total_amount=0;
		$('.amount_txt').each(function (index, elem) {
			if($(elem).val()!=""){
			total_amount=parseFloat(total_amount)+ parseFloat($(elem).val());
			}
		});
		$("#total_amount").html(total_amount);
		if(total_amount<0){			
			swal("Error","Please check the values...","error");			
		}
	}
   
$(document).ready(function(){
	
	
if($("#inv_date").length==1){
	flatpickr("#inv_date", { 
		altInput: true,
		altFormat: "F j, Y"						
	});
}
});

</script>
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
$(document).ready(function(){

tinymce.init({
  selector: ".siv",
  forced_root_block : "",
  height: 150,
  menubar: false,
  relative_urls : false,
  remove_script_host : false,
  convert_urls : true,
  verify_html: false,
  valid_elements : '*[*]',
    valid_styles: '*[*]',
   //extended_valid_elements: 'span',
   formats: {
        bold : {inline : 'b' },  
        //italic : {inline : 'i' },
        //underline : {inline : 'u'}
    },
  plugins: [
    'advlist anchor autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | link image media code',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'],
	  //============image upload functionality==================

  image_title: true,
  automatic_uploads: true,
  images_upload_url: '<?php echo base_url('admin/solutions/tinyUploadAjax') ?>',
  file_picker_types: 'image',
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    
    // Note: In modern browsers input[type="file"] is functional without 
    // even adding it to the DOM, but that might not be the case in some older
    // or quirky browsers like IE, so you might want to add it to the DOM
    // just in case, and visually hide it. And do not forget do remove it
    // once you do not need it anymore.

    input.onchange = function() {
      var file = this.files[0];
      
      var reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = function () {
        // Note: Now we need to register the blob in TinyMCEs image blob
        // registry. In the next release this part hopefully won't be
        // necessary, as we are looking to handle it internally.
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        // call the callback and populate the Title field with the file name
        cb(blobInfo.blobUri(), { title: file.name });
      };
    };
    
    input.click();
  }
});
});
</script>
</div>
 <?php $this->load->view('admin/common/footer');?>
