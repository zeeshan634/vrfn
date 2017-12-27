<?php 
$this->load->view('include/header.php');
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

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-cogs"></i> Notifications</h2>
			<div class="manage">
				<div class="row">
					<?php ///if(count($profiles) <= 0){ ?>
					<!--<a href="<?php //echo base_url(); ?>profile/addprofiles"  class="btn btn-lg btn-success pull-right btn-block btn-signin" style="margin:0 auto;" >Add Profiles</a>-->
					<?php //} ?>
					<div class="col-md-8 col-md-offset-2">
						<div class="table-responsive">
							<table class="table">
								<thead>
								
								
									<?php if($this->session->flashdata('psuccess')){ ?>
										<tr><th colspan="5">
										<div class="alert alert-block  alert-success fade in">
											<button data-dismiss="alert" class="close close-sm" type="button">
												<i class="fa fa-times"></i>
											</button>
											<strong></strong> <?php echo $this->session->flashdata('psuccess'); ?>
										</div>
										</th></tr>
									<?php } ?>
							
							
									<tr>
										<th>Key</th>
										<th>User</th>
										<th>Number</th>
										<th>Message</th>
										
									</tr>
								</thead>
								<tbody>
								
								<?php $i=1; if(count($api_messages) > 0){ foreach($api_messages as $msg){ 
																								
								?>
								
								    <tr>
										
										<td><?php echo $msg->msg_key; ?></td>
										<td><?php echo $msg->user; ?></td>
										<td><?php echo $msg->number; ?></td>
										<td><?php echo $msg->messages; ?></td>
										
										</tr>
								
								<?php $i++; }
								   }else{
									   echo "<tr><td colspan='5'><h3> No Record </h3></td></tr>";
								   }
								?>
								
									<!--<tr>
										<td>1</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-success">Approved</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>2</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-warning">Pending</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>3</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-danger">Cancel	</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>4</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-success">Approved</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>5</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-warning">Pending</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>6</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-danger">Cancel	</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>7</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-success">Approved</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>8</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-warning">Pending</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>9</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-danger">Cancel	</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>10</td>
										<td>0154</td>
										<td>Jeff Bosken</td>
										<td>10-05-2017</td>
										<td><label class="label label-success">Approved</label></td>
										<td><a href="edit-profile.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>-->
								</tbody>
							</table>
							
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
			</div>
		</div>
	</div>
	

<?php 
$this->load->view('include/footer.php');
?>


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