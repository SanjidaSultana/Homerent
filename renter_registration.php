<?php

$nameErr = $passwordErr= $ConfirmPasswordErr=$emailErr=$phonenoErr=$areaErr=$advanceErr=$flatErr="";
$name = $password =$ConfirmPassword =$email=$phoneno=$area=$advance=$flat= "";

if ($_POST) {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
 
	 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	 $nameErr = "Only letters and white space allowed"; 	 
    }
  }
  if (empty($_POST["phoneno"])) {
    $phonenoErr = "Phone number is required";
  } else {
    $phoneno = test_input($_POST["phoneno"]);
	if(strlen($phoneno)<11 or strlen($phoneno)>11){
    	$phonenoErr="Input a valid no";
  }
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
  if (empty($_POST["ConfirmPassword"])) {
    $ConfirmPasswordErr = "ConfirmPassword is required";
  } if (($_POST["password"])!=($_POST["ConfirmPassword"])) {
    $ConfirmPasswordErr = "password must be same";
  }else {
    $ConfirmPassword = test_input($_POST["ConfirmPassword"]);
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
  if(!empty($_POST["name"]) && !empty($_POST["password"])&& !empty($_POST["ConfirmPassword"])&& !empty($_POST["email"])&& (($_POST["password"])==($_POST["ConfirmPassword"])))
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
	 
	  $flat=($_POST["flat"]);
	
	$conn = new mysqli($servername, $username, $password,$databasename);
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


	$renterinfo = "INSERT INTO renterinfo(rentername, renteremail,renterphoneno,renterpassword,)
            VALUES ('$Name','$Email','$Phoneno','$Password')";
			$s=mysqli_query($conn,$renterinfo);
			if(!$s){
				echo "not successful";
				
			}else{
				echo " successful";
			}
	
  header("Location: payment.php");
  exit();
  }


function test_input($info) {
  $info= trim($info);
  $info = stripslashes($info);
  $info= htmlspecialchars($info);
  return $info;
}
?>
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
			color: black;
			margin: 0 auto;
			marging-top:140px;
			text-align:center;
		}
	
</style>
</head>
<body>  
<div class="box">
<h2>Sign up form</h2>
<p><span class="error">* required field.</span></p>

<form method="post" action="">
  Name: <input type="text" name="name" value="<?php echo $name;?>" >
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Email: <input type="email" name="email" value ="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  phone No:<input type="text" name="phoneno" value="<?php echo $phoneno; ?>">
  <span class="error">* <?php echo $phonenoErr;?></span>
  <br><br>
  Password: <input type="password" name="password">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  ConfirmPassword: <input type="password" name="ConfirmPassword">
  <span class="error">* <?php echo $ConfirmPasswordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit"> 
</form>
</div>
</body>
</html>


