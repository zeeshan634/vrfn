<?php 
$this->load->view('include/header.php');
?>
<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-question-circle"></i> Forgot Password</h2>
			<div class="card card-container text-center">
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url(); ?>assets/images/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="<?php echo base_url(); ?>login/forgot_password">
			
			    <?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger display-hide">
								<button class="close" data-close="alert"></button>
								<?php echo $this->session->flashdata('error'); ?>
                            </div>
                <?php } ?>
								   
			    <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                <?php } ?>	
			
                <h4>Enter your email id to recover password</h4>
				<div class="form-group">
					<label>Email</label>
					<input name="email" type="email" id="inputEmail" class="form-control" placeholder="" >
				</div>
               
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin" style="margin:0 auto;" >Recover</button>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
		</div>
	</div>
	

<?php 
$this->load->view('include/footer.php');
?>