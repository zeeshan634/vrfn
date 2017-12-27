<?php 
$this->load->view('include/header.php');
?>
<!-- Header ends here -->
<div class="page-header" style="background: url(<?php echo base_url(); ?>assets/theme-front/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">Add Job</h2>
            </div>
          </div>
        </div>
      </div>
</div>
<div class="main-content">
	<section id="content">
		<div class="container">		
			
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">	
				<div class="col-md-10 col-md-offset-1">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="page-login-form " style="display:flow-root;">
						<form class="form-horizontal" id="add_user" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>home/add_access" role="form">
						 <?php if($this->session->flashdata('error')){ ?>
						 <div class="alert alert-block  alert-danger fade in">
							  <button data-dismiss="alert" class="close close-sm" type="button">
								  <i class="fa fa-times"></i>
							  </button>
							   <?php echo $this->session->flashdata('error'); ?>
						  </div>
						 
					   <?php } ?>
					   
					   <?php if($this->session->flashdata('success')){ ?>
						 <div class="alert alert-block  alert-success fade in">
							  <button data-dismiss="alert" class="close close-sm" type="button">
								  <i class="fa fa-times"></i>
							  </button>
							   <?php echo $this->session->flashdata('success'); ?>
						  </div>
						 
					   <?php } ?>
							
							<div style="border-left: 1px solid #eee;padding:20px;display:flow-root;-webkit-box-shadow: 8px 8px 43px -12px rgba(77,77,77,0.66);-moz-box-shadow: 8px 8px 43px -12px rgba(77,77,77,0.66);box-shadow: 8px 8px 43px -12px rgba(77,77,77,0.66);">
								
									<div class="form-group mb-10 picture-company">	
										<div class="preview-pic">
											<img src="<?php echo base_url().'uploads/companies/default.png' ?>" style="max-height:200px;width:100%;" id="userImage" />
											<input class="form-control" name="old_image" type="hidden" value="" />
										</div> 
										<div class="change-pic">
											
											<p style="color:#000;"><input class="form-control" type="file"  name="UserPhoto" id="UserPhoto"/ style="    position: absolute;"><i class="fa fa-camera fa" aria-hidden="true"></i>  Add picture</p>
										</div>
									</div>
									<div class="col-md-6">
									<h3><i class="fa fa-building"></i> Company Information</h3>
									<div class="form-group mtb-10">
										<label class=" control-label">Industry</label>
										<div class="">
											<!--<input type="text" class="form-control" name="industry" placeholder="Industry" value="" >-->
											<input type="text" class="form-control company_fields" name="industry" id="industry" placeholder="Industry" value="">
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Field</label>
										<div class="">
											<!--<input type="text" class="form-control" name="industry" placeholder="Industry" value="" >-->
											<input type="text" class="form-control" name="subindustry" id="subindustry" placeholder="Field" value="">
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Zip</label>
										<div class="">
											<input type="text" class="form-control" name="zip" placeholder="Zip" value="" >
										</div>
									</div>
									<div class="form-group mtb-10">
										<label class=" control-label">City</label>
										<div class="">
											<input type="text" class="form-control" name="city" placeholder="City" value="" >
										</div>
									</div>
									<div class="form-group mtb-10">
										<label class=" control-label">Years In Business</label>
										<div class="">
											<input type="text" class="form-control" name="YOE" placeholder="Years In Business" value="" >
										</div>
										
									</div>
																
									<div class="form-group mtb-10">
										<label class=" control-label">Company Name</label>
										<div class="">
											<input type="text" id="companyname" class="form-control company_fields" name="companyname" placeholder="Company Name" value="" >
										</div>
									</div>	
									
									<div class="form-group mtb-10">
										<label class=" control-label">Company Website</label>
										<div class="">
											<input type="text" class="form-control" name="companywebsite" placeholder="Company Website" value="" >
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Number Of Current Employee</label>
										<div class="">
											<input type="text" class="form-control" name="numberofemployee" placeholder="Number Of Employee" value="" >
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Contact Person</label>
										<div class="">
											<input type="text" class="form-control" id="contactperson" name="contactperson" placeholder="Contact Person" value="" >
										</div>
									</div>
									<div class="form-group mtb-10">
										<label class=" control-label">Phone</label>
										<div class="">
											<input type="text" id="phone" min="0" class="form-control company_fields" name="phone" placeholder="Phone" value="" >
										</div>
									</div>
									<div class="form-group mtb-10">
										<label class=" control-label">Email</label>
										<div class="">
											<input type="email" id="email" class="form-control company_fields" name="email" placeholder="Email" value="" >
										</div>
									</div>
									
									<!--<div class="form-group mtb-10">
										<label class=" control-label">Contact Button</label>
										<div class="">
											<span style="float:left;margin-top: 20px;font-weight: bold;">vxhire.com/CompanyProfile/</span>
											<input style="width:69%;float:left;" class="form-control company_fields" type="text" id="contactbutton" name="contactbutton" placeholder="Contact Button" value="" >
											<span id="gatewaycontact-name" style="display: none" class="help-block help-block-error __web-inspector-hide-shortcut__" style="display: inline;">Contact already in use, Please Use different name.</span>
										</div>
									</div>-->
									
									<div class="form-group mtb-10">
										<label class=" control-label">Do you want applicants to be able to contact you directly? </label>
										<div class="">
											<label class="radio inline"><input type="radio" checked="checked" name="ContactDirectly" value="No"><span>No</span></label>
											<label class="radio inline"><input type="radio" name="ContactDirectly" value="Yes"><span>Yes</span></label>
											
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Do you want to be a verified employer?  </label>
										<div class="">
											<label class="radio inline"><input type="radio" checked="checked" name="VerifiedEmployer" value="No"><span>No</span></label>
											<label class="radio inline"><input type="radio" name="VerifiedEmployer" value="Yes"><span>Yes</span></label>
											
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">What email address would you like our alerts sent too?  </label>
										<div class="">
											<input class="form-control company_fields" id="AlertEmail" type="email" name="AlertEmail" placeholder="Email Address" value="" >
											
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Do you want to set up pre-screening for applicants?</label>
										<div class="">
											<label class="radio inline"><input type="radio" checked="checked" name="PreScreening" value="No"><span>No</span></label>
											<label class="radio inline"><input type="radio" name="PreScreening" value="Yes"><span>Yes</span></label>
											
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Password  </label>
										<div class="">
											<input type="password" id="password" name="password" class="form-control" placeholder="Password">
											
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Confirm Password  </label>
										<div class="">
											<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
											
										</div>
									</div>
									
									
									
									<div style="display: none" class="form-group mtb-10-display">
										<label class=" control-label">Hidden Rating Pin **</label>
										<div class="">
											<!--<input type="text" class="form-control" name="hiddenratingpin" placeholder="Hidden Rating Pin" value="" >-->
											<label class="radio inline"><input type="radio" checked="checked" name="hiddenratingpin" value="No"><span>No</span></label>
											<label class="radio inline"><input type="radio" name="hiddenratingpin" value="Yes"><span>Yes</span></label>
										</div>
									</div>
									</div>
									<div class="col-md-6">
									<h3>Job Information</h3>
									<div class="form-group mtb-10">
										<label class=" control-label">Job Title</label>
										<div class="">
											<input type="hidden" class="form-control" name="company_id" value="<?php //echo $company_id; ?>" >
											<input type="text" class="form-control" name="title" placeholder="Title" value="" >
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Description</label>
										<div class="">
											<input type="text" class="form-control" name="description" placeholder="Description" value="" >
										</div>
									</div>
									<div style="display: none" class="form-group mtb-10">
										<label class=" control-label">Number of Positions</label>
										<div class="">
											<input type="text" class="form-control" name="positions_opened" placeholder="Number of Positions" value="1" >
										</div>
									</div>
									<div class="form-group mtb-10">
										<label class=" control-label">Pay Offered</label>
										
										<div class="">
											<input type="text" class="form-control" name="pay_offered" placeholder="Pay Offered" value="" >
										</div>
									</div>
									<div class="form-group mtb-10">
										<label class=" control-label">Benifits Offered</label>
										<div class="">
											<input type="text" class="form-control" name="benifits_offered" placeholder="Benifits Offered" value="" >
										</div>
									</div>	
									
									<div class="form-group mtb-10">
										<label class=" control-label">Experience</label>
										<div class="">
											<input type="text" class="form-control" name="exp_required" placeholder="Exp Required" value="" >
										</div>
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Years Required in Field</label>
										<div class="">
											<!--<input type="text" class="form-control" name="time_req_in_field" placeholder="Time Req In Field" value="" >-->
										<select name="time_req_in_field" class="form-control">
											<option value="0">Select Time</option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
									
										</div>
									</div>
									
									
									
									<div class="form-group mtb-10">
										<label class=" control-label">Job Type</label>
										<div class="">
											<label class="radio inline"><input type="radio" checked="checked" name="job_type" value="full_time"><span>Full Time</span></label>
											<label class="radio inline"><input type="radio" name="job_type" value="part_time"><span>Part Time</span></label>
											<label style="margin-left:0;" class="radio inline"><input type="radio" name="job_type" value="independent_contractor"><span>Independent Contractor</span></label>
											
										</div>
									</div>
									
									
									
									<div class="form-group mtb-10">
										<label class=" control-label"><b>Do you require a </b></label>
										
									</div>
									
									<div class="form-group mtb-10">
										<label class=" control-label">Drug Test</label>
										<div class="">
											
											<label class="radio inline"><input type="radio" checked="checked" name="drug_test" value="0"><span>No</span></label>
											<label class="radio inline"><input type="radio" name="drug_test" value="1"><span>Yes</span></label>
												
										</div>
									</div>
									
									
									
									<div class="form-group mtb-10">
										<label class=" control-label">Background Check</label>
										<div class="">
											
											<label class="radio inline"><input type="radio" checked="checked" name="background_check" value="0"><span>No</span></label>
											<label class="radio inline"><input type="radio" name="background_check" value="1"><span>Yes</span></label>
												
										</div>
									</div>
									
									
									
									<div class="form-group mtb-10">
										<label class=" control-label">Special License</label>
										<div class="">
											
											<label class="radio inline"><input type="radio" checked="checked" name="special_license" value="0"><span>No</span></label>
											<label class="radio inline"><input type="radio" name="special_license" value="1"><span>Yes</span></label>
												
										</div>
									</div>
									
									
									
									<div id="ld" class="form-group mtb-10">
										<label class=" control-label">License Description</label>
										<div class="">
											<input type="text" class="form-control" name="license_description" placeholder="License Description" value="" >
										</div>
									</div>
									
									<div style="display: none" class="form-group mtb-10">
										<label class=" control-label">Strong Points</label>
										<div class="">
											<input type="text" class="form-control" name="strong_points" placeholder="Strong Points" value="" >
										</div>
									</div>

									
										
									<div style="display: none" class="form-group mtb-10">
										<label class=" control-label">Share Info</label>
										<div class="">
											
											<label class="radio inline"><input type="radio" checked="checked" name="share_info" value="0"><span>No</span></label>
											<label class="radio inline"><input type="radio" name="share_info" value="1"><span>Yes</span></label>
												
										</div>
									</div>
									
									
									
									<div class="form-group mtb-10">
										<label class=" control-label">Apply By</label>
										<div class="">
											<input type="date" class="form-control" name="last_date" value="" >
										</div>
									</div>
									
								</div> 
							
							<div class="form-actions">
								<div class="row">
									<div class="col-md-12 text-right" style="margin:10px 0px;">
										<button type="submit" class="btn btn-primary">Add Job</button>
										<a href="<?php echo base_url(); ?>login"><button type="button" class="btn btn-danger">Cancel</button></a></a>
									</div>
								</div>
							</div>
							</div> 
						</form>
					</div>	
				</div>	
			</div>	
		</div>	
	</section>	
