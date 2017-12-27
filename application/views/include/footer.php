<?php 

$events = $this->db->query("select * from verifan_events order by ID desc limit 4")->result();

//echo "<pre>"; print_r($events); 
		
 ?>
	
		<div id="footer" style="margin-top:0;">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-heading">
							<h3><span>about</span> us</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-heading">
							<h3><span>Quick</span> Links</h3>
							<div class="insta">
								<ul>
									<li><a href="<?php echo base_url(); ?>home">Home</a></li>
									<li><a href="<?php echo base_url(); ?>login/register">Join Now</a></li>
									<li><a href="<?php echo base_url(); ?>login">Login</a></li>
									<li><a href="#">Support</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="footer-heading">
							<h3><span>latest</span> Events</h3>
							<ul>
							
							<?php foreach($events as $event){ ?>

								<li><a href="<?php echo base_url().'profile/event_detail/'.$event->ID; ?>"><?php echo $event->EventName.": ".substr($event->EventAddress, 0, 50);  //date("d-m-Y", strtotime($event->EventDate)); ?></a>  </li>

							<?php } ?>
								<!--<li><a href="#">Trends don't matter, but techniques do</a></li>
								<li><a href="#">Trends don't matter, but techniques do</a></li>
								<li><a href="#">Trends don't matter, but techniques do</a></li>
								<li><a href="#">Trends don't matter, but techniques do</a></li>-->
							</ul>
						</div>
					</div>

					

				</div>
			</div>
		</div>

		<!--bottom footer-->
		<div id="bottom-footer" class="hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-left">
							&copy;2017 VERIFAN. All rights reserved
                            <div class="credits">
                                <!-- 
                                    All the links in the footer should remain intact. 
                                    You can delete the links only if you purchased the pro version.
                                    Licensing information: https://bootstrapmade.com/license/
                                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=MyBiz
                                -->
                               
                            </div>
						</div>
					</div>

					<div class="col-md-8">
						<div class="footer-right">
                            <ul class="list-unstyled list-inline pull-right">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
        

		
		<audio id="myAudio">
		  <source src="<?php echo base_url().'uploads/notification.mp3'; ?>" type="audio/mpeg">
		  Your browser does not support the audio element.
		</audio>
		
	
	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    

	<script>
	

 function allnotify(){
	
      $.ajax({
                
            type:"post",
            dataType:"json",
            url: '<?php echo base_url();?>Profile/notification',
          
            success: function(data) {
                //alert("res");
			   var res = jQuery.parseJSON(JSON.stringify(data));//JSON.parse(data);
			   $('#cnt_msg').html(res.cnt);
                             
              }
            
        });
}




$( function() {
	
	allnotify();
	setInterval(function(){ new_notifications(); }, 20000);
		
});

function new_notifications(){
	
      $.ajax({
                
            type:"post",
            dataType:"json",
            url: '<?php echo base_url();?>Profile/notification',
          
            success: function(data) {
                //alert("res");
			   var res = jQuery.parseJSON(JSON.stringify(data));//JSON.parse(data);
			   //console.log(res);
			   
			   if($('#cnt_msg').text() < res.cnt){
				    var x = document.getElementById("myAudio"); 
					x.play();
			   }
			     
			   //alert($('#cnt_msg').text());
			   
			   $('#cnt_msg').html(res.cnt);
               //$("#notificationMenu").html(res.messages);
               //$("#not_cnt").html(data.notification_total);
              
              }
            
        });
}

</script>
</body>

</html>
