<?php $this->load->view('site/common/header');
?>
<script src="<?php echo base_url();?>js/site/bootstrap-select.min.js"></script>
<link href="<?php echo base_url();?>css/site/bootstrap-select.min.css" rel="stylesheet" />
<style>
#company-list{
	display:none;
}
#error_search{
	color:red;
}
</style>
 <script charset="utf8" src="<?php echo base_url();?>js/site/bootstrap3-typeahead.min.js"></script>
<section>
   <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 member-innerpage-base">
      <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 banner-innerpage">
         <img src="<?php echo base_url();?>images/site/member-directory.png" alt="GSLN">
         <div class="container nopadd">
            <div class="banner-innercaption">
               <h2>Members Directory</h2>
               <span>&nbsp;</span>
            </div>
         </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="container nopadd">
            <h3 class="site-head">Search</h3>
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base">
               <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">
                  <label class="label-control">Company Name</label>
                  <input type="text" class="app-input-control typeahead" id="search_company_name">				  
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">
                  <label class="label-control">Country </label>
                  <select class="select-control1 selectpicker" data-show-subtext="true" data-live-search="true" name="country_id" id="search_office_country">
						<option value="">Country</option>
						  <?php if($country_list->num_rows()>0){foreach($country_list->result() as $countrylist){?>
						   <option value="<?php echo $countrylist->id;?>"><?php echo $countrylist->name;?></option>
						  <?php }}?>

				 </select>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 app_input_common">
                  <label class="label-control">IATA Airport Code</label>
                  <select class="select-control1 selectpicker" data-show-subtext="true" data-live-search="true"  name="iata_select" id="iata_select">
						<option value="">Select IATA</option>
						<?php if($iata_list->num_rows()>0){ foreach($iata_list->result() as $iata){?>
						<option value="<?php echo $iata->id; ?>"><?php echo $iata->code;?></option>
						<?php }}?>
				  </select>
				  <input id="page_id" type="hidden" value="0" />
               </div>
			   <span id="error_search"></span>
            </div>
           <!-- <ul class="list-inline innerpage-ul">
               <li>
                  <div class="custom_check not_applicaple_base">
                     <label class="control control--radio">
                        <input type="radio" checked name="search_members" value="0">
                        All
                        <div class="control__indicator"></div>
                     </label>
                  </div>
               </li>
               <li>
                  <div class="custom_check not_applicaple_base">
                     <label class="control control--radio">
                        <input type="radio" name="search_members" value="1">
                        Members Only
                        <div class="control__indicator"></div>
                     </label>
                  </div>
               </li>
               <li>
                  <div class="custom_check not_applicaple_base">
                     <label class="control control--radio">
                        <input type="radio" name="search_members" value="2">
                        Associates Only
                        <div class="control__indicator"></div>
                     </label>
                  </div>
               </li>
            </ul>-->
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 inner-search-container">
               <a href="javascript:void(0);" id="search_submit_btn_glsn" class="themebtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/arrow-icon.png"></span>Search</a>
               <a href="javascript:void(0);" onclick="reload_fun()" class="themebtn">Reset</a>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-base" id="company-list">
      <div class="container nopadd">
         <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-inner">
            <!--<h3>Search Result : Showing 20 of 40</h3>-->
            <h4 class="site-head text-center" id="country_name">Members in All Countries</h4>
			<div class="table-responsive">
            <table style="width: 100%">
               <thead>
                  <tr>
                     <th style="width: 15%">Company Name</th>
                     <th style="width: 20%">Location</th>
                     <th style="width: 10%">Country</th>
                     <th style="width: 11%">Joined</th>
                     <th style="width: 9%">Status</th>
                     <th style="width: 25%">Attending  Upcoming Summits</th>
                     <th style="width: 10%">Action</th>
                  </tr>
               </thead>
               <tbody id="tbody_search">
                  <tr>
                     <td><a href="#">Blue Ocean</a> </td>
                     <td> Chittagong</td>
                     <td>Bangladesh</td>
                     <td>2019</td>
                     <td>Premium</td>
                     <td><a href="">GLSN 2nd Bi-Annual Summit</a></td>
                     <td><a href="#" class="themebtn">Contact</a></td>
                  </tr>
                  
               </tbody>
            </table>
			</div>
			<div id="pagination_search"></div>
         </div>
      </div>
   </div>
   <div id="company_inner_page_html">
   </div>
