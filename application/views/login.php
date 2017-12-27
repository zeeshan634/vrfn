<?php $this->load->view('include/header.php'); ?>

<?php //print_r($this->session->userdata('company')); ?>

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-user"></i> LOGIN</h2>
			<div class="card card-container text-center">
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url(); ?>assets/images/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
             <form id="add_user" method="post" action="<?php echo base_url(); ?>login/login_access" class="form-signin">
			
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
			
                <div class="form-group">
					<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" autofocus>
				</div>
				<div class="form-group">
					<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
				</div>
                <div style="display: none" id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin" style="margin:0 auto;" >Sign in</button>
            </form><!-- /form -->
            <div class="form-group">
				<a href="<?php echo base_url(); ?>login/forgot" class="forgot-password">
					Forgot the password?
				</a>
			</div>	
			<div class="text-left form-group">
				<a href="<?php echo base_url(); ?>login/register" class="forgot-password">
					Don't have an account, click here.
				</a>
			</div>
        </div><!-- /card-container -->
		</div>
	</div>

<?php $this->load->view('include/footer.php'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/additional-methods.min.js"></script>

<script type="text/javascript">
  
$(document).ready(function(){ 
    
});
  
  function getstate(id)
   {
       var cou=$(id).val();
       if(cou)
       {
        $.ajax({
              type: "POST",
              url: "<?php echo base_url(); ?>admin/member/get_states",
              data: {country_id:cou}, 
              success: function(data)
              {
               $('#cities').html('<option value="">--Select City--</option>'); 
               $('#states').html(data);//alert(data); // show response from the php script.
              }
            });
       }
               
   }
  
   function getcity(id)
   {
    
       var cou=$(id).val();
       if(cou)
       {
        $.ajax({
              type: "POST",
              url: "<?php echo base_url(); ?>admin/member/get_cities",
              data: {state_id:cou}, 
              success: function(data)
              {
               $('#cities').html(data);//alert(data); // show response from the php script.
              }
            });
       }
               
   }
var form3 = $('#add_user');
var error3 = $('.alert-danger', form3);
var success3 = $('.alert-success', form3);
	
	form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    
					email: {                        
                        required: true
                    },
                    password: {                        
                        required: true
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
			
			
	function isUrlValid() {
		var url =$('#url').val();
		return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
	}

</script>