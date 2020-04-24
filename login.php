
<!DOCTYPE html>
<?php
require ("mysqli_connect.php");//connect to mysql
session_start();

if(isset($_SESSION['errMsg'])){
    echo $_SESSION['errMsg'];
    echo $_SESSION['login'];
	
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
    //create two variables
 $username = mysqli_real_escape_string($dbc, $_POST['username']);
 $password = mysqli_real_escape_string($dbc, $_POST['password']);
// sql query to select users

$q= "SELECT * FROM userinfo    where  username ='$username' and password= '$password'";
   
$r= @mysqli_query($dbc, $q) or die(mysqli_error($dbc));// @ is used to display just errors

$num =mysqli_num_rows($r);

//
 if ($num== 1) {
     $row = mysqli_fetch_row($r);
     $_SESSION["login"]=true;
	 
    if($row[5]==1)
    {
		$_SESSION["username"]=$username;
		$_SESSION['errMsg'] = "Successfully login";
        header("Location:admin.php");
    }
     else
     {
		 $_SESSION["username"]=$username;
		//$_SESSION['errMsg'] = "Failed";
     header("Location:index.php");
     }
  } 
else 
{
    $_SESSION["login"]=false;//set session login to false
    $_SESSION['errMsg'] = "Invalid Login";
    //$_SESSION['errMsg'] = "Location:login.php";
     header("Location:login.php");
     
  }

}
?>

<html>
<head>
	
	<title>login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

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
		  <div class="loader"></div>
	<div class="containerload">
		<div class="wrapper">
		<div class="header">
			<div class="header_top">
				<div class="container">
                <marquee class="marquee" direction="right" width="1550" height="20" behavior="alternate">
          WE ARE HERE TO HELP:&nbsp;Given the  <b>COVID-19 </b> outbreak, we urge you to stay tuned to updates by regarding travel date changes &amp; cancellations for your upcoming trips.</marquee>
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="header_top_left">
                                <img src="images/logo.png" class="img-responsive">
                                
						
					</div>
				</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<nav class="navbar">
		    					<div class="navbar-header">
		      						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
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
                                        <li class="active"><a href="login.php">Login/Register</a></li>
							      	</ul>
		    					</div>
							</nav>
                              
						</div>
								
							</div>
						</div>
						
			
						
				</div>
			</div><!--header_bottom-->
		</div><!--header-->
	  <div class="loginbox">
        <h1 class="header_main" >Login Here</h1>
        <form class="reg_form" action="login.php" method="post" id="login" name="fo">
            <p class="centers"><b>Username*</b></p>
        	<input type="text" name="username" placeholder="Enter Username" id="username" required>
        	<span></span><br>
            <p class="centers"><b>Password*</b></p>
            <input type="password" name="password" placeholder="Enter Password" id="password" required><br>
            <input type="submit" id="submit" name="submit" value="Login">
			
           
             <p class="center1"> <a href="register.php">Don't have an account>Register now </a></p>
            </form>
     
    </div>

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
	</div><!--wrapper-->
    </body>
</html>

