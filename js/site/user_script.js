	$(document).ready( function(){
	var margin_fixbottom = $('.bottom_next_continue ').height();
		$('.listing_base_inner').css('margin-bottom',margin_fixbottom+25);
	})

$(function(){

		$('.icon_menu').click(function(){
			$('.mobile_menu').stop().slideToggle(400,"swing");
			$('body').toggleClass('body_class');
		})
	
});

$(document).on("click","#phonenumber_add",function(){
	$('#add_verify_phone').stop().slideDown(400,"swing");
	$('#phonenumber_add').slideUp(400,"swing");
});
$(document).on("click","#lang_change",function(){
	$('#language_div').stop().slideToggle(400,"swing");
})
$(document).on("click",".close_phoneumber",function(){
	$('.phone_number_text').hide(100);
	$('.phoneaddbtn_hide').prop('style','display:inline-block!important;');
})


$(document).ready(function(){
if($("#search_autocomplete").length==1 && $(".hidesearchbar").length==0){
init_autocomplete();	
}
})

function init_autocomplete() {
	  autocomplete = new google.maps.places.Autocomplete(
		 (document.getElementById('search_autocomplete')),
		  { types: ['geocode'] });
		google.maps.event.addListener(autocomplete, 'place_changed', function() {
			var data = $("#search_autocomplete").serialize();
			window.location.href=baseurl+"s?city="+ $("#search_autocomplete").val();
			return false;
		}
	  );
    
}

$(document).on("change","#country_dropdown",function(){
	var country_code=$(this).val();
	var ph_code= $('#country_dropdown option:selected').attr('data-phcode');
	$("#country_code_label").val(ph_code);
})
$(document).on("click","#verify_sms_btn",function(){
	var country_code=$("#country_dropdown").val();
	var phone_no=$("#phone_no").val();
	var ph_code= $('#country_dropdown option:selected').attr('data-phcode');
	if(country_code==""){
		$("#country_dropdown").focus();return false;
	}
	else if(phone_no==""){
		$("#phone_no").focus();return false;
	}
	else{
		 $.post(baseurl+"site/user/verify_phone",{"country_code":country_code,"phone_no":phone_no,"ph_code":ph_code},function(data){ 
	         var data=JSON.parse(data);
			 if(data.status==1){
				 $("#add_verify_phone").slideUp();
				 $("#verify_otp_tab").slideDown();
				 $("#phone_no").val("");
			 }
			 else if(data.status==2){
				  swal({title: "Oops!", text: "Try agin later.", type: "error"},
								   function(){						   	
										   
										   
									   }
									);
			 }
			 else{
				 window.location.href=baseurl;
			 }
	     });
	}
})

$(document).on("click","#verify_otp_btn",function(){
	var otp_text_box=$("#otp_text_box").val();
	if(otp_text_box==""){
		$("#otp_text_box").focus();return false;
	}
	else{
		 $.post(baseurl+"site/user/verify_otp",{"otp_text_box":otp_text_box},function(data){ 
	         var data=JSON.parse(data);
			 if(data.status==1){
				 $("#verify_otp_tab").slideUp();				 
				 $(".phone_num").html(data.phone_num);
				 $(".phone_number_text").slideDown();
				 $("#otp_text_box").val("");
			 }
			 else if(data.status==2){
				  swal({title: "Oops!", text: "Your otp is wrong.", type: "error"},
								   function(){						   	
										   
										   
									   }
									);
			 }
			 else{
				 window.location.href=baseurl;
			 }
	     });
	}
})

