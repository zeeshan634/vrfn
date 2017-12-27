<?php 
$this->load->view('include/header.php');
?>
<div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">Update Password</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="main-content">
	<section id="content">
      <div class="container">
        <div class="row">
			<div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
				<h3>
					<i class="fa fa-key"></i> Update Password
				</h3>
				
				<div class="card-register card-container-register text-center">
				
				<img id="profile-img" class="profile-img-card" src="<?php echo base_url(); ?>assets/images/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
				
					<form class="form-signin" role="form" method="post" action="<?php echo base_url(); ?>login/change_password">
                            <?php if($this->session->flashdata('success')){ ?>
							 <div class="alert alert-block  alert-success fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="fa fa-times"></i>
									</button>
									<strong></strong> <?php echo $this->session->flashdata('success'); ?>
								</div>
							 
							<?php } ?>
							
							<?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger display-hide">
								<button class="close" data-close="alert"></button>
								<?php echo $this->session->flashdata('error'); ?>
                            </div>
                <?php } ?>
							
						
						<input type="hidden" name="ResetPassword" value="<?php echo $ResetPassword; ?>" >
												
						<div class="form-group is-empty">
						  <div class="input-icon">
							
							<input type="password" class="form-control" name="new_password"  id="n-pwd" placeholder="New  Password">
						  </div>
						<span class="material-input"></span></div>                  
						<div class="form-group is-empty">
						  <div class="input-icon">
							
							<input type="password" class="form-control" name="c-password" id="rt-pwd" placeholder="Retype New  Password">
						  </div>
						<span class="material-input"></span></div>  
						<div style="display:flow-root;"><span class="col-md-6"><button type="submit" class="btn btn-lg btn-primary">Save</button></span>
						<span class="col-md-6"><button type="button" class="btn btn-danger log-btn">Cancel</button></span></div>
					</form>
					
				</div>
			</div>
			</div>
		</div>
	</div>
	</section>
	  		
</div>
	

<?php 
$this->load->view('include/footer.php');
?>