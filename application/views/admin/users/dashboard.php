<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">

<!--breadcrumbs-->
<section class="content-header">
  <h1>Dashboard<small><?php echo $heading;?></small></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active">Students</li>
		<li class="active"><?php echo $heading;?></li>
      </ol>
  </section>
  <?php if($this->session->flashdata('error_type')!='' && $this->session->flashdata('alert_message')!='' ){?>
<div class="callout callout-info <?php if(($this->session->flashdata('error_type')=='error')){?>modal-danger<?php }else{ echo "alert-success";}?>">
											<a class="close" data-dismiss="modal" href="javascript:void(0);">×</a>

											<?php echo( $this->session->flashdata('alert_message'));?>
											<br>
</div>
	<?php } ?>
<!--End-breadcrumbs-->

<!--Action boxes-->
<section class="content">
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
			<div class="box">
			<div class="box-header">
              <h3 class="box-title">Students chart</h3>
            </div>
			 <div class="box-body">
           <div id="pie_chart" style="height:350px;" ></div>
		   </div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="box">
			<div class="box-header">
              <h3 class="box-title">Students details</h3>
            </div>
			 <div class="box-body">
			<!--<div class="widget-box widget-plain" id="dashboard_user_chart">-->
			  <!--<div class="center">
        <ul class="stat-boxes2">-->
		<div class="col-xs-12 col-sm-4 col-md-4">
			<div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo $new_user->num_rows();?></h3>
				  <p>New Students</p>
				</div>
				<a href="<?php echo base_url();?>admin/student/display_student_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				<div class="icon">
				  <i class="ion ion-ios-personadd"></i>
				</div>
			</div>
			</div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo $active_user->num_rows();?></h3>
				  <p>Active Students</p>
				</div>
				<a href="<?php echo base_url();?>admin/student/display_student_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				<div class="icon">
				  <i class="ion ion-ios-person"></i>
				</div>
			</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
			<div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo $user->num_rows();?></h3>
				  <p>Total Students</p>
				</div>
				<a href="<?php echo base_url();?>admin/student/display_student_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				<div class="icon">
				  <i class="ion ion-ios-person"></i>
				</div>
			</div>
			</div>
          <!--<li>
            <div class="left peity_bar_bad"><span><span style="display: none;"><span style="display: none;"><span style="display: none;"><span style="display: none;">3,5,6,16,8,10,6</span><canvas width="50" height="24"></canvas></span>
              <canvas width="50" height="24"></canvas>
              </span><canvas width="50" height="24"></canvas></span><canvas width="50" height="24"></canvas></span></div>
            <div class="right"> <strong><?php echo $new_user->num_rows();?></strong> New Users</div>
          </li>
          <li>
            <div class="left peity_line_good"><span><span style="display: none;"><span style="display: none;"><span style="display: none;"><span style="display: none;">12,6,9,23,14,10,17</span><canvas width="50" height="24"></canvas></span>
              <canvas width="50" height="24"></canvas>
              </span><canvas width="50" height="24"></canvas></span><canvas width="50" height="24"></canvas></span></div>
            <div class="right"> <strong><?php echo $active_user->num_rows();?></strong> Active Users </div>
          </li>
          <li>
            <div class="left peity_bar_good"><span><span style="display: none;">12,6,9,23,14,10,13</span><canvas width="50" height="24"></canvas></span></div>
            <div class="right"> <strong><?php echo $user->num_rows();?></strong> Total Users</div>
          </li> 
         </ul>
      </div>-->
	  </div>
		</div>
	</div>
	</div>
</section>
 
<script type="text/javascript" src="<?php echo base_url();?>js/admin/loader.js"></script>
<script type="text/javascript">
       google.charts.load("current", {packages:["bar"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Completed Bookings'],
          <?php if(!empty($top_users) && count($top_users->result())>0){ foreach($top_users->result() as $ttsker){ if($ttsker->username!=""){ ?>
			['<?php echo $ttsker->username;?>',    <?php echo $ttsker->bcount;?>],  
		  <?php  }}} else { ?>
		  ['No Task ',     0]
         <?php } ?> 
        ]);

       var options = {
          title: 'Top Student based on bookings',
          width: "100%",
          legend: { position: 'none' },
		   colors: ['#dc3912'],
          chart: { title: 'Top Student based on bookings',
                   subtitle: 'popularity by bookings' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'bottom', label: 'Student Bookings'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('pie_chart'));
        chart.draw(data, options);
      }
	  
    </script>
</div>
<?php $this->load->view('admin/common/footer');?>
