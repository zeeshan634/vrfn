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

ul.tsc_pagination li a
{
	float:left;
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}
ul.tsc_pagination li
{
padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}
ul.tsc_pagination
{
	float:right;
margin:4px 0;
padding:0px;
height:100%;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
    max-width: 100%;
    display: inline-flex;
}
ul.tsc_pagination li
{

margin:0px;
padding:0px;
}
ul.tsc_pagination li a
{
color:black;
display:block;
text-decoration:none;
padding:7px 10px 7px 10px;
}
ul.tsc_pagination li a img
{
border:none;
}
ul.tsc_pagination li a
{
color:#0A7EC5;
border-color:#8DC5E6;
background:#F8FCFF;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
text-shadow:0px 1px #388DBE;
border-color:#3390CA;
background:#58B0E7;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}

</style>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			View Users
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
								<i class="fa fa-globe"></i>View Users List
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							
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
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>								
								 <th style="width: 10%;"> Name</th>
								 <th style="width: 15%;"> Company Name</th>
                                 <th style="width: 15%;"> Email</th>
                                 <th style="width: 5%;"> Phone</th>
                                 <th style="width: 5%;"> Status</th>
								 <th style="width: 10%;"> CreatedAt</th>
                                 <th> Action</th>
							</tr>
							</thead>
							<tbody>
                            <?php foreach($members as $row){ ?>
							<tr id="company_<?php echo $row['ID']; ?>" class="odd gradeX">
						      
								<td>
									 <?php echo $row['Name']; ?>
								</td>
								
								<td>
									 <?php echo $row['CompanyName']; ?>
								</td>
								
								<td>
								<?php echo $row['Email']; ?> </a>
								</td>
								
								<td>
									
								<?php echo $row['Phone']; ?> </a>
								</td>
								
								<td>
                                <a  href="javascript:status(<?php echo $row['ID']; ?>);">
                                            <?php if($row['Status'] == 'Inactive'){ ?>
                                            <img src="<?php echo base_url(); ?>assets/global/img/icon-img-down.png" data-id="0" id="t_<?php echo $row['ID'] ?>" />
                                           <?php }  else { ?>
                                            <img src="<?php echo base_url(); ?>assets/global/img/icon-img-up.png" data-id="1" id="t_<?php echo $row['ID'] ?>" />
                                            <?php } ?>       
                                                                                     
                                 </a>                                   
								</td>
												
                                <td>
                                <?php echo $row['createdAt']; ?>
                                </td>
								
                                <td class="center" style="width: 14%;">
								<!--<a href="<?php //echo base_url();?>admin/member/view/<?php //echo $row['ID'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>-->
								
                                  <a href="<?php echo base_url();?>admin/member/edit/<?php echo $row['ID'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
								  
                                  <a  onclick="del_company(<?php echo $row['ID']; ?>)" class="btn btn-primary btn-xs"><i class="fa fa-trash-o"></i></a>
								
								  <a href="<?php echo base_url();?>admin/member/add_profiles/<?php echo $row['ID'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i></a>
								  
								  <a href="<?php echo base_url();?>admin/member/view_profiles/<?php echo $row['ID'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
								  
								  <a href="<?php echo base_url();?>admin/member/view_user_sms/<?php echo $row['ID'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-inbox" aria-hidden="true"></i></a>
								  
								</td>
							</tr>
						     <?php } ?>
						
							</tbody>
							</table>
							
							
							<div class="table-toolbar">
							<div id="pagination">
								<ul class="tsc_pagination">
								
									<!-- Show pagination links -->
									<?php 
									foreach ($links as $link){
										
										echo '<li>'.$link.'</li>';
										
									}?>
								</ul>
							</div>	
							</div>
							
							
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

function del_company(id){
		
		if (confirm("Are you sure to delete this user?") == false) {
                return;
		}
		
           $.post("<?php echo base_url(); ?>admin/member/delete_company/",{id:id},function(data)
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