</div>	
	
	
	
	
	<!-- BEGIN CONTENT -->
<div class="main-content" style="display:none;">
	<section id="content">
		<div class="container">		
			<form class="form-horizontal" id="add_user" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>home/add_access" role="form">
				 <?php if($this->session->flashdata('error')){ ?>
				 <div class="alert alert-block  alert-danger fade in">
					  <button data-dismiss="alert" class="close close-sm" type="button">
						  <i class="fa fa-times"></i>
					  </button>
					  <strong></strong> <?php echo $this->session->flashdata('error'); ?>
				  </div>
				 
			   <?php } ?>
			   
			   <?php if($this->session->flashdata('success')){ ?>
				 <div class="alert alert-block  alert-success fade in">
					  <button data-dismiss="alert" class="close close-sm" type="button">
						  <i class="fa fa-times"></i>
					  </button>
					  <strong></strong> <?php echo $this->session->flashdata('success'); ?>
				  </div>
				 
			   <?php } ?>
				<div class="col-sm-3 col-md-3 npr">
					<div class="profile-img page-login-form box">
						<!--<label class="control-label">Company Logo</label>-->
						<div class="preview-pic">
							<img src="<?php echo base_url().'uploads/companies/default.png' ?>" style="max-height:200px;width:100%;" id="userImage" />
							<input class="form-control" name="old_image" type="hidden" value="" />
						</div> 
						<div class="change-pic">
							<input class="form-control" type="file"  name="UserPhoto" id="UserPhoto"/>
							<p style="color:#000;"><i class="fa fa-camera fa" aria-hidden="true"></i> Change Pic</p>
						</div>
					</div>
				</div>
				<div class="col-sm-9 col-md-9 npl">
					<div class="page-login-form box" style="display:flow-root;">
						<h3>
							<i class="fa fa-plus"></i> ADD Job 
						</h3>
						<div class="row">
							<div class="col-md-6">
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Job Title</label>
									<div class="">
										<input type="hidden" class="form-control" name="company_id" value="<?php //echo $company_id; ?>" >
										<input type="text" class="form-control" name="title" placeholder="Title" value="" >
								</div>
								</div>
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Description</label>
									<div class="">
										<input type="text" class="form-control" name="description" placeholder="Description" value="" >
									</div>
								</div>
								
								
							</div>
							<div class="col-md-6">
								<div class="form-group mtb-10-display">
									<label class=" control-label">Positions Opened</label>
									<div class="">
										<input type="number" min="1" class="form-control" name="positions_opened" placeholder="Positions Opened" value="" >
								</div>
								</div>
								<div class="form-group mtb-10-display">
									<label class=" control-label">Pay Offered</label>
									
									<div class="">
										<input type="text" class="form-control" name="pay_offered" placeholder="Pay Offered" value="" >
									</div>
									<!--<div class="">
									
										<select class="form-control" name="type">
											<option value="1">1</option> 
											<option value="2">2</option> 
										</select>
									</div>-->
									
								</div>
								
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Benifits Offered</label>
									<div class="">
										<input type="text" class="form-control" name="benifits_offered" placeholder="Benifits Offered" value="" >
								</div>
								</div>	
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Exp Required</label>
									<div class="">
										<input type="text" class="form-control" name="exp_required" placeholder="Exp Required" value="" >
								</div>
								</div>
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Time Req In Field</label>
									<div class="">
										<!--<input type="text" class="form-control" name="time_req_in_field" placeholder="Time Req In Field" value="" >-->
									<select name="time_req_in_field" class="form-control">
										<option value="0">Select Time</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
								
								</div>
								</div>
								
								
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Job Type</label>
									<div class="">
										<label class="radio inline"><input type="radio" checked="checked" name="job_type" value="full_time"><span>Full Time</span></label>
										<label class="radio inline"><input type="radio" name="job_type" value="part_time"><span>Part Time</span></label>
										<label style="margin-left:0;" class="radio inline"><input type="radio" name="job_type" value="independent_contractor"><span>Independent Contractor</span></label>
										
								</div>
								</div>
								
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Drug Test</label>
									<div class="">
										
										<label class="radio inline"><input type="radio" checked="checked" name="drug_test" value="0"><span>No</span></label>
										<label class="radio inline"><input type="radio" name="drug_test" value="1"><span>Yes</span></label>
											
								</div>
								</div>
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Background Check</label>
									<div class="">
										
										<label class="radio inline"><input type="radio" checked="checked" name="background_check" value="0"><span>No</span></label>
										<label class="radio inline"><input type="radio" name="background_check" value="1"><span>Yes</span></label>
											
								</div>
								</div>
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Special License</label>
									<div class="">
										
										<label class="radio inline"><input type="radio" checked="checked" name="special_license" value="0"><span>No</span></label>
										<label class="radio inline"><input type="radio" name="special_license" value="1"><span>Yes</span></label>
											
								</div>
								</div>
								
								<div id="ld" style="display: <span>No</span>ne" class="form-group mtb-10-display">
									<label class=" control-label">License Description</label>
									<div class="">
										<input type="text" class="form-control" name="license_description" placeholder="License Description" value="" >
								</div>
								</div>
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Strong Points</label>
									<div class="">
										<input type="text" class="form-control" name="strong_points" placeholder="Strong Points" value="" >
								</div>
								</div>
																
								<div class="form-group mtb-10-display">
									<label class=" control-label">Share Info</label>
									<div class="">
										
										<label class="radio inline"><input type="radio" checked="checked" name="share_info" value="0"><span>No</span></label>
										<label class="radio inline"><input type="radio" name="share_info" value="1"><span>Yes</span></label>
											
								</div>
								</div>
								
								<div class="form-group mtb-10-display">
									<label class=" control-label">Apply By</label>
									<div class="">
										<input type="date" class="form-control" name="last_date" value="" >
								</div>
								</div>
								
								
							</div>
							<div class="col-md-12">
								<div class="form-actions ">
									<span class="col-md-3 pull-right"><button type="submit" class="btn btn-common log-btn">Add Job</button></span>
									<span class="col-md-3 pull-right"><a href="<?php echo base_url(); ?>login"><button type="button" class="btn btn-danger log-btn">Cancel</button></a></span>
								
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</section>
</div>	


