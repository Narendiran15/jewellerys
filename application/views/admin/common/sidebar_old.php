  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
	  <!--Dashboard-->
       <li <?php if($this->uri->segment(3)!="dashboard"){ echo 'menu-open';}?>><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span>
				<span class="pull-right-container"></span>
				</a>
       </li>
	  <?php if($prev==1){?>
		<!--Admin Menu-->
        <li class="treeview open <?php if($this->uri->segment(2)=="admin_settings" && $this->uri->segment(3)!="dashboard"){ echo 'menu-open';}?>"> <a href="#"><i class="fa fa-user"></i><span>Admin</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="admin_settings" && $this->uri->segment(3)!="dashboard"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="edit_admin_settings"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/admin_settings/edit_admin_settings"><i class="fa fa-circle-o"></i>Settings</a></li>
				<li <?php if($this->uri->segment(3)=="edit_admin_settings"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/admin_settings/google_analytics"><i class="fa fa-circle-o"></i>Google Analytics</a></li>
				<li <?php if($this->uri->segment(3)=="edit_admin"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/admin_settings/edit_admin"><i class="fa fa-circle-o"></i>Change Password</a></li>				
			</ul>
        </li>
		
		<?php } ?>
		<!--<li class="treeview open <?php if($this->uri->segment(2)=="banners"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-square"></i> <span>Banners</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="banners"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_banners_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/banners/display_banners_list"><i class="fa fa-circle-o"></i>Banners List</a></li>
					<?php if($prev==1 || (!empty($Banners) && in_array('1',$Banners))){ ?>
				<li <?php if($this->uri->segment(3)=="add_banner"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/banners/add_banner"><i class="fa fa-circle-o"></i>Add Banner</a></li>
					<?php }?>
				
			</ul>
        </li>-->
		<li class="treeview open <?php if($this->uri->segment(2)=="summits"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-square"></i> <span>Summits</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="summits"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_summits_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/summits/display_summits_list"><i class="fa fa-circle-o"></i>Summits List</a></li>
					
				<li <?php if($this->uri->segment(3)=="add_summits"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/summits/add_summits"><i class="fa fa-circle-o"></i>Add Summits</a></li>
				<li <?php if($this->uri->segment(3)=="display_summits_gallery"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/summits/display_summits_gallery"><i class="fa fa-circle-o"></i>Summits Gallery</a></li>
					
				<li <?php if($this->uri->segment(3)=="assign_summits"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/summits/assign_summits"><i class="fa fa-circle-o"></i>Assign Summits</a></li>
				
				
			</ul>
        </li>
		<li class="treeview open <?php if($this->uri->segment(2)=="news"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-square"></i> <span>News</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="news"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_news_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/news/display_news_list"><i class="fa fa-circle-o"></i>News List</a></li>
					<?php if($prev==1 || (!empty($News) && in_array('1',$News))){ ?>
				<li <?php if($this->uri->segment(3)=="add_new"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/news/add_new"><i class="fa fa-circle-o"></i>Add New</a></li>
					<?php }?>
				<li <?php if($this->uri->segment(3)=="display_members_news_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/news/display_members_news_list"><i class="fa fa-circle-o"></i>Members News List</a></li>
				<li <?php if($this->uri->segment(3)=="display_industry_news_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/news/display_industry_news_list"><i class="fa fa-circle-o"></i>Industry News List</a></li>
				
				<?php if($prev==1 || (!empty($News) && in_array('1',$News))){ ?>
				<li <?php if($this->uri->segment(3)=="add_members_news"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/news/add_members_news"><i class="fa fa-circle-o"></i>Add Members News</a></li>
				<?php }?>
			</ul>
        </li>
		<li <?php if($this->uri->segment(3)=="edit_fees"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/fees/edit_fees"><i class="fa fa-money"></i>Edit Fee</a></li>
		<li <?php if($this->uri->segment(3)=="edit_fees"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/fees/edit_fees_text"><i class="fa fa-money"></i>Edit Fee Text</a></li>
		<li class="treeview open <?php if($this->uri->segment(2)=="users"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-users"></i> <span>Users</span>
				<span class="pull-right-container">
				<small class="label pull-right bg-green">
					
				</small>
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="users"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_users_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/users/display_users_list"><i class="fa fa-circle-o"></i>Users List</a></li>
					
				<li <?php if($this->uri->segment(3)=="add_users"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/users/add_users"><i class="fa fa-circle-o"></i>Add User</a></li>
					
				
			</ul>
        </li>
		<li class="treeview open <?php if($this->uri->segment(2)=="members"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-user"></i> <span>Members</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="members"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_all_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_all_members"><i class="fa fa-circle-o"></i>All Members</a></li>
				<li <?php if($this->uri->segment(3)=="display_new_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_new_members"><i class="fa fa-circle-o"></i>New Members </a></li>
				<li <?php if($this->uri->segment(3)=="display_pending_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_pending_members"><i class="fa fa-circle-o"></i>Pending Members </a></li>
				<li <?php if($this->uri->segment(3)=="display_active_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_active_members"><i class="fa fa-circle-o"></i>Active Members </a></li>
				<li <?php if($this->uri->segment(3)=="display_hold_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_hold_members"><i class="fa fa-circle-o"></i>Hold Members </a></li>
				<li <?php if($this->uri->segment(3)=="display_terminated_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_terminated_members"><i class="fa fa-circle-o"></i>Terminated Members </a></li>
				<li <?php if($this->uri->segment(3)=="display_prime_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_prime_members"><i class="fa fa-circle-o"></i>Prime Members </a></li>
				<li <?php if($this->uri->segment(3)=="display_regular_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_regular_members"><i class="fa fa-circle-o"></i>Regular Members </a></li>
				<li <?php if($this->uri->segment(3)=="display_founder_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_founder_members"><i class="fa fa-circle-o"></i>Founder Members </a></li>
				<li <?php if($this->uri->segment(3)=="display_associate_members"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/members/display_associate_members"><i class="fa fa-circle-o"></i>Associate Members </a></li>
				
					
				
			</ul>
        </li>
	   <li class="treeview open <?php if($this->uri->segment(2)=="office"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-user"></i> <span>Offices</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="office"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_all_offices"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/office/display_all_offices"><i class="fa fa-circle-o"></i>All Offices</a></li>
				<li <?php if($this->uri->segment(3)=="display_new_offices"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/office/display_new_offices"><i class="fa fa-circle-o"></i>New Offices </a></li>
				<li <?php if($this->uri->segment(3)=="display_pending_offices"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/office/display_pending_offices"><i class="fa fa-circle-o"></i>Pending Offices </a></li>
				<li <?php if($this->uri->segment(3)=="display_active_offices"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/office/display_active_offices"><i class="fa fa-circle-o"></i>Active Offices </a></li>
				<li <?php if($this->uri->segment(3)=="display_hold_offices"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/office/display_hold_offices"><i class="fa fa-circle-o"></i>Hold Offices </a></li>
				<li <?php if($this->uri->segment(3)=="display_terminated_offices"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/office/display_terminated_offices"><i class="fa fa-circle-o"></i>Terminated Offices </a></li>
				
			</ul>
        </li>
	    <li class="treeview open <?php if($this->uri->segment(2)=="advertisings"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-book"></i> <span>Advertisings</span>
				<span class="pull-right-container">
				<i class="fa fa-b-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="advertisings"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(4)=="active"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/advertisings/display_advertisings_list/active"><i class="fa fa-circle-o"></i>Active Advertisings</a></li>			   
			    <li <?php if($this->uri->segment(4)=="hold"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/advertisings/display_advertisings_list/hold"><i class="fa fa-circle-o"></i>Hold Advertisings</a></li>			   
			    <li <?php if($this->uri->segment(4)=="pending"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/advertisings/display_advertisings_list/pending"><i class="fa fa-circle-o"></i>Pending Advertisings</a></li>			   
			    <li <?php if($this->uri->segment(4)=="terminated"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/advertisings/display_advertisings_list/terminate"><i class="fa fa-circle-o"></i>Terminated Advertisings</a></li>	
				<li <?php if($this->uri->segment(4)=="add_advertisings"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/advertisings/add_advertisings"><i class="fa fa-circle-o"></i>Add Advertisings</a></li>			   
			</ul>
        </li>
		 <li class="treeview open <?php if($this->uri->segment(2)=="contact"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-phone"></i> <span>Contact</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="contact"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_contact_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/contact/display_contact_list"><i class="fa fa-circle-o"></i>Contact List</a></li>
			  
			</ul>
        </li>
		<li class="treeview open <?php if($this->uri->segment(2)=="invoice"){ echo 'menu-open';}?>"><a href="#"><i class="fa fa-usd"></i> <span>Invoice</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="invoice"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_invoice_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/invoice/display_invoice_list"><i class="fa fa-circle-o"></i>Invoice List</a></li>
				
			</ul>
        </li>
		<li class="treeview open <?php if($this->uri->segment(2)=="fileuploads"){ echo 'menu-open';}?>"><a href="#"><i class="fa fa-folder"></i> <span>File uploads</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="fileuploads"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_fileuploads"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/fileuploads/display_fileuploads"><i class="fa fa-circle-o"></i>File uploads</a></li>
				
			</ul>
        </li>
		<li class="treeview open <?php if($this->uri->segment(2)=="country"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-tasks"></i> <span>Country</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="country"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_country_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/country/display_country_list"><i class="fa fa-circle-o"></i>Country List</a></li>
				<li <?php if($this->uri->segment(3)=="add_country"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/country/add_country"><i class="fa fa-circle-o"></i>Add Country</a></li>				
						
			</ul>
        </li>
			
		<li class="treeview open <?php if($this->uri->segment(2)=="iata"){ echo 'menu-open';}?>"><a href="#"><i class="fa fa-list"></i> <span>Iata</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="iata"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_iata_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/iata/display_iata_list"><i class="fa fa-circle-o"></i>IATA List</a></li>
				<li <?php if($this->uri->segment(3)=="add_iata"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/iata/add_iata"><i class="fa fa-circle-o"></i>Add Iata</a></li>
				
			</ul>
        </li>		
		
		<li class="treeview open <?php if($this->uri->segment(2)=="referals"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-money"></i> <span>Referals</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="referals"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_referal_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/referals/display_referal_list"><i class="fa fa-circle-o"></i>Display Referals list</a></li>
					
			</ul>
        </li>
		
		<li class="treeview open <?php if($this->uri->segment(2)=="cms"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-tasks"></i> <span>CMS Pages</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="cms"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_cms_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/cms/display_cms_list"><i class="fa fa-circle-o"></i>CMS pages List</a></li>
					<?php if($prev==1 || (!empty($Cms) && in_array('1',$Cms))){ ?>
				<li <?php if($this->uri->segment(3)=="add_cms"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/cms/add_cms"><i class="fa fa-circle-o"></i>Add cms page</a></li>
					<?php } ?>
				  <li <?php if($this->uri->segment(3)=="edit_contact"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/contact/edit_contact"><i class="fa fa-circle-o"></i>Edit Homepage & Contact Texts</a></li>	
			</ul>
        </li>
		
		<!--Edit Template Menu-->
		
		
		<li class="treeview open <?php if($this->uri->segment(2)=="emailtemp"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-envelope-o"></i> <span>Email Templates</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="emailtemp"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_email_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/emailtemp/display_email_list"><i class="fa fa-circle-o"></i>Display Email Templates</a></li>
					<?php if($prev==1 || (!empty($Email) && in_array('1',$Email))){ ?>
				<li <?php if($this->uri->segment(3)=="add_email"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/emailtemp/add_email"><i class="fa fa-circle-o"></i>Add Email Template</a></li>
					<?php } ?>
			</ul>
        </li>
		
		
		<li class="treeview open <?php if($this->uri->segment(2)=="mailing_list"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-tasks"></i> <span>Mailing Lists</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="mailing_list"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(4)=="public"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/mailing_list/display_mail_list/public"><i class="fa fa-circle-o"></i>Public List</a></li>
				<li <?php if($this->uri->segment(4)=="member"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/mailing_list/display_mail_list/member"><i class="fa fa-circle-o"></i>Members List</a></li>
				<li <?php if($this->uri->segment(4)=="refernce"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/mailing_list/display_mail_list/reference"><i class="fa fa-circle-o"></i>Reference List</a></li>
					<?php if($prev==1){ ?>
				<li <?php if($this->uri->segment(3)=="add_mailing_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/mailing_list/add_mailing_list"><i class="fa fa-circle-o"></i>Add Mailing List</a></li>
					<?php } ?>
				
				
			</ul>
        </li>
			 
	<li class="treeview open <?php if($this->uri->segment(2)=="questions"){ echo 'menu-open';}?>"><a href="#"><i class="fa  fa-question"></i> <span>Questions & Email Templates</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
				</a>
			<ul class="treeview-menu" <?php if($this->uri->segment(2)=="questions"){ echo 'style="display:block"';}?>>
				<li <?php if($this->uri->segment(3)=="display_questions_list"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/questions/display_questions_list"><i class="fa fa-circle-o"></i>Display Questions List </a></li>
					<?php if($prev==1 || (!empty($Email) && in_array('1',$Email))){ ?>
				<li <?php if($this->uri->segment(3)=="add_questions"){ echo 'class="active"';}?>><a href="<?php echo base_url();?>admin/questions/add_questions"><i class="fa fa-circle-o"></i>Add Questions & Email Template</a></li>
					<?php } ?>
			</ul>
        </li>
	
	</ul>
    </section>
    <!-- /.sidebar -->
  </aside>