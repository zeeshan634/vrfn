<?php 
$this->load->view('include/header.php');
?>


<style>

.offer-box {
    background: #dbebef;
	padding: 8px;
    height: 200px;
	
    border-radius: 10px;
	margin: 10px 0px;
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
		<div class="row">
			<h2 class="text-center"><i class="fa fa-cogs"></i> ADD PROFILES</h2>
			<h3 class="text-center">Current Profiles: <span id="no_of_user"><?php echo $noofuser; ?></span></h3>
		</div>
			<div class="manage">
				<div class="row">	
						<div class="text-center">
							<?php if($this->session->flashdata('success')){ ?>
							 <div class="alert alert-block  alert-success fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="fa fa-times"></i>
									</button>
									<strong></strong> <?php echo $this->session->flashdata('success'); ?>
								</div>
							 
							<?php } ?>
							<?php if($this->session->flashdata('error')){ ?>
								<div class="alert alert-block  alert-danger fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="fa fa-times"></i>
									</button>
									<strong></strong> <?php echo $this->session->flashdata('error'); ?>
								</div>
							 
							<?php } ?>
							
							<div style="display: none" id="api_success" class="alert alert-block  alert-success fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="fa fa-times"></i>
									</button>
									<strong> Subscription Successfull</strong>
							</div>
							
							<div style="display: none" id="api_fail" class="alert alert-block  alert-danger fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="fa fa-times"></i>
									</button>
									<strong> Something went wrong </strong>
							</div>
							
							
						</div>
							
					<div class="text-center">
						<?php foreach($verifan_packages as $p){ ?>
											
							 
							  <div class="col-md-4">
							  <div class="offer-box" style="<?php //if($p->ID == $pid) echo 'background-color: #ffe4c4'; ?>">
							  <h2><span id="plan_title_<?php echo $p->ID; ?>"><?php echo $p->PackageName; ?></span></h2><p><?php echo $p->Price."$/Month."; ?></p><p><?php echo "You can add upto ".$p->NoOfProfiles." profile"; ?></p>
							  <p>
							  
							  <?php

								$price = $p->Price;
								/* if($IsStripeCus != 1){
								   if($p->FirstMonthDiscount > 0){ $price = $price-$p->FirstMonthDiscount; }
								} */
								
							  ?>
							  
							<input type="hidden" id="plan_price_<?php echo $p->ID; ?>" value="<?php echo $price; ?>" />
							<input type="hidden" id="plan_<?php echo $p->ID; ?>" value="<?php echo $p->ID; ?>" />
                            <a id="btn_<?php echo $p->ID; ?>" class="btn btn-lg btn-block btn-info pull-right" onclick="proccess(this)" href="javascript:;">PAY NOW!</a> 
                               
							  
							<form id="mem_form" action="<?php echo base_url(); ?>membership/process" method="POST">
								  <!--<script
									src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
									data-key="pk_test_8Cn9uwSFpreC2pKFrPObaajM"
									data-amount="<?php //echo $price; ?>00"
									data-name="Demo Site"
									data-description="2 widgets ($20.00)"
									data-image="https://stripe.com/img/documentation/checkout/marketplace.png">
								  </script>-->
								  
								  <!--<input type="hidden" name="MemID" id="MemID" value="" />-->
								  <input type="hidden" name="PlanID" id="PlanID" value="<?php echo $p->ID; ?>" />
								  
							</form>
							  
							  </p>
							  </div>
							  </div>
							
						
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
   
   <script type="text/javascript">
   
   var handler = StripeCheckout.configure
    ({
    key: '<?php echo $this->config->config['stripe_api_key']; ?>',
    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
    token: function(token) 
    {
        $('#mem_form').append("<input type='hidden' name='stripeToken' value='" + token.id + "' />");      
        setTimeout(function(){
			
			$("#windows8").show();
			//$(".windows8").fadeOut("slow");
			
			//var MemID = $("#MemID").val();
			var plan_id = $("#PlanID").val();
			
			//$('#mem_form').submit(); 
			$.post("<?php echo base_url(); ?>membership/process",{PlanID:plan_id, stripeToken:token.id},function(data)
           { 
				if(data == "success"){
					
					$.post("<?php echo base_url(); ?>Api/addprofiles",{stripeToken:token.id},function(data)
				   { 
						if(data == "true"){
							
							var newprofiles = $('#plan_price_'+plan_id).val();
							var current = $('#no_of_user').text();
							
							var total = parseInt(newprofiles)+parseInt(current);
							$('#no_of_user').text(total);
							
							$('#api_fail').hide();
							$('#api_success').show();
							$("#windows8").hide();
							//alert("ApI response successfull");
						}else{
							$('#api_success').hide();
							$('#api_fail').show();
							//alert("ApI response Fail");
						}
				   });
					
					
				}else{
					alert("something went wrong");
				}
           });
			
		}, 200); 
    }
    }); 


	function proccess(e) { 
		
		var id=e.id;
		var gid=id.replace("btn_", "");
		var total_g=$('#plan_price_'+gid).val();
		var plan_id=$('#plan_'+gid).val();
		var title=$('#plan_title_'+gid).text();
		//alert(total_g); return;
		if(title=="")
		{
			return false;
		}
		
		if(total_g <= 0){
			alert("Amount must be greater than 0");
			return false;
		}
		
		$('#MemID').val(gid);
		$('#PlanID').val(plan_id);
		
		//total=total_g*100;
		total=total_g*100;
		handler.open({
		name: title,
		description: 'Charges( $'+total_g+' )',
		amount: total
		});
		e.preventDefault();
		
	}
	
	window.addEventListener('popstate', function() {
	  handler.close();
	});    
   </script> 