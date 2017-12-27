<?php 
$this->load->view('include/header.php');
?>

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-edit"></i> EDIT EVENT</h2>
			<div class="card-register card-container-register text-center">
            <p id="profile-name" class="profile-name-card"></p>
				<div class="row">
					<div class="col-md-12">
					
					<form method="post" action="<?php echo base_url(); ?>profile/update_event" enctype="multipart/form-data">
					
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
							
							
						<div class="form-group text-left">
							<label>Event Name</label>
							<input name="name" type="text" id="inputEmaidfl" class="form-control" value="<?php echo $event->EventName; ?>" >
							<input name="id" type="hidden" value="<?php echo $event->ID; ?>">
						</div>
						
						<div class="form-group text-left col-md-12">
							<div class="col-md-6">
								<label>Event Image</label>
								<input name="image" type="file" id="UserPhoto" class="form-control" placeholder="" >
							</div>
							<div class="col-md-6">
								<img style="width: 50%; float: right; border: 2px solid #d3c8c8;" src="<?php echo base_url().'uploads/companies/'.$event->EventImage; ?>" id="userImage" />
							</div>
						</div>
						
						<div class="form-group text-left">
							<label>Event Date</label>
							<input name="date" type="date" id="inputDate" class="form-control" value="<?php echo date('Y-m-d', strtotime($event->EventDate)); ?>" >
						</div>
						<div class="form-group text-left">
							<label>Event Address</label>
							<input name="address" type="text" id="infputEmail" class="form-control" value="<?php echo $event->EventAddress; ?>" >
						</div>
						
						<div class="form-group text-left">
							<label>Freeform Text</label>
							<input name="freeformtext" type="text" id="inputfreetext" class="form-control" value="<?php echo $event->FreeFormText; ?>" placeholder="" >
						</div>
						
						<div class="form-group text-left">
							<label>Extra Price</label>
							<input name="extraprice" type="text" id="inputextraprice" class="form-control" value="<?php echo $event->ExtraPrice; ?>" placeholder="" >
						</div>
						
						<div style="display: none" class="form-group text-left">
							<a href="#" class="btn btn-lg btn-success btn-block btn-signin" data-toggle="modal" data-target="#addprofiles">Add Profiles</a>
						</div>
						<div class="form-group text-left">
							<button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">Update</button>
							</div>
						
					</form>
						
					</div>
				</div>
        </div><!-- /card-container -->
		</div>
</div>

<?php 
$this->load->view('include/footer.php');
?>

<script>

function forceNumeric(){
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g,''));
}
$('body').on('propertychange input', 'input[name="extraprice"]', forceNumeric); 

function readURL(input) {
            
			if (input.files && input.files[0]) {
                    
					var reader = new FileReader();
                                        
                    reader.onload = function (e) {
                        $('#userImage').attr('src', e.target.result);
                    }
                                        
                    reader.readAsDataURL(input.files[0]);
            }
    }
                                        
    $("#UserPhoto").change(function(){
            readURL(this);
    });

</script>