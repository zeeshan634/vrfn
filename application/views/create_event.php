<?php 
$this->load->view('include/header.php');
?>

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-pencil"></i> CREATE EVENT</h2>
			<div class="card-register card-container-register text-center">
            <p id="profile-name" class="profile-name-card"></p>
				<div class="row">
					<div class="col-md-12">
					
					<form id="add_user" method="post" action="<?php echo base_url(); ?>profile/add_event" enctype="multipart/form-data">
					
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
							<input name="name" type="text" id="inputnameasd" class="form-control" placeholder="" >
						</div>
						
						<div class="form-group text-left">
							<label>Event Image</label>
							<input name="image" type="file" id="inputimage" class="form-control" placeholder="" >
						</div>
						
						<div class="form-group text-left">
							<label>Event Date</label>
							<input name="date" type="date" id="inputEmailsd" class="form-control" placeholder="" >
						</div>
						<div class="form-group text-left">
							<label>Event Address</label>
							<input name="address" type="text" id="inputEmailsadad" class="form-control" placeholder="" >
						</div>
						<div class="form-group text-left">
							<label>Registration Deadline</label>
							<input name="deadline" type="date" id="inputEmailsdf" class="form-control" placeholder="" >
						</div>
						<div class="form-group text-left">
							<label>Freeform Text</label>
							<input name="freeformtext" type="text" id="inputfreetext" class="form-control" placeholder="" >
						</div>
						
						<div class="form-group text-left">
							<label>Extra Price</label>
							<input name="extraprice" type="text" id="inputextraprice" class="form-control" placeholder="" >
						</div>
												
						<div class="form-group text-left">
							<button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">Add</button>
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


<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/additional-methods.min.js"></script>
<br />

<script type="text/javascript">
  
function forceNumeric(){
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g,''));
}
$('body').on('propertychange input', 'input[name="extraprice"]', forceNumeric); 
 
var form3 = $('#add_user');
var error3 = $('.alert-danger', form3);
var success3 = $('.alert-success', form3);
/*$.validator.addMethod("password",function(value,element)
{
return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/.test(value);
},"Passwords must be Minimum 8 characters at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character");*/
  
	
	form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    name: {                        
                        required: true
                    },
					date: {                        
                        required: true
                    },
                    address: {                        
                        required: true
                    },
                    /* freeformtext: {                        
                        required: true
                    },
                    extraprice: {                        
                        required: true
                    },
					image: {
						required: true
					}					*/
                    deadline: {                        
                        required: true
                    }
									          
                },
				
                messages: { 
                   /*  email:{
                    remote: function() { return $.validator.format("{0} already taken, Please login.", $("#inputEmail").val()) }  
                    } */
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    //Metronic.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
                    success3.show();
                    error3.hide();
                 form.submit(); // submit the form
                }

            });
			
</script>