$(document).on("click","#save_language_btn",function(){
    var push_lang_array=[];
    var push_lang_array_key=[];
	$(".more_lang_save:checkbox:checked").each(function(i){
			push_lang_array.push($(this).val());
			push_lang_array_key.push($(this).attr("data-id"));
	}); 
	var li_append="";
	$.each(push_lang_array, function(i,value){
		li_append+='<li><h5>'+value+'<span class="close_list delete_lang" data-id="'+push_lang_array_key[i]+'">&nbsp;</span></h5></li>';
	});
	$("#append_language_list").html(li_append);
	$(".close_modal").click();
	$("#lang_list_values_comma").val(push_lang_array.join(","));
	
})
$(document).on("click",".delete_lang",function(){
	
   var dataval=$(this).attr("data-id");
   $(this).parent().parent('li').remove();
   $('.u_'+dataval).prop("checked",false);
    var push_lang_array=[];
    var push_lang_array_key=[];
	$(".more_lang_save:checkbox:checked").each(function(i){
			push_lang_array.push($(this).val());
			push_lang_array_key.push($(this).attr("data-id"));
	}); 
   $("#lang_list_values_comma").val(push_lang_array.join(","));
	
})
$(document).on("click","#save_profile",function(){
	$("#profile_edit_form").submit();
})



