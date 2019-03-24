
<?php
if(isset($_POST['savings'])){
	header("Location: savings.php");
  exit();
	
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
<form method="post" action="">
<h2>show of renter information.</h2>
<input type="submit" name="savings" value="check savings">
<a href="logout.php">logout</a>
</form>
</div>
</body>
</html>




