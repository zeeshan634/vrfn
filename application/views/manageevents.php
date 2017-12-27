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


#windows8{
	position: relative;
	width: 100%;
	height:100vh;
	margin:auto;
	
    background: rgba(255, 255, 255, 0.5);
    z-index: 99;
}
.windows8 {
	position: relative;
	width: 78px;
	height:78px;
	margin:auto;
	    top: 40%;
}

.windows8 .wBall {
	position: absolute;
	width: 74px;
	height: 74px;
	opacity: 0;
	transform: rotate(225deg);
		-o-transform: rotate(225deg);
		-ms-transform: rotate(225deg);
		-webkit-transform: rotate(225deg);
		-moz-transform: rotate(225deg);
	animation: orbit 6.96s infinite;
		-o-animation: orbit 6.96s infinite;
		-ms-animation: orbit 6.96s infinite;
		-webkit-animation: orbit 6.96s infinite;
		-moz-animation: orbit 6.96s infinite;
}

.windows8 .wBall .wInnerBall{
	position: absolute;
	width: 10px;
	height: 10px;
	background: rgb(0,0,0);
	left:0px;
	top:0px;
	border-radius: 10px;
}

.windows8 #wBall_1 {
	animation-delay: 1.52s;
		-o-animation-delay: 1.52s;
		-ms-animation-delay: 1.52s;
		-webkit-animation-delay: 1.52s;
		-moz-animation-delay: 1.52s;
}

.windows8 #wBall_2 {
	animation-delay: 0.3s;
		-o-animation-delay: 0.3s;
		-ms-animation-delay: 0.3s;
		-webkit-animation-delay: 0.3s;
		-moz-animation-delay: 0.3s;
}

.windows8 #wBall_3 {
	animation-delay: 0.61s;
		-o-animation-delay: 0.61s;
		-ms-animation-delay: 0.61s;
		-webkit-animation-delay: 0.61s;
		-moz-animation-delay: 0.61s;
}

.windows8 #wBall_4 {
	animation-delay: 0.91s;
		-o-animation-delay: 0.91s;
		-ms-animation-delay: 0.91s;
		-webkit-animation-delay: 0.91s;
		-moz-animation-delay: 0.91s;
}

.windows8 #wBall_5 {
	animation-delay: 1.22s;
		-o-animation-delay: 1.22s;
		-ms-animation-delay: 1.22s;
		-webkit-animation-delay: 1.22s;
		-moz-animation-delay: 1.22s;
}



@keyframes orbit {
	0% {
		opacity: 1;
		z-index:99;
		transform: rotate(180deg);
		animation-timing-function: ease-out;
	}

	7% {
		opacity: 1;
		transform: rotate(300deg);
		animation-timing-function: linear;
		origin:0%;
	}

	30% {
		opacity: 1;
		transform:rotate(410deg);
		animation-timing-function: ease-in-out;
		origin:7%;
	}

	39% {
		opacity: 1;
		transform: rotate(645deg);
		animation-timing-function: linear;
		origin:30%;
	}

	70% {
		opacity: 1;
		transform: rotate(770deg);
		animation-timing-function: ease-out;
		origin:39%;
	}

	75% {
		opacity: 1;
		transform: rotate(900deg);
		animation-timing-function: ease-out;
		origin:70%;
	}

	76% {
	opacity: 0;
		transform:rotate(900deg);
	}

	100% {
	opacity: 0;
		transform: rotate(900deg);
	}
}

@-o-keyframes orbit {
	0% {
		opacity: 1;
		z-index:99;
		-o-transform: rotate(180deg);
		-o-animation-timing-function: ease-out;
	}

	7% {
		opacity: 1;
		-o-transform: rotate(300deg);
		-o-animation-timing-function: linear;
		-o-origin:0%;
	}

	30% {
		opacity: 1;
		-o-transform:rotate(410deg);
		-o-animation-timing-function: ease-in-out;
		-o-origin:7%;
	}

	39% {
		opacity: 1;
		-o-transform: rotate(645deg);
		-o-animation-timing-function: linear;
		-o-origin:30%;
	}

	70% {
		opacity: 1;
		-o-transform: rotate(770deg);
		-o-animation-timing-function: ease-out;
		-o-origin:39%;
	}

	75% {
		opacity: 1;
		-o-transform: rotate(900deg);
		-o-animation-timing-function: ease-out;
		-o-origin:70%;
	}

	76% {
	opacity: 0;
		-o-transform:rotate(900deg);
	}

	100% {
	opacity: 0;
		-o-transform: rotate(900deg);
	}
}

