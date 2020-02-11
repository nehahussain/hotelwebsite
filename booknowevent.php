<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
body {
  background-color: #f1f1f1;
}

input {
  padding: 10px;
  width: 90%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}
</style>
</head>
<body>

<form  action="booknowevent1.php" method ="post">
    <h1><strong>Select Checkin and checkout Dates to see the available event rooms </strong></h1>

    <h3>CheckIn Date</h3>
    <input type="date" id="startdate" name="startdate" min="<?php echo date("Y-m-d");?>" max="2020-12-31" value="<?php echo $startdate;?>"> 
    <br>
    <h3>CheckOut Date</h3>
    <input type="date" id="enddate" name="enddate"  min="<?php echo date("Y-m-d");?>" max="2020-12-31" value="<?php echo $enddate;?>"> 
    <br>
    <br>
    <input  type ="submit" name="submit" value="Check" >
</form>


<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>



