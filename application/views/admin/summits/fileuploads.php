<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">
<style>
.last_photo_plus .browse_photo {
  width: 100%;
  height: 100%; }

.photo_preview_ul li {
  height: 150px;
  width: 200px;
  padding: 0 15px;
  margin-bottom: 30px; }

.last_photo_plus .browse_photo span {
  position: absolute;
  top: 50%;
  left: 50%;
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  width: 44px;
  height: 44px; }

.last_photo_plus .browse_photo label {
  width: 100%;
  height: 100%;
  display: inline-block; }

.photo_preview_ul li .photo_inner_li {
  width: 100%;
  position: relative;
  height: 100%; }

.photo_preview_ul .photo_preview_inner {
  width: 100%;
  height: 100%;
  display: inline-block; }
  .photo_preview_ul .photo_preview_inner:hover h5 {
    display: block; }

.last_photo_plus {
  border: 1px solid #dddddd;
  border-radius: 3px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  height: 100%; }

.photo_preview_ul {
  margin: 15px 0 0;
  display: inline-block;
  width: 100%; }

.default_photo {
  position: absolute;
  top: 4px;
  left: 4px; }
  .default_photo .defalult_icon {
    margin-right: 5px; }
  .default_photo h5 {
    font: 12px PoppinsSemiBold;
    color: #fff;
    padding: 3px 2px 2px 7px;
    background: rgba(0, 0, 0, 0.9);
    margin: 0;
    display: none;
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px; }

.delete_photo {
  background: rgba(0, 0, 0, 0.5);
  width: 30px;
  height: 30px;
  z-index: 7;
  border-radius: 25px;
  top: 3px;
  position: absolute;
  cursor: pointer;
  right: 3px;
  text-align: center;
  padding-top: 6px; }
  
  .browse_photo .browse_img {
    -moz-opacity: 0;
    opacity: 0;
    z-index: -1;
    position: absolute;
    display: inline-block;
    margin-top: 0px;
    width: 187px;
    left: 0;
}
 .responsive_img {
    width: 200px;
    height: 150px;
	padding:5px;
    left: 0;
    top: 0;
	border: 1px solid #dddddd;
    background-position: 50% 50% !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
}
div#uniform-upload_img {
    display: none;
}
.widget-content {
    padding: 15px;
    border-bottom: 1px solid #cdcdcd;
    display: inline-block;
    width: 100%;
}
.download_photo {
    background: rgba(0, 0, 0, 0.5);
    width: 35px;
    height: 35px;
    z-index: 7;
    border-radius: 25px;
    top: 3px;
    position: absolute;
    cursor: pointer;
    right: 40px;
    text-align: center;
    padding-top: 4px;
    font-size: 22px;
    color: white;
}
@media (min-width: 1200px)
{
.row-fluid [class*="span"] {
    margin-left: 2.564102564102564% !important;
   
} 
}
.download_photo a {
    color: white;
}
.delete_photo {
    background: rgba(0, 0, 0, 0.5);
     width: 35px;
    height: 35px;
    z-index: 7;
    border-radius: 25px;
    top: 3px;
    position: absolute;
    cursor: pointer;
    right: 3px;
    text-align: center;
    padding-top: 6px;
}
.link_photo {
    float: left;
    background: rgba(0, 0, 0, 0.5);
    width: 35px;
    height: 35px;
    z-index: 7;
    border-radius: 25px;
    top: 3px;
    position: absolute;
    cursor: pointer;
    right: 128px;
    text-align: center;
    padding-top: 4px;
    font-size: 22px;
    color: white;
}
.link_photo a{
   
    color: white;
}				
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/site/sweetalert.css" /> 
<script type="text/javascript" src="<?php echo base_url();?>js/site/sweetalert.min.js"/></script>
<!--breadcrumbs-->
<section class="content-header">
<?php if($this->session->flashdata('error_type')!='' && $this->session->flashdata('alert_message')!='' ){?>
<div class="callout callout-info <?php if(($this->session->flashdata('error_type')=='error')){?>modal-danger<?php }else{ echo "alert-success";}?>">
											<a class="close" data-dismiss="modal" href="javascript:void(0);">×</a>

											<?php echo( $this->session->flashdata('alert_message'));?>
											<br>
</div>
	<?php } ?>
  <h1><?php echo $heading;?></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active"><?php echo $heading;?></li>
      </ol>
  </section>
