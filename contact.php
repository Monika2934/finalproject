<!DOCTYPE html>
<?php
session_start();
require ("mysqli_connect.php");
include("function.php");

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	
	 $firstname = $_POST['firstname'];
	 $lastname = $_POST['lastname'];
	 $email = $_POST['email'];
	 $comments = $_POST['comments'];
	
//	query to select all the data from table
	$q= "SELECT * FROM contact ";
	$r= @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
//	check if data is not empty then execute insert query
	
	if(!empty($firstname) || !empty($lastname)|| !empty($email)|| !empty($comments)){
		//insert the data to database
    	$q="insert into contact(firstname,lastname,email,comments,status,date,type) values('$firstname','$lastname','$email','$comments','unread',CURRENT_TIMESTAMP,'comment')";
//			if(performQuery($query)){
//                  header("location:contact.php");
//              }
			 
//		print msg f successfully done otherwise print failure
		if ($dbc->query($q) === TRUE) 
		{
    		echo ' <div class="alert alert-success container" style="width:500px;" role="alert">New record created successfully</div>';
		}
		else
		{
				echo ' <div class="alert alert-danger container" style="width:500px;" role="alert">Failure</div>';
		}
		}
	
	
}
?>
<html>

<head>
    <title>contact us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_part">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="header_top_left">
                                    <img src="images/logo.png" class="img-responsive">


                                </div>
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



            </div>
        </div>
        <!--header_bottom-->
    </div>
    <!--header-->
    <!-- contact-->
    <section id="contact" style="background-color: #fff;font:" class="text-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading">Contact</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="contact-form" method="post" action="#" class="contact-form">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Firstname *</label>
                                                <input type="text" name="firstname" placeholder="First Name"
                                                    required="required" class="form-control">
                                                <span id="de"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="surname">Lastname *</label>
                                                <input type="text" name="lastname" placeholder="Last Name"
                                                    required="required" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email Address *</label>
                                                <input type="text" name="email" id="em" placeholder="E-mail address"
                                                    required="required" class="form-control">
                                                <span></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="comments">Comments*</label><br>
                                                <textarea rows="4" name="comments" placeholder="Comments"
                                                    required="required" class="form-control"></textarea>
                                            </div>
                                            <div class="text-center">
                                                <input type="submit" name="name" id="sub" value="Submit"
                                                    class="btn btn-primary btn-block">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 place_first_first">
                            <img src="imagesnew/idea.jpg" class="img-responsive">
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
</body>

</html>