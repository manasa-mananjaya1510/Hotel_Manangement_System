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
	    <li style="border-right:none; border-left:none;"><a href="aussfill.html">Go Back</a></li>
</ul>
	<h1 style="color:#D4AF37;letter-spacing: 10px; font-size:60px;"><em><strong><br>BOOKING DETAILS </strong></em><br><p style="font-size:45px;">AUSTRALIA<p></h1><br><br>
</div><br>

<!--<form action="#" style="max-width:500px;margin:auto" method="GET">
<div class="container">
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text"  value=<?php //echo $_POST['fullname'] ?> readonly>
	    
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" value=<?php //echo $_POST['email'] ?> readonly>
  </div>
  
  <div class="input-container">
    <i class="fa fa-home icon"></i>
    <input class="input-field" type="text"  value=<?php //echo $_POST['address'] ?> readonly>
  </div>
  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="number" value=<?php //echo $_POST['phno'] ?> readonly>
  </div>
    <div class="input-container">
    <i class="fa fa-bed icon"></i>
    <input class="input-field"  type="text" value=<?php //echo $_POST['roomtypes'] ?> readonly>

  </div>
  
    <div class="input-container">
    <i class="fa fa-calculator icon"></i>
    <input class="input-field" type="number" value=<?php //echo $_POST['noofrooms'] ?> readonly>
  </div>
  

  <div class="input-container">
    <i class="fa fa-calendar icon"></i>
	<input class="input-field" type="date" value=<?php //echo $_POST['checkin'] ?> readonly>  </div>
   <div class="input-container">
    <i class="fa fa-calendar icon"></i>
    <input class="input-field" type="date" value=<?php //echo $_POST['checkout'] ?> readonly>
  </div>
</div>-->
 
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
error_reporting(E_ALL ^ E_WARNING^ E_NOTICE ); 
$usrnm=$_POST[usrnm];
$psw=$_POST[psw];
//echo $usrnm;	

$hid=1;
//echo $hid;
$sum=0;
$gcid=0;
$gsid=0;
$grid=0;
$name=$_POST[fullname];
//echo $name;
$email=$_POST[email];
$address=$_POST[address];
$phno=$_POST[phno];
$noofrooms=$_POST[noofrooms];

$check_in = date('Y-m-d', strtotime($_POST[checkin]));
$check_out = date('Y-m-d', strtotime($_POST[checkout]));
$roomtype=$_POST[roomtypes];

$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

if (filter_var($emailB, FILTER_VALIDATE_EMAIL) === false ||
    $emailB != $email
) {
    trigger_error("This email address isn't valid!");
	exit(0);
    
}

if($check_out<$check_in)
{
	 trigger_error("ENTER CORRECT CHECK IN AND CHECK OUT DATES");
	 exit(0);
    
}
$curdate=date("Y-m-d");
if($check_in<$curdate)
{
	 trigger_error("CHECK IN DATE NOT AVAILABLE");
    exit(0);
}


mysqli_query($conn,"insert into username values ('$usrnm','$psw')");
mysqli_query($conn,"insert into customer(hid,name,phno,email,address,username) values($hid,'$name',$phno,'$email','$address','$usrnm')");
$sql = "SELECT cid from customer where phno='$phno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       // echo  $row[cid];
		$gcid=$row[cid];
    }
}

	
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
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) 
	{
		//echo $check;
			echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-calculator icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder='$check' readonly>
					</div>\n\n");
			
            $result=mysqli_query($conn,"SELECT  serviceprice FROM service WHERE servicetype='$check'");
			if ( ! $result) {
			echo "ERROR: " . mysqli_error($conn);
			die();
	}
	
	while($row = mysqli_fetch_array($result))
	{
		$servicesum= $row[serviceprice];
		$sum=$sum+$servicesum;
		$sql = "SELECT ssid from service where servicetype='$check'";
		$resul = $conn->query($sql);
		
		if ($resul->num_rows > 0) {
		while($row = mysqli_fetch_assoc($resul)){
		$gsid=$row[ssid];
		
		}}
		//echo $gsid;
		mysqli_query($conn,"insert into samt(cid,sid,sprice) values($gcid,$gsid,$servicesum)");	
		
	}
    }
	}
	$sql = "SELECT rid from rooms  where type='$roomtype' and hid='$hid'";
	$reslt = $conn->query($sql);

	if ($reslt->num_rows > 0) {
    while($row = $reslt->fetch_assoc()) {
       // echo  $row[cid];
		$grid=$row[rid];
    }
}
	mysqli_query($conn,"insert into booking(hid,rid,cid,no_of_rooms,checkin,checkout,totalprice) values($hid,$grid,$gcid,$noofrooms,'$check_in','$check_out',0)");
	
	$cost=0;
	$rcost=0;
	$sql = "SELECT cost from rooms where type='$roomtype' and hid=$hid";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$cost=$row[cost];
    }
}
	//consider no of days to calculate total price
	
	$datetime1 = new DateTime($check_out);

	$datetime2 = new DateTime($check_in);
	$days= $datetime2->diff($datetime1);
	$days->format('%d days');
	$noofdays= $days->d;
	$noofdays=$noofdays+1;
	$rcost=$cost*$noofrooms*$noofdays;
	$result = mysqli_query($conn,"CALL totalprice($sum,$rcost,$gcid)");

		$sql = "SELECT totalprice from booking where cid=$gcid";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$tp=$row[totalprice];
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