<?php $this->load->view('include/header.php'); ?>

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-cogs"></i> MANAGE PROFILE</h2>
			
			
			<form id="add_user" class="login-form" role="form" method="post" action="<?php echo base_url(); ?>profile/do_addprofiles">
			
			<div class="manage">
				<div class="row">
				
							<?php if($this->session->flashdata('psuccess')){ ?>
							 <div class="alert alert-block  alert-success fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="fa fa-times"></i>
									</button>
									<strong></strong> <?php echo $this->session->flashdata('psuccess'); ?>
								</div>
							 
							<?php } ?>
							<?php if($this->session->flashdata('perror')){ ?>
								<div class="alert alert-block  alert-danger fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="fa fa-times"></i>
									</button>
									<strong></strong> <?php echo $this->session->flashdata('perror'); ?>
								</div>
							 
							<?php } ?>
							
							
					
							<div id="err_div" style="display: none" class="alert alert-block  alert-danger fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="fa fa-times"></i>
									</button>
									<span id="err_text"></span>
							</div>


						<?php for($i=0; $i < $NoOfProfiles; $i++){ ?>

							<div class="form-group text-left col-md-6">
								<label>Profile <?php echo $i+1; ?></label>
								<input id="<?php echo $i+1; ?>" type="text" name="profile[]" class="form-control iprofile" placeholder="" >
								<span id="err_<?php echo $i+1; ?>" style="color: red; display: none"> This field is required </span>
							</div>
							
						<?php } ?>
						
						<input type="hidden" name="NoOfProfiles" value="<?php echo $NoOfProfiles; ?>" class="form-control iprofile" placeholder="" >
						
				</div>
				<div class="row">
					<div class="col-md-2 pull-right">
						<button onclick="validate('<?php echo $NoOfProfiles; ?>')" class="btn btn-lg btn-primary btn-block btn-signin" type="button">Add Profiles</button>
					</div>
				</div>
			</div>
		    </form>
			
		</div>
	</div>
	

<?php $this->load->view('include/footer.php'); ?>

<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/additional-methods.min.js"></script>
<br />

<script type="text/javascript">
			
	function validate(NoOfProfiles){
		
		var error = "";
		var iserror = 0;
		for(var i = 1; i<= NoOfProfiles; i++){
			if($('#'+i).val().length <= 0){
				$('#err_'+i).show();
				iserror = 1;
				//error += "Profile"+i+", ";
			}else{
				$('#err_'+i).hide();
			}
		}
		
		if(iserror == 0){
			$("#err_div").hide();
			$("#add_user").submit();
		}
		//if(iserror == 1){
			//error = error.slice(0,-2);
			//error+=" are missing";
			
			//$("#err_text").text(error);
			//$("#err_div").show();
		//}else{
			//$("#err_div").hide();
			//$("#add_user").submit();
		//}
		
	}
				
</script>