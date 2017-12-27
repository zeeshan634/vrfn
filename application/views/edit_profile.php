<?php 
$this->load->view('include/header.php');
?>

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-edit"></i> EDIT PROFILE</h2>
			<div class="card-register card-container-register text-center">
            <p id="profile-name" class="profile-name-card"></p>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group text-left">
							<label>Name</label>
							<form id="add_user" method="post" action="<?php echo base_url(); ?>profile/update_profile">
							
							<input type="text" name="name" required class="form-control" style="width: 20%" value="<?php echo $profile->Name; ?>">
							<input type="hidden" name="id" value=<?php echo $profile->ID; ?> />
						</div>
						
						<div class="form-group text-left">
							<label>Created at</label>
							<h4><?php echo date('d-m-y', strtotime($profile->createdAt)); ?><h4>
						</div>
						
						<div class="form-group text-left">
							<button href="#" class="btn btn-lg btn-primary btn-block btn-signin">Update</button>
						</div>
						
						
					</div>
				</div>
        </div><!-- /card-container -->
		</div>
	</div>




<?php 
$this->load->view('include/footer.php');
?>

<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

<br />

<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="http://jqueryui.com/jquery-wp-content/themes/jqueryui.com/style.css">
	  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script type="text/javascript">
  
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
          
                },
				
                /*messages: { 
                    email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                    remote: function() { return $.validator.format("{0} is already taken", $("#email").val()) }  
                    }
                   
                },*/

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
                    Metronic.scrollTo(error3, -200);
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