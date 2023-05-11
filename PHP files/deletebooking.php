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





/* Set a style for the submit button */
.btn {
    background-color:white;
    color: #D4AF37;
    padding: 30px;
    border: 2px solid black;
    cursor: pointer;
    width: 500px;
    opacity: 0.9;
	font-size:27px;
	text-shadow: 1px 1px 1px black;
	padding-left:0px;
}

.btn:hover {
    opacity: 1;
	background-color: #000000;
}
.container {
    
	padding-left:450px;
}

.signin {
    background-color:transparent;
    text-align: center;
}
<!--.input-field {
    width:100px;
    padding-left: 450px;
    outline: none;
	border:0;
	-webkit-appearance: none;
	
}
input[type="text"]{
color:#D4AF37;
text-shadow: 1px 1px 1px black;
font-size:45px;
text-align:center;
padding-left:450px;
padding-bottom:30px;
padding-top:30px;
}-->

</style>
</head>
<body>
<div class="header">

<ul style="border-bottom:none;border-top:none;background-color:transparent;position:top;font-size:20px;">
 
    <li style="border-right:none; border-left:none;"><a href="hrshome.html">Home</a></li>
	</ul>
	<p style="color:#D4AF37;text-shadow: 1px 1px 1px black;font-size:45px;text-align:center;padding-top:80px;"> BOOKING HAS BEEN DELETED</p>	
	</div>
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

//$usrnm=$_POST[fullname];
//$psw=$_POST[psw];
//echo $urnm;



session_start();
	$myPHPvar = $_SESSION['myPHPvar'];
	//echo $myPHPvar;   ///username
	
	mysqli_query($conn,"delete from customer where username='$myPHPvar'");
	
//echo ("<p style=\"color:#D4AF37;text-shadow: 1px 1px 1px black;font-size:45px;text-align:center;padding-top:80px;\"> BOOKING HAS BEEN DELETED</p>");	
	
	
	
 ?>
 
 <h1 style="color:#D4AF37;text-shadow: 1px 1px 1px black;font-size:35px;text-align:center;padding-top:20px;">Make a new Reservation by choosing the location below</h1>
 <div class="container">
 <form action="aussfilllog.html">
<button  type="submit" name="submit" class="btn">AUSTRALIA</button><br>
</form><br><br>
<form action="parisfilllog.html">
<button  type="submit" name="submit" class="btn" >PARIS</button><br>
</form><br><br>
<form action="swissfilllog.html">
<button  type="submit" name="submit" class="btn">SWITZERLAND</button><br>
</form><br><br>
<form action="quebecfilllog.html">
<button  type="submit" name="submit" class="btn" >QUEBEC</button><br>
</form><br><br>
</div>
 </body>
 </html>