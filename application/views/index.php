<?php $this->load->view('include/header.php'); ?>


<body >
	<!--top header-->
	<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active"> <img src="<?php echo base_url(); ?>assets/images/1.jpg" style="width:100%" alt="First slide">
      <div class="container">
        <div class="caption">
         <h2><span>Verifan Makes Managing Profiles ​Easy</span></h2>
          <p><a href="<?php echo base_url(); ?>login/register" class="btn-slider">​Join Here</a>
        </div>
      </div>
    </div>
    <div class="item"> <img src="<?php echo base_url(); ?>assets/images/2.jpg" style="width:100%" data-src="" alt="Second    slide">
      <div class="container">
        <div class="caption">
         <h2><span>Verifan Makes Managing Profiles ​Easy</span></h2>
          <p><a href="<?php echo base_url(); ?>login/register" class="btn-slider">​Join Here</a>
        </div>
      </div>
    </div>
    <div class="item"> <img src="<?php echo base_url(); ?>assets/images/3.jpg" style="width:100%" data-src="" alt="Third slide">
      <div class="container">
        <div class="caption">
         <h2><span>Verifan Makes Managing Profiles ​Easy</span></h2>
          <p><a href="<?php echo base_url(); ?>login/register" class="btn-slider">​Join Here</a>
        </div>
      </div>
    </div>
  </div>
 <a style="display:none" class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
 <a style="display:none" class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> </div> 
  
	<!--slider-->
	<!-- <div id="slider" class="flexslider"> -->

        <!-- <ul class="slides"> -->
            <!-- <li> -->
            	<!-- <img src="images/1.jpg"> -->

				<!-- <div class="caption"> -->
					<!-- <h2><span>Verifan Makes Managing Profiles ​Easy</span></h2>  -->
					<!-- <p><a href="register.html" class="btn-slider">​Join Here</a></p>				 -->
	            <!-- </div> -->

            <!-- </li> -->
            <!-- <li> -->
            	<!-- <img src="images/2.jpg"> -->

				<!-- <div class="caption"> -->
					<!-- <h2><span>Verifan Makes Managing Profiles ​Easy</span></h2>                 -->
					<!-- <p><a href="register.html" class="btn-slider">​Join Here</a></p> -->
	            <!-- </div> -->

            <!-- </li> -->
            <!-- <li> -->
            	<!-- <img src="images/3.jpg"> -->

				<!-- <div class="caption"> -->
					<!-- <h2><span>Verifan Makes Managing Profiles ​Easy</span></h2>               -->
					<!-- <p><a href="register.html" class="btn-slider">​Join Here</a></p> -->
	            <!-- </div> -->

            <!-- </li> -->
        <!-- </ul> -->

    <!-- </div> -->

<?php $this->load->view('include/footer.php'); ?>

