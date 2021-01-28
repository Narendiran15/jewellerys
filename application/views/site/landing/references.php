<?php $this->load->view('site/common/header');	?>
<style>
input.known_years {
    width: 126px;
    height: 30px;
 
}
table td{
	    vertical-align: middle;
		padding: 14px 10px;
}
</style>
<section>
	  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 certification-base reference-class-mail">
	   <div class="container nopadd">
		  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 certification-inner nopadd">
			 <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 certification-inner-base nopadd">
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 certification-inner-lft nopadd">
				   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					  <h1 class="span-reference">Reference Submission <span >on <?php echo $company_details->name;?> of <?php echo get_country_name($company_details->country_id);?></span></h1>
				   </div>
				   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 table_base ">
					  <div class="table-responsive text-center table-width break_div">
						<form id="reference-form"  method="post">
						<table border="1" width="100%" cellspacing="2" cellpadding="2">
						<tbody>
						<tr>
						<td valign="top">1:</td>
						<td valign="top" class="text-left">How many years have you done business with this company:</td>
						<td valign="top">&nbsp;<input name="q1" required="required" type="text" title="Please enter years" /> Years
						<label for="q1" generated="true" class="error"></label>
						</td>
						</tr>
						<tr>
						<td valign="top">2:</td>
						<td valign="top" class="text-left">Are they timely with their communications?</td>
						<td valign="top"><label><input name="q2" required="required" type="radio" value="Yes" />&nbsp; Yes&nbsp; /&nbsp; </label><label><input name="q2" type="radio" value="No" /> No</label> /&nbsp;<label> <input name="q2" type="radio" value="Unknown" /> Unknown</label>
						<label for="q2" generated="true" class="error"></label>
						</td>
						</tr>
						<tr>
						<td valign="top">3:</td>
						<td valign="top" class="text-left">Do they perform with honesty, integrity and impartiality?</td>
						<td valign="top"><label><input name="q3" required="required" type="radio" value="Yes" /> Yes&nbsp; /&nbsp;</label> <label><input name="q3" type="radio" value="No" /> No&nbsp; /&nbsp;</label> <label><input name="q3" type="radio" value="Unknown" /> Unknown</label>
						<label for="q3" generated="true" class="error"></label>
						</td>
						</tr>
						<tr>
						<td valign="top">4:</td>
						<td valign="top" class="text-left">Are they competent and perform services in a conscientious, diligent and efficient manner?</td>
						<td valign="top"><label><input name="q4" required="required" type="radio" value="Yes" /> Yes&nbsp; /&nbsp;</label> <label><input name="q4" type="radio" value="No" /> No&nbsp; /&nbsp;</label><label> <input name="q4" type="radio" value="Unknown" /> Unknown</label>
						<label for="q4" generated="true" class="error"></label>
						</td>
						</tr>
						<tr>
						<td valign="top">5:</td>
						<td valign="top" class="text-left">Do you have any reservations in recommending this company as a GLSN Member?</td>
						<td valign="top"><label><input name="q5" required="required" type="radio" value="Yes" /> Yes&nbsp; /&nbsp;</label> <label><input name="q5" type="radio" value="No" />&nbsp; No&nbsp; /&nbsp;</label> <label><input name="q5" type="radio" value="Unknown" /> Unknown</label>
						<label for="q5" generated="true" class="error"></label>
						</td>
						</tr>
						<tr>
						<td valign="top">Notes:</td>
						<td valign="top" class="text-left"><textarea name="notes" class="required" cols="100" rows="3"></textarea>
						<label for="notes" generated="true" class="error"></label>
						<input name="reference_email" type="hidden" value="<?php echo $reference_email;?>" /></td>
						<td valign="top">&nbsp;</td>
						</tr>
						<tr>
						<td colspan="3" style="text-align:left;"><button id="submit_ref" name="Submit" class="themebtn" type="submit">Submit</button></td>
						</tr>
						</tbody>
						</table>
						</form>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
	         
</section>
<script>
	$(document).ready(function() {
		
    $.validator.addMethod("nameRegex", function(value, element) {
        return this.optional(element) || /^[a-z\- . ]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");
    $.validator.addMethod("number", function(value, element) {
        return this.optional(element) || /^[0-9\-+( ) + ]+$/i.test(value);
    }, "For Eg:1234567890, this field allows numbers,+,hyphen,(),single space only.");
    $("#reference-form").validate({
        errorElement: "label",
        rules: {
            
			q1: {
                required: true
            },
            q2: {
                required: true                
            },
            q3: {
                required: true                
            },
            q4: {
                required: true                
            },
            q5: {
                required: true                
            },
            notes: {
                required: true                
            }
        },
        messages: {
            q1: {
                required: "Select enter years"
            },
           q2: {
                required: "Select a option"
            },
           q3: {
                required: "Select a option"
            },
           q4: {
                required: "Select a option"
            },
           q5: {
                required: "Select a option"
            },
           notes: {
                required: "Please enter notes."
            },
           
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        },
        submitHandler: function(form) {
            $('#submit_ref').html("Processing...");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>site/landing/save_reference_request_html/<?php echo $company_id;?>",
                dataType: "json",
                timeout: 500000,
                data: $('#reference-form').serialize(),
                success: function(json) {  $('#submit_ref').html('Submit');
                    if (json.status == '1') {
                        swal({
                            title: "Success",
                            text: json.message,
                            type: "success"
                        }, function() {
                            window.location.href = '<?php echo base_url();?>';
                        });
                        return false;
                    } else if (json.status == '2') {
                        swal({
                                title: "Opps",
                                text: json.message,
                                type: "error"
                            }, function() {
                                 $('#submit_ref').html('Submit');
                            }

                        );
                    }
                }
            });
        }
    });
});


</script>
<?php $this->load->view('site/common/footer');?>