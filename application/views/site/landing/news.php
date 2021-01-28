<?php $this->load->view('site/common/header');	?>
<style>
.hidefull{
	display:none;
}
</style>

<section>

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 member-innerpage-base">

		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 banner-innerpage">

						<img src="<?php echo base_url();?>images/site/news.png" alt="GSLN">

						<div class="container nopadd">

									<div class="banner-innercaption">

										 <h2> GLSN News</h2>

										 <span>&nbsp;</span>

									</div>

						</div>

					   

						

		</div>

	   



<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 news-base">

		<div class="container">

			<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 news-head">	
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">GLSN News</a></li>
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">GLSN Member News</a></li>					
				</ul>
			</div>	
				 <div class="tab-content">
				  <div role="tabpanel" class="tab-pane  active" id="home">
							<div class="news-container-base col-lg-12 col-sm-12 col-xs-12 col-md-12" id="append_glsn_news">
										 
										 <?php if($all_news->num_rows()>0){ foreach($all_news->result() as $news){?>
										<div class="news-container-inner col-lg-12 col-sm-12 col-xs-12 col-md-12" id="news_id_<?php echo $news->id;?>">

												<h5><?php echo date("M d,Y",strtotime($news->post_date));?></h5>
												<h5><?php echo html_entity_decode($news->title);?></h5>
												<div class="short_desc_<?php echo $news->id;?>">
												  <p> <?php echo mb_substr(strip_tags(html_entity_decode($news->content)),0,450);?></p>
												</div>
												<div class="full_desc_<?php echo $news->id;?>  hidefull" >
													<p> <?php echo html_entity_decode($news->content);?></p>
												</div>
												<?php if(strlen(strip_tags($news->content))>450){?>
												<a href="javascript:void(0);" onclick="show(<?php echo $news->id;?>)" class="read-more-tag themebtn read_more_btn_<?php echo $news->id;?>">Read More</a>
												<?php } ?>

										</div>
										<?php }} else{ ?>
										 <h4>No News found...</h4>
										 <?php } ?>
										
										

						</div>
						<?php if($total_all_news->num_rows()>$page_glsn){?>
											<a href="javascript:void(0);" id="loadmore_glsn" onclick="loadmore_glsn()" class=" themebtn ">Load More</a>
											<input type="hidden" value="1" id="pagination_glsn" />
										<?php } ?>
				  </div>
				  <div role="tabpanel" class="tab-pane " id="profile">
							<div class="news-container-base col-lg-12 col-sm-12 col-xs-12 col-md-12" id="append_glsn_members_news">

										 <?php if($members_news->num_rows()>0){ foreach($members_news->result() as $mnews){?>
										<div class="news-container-inner col-lg-12 col-sm-12 col-xs-12 col-md-12" id="mnews_id_<?php echo $mnews->id;?>">

												<h5><?php echo date("M d,Y",strtotime($mnews->post_date));?></h5>
												<h5><?php echo html_entity_decode($mnews->title);?></h5>
												<div class="mshort_desc_<?php echo $mnews->id;?>">
												  <p> <?php echo mb_substr(strip_tags(html_entity_decode($mnews->content)),0,450);?></p>
												</div>
												<div class="mfull_desc_<?php echo $mnews->id;?>  hidefull" >
													<p> <?php echo html_entity_decode($mnews->content);?></p>
												</div>
												<?php if(strlen(strip_tags($mnews->content))>450){?>
												<a href="javascript:void(0);" onclick="mshow(<?php echo $mnews->id;?>)" class="read-more-tag themebtn mread_more_btn_<?php echo $mnews->id;?>">Read More</a>
												
												<?php } ?>

										</div>
										<?php }} else{ ?>
										 <h4>No News found...</h4>
										 <?php } ?>

						</div>
						<?php if($total_members_news->num_rows()>$page_member){?>
											<a href="javascript:void(0);" id="loadmore_glsn_member" onclick="loadmore_glsn_member()" class=" themebtn">Load More</a>
											<input type="hidden" value="1" id="pagination_glsn_member" />
										<?php } ?>
				  </div>  
				</div> 
		</div>

</div>

</div>
</section>

<script>
function loadmore_glsn(){
	var page=parseInt($("#pagination_glsn").val())+1;
	$("#pagination_glsn").val(page);
	$.post(baseurl+"site/landing/load_glsn_news",{"page":page},function(data){
		var data=JSON.parse(data);
		if(data.status==1){
			$("#append_glsn_news").append(data.html);
			if(data.pagination==0){
				$("#loadmore_glsn").hide();
			}
		}
	})
}

function loadmore_glsn_member(){
	var page=parseInt($("#pagination_glsn_member").val())+1;
	$("#pagination_glsn_member").val(page);
	$.post(baseurl+"site/landing/load_glsn_members_news",{"page":page},function(data){
		var data=JSON.parse(data);
		if(data.status==1){
			$("#append_glsn_members_news").append(data.html);
			if(data.pagination==0){
				$("#loadmore_glsn_member").hide();
			}
		}
	})
}

function show(id){
	$(".read_more_btn_"+id).hide();
	$(".short_desc_"+id).hide().fadeOut(1500);
	$(".full_desc_"+id).show().fadeIn(1500);
}
function mshow(id){
	$(".mread_more_btn_"+id).hide();
	$(".mshort_desc_"+id).hide().fadeOut(1500);
	$(".mfull_desc_"+id).show().fadeIn(1500);
}
/*$(document).ready(function(){
	var news_id="<?php echo $news_id;?>";
	 $('html, body').animate({
        scrollTop: $("#news_id_"+news_id).offset().top
    }, 2000);
}); */
</script>
<?php $this->load->view('site/common/footer');?>