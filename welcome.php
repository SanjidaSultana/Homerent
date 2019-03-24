<!doctype html>

<html>
<head>
	<title></title>
	<style>
		body {
			background: url(homes-for-rent.jpg) no-repeat center center fixed; 
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    background-size: cover;
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
	
		.asd{
		    text-decoration: none;
			background-color:white;
			text-align: center;
			7padding-bottom: 7px;
			padding-top: 7px;
			color: black;
			font-size: 25px;
			position:absolute
			width:100%;
			top:0%;
		}	
		p{
		color:black;
		}
		a{
		color:black;
		}
		.dropbtn {
  background-color: #3CB371;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
   position: absolute;
  left: 45%;
  top: 50%;
  width: 10%;
  text-align: center;
  font-size: 18px;
}

.dropdown {
  position: left;
  display: inline-block;
}


.dropdown-content {
  display: none;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  position: absolute;
  left: 45%;
  top: 57%;
  width: 10%;
  text-align: center;
  font-size: 18px;
}


.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #ddd;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}

	</style>
		
</head>

<body  >
	<div class="asd">
		<p><i><h1>Welcome To Home Rent System<h1></i></p>
		<p></p>
	</div>
	<div class="box" >
	<p><h2><i>It is not how big the house is, it's how happy the home is...<h2><i><p>
	
  <div class = "dropdown">
  <button class="dropbtn">Sign in</button>
  <div class="dropdown-content">
    <a href="owner_signin.php">As an owner </a>
    <a href="renter_signin.php">As an renter</a>
  </div>
  </div>
  <br> <br>
  <h5>Don't have an account?<a href="welcome_signup.php">Sign up</a></h5> 
	</body>
	</html>