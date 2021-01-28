<?php $this->load->view('site/common/header');	?>
		<section>
		<div class="clearfix"></div>
			<div class="contact_us_base changepassword" id="changepassword">
                     <div class="container">
                            <div class="contact_detail_inner col-md-12 col-sm-12 col-xs-12 text-center">
                                    <h1>Change Password</h1>
                                    <div class="contact_fields">
                                                    <form id="changepassword-form" action="#" method="post">
                                                <div class="col-md-6 col-sm-12 col-xs-12 contact_text">
                                                        <input type="password" placeholder="Password" name="password" id="cfpassword" class="error app-input-control">
														<label for="cfpassword" generated="true" class="error"></label>
                                                </div>
                                                 <div class="col-md-6 col-sm-12 col-xs-12 contact_text">
                                                      <input type="hidden" placeholder="Confirm Password" name="password_link"  value="<?php echo $password_link;?>">
                                                      <input type="password" placeholder="Confirm Password" name="confirm_password"  class="error app-input-control"><label for="confirm_password" generated="true" class="error"></label>
                                                </div>
                                                 
                                                 <div class="col-md-12 col-sm-12 col-xs-12 contact_text">
														<input type="hidden" name="cid" value="<?php echo $csession_id;?>"/>	
                                                        <button id="change_password_btn" data-text="Save" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Wait Processing..." class="submit_btn contact_btn themebtn" type="submit"> Change</button>	<br/>
                                                </div>
												  <div class="col-md-12 col-sm-12 col-xs-12 contact_text"></div>
                                                    </form>
                                    </div>
                            </div>
                     </div>   
			</div>
			<div class="clearfix"></div>
			
	</section>
	<script>
	$(document).ready(function() {
    $.validator.addMethod("nameRegex", function(value, element) {
        return this.optional(element) || /^[a-z\- . ]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");
    $.validator.addMethod("number", function(value, element) {
        return this.optional(element) || /^[0-9\-( ) + ]+$/i.test(value);
    }, "For Eg:1234567890, this field allows numbers,+,hyphen,(),single space only.");
    $("#changepassword-form").validate({
        errorElement: "label",
        rules: {
            password: {
                required: true,
                minlength: 6,
                maxlength: 50
            },
            confirm_password: {
                required: true,
				equalTo : "#cfpassword"
            }
        },
        messages: {
            password: {
                required: "Enter your password",
                minlength: "Minimum 6 characters long",
                maxlength: "can not be more than 50 characters"
            },
            confirm_password: {
                required: "Enter your confirm password",
                minlength: "Minimum 6 characters long",
                maxlength: "can not be more than 50 characters"
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        },
        submitHandler: function(form) {
            $('#change_password_btn').html($('#change_password_btn').attr('data-loading-text'));
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>site/landing/save_password",
                dataType: "json",
                timeout: 500000,
                data: $('#changepassword-form').serialize(),
                success: function(json) {
					$('#change_password_btn').html($('#change_password_btn').attr('data-text'));
                    if (json.status == '1') {
                        swal({
                            title: "Success",
                            text: "Your password successfully changed...",
                            type: "success"
                        }, function() {
                            location.href = '<?php echo base_url();?>';
                        });
                        return false;
                    } else if (json.status == '0') {
                        swal({
                                title: "Opps",
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
                                text: "Something went to wrong...",
                                type: "error"
                            }, function() {
                                location.href = '<?php echo base_url();?>';
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