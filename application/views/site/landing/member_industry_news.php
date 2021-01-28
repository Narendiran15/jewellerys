<?php $this->load->view('site/common/header');	?>

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

	<div class="container">   

<div class="news-container-base col-lg-12 col-sm-12 col-xs-12 col-md-12" >

					 <?php if($news_details->num_rows()>0){ ?>
					<div class="news-container-inner col-lg-12 col-sm-12 col-xs-12 col-md-12" >

							<h5><?php echo date("M d,Y",strtotime($news_details->row()->post_date));?></h5>
							<h5><?php echo html_entity_decode($news_details->row()->title);?></h5>
							<div class="  " >
								<p> <?php echo html_entity_decode($news_details->row()->content);?></p>
							</div>
							

					</div>
					<?php }else{ ?>
					 <h4>No News found...</h4>
					 <?php } ?>

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