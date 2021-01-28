<?php $this->load->view('site/common/header');	?>
<section>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 news-base news-gsln-new">

<div class="container">

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 news-inner" id="tab_members_news_list_html">


<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 news-details"><h3 class="sub-head">News</h3>
<div class="add_listing_btn text-right">
<button type="button" id="submit_member_news_btn" class="submit-btn themebtn">Submit News</button>
</div>
<div class="table-responsive">
<table border="1" cellpadding="2" class="payment_table" width="100%" id="leaderboard_table">
	<thead class="payment_history_head">
			<tr>
					<th class="payment_1">S.no</th>
					<th class="payment_3">Subject</th>
					<th class="payment_3">Post type</th>
					<th class="payment_3">Archieve</th>
					<th class="payment_3">Status</th>
					<th class="payment_5">Action</th>
			</tr>
		</thead>
		<tbody id="payment_history_table_guru">
							<?php if($news_list->num_rows()==0){?>
							<tr>
							<td colspan="6">
									<p class="not_found">No list found.</p>
							</td>
							</tr>
							<?php } else{ $i=1; foreach($news_list->result() as $news){ ?>
							<tr>
								<td class="payment_1"><?php echo $i;$i++;?></td>
								<td class="payment_3"><?php echo $news->title;?></td>
								<td class="payment_3"><?php if($news->post_type==0){ echo "Members";} else { echo "Industry";} ?></td>
								<td class="payment_3"><?php 
										if($news->archive=="1week"){ echo "1 Week";}
										else if($news->archive=="1month"){ echo "1 Month";}
										else if($news->archive=="3months"){ echo "3 Months";}
										else if($news->archive=="6months"){ echo "6 Months";}
										
								
								?></td>
								<td class="payment_5"><?php if($news->status=="1"){ 
								if(date("Y-m-d",strtotime($news->archeived_date))<date("Y-m-d")){
									echo "Archieved";
								}else{ echo "Active";} }
								else{
								if(date("Y-m-d",strtotime($news->archeived_date))<date("Y-m-d")){
									echo "Archieved";
								}else{ echo "Pending";}	
								}
								?></td>
								<td class="payment_5"><?php if($news->status=="0"){ ?>
								 <a href="javascript:void(0);" class="edit_member_news_btn" data-id="<?php echo $news->id;?>">Edit </a>
								<?php }	?>
								 <a href="javascript:void(0);" class="delete_member_news_btn" data-id="<?php echo $news->id;?>">Delete </a>
								</td>
			                </tr>
							<?php }}?>	
		</tbody>
</table>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-right margin-small">
                                    <a href="<?php echo base_url("dashboard");?>" class="backbtn"><span class="arrow-icon"><img src="<?php echo base_url();?>images/site/back-icon.png"></span>Back</a>

									

							</div>
</div>
</div>

</div>
</div>
</section>
<?php $this->load->view('site/common/footer');?>