@-ms-keyframes orbit {
	0% {
		opacity: 1;
		z-index:99;
		-ms-transform: rotate(180deg);
		-ms-animation-timing-function: ease-out;
	}

	7% {
		opacity: 1;
		-ms-transform: rotate(300deg);
		-ms-animation-timing-function: linear;
		-ms-origin:0%;
	}

	30% {
		opacity: 1;
		-ms-transform:rotate(410deg);
		-ms-animation-timing-function: ease-in-out;
		-ms-origin:7%;
	}

	39% {
		opacity: 1;
		-ms-transform: rotate(645deg);
		-ms-animation-timing-function: linear;
		-ms-origin:30%;
	}

	70% {
		opacity: 1;
		-ms-transform: rotate(770deg);
		-ms-animation-timing-function: ease-out;
		-ms-origin:39%;
	}

	75% {
		opacity: 1;
		-ms-transform: rotate(900deg);
		-ms-animation-timing-function: ease-out;
		-ms-origin:70%;
	}

	76% {
	opacity: 0;
		-ms-transform:rotate(900deg);
	}

	100% {
	opacity: 0;
		-ms-transform: rotate(900deg);
	}
}

@-webkit-keyframes orbit {
	0% {
		opacity: 1;
		z-index:99;
		-webkit-transform: rotate(180deg);
		-webkit-animation-timing-function: ease-out;
	}

	7% {
		opacity: 1;
		-webkit-transform: rotate(300deg);
		-webkit-animation-timing-function: linear;
		-webkit-origin:0%;
	}

	30% {
		opacity: 1;
		-webkit-transform:rotate(410deg);
		-webkit-animation-timing-function: ease-in-out;
		-webkit-origin:7%;
	}

	39% {
		opacity: 1;
		-webkit-transform: rotate(645deg);
		-webkit-animation-timing-function: linear;
		-webkit-origin:30%;
	}

	70% {
		opacity: 1;
		-webkit-transform: rotate(770deg);
		-webkit-animation-timing-function: ease-out;
		-webkit-origin:39%;
	}

	75% {
		opacity: 1;
		-webkit-transform: rotate(900deg);
		-webkit-animation-timing-function: ease-out;
		-webkit-origin:70%;
	}

	76% {
	opacity: 0;
		-webkit-transform:rotate(900deg);
	}

	100% {
	opacity: 0;
		-webkit-transform: rotate(900deg);
	}
}

@-moz-keyframes orbit {
	0% {
		opacity: 1;
		z-index:99;
		-moz-transform: rotate(180deg);
		-moz-animation-timing-function: ease-out;
	}

	7% {
		opacity: 1;
		-moz-transform: rotate(300deg);
		-moz-animation-timing-function: linear;
		-moz-origin:0%;
	}

	30% {
		opacity: 1;
		-moz-transform:rotate(410deg);
		-moz-animation-timing-function: ease-in-out;
		-moz-origin:7%;
	}

	39% {
		opacity: 1;
		-moz-transform: rotate(645deg);
		-moz-animation-timing-function: linear;
		-moz-origin:30%;
	}

	70% {
		opacity: 1;
		-moz-transform: rotate(770deg);
		-moz-animation-timing-function: ease-out;
		-moz-origin:39%;
	}

	75% {
		opacity: 1;
		-moz-transform: rotate(900deg);
		-moz-animation-timing-function: ease-out;
		-moz-origin:70%;
	}

	76% {
	opacity: 0;
		-moz-transform:rotate(900deg);
	}

	100% {
	opacity: 0;
		-moz-transform: rotate(900deg);
	}
}

</style>

<div id="windows8" style="display: none">
<div class="windows8">
	<div class="wBall" id="wBall_1">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_2">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_3">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_4">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_5">
		<div class="wInnerBall"></div>
	</div>
