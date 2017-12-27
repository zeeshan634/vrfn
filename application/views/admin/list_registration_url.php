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
			View registered URL’s
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
					    <a href="<?=base_url()?>admin">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						Events
						
					</li>
					
					
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
                      <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success alert-block fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <!--<h4>
                      <i class="fa fa-ok-sign"></i>
                      Success!
                  </h4>-->
                        <p>
                            <?php echo $this->session->flashdata('success'); ?>
                        </p>
                    </div>
                    <?php } ?>
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>View Suggested URLs List
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
										
										</div>
									</div>
								</div>
							</div>
							
							
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
							
							
							
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>								
								 <th> S.No</th>
								 <th> URL</th>
                                 <th> Posted By</th>
                                 <th style="display: none"> Status</th>
                                 <th> Action</th>
							</tr>
							</thead>
							<tbody>
                            <?php $i=1; foreach($urls as $row){ ?>
							<tr id="company_<?php echo $row->ID; ?>" class="odd gradeX">
						      
								<td>
									 <b><?php echo $i; ?></b>
								</td>
								
								
								<td>
								<?php echo $row->url; ?>
								</td>
								
								<td>
									 <?php echo $row->name; ?> ( <?php echo $row->companyname; ?> )
								</td>
								
														
								<td style="display: none">
                                <a  href="javascript:status(<?php echo $row->ID; ?>);">
                                            <?php if($row->status == 'pending'){ ?>
                                            <img src="<?php echo base_url(); ?>assets/global/img/icon-img-down.png" data-id="0" id="t_<?php echo $row->ID; ?>" />
                                           <?php }  else { ?>
                                            <img src="<?php echo base_url(); ?>assets/global/img/icon-img-up.png" data-id="1" id="t_<?php echo $row->ID; ?>" />
                                            <?php } ?>       
                                                                                     
                                 </a>                                   
								</td>
												
                                								
                                <td class="center" style="width: 16%;">
								
									<button type="button" onclick="add_event('<?php echo $row->url; ?>')" class="btn btn-info">Add Event</button>

								
                                  <a onclick="del_company(<?php echo $row->ID; ?>)" class="btn btn-primary btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
						     <?php $i++; } ?>
						
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
		
		</div>
	</div>
	<!-- END CONTENT -->

</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Event Information</h4>
        </div>
        <div class="modal-body">
          
		  <form class="form-horizontal" id="add_user" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/events/submit_event" role="form">

                          		    
                                  <div class="form-body">
								  
								  
								  <div class="form-group">

										<label class="col-md-3 control-label">Event Url</label>
										<div class="col-md-9">
											<!--<div style="margin-top: 8px" id="eve_url"><strong>https://test@sdgfjd.com/</strong></div>-->
											<input id="event_url" type="text" class="form-control"  name="url" class="form-control" placeholder=""  >	
									</div>

									</div>

								  
									<div class="form-group">

                                    

										<label class="col-md-3 control-label">Event Logo</label>

										<div class="col-md-4" class="preview-pic">

											<img src="<?php echo base_url().'uploads/events/default.png' ?>" style="height:95px;width:160px;" id="userImage" />

										</div> 

										

										<div class="col-md-5">

    									    <input type="file" class="form-control" style="margin-top:40px; " name="image" id="UserPhoto"/>

										</div>


                                    </div>
								  

									<div class="form-group">

										<label class="col-md-3 control-label">Event Name</label>
										<div class="col-md-9">
											<input type="text" class="form-control"  name="name" class="form-control" placeholder="Event Name"  >	
									</div>

									</div>

																		

									<div class="form-group">

										<label class="col-md-3 control-label">Event Date</label>

										<div class="col-md-9">

											<input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" name="date" placeholder="" value="" >

									</div>

									</div>

									

									<div class="form-group">

										<label class="col-md-3 control-label">Event Address</label>

										<div class="col-md-9">

											<input type="text" class="form-control" name="address" placeholder="Event Address" value="" >

									</div>

									</div>

									

									<div class="form-group">

										<label class="col-md-3 control-label">Registration Deadline</label>

										

										<div class="col-md-9">

											<input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" name="deadline" placeholder="" value="" >

										</div>

									</div>

									

									

                                    <div class="form-group">

										<label class="col-md-3 control-label">Freeform Text</label>

										<div class="col-md-9">
											<textarea class="form-control" name="freeformtext" placeholder="Freeform text goes here"></textarea>
											<!--<input type="text" class="form-control" name="freeformtext" placeholder="Freeform Text" value="" >-->

									</div>

									</div>	

									

									<div class="form-group">

										<label class="col-md-3 control-label">Extra Price Per Profile</label>

										<div class="col-md-9">

											<input type="text" class="form-control" name="extraprice" placeholder="Extra Price" value="" >

									</div>

									</div>
 	

								</div>

								<div class="form-actions">

									<div class="row">

										<div class="col-md-offset-3 col-md-9">

											<button type="submit" class="btn green">Add</button>

											<button type="button" class="btn default" data-dismiss="modal">Cancel</button>

										</div>

									</div>

								</div>

							</form>
		  
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>

<!-- END CONTAINER -->
<?php 
$this->load->view('admin/include/footer.php');
?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script>

function add_event(url){
	//alert(url);
	$('#event_url').val(url);
	$('#eve_url').text(url);
	$('#myModal').modal('show');
	//alert(url);
}

function del_company(id){
		
		if (confirm("Are you sure to delete this URL?") == false) {
                return;
		}
		
           $.post("<?php echo base_url(); ?>admin/events/delete_url/",{id:id},function(data)
           { 
				if(data == 1){
					$('#company_'+id).remove();
				}else{
					alert("something went wrong");
				}
           });
		
}

</script>
 <script type="text/javascript">
     
        function status(did)
       {

           var didsts = $( "#t_" + did ).data("id"); 
		   
		   //alert(didsts); return;
		   //alert(did); return;
   
           $.post("<?php echo base_url(); ?>admin/events/change_status/",{id:did},function(data)
           {     
               var result = JSON.parse(data);   
               if(result.status == 1)
               {
                 
                   if(didsts == 1)
                   {
                       
                     $( "#t_" + did ).data("id", 0);
                       document.getElementById("t_" + did).src = "<?php echo base_url(); ?>/assets/global/img/icon-img-down.png";
       
                   }
                   else
                   {
       
                       $( "#t_" + did ).data("id", 1);
                       document.getElementById("t_" + did).src = "<?php echo base_url(); ?>assets/global/img/icon-img-up.png";
        
                   }
                 } 
               
               else
               {
                   alert("Error");
               }
           })
       }
                              
                              
</script>

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