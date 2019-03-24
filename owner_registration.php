
<!DOCTYPE HTML>  
<html>
<head>
<style>

		body {
			background: url(homes-for-rent.jpg) no-repeat center center fixed; 
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    background-size: cover;
			}
			p{
			text-align:center;
			}
		.box{
			width:400px;
			height:400px;
			background: rgba(0,0,0,0,4);
			padding:40px;
			color:  black;
			margin: 0 auto;
			marging-top:140px;
			text-align:center;
		}
	     .error {color: #FF0000;}
	
</style>
</head>


<body>  


<?php

$nameErr = $passwordErr= $ConfirmPasswordErr=$emailErr=$phonenoErr=$areaErr=$flatErr=$rentErr=$buildErr= "";
$name = $password =$ConfirmPassword =$email=$phoneno=$area=$flat=$rent=$build= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
 
	 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	 $nameErr = "Only letters and white space allowed"; 	 
    }
  }
  if (empty($_POST["flat"])) {
    $flatErr = "flat numbers is required";
  } else {
    $flat = test_input($_POST["flat"]);
  }
  if (empty($_POST["build"])) {
    $buildErr = "building number is required";
  } else {
    $build = test_input($_POST["build"]);
  }
  if (empty($_POST["phoneno"])) {
    $phonenoErr = "Phone number is required";
  } else {
    $phoneno = test_input($_POST["phoneno"]);
	if(strlen($phoneno)<11 or strlen($phoneno)>11){
    	$phonenoErr="Input a valid no";
  }
  }
  if (empty($_POST["rent"])) {
    $rentErr = "rent amount is required";
  } else {
    $rent = test_input($_POST["rent"]);
  }
  
  
  if ((empty($_POST["password"]))) {
    $passwordErr = "password is required";
   if((strlen($_POST["password"]))!= 8){
	  $passwordErr ="size must be 8";
  }
  else {
    $password = test_input($_POST["password"]);
  }
  }   
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
}
if(!empty($_POST["name"]) &&!empty($_POST["email"])&&!empty($_POST["phoneno"])&& !empty($_POST["password"])&&  !empty($_POST["flat"])&& !empty($_POST["build"])&& !empty($_POST["rent"]))
  {
	  
	$servername= "localhost";
	$username = "root";
	$password = "";
	$databasename="data";
	
	  $Name=($_POST["name"]);
	  $Email=($_POST["email"]);
	  $Phoneno=($_POST["phoneno"]);
	  $Password=($_POST["password"]);
	  $ConfirmPassword=($_POST["ConfirmPassword"]);
	  //$area=($_POST["area"]);
	  $flat=($_POST["flat"]);
	  $rent=($_POST["rent"]);
	  $build=($_POST["build"]);
	
	$conn = new mysqli($servername, $username, $password, $databasename);
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


	$ownerinfo = "INSERT INTO ownerinfo (name, email,phoneno,password,flatnumbers,bnumber,rentamount)
            VALUES ('$Name','$Email','$Phoneno','$Password','$flat','$build','$rent')";
			$s=mysqli_query($conn,$ownerinfo);
			if(!$s){
				echo "not successful";
				
			}else{
				echo " successful";
			}
	
  header("Location: show.php");
  exit();
  }
function test_input($info) {
  $info= trim($info);
  $info = stripslashes($info);
  $info = htmlspecialchars($info);
  return $info;
}

?>
<div class="box">
<h2>Sign up form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action ="">
<center>
<table>
<tr>
<td>Name:</td><td> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span></td></tr>
  <br><br>
  <td>E-mail:</td><td> <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span></td></tr>
  <br><br>

  <td>phone No:</td><td><input type="text" name="phoneno" value="<?php echo $phoneno; ?>">
  <span class="error">* <?php echo $phonenoErr;?></span></td></tr>
  <br><br>
  <td>building number:</td><td><input type="text" name="build" value="<?php echo $build; ?>">
  <span class="error">* <?php echo $buildErr;?></span></td></tr>
  <br><br>
  <td>Flat numbers for rent:</td><td><input type="text" name="flat" value="<?php echo $flat; ?>">
  <span ss="error">* <?php echo $flatErr;?></span></td></tr>
  <br><br>
  <td>Rent Amount::</td><td><input type="text" name="rent" value="<?php echo $rent; ?>">
  <span class="error">* <?php echo $rentErr;?></span></td></tr>
  <td>Password: :</td><td><input type="password" name="password" size=8>
  <span class="error">* <?php echo $passwordErr;?></span></td></tr>
  <br><br>
  
  <tr>
  <td><input type="submit" name="register" value="Register"> </td>
</tr>
</center>
</form>
</body>
</html>

