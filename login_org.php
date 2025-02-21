<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bs_new";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} else{

    if (isset($_POST["pass"]) && isset($_POST["email"]) ){
        $email = $_POST['email'];
        $pass = $_POST['pass'];            
        $result = mysqli_query($conn,"SELECT * from bs_org where email = '$email'");
        if($result){
            $row = $result->fetch_assoc();
            if($row['password'] == $pass)
            {
                header("Location: home page 2.html");
                exit;
            }
            else{
                //echo("Wrong pass");
        }
        }
    }
}     
?>


<html> 

<head> 
	<title style="color: rgb(0, 255, 136);">Login Form</title> 
	<link rel="stylesheet"
		href="cssfrvol.css"> 
</head> 

<body style="background-image: url('img.jpg');"> 
	<div class="main" style="border-style: solid;width:500px;padding:20px;border-radius:20px;background-color:white"> 
		<h1>Login Form</h1> 
		<form action="login_org.php " method="POST"> 

			<label for="email"> Official Email:</label> 
			<input type="email" id="email"
				name="email"
				placeholder="Enter email" required> 

            <label for="pass">Password:</label> 
            <input type="password" id="pass"
                name="pass"
                placeholder="Enter password" required> 


			<div class="wrap"> 
					<button type="submit" onclick="solve()"> 
					    Login
					</button>
                <br/>  
			</div>
		</form> 
	</div> 
	<script src="script.js"></script> 
</body> 

</html>
