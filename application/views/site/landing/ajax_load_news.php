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