</div>
</div>

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-cogs"></i> EVENTS</h2>
			
		<form  style="display:flow-root;" id="search_form" method="post" action="<?php echo base_url().'profile/manageevents'; ?>">
			<div class="col-md-4 form-group pull-right">
			  
			  <select name="search_list" class="form-control" id="sel1" style="width:65%;float:left;">
				<option value="">Sort By</option>
				<option value="coming_soon" <?php if($sort=="coming_soon") echo 'selected'; ?>>Coming Soon</option>
				<option value="ending_soon" <?php if($sort=="ending_soon") echo 'selected'; ?>>Ending Soon</option>
				<option value="newest" <?php if($sort=="newest") echo 'selected'; ?>>Newest</option>
				
			  </select>
			  
			  <!--<input type="text" id="s_val" name="s_val" value="" />-->
			  <input type="submit" value="Sort" class="btn btn-info" style="height:34px;"/>
			  
			</div>
			
			
			
		</form>
			
			<div class="manage">
				<div class="row">
					<!--<a href="<?php //echo base_url(); ?>profile/create_event"  class="btn btn-lg btn-success pull-right btn-block btn-signin" style="margin:0 auto;" >Create Events</a>-->
					<div class="col-md-12" style="display:flow-root;">
					
					<div id="s_msg" style="display: none" class="alert alert-block  alert-success fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="fa fa-times"></i>
									</button>
									<strong> Registration successfull, Record updated in data base</strong>
									
					</div>
						
					<?php if(count($events) > 0){ 
								
							foreach($events as $event){?>
					
							<div class="col-md-6" >
							<div class=" event-card" style="border:1px dashed #01b1d7;padding:10px;margin:10px 0px;  display: flow-root;">
								<div class="col-md-6">
								
									<?php if(strlen($event->EventImage) <= 0){ $image = 'default.png'; }else{ $image = $event->EventImage; }?>
								
									<a href="<?php echo base_url().'profile/event_detail/'.$event->ID; ?>"><img style="width: 350px; height: 200px" src="<?php echo base_url().'uploads/events/'.$image; ?>" class="img-responsive"></a>
								</div>
								<div class="col-md-6">
									<h3 style="margin:5px 0px;"><a href="<?php echo base_url().'profile/event_detail/'.$event->ID; ?>"><?php echo substr($event->EventName, 0, 25); ?></a></h3>
									<p><b>Registration Due:</b> <?php echo date('d-m-y', strtotime($event->RegistrationDeadline)); ?>
									
									( <?php 	$deadline = date('y-m-d', strtotime($event->RegistrationDeadline)); 
												$now   = date('y-m-d');
																
												$date1=date_create($now);
												$date2=date_create($deadline);
												$diff=date_diff($date1,$date2);
															
												$days = $diff->format("%R%a days");
															
															if($days > 1){
																echo abs($days).' days Remaining';
															}else if($days == 1){
																echo abs($days).' day left';
															}else if($days == 0){
																echo "Last day to register";
															}else{
																echo "Date Expired";
															}
															
									?>
										)
									
									</p>
									<!--<b>ID: </b><?php //echo $event->ID; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
									<p><b>Event Date:</b> <?php echo date('d-m-y', strtotime($event->EventDate)); ?></p>
									
									<p><b>Extras:</b> <?php echo substr($event->FreeFormText, 0, 50); ?></p>
									
				<?php if($is_purchased_package > 0){ ?>
									
									<?php if($event->ExtraPrice > 0){ ?>
										
										<p><b>Extras:</b> $<?php echo $event->ExtraPrice; ?> per profile
										<b><u>Profiles Register</u> With Extras ($<?php echo $event->ExtraPrice*$noofuser; ?>)</b></p>						
										
										<input type="hidden" id="extra_price_<?php echo $event->ID; ?>" value="<?php echo $event->ExtraPrice*$noofuser; ?>" />
		
                            <!--<a id="btn_<?php //echo $p->ID; ?>" class="btn btn-lg btn-block btn-info pull-right"  href="javascript:;">PAY NOW!</a> -->
									<span id="reg_btns_<?php echo $event->ID; ?>">	
									
									
									<?php if($event->cnt <= 0 && $days >= 0){ ?>
										<p><button id="event_<?php echo $event->ID; ?>" onclick="register_profile('<?php echo $event->ID; ?>', 'NO')" style="margin:5px 0px;" class="btn-edit">Register Profiles </button>
										<button id="btn_<?php echo $event->ID; ?>" onclick="register_profile('<?php echo $event->ID; ?>', 'YES')" style="margin:5px 0px;" class="btn-edit" > Register With Extras </button>
									<?php } ?>
									
									<?php }else{ 
										
										if( $event->cnt <= 0 && $days >= 0){ ?>
									
										<p><button style="margin-top: 30px;" id="event_<?php echo $event->ID; ?>" onclick="register_profile('<?php echo $event->ID; ?>', 'NO')" style="margin:5px 0px;" class="btn-edit">Register Profiles </button>
									
										<?php } 
										
									} ?>
									
				<?php }else{
					echo "<p style='color: darkgrey;'>Purchase a plan to add profiles</p>";
				} ?>
									
									
									
									</span>
																		
									</p>
								</div>							
							</div>
							</div>
						
							<?php } ?> 
							
							
							
						
												
						<!--<div class="row event-card" style="border:1px dashed #01b1d7;padding:10px;margin:10px 0px;">
							<div class="col-md-6">
								<img src="<?php //echo base_url();?>/assets/images/event.png" class="img-responsive">
							</div>
							<div class="col-md-6">
								<h3 style="margin:5px 0px;">Event Name</h3>
								<p><b>Registration Due:</b> Oct 29 2017(remaining days)</p>
								<p><b>Register Profiles</b></p>
								<p>Profile 1</p>
								<p>Profile 2</p>
							</div>							
						</div>-->
						
						<input type="hidden" id="event_id1" type="text" />
						<input type="hidden" id="extraprice1" type="text" />
						 
						<div class="col-md-6 col-md-offset-3" >
						<div class="event-card-other" style="border:1px dashed #01b1d7;padding:10px;margin:10px 0px;display:flow-root;">
							<div class="col-md-6">
								<h1 class="text-center">OTHER</h1>
							</div>
							<div class="col-md-6">
								<label>Registration URL</label>
								<p id="suc_url" style="color: white; background-color: green;; display: none"></p>
								<input id="reg_url" type="text" class="form-control">
								<p id="err_url" style="color: red; display: none"></p>
								<a href="javascript:;" onclick="submit_url()" style="margin:5px 0px;" class="btn-edit pull-right">Submit</a>
							</div>							
						</div>
						</div>
						<div class="col-md-12">
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
							
							</br>
							</br>
							
							
									
						<?php } else{ ?>
								
								<tr><td colspan="4"><h4> No Record </h4></td></td></tr>
								
						<?php } ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