<!-- Footer Starts -->

<?php 
$this->load->view('include/footer.php');
?>	
	
<script>
	
function forceNumeric(){
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g,''));
}
$('body').on('propertychange input', 'input[name="YOE"]', forceNumeric);
$('body').on('propertychange input', 'input[name="numberofemployee"]', forceNumeric);
$('body').on('propertychange input', 'input[name="zip"]', forceNumeric);
$('body').on('propertychange input', 'input[name="phone"]', forceNumeric);
$('body').on('propertychange input', 'input[name="positions_opened"]', forceNumeric);


	
$(document).ready(function(){ 
    $("#ld").hide();
    $("input[name=special_license]").change(function() {
        var test = $(this).val();
		if(test == 1){
			$("#ld").show();
		}else{
			$("#ld").hide();
		}
    }); 
});

function update(l){
	//alert(l.className);
	
	var pin = "";
	
	if(l.className == "btn btn-primary"){ pin = "<span>Yes</span>"; }
	else { pin = "<span>No</span>"; }
	
	$.ajax({
        
		type: "POST",
        url: "<?php echo base_url(); ?>profile/update_pins",
			data: {pin:pin}, 
            success: function(data)
              {
				if(l.className == "btn btn-primary"){ l.className = "btn btn-success" }
				else { l.className = "btn btn-primary" }
              }
    });
	
	//if(l.className == "btn btn-primary"){ l.className = "btn btn-success" }
	//else { l.className = "btn btn-primary" }
}




