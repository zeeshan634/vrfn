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

<style>


</style>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			View Profiles
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
					    <a href="<?=base_url()?>admin">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						Users 
						
					</li>
					
					
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
                      
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>View User Profiles
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
							
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							
							
							<tr><th colspan="5"><input type="button" onclick="renew_profiles()" class="btn btn-primary" value="Renew Profiles" /> 
							
							<div class="pull-right">
							<form method="post" action="<?php echo base_url().'admin/member/view_profiles/'.$this->uri->segment(4); ?>">
							<span style="display: flex">
							<input type="date" class="form-control" name="search_date" />  
							<input type="submit" class="btn btn-primary" value="search" /></span>
							</form>	
							</div>
							
							<!--<button class="btn btn-primary"  onclick="get_all_sms()">Get all SMS</button>-->
							
							</th></tr>
							
							<tr>
								 <th><input id="select_all" type="checkbox" name="all" /></th>
								 <th> Phone</th>
								 <th> Expiry</th>
								 <th> Created At</th>
                                 <th> Action</th>
							</tr>
							</thead>
							<tbody>
														
                            <?php foreach($profiles as $row){ ?>
							
							<tr id="profile_<?php echo $row->ID; ?>" class="odd gradeX">
						        <td><input name="ph[]" onclick="remove_all()" class="checkbox" value="<?php echo $row->ID; ?>" type="checkbox" /></td>
								<td>
									 <span id="phone_<?php echo $row->ID; ?>"><?php echo $row->Phone; ?></span>
								</td>
								
								<td>
									<!--<input type="text" name="id[]" value="<?php //echo $row->ID; ?>">
									<input type="text" name="expiry[]" value="<?php //echo $row->Expiry; ?>">-->
									 <span id="expiry_<?php echo $row->ID; ?>"><?php echo date("Y-m-d", strtotime($row->Expiry)); ?></span>
								</td>
								
																				
                                <td>
                                <?php echo $row->createdAt; ?>
                                </td>
								
                                <td class="center" style="width: 14%;">
								
                                  <a onclick="edit_profile(<?php echo $row->ID; ?>, <?php echo $row->Phone; ?>, '<?php echo date('Y-m-d', strtotime($row->Expiry)); ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
								  
                                  <a  onclick="del_profile('<?php echo $row->ID; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-trash-o"></i></a>
								  
                                  <a href="<?php echo base_url().'admin/member/user_sms/'.$this->uri->segment(4).'/'.$row->Phone; ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
												
								</td>
							</tr>
						     <?php } ?>
							 						
							</tbody>
							</table>
							
							<script>
							
							/* function get_all_sms(phone){
															   
							   var yql_url = 'https://query.yahooapis.com/v1/public/yql';
							   
							   var url = 'http://www.smspins.com/pins/apiv2/3b0da870f61f362b451a68450bb4de01/bulk_sms';
							   
							   $.ajax({
		
								'url': yql_url,
								'data': {
									'q': 'SELECT * FROM json WHERE url="'+url+'"',
									'format': 'json',
									'jsonCompat': 'new',
								},
								'dataType': 'jsonp',
								'success': function(response) {
									
									var res = response.query.results.json.data;
									
									var recent_sms = [];
									for(var i=0; i<res.length; i++){
										//recent_sms[] = res[i].json;
										recent_sms.push(res[i].json);
										//alert(recent_sms[i][0]+": "+recent_sms[i][1]+"  "+recent_sms[i][2]);
										
									}
									
									alert("Recently Recieve SMS against '3b0da870f61f362b451a68450bb4de01' :    "+recent_sms);
									//console.log(recent_sms);

								}
								
								});
								
							} */
							
							function renew_profiles(){
								
								var check = 0;
								var ids="";
								
								$('.checkbox').each(function() {
								   
								   if($(this).attr('checked')){
									   check++;
									   ids+=$(this).val()+',';
									 
								   };
								   
								   //ids = ids.substring(0,ids.length - 1);
								});
								
								if(check > 0){
									$("#profile_ids").val(ids);
									$("#renew_modal").modal("show");
								}else{
									alert("please select a profile")
								}
								
							}
							
							/* $.post("<?php echo base_url(); ?>admin/member/renew_profiles/",{id:id, phone:phone, expiry: expiry},function(data){ 
													
							}); */
							
							function remove_all(){
								$('#select_all').prop('checked', false);
							} 
							
							$(document).ready(function() {
							  $("div").removeClass("checker");
							});
							
							$(document).on('click', '#select_all', function(){
								$("div").removeClass("checker");
									if($(this).is(':checked')){
										$('.checkbox').prop('checked', true);
									} else {
										$('.checkbox').prop('checked', false);
									}
							});
							
							function edit_profile(id, phone, expiry){
								phone = $("#phone_"+id).text();
								expiry = $("#expiry_"+id).text();
								
								$("#modal_phone").val(phone);
								$("#modal_expiry").val(expiry);
								$("#profile_id").val(id);
								$("#profile_modal").modal("show");								
							}
							
							function update_phone(){
								
								var phone = $("#modal_phone").val();
								var expiry = $("#modal_expiry").val();
								var id = $("#profile_id").val();
								
								$.post("<?php echo base_url(); ?>admin/member/update_phone/",{id:id, phone:phone, expiry: expiry},function(data){ 
										
										
										if(data == 'success'){
											$('#phone_'+id).text(phone);
											$('#expiry_'+id).text(expiry);
											$("#profile_modal").modal("hide");
										}else{
											alert(data);
										}
								});
							}
							
							function del_profile(id){
		
								if (confirm("Are you sure to delete this number?") == false) {
									return;
								}

								$.post("<?php echo base_url(); ?>admin/member/delete_profile/",{id:id},function(data){
									
									if(data == "success"){
										$('#profile_'+id).remove();
									}else{
										alert("something went wrong");
									}
								});
									
							}
							
							</script>
							
							
							<!--<div class="table-toolbar">
							<div id="pagination">
								<ul class="tsc_pagination">
								
									<!-- Show pagination links ->
									<?php 
									//foreach ($links as $link){
										
										//echo '<li>'.$link.'</li>';
										
									//}?>
								</ul>
							</div>	
							</div>-->
							
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
		
		</div>
	</div>
	<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->


 <!-- Edit Profile Model -->
  <div class="modal fade" id="profile_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <b>Update Phone</b>
        </div>
        <div class="modal-body">
          <!--<b><p style="color: green" id="modal_profile_text"></p></b>-->
		  
		  <label>Phone</label>
          <input name="modal_phone" maxlength="10" class="form-control" type="number" id="modal_phone" />
		  
		  <label>Expiry</label>
          <input name="modal_expiry" class="form-control" type="date" value="" id="modal_expiry" />
		  
          <input name="profile_id" class="form-control" type="hidden" id="profile_id" />
        </div>
        <div class="modal-footer">
          <button type="button" onclick="update_phone()" class="btn btn-primary" >Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <!-- End edit profile Model-->
 
 <!-- Edit Profile expiry Model -->
  
  <form id="renew_form" method="post" action="<?php echo base_url().'admin/member/renew_profiles'; ?>">
  
  <div class="modal fade" id="renew_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <b>Update Expiry Date</b>
        </div>
        <div class="modal-body">
          <!--<b><p style="color: green" id="modal_profile_text"></p></b>-->
		  
		  <label>Expiry</label>
          <input name="modal_expiry" required class="form-control" type="date" value="" id="modal_expiry" />
		  
		  <input name="profile_ids" class="form-control" type="hidden" id="profile_ids" />
		  
		  <input name="user_id" type="hidden" value="<?php echo $this->uri->segment(4); ?>" />
          <!--<input name="profile_id" class="form-control" type="hidden" id="profile_id" />-->
        </div>
        <div class="modal-footer">
          <input type="submit" value="Update" class="btn btn-primary" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  </form>
 <!-- End edit profile Model-->


<?php 
$this->load->view('admin/include/footer.php');
?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

 <script type="text/javascript">
     
        function status(did)
       {

           var didsts = $( "#t_" + did ).data("id"); 
   
           $.post("<?php echo base_url(); ?>admin/member/change_status/",{id:did},function(data)
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
</body>
<!-- END BODY -->
</html>