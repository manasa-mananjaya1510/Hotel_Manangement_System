<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.header {background:url(about.jpg);
		background-size: 1350px 500px;
		background-repeat: no-repeat;
      padding-bottom: 300px;
	  padding-left:0;
	  padding-right:10px;
	  height:70px;
	width: 1342px;
    text-align:center;
    text-color:	white;}
img {
    float: left;
	padding:20px;
}
ul {
    list-style-type: none;
    margin:0;
	width: 4000px
    padding: 0;
    overflow: hidden;
    background-color:white;
	border-bottom: 20px #D4AF37;
	border-top: 20px solid #D4AF37;
}

li {
    float: left;
	border-right:150px solid white;
	border-left:150px solid white;
	
}

li a {
    display: block;
    color:	#D4AF37;
    text-align: center;
    padding: 14px 6px;
    text-decoration: none;
}
	
	li a:hover {
     border-bottom: 3px solid #D4AF37;}
	 
	 .input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}

.icon {
    padding: 10px;
    background: black;
    color:#D4AF37 ;
    min-width: 50px;
    text-align: center;
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid black;
}

/* Set a style for the submit button */
.btn {
    background-color:black;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
	font-size:30px;
}

.btn:hover {
    opacity: 0.5;
}
.container {
    padding: 16px;
    background-color: white;
	max-width:500px;
	padding-left:0px;
}

.signin {
    background-color:transparent;
    text-align: center;
}
input[type="date"]:not(.has-value):before{
  color: gray;
  content: attr(placeholder);
}
</style>
</head>
<body>
<div class="header">

<ul style="border-bottom:none;border-top:none;background-color:transparent;position:top;font-size:20px;">
 
    <li style="border-right:none; border-left:none;"><a href="hrshome.html">Home</a></li>
	    <!--<li style="border-right:none; border-left:none;"><a href="loggedin.php">Go Back</a></li>-->
</ul>
	<h1 style="color:#D4AF37;letter-spacing: 10px; font-size:60px;"><em><strong><br>BOOKING DETAILS </strong></em><br><p style="font-size:45px;"><p></h1><br><br>
</div><br>


<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db="hrs";

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn,"hrs");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
error_reporting(E_ALL ^ E_WARNING^E_NOTICE ); 
session_start();
	$myPHPvar = $_SESSION['myPHPvar'];
	//echo $myPHPvar;   ///username
	
$usrnm=$myPHPvar;


$sql = "SELECT hid,cid, name,email,address,phno from customer where username='$usrnm'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$hid=$row[hid];
       $cid=$row[cid];
		$name=$row[name];
		$email=$row[email];
		$address=$row[address];
		$phno=$row[phno];
    }
}
$sql = "SELECT rid,no_of_rooms,checkin,checkout,totalprice from booking where cid='$cid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       // echo  $row[cid];
		$rid=$row[rid];
		$noofrooms=$row[no_of_rooms];
		$check_in=$row[checkin];
		$check_out=$row[checkout];
		$tp=$row[totalprice];
    }
}
$sql = "SELECT type from rooms where rid='$rid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       // echo  $row[cid];
		$roomtype=$row[type];

    }
}
$sql = "SELECT destination from hotel where hid='$hid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       // echo  $row[cid];
		$location=$row[destination];

    }
}


   
	
	echo ("<p style=\"padding-left:400px\">LOCATION</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-user icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$location readonly>
					</div>\n\n");
	
	echo ("<p style=\"padding-left:400px\">NAME</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-user icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$name readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">EMAIL</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-envelope icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$email readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">ADDRESS</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-home icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$address readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">CONTACT NUMBER</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-phone icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$phno readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">ROOM TYPE</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-bed icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$roomtype readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">NUMBER OF ROOMS</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-calculator icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$noofrooms readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">CHECK IN DATE</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-calendar icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$check_in readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">CHECK OUT DATE</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-calendar icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$check_out readonly>
					</div>\n\n");
					
					
echo ("<p style=\"padding-left:400px\">YOUR SERVICES</p>");
$sql = "SELECT servicetype from service,samt where samt.sid=service.ssid and cid='$cid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
						
						$check=$row[servicetype];
						echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-calculator icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder='$check' readonly>
					</div>\n\n");
			
           
	}
	
}
	echo ("<p style=\"padding-left:400px\">TOTAL COST</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-money icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$$tp readonly>
					</div>\n\n");
	//call triggers


?>
</form>
</body>
</html>