
<?php

$areaErr= $flatErr=$amountErr=$nameErr= $pin ="";
$area =$flat =$amount =$name= $pinErr= "";

if ($_POST) {
	if (empty($_POST["pin"])) {
		$pinErr = "pin number is required";
	}
	else {
		$flat = test_input($_POST["flat"]);
		if(strlen($pin)!=  6)	
		{
			$pinErr = "Invalid pin number";
	}
	}
	if (empty($_POST["name"])) {
		$nameErr = "name is required";
	}
	else {
		$name = test_input($_POST["name"]);
	}
	  if(!empty($_POST["flat"])&&!empty($_POST["name"])&&!empty($_POST["pin"])&&!empty($_POST["amount"])){
		  
		 
		$servername= "localhost";
		$username = "root";
		$password = "";
		$databasename="data";
		
		$amount=($_POST["amount"]);
		$pincode=($_POST["pin"]);
		$flat=($_POST["flat"]);
		$name=($_POST["name"]);
		$conn = new mysqli($servername, $username, $password,$databasename);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$data = "INSERT INTO payments(buildingnumbers,amount,renternames,pincode) VALUES ('$flat','$amount','$name','$pincode')";
		$s=mysqli_query($conn,$data);
			if(!$s){
				echo "not successful";
				
			}else{
				echo " successful";
			}
			
		$conn->close();
}
}
	
?>
	   
			

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
<h2>Payment page </h2>
<p><span class="error">* required field.</span></p>

<form method="post" action="">


<label>Enter Name</label>
<input type="text" name="name" value= "">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
<label>Enter building number: </label>
<input type="text" name="flat" value= "">
<span class="error">* <?php echo $flatErr;?></span>
<br><br>

<label>PIN CODE</label>
<input type="text" name="pin" value= "">
<span class="error">* <?php echo $pinErr;?></span>
<br><br>
<label>Enter Amount: </label>
<input type="text" name="amount" value="">
<span class="error">* <?php echo $amountErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit"> 
<a href="logout.php">Logout</a>
</form>
</div>
</body>
</html>
