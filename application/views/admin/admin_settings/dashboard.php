<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">
	<!--breadcrumbs-->
	<section class="content-header">
		<h1>Dashboard</h1>
		<!--<ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active">Admin</li>
		<li class="active"><?php echo $heading; ?></li>
      </ol>-->
	</section>
	<!--End-breadcrumbs-->

	<!--Action boxes-->
	<section class="content">
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php echo $total_post->row()->total_post; ?></h3>
						<p>Total Post</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-person"></i>
					</div>
					<a href="<?php echo base_url(); ?>admin/members/display_all_members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php echo $total_application->total_application; ?></h3>
						<p>Total Application</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-person"></i>
					</div>
					<a href="<?php echo base_url(); ?>admin/members/display_all_members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<?php
			 foreach($post as $posts) { ?>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php echo $posts['total']; ?></h3>
						<p><?php echo $posts['name']; ?></p>
						<!--p><?php echo $post->id; ?></p-->
					</div>
					<div class="icon">
						<i class="ion ion-ios-person"></i>
					</div>
					<a href="<?php echo base_url(); ?>admin/members/display_all_members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script>
	/*for google charts */

	google.charts.load('current', {
		'packages': ['geochart', 'corechart']
	});
	google.charts.setOnLoadCallback(drawRegionsMap);

	function drawRegionsMap() {

		var data = google.visualization.arrayToDataTable(<?php echo json_encode($countriesData) ?>);

		var options = {
			colorAxis: {
				colors: ['#00c0ef', '#dd4b39', '#0073b7'],
				minValue: 0,
				maxValue: 2
			},
			backgroundColor: {
				fill: '#00c0ef'
			}
		};

		var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

		chart.draw(data, options);

		function resizeHandler() {
			chart.draw(data, options);
		}

		if (window.addEventListener) {
			window.addEventListener('resize', resizeHandler, false);
		} else if (window.attachEvent) {
			window.attachEvent('onresize', resizeHandler);
		}
	}
</script>

<?php $this->load->view('admin/common/footer.php'); ?>