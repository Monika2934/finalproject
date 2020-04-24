<!DOCTYPE html>

<head>

</head>
<?php
session_start();
require ("mysqli_connect.php");
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	
	 $phone_number = $_POST['phone_number'];
	 $first_name = $_POST['first_name'];
	 $last_name = $_POST['last_name'];
	 $email = $_POST['email'];
	 $country = $_POST['country'];
	 $state = $_POST['state'];
	 $city = $_POST['city'];
	 $zipcode = $_POST['zipcode'];
	 $card_number = $_POST['card_number'];
	 $month = $_POST['month'];
	 $year = $_POST['year'];
	 $cvv = $_POST['cvv'];
//	query to select all the data from table
	$q= "SELECT * FROM checkout ";
	$r= @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
//	check if data is not empty then execute insert query
	
	if(!empty($phone_number)|| !empty($first_name) || !empty($last_name)|| !empty($email)|| !empty($country) || !empty($state) || !empty($city) || !empty($zipcode) || !empty($card_number) || !empty($month) || !empty($year) || !empty($cvv)){
		//insert the data to database
    	$q="insert into checkout (phone_number,first_name,last_name,email,country,state,city,zipcode,card_number,month,year,cvv)values('$phone_number','$first_name','$last_name','$email','$country','$state','$city','$zipcode','$card_number','$month','$year','$cvv')";
		
		
//		print msg f successfully done otherwise print failure
		if ($dbc->query($q) === TRUE) 
		{
    		echo ' <div class="alert alert-success container" style="width:100%;" role="alert">Details filled successfully</div>';
			header("Location:mytrip.php");
		}
		else
		{
				echo ' <div class="alert alert-danger container" style="width:1000%;" role="alert">Failure</div>';
		}
		}
	
	
}

?>
<html>

<head>
    <title>checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>



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
                                    <div class="collapse navbar-collapse" id="myNavbar">
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
                                    </div>
                                </nav>

                            </div>

                        </div>
                    </div>
                    <!--    checkout-->

                </div>
            </div>
            <form action="checkout.php" method="post">

                <section class="checkout-page section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="checkout-step">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card checkout-step-one">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        <span class="number">1</span> Phone Number
                                                    </button>




                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>We need your phone number so that we can update you about your
                                                        order.</p>

                                                    <div class="form-row align-items-center">
                                                        <div class="col-auto">
                                                            <label class="sr-only">phone number</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text"><span
                                                                            class="mdi mdi-cellphone-iphone"></span>
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    name="phone_number"
                                                                    placeholder="Enter phone number">
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" type="button" data-toggle="collapse"
                                                                data-target="#collapseTwo" aria-expanded="false"
                                                                aria-controls="collapseTwo"
                                                                class="btn btn-secondary mb-2 btn-lg">NEXT</button>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="card checkout-step-two">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        <span class="number">2</span> Travellers Detail
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#accordionExample">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label class="control-label">First Name <span
                                                                        class="required">*</span></label>
                                                                <input class="form-control border-form-control"
                                                                    name="first_name" value="" placeholder="Gurdeep"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Last Name <span
                                                                        class="required">*</span></label>
                                                                <input class="form-control border-form-control"
                                                                    name="last_name" value="" placeholder="Osahan"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Email Address <span
                                                                        class="required">*</span></label>
                                                                <input class="form-control border-form-control "
                                                                    value="" placeholder="iamosahan@gmail.com"
                                                                    name="email" type="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Country <span
                                                                        class="required">*</span></label>
                                                                <input class="form-control border-form-control"
                                                                    name="country">

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">City <span
                                                                        class="required">*</span></label>
                                                                <input class="form-control border-form-control"
                                                                    name="city">


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Zip Code <span
                                                                        class="required">*</span></label>
                                                                <input class="form-control border-form-control"
                                                                    name="zipcode" value="" placeholder="123456"
                                                                    type="number">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">State <span
                                                                        class="required">*</span></label>
                                                                <input class="form-control border-form-control"
                                                                    name="state">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="button" type="button" data-toggle="collapse"
                                                        data-target="#collapseThree" aria-expanded="false"
                                                        aria-controls="collapseThree"
                                                        class="btn btn-secondary mb-2 btn-lg">NEXT</button>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        <span class="number">3</span> Payment
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="col-lg-6 col-md-6 mx-auto">
                                                        <div class="form-group">
                                                            <label class="control-label">Card Number</label>
                                                            <input class="form-control border-form-control"
                                                                name="card_number" value=""
                                                                placeholder="0000 0000 0000 0000" type="text">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">Month</label>
                                                                    <input class="form-control border-form-control"
                                                                        name="month" value="" placeholder="01"
                                                                        type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Year</label>
                                                                    <input class="form-control border-form-control"
                                                                        name="year" value="" placeholder="15"
                                                                        type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                            </div>
                                                        <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">CVV</label>
                                                                    <input class="form-control border-form-control"
                                                                        name="cvv" value="" placeholder="135"
                                                                        type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <button type="button" type="button" data-toggle="collapse"
                                                            data-target="#collapsefour" aria-expanded="false"
                                                            aria-controls="collapsefour"
                                                            class="btn btn-secondary mb-2 btn-lg">NEXT</button>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button"
                                                            data-toggle="collapse" data-target="#collapsefour"
                                                            aria-expanded="false" aria-controls="collapsefour">
                                                            <span class="number">4</span> Booking Complete
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapsefour" class="collapse" aria-labelledby="headingThree"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <div class="col-lg-10 col-md-10 mx-auto order-done">
                                                                <i
                                                                    class="mdi mdi-check-circle-outline text-secondary"></i>
                                                                <button type="submit" style="color:white;"
                                                                    class="btn btn-secondary mb-2 btn-lg">Submit</button>
                                                                <h4 class="text-success">Congrats! Your booking has been
                                                                    Accepted..</h4>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
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
    </div>
</body>

</html>