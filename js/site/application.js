(function ($, W, D) {
	var JQUERY4U = {};

	JQUERY4U.UTIL =
	{
		setupFormValidation: function () {


			function getWordCount(wordString) {
				var words = wordString.split(" ");
				words = words.filter(function (words) {
					return words.length > 0
				}).length;
				return words;
			}

			//add the custom validation method
			jQuery.validator.addMethod("wordCount",
				function (value, element, params) {
					var count = getWordCount(value);
					if (count <= params[0]) {
						return true;
					}
				},
				jQuery.validator.format("Maximum word limit is {0} words.")
			)
			$.validator.addMethod('validUrl', function (value, element) {
				var url = $.validator.methods.url.bind(this);
				return url(value, element) || url('http://' + value, element);
			}, 'Please enter a valid URL');

			$.validator.addMethod('noemail', function (value) {
				return /^([\w-.]+@(?!gmail\.com)(?!yahoo\.com)(?!hotmail\.com)(?!mail\.ru)(?!yandex\.ru)(?!mail\.com)([\w-]+.)+[\w-]{2,4})?$/.test(value);
			}, 'Free email addresses are not allowed.');

			$("#member_registeration_form").validate({
				rules: {
					initial: {
						required: true
					},
					name: {
						required: true
					},
					fname: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					mobile: {
						required: true,
						number: true
					},
					dob: {
						required: true,

					},
					nationality: {
						required: true
					},

					aadhar_number: {
						required: true,
						maxlength: 14,
						minlength: 14
					},
					community: {
						required: true

					},
					'door_no[]': {
						required: true
					},
					'street[]': {
						required: true
					},
					'state[]': {
						required: true
					},
					'district[]': {
						required: true
					},
					marksheet_sslc: {
						required: true
					},
					marksheet_other1: {
						required: true
					},
					marksheet_other2: {
						required: true
					},
					marksheet_other3: {
						required: true
					},
					marksheet_shorthand: {
						required: true
					},
					marksheet_typewriting: {
						required: true
					},
					marksheet_pg: {
						required: true
					},
					marksheet_ug: {
						required: true
					},
					marksheet_diploma: {
						required: true
					},
					marksheet_p12: {
						required: true
					},
					marksheet_iti: {
						required: true
					},


				},
				messages: {
					initial: {
						required: "Please enter initial"
					},
					name: {
						required: "Please enter name"
					},
					fname: {
						required: "Please enter father name"
					},
					email: {
						required: "Please enter contact email",
						remote: "Already exist."
					},
					mobile: {
						required: "Please enter mobile"
					},
					dob: {
						required: "Please choose dob"
					},
					nationality: {
						required: "Please enter nationality"
					},
					aadhar_number: {
						required: "Please enter adar card number"
					},
					community: {
						required: "Please choose community"
					},
					'door_no[]': {
						required: "Please enter door number"
					},

					'street[]': {
						required: "Please enter street"
					},

					'state[]': {
						required: "Please choose state"
					},

					'district[]': {
						required: "Please enter district"
					},
					marksheet_sslc: {
						required: "Please enter your marksheet number"
					},
					marksheet_other1: {
						required: "Please enter your marksheet number"
					},
					marksheet_other2: {
						required: "Please enter your marksheet number"
					},
					marksheet_other3: {
						required: "Please enter your  marksheet number"
					},
					marksheet_shorthand: {
						required: "Please enter your Shorthand marksheet number"
					},
					marksheet_typewriting: {
						required: "Please enter your Typewriting marksheet number"
					},
					marksheet_pg: {
						required: "Please enter your PG marksheet number"
					},
					marksheet_ug: {
						required: "Please enter your UG marksheet number"
					},
					marksheet_diploma: {
						required: "Please enter your Diploma marksheet number"
					},
					marksheet_p12: {
						required: "Please enter your +2 marksheet number"
					},
					marksheet_iti: {
						required: "Please enter your ITI marksheet number"
					},



				},


				submitHandler: function (form) {
					var tab_view = $("#tab_view").val();
					if (tab_view == "1") {

						var post_age = parseInt($('option:selected', $("#post_id")).attr('data-age'));
						var post_name = $('option:selected', $("#post_id")).text();
						var age = parseInt($('input[name=age]').attr('data-age'));

						var valid_flag = true;
						if ($('input[name="priorty_status"]:checked').val() == "Yes") {
							if ($("input[name=priority_category]").val() != "") {
								var dob = $("#dob").val();
								var priority_post_id = $('option:selected', $("select[name=priority_category]")).attr('data-id');
								$.get(baseurl + "site/landing/check_age?priority=" + priority_post_id + "&dob=" + dob, function (data) {
									var data = JSON.parse(data);
									if (data.status == 0) {
										$("html, body").animate({ scrollTop: 0 }, "slow");
										swal('Error', data.message, 'error');
										valid_flag = false;
										return false;
									}

								});

							}
							else {
								swal('Error', "Please select priority catgory", 'error');
								valid_flag = false;
								return false;
							}
						}
						else {
							if (post_age < age) {
								swal('Error', post_name + " position age limit is " + post_age, 'error');
								valid_flag = false;
								return false;
							}
						}
						var phone = $("input[name=mobile]").val();
						var post_id = $("#post_id").val();
						$.get(baseurl + "site/landing/check_phone_exist?phone=" + phone + '&post_id=' + post_id, function (data) {
							var data = JSON.parse(data);
							if (data.status == "0") {
								$("html, body").animate({ scrollTop: 0 }, "slow");
								swal('Error', "Mobile number is already exist", 'error');
								valid_flag = false;
								return false;
							}
							if (valid_flag == true) {
								$("#tab_view").val('2');
								$(".t2").addClass('active');
								$("#personal_tab").hide();
								$("#qualification_tab").hide();
								$("#preview_tab").hide();
								$("#address_tab").show();
								$(".backbtn").show();
								$("html, body").animate({ scrollTop: 0 }, "slow");
								return false;
							}


						});


					}
					else if (tab_view == "2") {
						$("#tab_view").val('3');
						$(".t3").addClass('active');
						$("#personal_tab").hide();
						$("#address_tab").hide();
						$("#preview_tab").hide();
						$(".backbtn").show();
						$("#qualification_tab").show();
						$("html, body").animate({ scrollTop: 0 }, "slow");
						return false;
					}


					else {

						var formData = new FormData($('#member_registeration_form')[0]);
						formData.append('photo_file', $('#mem_image')[0].files[0]);
						formData.append('signature_file', $('#mem_signature')[0].files[0]);
						$("#register_signup_btn").html("Processing...");
						$.ajax(
							{
								type: "POST",
								url: baseurl + 'site/landing/save_registration',
								dataType: "json",
								contentType: false,
								processData: false,
								data: formData,
								success: function (data) {
									$("#register_signup_btn").html("Next");

									if (data['status'] == 1) {
										$("#preview_tab").html(data['ajax_confirm']);

										$("#register_signup_btn").hide();
										$("#confirm_btn").show();
										$("#tab_view").val('4');
										$(".t4").addClass('active');
										$("#personal_tab").hide();
										$("#address_tab").hide();
										$("#preview_tab").show();
										$(".backbtn").show();
										$("#qualification_tab").hide();
										$("html, body").animate({ scrollTop: 0 }, "slow");
										return false;
									}
									else if (data['status'] == 2) {
										swal('Oops', data['message'], 'error');
									}
									else {
										swal('Oops', data['message'], 'error');
									}
								}
							});
					}
				}
			});

		}
	}

	//when the dom has loaded setup form validation rules
	$(D).ready(function ($) {
		JQUERY4U.UTIL.setupFormValidation();
	});

})(jQuery, window, document);


