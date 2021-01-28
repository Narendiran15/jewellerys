<?php $this->load->view('site/common/header.php'); ?>
<section>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-page-base">

<div class="container">

		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-page-inner">

				<div class="banner-innercaption">

						<h2> Contact</h2>

						<span>&nbsp;</span>

				   </div>

				   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-page-content">

						<div class="col-md-8 col-sm-8 col-xs-12 col-lg-8 contact-page-content-inner">

										<p> GLSN prides itself on its fast response to inquiries and other concerns.  

														Please contact GLSN in the most appropriate manner using any of the options below:</p>



										<p class="address-para"><b>For General &amp; Strategic matters</b><span>:</span><a class="ahover_email"  href="mailto:<?php echo $general_info->general_email; ?>" target="_top"><?php echo $general_info->general_email; ?></a></p>

										<p class="address-para"><b>For Accounting &amp; Administrative matters</b><span>:</span><a href="mailto:<?php echo $general_info->accounting_email; ?>" class="ahover_email"  target="_top"><?php echo $general_info->accounting_email; ?></a></p>

						</div>   

						 <form id="contact-form" method="post">
						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-page-input">

										<p>Alternatively, you can contact us using the following Quick Contact Form:</p>

										<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

														<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

																<label class="label-control">Name</label>

																<input type="text" class="app-input-control" name="name">

														</div>

														<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

																		<label class="label-control">Your Email</label>

																		<input name="email" type="text" class="app-input-control">

																</div>

														<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

																  <label class="label-control">Subject</label>

																   <input name="subject" type="text" class="app-input-control">

														</div>    

										</div>

										<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_common nopadd">

														<label class="label-control">Your Message to GLSN</label>

													   <textarea name="body" class="textarea-control"></textarea>

										</div>

										<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base margin-small">

														<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">

																<label class="label-control">Enter Capcha here</label>

																<input type="text" name="cid" class="app-input-control">

														</div>

														<div class="col-md-8 col-sm-8 col-xs-12 col-lg-8 captcha-container app_input_common">

																		<label class="label-control">&nbsp;</label>

																<div id="recaptcha"><?php echo $captcha;?></div>    

																<a href="javascript:void(0);" class="captcha_reload_icon">Get a new code</a>  

														 </div>

														 

										</div>

										<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-left margin-small">

														<a href="javascript:void(0);" class="themebtn" id="load_btn">SUBMIT</a>

										 </div>





						</div>
						</form>
				   </div>

		</div>

</div>

</div>

</section>
<?php $this->load->view('site/common/footer.php'); ?>

	<script>
	
	$(document).ready(function() {
    $.validator.addMethod("nameRegex", function(value, element) {
        return this.optional(element) || /^[a-z\- . ]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");
    $.validator.addMethod("number", function(value, element) {
        return this.optional(element) || /^[0-9\-( ) + ]+$/i.test(value);
    }, "For Eg:1234567890, this field allows numbers,+,hyphen,(),single space only.");
    $("#contact-form").validate({
        errorElement: "label",
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            email: {
                required: true,
                email: true
            },
            job_title: {
                required: true
            },
            company_name: {
                required: true
            },
            city: {
                required: true
            },
            country: {
                required:true
            },
            phone: {
                required:true
            },
            fax: {
                required: true,
                
            },            
            cid: {
                required: true,
                
            },
            body: {
                required: true,
				maxlength:1000
                
            }
        },
		
        messages: {
             bestway: {
                required: "Please select best way to contact you."
            },
            name: {
                required: "Please enter name"
            },
            company_name: {
                required: "Please enter company name"
            },
            job_title: {
                required: "Please enter job title"
            },
            email: {
                required: "Please enter email"
            },
            phone: {
                required: "Please enter phone"
            },
            fax: {
                required: "Please enter fax"
            },
            cid: {
                required: "Please enter captcha."
            },
            country: {
                required: "Please enter country."
            },
            city: {
                required: "Please enter city."
            },
            cid: {
                required: "Please enter captcha."
            },
            body: {
                required: "Please enter message",
                minlength: "Minimum 3 characters long",
                maxlength: "Maximum 1000 characters long"
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        },
        submitHandler: function(form) {
			
            $('#load_btn').html('Processing...');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>site/landing/save_contactus",
                dataType: "json",
                timeout: 500000,
                data: $('#contact-form').serialize(),
                success: function(json) {
					$('#load_btn').html("Submit");
                    if (json.result == '1') {
                        swal({
                            title: "Success",
                            text: 'Your enquiry sent successfully...',
                            type: "success"
                        }, function() {
                            location.href = '<?php echo base_url();?>';
                        });
                        return false;
                    } else if (json.result == '0') {
                        swal({
                                title: "Error",
                                text: "System Busy try later",
                                type: "error"
                            }, function() {
                                location.href = '<?php echo base_url();?>';
                            }

                        );
                    }
					else{
						swal({
                                title: "Opps",
                                text: "Captcha is wrong...",
                                type: "error"
                            }, function() {
                                /* location.href = '<?php echo base_url();?>'; */
                            }

                        );
					}
                }
            });
        }
    });
});
$(document).on("click","#load_btn",function(){
	$("#contact-form").submit();
})
$(".captcha_reload_icon").click(function(){
	
	$(".captcha_reload_icon").toggleClass("rotated");
	$("#recaptcha").hide(1000);
	$.post(baseurl+'site/landing/ajax_captcha_contact',{},function(data){
		$("#recaptcha").html(data);
		$("#recaptcha").show(1000);
	})
})
	</script>
