<!DOCTYPE html>
<html>
<head>
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
body {
  padding: 10% 20%;
  font-family: 'Open Sans', sans-serif;
  background: #111;
  color: #fff;
}

label {
  padding: 4px 6px;
  line-height: 190%;
  outline-style: none;
  transition: all .6s;
}

.hiddenCB div {
  display: inline;
  margin: 0;
  padding: 0;
  list-style: none;
}

.hiddenCB input[type="checkbox"],
.hiddenCB input[type="radio"] {
  display: none;
  
}

.hiddenCB label {
  
  cursor: pointer;
}

.hiddenCB input[type="checkbox"]+label:hover{
  background: rgba(0, 128, 128, .8);
}

.hiddenCB input[type="checkbox"]:checked+label {
  background: rgba(0, 128, 128, .4);
}

.hiddenCB input[type="checkbox"]:checked+label:hover{
  background: rgba(0, 128, 128, 0, .7);
}
}

.hiddenCB label {
  
  cursor: pointer;
}

.hiddenCB input[type="checkbox"]+label:hover{
  background: rgba(0, 128, 128, .8);
}

.hiddenCB input[type="checkbox"]:checked+label {
  background: rgba(0, 128, 128, .4);
}

.hiddenCB input[type="checkbox"]:checked+label:hover{
  background: rgba(0, 128, 128, 0, .7);
}	 
</style>
</head>
<body>
<ul style="border-bottom:none;border-top:none;background-color:transparent;position:top;font-size:20px;">
 
    <li style="border-right:none; border-left:none;"><a href="hrshome.html">Home</a></li>
</ul>
<form action="bookingconfirmed.php" style="max-width:500px;margin:auto">
<div class="container">
  <h2>Fill in the information</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="First name" name="Fname" value="<?php if(isset($_POST['Fname'])){ echo $_POST['Fname']; } ?>">
	    <input class="input-field" type="text" placeholder="Last name" name="lastname">
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Email" name="email">
  </div>
  
  <div class="input-container">
    <i class="fa fa-home icon"></i>
    <input class="input-field" type="text" placeholder="Address" name="address">
  </div>
  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="number" placeholder="Phone Number" name="phno">
  </div>
    <div class="input-container">
    <i class="fa fa-bed icon"></i>
    <input class="input-field" list="roomtypes" type="text" placeholder="Choose room type" name="roomtypes">
	  <datalist id="roomtypes">
    <option value="VIP Suite --> $150/night">
    <option value="Rooms with view -->$95/night">
    <option value="Regular Rooms -->$55/night">
  </datalist>
  </div>
  
    <div class="input-container">
    <i class="fa fa-calculator icon"></i>
    <input class="input-field" type="number" placeholder="Number of rooms" name="noofrooms">
  </div>
  
<div class="input-container">
    <i class="fa fa-photo icon"></i>
	<input class="input-field" placeholder="choose services" name="services" style="width:380px;" autocomplete="off">
<div class="hiddenCB">
 <div>
    <input type="checkbox" name="choice" id="cb1" /><label for="cb1">Choice A</label>
    <input type="checkbox" name="choice" id="cb2" /><label for="cb2">Choice B</label>
    <input type="checkbox" name="choice" id="cb3" /><label for="cb3">Choice C</label>
    <input type="checkbox" name="choice" id="cb4" /><label for="cb4">Choice D</label>

  </div>
</div>
  </div>
  <div class="input-container">
    <i class="fa fa-calendar icon"></i>
    <input class="input-field" type="date" placeholder="Check-In ." name="chaeckin" onchange="this.className=(this.value!=''?'has-value':'')">
  </div>
   <div class="input-container">
    <i class="fa fa-calendar icon"></i>
    <input class="input-field" type="date" placeholder="Check-Out ." name="checkout" onchange="this.className=(this.value!=''?'has-value':'')">
  </div>
</div>
  <button type="submit" class="btn">Confirm Booking</button>
  <br><br>
  
</form>

<div class="hiddenCB">
  <h3>Make your choice(s)</h3>

  <div>
    <input type="checkbox" name="choice" id="cb1" /><label for="cb1">Choice A</label>
    <input type="checkbox" name="choice" id="cb2" /><label for="cb2">Choice B</label>
    <input type="checkbox" name="choice" id="cb3" /><label for="cb3">Choice C</label>
    <input type="checkbox" name="choice" id="cb4" /><label for="cb4">Choice D</label>

  </div>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="hrs";

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn,"mt");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>


</body>
</html>
