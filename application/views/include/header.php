<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>VERIFAN</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- =======================================================
        Theme Name: MyBiz
        Theme URL: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/
        Author: BootstrapMade.com
        Author URL: https://bootstrapmade.com
    ======================================================= -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	
</head>		

<header id="home">

		<div id="main-nav">

			<nav class="navbar">
				<div class="container">

					<div class="navbar-header">
						<a href="<?php echo base_url(); ?>home" class="navbar-brand">VERIFAN</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
							<span class="sr-only">Toggle</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="navbar-collapse collapse" id="ftheme">

					
					<?php if(isset($this->session->userdata['company'])){ ?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo base_url(); ?>profile">Add Profiles</a></li>
							<li><a href="<?php echo base_url(); ?>profile/manageprofiles">Profiles</a></li>
							<li><a href="<?php echo base_url(); ?>profile/manageevents">Events</a></li>
							
							<li>
							
							<a href="<?php echo base_url().'profile/api_messages'; ?>">
								<i class="fa fa-bell"></i>
								<span id="cnt_msg" class="badge" style="margin-top:-10px;">0</span>
							</a>
							
							<!--<div class="db-TopLink">
							<a href="<?php //echo base_url().'profile/api_messages'; ?>" class="db-TopLink-link db-DisableClickOutside--notifications db-TopLink-link--notifications db-is-animating"></a>
							<span id="cnt_msg" class="db-TopLink-badge">0</span>
							</div>-->
						
							</li>
							
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url(); ?>profile/account">Profile</a></li>
									<li><a href="<?php echo base_url(); ?>profile/update_password">Change Password</a></li>
									<li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
								</ul>
							</li>
						</ul>
						
					<?php }else{ ?>
					
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo base_url(); ?>home">home</a></li>
							<li><a href="<?php echo base_url(); ?>login/register">join now</a></li>
							<li><a href="<?php echo base_url(); ?>login">login</a></li>
							<li><a href="<?php echo base_url(); ?>support">support</a></li>
						</ul>
					
					<?php } ?>

					</div>
					
					<div class="search-form">
	                    <form>
	                        <input type="text" id="s" size="40" placeholder="Search..." />
	                    </form>
	                </div>

				</div>
			</nav>
		</div>

</header>

