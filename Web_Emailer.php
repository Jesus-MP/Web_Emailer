<!DOCTYPE html>

<!-- Lab4

Connects to Database but cant get POST to work
so had to hard code it. Includes LogIn and Register
aswell as the mailer page.
-->
<html>

<head>
		<style type="text/css">
		form
		{
		
			text-align:left;
			float:left;
			border-style:solid;
			background-color:white;
			border-radius:10px;
			
			margin: 5px 5px 5px 5px;
			padding: 10px 10px 10px 10px;
			
		}
		div{
			margin: 0px 0px 0px 0px;
		}
		h1{
			color:white;
			height:100px;
			width:1700px;
			vertical-align:bottom;
			padding: 2px;
			margin: 2px 0px 0px 2px;
			border-style:solid;
			border-width:thick;
			background-color:#D00D2D;
			
		}
		h3{
			background-color:#333;
			width:1700px;
			
			margin: 2px 0px;
		}
		input
		{
			float:right;
			
		}
		textarea
		{
			float:right;
			
		}
		.submit
		{
			background-color:#D00D2D;
			border-style:thick;
			border-radius:20px;
			color:white;
		}
		
	
		ul
		{
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
			width:1800px;
		}
		li{
			margin: 5px 5px 5px 5px;
			color: white;
			display: inline;
			padding: 14px 16px;
			text-align: center;
			
		}
		
		li:hover
		{
			background-color:#111;
		}

		</style>
		<meta charset="utf-8">
		<title>Main Page</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		
		<script language="javascript" type="text/javascript">
		
		<?php
		$pageNumber=1;
		?>
		//date picker function
		$(function()
		{
			$("#date").datepicker().show();
		}
		);
		//checks if the passwords match at register page
		function passwordchecker()
		{
			var pass1=document.getElementById("password").value;
			var pass2=document.getElementById("repeat").value;
			
			if(pass1==pass2)
				return true;
			else
				return false;
		}
		function submit(e)
		{
			if(passwordchecker())
			{
				e.preventDefault();
				passworderror.style.color="red";
			   passworderror.innerHTML="Error Passwords dont match";
			}
			
			
		}
		var login_button;
		var submit_button;
		var passworderror;
		//initializes the DOM elements and listeners
		function init()
		{
			
			passworderror=document.getElementById("passworderror");
			submit_button=document.getElementById("Register");
			submit_button.addEventListener("submit",submit,false);
			
		}
		window.addEventListener("load",init,false);
		
		function updatePage()
		{
			$pageNumber=3;
			alert("hi");
		}
		</script>
		
		
		
		
		
		
</head>
<body>
<div><h1>Go Matadors!!</h1></div>


<!-- Navigation bar
 -->
 
<ul>
<li>Home</li>
<li>Register</li>
<li>Log In </li>
<li>About  </li>
</ul>


<?php
	
	//Controls the page with login page as default and register page and email page
	
	if(isset($_POST["page"]))
	{
		$pageNumber=$_POST["page"];
		settype($pageNumber,"integer");
		
	}
	
	else
	{
		
		$pageNumber=1;
	}
	
	if($pageNumber == 1)
	{
?>

 <form method="post" action="">
<div><h2>Register</h2></div>
<input type="hidden" name="page" value="2">
<div><label>Username</label><input type="text" id="username" name="username"></div><br>

<div><label>Password</label><input type="password" id="password" name="password"></div><br>

<div><label>Repeat</label><input type="password" id="repeat" name="repeat"></div><br>
<span>
			 <p  id="passworderror"></p>
		</span>

<div><input type="submit" class="submit" id="register" name="Register" value="Register"></div>

</form>

	
	<?php
	}
	
	

	
	
	
	
	
	
	
	else if($pageNumber==2)
	{//page number is 2
	?>	
		<form method="post" action="">
<div><h2>User Email Sender</h2></div>
<input type="hidden" name="page" id="page">
<div><label>Email Address:</label>
<input name="email" type="text" id="email" name="email"></div>

<div><p>Date:<input type="text" id="date" name="date"></p></div>

<div><label>Message:</label><textarea name="message" rows="1" id="message">
</textarea></div>
<br>
<div><h2>Time</h2></div>
<div><label>Hours:   </label>
<select id="hours">
<option value="0"></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<label>Minutes</label>
<select id="minutes">
<option value=""></option>
<option value="0">00</option>
<option value="30">30</option>
</select>
<select id="am/pm">
<option value=""></option>
<option value="am">am</option>
<option value="pm">pm</option>
</select>
</div>
<br></br>
<input type="submit" class="submit" id="submit" value="Submit">
</submit>
</form>
	<?php	
	}
	else
	{
		?>

		
		
		<form method="post">
<div><h2>LogIn</h2></div>
<input type="hidden" name="page" value="1">
<div><label>Username</label><input type="text" id="username" name="username"></div><br>

<div><label>Password</label><input type="password" id="password" name="password"></div><br>
<div><input type="submit" class="submit" id="LogIn" name="LogIn" value="LogIn"></div>
</form>	
		

	
	<?php	
	}
	
	
	
	//php code that inserts stuff into the database
	//Connect to the MySQL 
	
//Checks to see that the post variables are set
	if(isset($_POST["username"]))
	{
		$username=$_POST["username"];
	}
	if(isset($_POST["password"]))
	{
		$password=$_POST["password"];
	}
	
	
	$connection=mysqli_connect("localhost",'root','',"comp484");
	if (!$connection)
                    die("Couldn't connect to database </body></html>");
                else {
                   echo "Successfully connected to the database " . "<br>";
                }
                echo "Connected to db";
                
                if (!mysqli_select_db($connection, "comp484")) {
                    die("Couldn't open the comp484 database </body></html>");
                } else {
                  echo "Successfully opened the comp484 database " . "<br>";
                }
	
	
	//Insert into database
	//This is the part where I got stuck
	
	
	$sql="INSERT INTO user(username,password)
	VALUES ('username','password')";
	/*
	if(mysqli_query($connection,$sql))
	{
		echo "message table updated sucessfully";
	}
	else
	{
		echo "Error:" .$sql. "<br>".mysqli_error($connection);
	}
	
	*/
	
	?>








<footer>This is a website</footer>
</body>
</html>