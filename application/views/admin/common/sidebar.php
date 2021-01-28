  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  	<!-- sidebar: style can be found in sidebar.less -->
  	<section class="sidebar">
  		<ul class="sidebar-menu" data-widget="tree">
  			<!--Dashboard-->
  			<li <?php if ($this->uri->segment(3) != "dashboard") {
						echo 'menu-open';
					} ?>><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span>
  					<span class="pull-right-container"></span>
  				</a>
  			</li>
  			<li class="treeview open <?php if ($this->uri->segment(2) == "admin_settings" && $this->uri->segment(3) != "dashboard") {
											echo 'menu-open';
										} ?>"> <a href="#"><i class="fa fa-user"></i><span>Admin</span>
  					<span class="pull-right-container">
  						<i class="fa fa-angle-left pull-right"></i>
  					</span>
  				</a>
  				<ul class="treeview-menu" <?php if ($this->uri->segment(2) == "admin_settings" && $this->uri->segment(3) != "dashboard") {
												echo 'style="display:block"';
											} ?>>
  					<li <?php if ($this->uri->segment(3) == "edit_admin_settings") {
								echo 'class="active"';
							} ?>><a href="<?php echo base_url(); ?>admin/admin_settings/edit_admin_settings"><i class="fa fa-circle-o"></i>Settings</a></li>
  					<li <?php if ($this->uri->segment(3) == "edit_admin_settings") {
								echo 'class="active"';
							} ?>><a href="<?php echo base_url(); ?>admin/admin_settings/google_analytics"><i class="fa fa-circle-o"></i>Google Analytics</a></li>
  					<li <?php if ($this->uri->segment(3) == "edit_admin") {
								echo 'class="active"';
							} ?>><a href="<?php echo base_url(); ?>admin/admin_settings/edit_admin"><i class="fa fa-circle-o"></i>Change Password</a></li>
  				</ul>
  			</li>
			  <li class="treeview open <?php if ($this->uri->segment(2) == "post") {
											echo 'menu-open';
										} ?>"> <a href="#"><i class="fa fa-user"></i><span>POST</span>
  					<span class="pull-right-container">
  						<i class="fa fa-angle-left pull-right"></i>
  					</span>
  				</a>
  				<ul class="treeview-menu" <?php if ($this->uri->segment(2) == "post") {
												echo 'style="display:block"';
											} ?>>
  					<li <?php if ($this->uri->segment(3) == "add_post") {
								echo 'class="active"';
							} ?>><a href="<?php echo base_url(); ?>admin/post/add_post"><i class="fa fa-circle-o"></i>Create Post</a></li>
  					<li <?php if ($this->uri->segment(3) == "display_post_list") {
								echo 'class="active"';
							} ?>><a href="<?php echo base_url(); ?>admin/post/display_post_list"><i class="fa fa-circle-o"></i>View Post</a></li>
  				</ul>
  			</li>



  		</ul>
  	</section>
  	<!-- /.sidebar -->
  </aside>