$this->load->view('include/footer.php');
?>

<script src="https://checkout.stripe.com/checkout.js"></script>

<script>

var handler = StripeCheckout.configure({
	
    key: '<?php echo $this->config->config['stripe_api_key']; ?>',
    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
    token: function(token) 
    {   
		
		var event_id = $("#event_id1").val();
		var total = $("#extraprice1").val();
		var token = token.id;
		
		var user_id = '<?php echo $company_id; ?>';
		var NoOfProfiles = '<?php echo $noofuser; ?>';
		//var extraprice = $('#extra_price_'+event_id).val();
		
		setTimeout(function(){	
			
			$("#windows8").show();
			
			$.ajax({
			   type: "POST",
			   url: "<?php echo base_url().'Api/register_profiles'; ?>",
			   async: false ,
			   data: {event_id: event_id},
			   success: function(response) { 
					if(response == 'true'){
						
						//alert("ApI response successfull");
						
						$.ajax({
						   type: "POST",
						   url: "<?php echo base_url().'profile/register_profiles'; ?>",
						   data: {event_id: event_id, user_id:user_id, NoOfProfiles: NoOfProfiles, extra:'YES', total:total, token: token},
						   success: function(response) { 
						   
								//alert(response); return;
								if(response == 'true'){
									//alert("ApI response successfull, Record updated in data base");
									$("#reg_btns_"+event_id).hide();
									$("#s_msg").show();
									$("#windows8").hide();
										
								}else{
									alert("Api response Fail");
								}	
						   }  
						});
						
						
					}else{
						alert("Api response Fail");
					}	
			   }  
			});
			
			
		}, 500); 
		
		
        
    }

});