$("#find_application").validate({
				rules: {
					mobile: {
						required: true,
						number: true
					},
					email: {
						required: true,
						email:true
					},
					aadhar_number: {
						required: true
					},

				},
				messages: {
					mobile: {
						required: "Please enter your register mobile number",
					},
					email: {
						required: "Please enter your register email",
					},
					aadhar_number: {
						required: "Please enter your register aadhar number",
					},
				},


				submitHandler: function (form) {
					$("#find_application_bt").html("Processing...");
					var formData = new FormData($('#find_application')[0]);
						$.ajax({
								type: "POST",
								url: baseurl + 'site/landing/get_application',
								dataType: "json",
								contentType: false,
								processData: false,
								data: formData,
								success: function (data) {
									$("#find_application_bt").html("Submit");
									if (data['status'] == 1) {
										$("#preview_application").html(data['message']);
									}
									else if (data['status'] == 2) {
										swal('Oops', data['message'], 'error');
									}
									else {
										swal('Oops', data['message'], 'error');
									}
								}
							});
				}
			});

$(document).on("click", '.bt_find_application_new', function(event) { 
    
	var id = $(this).attr("data-id");
	
	if(id != "")
	{
		$("#new_id").val(id);
		$("#new_mobile").val($("#mobile").val());
		$("#new_email").val($("#email").val());
		$("#new_aadhar_number").val($("#adarcard").val());
		$("#new_form").submit();
	}
	
	
	
	
});


