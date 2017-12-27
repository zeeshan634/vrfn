<?php 
$this->load->view('admin/include/header.php');
?>

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
		 ADD <small> Event</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
					    <a href="<?=base_url()?>admin">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?=base_url()?>admin/events">Event</a>
                        <i class="fa fa-angle-right"></i>
						
					</li>
                    	<li>
						<a href="">Add Event</a>
                 
						
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
								<i class="fa fa-gift"></i>Add Event Information
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>						
								
							</div>
						</div>
						<div class="portlet-body form"> 
							<form class="form-horizontal" id="add_user" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/events/update_event" role="form">
                          		    <?php if($this->session->flashdata('psuccess')){ ?>									 <div class="alert alert-block  alert-success fade in">											<button data-dismiss="alert" class="close close-sm" type="button">												<i class="fa fa-times"></i>											</button>											<strong></strong> <?php echo $this->session->flashdata('psuccess'); ?>										</div>									 									<?php } ?>									<?php if($this->session->flashdata('perror')){ ?>										<div class="alert alert-block  alert-danger fade in">											<button data-dismiss="alert" class="close close-sm" type="button">												<i class="fa fa-times"></i>											</button>											<strong></strong> <?php echo $this->session->flashdata('perror'); ?>										</div>									 									<?php } ?>									
                                  <div class="form-body">
								  									<div class="form-group">                                    										<label class="col-md-3 control-label">Event Logo</label>										<div class="col-md-3" class="preview-pic">											<?php if(strlen($event->EventImage) > 1){ $img = $event->EventImage; }else{ $img = 'default.png';} ?>																					<img src="<?php echo base_url().'uploads/events/'.$img; ?>" style="height:95px;width:160px;" id="userImage" />										</div> 																				<div class="col-md-6">    									    <input type="file" class="form-control" style="margin-top:40px;" name="image" id="UserPhoto"/>										</div>                                    </div>								  
									<div class="form-group">
										<label class="col-md-3 control-label">Event Name</label>
										<div class="col-md-9">											<input type="text" class="form-control"  name="name" class="form-control" value="<?php echo $event->EventName; ?>" placeholder="Event Name"  >	
											<input name="id" type="hidden" value="<?php echo $event->ID; ?>">									</div>
									</div>
																		
									<div class="form-group">
										<label class="col-md-3 control-label">Event Date</label>
										<div class="col-md-9">
											<input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" name="date" placeholder="" value="<?php echo date('Y-m-d', strtotime($event->EventDate)); ?>" >
									</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Event Address</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="address" placeholder="Event Address" value="<?php echo $event->EventAddress; ?>" >
									</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Registration Deadline</label>
										
										<div class="col-md-9">
											<input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" name="deadline" placeholder="" value="<?php echo date('Y-m-d', strtotime($event->RegistrationDeadline)); ?>" >
										</div>
									</div>
									
									
                                    <div class="form-group">
										<label class="col-md-3 control-label">Freeform Text</label>
										<div class="col-md-9">											<textarea class="form-control" name="freeformtext" placeholder="Freeform text goes here"><?php echo $event->FreeFormText; ?></textarea>
											<!--<input type="text" class="form-control" name="freeformtext" placeholder="Freeform Text" value="" >-->
									</div>
									</div>	
									
									<div class="form-group">
										<label class="col-md-3 control-label">Extra Price Per Profile</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="extraprice" placeholder="Extra Price" value="<?php echo $event->ExtraPrice; ?>" >
									</div>
									</div> 	
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Update</button>
											<a href="<?php echo base_url(); ?>admin/events"><button type="button" class="btn default">Cancel</button></a>
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
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/jquery.validate.min.js"></script><script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/additional-methods.min.js"></script><br /><script type="text/javascript">
 function forceNumeric(){    var $input = $(this);    $input.val($input.val().replace(/[^\d]+/g,''));}$('body').on('propertychange input', 'input[name="extraprice"]', forceNumeric);  
  
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
                   name: {                                                required: true                    },					date: {                                                required: true                    },                    address: {                                                required: true                    },                    /* freeformtext: {                                                required: true                    },                    extraprice: {                                                required: true                    },					image: {						required: true					}					*/                    deadline: {                                                required: true                    }									},
				
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
			
			
	function isUrlValid() {
		var url =$('#url').val();
		return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
	}

</script>