<?php 
$this->load->view('include/header.php');
?>

<div class="content">
		<div class="container">
			<h2 class="text-center"> EVENT Detail</h2>
			<div class="card-register card-container-register text-center">
            <p id="profile-name" class="profile-name-card"></p>
				<div class="row">
					<div class="col-md-12">
					
					
												
						<div class="form-group text-left col-md-6">
						
							<?php if(strlen($event->EventImage) <= 0){ $image = 'default.png'; }else{ $image = $event->EventImage; }?>
						
							<img style="width: 100%; float: left; border: 2px solid #d3c8c8;" src="<?php echo base_url().'uploads/events/'.$image; ?>" id="userImage" />
						</div>
						<div class="form-group text-left col-md-6">
							<p><label><b>Event Name:</b> <?php echo $event->EventName; ?></label></p>
							<p><label><b>Event Date:</b> <?php echo date('Y-m-d', strtotime($event->EventDate)); ?></label></p>
							<p><label><b>Event Address:</b> <?php echo $event->EventAddress; ?></label></p>
							<p><label><b>Freeform Text:</b> <?php echo $event->FreeFormText; ?></label></p>
							<p><label><b>Extra Price:</b> <?php echo $event->ExtraPrice; ?></label></p>
						</div>
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