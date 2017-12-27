	<!-- BEGIN SIDEBAR -->

	<div class="page-sidebar-wrapper">

		<div class="page-sidebar navbar-collapse collapse">

			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->

				<li class="sidebar-toggler-wrapper">

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler">

					</div>

					<!-- END SIDEBAR TOGGLER BUTTON -->

				</li>

			<?php $sess_data=$this->session->userdata('admin'); ?>			

                <!--<li class="start <?php if($this->uri->segment(2)=='' || $this->uri->segment(2)=="home") {?> active <?php } ?>">
					<a href="<?=base_url()?>admin/home">
					<i class="icon-home"></i>
					<span class="title">Dashboard </span>
                    <?php if($this->uri->segment(2)=='' || $this->uri->segment(2)=="home") {?>
                    <span class="selected"></span>
                    <?php } ?>				
					</a>				
				</li>-->
                </br>
				
                <li class="<?php if($this->uri->segment(2)=="member") {?> active open<?php } ?>">
					<a href="javascript:;">
					<i class="icon-users"></i>
					<span class="title">Users Management</span>
					<span class="arrow <?php if($this->uri->segment(2)=="member") {?> open<?php } ?> "></span>
					</a>
									
					<ul class="sub-menu">
						<li <?php if($this->uri->segment(2) == 'member' && ($this->uri->segment(3)=='' || $this->uri->segment(3)=='applicant')){echo "class='active'";} ?>>
							<a href="<?=base_url()?>admin/member/users">
							<i class="icon-user"></i>
							Users</a>
						</li>

					</ul>
					
				</li>

                 <li class="<?php if($this->uri->segment(2)=="events") {?> active open<?php } ?>">
					<a href="javascript:;">
					<i class="icon-users"></i>
					<span class="title">Events Management</span>
					<span class="arrow <?php if($this->uri->segment(2)=="events") {?> open<?php } ?> "></span>
					</a>
									
					<ul class="sub-menu">
						<li <?php if($this->uri->segment(2) == 'events'){echo "class='active'";} ?>>
							<a href="<?=base_url()?>admin/events/add_event">
							<i class="icon-user"></i>
							Add Events</a>
						</li>
						
						<li <?php if($this->uri->segment(2) == 'events'){echo "class='active'";} ?>>
							<a href="<?=base_url()?>admin/events">
							<i class="icon-user"></i>
							View Events</a>
						</li>
						
						<li <?php if($this->uri->segment(2) == 'events'){echo "class='active'";} ?>>
							<a href="<?=base_url()?>admin/events/registration_urls">
							<i class="icon-user"></i>
							Registered URL’s</a>
						</li>

					</ul>
					
				</li>
				
				
				
				<li class="<?php if($this->uri->segment(2)=="orders") {?> active open<?php } ?>">
					<a href="javascript:;">
					<i class="icon-users"></i>
					<span class="title">Orders</span>
					<span class="arrow <?php if($this->uri->segment(2)=="orders") {?> open<?php } ?> "></span>
					</a>
									
					<ul class="sub-menu">
						<li <?php if($this->uri->segment(2) == 'orders'){echo "class='active'";} ?>>
							<a href="<?=base_url()?>admin/orders/plans">
							<i class="icon-user"></i>
							Plans</a>
						</li>
						
						<li <?php if($this->uri->segment(2) == 'orders'){echo "class='active'";} ?>>
							<a href="<?=base_url()?>admin/orders/extras">
							<i class="icon-user"></i>
							Extras</a>
						</li>
					</ul>
					
				</li>
				
                
                
				</ul>

			<!-- END SIDEBAR MENU -->

		</div>

	</div>

	<!-- END SIDEBAR -->