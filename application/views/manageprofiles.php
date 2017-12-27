<?php 
$this->load->view('include/header.php');
?>
<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-cogs"></i> PROFILES</h2>
			<div class="manage">
				<div class="row">
					<?php ///if(count($profiles) <= 0){ ?>
					<!--<a href="<?php //echo base_url(); ?>profile/addprofiles"  class="btn btn-lg btn-success pull-right btn-block btn-signin" style="margin:0 auto;" >Add Profiles</a>-->
					<?php //} ?>
					<div class="col-md-12">
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
						<?php $i=1; if(count($userplans) > 0){ foreach($userplans as $p){ 
																								
								?>
						<div class="col-md-3">
							<div class="manage-box">
								<p class="col-md-6 col-xs-6" style="padding:0;font-size:12px;"><b>Created:</b> <?php echo date("d-m-Y",$p->createdAt); ?></p>
								<p class="col-md-6  col-xs-6 text-right" style="padding:0;color:#f00;font-size:12px;"><b>Expiry: </b> <?php echo date("d-m-Y",$p->period_end); ?></p>
								<h3><b>Item:</b> <?php echo $p->PackageName; ?></h3>
								<h3><b>Price:</b> $<?php echo ' '.$p->Price.' '; ?>/month</h3>
							</div>
						</div>
						<?php $i++; }
								   }else{
									   echo "<h3 class='text-center'> No Record </h3>";
								   }
								?>
					</div>
					<div class="col-md-8 col-md-offset-2">
						
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