</script>

<!-- Footer Ends Here -->
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<br />
<script type="text/javascript">
  
/* $('.company_fields').on("keyup", action2);
function action2() {
	
	//$('input .company_fields').each(function(){
		//console.log($(this).val());
	//});
	
   if($('#industry').val().length > 0 && $('#companyname').val().length > 0 && $('#phone').val().length > 0 && $('#email').val().length > 0 && $('#AlertEmail').val().length > 0 && $('#contactbutton').val().length > 0) {
		   $('#next2').prop("disabled", false);   
   }else {
      $('#next2').prop("disabled", true);
   }
} */
  
  
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
                    industry: {                        
                        required: true
                    },
					companyname: {                        
                        required: true,
						remote:"<?=base_url()?>login/check_company_name"
                    },
                    phone: {                        
                        required: true
                    },
					email: {
                        required: true,
						remote:"<?=base_url()?>login/check_email_company"
                    },
					title: {
						required: true
					},
					positions_opened: {
						required: true
					},
					AlertEmail: {
						required: true
					},
					password: {
                        required: true
                    },
					
					cpassword: {
						equalTo: "#password"
                    }
          
                },
				
                messages: { 
                    companyname:{
                    remote: function() { return $.validator.format("Name already taken, Please Use different name.") }  
                    },
					email:{
                    remote: function() { return $.validator.format("{0} already taken, Please login.", $("#email").val()) }  
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
                    Metronic.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group mtb-10-display').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group mtb-10-display').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group mtb-10-display').removeClass('has-error'); // set success class to the control group
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

<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="http://jqueryui.com/jquery-wp-content/themes/jqueryui.com/style.css">
	  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

$( function() {

	<?php 
		// Industries	
		$ind = '[';
		foreach($industries as $d){
			$ind.='"'.$d->value.'"'.',';
		}
		$ind = substr($ind, 0, -1);
		$ind.=']';
		
?>


	var industries = <?php echo $ind; ?>;
    $( "#industry" ).autocomplete({
      source: industries
    });
	
	$( "#subindustry" ).autocomplete({
      source: industries
    });
	

	/* $('#contactbutton').on("keyup", function(){
		
		var gatewaycontact = $('#contactbutton').val();
	    $.post("<?php echo base_url(); ?>login/check_contact",{gatewaycontact:gatewaycontact},function(data)
        { 
			if(data == 'true'){
				$('#gatewaycontact-name').css("display", "block");
				//$('#next1').prop("disabled", true);
			}else{
				$('#gatewaycontact-name').css("display", "none");
				//$('#next1').prop("disabled", false);
			}
        });	
		
		$('#gatewaycontact-error').remove();
	});	 */
	
	
});	
</script>
	
</body>

</html>