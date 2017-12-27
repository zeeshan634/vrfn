<?php 
$this->load->view('admin/include/header.php');
?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<style type="text/css">
th{
    white-space: nowrap;
    width: 20%;
    text-align: right;
    border-right: solid 1px;
}

</style>
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
			View Hotel Detail
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
						<a href=""><?php echo $user_data[0]['Name']; ?> Profile</a>
                 
						
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-lg-offset-2 col-md-8">
                      <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success alert-block fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <h4>
                      <i class="fa fa-ok-sign"></i>
                      Success!
                  </h4>
                        <p>
                            <?php echo $this->session->flashdata('success'); ?>
                        </p>
                    </div>
                    <?php } ?>
		<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-comments"></i> <?php echo $user_data[0]['Name']; ?> Profile
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-striped table-hover">
							
								<tbody>
								<tr>
									<th>
										 Full Name 
									</th>
									<td>
										<?php echo $user_data[0]['Name']; ?>
									</td>									
								</tr>
								<tr>
									<th>
										 UserName 
									</th>
									<td>
										<?php echo $user_data[0]['UserName']; ?>
									</td>									
								</tr>
                                <tr>
									<th>
										 Village
									</th>
									<td>
										<?php echo $user_data[0]['Village']; ?>
									</td>									
								</tr>
                                
                                <tr>
									<th>
										Area 
									</th>
									<td>
										<?php echo $user_data[0]['Area']; ?>
									</td>									
								</tr>
                              
                              
                              	<tr>
									<th>
										Url 
									</th>
									<td>
										<?php echo $user_data[0]['Url']; ?>
									</td>									
								</tr> 
                          
                              	<tr>
									<th>
										Status
									</th>
									<td>
										<?php echo $user_data[0]['Status']; ?>
									</td>									
								</tr>
                                	
                              	<tr>
									<th>
										 Created At 
									</th>
									<td>
									
                                         <?=date('F d,Y g:i A',strtotime($user_data[0]['createdAt']))?>
									</td>									
								</tr>
                                <tr>
									<th>
										 Updated At 
									</th>
									<td>
									
                                         <?=date('F d,Y g:i A',strtotime($user_data[0]['updatedAt']))?>
									</td>									
								</tr>
                              	<tr>
									<th>
										 last Login 
									</th>
									<td>
									 <?php if($user_data[0]['LastLogin']=='0000-00-00 00:00:00')
                                                                {
                                                                   echo "Never Logged In"; 
                                                                }
                                                                else
                                                                {
                                                                   echo date('F d,Y g:i A',strtotime($user_data[0]['LastLogin']));
                                                                }
                                    ?>
									</td>									
								</tr>
                                <tr>
                                <td colspan="2" style="text-align: right;">
                                <a href="<?php echo base_url();?>admin/member/edit/<?php echo $user_data[0]['Id']; ?>"><button type="button" class="btn green">Edit Profile</button></a>
                                </td>
                                </tr>
                                  
								</tbody>
								</table>
							</div>
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=base_url()?>assets/admin/pages/scripts/table-managed.js"></script>
<script>
jQuery(document).ready(function() {       
    TableManaged.init();
});
</script>
 <script type="text/javascript">
       function status(u_id)
       {
       $.get("<?php echo base_url(); ?>admin/user/change_user_status/"+u_id,                
                function(data, status){
                    if(status=='success')
                    {
                         if(data!=0)
                         {
                            $('#status'+u_id).text(data);
                         }
                     }
                    else
                    {
                         
                    }
               
                });
       }
                              
                              
</script>
</body>
<!-- END BODY -->
</html>