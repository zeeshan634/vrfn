<?php 
$this->load->view('admin/include/header.php');
?>
 <link href="<?=base_url()?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

<?php 
$this->load->view('admin/include/top_menu.php');
?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php 
$this->load->view('admin/include/sidebar.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">		
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
		 Edit <small> User</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
					    <a href="<?=base_url()?>admin">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?=base_url()?>admin/member">Members</a>
                        <i class="fa fa-angle-right"></i>
						
					</li>
                    	<li>
						<a href="">Edit Profile (<?=$user_data->CompanyName; ?>)</a>
                 
						
					</li>
					
				</ul>
			
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">	
				<div class="col-md-offset-2 col-md-8">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box green ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Edit User<?php //echo $user_data->CompanyName; ?> Information
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>						
								
							</div>
						</div>
						<div class="portlet-body form"> 
							<form class="form-horizontal" id="edit_user" method="post" action="<?php echo base_url(); ?>admin/member/edit_code/<?php echo $user_data->ID; ?>" enctype="multipart/form-data" role="form">
                          		     <?php if($this->session->flashdata('error')){ ?>
                                     <div class="alert alert-block  alert-danger fade in">
                                          <button data-dismiss="alert" class="close close-sm" type="button">
                                              <i class="fa fa-times"></i>
                                          </button>
                                          <strong></strong> <?php echo $this->session->flashdata('error'); ?>
                                      </div>
                                     
                                   <?php } ?>
                                  
                                  	<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
                                  
								  
								  <div class="form-body">
								  
									<div class="form-group">
										<label class="col-md-3 control-label">Name</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $user_data->Name; ?>" >
									</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Company Name</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="companyname" placeholder="Company Name" value="<?php echo $user_data->CompanyName; ?>" >
									</div>
									</div>	
																		
									
									<div class="form-group">
										<label class="col-md-3 control-label">Email</label>
										<div class="col-md-9">
											<input type="text" readonly class="form-control" name="email" placeholder="Email" value="<?php echo $user_data->Email; ?>" >
									</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Phone</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $user_data->Phone; ?>" >
									</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Address1</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="address1" placeholder="Address1" value="<?php echo $user_data->Address1; ?>" >
									</div>
									</div>
									
									

									<div class="form-group">
										<label class="col-md-3 control-label">Address2</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="address2" placeholder="Address2" value="<?php echo $user_data->Address2; ?>" >
									</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">City</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $user_data->City; ?>" >
									</div>
									</div>
					             	
									<div class="form-group">
										<label class="col-md-3 control-label">State</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $user_data->State; ?>" >
									</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Zip</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="zip" placeholder="Zip" value="<?php echo $user_data->Zip; ?>" >
									</div>
									</div>
									
								</div>
								  
								  
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Save</button>
											<a href="<?php echo base_url(); ?>admin/member"><button type="button" class="btn default">Cancel</button></a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				
				</div>
			</div>
	  	
		</div>
	</div>
	<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->

<?php 
$this->load->view('admin/include/footer.php');
?>
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/additional-methods.min.js"></script>
<br />

<script type="text/javascript">

function forceNumeric(){
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g,''));
}
$('body').on('propertychange input', 'input[name="phone"]', forceNumeric); 
$('body').on('propertychange input', 'input[name="zip"]', forceNumeric); 
 
 

var form3 = $('#edits_user');
var error3 = $('.alert-danger', form3);
var success3 = $('.alert-success', form3);
/*$.validator.addMethod("password",function(value,element)
{
return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/.test(value);
},"Passwords must be Minimum 8 characters at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character");
*/    form3.validate({
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
                    },
                    phone: {                        
                        required: true
                    },
					email: {
                        required: true
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