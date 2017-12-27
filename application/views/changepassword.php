<?php 
$this->load->view('include/header.php');
?>

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-key"></i> Change Password</h2>
			<div class="card card-container text-center">
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url(); ?>assets/images/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            
			<form id="add_user" class="form-signin" role="form" method="post" action="<?php echo base_url(); ?>profile/change_password">
                
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
							
                <div class="form-group">
					<label>Old Password</label>
					<input name="password" type="password" id="inputPassword" class="form-control" placeholder="">
				</div>
                <div class="form-group">
					<label>New Password</label>
					<input name="new_password" type="password" id="n-pwd" class="form-control" placeholder="" >
				</div>
				 <div class="form-group">
					<label>Confirm New Password</label>
					<input type="password" name="c_password" id="rt-pwd" class="form-control" placeholder="">
				</div>
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin" style="margin:0 auto;" >Save</button>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
		</div>
	</div>
	

<?php $this->load->view('include/footer.php'); ?>

<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/additional-methods.min.js"></script>
<br />

<script type="text/javascript">

$(document).ready(function() {

 //$('.form-control').keypress(function(event){
   //if(event.keyCode == 13){
  //event.preventDefault();
   //}
 //});
});

function forceNumeric(){
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g,''));
}
$('body').on('propertychange input', 'input[name="zip"]', forceNumeric);
$('body').on('propertychange input', 'input[name="phone"]', forceNumeric);
  
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
                    password: {                        
                        required: true
                    },
										
					new_password: {
                        required: true
                    },
					
					c_password: {
						equalTo: "#n-pwd"
                    }
                },
				
                messages: { 
                                       
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