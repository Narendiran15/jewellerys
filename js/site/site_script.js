$('#support-sponsor').owlCarousel({
  loop:true,
  autoplay:true,
  margin:10,
  nav:true,
  navText:['<img src="'+baseurl+'images/left-arrow.png">','<img src="'+baseurl+'images/right-arrow.png">'],
  dots:false,
  responsive:{
	  0:{
		  items:1
	  },
	  600:{
		  items:3
	  },
	  1000:{
		  items:4
	  }
  }
})

$(document).ready(function()
{
		             $("#whatsappgroup_form").validate({				     
				 
                rules: {					 
                 	 
                    name: {
                        required: true				
                    },
					company: {
                        required: true				
                    }
				   },
                messages: {
                    
                    name: {
						required: "Please enter your name "									
					},
					company: {
						required: "Please enter your company "									
					}
					},
                submitHandler: function(form) {
                    $("#whatsappgroup_btn").html("Proceesing...");
                    
					$.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/save_whatsappgroup',
							dataType: "json",
							data: $('#whatsappgroup_form').serialize(),
							success: function(data)
							{ 
								$("#whatsappgroup_btn").html("Join Now");
								if (data['status'] == 0)
								{
								  swal({title: "Error", text: "Email already exist", type: "error"},
								   function(){ 
										   
									   }
									);
								}
								else if (data['status'] == 2)
								{
								  swal({title: "Error", text: "Something went to wrong", type: "error"},
								   function(){ 
										  
									   }
									);
								}
								else
								{
								   
								   swal({title: "Success", text: data["message"], type: "success"},
								   function(){ 
										 window.location.reload();
										  
									   }
									);
								}
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });
		
		$("#press_release_form").validate({
			rules: {
				post_date: {
					required: true
				},
				title: {
					required: true
				},				
				overview: {
					required: true
				},
				content: {
					required: true
				},				
				submitted_by: {
					required: true
				},				
				submitter_email: {
					required: true,
					email:true
				}
			   },
			messages: {
				post_date: {
					required: "Please enter release date"
				}, 
				title: {
					required: "Please enter title"
				}, 
				overview: {
					required: "Please enter introduction"
				}, 
				content: {
					required: "Please enter press release"
				}, 
				submitted_by: {
					required: "Please enter your name"
				}, 
				submitter_email: {
					required: "Please enter your email",
					email: "Please enter valid email address"
				}
				
				},
			submitHandler: function(form) {
				$('#submit_press_release_btn').html($('#submit_press_release_btn').attr('data-loading-text'));
				$.ajax(
					{
						type: "POST",
						url: baseurl+'site/landing/save_press_release',
						dataType: "json",
						data: $('#press_release_form').serialize(),
						success: function(data)
						{ 
							$('#submit_press_release_btn').html("Submit for Approval");
							if (data['status'] == 1)
							{
							   swal({title: "Success", text: "Your submission has been received and will be reviewed by our Trans-Directory team which can take up to 24 hours.  You will be notified upon acceptance", type: "success"},
							   function(){ 						   	
									 window.location.href=baseurl;
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
        
		
		function getWordCount(wordString) {
		  var words = wordString.split(" ");
		  words = words.filter(function(words) { 
			return words.length > 0
		  }).length;
		  return words;
		}

		//add the custom validation method
		jQuery.validator.addMethod("wordCount",
		   function(value, element, params) {
			  var count = getWordCount(value);
			  if(count <= params[0]) {
				 return true;
			  }
		   },
		   jQuery.validator.format("Maximum word limit is {0} words.")
		)
		 $.validator.addMethod('validUrl', function(value, element) {
			var url = $.validator.methods.url.bind(this);
			return url(value, element) || url('http://' + value, element);
		  }, 'Please enter a valid URL');
   		$("#add_listing_form").validate({
			rules: {
				company: {
					required: true
				},
				address: {
					required: true
				},				
				city: {
					required: true
				},
				country: {
					required: true
				},				
				contact: {
					required: true
				},				
				title: {
					required: true
				},				
				year: {
					required: true
				},				
				employees: {
					required: true
				},
				overview: {
					required: true,
					wordCount: ['50']
				},				
				"cat_id[]": {
					required: true
				},				
				email: {
					required: true,
					email:true
				},
				website:{
					validUrl:true
				}
			   },
			messages: {
				company: {
					required: "Please enter company name"
				}, 
				address: {
					required: "Please enter address"
				}, 
				city: {
					required: "Please enter city"
				}, 
				country: {
					required: "Please enter press country"
				}, 
				contact: {
					required: "Please enter contact name"
				}, 
				title: {
					required: "Please enter title"
				}, 
				year: {
					required: "Please enter year company established"
				}, 
				employees: {
					required: "Please enter total number of employees"
				}, 
				overview: {
					required: "Please enter overview of company"
				}, 
				"cat_id[]": {
					required: "Please select services offered"
				}, 
				email: {
					required: "Please enter your email",
					email: "Please enter valid email address"
				}
				
				}/* ,
			submitHandler: function(form) {
				$('#add_listing_btn').html($('#add_listing_btn').attr('data-loading-text'));
				var formData = new FormData($('#add_listing_form')[0]);
				formData.append('logo', $('input[type=file]')[0].files[0]);
				$.ajax(
					{
						type: "POST",
						url: baseurl+'site/landing/save_listing',
						dataType: "json",
						async: false,
						cache: false,
						contentType: false,
						processData: false,
						data: $('#add_listing_form').serialize(),
						success: function(data)
						{ 
							$('#add_listing_btn').html("Submit for Approval");
							if (data['status'] == 1)
							{
							   swal({title: "Success", text: "Successfully your listing saved, Waiting for admin approval, If paid listing getting invoice with in two days.", type: "success"},
							   function(){ 						   	
									 window.location.href=baseurl+"my_listing";
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
			} */
		});
		
		$("#edit_listing_form").validate({
			rules: {
				company: {
					required: true
				},
				address: {
					required: true
				},				
				city: {
					required: true
				},
				country: {
					required: true
				},				
				contact: {
					required: true
				},				
				title: {
					required: true
				},				
				year: {
					required: true
				},				
				employees: {
					required: true
				},
				overview: {
					required: true,
					wordCount: ['50']
				},				
				"cat_id[]": {
					required: true
				},				
				email: {
					required: true,
					email:true
				},
				website:{
					validUrl:true
				}
			   },
			messages: {
				company: {
					required: "Please enter company name"
				}, 
				address: {
					required: "Please enter address"
				}, 
				city: {
					required: "Please enter city"
				}, 
				country: {
					required: "Please enter press country"
				}, 
				contact: {
					required: "Please enter contact name"
				}, 
				title: {
					required: "Please enter title"
				}, 
				year: {
					required: "Please enter year company established"
				}, 
				employees: {
					required: "Please enter total number of employees"
				}, 
				overview: {
					required: "Please enter overview of company"
				}, 
				"cat_id[]": {
					required: "Please select services offered"
				}, 
				email: {
					required: "Please enter your email",
					email: "Please enter valid email address"
				}
				
				}/* ,
			submitHandler: function(form) {
				$('#edit_listing_btn').html($('#edit_listing_btn').attr('data-loading-text'));
				$.ajax(
					{
						type: "POST",
						url: baseurl+'site/landing/save_edit_listing',
						dataType: "json",
						data: $('#edit_listing_form').serialize(),
						success: function(data)
						{ 
							$('#edit_listing_btn').html("Submit");
							if (data['status'] == 1)
							{
							   swal({title: "Success", text: "Successfully your listing saved.", type: "success"},
							   function(){ 						   	
									 window.location.href=baseurl+"my_listing";
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
			} */
		})
        
   

   

});

$(document).on('click',"#submit_press_release_btn",function(){
	$("#press_release_form").submit();
})
$(document).on('click',"#add_listing_btn",function(){
	$("#add_listing_form").submit();
})
$(document).on('click',"#edit_listing_btn",function(){
	$("#edit_listing_form").submit();
})
$(document).on('click',"#save_profile_tab_btn",function(){ 
	$("#account_form").submit();
})
$(document).on('click',"#clear_all_fields",function(){
	document.getElementById("add_listing_form").reset();
})
$(document).on('click',"#load_more_press_btn",function(){
	var pageno=$("#press_hidden_page").val();
	$("#press_hidden_page").val(parseInt(pageno)+1);
	$('#load_more_press_btn').html('<img src="'+baseurl+'images/site/loadspin.gif" width="50">');
				
	$.post(baseurl+"site/landing/load_press_release",{'page':pageno},function(data){
		var data=JSON.parse(data); console.log(data);
		if(data['status']==1){ 
		    $('#load_more_press_btn').html('Load More');
			$("#load_ajax_html").append(data.html);
		}
		else{
			$("#load_more_press_btn").hide();
		}
	})
})
$(document).ready(function(){
	            
            $("#login_form").validate({
                rules: {
                    login_email: {
                        required: true,
                       
					},
                    login_password: {
                        required: true
                    }
				   },
                messages: {
                    login_password: {
                        required: "Please enter password"
                    },
                    login_email: {
						required: "Please enter email",
						email:"Please enter valid email"
					}
					},
                submitHandler: function(form) {
					 $('#loginbtn_submit').html($('#loginbtn_submit').attr('data-loading-text'));
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/login_process',
							dataType: "json",
							data: $('#login_form').serialize(),
							success: function(data)
							{ 
							   $('#loginbtn_submit').html($('#loginbtn_submit').attr('data-text'));
								if (data['status'] == 1)
								{
								  if(data['redirecturl']==''){	
										   location.href=baseurl;}else{
											   location.href=data['redirecturl'];
									}								  
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
 $("#register_form").validate({				     
	 
	rules: {
		 
		username: {required:true },
					 
		email: {
			required: true,
			email: true,
			remote:
			{
			  url: baseurl+'site/landing/check_email',
			  type: "post",
			  data:
			  {
				  email: function()
				  {
					  return $('#register_form :input[name="email"]').val();
				  }
			  }
			}
		},
		password: {
			required: true,
			minlength: 5
		}
	   },
	messages: {
		 username: {
			required: "Please enter name"
		},
		password: {
			required: "Please enter password",
			pwcheck: "Please enter strong password",
			minlength: "Password must be 5 characters long."
		},
		email: {
			required: "Please enter email",
			email:"Please enter valid email",
			remote:"You have an existing listing associated with this email address. Please <a href='#'     onclick='loginpopup_open();'>login</a>"
		}
		},
	submitHandler: function(form) { 
		 $('#signup_submit_btn').html($('#signup_submit_btn').attr('data-loading-text'));
		$.ajax(
			{
				type: "POST",
				url: baseurl+'site/landing/signup_process',
				dataType: "json",
				data: $('#register_form').serialize(),
				success: function(data)
				{   $('#signup_submit_btn').html($('#signup_submit_btn').attr('data-text'));
					if (data['status'] == 0)
					{
					  swal({title: "Error", text: "Email address already exist.", type: "error"},
					   function(){ 
							   location.reload();
						   }
						);
					}
					else
					{
					   
					   swal({title: "Success", text: "Successfully account signed up", type: "success"},
					   function(){ 
							  
							   location.href=baseurl;
						   }
						);
					}
				},
				error: function(xhr, textStatus, errorThrown)
				{
					alert('ajax loading error... ... '+url + query);
					return false;
				}
			});
	}
});
$("#account_form").validate({				     
	 
	rules: {
		 
		username: {required:true },
					 
		email: {
			required: true,
			email: true,
			remote:
			{
			  url: baseurl+'site/landing/check_email_account',
			  type: "post",
			  data:
			  {
				  email: function()
				  {
					  return $('#account_form :input[name="email"]').val();
				  }
			  }
			}
		},
		password: {
			minlength: 5
		}
	   },
	messages: {
		 username: {
			required: "Please enter name"
		},
		password: {
			required: "Please enter password",
			pwcheck: "Please enter strong password",
			minlength: "Password must be 5 characters long."
		},
		email: {
			required: "Please enter email",
			email:"Please enter valid email",
			remote:"Already email exist."
		}
		},
	submitHandler: function(form) { 
		 $('#save_profile_tab_btn').html($('#save_profile_tab_btn').attr('data-loading-text'));
		$.ajax(
			{
				type: "POST",
				url: baseurl+'site/landing/save_profile_tab',
				dataType: "json",
				data: $('#account_form').serialize(),
				success: function(data)
				{   $('#save_profile_tab_btn').html($('#save_profile_tab_btn').attr('data-text'));
					if (data['status'] == 0)
					{
					  swal({title: "Error", text: "Email address already exist.", type: "error"},
					   function(){ 
							   
						   }
						);
					}
					else
					{
					   
					   swal({title: "Success", text: "Successfully account saved.", type: "success"},
					   function(){ 
							  
							   location.href=baseurl+"my_account";
						   }
						);
					}
				},
				error: function(xhr, textStatus, errorThrown)
				{
					alert('ajax loading error... ... '+url + query);
					return false;
				}
			});
	}
});

$(document).on("click","#submit_search_btn",function(){
	$('#countrydrop').css('border','none');
	$('#services_list').css('border','none');
	if($('#countrydrop').val()==""){
		$('#countrydrop').css('border','1px solid red'); return false;
	}else if($('#services_list').val()==""){
		$('#services_list').css('border','1px solid red'); return false;
	}
	else{
		$("#search_form").submit();
	}
})
function load_search(){
   var citylist = $('input[name=city_list]:checked').map(function()
	{   console.log($(this).val());
		return $(this).val();
	}).get();
	var pageno=$("#press_hidden_page_search").val();
	/*$("#press_hidden_page_search").val(parseInt(pageno)+1);*/
	$('#load_more_press_btn_search').html('<img src="'+baseurl+'images/site/loadspin.gif" width="50">');
	$.post(baseurl+"site/landing/ajax_search",{"name_text":$("#name_text").val(),"citylist":citylist,"page":$("#press_hidden_page_search").val(),"country":$("#country_id").val(),"service":$("#service_id").val(),"iata":$(".search_iata").val()},function(data){
		var data=JSON.parse(data);
		if(data.status==1){
			$('#load_more_press_btn_search').html('Load More');
			$("#ajax_search_results").html(data.html);
			$("#total_listing").html(data.total_listing);
		}
		else{
			$("#load_more_press_btn_search").hide();
            $("#ajax_search_results").html(data.html);			
            $("#total_listing").html(data.total_listing);			
		}
	})
}
function load_search_more(){
   var citylist = $('input[name=city_list]:checked').map(function()
	{   console.log($(this).val());
		return $(this).val();
	}).get();
	var pageno=$("#press_hidden_page_search").val();
	/*$("#press_hidden_page_search").val(parseInt(pageno)+1);*/
	$('#load_more_press_btn_search').html('<img src="'+baseurl+'images/site/loadspin.gif" width="50">');
	$.post(baseurl+"site/landing/ajax_search",{"name_text":$("#name_text").val(),"citylist":citylist,"page":$("#press_hidden_page_search").val(),"country":$("#country_id").val(),"service":$("#service_id").val(),"iata":$(".search_iata").val()},function(data){
		var data=JSON.parse(data);
		if(data.status==1){
			$('#load_more_press_btn_search').html('Load More');
			$("#ajax_search_results").append(data.html);
			 $("#total_listing").html(data.total_listing);	
		}
		else{
			$("#load_more_press_btn_search").hide();		
		}
	})
}
function load_search_new(){
   var citylist = $('input[name=city_list]:checked').map(function()
	{   return $(this).val();
	}).get();
	$("#press_hidden_page_search").val(0);
	$("#load_more_press_btn_search").show();
	$('#load_more_press_btn_search').html('<img src="'+baseurl+'images/site/loadspin.gif" width="50">');
	$.post(baseurl+"site/landing/ajax_search",{"name_text":$("#name_text").val(),"citylist":citylist,"page":$("#press_hidden_page_search").val(),"country":$("#country_id").val(),"service":$("#service_id").val(),"iata":$(".search_iata").val()},function(data){
		var data=JSON.parse(data);
		if(data.status==1){
			$('#load_more_press_btn_search').html('Load More');
			$("#ajax_search_results").html(data.html);
			 $("#total_listing").html(data.total_listing);	
		}
		else{
			$("#load_more_press_btn_search").hide();
			$("#ajax_search_results").html(data.html);	
			 $("#total_listing").html(data.total_listing);	
		}
	})
}
function maxAllowedMultiselect(obj, maxAllowedCount) {
	var selectedOptions = jQuery('#'+obj.id+" option[value!=\'\']:selected");
	if (selectedOptions.length >= maxAllowedCount) {
		if (selectedOptions.length > maxAllowedCount) {
			selectedOptions.each(function(i) {
				if (i >= maxAllowedCount) {
					jQuery(this).prop("selected",false);
				}
			});
		}
		jQuery('#'+obj.id+' option[value!=\'\']').not(':selected').prop("disabled",true);
	} else {
		jQuery('#'+obj.id+' option[value!=\'\']').prop("disabled",false);
	}
}
$(document).on("click",".show_more_desc",function(){ 
	if($(this).attr("data-type")==0){
	$(this).siblings(".desc_short").hide();
	$(this).siblings(".desc_full").show();
	$(this).text("Less");
	$(this).attr("data-type","1");
	}
	else{
	$(this).siblings(".desc_full").hide();	
	$(this).siblings(".desc_short").show();
	$(this).text("More");
    $(this).attr("data-type","0");	
	}
})

$(document).on("click","#load_more_press_btn_search",function(){
	var pageno=$("#press_hidden_page_search").val();
	$("#press_hidden_page_search").val(parseInt(pageno)+1);
	load_search_more();
})

$(document).on("click",".password-btn",function(){
	if($(".show_pwd_contanier").attr("type")=="password"){
	  $(".show_pwd_contanier").attr("type","text");
	}
	else{
	  $(".show_pwd_contanier").attr("type","password");	
	}
	
})

$(document).ready(function(){	
             $("#newsletter_form").validate({				     
				 
                rules: {					 
                 	 
                    email: {
                        required: true,
                        email: true						
                    }
				   },
                messages: {
                    
                    email: {
						required: "Please enter email ",
						email:"Please enter valid email id"						
					}
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/save_newsletter',
							dataType: "json",
							data: $('#newsletter_form').serialize(),
							success: function(data)
							{ 
								if (data['status'] == 0)
								{
								  swal({title: "Error", text: "Email already exist", type: "error"},
								   function(){ 
										   
									   }
									);
								}
								else if (data['status'] == 2)
								{
								  swal({title: "Error", text: "Something went to wrong", type: "error"},
								   function(){ 
										  
									   }
									);
								}
								else
								{
								   
								   swal({title: "Success", text: "Newsletter added successfully.", type: "success"},
								   function(){ 
										 $('#newsletter_email').val(""); 
										  
									   }
									);
								}
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });

           $("#forgot-form").validate({
                rules: {
                    email: {
                        required: true,
						email:true
					}
				   },
                messages: {
                    
                    email: {
						required: "Please enter email ",
						email:"Please enter valid email id"		
					}
					},
                submitHandler: function(form) {
					 $('#forgot_btn').html($('#forgot_btn').attr('data-loading-text'));
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/send_forgot_password',
							dataType: "json",
							data: $('#forgot-form').serialize(),
							success: function(data)
							{  $('#forgot_btn').html($('#forgot_btn').attr('data-text'));
								if (data['status'] == 1)
								{
								   swal({title: "success", text: "Password rest link sent successfully. Check your mail.", type: "success"},
								   function(){ 
										  location.href=baseurl;
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

$(document).on("click",".get_contact_popup",function(){
	document.getElementById("send_message_form").reset();
	var user_id=$(this).attr("data-id");
	$("#user_id_msg").val(user_id);
	$("#search_contact_modal").modal("show");
})

function preview_image(event,item,fileid) 
{ 
  var files=document.getElementById(fileid).files[0];	
	
		  var file = file = files;
		  console.log(files);
		   if(event.files[0].type != "image/jpeg" && event.files[0].type != "image/png"){
		  
			 $("#"+fileid).val("");
			 $('#'+item).attr('src', $('#'+item).attr("data-url"));
			 swal("Error","File type not support upload only images");  return false;
			 		  }
		  else{
			 if (event.files && event.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
				    var ext = event.files[0].name.split('.').pop();
				   if(ext=="pdf"){
					   $('#'+item).attr('src',baseurl+"images/site/pdf.jpg");
				   }else if(ext=="docx" || ext=="doc"){
					   $('#'+item).attr('src',baseurl+"images/site/word.jpg");
				   } else{
					   $('#'+item).attr('src', e.target.result);
				   }	
				  
				}

				reader.readAsDataURL(event.files[0]);
			  }
		  }		 
	
}

$(document).on("change","#type_drop",function(){
	var val=$(this).val();
	if(parseInt(val)<4){
		$(".photo_div_container").attr("id","photo_div_hide")
	}
	else{
		$(".photo_div_container").attr("id","photo_div")
	}
})

function loginpopup_open(){
	$("#loginbtn").click();
}
$(function() {

	if (localStorage.chkbx_student && localStorage.chkbx_student != '') {

		$('#remember_student').attr('checked', 'checked'); 
		$('#login_form input[name=login_email]').val(localStorage.glsn_login_email);

		$('#login_form input[name=login_password]').val(localStorage.glsn_login_password);

	} else {

		$('#remember_student').removeAttr('checked');

		$('#login_form input[name=login_email]').val('');

		$('#login_form input[name=login_password]').val('');

	}

$('#remember_student').click(function() {

	if ($('#remember_student').is(':checked')) {

		localStorage.glsn_login_email = $('#login_form input[name=login_email]').val();

		localStorage.glsn_login_password = $('#login_form input[name=login_password]').val();

		localStorage.chkbx_student = $('#remember_student').val();

	} else {

		localStorage.glsn_login_email = '';

		localStorage.glsn_login_password = '';

		localStorage.chkbx_student = '';

	}

});

});
$(document).on("click","#loginbtn_submit",function(){
	if ($('#remember_student').is(':checked')) {

		localStorage.glsn_login_email = $('#login_form input[name=login_email]').val();

		localStorage.glsn_login_password = $('#login_form input[name=login_password]').val();

		localStorage.chkbx_student = $('#remember_student').val();

	} else {

		localStorage.glsn_login_email = '';

		localStorage.glsn_login_password = '';

		localStorage.chkbx_student = '';

	}
})