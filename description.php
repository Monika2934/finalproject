<!DOCTYPE html>
<?php
session_start();
require ("mysqli_connect.php");

?>
<html>
  <head>
    <title>Description</title>
    	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
	        <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="images/favicon2.png">
      <!-- Bootstrap core CSS 
      <link href="csscart/bootstrap.min.css" rel="stylesheet"-->
      <!-- Material Design Icons -->
      <link href="csscart/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
      <!-- Select2 CSS -->
      <link href="csscart/select2-bootstrap.css" />
      <link href="csscart/select2.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="csscart/osahan2.min.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="csscart/owl.carousel.css">
      <link rel="stylesheet" href="csscart/owl.theme.css">

  </head>
	<style>
	/*loader*/
.loader{
	border: 16px solid #f3f3f3;
	border-radius: 50%;
	border-top: 16px solid #3498db;
	align-content: center;
	position: absolute;
	left: 25%;
	top: 40%;
	width: 100px;
	height: 100px;
	margin-left: 22%;
	-webkit-animation: spin 2s linear infinite;
	/* Safari */
	animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
	0% {
		-webkit-transform: rotate(0deg);
	}

	100% {
		-webkit-transform: rotate(360deg);
	}
}

@keyframes spin {
	0% {
		transform: rotate(0deg);
	}

	100% {
		transform: rotate(360deg);
	}
}

.containerload {
	display: none;
}

/*end loader*/

	</style>
<!--    loader-->
<script>
    $(window).on('load', function() {
		
        setTimeout(function() {
			debugger;
            $('.loader').css('display', 'none');
            $('.containerload').css('display', 'block');
        }, 1000);
    });

