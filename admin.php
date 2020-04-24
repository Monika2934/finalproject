<!DOCTYPE html>
<?php

session_start();
 include("function.php");
require ("mysqli_connect.php");//connect to mysql

if(empty($_SESSION["username"]))
{
header('location:index.php');
}


$tripid=0;
$update=false;
$tripname='';
$category='';
$description='';
$price='';



if(!empty($_GET['tripid'])){
	$update=true;
	$q= 'SELECT * FROM mytrips where  tripid ="'.$_GET['tripid'].'"';
   
	$r= @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
	 while ($row=mysqli_fetch_array($r)){
			 
              $tripname=$row['tripname'];
			  $image=$row['image'];
               $category=$row['category'];
               $description=$row['description'];
               $price=$row['price'];
}
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	
    
    //create two variables
 $tripname = $_POST['tripname'];
	
$category = $_POST['category'];
 $description = $_POST['description'];
 $price = $_POST['price'];
	 $image = mysqli_real_escape_string($dbc,($_FILES['image']['name']));

       $target_file="uploads/".basename($_FILES['image']['name']);
	
	
	
	
	$q= "SELECT * FROM mytrips where  tripname ='$tripname'";
   
	$r= @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
	
	
	if((isset($_FILES['image'])) ||!empty($tripname) || !empty($category)|| !empty($description)|| !empty($price))
	    
		{
		 if (move_uploaded_file($_FILES['image']['tmp_name'],$target_file)) 		 
    {
			 if($update==true)
		{
			$tripid= $_GET['tripid'];

$tripname = $_POST['tripname'];
 $category = $_POST['category'];
 $description = $_POST['description'];
 $price = $_POST['price'];
$image = mysqli_real_escape_string($dbc,($_FILES['image']['name']));
$q= "UPDATE  mytrips set tripname='$tripname',image='$image',category='$category',description='$description' where tripid=$tripid";
   
	$r= @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
echo $q;


	header('location:admin.php');
		}
		else{
//		insert the data to database
    	$q="insert into mytrips(tripname,image,category,description,price)values('$tripname','$image','$category','$description','$price')";
	
			 
//		print msg f successfully done otherwise print failure
		if ($dbc->query($q) === TRUE) 
		{
    		echo ' <div class="alert alert-primary container" style="width:100%;" role="alert">New record created successfully</div>';
		}
		else
		{
				echo ' <div class="alert alert-danger container" style="width:100%;" role="alert">Failure</div>';
		}
		}
		 }
		}
		
		
	else
	{
		
		echo ' <div class="alert alert-primary container" style="width:500px;" role="alert"><h3>All fields are mandetory</h3></div>';
	}
	
			
	

       }
	
       

?>


<html>

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-auto-replace-svg="nest"></script>

    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>Tourism</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="images/favicon2.png">

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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_part">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="header_top_left">
                                    <img src="images/logo.png" class="img-responsive">
                                    <!--notification-->
                                    <div style="float:right; margin-top:-190px;">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" style="color:white">
                                                Notifications &nbsp;<i class="fa fa-bell"></i>
                                                <?php
                $query = "SELECT * from `contact` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                                                <span
                                                    class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
                                                <?php
                }
                    ?>


                                            </button>
                                            <!--									fetch dropdown list-->

                                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                                <?php
                $query = "SELECT * from `contact` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
                                                <a style="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view.php?contactid=<?php echo $i['contactid'] ?>">
                                                    <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br />
                                                    <?php 
                  
                if($i['type']=='comment'){
                    echo $i['firstname'];
                }
                  
                  ?>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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

                                            <li class="active"><a href="gallary.php">Collection</a></li>
                                            <li class="active"><a href="aboutus.php">About Us</a></li>
                                            <li class="active"><a href="contact.php">Contact Us</a></li>

                                            <li class="active"><a href="logout.php">Logout</a></li>
                                            <li style="color:white; margin-left:20px;"><i class="fa fa-user fa-2x"
                                                    title="<?php echo $_SESSION['username'];?>"></i></li>
                                           
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
        <br>
        <div>
        </div>

        <div class="container">
            <div class="addtrip">
                <h2>Add Trips</h2>
                <form method="post" enctype="multipart/form-data">

                    <input type="hidden" name="tripid" value="<?php echo $tripid; ?>">

                    <label>Trip Name</label>
                    <input type="text" class="form-control" id="tripname" placeholder="Enter trip" name="tripname"
                        value="<?php echo $tripname; ?>">

                    <label>Add Image</label>
                    <input type="file" class="form-control" id="image" value="<?php echo $image; ?>" name="image"
                        required>

                    <label>Category:</label>
                    <input type="text" class="form-control" id="category" placeholder="Enter category" name="category"
                        value="<?php echo $category; ?>">

                    <label>Description:</label>
                    <textarea rows="4" cols="50" type="textfield" class="form-control" id="description"
                        placeholder="Enter Description" name="description"><?php echo $description; ?></textarea>

                    <label>Price:</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price"
                        value="<?php echo $price; ?>">
                    <br>
                    <?php
	   if($update == true):
	   ?>
                    <center> <button type="submit" class="btn btn-primary" name="update">Update Trip</button></center>
                    <?php else: ?>
                    <center> <button type="submit" name="add" class="btn btn-primary">Add Trip</button></center>
                    <?php endif;?>
                </form>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-primary">
                        <th>Trip Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>price</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <?php
					$results_per_page=10;
                  $q= "SELECT * FROM mytrips ";
   
	$r= @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
			$number_of_results = mysqli_num_rows($r);

