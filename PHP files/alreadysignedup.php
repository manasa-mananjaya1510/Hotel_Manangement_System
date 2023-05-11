<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
	background:url(register.jpg);
font-family: Arial, Helvetica, sans-serif;
		background-size:1000px 650px;
padding:70px;
background-height:100px;}

.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
	max-height:40px;
    margin-bottom: 15px;
}

.icon {
    padding: 10px;
    background: black;
    color: white;
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
}

.signin {
    background-color:transparent;
    text-align: center;
}
</style>
</head>
<body>

<form action="loggedin.php" style="max-width:500px;margin:auto" method="GET">
<div class="container">
  <h2>Sign In</h2>
  <div class="input-container"><h1 style="font-size:25px;color:red;">* &nbsp;</h1>
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="usrnm" required autocomplete="off">
  </div>

  <div class="input-container"><h1 style="font-size:25px;color:red;">* &nbsp;</h1>
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="psw" required autocomplete="off">
  </div></div>

  <button type="submit" class="btn">Sign In</button>
  <p style="font-size:17px;color:red;">* field is required</p>
<script>
function myFunction() {
    alert("You have successfully logged in");
}
</script>

 
</form>


</body>
</html>