</section>
<div class="modal fade bs-example-modal-lg1 theme-modal" id="contact_modal_frm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content col-md-12 col-sm-12 col-xs-12 col-lg-12">
<button type="button" class="close theme-close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 modal-base contact-base">
				<form id="contact_model_form" method="post">
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-inner-fields members-contact">
								<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12  modal-company-name">
												<div class="label-container col-md-4 col-sm-4 col-xs-12 col-lg-4">
														<label class="label-control">Contact Member</label>
												</div>
												<div class="input-container col-md-8 col-sm-8 col-xs-12 col-lg-8 modal-company-name">
															  <p id="office_id_contact_name">Guest</p>
												</div>
								</div>
								<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd">
												<div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd">
																<input type="text" class="app-input-control" placeholder="NAME" name="name">     
												</div>
												<div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd">
																<input type="text" class="app-input-control" placeholder="E-MAIL" name="email">     
												   </div>
												   <div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12  nopadd">
																 <input type="text" class="app-input-control" placeholder="PHONE" name="phone">
															
																					
												</div>
												<div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd">
																<input type="text" class="app-input-control" placeholder="Subject" name="subject">     
												   </div>
												<div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadd">
																<textarea class="textarea-control" placeholder="MESSAGE" name="messages"></textarea>    
												</div>
												<div class="input-container col-md-12 col-sm-12 col-xs-12 col-lg-12  ">
																<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 padd-left text-center">
																		   <label class="label-control">Verification Code :</label>
																</div>
															 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 padd-right">
															
															<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 input-container">
														<div id="recaptcha"><?php echo $captcha;?></div>
														<span class="captcha_reload_icon rotated"><a href="javascript:void(0);" style="display:inline-block;" class="captcha_reload_btn"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="40px" y="40px"
	 viewBox="0 0 489.711 489.711" style="enable-background:new 0 0 489.711 489.711;" xml:space="preserve">
<g>
	<g>
		<path d="M112.156,97.111c72.3-65.4,180.5-66.4,253.8-6.7l-58.1,2.2c-7.5,0.3-13.3,6.5-13,14c0.3,7.3,6.3,13,13.5,13
			c0.2,0,0.3,0,0.5,0l89.2-3.3c7.3-0.3,13-6.2,13-13.5v-1c0-0.2,0-0.3,0-0.5v-0.1l0,0l-3.3-88.2c-0.3-7.5-6.6-13.3-14-13
			c-7.5,0.3-13.3,6.5-13,14l2.1,55.3c-36.3-29.7-81-46.9-128.8-49.3c-59.2-3-116.1,17.3-160,57.1c-60.4,54.7-86,137.9-66.8,217.1
			c1.5,6.2,7,10.3,13.1,10.3c1.1,0,2.1-0.1,3.2-0.4c7.2-1.8,11.7-9.1,9.9-16.3C36.656,218.211,59.056,145.111,112.156,97.111z"/>
		<path d="M462.456,195.511c-1.8-7.2-9.1-11.7-16.3-9.9c-7.2,1.8-11.7,9.1-9.9,16.3c16.9,69.6-5.6,142.7-58.7,190.7
			c-37.3,33.7-84.1,50.3-130.7,50.3c-44.5,0-88.9-15.1-124.7-44.9l58.8-5.3c7.4-0.7,12.9-7.2,12.2-14.7s-7.2-12.9-14.7-12.2l-88.9,8
			c-7.4,0.7-12.9,7.2-12.2,14.7l8,88.9c0.6,7,6.5,12.3,13.4,12.3c0.4,0,0.8,0,1.2-0.1c7.4-0.7,12.9-7.2,12.2-14.7l-4.8-54.1
			c36.3,29.4,80.8,46.5,128.3,48.9c3.8,0.2,7.6,0.3,11.3,0.3c55.1,0,107.5-20.2,148.7-57.4
			C456.056,357.911,481.656,274.811,462.456,195.511z"/>
	</g>