<!--End-breadcrumbs-->
	<section class="content">
		<div class="col-lg-12 col-xs-6">
		    <div class="container-fluid1">
    <div class="row-fluid1">
      <div class="span12">
        <div class="widget-box">
          
          <div class="widget-content nopadding">
			        <div class="span12 scavenger_main_base hunt_sidemenu_main_base">
    <div class="span12 scavenger_hunt_content_base pull-right right_height box">
		<div class="span12 scavenger_content_inner nopadd">
			         <div class="course_add_photo_base span12 ">
            <h3></h3>
			<ul class="list-inline photo_preview_ul ui-sortable" id="imgupload_ul" >
                <?php 
				if($filesuploads->num_rows()>0){		  
				  foreach($filesuploads->result() as $pimg){
					  
					  $haystack = 'how are you';
					  $needle = 'are';	
					   if (strpos($pimg->file_name,".pdf") !== false) {
						$filename=base_url()."images/site/pdf.jpg";
						}
					   else if (strpos($pimg->file_name,".doc") !== false) {
						$filename=base_url()."images/site/word.jpg";
					   }
					   else if (strpos($pimg->file_name,".xls") !== false) {
						$filename=base_url()."images/site/xls.jpg";
					   }
					   else{
						$filename=base_url()."images/site/summits/".$pimg->file_name;   
					   }
				?>
				<li class="span3 span3 ui-sortable-handle">
                  <div class="photo_inner_li">
                     <div class="photo_preview_inner">
                        <div class="responsive_img" style="background: url(<?php echo $filename;?>)">
                        </div>
						<div class="download_photo" data-name="<?php echo $pimg->file_name;?>"><a href="<?php echo base_url();?>images/site/summits/<?php echo $pimg->file_name;?>" download><span class="fa fa-download"></span></a></div>	
						<div class="link_photo" data-name="<?php echo $pimg->file_name;?>"><a target="new" href="<?php echo base_url();?>images/site/summits/<?php echo $pimg->file_name;?>" ><span class="fa fa-link"></span></a></div>		
                        <div class="delete_photo" data-name="<?php echo $pimg->id;?>">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                              <defs>
                                 <path id="4xzqa" d="M390.14 599.1v1.82c0 .4-.32.72-.72.72h-1.35v10.7c0 .39-.33.71-.72.71H376.5a.72.72 0 0 1-.72-.72v-10.69h-1.35a.72.72 0 0 1-.72-.72v-1.82c0-1.1.9-1.99 2-1.99h4.34c.1-.28.37-.48.68-.48h2.38c.31 0 .57.2.67.48h4.36a2 2 0 0 1 1.99 2zm-3.51 2.54h-9.4v9.97h9.4zm2.07-1.44v-1.1c0-.3-.25-.55-.55-.55H375.7c-.3 0-.55.25-.55.55v1.1zm-9.38 8.2v-4.86a.72.72 0 1 1 1.44 0v4.86a.72.72 0 1 1-1.44 0zm3.78 0v-4.86a.72.72 0 1 1 1.44 0v4.86a.72.72 0 1 1-1.44 0z"></path>
                              </defs>
                              <g>
                                 <g transform="translate(-372 -595)">
                                    <use fill="#fff" xlink:href="#4xzqa"></use>
                                 </g>
                              </g>
                           </svg>
                           <span class="addtext_del"></span>
                        </div>
                     </div>
                  </div>
               </li>
				<?php }}?>
               <li class="span3 last_photo_li addcvphoto mob_nopadd">
                  <div class="photo_inner_li">
                     <div class="photo_preview_inner">
                        <div class="last_photo_plus">
                           <div class="browse_photo" id="add_last_index">
                              <label for="upload_img">
                                 <span class="browse_photo_inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="43" height="43" viewBox="0 0 43 43">
                                       <defs>
                                          <path id="nbkva" d="M1184.32 402.82h-18.14v-18.14a1.68 1.68 0 1 0-3.36 0v18.14h-18.14a1.68 1.68 0 1 0 0 3.36h18.14v18.14a1.68 1.68 0 1 0 3.36 0v-18.14h18.14a1.68 1.68 0 0 0 0-3.36z"/>
                                       </defs>
                                       <g>
                                          <g transform="translate(-1143 -383)">
                                             <use fill="#0094fc" xlink:href="#nbkva"/>
                                          </g>
                                       </g>
                                    </svg>
                                 </span>
                              </label>
                              <form id="uploadimage" action="<?php echo base_url()?>admin/summits/ajax_img_upload"  method="post" enctype="multipart/form-data"> 
                                 <input type="file" onchange="preview_image()" class="browse_img" name="upload_file[]" id="upload_img" multiple="">
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
		</div>
	</div>	

	</div>
		 </div>
        </div>
      </div>
    </div>
  </div>
		</div>
	</section>
		  
		  
 
