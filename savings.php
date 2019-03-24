<?php
include('conection.php');


$gasErr= $flatErr=$electricityErr=$waterErr= "";
    $gas =$flat =$electricity =$water= "";
if (isset($_POST['submit'])){
	  $build=($_POST["flat"]);
	  $gas=($_POST["gas"]);
	  $electricity=($_POST["electricity"]);
	  $water=($_POST["water"]);
$p="SELECT amount FROM payments where buildingnumbers= '$build'";
    $result=mysqli_query($conn,$p);
	if($result){
		$fassoc=mysqli_fetch_assoc($result);
				$pp=$fassoc['amount'];

$cal=$pp-($gas+$electricity+$water);
echo"<br> Total savings = $cal \n";
$data = "INSERT INTO savings(building,saving) VALUES ('$build','$cal')";
		$s=mysqli_query($conn,$data);
			

	}
}

function test_input($ownerinfo) {
  $ownerinfo= trim($ownerinfo);
  $ownerinfo = stripslashes($ownerinfo);
  $ownerinfo = htmlspecialchars($ownerinfo);
  return $ownerinfo;
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
<h2>To check your savings fillup the form and submit </h2>
<p><span class="error">* required field.</span></p>

<form method="post" action="">

<label>Enter building number </label>
<input type="text" name="flat" value= "" required>
<span class="error">* <?php echo $flatErr;?></span>
<br><br>
<label>Enter Electricity Bill </label>
<input type="text" name="electricity" value="" required>
<span class="error">* <?php echo $electricityErr;?></span>
<br><br>
<label>Enter Gas Bill </label>
<input type="text" name="gas" value="" required>
<span class="error">* <?php echo $gasErr;?></span>
<br><br>
<label>Enter Water Bill </label>
<input type="text" name="water" value="" required>
<span class="error">* <?php echo $waterErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit"> 
<a href="logout.php">logout</a>
</form>
</div>
</body>
</html>


