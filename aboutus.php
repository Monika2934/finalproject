<!DOCTYPE html>
<?php
session_start();
require ("mysqli_connect.php");

?>
<html>

<head>
    <title>about us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header_top_left">
                                <img src="images/logo.png" class="img-responsive" />
                            </div>
                        </div>

                        <nav class="navbar" id="myNavbar">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#myNavbar">
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
                                    <li style="color:white  "><i class="fa fa-user fa-2x"
                                            title="<?php echo $_SESSION['username'];?>"></i></li>
                                    <?php else: ?>
                                    <li class="active"><a href="login.php">Login/Register</a></li>
                                    <?php endif;?><li class="active">
                                       

                                    </li>
                                </ul>
                            </div>
                        </nav>

                    </div>

                </div>
            </div>
            <div class="learn">
                <div class="container">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_part">
                        <div class="col-lg-12 col-md-5 col-sm-12 col-xs-12 learn_left">
                            <div class="learn_left_title">
                                <h2>About Us</h2>
                                <div class="para">
                                    <p>We are the best tour operator for various countries. With 5+ years dedicated to
                                        reasonably-priced private tours & vacation packages for families, couples,
                                        friends, and business travelers, we are always confident to deliver you a
                                        memorable tour to various countries around your needs and budgets.
                                    </p>
                                </div>
                            </div>
                            <div class="name">
                                <h6>Operated By:</h6><br>
                                <h6>"Jasmeet"</h6><br>
                                <h6>"Monika"</h6><br>
                                <h6>"Ramanjot kaur"</h6><br>
                                <h6>"Manpreet Kaur"</h6><br>
                            </div>
                            <div class="para">
                                <p>The experiences of meeting and serving people from all over the world have widened my
                                    horizon, deepened my comprehension of different cultures, aroused my interest in
                                    travel, and more importantly, helped me better understand the service standards that
                                    travelers expect. <br>"We design, you decide." For your lifetime tailor-made travel
                                    experiences, come with our company. You will never be alone with us!<br>

                                </p>
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-7 col-sm-12 col-xs-12 learn_right">
                            <div class="learn_right_title">
                                <h2>TESTIMONIALS</h2>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_part learn_main">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="learn_right_left">
                                        <img src="imagesnew/contact-2910_1920.jpg" class="photos">
                                        <div class="name">
                                            <h6>Our Vision </h6>
                                            <p>To provide people the best travel experiences.</p>
                                        </div>
                                        <div class="para">
                                            <p>Our company has to bring people together from varying backgrounds,
                                                cultures, countries and religions, and to give the same great
                                                experiences by travelling across the globe. Our organization is a
                                                licensed and highly-reputed travel company.We started our business with
                                                local service in Paris. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="learn_right_left">
                                        <img src="imagesnew/contact-2910_1920.jpg" class="photos">
                                        <div class="name">
                                            <h6>Our Mission</h6>
                                            <p>To be the best online marketplace for tour and travelling.</p>
                                        </div>
                                        <div class="para">
                                            <p> We provide visitors to book their next great escape in one place with
                                                everything they need to plan. We also provide videos and photos, to
                                                how-to guides and travel experts available 24-hours a day, 7-days a
                                                week.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_part learn_main">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--learn-->
                </div>
            </div>
        </div>
    </div>

    <!---Footer-->

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
                                    <i class="fa fa-mobile" aria-hidden="true"></i><span>123-254-2356</span>
                                </li>
                                <li>
                                    <i class="fa fa-map-pin" aria-hidden="true"></i><span>1235,Street Market Canada
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
                                    <a href="https://www.facebook.com/" class="fa fa-facebook" style="font-size:25px"
                                        target="_blank"></a>
                                    <a href="https://twitter.com/explore" class="fa fa-twitter" style="font-size:25px"
                                        target="_blank"></a>
                                    <a href="https://www.instagram.com/" class="fa fa-instagram" style="font-size:25px"
                                        target="_blank"></a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="contact_us">
                        <h4>General Disclaimer</h4>
                        <div class="contact_us_menu">

                            <img height="40" src="https://shoplineimg.com/assets/footer/card_visa.png" />
                            <img height="40" src="https://shoplineimg.com/assets/footer/card_master.png" />
                            <img height="40" src="https://shoplineimg.com/assets/footer/card_paypal.png" />
                            <img height="40" src="https://shoplineimg.com/assets/footer/card_amex.png" />


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-->
    </div>
    <!--wrapper-->

</body>

</html>