</g>
</svg>
</a></span>
														
												</div>
																		<div class="col-md-8 col-sm-8 col-xs-12 col-lg-8 nopadd">
																						<input type="text" class="app-input-control" name="captcha_text">
																						<input type="hidden" name="office_id" id="office_id_contact_id" value="0" /><input type="hidden" name="to_email" id="to_email" value="0" />
																						<input type="hidden" name="to_name" id="to_name" value="GLSN Member" />
																		</div>
																		
															 </div>
																					
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center submit-application-btn">
																<button id="send_contact_btn" class="themebtn">Send</button>
												</div>
												
								</div>
				</div>
				</form>
</div>
</div>
</div>
</div>
<script>
$(document).on("change","#search_office_country",function(){
	var country_id=$(this).val();
	$.post(baseurl+"site/landing/get_iata_list",{"country_id":country_id},function(data){
		var data=JSON.parse(data);
		if(data.status=="1"){
			$("#iata_select").html(data.iata_list);
			$("#iata_select").val('default').selectpicker("refresh");
		}
	});
});
$(document).on("click","#search_submit_btn_glsn",function(){
	
	var country_id=$("#search_office_country").val();
	var iata_select=$("#iata_select").val();
	var company_name=$("#search_company_name").val();
	$("#error_search").html("");
	if(company_name=="" && country_id==""){
		$("#error_search").html("Please enter company name or choose country.");
		return false;
	}
	
	$("#company_inner_page_html").hide(500);
	$("#company-list").show(500);
	$("#tbody_search").html("<div class='text-center sivspin'><img src='"+baseurl+"images/site/loadspin.gif"+"'/></div>");
	$("#page_id").val(0);
	
	var members=$("input[type='radio']:checked").val();
	$.post(baseurl+"site/landing/ajax_search",{"country_id":country_id,"company_name":company_name,"iata_select":iata_select,"page":$("#page_id").val(),"members":members},function(data){
		var data=JSON.parse(data);
		if(data.status=="1"){
			$("#tbody_search").html(data.html);
			$("#pagination_search").html(data.pagination);
			$("#country_name").html(data.country_name);
		}
		else{
			$("#tbody_search").html(data.html);
			$("#pagination_search").html('');
			$("#country_name").html(data.country_name);
		}
	});
});

function inital_load(){
	$("#tbody_search").html("<div class='text-center sivspin'><img src='"+baseurl+"images/site/loadspin.gif"+"'/></div>");
	var country_id=$("#search_office_country").val();
	var iata_select=$("#iata_select").val();
	var company_name=$("#search_company_name").val();
	var members=$("input[type='radio']:checked").val();
	$.post(baseurl+"site/landing/ajax_search",{"country_id":country_id,"company_name":company_name,"iata_select":iata_select,"page":$("#page_id").val(),"members":members},function(data){
		var data=JSON.parse(data);
		if(data.status=="1"){ 
			$("#tbody_search").html(data.html);
			$("#pagination_search").html(data.pagination);
			$("#country_name").html(data.country_name);
		}else{
			$("#tbody_search").html(data.html);
			$("#pagination_search").html(data.pagination);
			$("#country_name").html(data.country_name);
		}
	});
}
$(document).ready(function(){
	
	/*inital_load();*/
});

