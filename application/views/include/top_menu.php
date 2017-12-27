</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div style="visibility: hidden" class="page-logo">
			<a href="<?=base_url()?>admin">
			<img src="<?=base_url()?>assets/images/logo.png" alt="logo" class="logo-default" style="width:90px;"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
       
	  	<?php
          $sess_data=$this->session->userdata['company'];
			?>
        
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!--<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username">
					<i class="fa fa-bell"></i></span><span class="badge" id="not_cnt">0</span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul id='notificationMenu' class="dropdown-menu dropdown-menu-default notification-dropdown" style="width:300px;">
					
					</ul>
				</li>-->
				
				<?php if(isset($this->session->userdata['company'])){ ?>
				
					<li class="dropdown dropdown-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="<?=base_url()?>uploads/companies/<?php echo $sess_data->Logo; ?>"/>
						<span class="username username-hide-on-mobile">
						<?=$sess_data->CompanyName?> </span>
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="<?php echo base_url(); ?>profile">
								<i class="icon-user"></i> My Profile </a>
							</li>
							
							<li>
								<a href="<?=base_url()?>logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
				<!-- END USER LOGIN DROPDOWN -->
				
				<?php }else{ ?>
					<a style="color: white" href="<?php echo base_url().'login' ?>">Login</a>
				<?php } ?>
			
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>