$(document).ready(function()
{
    
	$.validator.addMethod('dob', function(value, element, param) {
		  var day = $('#dobDay').val();
		  var month = $('#dobMonth').val();
		  var year = $('#dobYear').val();
		  var date = new Date(year, month - 1, day);
		  return this.optional(element) || !/Invalid|NaN/.test(date);
		}, 'Please enter a valid date of birth');

   
            $("#profile_edit_form").validate({
                rules: {
                    first_name: {
                        required: true
					},
                    last_name: {
                        required: true
                    },
                    dobDay: {
					  required: true,
					  dob: true
					},
					dobMonth: {
					  required: true,
					  dob: true
					},
					dobYear: {
					  required: true,
					  dob: true
					},
                     email: {
                        required: true,
                        email: true,
						remote:
						{
						  url: baseurl+'site/user/check_email_update',
						  type: "post",
						  data:
						  {
							  email: function()
							  {
								  return $('#profile_edit_form :input[name="email"]').val();
							  }
						  }
						}
                    },
                    where_live: {
                        required: true
                    },
                    about: {
                        required: true
                    }
				   },
                messages: {
                    first_name: {
                        required: "Please enter first name",
                        nameRegex: "First Name must be albhabets"
                    }, 
					last_name: {
                        required: "Please enter last name",
                        nameRegex: "Last Name must be albhabets"
                    },
					email: {
						required: "Please enter your email",
						email:"Please enter a valid email address",
						remote:"Already exist"
					},
					where_live:"Please enter where you live",					
					about:"Please enter about you",					
					dobDay:"Please choose a dob ",
					dobMonth:"Please choose a dob ",
					dobYear:"Please choose a dob "
					
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/save_profile',
							dataType: "json",
							data: $('#profile_edit_form').serialize(),
							success: function(data)
							{ 
								if (data['status'] == 1)
								{
								   swal({title: "Success", text: "Successfully your profile updated.", type: "success"},
								   function(){ 						   	
										 
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

$(document).on("change","#upload_prof_img",function(){ 
   $('#profile_photo_upload_form').submit();
})

$(document).ready(function(){
   if($('#profile_photo_upload_form').length==1){
   $('#profile_photo_upload_form').ajaxForm({
    beforeSubmit: function() {  
     var imgname  =  $('#upload_prof_img').val(); 
     var ext =  imgname.substr( (imgname.lastIndexOf('.') +1) );
     if(ext!='jpg' && ext!='jpeg' && ext!='png' && ext!='PNG' && ext!='JPG' && ext!='JPEG')
	 {
			swal("Oops","Plese choose image only","error"); return false;
	 }
	},
    beforeSend:function(){
       $('#prof_img_holder').hide();
	   $('#img_loader').show();
       
    },
    success: function(msg) { var msg=JSON.parse(msg);
	   $('#img_loader').hide();
	   $('#prof_img_holder').show();
       $('.profile_pic_img_ajax').attr("src",msg.img);	
        
    }
});
   }
if($("#append_phone_div_profile").length==1 || $("#append_phone_div_profile")==1){
	get_phonetab(1);
}
})

function get_phonetab(type){
	if(type==1){
		$("#append_phone_div_trust").html("");
		$.post(baseurl+"site/user/get_mobiletab",{},function(data){
			$("#append_phone_div_profile").html(data);
		})
		
	}
	else{
		$("#append_phone_div_profile").html("");
		$.post(baseurl+"site/user/get_mobiletab",{},function(data){
			$("#append_phone_div_trust").html(data);
		})
		
	}
}

$(document).on("click","#verify_mailid_btn",function(){
	
		 $.post(baseurl+"site/user/verification_mail",{},function(data){ 
	         var data=JSON.parse(data);
			 if(data.status==1){
				 swal("Success","Your email verfication link sent to your mail check it.","success");
			 }			
			 else{
				 window.location.href=baseurl;
			 }
	     });
	
})

$(document).on("change",".save_functionid",function(){   
   var colum_name=$(this).attr("name");   
   var colum_value=$(this).val();   
   $.post(baseurl+"site/user/save_user_info_ajax",{'colum_name':colum_name,'colum_value':colum_value},function(data){ }) 
});
  
$(document).on("click",".save_function_radioid",function(){   
   var colum_name=$(this).attr("name");   
   var colum_value=$(this).val();   
   $.post(baseurl+"site/user/save_user_info_ajax",{'colum_name':colum_name,'colum_value':colum_value},function(data){ }) 
});  
$(document).on("click",".save_function_checkboxid",function(){   
   var colum_name=$(this).attr("name");
   if($(this).is(":checked")){
	   var colum_value=1;  
   }
   else{
	   var colum_value=0; 
   }	
    
   $.post(baseurl+"site/user/save_user_info_ajax",{'colum_name':colum_name,'colum_value':colum_value},function(data){ }) 
});
$(document).on("click","#id_step1_next",function(){   
   if($("#id_country").val()==""){
	   swal("Oops","Choose country","error");
	   $("#id_country").focus();return false;
   }
   else{
	   window.location.href=baseurl+"id_verify/step2";
   }
});

$(document).on("change","#front_upload_btn",function(){ 
   $('#front_image_form').submit();
})

$(document).ready(function(){
   if($('#front_image_form').length==1){
   $('#front_image_form').ajaxForm({
    beforeSubmit: function() {  
     var imgname  =  $('#front_upload_btn').val(); 
     var ext =  imgname.substr( (imgname.lastIndexOf('.') +1) );
     if(ext!='jpg' && ext!='jpeg' && ext!='png' && ext!='PNG' && ext!='JPG' && ext!='JPEG')
	 {
			swal("Oops","Plese choose image only","error"); return false;
	 }
	},
    beforeSend:function(){
       $('#prof_img_holder_front').hide();
	   $('#img_loader_front').show();
       
    },
    success: function(msg) { var msg=JSON.parse(msg);
	   if(msg.status==1){
	   
	   $('#img_loader_front').hide();
	   $('#hide_after_fill').hide();
	   $('#after_upload_front').css('background',"url('"+msg.img+"')");	
	   $('#after_upload_front').append("<a class='remove_front_image' href='#'>X</a>");	
	   }
	   else{
         $('#prof_img_holder_front').show();
	     $('#img_loader_front').hide();
		  swal("Oops",msg.message,"error");
	   }
    }
    });
   }

})
$(document).on("click",".remove_front_image",function(){ 
   $(this).remove();
   $('#hide_after_fill').show();
   $('#prof_img_holder_front').show();
   $('#after_upload_front').css("background","none");
   $('#hide_after_fill').removeClass("hide_front_fill");
    $.post(baseurl+"site/user/save_user_info_ajax",{'colum_name':"id_front",'colum_value':""},function(data){ }) 
})

$(document).on("change","#back_upload_btn",function(){ 
   $('#back_image_form').submit();
})

$(document).ready(function(){
   if($('#back_image_form').length==1){
   $('#back_image_form').ajaxForm({
    beforeSubmit: function() {  
     var imgname  =  $('#back_upload_btn').val(); 
     var ext =  imgname.substr( (imgname.lastIndexOf('.') +1) );
     if(ext!='jpg' && ext!='jpeg' && ext!='png' && ext!='PNG' && ext!='JPG' && ext!='JPEG')
	 {
			swal("Oops","Plese choose image only","error"); return false;
	 }
	},
    beforeSend:function(){
       $('#prof_img_holder_back').hide();
	   $('#img_loader_back').show();
       
    },
    success: function(msg) { var msg=JSON.parse(msg);
	   if(msg.status==1){
	   
	   $('#img_loader_back').hide();
	   $('#hide_after_fill_back').hide();
	   $('#after_upload_back').css('background',"url('"+msg.img+"')");	
	   $('#after_upload_back').append("<a class='remove_back_image' href='#'>X</a>");	
	   }
	   else{
         $('#prof_img_holder_back').show();
	     $('#img_loader_back').hide();
		  swal("Oops",msg.message,"error");
	   }
    }
    });
   }

})
$(document).on("click",".remove_back_image",function(){ 
   $(this).remove();
   $('#hide_after_fill_back').show();
   $('#prof_img_holder_back').show();
   $('#after_upload_back').css("background","none");
   $('#hide_after_fill_back').removeClass("hide_after_fill_back");
    $.post(baseurl+"site/user/save_user_info_ajax",{'colum_name':"id_back",'colum_value':""},function(data){ }) 
})
$(document).on("click","#id_step2_next",function(){ 
   var front=$(".remove_front_image").length;
   var back=$(".remove_back_image").length;
   if(front!=0 && back!=0){
    $.post(baseurl+"site/user/id_request_to_admin",{},function(data){ 
	var data=JSON.parse(data);
	if(data.status=="1"){
		
		swal({title: "Success", text: "Your request sent to admin, shortly admin will verify your documents.", type: "success"},
								   function(){ 						   	
										 window.location.href=baseurl;
									   }
									);
	}
	else{
		window.location.href=baseurl;
	}
	}) 
   }
   else{
	   swal("Oops","Please upload both front and back image.","error");
   }
})

function review_about_you()
{
	 $.post(baseurl+"site/user/reviews_about_you",{},function(data){ $("#reviews_about_you_html").html(data);});
}
$(document).on("click",".more_review_abtyou",function(){
	var data_id=$(this).attr("data-class");
	if($(this).attr("data-more")==0){
	$(this).attr("data-more",1);
	$(this).text($(this).attr("data-less_text"));
	$("."+data_id).slideDown();
	$("."+$(this).attr("data-bclass")).slideUp();
	}
	else{
	$(this).attr("data-more",0);
    $(this).text($(this).attr("data-more_text"));
    $("."+$(this).attr("data-bclass")).slideDown();	
	$("."+data_id).slideUp();	
	} 
	
})

$(function() {
		 paginate_review_abt();
	 });

function paginate_review_abt(){
		 $(document).on('click', '#ajax_pg_review_abt li a', function(event) {
			 var url = $(this).attr('href');
			 $("#pagination_no").val(url.replace("/","").replace("#",""));
			 $.post(baseurl+"site/user/reviews_about_you_pagination",{"pagination_no":$("#pagination_no").val()},function(data){ $("#review_about_you_tbody_append").html(data);});
			 return false;
		 }).click(); //to trigger click event 
}

function write_review_list()
{
	 $.post(baseurl+"site/user/write_review_list",{},function(data){ $("#write_review_html").html(data);});
	 $.post(baseurl+"site/user/written_review_list",{},function(data){ $("#written_review_html").html(data);});
}

$(function() {
		 paginate_writereview();
	 });

function paginate_writereview(){
		 $(document).on('click', '#ajax_pg_review_write li a', function(event) {
			 var url = $(this).attr('href');
			 $("#writereview_pagination_no").val(url.replace("/","").replace("#",""));
			 $.post(baseurl+"site/user/write_review_list_pagination",{"pagination_no":$("#writereview_pagination_no").val()},function(data){  $("#writereview_tbody_append").html(data);});
			 return false;
		 }).click(); //to trigger click event 
}


$(function() {
		 paginate_writtenreview();
	 });

function paginate_writtenreview(){
		 $(document).on('click', '#ajax_pg_review_written li a', function(event) {
			 var url = $(this).attr('href');
			 $("#pagination_html_reviewwritten").val(url.replace("/","").replace("#",""));
			 $.post(baseurl+"site/user/written_review_list_pagination",{"pagination_no":$("#pagination_html_reviewwritten").val()},function(data){  $("#review_written_tbody_append").html(data);});
			 return false;
		 }).click();
}


(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#change_password_form").validate({
                rules: {
                    current_password: {
                        required: true,
                        remote:
						{
						  url: baseurl+'site/user/check_current_password',
						  type: "post",
						  data:
						  {
							  current_password: function()
							  {
								  return $('#change_password_form :input[name="current_password"]').val();
							  }
						  }
						}
                    },
                    new_password: {
                        required: true,
						passwordCheck_uppercase:true,
						minlength: 5
                    },
					confirm_password:
					{
					required:true,
					equalTo: '#new_password'
					}
				   },
                messages: {
                     current_password: {
                        required: "Please provide your current password",
                        remote: "Your current password is wrong"
                    },  new_password: {
                        required: "Please provide a new password",
                        notequalTo:"current and new password are same",
                        minlength: "Your password must be at least 5 characters long"
                    },  confirm_password: {
                        required: "Please provide a confirm password",
                        equalTo: "Please enter same password",
                        
                    }
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/update_password',
							dataType: "json",
							data: $('#change_password_form').serialize(),
								success:function(e){
									if(e['status']==0)
										{
										swal('Error',e['message'],'error');
										}
										else
										{
										swal('Success',e['message'],'success');	
										}
										$('#change_password_form').trigger('reset');
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#payout_form").validate({
                rules: {
                    payout_location: {
                        required: true                        
                    },
                    payout_payee: {
                        required: true
                    },
					payout_ifsc:
					{
					required:true
					},
					payout_accountno:
					{
					required:true
					},
					payout_bankname:
					{
					required:true
					}
				   },
                messages: {
                     payout_location: {
                        required: "Please enter location"
                       }, 
     				 payout_payee: {
                        required: "Please enter payee name",
                        },  
					 payout_ifsc: {
                        required: "Please enter ifsc",
                        },  
					 payout_accountno: {
                        required: "Please enter payout accout number",
                        },  
					 payout_bankname: {
                        required: "Please enter bank name",
                        },  
					   
                    },
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/update_payout',
							dataType: "json",
							data: $('#payout_form').serialize(),
								success:function(e){
									if(e['status']==0)
										{
										swal('Error',e['message'],'error');
										}
										else
										{
										swal('Success',e['message'],'success');	
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
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#paypal_payout_form").validate({
                rules: {
                    paypal_email: {
                        required: true,
						email:true	
                    }
				   },
                messages: {
                     paypal_email: {
                        required: "Please enter paypal email",
						email:"Please enter valid email"
                       }  
					   
                    },
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/update_payout',
							dataType: "json",
							data: $('#paypal_payout_form').serialize(),
								success:function(e){
									if(e['status']==0)
										{
										swal('Error',e['message'],'error');
										}
										else
										{
										swal('Success',e['message'],'success');	
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
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

$(document).on("click","#update_password_btn",function(){
	$("#change_password_form").submit();
})
$(document).on("click",'#deactivate_btn',function(){ 
			 swal({   
				 title: "Are you sure?",  
				/*  text: "You Cancel Your Account",  */
				 type: "warning",   
				 showCancelButton: true,
				 confirmButtonColor: "#DD6B55",   
				 confirmButtonText: "Yes",
				 cancelButtonText:"No", 
				 closeOnConfirm: false },
				 function(){   swal("Deactivated!", "Your Account Deactivated Successfully.", "success"); 
				 window.location=baseurl+'site/user/cancelmyaccount';
				 });
});

$(document).on("click","#save_paypal_form",function(){
	$("#paypal_payout_form").submit();
});
$(document).on("click","#transaction_btn",function(){
	$.post(baseurl+"site/user/ajax_transaction",{},function(data){
		$("#complete_trans").html(data);
	})
});
$(document).on("change",".transaction_on_change_ajax",function(){
	var payment_type=$("#transaction_completed_payment_type").val();
	var pid=$("#transaction_completed_listing").val();
	var year=$("#transaction_completed_year").val();
	var from_month=$("#transaction_completed_from").val();
	var to_month=$("#transaction_completed_to").val();
	$.post(baseurl+"site/user/ajax_transaction_filter",{"payment_type":payment_type,"pid":pid,"year":year,"from_month":from_month,"to_month":to_month},function(data){
		$("#transaction_compted_tbody").html(data);
	})
});
$(document).on("click",".host_inbox_msg_delete_btn",function(){
	var booking_id=$(this).attr("data-bid");
	var thisval=$(this);
	$.post(baseurl+"site/user/delete_host_inbox_msg",{"booking_id":booking_id},function(data){
		var data=JSON.parse(data);
		if(data.status==1){
			thisval.parent("li").remove();
		}else{
			window.location.href=baseurl;
		}
	})
});
/* $(document).on("click",".host_notification_msg_delete_btn",function(){
	var nid=$(this).attr("data-bid");
	var thisval=$(this);
	$.post(baseurl+"site/user/delete_host_notification_msg",{"nid":nid},function(data){
		var data=JSON.parse(data);
		if(data.status==1){
			thisval.parent("li").remove();
		}else{
			window.location.href=baseurl;
		}
	})
}); */
$(document).on("click","#show_more_notification",function(){
	var value=$(this).attr("data-id");
    if($(this).attr("data-value")==0){
		$(this).attr("data-value",1);
		$(this).attr("data-id","Show more notifications");
		$(this).html(value);
		$(".hide_notification").prop("style","display:block !important");
	}else{
        $(this).attr("data-value",0);
		$(this).attr("data-id","Less notifications");
		$(this).html(value);
		$(".hide_notification").prop("style","display:none !important");
	}
	
	
});
$(document).on("click","#showmore_profile_review",function(){
	var value=$("#ajax_profile_review").attr("data-id");
	var user_id=$("#ajax_profile_review").attr("data-uid");
	$("#ajax_profile_review").attr("data-id",parseInt(value)+1);
    $.post(baseurl+"site/user/ajax_profile_review",{"page":parseInt(value)+1,"user_id":user_id},function(data){
			if(data===""){ 
			$("#showmore_profile_review").remove();	
			}
			else{ 			
			$("#ajax_profile_review").append(data);
			}
	});
	
});


$(document).on("click",".user_block_flag_submit_btn",function(){
	var r_value=$(this).attr("data-id");	
	var user_id=$(this).attr("data-uid");	
    $.post(baseurl+"site/user/user_report_process",{"user_id":user_id,"report_value":r_value},function(data){
		$(".user_block_flag").attr("data-status",1);$('#user_block_model').modal('hide');
		$(".user_block_flag").attr("data-target","#user_block_model_done");
	})
	
	
})






/*Dashboard Script for height*/
/*$(document).ready( function(){
    var margin_fix = $('.search_header_base').height();
    $('.tabs_main_base').css('margin-top',margin_fix);
})*/