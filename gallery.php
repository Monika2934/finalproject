<!DOCTYPE html>
<?php
require ("mysqli_connect.php");

session_start();


?>

<HTML lang="en">

<head>
    <title>Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

</head>
<style>
/*loader*/
.loader {
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
/* Column container */
.row {
    display: flex;
    flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
    flex: 10%;
    background-color: #7A9D96;

}
.side2 {
    flex: 10%;
  padding-top: 30px;
    background-color: #CAE4DB;
}
	.fakeimg1 {
    background-color: #CAE4DB;
    width: 100%;
    padding: 55px;
}
	.img {
    width: 450px;
    max-width: 100%;
    max-height: 450px;
}
@media screen and (max-width: 768px) {
    
    .row {
        flex-direction: column;
    }
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

    <div class="loader"></div>
    <div class="containerload">
        <div class="wrapper">
            <div class="header">
                <div class="header_top">
                    <div class="container">
                        <marquee class="marquee" direction="right" width="1550" height="20" behavior="alternate">
                            WE ARE HERE TO HELP:&nbsp;Given the <b>COVID-19 </b> outbreak, we urge you to stay tuned to
                            updates by regarding travel date changes &amp; cancellations for your upcoming trips.
                        </marquee>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_part">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="header_top_left">
                                    <img src="images/logo.png" class="img-responsive">


                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <nav class="navbar">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                            data-target="#myNavbar">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="index.php">Home</a></li>

                                        <li class="active"><a href="gallery.php">Collection</a></li>
                                        <li class="active"><a href="aboutus.php">About Us</a></li>
                                        <li class="active"><a href="contact.php">Contact Us</a></li>
                                        <?php
	   									if(!empty($_SESSION["username"])):
										?>
                                        <li class="active"><a href="logout.php">Logout</a></li>
                                        <li style="color:white "><i class="fa fa-user fa-2x"
                                                title="<?php echo $_SESSION['username'];?>"></i></li>
                                        <?php else: ?>
                                        <li class="active"><a href="login.php">Login/Register</a></li>
                                        <?php endif;?>
                                       
                                    </ul>
                                </nav>

                            </div>

                        </div>
                    </div>



                </div>
            </div>
            <!--header_bottom-->
        </div>
        <!--header-->
        <div class="slider">
            <div class="w3-content w3-section">
                <img class="mySlides" src="imagesnew/oia-416136_1920.jpg" style="width:80%;height:400px;margin:auto;">
                <img class="mySlides" src="imagesnew/hallstatt-3609863_1920.jpg"
                    style="width:80%;height:400px;margin:auto;">
                <img class="mySlides" src="imagesnew/cape-town-181753_1920.jpg"
                    style="width:80%;height:400px;margin:auto;">
                <img class="mySlides" src="imagesnew/rio-de-janeiro-1963744_1920.jpg"
                    style="width:80%;height:400px;margin:auto;">
                <img class="mySlides" src="imagesnew/venice-2451047_1920.jpg"
                    style="width:80%;height:400px;margin:auto;">
                <script>
                var mineIndex = 0;
                slides(); // call function


                function slides() {
                    var i;
                    var a = document.getElementsByClassName("mySlides");
                    for (i = 0; i < a.length; i++) {
                        a[i].style.display = "none";
                    }
                    mineIndex++;
                    if (mineIndex > a.length) {
                        mineIndex = 1
                    }
                    a[mineIndex - 1].style.display = "block";
                    setTimeout(slides, 1500); // Change images after every 1.5 seconds
                }
                </script>

                <br><br><br>
                <div class="slider">
                    <div class="container">
                        <div class="slider_main">

                            <h1>Explore popular vacation package destinations!!</h1>

                            <div class="find">
                                <h4>FIND YOUR TOUR</h4>
                                <form method="post" action="gallery.php">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_part">
										<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="From">Select Category:</label><br>
												<select class="list" name="category">
														<option>-------Select Category--------</option>
													<option value="Museum">Museum</option>
													<option value="Adventure">Adventure</option>
													<option value="National Park">National Park</option>
													<option value="Historical">Historical</option>
													<option value="Religious">Religious</option>
														<option value="Lake">Lake</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2 col-md-12">
											<div class="search_button" >
												<input type="submit" class="btn btn-primary" value="Search">
											</div>
										</div>
									</div>
								</form>
                            </div>
                        </div></div></div>
                            <!--slider-->


 
  <?php
				if ($_SERVER["REQUEST_METHOD"]=="POST") {
	 $category=$_POST["category"];
//			retrieveselected results from the datbase and display them on page
			$q="select * from mytrips  where category='$category'";
			$r= @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
					echo '<div class="find"><h4>Category:'.$category.'</h4></div>'; 
//			fetch the data
			    while ($row=mysqli_fetch_array($r)){
					
			  echo "<form action='description.php?tripid=".$row['tripid']."&tripname=".$row['tripname']."&category=".$row['category']."&image=".$row['image']."&price=".$row['price']."&description=".$row['description']."' method='post' enctype='multipart/form-data'>";
				
			  $image=$row['image'];
					$tripname=$row['tripname'];
               $category=$row['category'];
               $description=$row['description'];
               $price=$row['price'];
					echo' <div class="row">';
         echo '  <div class="side">';
          echo '<div class="fakeimg1"> <img class="img" src="uploads/'.$image.'" alt="Lights">';
          echo '</div>';
      echo '  </div>';
       echo '  <div class="side2">';
               echo ' <h2>Tripname:'.$tripname.'</h2>';
               echo' <h3>Category:'.$category.'</h3>';
	    echo'<h3>Price:$'.$price.'</h3>';
		echo "<input type ='submit' class='btn btn-primary' value='View Details'>";
           echo '</div>';
echo ' </div>';
echo '<br>';
		
					echo "</form>";
          }
				}
          ?>



                            <section class="photo">
                                <h1> Featured Packages</h1>
                                <div class="packages">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="feature-box">
                                                <div class="feature-img">
                                                    <a href="packages.html">
                                                        <img src="imagesnew/mt-fuji-477832_1920.jpg">
                                                        <div class="price">
                                                            <p>$150</p>
                                                        </div>
                                                    </a>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="packages-detail">
                                                    <h4>Blue Mountains</h4>
                                                    <p>Don't miss Blue Mountain Resort, the #1 destination in Ontario's
                                                        Georgian Bay! Explore the mountain and book your vacation
                                                        online.Enjoy world-class skiing, golf, spas & dining.</p>
                                                    <div>
                                                        <span><i class="fa fa-map-marker"></i>South Western</span></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="feature-box">
                                                <div class="feature-img">
                                                    <a href="packages.html">
                                                        <img src="imagesnew/aqua.jpg">
                                                        <div class="price">
                                                            <p>$150</p>
                                                        </div>
                                                    </a>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="packages-detail">
                                                    <h4>Ripels Aquarium</h4>
                                                    <p>Immerse yourself in a world of 20000 aquatic animals and discover
                                                        your own underwater adventure at Ripley's Aquarium of
                                                        Canada!State of the art facilities with over 10000 exotic sea
                                                        creatures. </p>
                                                    <div>
                                                        <span><i class="fa fa-map-marker"></i>Ontario</span></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="feature-box">
                                                <div class="feature-img">
                                                    <a href="packages.html">
                                                        <img src="imagesnew/island.jpg">
                                                        <div class="price">
                                                            <p>$180</p>
                                                        </div>
                                                    </a>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div>
                                                <div class="packages-detail">
                                                    <h4>Centre Island Toronto</h4>
                                                    <p>The Centreville Amusement Park has more than 30 attractions. It
                                                        is the best Summer dstination.Families will easily be able to
                                                        make a day out of Centre Island; allow two hours minimum. </p>
                                                    <div>
                                                        <span><i class="fa fa-map-marker"></i>Toronto</span></div>
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
                                                            <i class="fa fa-envelope-open"
                                                                aria-hidden="true"></i><span>jassmeet.2125@gmail.com</span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-mobile"
                                                                aria-hidden="true"></i><span>123-254-2356</span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-map-pin"
                                                                aria-hidden="true"></i><span>1235,Street Market Canada
                                                                Ontario. </span>
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
                                                            <a href="https://www.facebook.com/" class="fa fa-facebook"
                                                                style="font-size:25px" target="_blank"></a>
                                                            <a href="https://twitter.com/explore" class="fa fa-twitter"
                                                                style="font-size:25px" target="_blank"></a>
                                                            <a href="https://www.instagram.com/" class="fa fa-instagram"
                                                                style="font-size:25px" target="_blank"></a>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <div class="contact_us">
                                                <h4>General Disclaimer</h4>
                                                <div class="contact_us_menu">

                                                    <img height="40"
                                                        src="https://shoplineimg.com/assets/footer/card_visa.png" />
                                                    <img height="40"
                                                        src="https://shoplineimg.com/assets/footer/card_master.png" />
                                                    <img height="40"
                                                        src="https://shoplineimg.com/assets/footer/card_paypal.png" />
                                                    <img height="40"
                                                        src="https://shoplineimg.com/assets/footer/card_amex.png" />


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--footer-->
                            </div>
                            <!--wrapper-->
                        </div>
                    </div>
                </div>
                

</body>

</HTML>
<?php


?>