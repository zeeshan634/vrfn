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
			View Plans
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
					    <a href="<?=base_url()?>admin">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						Plans
						
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
					
					
					<div id="sub_cancel_err" style="display: none" class="alert alert-success alert-block fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <p>Subscription Cancelled Successfully</p>
                    </div>
					
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>View Plans List
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
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>								
								 <th> Email</th>
								 <th> Item</th>
                                 <th> Price</th>
                                 <th> Order Date</th>
                                 <th> Expiry Date</th>
								 <th> Actions </th>
                                 
							 </tr>
							</thead>
							<tbody>
                            <?php foreach($membership as $row){ ?>
							<tr id="company_<?php echo $row->MembershipID; ?>" class="odd gradeX">
						      
								<td><?php echo $row->email; ?></td>
								
								<td><?php echo $row->item; ?></td>
								
								<td><?php echo $row->price; ?></td>
								
								<td><?php echo date("d-m-Y", $row->period_start); ?></td>
								
								<td><?php echo date("d-m-Y", $row->period_end); ?></td>
								
								
								
								
								
                                <td class="center" style="width: 14%;">
								<!--<a href="<?php //echo base_url();?>admin/member/view/<?php //echo $row['ID'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>-->
								<div id="cancel_<?php echo $row->MembershipID; ?>">
                                  <!--<a href="<?php //echo base_url().'admin/events/edit_event/'.$row->MembershipID; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>-->
								  <?php if($row->Status == 0){ ?>
									<a onclick="cancel_subscription('<?php echo $row->MembershipID; ?>', '<?php echo $row->StripeSubscriptionID; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-trash-o"></i></a>
								  <?php }else{ ?>
										<span style="color:red;">Canceled</span>
								  <?php } ?>
								  
								 </div>
								  
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

function cancel_subscription(id, stripesubid){
		
		//alert(id); alert(stripesubid); return;
		if (confirm("Are you sure to cancel this subscription") == false) {
                return;
		}
		
           $.post("<?php echo base_url(); ?>admin/orders/cancel_subscription/",{id:id, stripesubid: stripesubid},function(data)
           { 
				if(data == 1){
					
					
					$('#cancel_'+id).html("<span style='color:red;'>Canceled</span>");
					//$('#company_'+id).remove();
					$("#sub_cancel_err").show();
				}else{
					$("#sub_cancel_err").hide();
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