//		determine number of total pages available
			$number_of_pages = ceil($number_of_results/$results_per_page);
//			determine which page number visitor is currently on
			if(!isset($_GET['page']))
			{
				$page=1;
			}
			else{
				$page=$_GET['page'];
			}
//			determine the sql limit starting number for the results on the displaying page
			$this_page_first_result = ($page-1)*$results_per_page;
//			retrieveselected results from the datbase and display them on page
			$q="select* from mytrips LIMIT " . $this_page_first_result . ',' .$results_per_page;
			$r= @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
//			fetch the data
			    while ($row=mysqli_fetch_array($r)){
			  
              $tripname=$row['tripname'];
			  $image=$row['image'];
               $category=$row['category'];
               $description=$row['description'];
               $price=$row['price'];
			
          echo '<tr>';
          echo '<td>'.$tripname.'</td>';
			       echo '<td>';
			  		
				   echo '<img src="uploads/'.$image.'" height="200" width="200">';
				   echo '</td>';
          echo '<td>'.$category.'</td>'; 
          echo '<td>'.$description.'</td>';
          echo '<td>$'.$price.'</td>';
        echo '<td>'; 
			 echo '<a href="admin.php?tripid='.$row['tripid'].'" class="btn btn-primary">Edit</a>';
			echo '&nbsp';
			 echo '<a href="delete.php?tripid='.$row['tripid'].'" class="btn btn-danger">Delete</a>';
				  echo'</td>';
          echo '</tr>';
          }
//			display the link to the pages
			for($page=1;$page<=$number_of_pages;$page++)
			{
				echo '<a href="admin.php?page=' .$page .'">' .$page . '</a>';
			}
          ?>
            </table>
        </div>

        <div class="media">
            <div class="container">
                <div class="media_title">
                    <h2>WHY My TRIP?</h2>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_part media_main">

                    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                        <div class="media_first">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 media_first_left">

                                <i class="fa fa-plane" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 media_first_right">
                                <h4>Travel with Confidence.</h4>
                                <p>Be served b.y travel agents that know! 24/7 service just a phone-call away.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                        <div class="media_first">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 media_first_left">

                                <i class="fa fa-compass" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 media_first_right">
                                <h4>OUR BEST DEALS</h4>
                                <p>Prices to worldwide destinations are constantly updated due to our one-of-a-kind
                                    enhanced software engine.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</body>
<!--
		<script>  
//	funtion to get data
 function getmessage() {
     if (window.XMLHttpRequest) {
         // code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp=new XMLHttpRequest();
       } else {  // code for IE6, IE5
         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange=function() {
         if (this.readyState==4 && this.status==200) {
           document.getElementById("display").innerHTML=this.responseText;
         }
       }
       xmlhttp.open("GET","admin.php",true);
       xmlhttp.send();
 }
//function to post the data
  function postdata() {
      var formData = new FormData();
      formData.append("tripname", document.getElementById("tripname").value);
      formData.append("category", document.getElementById("category").value);
	   formData.append("description", document.getElementById("description").value);
	   formData.append("image", document.getElementById("image").value);
	   formData.append("price", document.getElementById("price").value);
	  
	  
      var request = new XMLHttpRequest();
      request.open("POST", "admin.php");
      request.send(formData);
  }
  getmessage();
  setInterval(function(){
      getmessage();
  },1000);
 </script>
-->

</html>