</script>
  <body>
	  <form action="description.php" method="post">
	  <div class="loader"></div>
	<div class="containerload">
    <div class="wrapper">
      <div class="header">
        <div class="header_top">
          <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="header_top_left">
                <img src="images/logo.png" class="img-responsive" />
              </div>
            </div>

            <nav class="navbar" id="myNavbar">
              <div class="navbar-header">
                <button
                  type="button"
                  class="navbar-toggle"
                  data-toggle="collapse"
                  data-target="#myNavbar"
                >
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="index.php">Home</a></li>

                  <li class="active">
                    <a href="gallery.php">Collection</a>
                  </li>
                  <li class="active">
                    <a href="aboutus.php">About Us</a>
                  </li>
                  <li class="active">
                    <a href="contact.php">Contact Us</a>
                  </li>
                  <?php
						if(!empty($_SESSION["username"])):
										?>
                                        <li class="active"><a href="logout.php">Logout</a></li>
										<li style="color:white " ><i class="fa fa-user fa-2x" title="<?php echo $_SESSION['username'];?>"></i></li>
										<?php else: ?>
										<li class="active"><a href="login.php">Login/Register</a></li>
										<?php endif;?>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <!--header_bottom-->
    </div>
    <!--header-->

    <!--------------description code here------------------------>
		      <section class="shop-single section-padding pt-3">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="shop-detail-left">
                     <div class="shop-detail-slider">
                      <?php 
						 
						
					
						 
						 ?>
                        <div id="sync1" class="owl-carousel">
							 <?php
	                          $imgs=$_GET['image']; 
							 $img= explode('.',$imgs);
							  ?>
                           <div class="item"><img alt="" src="uploads/<?php echo $_GET['image'] ?>" class="img-fluid img-center"></div>
                           <div class="item"><img alt="" src="tripphoto/<?php echo $img[0];?>/item-1.jpg" class="img-fluid img-center"></div>
                           <div class="item"><img alt="" src="tripphoto/<?php echo $img[0];?>/item-3.jpg" class="img-fluid img-center"></div>
                           <div class="item"><img alt="" src="tripphoto/<?php echo $img[0];?>/item-4.jpg" class="img-fluid img-center"></div>
                           
                        </div>
						  <div id="sync2" class="owl-carousel">
							 
                           <div class="item"><img alt="" src="tripphoto/<?php echo $img[0];?>/item-1.jpg" class="img-fluid img-center"></div>
                           <div class="item"><img alt="" src="tripphoto/<?php echo $img[0];?>/item-2.jpg" class="img-fluid img-center"></div>
                           <div class="item"><img alt="" src="tripphoto/<?php echo $img[0];?>/item-3.jpg" class="img-fluid img-center"></div>
                           <div class="item"><img alt="" src="tripphoto/<?php echo $img[0];?>/item-4.jpg" class="img-fluid img-center"></div>
                          
                        </div>
                     
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="shop-detail-right">
                    
                     <h2>Trip Name: <?php echo $_GET['tripname']; ?></h2>
                     <h6><strong><span class="mdi mdi-approval"></span> Category </strong> <?php echo $_GET['category']; ?></h6>
                     <p class="regular-price"><i class="mdi mdi-tag-outline"></i> Price :$ <?php echo $_GET['price']; ?></p>
                    
                     <a href="payment.php"><button type="button" class="btn btn-primary btn-lg"><i class="mdi mdi-cart-outline"></i> Book Your Trip</button> </a> 
					  <div class="short-description">
                        <h5>
                           Description  
                          
                        </h5>
                        <p><?php echo $_GET['description']; ?>
                        </p>
                        
                     </div>
                    
                    
                  </div>
               </div>
            </div>
         </div>
      </section>


  
    <!--footer-->
    <div class="footer">
      <div class="container">
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_part">
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="contact_us">
              <h4>Contact Us</h4>
              <div class="contact_us_menu">
                <ul>
                  <li>
                    <i class="fa fa-envelope-open" aria-hidden="true"></i
                    ><span>jassmeet.2125@gmail.com</span>
                  </li>
                  <li>
                    <i class="fa fa-mobile" aria-hidden="true"></i
                    ><span>123-254-2356</span>
                  </li>
                  <li>
                    <i class="fa fa-map-pin" aria-hidden="true"></i
                    ><span>1235,Street Market Canada Ontario. </span>
                  </li>
                </ul>
                <p>© 2020. All rights reserved.</p>
              </div>
            </div>
          </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="contact_us">
              <h4>About the Site</h4>
              <div class="contact_us_menu">
                <ul>
                  <li>
                    <span>Payment Security</span>
                  </li>
                  <li>
                   <span>Policy Privacy</span>
                  </li>
                  <li>
                    <span>Make a Payment</span>
                  </li>
                 <li>
                    <span>Term Of Service</span>
                  </li>
                 
                    
                </ul>
              </div>
            </div>
          </div>
                       <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="contact_us">
              <h4>Follow Us </h4>
              <div class="contact_us_menu">
                <ul>
                  <li>
                    <a href="https://www.facebook.com/" class="fa fa-facebook" style="font-size:25px" target="_blank"></a>
                      	<a href="https://twitter.com/explore"class="fa fa-twitter" style="font-size:25px" target="_blank"></a>
					<a href="https://www.instagram.com/" class="fa fa-instagram" style="font-size:25px" target="_blank"></a>
                      
                    </li>
                </ul>
              </div>
            </div>
          </div>
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="contact_us">
              <h4>General Disclaimer</h4>
              <div class="contact_us_menu">
                
                   <img height="40" src="https://shoplineimg.com/assets/footer/card_visa.png"/>
                    <img height="40" src="https://shoplineimg.com/assets/footer/card_master.png"/>
                    <img height="40" src="https://shoplineimg.com/assets/footer/card_paypal.png"/>
                    <img height="40" src="https://shoplineimg.com/assets/footer/card_amex.png"/>
                 
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--footer-->
    </div>
	  </div>
	  
      <!-- Bootstrap core JavaScript -->
      <script src="jscart/jquery.min.js"></script>
      <script src="jscart/bootstrap.bundle.min.js"></script>
      <!-- select2 Js -->
      <script src="jscart/select2.min.js"></script>
      <!-- Owl Carousel -->
      <script src="jscart/owl.carousel.js"></script>
      <!-- Custom -->
      <script src="jscart/custom.min.js"></script>
<!--	  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120909275-1"></script>-->
	  <script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-120909275-1');
	  </script>
	  </form>
  </body>
</html>
