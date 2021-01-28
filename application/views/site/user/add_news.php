<h3 class="sub-head">Submit News</h3>
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 submit-news-inner">
<form id="add_member_news" enctype="multipart/form-data" method="post">
	   <div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5 submit-news-cmpnyname">
						<label class="label-control">Company Name</label>
				</div>
				<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
					   <h4 class="sub-head"><?php echo $company_details->row()->name;?>Ltd.,</h4>
				</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
								<label class="label-control">Author</label>
						</div>
						<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<input type="text" class="app-input-control" name="author" value="<?php if(!empty($newsInfo)){ echo $newsInfo->author;}?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
								<label class="label-control">Author Email</label>
						</div>
						<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<input type="text" class="app-input-control" name="author_email" value="<?php if(!empty($newsInfo)){ echo $newsInfo->author_email;}?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
								<label class="label-control">Post Date</label>
						</div>
						<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<input type="text" class="app-input-control" name="post_date" id="post_date" value="<?php if(!empty($newsInfo)){ echo date("Y-m-d",strtotime($newsInfo->post_date));}?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
								<label class="label-control">Post Type</label>
						</div>
						<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
							<ul class="list-inline radio-ul">
							<li>                  
							<div class="custom_radio">
								 <label class="control control--radio">
									   <input type="radio" <?php if(!empty($newsInfo)){ if($newsInfo->post_type==0){ echo "checked";}}else{ echo "checked";}?> name="post_type" value="0" class=" ">
									   Member News 																	<div class="control__indicator"></div>
								 </label>
							 </div>
							</li>
							<li>
								<div class="custom_radio">
												<label class="control control--radio">
													  <input <?php if(!empty($newsInfo)){ if($newsInfo->post_type==1){ echo "checked";}}?>  type="radio" name="post_type"  value="1" class=" ">
													  Industry News																	<div class="control__indicator"></div>
												</label>
								   </div>
							</li>
							</ul>
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
								<label class="label-control">Subject</label>
						</div>
						<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
								<input type="text" class="app-input-control" name="title" value="<?php if(!empty($newsInfo)){ echo $newsInfo->title;}?>">
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
								<label class="label-control">Content</label>
						</div>
						<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
										<textarea class="textarea-control" name="content"><?php if(!empty($newsInfo)){ echo $newsInfo->content;}?></textarea>
						</div>
		</div>
		<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
								<label class="label-control">Archieve After</label>
						</div>
						<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
							<ul class="list-inline radio-ul">
								<li>                  
											<div class="custom_radio">
												 <label class="control control--radio">
													   <input <?php if(!empty($newsInfo)){ if($newsInfo->archive=="1week"){ echo "checked";}} else { echo "checked";}?> type="radio" name="archive"  value="1week" >
													   1 Week  																	<div class="control__indicator"></div>
												 </label>
											 </div>
								</li>
								<li>
												<div class="custom_radio">
																<label class="control control--radio">
																	  <input <?php if(!empty($newsInfo)){ if($newsInfo->archive=="1month"){ echo "checked";}}?> type="radio" name="archive"  value="1month" >
																	  1 Month 																	<div class="control__indicator"></div>
																</label>
												   </div>
								</li>
								<li>
												<div class="custom_radio">
																<label class="control control--radio">
																	  <input <?php if(!empty($newsInfo)){ if($newsInfo->archive=="3months"){ echo "checked";}}?> type="radio" name="archive" value="3months" >
																	  3 Months 																	<div class="control__indicator"></div>
																</label>
												   </div>
								</li>
								<li>
												<div class="custom_radio">
																<label class="control control--radio">
																	  <input <?php if(!empty($newsInfo)){ if($newsInfo->archive=="6months"){ echo "checked";}}?> type="radio" name="archive" value="6months" class=" ">
																	  6 Months																	<div class="control__indicator"></div>
																</label>
												   </div>
								</li>
							</ul>
						</div>
		</div>
		<!--<div class="application-input-container col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="label-container col-md-5 col-sm-5 col-xs-12 col-lg-5">
								<label class="label-control">Upload Document</label>
						</div>
						<div class="input-container col-md-7 col-sm-7 col-xs-12 col-lg-7">
										<label class="file col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
														<input type="file" id="document_img" aria-label="File browser example" name="document_img" onchange="preview_image(this,'pro_img','document_img')">
														<span class="file-custom"></span>
										   </label>
										   <label for="document_img" generated="true" class="error"></label>
						</div>
						<div class="col-md-4 col-lg-4 col-xs-12 col-md-4 input-base-sction">
										<div class="img_viewer"><img id="pro_img" data-url="<?php echo base_url();?>images/site/news/dummy.png"  src="<?php if(empty($newsInfo)){ echo base_url()."images/site/news/dummy.png";} else{ echo $newsInfo->document==""?base_url()."images/site/news/dummy.png":base_url()."images/site/news/".$newsInfo->document;}?>" width="100"></div>
										
						</div>
						
		</div>-->
		<input type="hidden" name="id" value="<?php if(empty($newsInfo)){echo "0";}else{ echo $newsInfo->id;} ?>"/>
		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center submit-application-btn">
						<button class="themebtn" id="newsSubmitBtn">SUBMIT</button>
						<button type="button" onclick="load_members_news_tab();" class="backbtn">BACK</button>
		</div>
		</form>

</div>
<script type="text/javascript" src="<?php echo base_url();?>js/site/flatpickr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/highlight.pack.js"></script>
<script>
$(document).ready(function(){
if($("#post_date").length==1){
	flatpickr("#post_date", { 
		altInput: true,
		minDate: "today",
		altFormat: "j-n-Y"						
	});
}
});
</script>
<script>
$(document).ready(function(){
	
	   
            $("#add_member_news").validate({
                rules: {
                    author: {
					  required: true
					},
                     author_email: {
					  required: true,
					  email:true
					},
                     title: {
					  required: true
					},
                     content: {
					  required: true,
					  maxlength:500
					},
                   archive: {
					  required: true
					}
                      
				   },
                messages: {
                  
					author: {
                        required: "Please enter author"
                    },
					author_email: {
                        required: "Please enter email"
                    },
					title: {
                        required: "Please enter subject"
                    },
					content: {
                        required: "Please enter content",
						
                    },
					archive: {
                        required: "Please enter zip"
                    },
					document_img: {
                        required: "Please upload image"
                    }
					
					}, 
					
   
                 submitHandler: function(form) {
                    
					var formData = new FormData($('#add_member_news')[0]);
                    //formData.append('document_img', $('input[type=file]')[0].files[0]);
					$("#newsSubmitBtn").html("Processing...");
					$.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/save_members_news',
							dataType: "json",
							contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                            processData: false, 
							data: formData,
							success: function(data)
							{  $("#newsSubmitBtn").html("SUBMIT");
								if (data['status'] == 1)
								{
								   swal({title: "Success", text: "Successfully your news saved.", type: "success"},
								   function(){ 						   	
										 load_members_news_tab();
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

function load_members_news_tab(){
	window.location.reload();
}
</script>