<script src="<?php echo base_url();?>js/admin/jquery.min.js"></script>  
<script>

function preview_image() 
{ 
  /* var total_file=document.getElementById("upload_img").files.length;
  var regExp = new RegExp('image.(jpeg|jpg|gif|png|pdf|doc|docx|xls|xlsx)', 'i');	
  var regExp = new RegExp("(.*?)\.(docx|doc|pdf|xml|xls|xlsx|jpg|png|gif)$", 'i');	
  var files=document.getElementById("upload_img").files;
  var game_image_size=$("#imgupload_ul").attr("data-size"); 
  
	for(var i=0;i<total_file;i++)
	{
		  var file = file = files[i];
		  var matcher = regExp.test(file.name.toLowerCase());

		  if (!matcher)
		  {
			 swal("Error","Invalid file format it allow only jpg,png...","error"); 
			 newdat=$('#imgupload_ul li:last').clone();
			 var li_count=$("#imgupload_ul li").length-1;  
			 $("#imgupload_ul").append(newdat);
			 var outimg=baseurl+"images/site/loadspin.gif";
			 $('#imgupload_ul li:eq('+li_count+') .photo_preview_inner').html('<div class="photo_container" ><img class="loader_image_img loader_img_new" src="'+outimg+'" width="50" /></div>' );
			 $("#imgupload_ul li:eq("+li_count+")").removeClass('last_photo_li');
			 $("#imgupload_ul li:eq("+li_count+")").remove();
		  }
		  else{ 
			 newdat=$('#imgupload_ul li:last').clone();
			 var li_count=$("#imgupload_ul li").length-1;  
			 $("#imgupload_ul").append(newdat);
			 var outimg=baseurl+"images/site/loadspin.gif"; 
			 $('#imgupload_ul li:eq('+li_count+') .photo_preview_inner').html('<div class="photo_container" ><img class="loader_image_img loader_img_new" src="'+outimg+'" width="50" /></div>' );
			 $("#imgupload_ul li:eq("+li_count+")").removeClass('last_photo_li');
			 
		  }		 
	} */
}
$(document).ready(function(){
$(document).on("change","#upload_img",function(){ 
    
  var total_file=document.getElementById("upload_img").files.length;
  var regExp = new RegExp('image.(jpeg|jpg|gif|png|pdf|doc|docx|xls|xlsx)', 'i');	
  var regExp = new RegExp("(.*?)\.(docx|doc|pdf|xml|xls|xlsx|jpg|png|gif|jpeg)$", 'i');	
  var files=document.getElementById("upload_img").files;
  var game_image_size=$("#imgupload_ul").attr("data-size"); 
  
	for(var i=0;i<total_file;i++)
	{
		  var file = file = files[i];
		  var matcher = regExp.test(file.name.toLowerCase());

		  if (!matcher)
		  {
			 swal("Error","Invalid file format it allow only jpg,png...","error"); 
			 newdat=$('#imgupload_ul li:last').clone();
			 var li_count=$("#imgupload_ul li").length-1;  
			 $("#imgupload_ul").append(newdat);
			 var outimg=baseurl+"images/site/loadspin.gif";
			 $('#imgupload_ul li:eq('+li_count+') .photo_preview_inner').html('<div class="photo_container" ><img class="loader_image_img loader_img_new" src="'+outimg+'" width="50" /></div>' );
			 $("#imgupload_ul li:eq("+li_count+")").removeClass('last_photo_li');
			 $("#imgupload_ul li:eq("+li_count+")").remove();
		  }
		  else{ 
			 newdat=$('#imgupload_ul li:last').clone();
			 var li_count=$("#imgupload_ul li").length-1;  
			 $("#imgupload_ul").append(newdat);
			 var outimg=baseurl+"images/site/loadspin.gif"; 
			 $('#imgupload_ul li:eq('+li_count+') .photo_preview_inner').html('<div class="photo_container" ><img class="loader_image_img loader_img_new" src="'+outimg+'" width="50" /></div>' );
			 $("#imgupload_ul li:eq("+li_count+")").removeClass('last_photo_li');
			 
		  }		 
	}
	
	
	
	
	var data = new FormData();
	$.each($('#upload_img')[0].files, function(i, file) {
    data.append('photo[]', file);
	});
	data.append('game_id',$("#game_id").val() );
	$.ajax({
	url: baseurl+"admin/summits/image_uploads", 
	type: "POST",             
	data: data, 
	dataType: "json",
	contentType: false,       
	cache: false,            
	processData:false,       
	success: function(data)   
	{
	var arr=[];	
	if(data.status=="1"){ 
	var array = (data.img); 
    for(i=0;i<array.length;i++)
	{
		
		
		var total=array.length;
		var overall_count=$('#imgupload_ul li').length-1;
		var resval=(parseInt(overall_count)-parseInt(total))+parseInt(i);
		//resval=resval-1;
		//alert(resval);
	    var ext = array[i].split('.').pop();
	   if(ext=="pdf"){
		   var imgurl=baseurl+"images/site/pdf.jpg";
	   }else if(ext=="docx" || ext=="doc"){
		   var imgurl=baseurl+"images/site/word.jpg";
	   }else if(ext=="xls" || ext=="xlsx"){
		   var imgurl=baseurl+"images/site/xls.jpg";
	   } else{
		    var imgurl=baseurl+"images/site/summits/"+array[i];
	   }
	    //alert($('#imgupload_ul li:eq(-3)').length);
		$('#imgupload_ul li:eq('+resval+') .photo_preview_inner').html('<div class="responsive_img" style="background: url('+imgurl+')"></div><div class="default_photo default_photo_btn" data-img="'+array[i]+'"></div><div class="download_photo" ><a href="<?php echo base_url();?>images/site/summits/'+array[i]+'" download=""><span class="fa fa-download"></span></a></div><div class="link_photo" data-name="'+array[i]+'"><a target="new" href="<?php echo base_url();?>images/site/summits/'+array[i]+'" ><span class="fa fa-link"></span></a></div><div class="delete_photo" data-name="'+array[i]+'"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><defs><path id="4xzqa" d="M390.14 599.1v1.82c0 .4-.32.72-.72.72h-1.35v10.7c0 .39-.33.71-.72.71H376.5a.72.72 0 0 1-.72-.72v-10.69h-1.35a.72.72 0 0 1-.72-.72v-1.82c0-1.1.9-1.99 2-1.99h4.34c.1-.28.37-.48.68-.48h2.38c.31 0 .57.2.67.48h4.36a2 2 0 0 1 1.99 2zm-3.51 2.54h-9.4v9.97h9.4zm2.07-1.44v-1.1c0-.3-.25-.55-.55-.55H375.7c-.3 0-.55.25-.55.55v1.1zm-9.38 8.2v-4.86a.72.72 0 1 1 1.44 0v4.86a.72.72 0 1 1-1.44 0zm3.78 0v-4.86a.72.72 0 1 1 1.44 0v4.86a.72.72 0 1 1-1.44 0z"></path></defs><g><g transform="translate(-372 -595)"><use fill="#fff" xlink:href="#4xzqa"></use></g></g></svg></div>' ); 
		$('#imgupload_ul li:eq('+resval+')').attr("data-img-name",array[i]);
		$('#imgupload_ul li:eq('+resval+')').addClass("ui-sortable-handle");
	   
	}
	
	}
	else if(data.status=="2"){
		var array = (data.img); 
		for(i=0;i<array.length;i++)
		{
			
			var total=array.length;
			var overall_count=$('#imgupload_ul li').length-1;
			var resval=(parseInt(overall_count)-parseInt(total))+parseInt(i);
			var img_name=array[i];
			if(img_name=="error"){
				$('#imgupload_ul li:eq('+resval+')').remove();
			}
			else{
				var total=array.length;
				var overall_count=$('#imgupload_ul li').length-1;
				var resval=(parseInt(overall_count)-parseInt(total))+parseInt(i);
				//resval=resval-1;
				//alert(resval);
				var ext = array[i].split('.').pop();
			   if(ext=="pdf"){
				   var imgurl=baseurl+"images/site/pdf.jpg";
			   }else if(ext=="docx" || ext=="doc"){
				   var imgurl=baseurl+"images/site/word.jpg";
			   }else if(ext=="xls" || ext=="xlsx"){
				   var imgurl=baseurl+"images/site/xls.jpg";
			   } else{
					var imgurl=baseurl+"images/site/summits/"+array[i];
			   }
				$('#imgupload_ul li:eq('+resval+').photo_preview_inner').html('<div class="responsive_img" style="background: url('+imgurl+')"></div><div class="default_photo default_photo_btn" data-img="'+array[i]+'"></div><div class="download_photo" ><a href="<?php echo base_url();?>images/site/summits/'+array[i]+'" download=""><span class="icon icon-download"></span></a></div><div class="link_photo" data-name="'+array[i]+'"><a target="new" href="<?php echo base_url();?>images/site/summits/'+array[i]+'" ><span class="fa fa-link"></span></a></div><div class="delete_photo" data-name="'+array[i]+'"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><defs><path id="4xzqa" d="M390.14 599.1v1.82c0 .4-.32.72-.72.72h-1.35v10.7c0 .39-.33.71-.72.71H376.5a.72.72 0 0 1-.72-.72v-10.69h-1.35a.72.72 0 0 1-.72-.72v-1.82c0-1.1.9-1.99 2-1.99h4.34c.1-.28.37-.48.68-.48h2.38c.31 0 .57.2.67.48h4.36a2 2 0 0 1 1.99 2zm-3.51 2.54h-9.4v9.97h9.4zm2.07-1.44v-1.1c0-.3-.25-.55-.55-.55H375.7c-.3 0-.55.25-.55.55v1.1zm-9.38 8.2v-4.86a.72.72 0 1 1 1.44 0v4.86a.72.72 0 1 1-1.44 0zm3.78 0v-4.86a.72.72 0 1 1 1.44 0v4.86a.72.72 0 1 1-1.44 0z"></path></defs><g><g transform="translate(-372 -595)"><use fill="#fff" xlink:href="#4xzqa"></use></g></g></svg></div>' ); 
				$('#imgupload_ul li:eq('+resval+')').attr("data-img-name",array[i]);
				$('#imgupload_ul li:eq('+resval+')').addClass("ui-sortable-handle");
			}
		}
		
		swal({title: "Error", text: data.message, type: "error"},
								   function(){ 
										window.location.reload();  
									   }
									);
	}
	}
	});
});
$(document).on("click",".delete_photo",function(){
	var fname=$(this).attr('data-name');
	var lival=$(this);
	$.post(baseurl+'admin/summits/delete_fileuploads_img',{'fname':fname},function(data){
	lival.closest('li').hide(500);	
	setTimeout(function(){
	lival.closest('li').remove();		
	},500);
    });
});
});
</script> 

</div>
<?php $this->load->view('admin/common/footer');?>