function register_profile(event_id, extra){
	
	//var id = l.id;
	//var event_id=id.replace("event_", "");
	

	
	var user_id = '<?php echo $company_id; ?>';
	var NoOfProfiles = '<?php echo $noofuser; ?>';
	var extraprice = $('#extra_price_'+event_id).val();
	total=extraprice*100;
	
	
	$("#event_id1").val(event_id);
	$("#extraprice1").val(total);
	
	//alert(extraprice); return;
	//var extra = "NO";
	
	if(extra == 'YES'){
		handler.open({
		name: 'Pay with extra price',
		description: 'Charges( $'+total+' )',
		amount: total
		});
		e.preventDefault();
	}else{
	
	
		$.ajax({
			   type: "POST",
			   url: "<?php echo base_url().'Api/register_profiles'; ?>",
			   async: false ,
			   data: {event_id: event_id},
			   success: function(response) { 
					if(response == 'true'){
						
						//alert("ApI response successfull");
						
						$.ajax({
						   type: "POST",
						   url: "<?php echo base_url().'profile/register_profiles'; ?>",
						   data: {event_id: event_id, user_id:user_id, NoOfProfiles: NoOfProfiles, extra:extra},
						   success: function(response) { 
						   
								//alert(response); return;
								if(response == 'true'){
									//alert("");
									$("#reg_btns_"+event_id).hide();
									$("#s_msg").show();
										
								}else{
									alert("Api response Fail");
								}	
						   }  
						});
						
						
					}else{
						alert("Api response Fail");
					}	
			   }  
			});
	}
	
	//alert(extra);
}

function proccess(l){
	var id = l.id;
	var event_id=id.replace("btn_", "");
	var user_id = '<?php echo $company_id; ?>';
	var NoOfProfiles = '<?php echo $noofuser; ?>';
	var extra = "YES";
	
	$.ajax({
		   type: "POST",
		   url: "<?php echo base_url().'Api/register_profiles'; ?>",
		   async: false ,
		   data: {event_id: event_id},
		   success: function(response) { 
				if(response == 'true'){
					
					//alert("ApI response successfull");
					
					$.ajax({
					   type: "POST",
					   url: "<?php echo base_url().'profile/register_profiles'; ?>",
					   data: {event_id: event_id, user_id:user_id, NoOfProfiles: NoOfProfiles, extra:extra},
					   success: function(response) { 
					   
							//alert(response); return;
							if(response == 'true'){
								$("#reg_btns_"+event_id).hide();
								$("#s_msg").show();
								//alert("ApI response successfull, Record updated in data base");	
							}else{
								alert("Api response Fail");
							}	
					   }  
					});
					
					
				}else{
					alert("Api response Fail");
				}	
		   }  
		});
	
	//alert(extra);
}

function isUrlValid(url) {
    //return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
	
	var regex = new RegExp("^(http[s]?:\\/\\/(www\\.)?|ftp:\\/\\/(www\\.)?|www\\.){1}([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?");
	return regex.test(url);

	}

function submit_url(){
	var url = $('#reg_url').val();
	if(isUrlValid(url)){
		$('#err_url').hide();
		
		
		$.ajax({
		   type: "POST",
		   url: "<?php echo base_url().'profile/submit_url'; ?>",
		   async: false ,
		   data: {url: url},
		   success: function(response) { 
				if(response == 'exist'){
					//$('#suc_url').show();
					//$('#suc_url').html('URL already submitted for admin review');
					$('#suc_url').hide();
					$('#err_url').show();
					$('#err_url').html('URL already submitted for admin review');
					
					
					$('#reg_url').val('');
				}else if(response == 'true'){
					$('#err_url').hide();
					$('#suc_url').show();
					$('#suc_url').html('URL submitted Successfully');
					$('#reg_url').val('');
				}else{
					//$('#suc_url').val("");
					//$('#suc_url').css("display", "none");
					
					$('#err_url').val("");
					$('#err_url').css("display", "none");
				}	
		   }  
		});
		
	}else{
		$('#suc_url').hide();
		$('#err_url').show();
		$('#err_url').html("Please enter a valid url");
	}
	
}

function submit_form(l){
	//var txt = l.value;
	//$("#s_val").val(txt); 
	//$("#search_form").submit();
}


</script>