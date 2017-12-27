<?php if(!$this->uri->segment(4)){	redirect('admin/member/users');} 
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
		 ADD <small> Profiles </small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
					    <a href="<?=base_url()?>admin">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?=base_url()?>admin/member">User</a>
                        <i class="fa fa-angle-right"></i>
						
					</li>
                    	<li>
						<a href="">Add Profiles </a>
                 
						
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
								<i class="fa fa-gift"></i>Add Phone Numbers
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>						
								
							</div>
						</div>
						<div class="portlet-body form"> 
							<form class="form-horizontal" id="add_user" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/member/do_add_profiles" role="form">
                          		    <?php if($this->session->flashdata('success')){ ?>									 <div class="alert alert-block  alert-success fade in">											<button data-dismiss="alert" class="close close-sm" type="button">												<i class="fa fa-times"></i>											</button>											<strong></strong> <?php echo $this->session->flashdata('success'); ?>										</div>									 									<?php } ?>									<?php if($this->session->flashdata('error')){ ?>										<div class="alert alert-block  alert-danger fade in">											<button data-dismiss="alert" class="close close-sm" type="button">												<i class="fa fa-times"></i>											</button>											<strong></strong> <?php echo $this->session->flashdata('error'); ?>										</div>									 									<?php } ?>									
                                  <div class="form-body">
                                    <div class="form-group">
										<label class="col-md-3 control-label">Phone Numbers</label>
										<div class="col-md-9">											<textarea id="phone_numbers" onkeypress="return isNumber(event)" class="form-control" style="height: 250px;" name="phone_numbers" placeholder="enter phone numbers here"></textarea>
											<!--<input type="text" class="form-control" name="freeformtext" placeholder="Freeform Text" value="" >-->
									</div>									<input type="hidden" name="company_id" value="<?php echo $this->uri->segment(4); ?>" />
									</div>																												<div class="form-group">										<label class="col-md-3 control-label">Event Date</label>										<div class="col-md-9">											<input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" name="date" placeholder="" value="" >									</div>									</div>																		
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Add</button>
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
<script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/jquery.validate.min.js"></script><script type="text/javascript" src="<?=base_url()?>assets/jquery-validation/js/additional-methods.min.js"></script><br /><script type="text/javascript">
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
                   phone_numbers: {                                                required: true                    },					date: {                                                required: true                    }									},				
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

            });			function isNumber(evt) {    evt = (evt) ? evt : window.event;    var charCode = (evt.which) ? evt.which : evt.keyCode;    if (charCode > 31 && (charCode < 48 || charCode > 57)) {        return false;    }    return true;}
/* function forceNumeric(){    var $input = $(this);	console.log($input);    $input.val($input.val().replace(/[^\d]+/g,''));}$('body').on('propertychange input', 'textarea[name="phone_numbers"]', forceNumeric);    */			/* $(document).ready(function() {    $("#phone_numbers").keydown(function(event) {        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||              // Allow: Ctrl+A            (event.keyCode == 65 && event.ctrlKey === true) ||              // Allow: home, end, left, right            (event.keyCode >= 35 && event.keyCode <= 39)) {                 // let it happen, don't do anything                 return;        }        else {            // Ensure that it is a number and stop the keypress            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {                event.preventDefault();             }           }    });  });	 */
</script>