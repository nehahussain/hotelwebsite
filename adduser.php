<?php
session_start();
if (isset($_SESSION['user'])) {
?>

<?php 
    if(isset($_POST['name'],$_POST['password'],$_POST['email']  ))
    {
        if(array_key_exists('name',$_POST) and array_key_exists('password',$_POST)  and array_key_exists('email',$_POST))
        {
            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "admin");
            
            $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
            
            if($connect->connect_error)
            {
                die( "there was an error connecting to the database ".mysqli_connect_error());
            }
            $id=uniqid();
            $name = $_POST['name'];
            $pass= $_POST['password'];
            $email= $_POST['email'];
            $query =  "INSERT INTO adminlogininfo (`id`,`email`,`name`, `password`) VALUES ('$id','$email','$name', '$pass');";
            if ($connect->query($query) == TRUE)
            {
                // print("<script>window.alert('');</script>");
                    require_once 'mailer/class.phpmailer.php'; 
                    $mail = new PHPMailer(true);
                    $email      = strip_tags($_POST['email']);
                    $subject    = "***Login Details***";
                    $text_message    = "";      
                    $message  =" ID: $id        Name : $name        password : $pass " ;
                  try
                    {
                      $mail->IsSMTP(); 
                      $mail->isHTML(true);
                      $mail->SMTPDebug  = 0;                     
                      $mail->SMTPAuth   = true;                  
                      $mail->SMTPSecure = "ssl";                 
                      $mail->Host       = "smtp.gmail.com";      
                      $mail->Port        = '465';             
                      $mail->AddAddress($email);
                      $mail->Username   ="s0g0hotelmanagement@gmail.com";  
                      $mail->Password   ="sogo-password";            
                      $mail->SetFrom('s0g0hotelmanagement@gmail.com','Sogo Hotel');
                      $mail->AddReplyTo("s0g0hotelmanagement@gmail.com","Sogo Hotel");
                      $mail->Subject    = $subject;
                      $mail->Body    = $message;
                      $mail->AltBody    = $message;
                      
                      if($mail->Send())
                      {
                        print("<script>window.alert('User successfully added in the database.Check Mail ( $email )for the Login Details');</script>");

                      // $msg = " ".$email." ";
                      
                      }
                    }
                    catch(phpmailerException $ex)
                    {
                      $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
                      print("<script>window.alert('$msg');</script>");

                      // echo $msg;
                    }  
            }
            else
            {
                echo $connect->error;
                // print("<script>window.alert('Error: Id must be of Int type');</script>");
            }

        mysqli_close($connect);
        }
    }
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sogo Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">

       <style>
.prog {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
}

.progresss{
    float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

img {
  float: left;
}


</style>

  </head>
  <body>
    
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.html">Sogo Hotel</a></div>
          <div class="col-6 col-lg-8 site-logo"  data-aos="fade" style="text-align:right;" ><a href="logout.php">Logout</a></div>
          <div class="col-6 col-lg-8">
            <!-- END menu-toggle -->
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Admin Portal</h1>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>  
    <!-- END section -->
  <div id ="error">
  </div>
    <section class="section contact-section" id="next">
      
    <div class="col-sm-3" style="background-color:lavender;">
      <nav class="navbar navbar-inverse">
          <div class="container-fluid">
              <ol class="nav navbar-nav">
                  <li style="font-size:25px;" ><a href="loggedin.php">Home</a></li>
                  <li style="font-size:25px;" class ="active"><a href="adduser.php">Add Authorized Users</a></li>
                  <li style="font-size:25px;"><a href="roommanagement.php">Room Management</a></li>
                  <li style="font-size:25px;"><a href="reserveroom.php">Room Reservations</a></li>
                  <li  style="font-size:25px;" ><a href="customerdetails.php">Customer Details</a></li>
                  <li  style="font-size:25px;"><a href="eventmanagement.php">Event Management</a></li>
                  <li  style="font-size:25px;"><a href="reserveevent.php">Event Reservations</a></li>
                  <li  style="font-size:25px;"><a href="cinemamanagement.php">Cinema Management</a></li>
                  <li  style="font-size:25px;"><a href="cinemareservation.php">Cinema Reservations</a></li>
                  <li  style="font-size:25px;"><a href="bills.php">Customer invoice</a></li>
                  <li  style="font-size:25px;"><a href="employeedetails.php">Employee Details</a></li>
                  <li style="font-size:25px;"><a href="signupcustomers.php">Signed Up Customers</a></li>
                  <li style="font-size:25px;"><a href="messages.php">Contact Us</a></li>
                  <li style="font-size:25px;"><a href="revenuemanagement.php">Revenue Management</a></li>
              </ol>
          </div>
      </nav>
    </div>

    <div class="col-sm-9" style="background-color:lavenderblush;">
        <form method ="post">
            <h1>Enter new user in the Database </h1>
            <br>
            <br>
            <h3>Enter Name</h3>
            <input  type ="text" name="name"  placeholder= "Neha Hussain" required data-value-missing="This field is required!">
            <br/>
            <br/>
            <h3>Enter Email</h3>
            <input  type ="email" name="email"  placeholder= "neha@yahoo.com" required data-value-missing="This field is required!">
            <br/>
            <br/>
            <h3>Enter Password</h3>
            <input  type ="password" name="password"  placeholder= "password" required data-value-missing="This field is required!">
            <br/>
            <br/>
            <input  type ="submit" name="submit " value="Submit details" >
        </form>

          <br/>
          <br/>              

    </div>
    </section>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 
    

    <script src="js/main.js"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
    
  </body>
</html>

<?php
}else header('Location: login.php');
?>