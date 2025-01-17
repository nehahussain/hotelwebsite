<?php
session_start();
if (isset($_SESSION['user'])) {
?>

<?php
if(isset($_POST['expensesubmit']))
{
    if($_POST['expensesubmit'])
    {
        if(array_key_exists('expensename',$_POST)  and array_key_exists('expensedate',$_POST) and array_key_exists('expenseprice',$_POST))
        {
            if (!empty($_POST['expensename']) )
            {
                if (!empty($_POST['expensedate']) )
                { 
                  define("DB_SERVER", "localhost");
                  define("DB_USER", "root");
                  define("DB_PASSWORD", "");
                  define("DB_DATABASE", "hotel");
                  
                  $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
                  
                  if($connect->connect_error)
                  {
                      die( "there was an error connecting to the database ".mysqli_connect_error());
                  }
                  $expesename=$_POST['expensename'];
                  $expesedate=$_POST['expensedate'];
                  $expeseprice=$_POST['expenseprice'];
                  $query =  "INSERT INTO `expendature` (`bills`, `date`, `price`) VALUES ('$expesename', '$expesedate', '$expeseprice');";

                  if($result = mysqli_query($connect,$query))
                  {
                    print("<script>window.alert('Expense Added');</script>");
                  }
                  else
                  {
                    print("<script>window.alert('Expense not Added');</script>");
                  }

                }
              }
           }
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

<style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
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
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.html">Sogo Hotel</a>
          </div>
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
              <li style="font-size:25px;"><a href="loggedin.php">Home</a></li>
                  <li style="font-size:25px;"><a href="adduser.php">Add Authorized Users</a></li>
                  <li style="font-size:25px;" ><a href="roommanagement.php">Room Management</a></li>
                  <li style="font-size:25px;" ><a href="reserveroom.php">Room Reservations</a></li>
                  <li  style="font-size:25px;" ><a href="customerdetails.php">Customer Details</a></li>
                  <li  style="font-size:25px;"><a href="eventmanagement.php">Event Management</a></li>
                  <li  style="font-size:25px;"><a href="reserveevent.php">Event Reservations</a></li>
                  <li  style="font-size:25px;"><a href="cinemamanagement.php">Cinema Management</a></li>
                  <li  style="font-size:25px;"><a href="cinemareservation.php">Cinema Reservations</a></li>
                  <li  style="font-size:25px;"><a href="bills.php">Customer invoice</a></li>
                  <li  style="font-size:25px;"><a href="employeedetails.php">Employee Details</a></li>
                  <li   style="font-size:25px;"><a href="signupcustomers.php">Signed Up Customers</a></li>
                  <li style="font-size:25px;"><a href="messages.php">Contact Us</a></li>
                  <li style="font-size:25px;" class ="active"><a href="revenuemanagement.php">Revenue Management</a></li>
              </ol>
          </div>
      </nav>
    </div>

        <div class="col-sm-9" style="background-color:lavenderblush;">
          
        <button  type="button" type="button" class="collapsible">Revenue management</button>
        <div class="content">
        <h1><strong>Income</strong></h1>
          <?php 
                  define("DB_SERVER", "localhost");
                  define("DB_USER", "root");
                  define("DB_PASSWORD", "");
                  define("DB_DATABASE", "hotel");
                  
                  $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
                  
                  if($connect->connect_error)
                  {
                      die( "there was an error connecting to the database ".mysqli_connect_error());
                  }
                  $query =  "select * from revenue;";

                  if($result = mysqli_query($connect,$query))
                  {
                        echo "
                    <table class ='table'>
                    <tr>
                    <th>Bill Id(s)</th>
                    <th>Price</th>
                    <th>Date</th>
                    </tr>";
                    
                    while($row = mysqli_fetch_array($result))
                    {
                        echo 
                            '<tr>
                            <td>'.$row[0].'</td>
                            <td>'.$row[1].'</td>
                            <td>'.$row[2].'</td>
                            </tr>';
                    
                    }
                    echo "</table>";

                  }
                  ?>
                    
        </div>
        <button type="button" class="collapsible">Expendature(s)</button>
        <div class="content">
        <?php
                $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
                
                if($connect->connect_error)
                {
                    die( "there was an error connecting to the database ".mysqli_connect_error());
                }
                  $sql =  "select * from expendature;";

                  if($result = mysqli_query($connect,$sql))
                  {
                    echo "
                    <table class='table'>
                    <tr>
                    <th>S.no</th>
                    <th>Bills</th>
                    <th>Date</th>
                    <th>Price</th>
                    </tr>";
                    
                    while($row = mysqli_fetch_array($result))
                    {
                        echo 
                            '<tr>
                            <td>'.$row[0].'</td>
                            <td>'.$row[1].'</td>
                            <td>'.$row[2].'</td>
                            <td>'.$row[3].'</td>
                            </tr>';
                    }
                    echo "</table>";

                  }
                  
                  mysqli_close($connect);
                ?>
            <form method ="post">
              <h1><strong>Enter Expenses</strong></h1>
              
              <h3>Bill Name </h3>
              <input type="text" id="expensename" name="expensename" >
              <br>
              <h3>Date </h3>
              <input type="date" id="expensedate" name="expensedate" >
              <br>
              <h3>Price</h3>
              <input type="number" id="expenseprice" name="expenseprice" >
              <br>
              <br>
              <input  type ="submit" name="expensesubmit" value="submit" >
            </form>
            <br>
            <form method ="post">
              <h1><strong>Check Monthly Expenses</strong></h1>
             
              <h3>Date </h3>
              <input type="month" id="checkexpensedate" name="checkexpensedate" >
              <br>
              <br>
              <input  type ="submit" name="checkexpensesubmit" value="submit" >
            </form>

            <?php
              if(isset($_POST['checkexpensesubmit']))
              {
                  if($_POST['checkexpensesubmit'])
                  {
                      if(array_key_exists('checkexpensedate',$_POST) )
                      {
                          if (!empty($_POST['checkexpensedate']) )
                          { 
                            // define("DB_SERVER", "localhost");
                            // define("DB_USER", "root");
                            // define("DB_PASSWORD", "");
                            // define("DB_DATABASE", "hotel");
                            
                            $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
                            
                            if($connect->connect_error)
                            {
                                die( "there was an error connecting to the database ".mysqli_connect_error());
                            }
                            
                            $checkexpesedate=$_POST['checkexpensedate'];
                            echo $checkexpesedate;
                            // $dd= to_char($checkexpesedate,'yyyy-mm');
                            
                            $query =  "Select * from expendature where date like '$checkexpesedate%;";
                            if($result = mysqli_query($connect,$query))
                            {
                              echo "
                                <table class ='table'>
                                <tr><br/><h1><strong>Expense Details</strong></h1></tr>
                                <tr>
                                <th>S.No </th>
                                <th>Bills</th>
                                <th>Date</th>
                                <th>Price</th>
                                </tr>";
                                
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo 
                                        '<tr>
                                        <td>'.$row[0].'</td>
                                        <td>'.$row[1].'</td>
                                        <td>'.$row[2].'</td>
                                        <td>'.$row[3].'</td>
                                        </tr>';
                                }
                                echo "</table>";  
                              }
                              else
                              {
                                  echo "error found in sql ";
                              }
                           }
                       }
                    }
                }
              ?>


        </div>
        <button type="button" class="collapsible">Check Available Rooms</button>
        <div class="content">
            <form method ="post">
              <h1><strong>Select Checkin and checkout Dates to see the available rooms </strong></h1>
              
              <h3>CheckIn Date</h3>
              <input type="date" id="start" name="start" min="<?php echo date("Y-m-d");?>" max="2020-12-31">                                    <br>
              <br>
              <h3>CheckOut Date</h3>
              
              <input type="date" id="end" name="end"  min="<?php echo date("Y-m-d");?>" max="2020-12-31">                                    <br>
              <br>
              <input  type ="submit" name="submit" value="Check" >
            </form>
            <div class="col-sm-6" >
            <?php 
              
              if(isset($_POST['submit']))
              {
              if($_POST['submit'])
              {
                  if(array_key_exists('start',$_POST)  and array_key_exists('end',$_POST))
                  {
                      $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
                      
                      if($connect->connect_error)
                      {
                          die( "there was an error connecting to the database ".mysqli_connect_error());
                      }
                      $start = date('Y-m-d',strtotime($_POST['start']));
                      $end = date('Y-m-d',strtotime($_POST['end']));
                      
                      echo "
                              <table class ='table'>
                              <tr><br/><h1>Check In <strong>".$start."
                              </strong>Check Out <strong>".$end."</strong></h1></tr> </table>";
                      
                      
                      $sql =  "select r.roomno, t.type from `room_type` t , `roomdetails` r
                      where r.type_id = t.type_id 
                      AND r.roomno not IN
                      (
                          select roomno from roomstatus b
                          where b.roomno = r.roomno
                          And
                          (
                              ('$start' BETWEEN b.checkin AND b.checkout) OR
                              ('$end' BETWEEN b.checkin AND b.checkout) OR 
                              ('$start' <= b.checkin AND '$end' >= b.checkout)
                          )
                      );";

                      if($result = mysqli_query($connect,$sql))
                      {
                          echo "
                              <table class ='table'>
                              <tr><br/><h1><strong>Available Rooms</strong></h1></tr>
                              <tr>
                              <th>Room No </th>
                              <th>Type ID</th>
                              </tr>";
                  
                      while($row = mysqli_fetch_array($result))
                      {
                          echo 
                              '<tr>
                              <td>'.$row[0].'</td>
                              <td>'.$row[1].'</td>
                              </tr>';
                      }
                      echo "</table>";
                      
                      }
                      else
                      {
                          echo "error found in sql ";
                      }
                  
                      mysqli_close($connect);
                  }
              }
              }
            ?>
            </div>
            <div class="col-sm-6" style="background-color:LightSteelBlue;">
            <?php 
              
              if(isset($_POST['submit']))
              {
              if($_POST['submit'])
              {
                  if(array_key_exists('start',$_POST)  and array_key_exists('end',$_POST))
                  {
                      $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
                      
                      if($connect->connect_error)
                      {
                          die( "there was an error connecting to the database ".mysqli_connect_error());
                      }
                      $start = date('Y-m-d',strtotime($_POST['start']));
                      $end = date('Y-m-d',strtotime($_POST['end']));
                     
                      
                      $sql =  "select count(*), t.type from `room_type` t , `roomdetails` r
                      where r.type_id = t.type_id 
                      AND  r.roomno not IN
                      (
                          select roomno from roomstatus b
                          where b.roomno = r.roomno
                          And
                          (
                              ('$start' BETWEEN b.checkin AND b.checkout) OR
                              ('$end' BETWEEN b.checkin AND b.checkout) OR 
                              ('$start' <= b.checkin AND '$end' >= b.checkout)
                          )
                      )
                      Group by r.type_id;";

                      if($result = mysqli_query($connect,$sql))
                      {
                          echo "
                              <table class ='table'>
                              <tr><br/><h1><strong>No. of Available Rooms</strong></h1></tr>
                              <tr>
                              <th>Room No </th>
                              <th>Type ID</th>
                              </tr>";
                  
                      while($row = mysqli_fetch_array($result))
                      {
                          echo 
                              '<tr>
                              <td>'.$row[0].'</td>
                              <td>'.$row[1].'</td>
                              </tr>';
                      }
                      echo "</table>";
                      
                      }
                      else
                      {
                          echo "error found in sql ";
                      }
                  
                      mysqli_close($connect);
                  }
              }
              }
            ?>
            </div>
        </div>

        <button class="collapsible">Update Room Status</button>
        <div class="content">
        <form method="post">
          <p>Enter Booking ID</p>
          <br>
          <input type="text" name="bookingid" placeholder="Booking ID">
          <br>
          <br>
          <input type="submit" name="checkbookingid" value="Submit">
        </form> 
        <div class="col-sm-6" style="background-color:LightSteelBlue;">
        <?php
          if(isset($_POST['checkbookingid']))
          {
            if($_POST['checkbookingid'])
            {
              if(array_key_exists('bookingid',$_POST) )
              {
                  $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
                  
                  if($connect->connect_error)
                  {
                      die( "there was an error connecting to the database ".mysqli_connect_error());
                  }
                  $bookingid = $_POST['bookingid'];
                  $query =  "Delete from roomstatus where bookid = '".$bookingid."' ;";
                  if ($connect->query($query) == TRUE)
                  {
                      print("<script>window.alert('Room Status Updated !');</script>");
                  }
                  else
                  {
                      print("<script>window.alert('Error:Incorrect Booking iD');</script>");
                  }
                  mysqli_close($connect);
              }
            }
          }
        ?>
        </div>
        </div>
      
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
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
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