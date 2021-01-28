<?php $this->load->view('site/common/header');	?>
<section>

<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 member-innerpage-base">

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 banner-innerpage">

<img src="<?php echo base_url();?>images/site/upcoming.png" alt="GSLN">

<div class="container nopadd">

			<div class="banner-innercaption">

				 <h2>Upcoming Summits</h2>

				 <span>&nbsp;</span>

			</div>

</div>





</div>



</div>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-base margin-small upcoming-base" id="company-list">

<div class="container nopadd">

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 member-directory-inner  margin-small">

		<p class="para-default"><?php echo ucfirst(html_entity_decode($general_info->summits_text)); ?></p>
		<div class="table-responsive">
				<table style="width: 100%">

						<thead>

							   <tr>

										<th style="width: 20%">Summit Name</th>

										<th style="width: 20%">Date</th>

										<th style="width: 30%">Venue</th>
										<th style="width: 30%">Link</th>

									   

							   </tr>

						</thead>       

						<tbody>

								   <?php if($upcomming_summits->num_rows()>0){ foreach($upcomming_summits->result() as $upsummit){ ?>
								   <tr>

										<td><a href="#"><?php echo ucfirst($upsummit->name);?></a> </td>

										<td> <?php 
										$fromdate=date("F d",strtotime($upsummit->start_date));
										$todate=date("d, Y",strtotime($upsummit->end_date));
										echo $fromdate.' - '.$todate;?></td>

										<td>
										<p><?php echo ucfirst($upsummit->venue);?>,</p>
										<p><?php echo ucfirst($upsummit->city);?>,<?php echo ucfirst($upsummit->country);?>.</p>
										
										</td><td> 
										<?php
											$link=$upsummit->link;
											if($link!=""){
											if(strpos($link, "http://") !== false){ }
											else if(strpos($link, "https://") !== false){ }
											else { $link = "http://".$corp_website; }
											}
											else{
												$link="#";
											}
										?>
										<a href="<?php echo $link;?>" target="new">
										<?php if($upsummit->img!=""){?><img src="<?php echo base_url();?>images/site/summits/<?php echo $upsummit->img;?>"><?php }else{ ?>
										Link
										<?php }?>
										
										</a>
										</td>
										

								   </tr>   
								   <?php } } else{ ?>
								   <tr>
										<td colspan="3">No Summits Found.</td>
										
								   </tr>
								   <?php }?>	
								      

						</tbody>

							   

				 </table>

						</div>	  

</div>

</div>



</div>



</section>
<?php $this->load->view('site/common/footer');?>