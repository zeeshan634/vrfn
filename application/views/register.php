<?php $this->load->view('include/header.php'); ?> 
								   
	<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-user-plus"></i> REGISTER</h2>
			<div class="card-register card-container-register text-center">
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url(); ?>assets/images/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form id="add_user" method="post" action="<?php echo base_url(); ?>login/add_access" class="form-signin">
			
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
					
			
                <div class="row">
                <div class="col-md-6">
				<div class="form-group text-left">
					<label>Name</label>
					<input type="text" id="inputEmail" name="name" class="form-control" placeholder=""  >
				</div>
				<div class="form-group text-left">
					<label>Company Name</label>
					<input type="text" id="inputEmail" name="companyname" class="form-control" placeholder=""  >
				</div>
				<div class="form-group text-left">
					<label>Email</label>
					<input type="email" id="inputEmail" name="email" class="form-control" placeholder=""  >
				</div>
				<div class="form-group text-left">
					<label>Phone</label>
					<input type="text" id="inputEmail" name="phone" class="form-control" placeholder=""  >
				</div>
				<div class="form-group text-left">
					<label>Password</label>
					<input type="password" id="inputPassword" name="password" class="form-control" placeholder="" >
				</div>
				<div class="form-group text-left">
					<label>Confirm Password</label>
					<input type="password" id="inputcPassword" name="cpassword" class="form-control" placeholder="" >
				</div>
				</div>
				
                <div class="col-md-6">
					<div class="form-group text-left">
						<label>Address 1</label>
						<input type="text" id="inputAdress1" name="address1" class="form-control" placeholder=""  >
					</div>
					<div class="form-group text-left">
						<label>Address 2</label>
						<input type="text" id="inputAddress2" name="address2" class="form-control" placeholder=""  >
					</div>
					
					<div class="form-group text-left">
						<label>Country</label>
						<select id="country_list" onchange="getcon(this)" name="country" class="form-control"  >
						
						<?php foreach($countries as $con){ ?>
							<option value="<?php echo $con->id; ?>"><?php echo $con->name; ?></option>
						<?php } ?>
						
						</select>
					</div>
					
					<div class="form-group text-left">
						<label id="state_label">State</label>
						<input type="text" id="inputState" name="state" class="form-control" placeholder=""  >
					</div>
					
					<div class="form-group text-left">
						<label>City</label>
						<input type="text" id="inputCity" name="city" class="form-control" placeholder=""  >
					</div>
					
					<div class="form-group text-left">
						<label>ZIP</label>
						<input type="text" id="inputZip" name="zip" class="form-control" placeholder=""  >
					</div>
					
				</div>
				</div>
                <button class="btn btn-lg btn-primary pull-right " style="margin:0 auto;" type="submit">Sign up</button>
           </br>
			
			</form><!-- /form -->
            
			<div class="text-left form-group bottom-info">
				<a href="<?php echo base_url(); ?>login" class="forgot-password">
					Already have an account, click here.
				</a>
			</div>
        </div><!-- /card-container -->
		</div>
	</div>
								   
	
<?php $this->load->view('include/footer.php'); ?>	


<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/additional-methods.min.js"></script>
<br />

<script type="text/javascript">

function getcon(l){
	$('#state_label').html("State");
	if(l.value == 38){
		//alert("canada");
		$('#state_label').html("Province");
	}
}

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
                    name: {                        
                        required: true
                    },
					companyname: {                        
                        required: true
						//remote:"<?=base_url()?>login/check_company_name"
                    },
                    phone: {                        
                        required: true
                    },
					email: {
                        required: true,
						remote:"<?=base_url()?>login/check_email_company"
                    },
					
					password: {
                        required: true
                    },
					
					cpassword: {
						equalTo: "#inputPassword"
                    },
					
					address1: {
						required: true
                    },
					
					city: {
						required: true
                    },
					
					state: {
						required: true
                    },
					
					zip: {
						required: true
                    }
					
					/* ,
					contactbutton: {
						required: true,
						remote:"<?=base_url()?>login/check_contact_get"
					} */
          
                },
				
                messages: { 
                    email:{
                    remote: function() { return $.validator.format("{0} already taken, Please login.", $("#inputEmail").val()) }  
                    }
                   
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