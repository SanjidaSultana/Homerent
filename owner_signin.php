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
<form method="post" action="">
  Name: <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" />
  
  <br><br>
  Password: <input type="password" name="password">
 
  <br><br>
  <input type="submit" name="login" value="Signin"> 
  
</form>
</div>
</body>
</html>
<?php

if (isset ($_POST['login'])){
	$servername= "localhost";
	$username = "root";
	$dbpassword = "";
	$databasename="data";
	
	$conn = new mysqli($servername, $username, $dbpassword,$databasename);
	
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	
		$Name=$_POST['name'];
		$Password=$_POST['password'];
	
		$sqlQuery = "SELECT name, password FROM ownerinfo where name='$Name' and password='$Password'";
			

		$s=mysqli_query($conn, $sqlQuery);
		if (mysqli_num_rows($s) > 0) {
			session_start();
			
			header('Location: show.php');
		
    
	
    }
		

 else {
    echo "Incorrect UserName or Password";
}
			
		
  $conn->close();
  }
?>