$(document).on("click",".pagination a",function(e){
	 e.preventDefault();
	 var page=$(this).attr("data-ci-pagination-page");
	  $("#page_id").val(page); 
	   inital_load();
	
})
$(document).on("click",".click_company_btn",function(e){
	 
	 var company_id=$(this).attr("data-id");
	 var office_id=$(this).attr("data-officeid");
	 $.post(baseurl+"site/landing/company_detail_page",{"company_id":company_id,"office_id":office_id},function(data){
		 var data=JSON.parse(data);
		 $("#company-list").hide();
		 $("#company_inner_page_html").show();
		 $("#company_inner_page_html").html(data.html);
	 });
	
})
$(document).on("click","#searchback_btn",function(e){ 
	     
		 $("#company_inner_page_html").hide();
		 $("#company-list").show();
})
$(document).on("click",".reset_form_search_box_btn",function(e){
	 
	  $("#page_id").val(0); 
	   var selected_region_id=$("#selected_region_id").val();
	  $("#change_country_drop_"+selected_region_id).val("");
	  $("#selected_service_"+selected_region_id).val("");
	  $("#selected_text_"+selected_region_id).val("");
	  $("#selected_port_"+selected_region_id).val("");
	   inital_load();
	
})
$(document).on("change","#branch_search_dropdown",function(){
	var branch_id=$(this).val();
	if(branch_id!=""){
	  $.post(baseurl+"site/landing/ajax_branch",{"branch_id":branch_id},function(data){
		  var data=JSON.parse(data);
		  if(data.status==1){
			  $("#append_branch_search_html_div").html(data.html);
		  }
	  });
	}
});
</script>
<script>
$(document).ready(function() {
  
    $("#contact_model_form").validate({
        errorElement: "label",
        rules: {
            name: {
                required: true,                
            },
            job_title: {
                required: true,                
            },
            company_name: {
                required: true,                
            },
            city: {
                required: true,                
            },
            country: {
                required: true,                
            },
            email: {
                required: true,
				email:true	
            },
            phone: {
                required: true,                
            },
            messages: {
                required: true,                
            },
            subject: {
                required: true,                
            },
            captcha_text: {
                required: true,				
            }
        },
        messages: {
            name: {
                required: "Enter your name"
            },
            job_title: {
                required: "Enter your job title"
            },
            company_name: {
                required: "Enter your company name"
            },
            city: {
                required: "Enter your city"
            },
            country: {
                required: "Select your country"
            },
            email: {
                required: "Enter your email",
				
            },
            phone: {
                required: "Enter your phone number"
            },
            messages: {
                required: "Enter your messages"
            },
            subject: {
                required: "Enter your subject"
            },
            captcha_text: {
                required: "Enter captcha"
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        },
        submitHandler: function(form) {
            $('#send_contact_btn').html("Processing...");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>site/landing/send_contact_enquiry",
                dataType: "json",
                timeout: 500000,
                data: $('#contact_model_form').serialize(),
                success: function(json) {
					$('#send_contact_btn').html("Send");
                    if (json.status == "1") {
                        swal({
                            title: "Success",
                            text: 'Your enquiry sent successfully...',
                            type: "success"
                        }, function() {
                            location.reload();
                        });
                        return false;
                    } else if (json.status == '2') {
                        swal({
                                title: "Error",
                                text: "System Busy try later",
                                type: "error"
                            }, function() {
                                location.reload();
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
$(".captcha_reload_icon").click(function(){
	
	$(".captcha_reload_icon").toggleClass("rotated");
	$("#recaptcha").hide(1000);
	$.post(baseurl+'site/landing/ajax_captcha_contact_members',{},function(data){
		$("#recaptcha").html(data);
		$("#recaptcha").show(1000);
	})
});

$(document).on("click",".contact_mail_send_btn",function(){
	var office_id=$(this).attr("data-office_id");
	var office_name=$(this).attr("data-company_name");
	var to_email=$(this).attr("data-email");
	var to_name=$(this).attr("data-name");
	$("#office_id_contact_id").val(office_id);
	$("#to_email").val(to_email);
	$("#to_name").val(to_name);
	$("#office_id_contact_name").html(office_name);
	$("#contact_modal_frm").modal("show");
});	


$(document).ready(function(){
$('input.typeahead').typeahead({
	    source:  function (query, process) {
        return $.post(baseurl+"site/landing/search_filter_company", { "search_key": query }, function (data) {
        		console.log(data);
        		data = $.parseJSON(data);
	            return process(data);
	        });
	    }
	});
	
  });
  
  function reload_fun(){
	  window.location.reload();
  }

</script>
<?php $this->load->view('site/common/footer');?>