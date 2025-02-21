<?php
session_start();
include "db_con_reg.php";
$submitted = false; // Flag to check form submission

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["Address"]) && isset($_POST["Contact"]) && isset($_POST["pincode"])) {
  $submitted = true; // Set flag to true after submission

  $name = $_POST['name'];       
  $email = $_POST['email'];
  $Password = $_POST['pass'];
  $Address = $_POST['Address'];
  $Org_mobile = $_POST['Contact'];
  $Org_pincode = $_POST['pincode'];
  $sql = "INSERT INTO bs_org(name,email,password,address,org_mobile,org_pincode) VALUES ('$name','$email','$Password','$Address','$Org_mobile','$Org_pincode')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
      //echo "Logged in!";
      header("Location: home page 2.html");
      exit();
  } else {
      echo "Registration failed: " . mysqli_error($conn); // Display a more informative error message
      exit();
  }
} else {
  $submitted = false; // Reset flag for new visits
  //echo "Registration failed: ";
}

?>
<html> 

<head> 
	<title style="color: rgb(0, 255, 136);">Registration Form</title> 
	<link rel="stylesheet"
		href="cssfrvol.css"> 
</head> 

<body style="background-image: url('img.jpg');"> 
	<div class="main" style="border-style: solid;width:500px;padding:20px;border-radius:20px;background-color:white" > 
		<h1 style = "text-align:center">Registration Form</h1> 
		<form action="home page 2.html" method = 'post' onsubmit = "validate(event)"> 
			<label for="first">name of the institution:</label> 
			<input type="text" id="name"name="name"placeholder="Enter the name of institution"> 
			<span id = "s_name"></span>
			<label for="email"> Official email:</label> 
			<input type="email" id="email"name="email"placeholder="Enter email"> 
			<span id = "s_email"></span>
            <label for="pass">Create password:</label> 
            <input type="password" id="pass"name="pass"placeholder="Enter password"> 
			<span id = "s_password"></span>
            <label for="Address">Address:</label> 
            <input type="text" id="Address"name="Address"placeholder="Enter "> 
			<span id = "s_Address"></span>
			<label for="Contact">Front desk:</label> 
			<input type="number" id="Contact"name="Contact"placeholder="Enter your Contact Number"> 
			<span id = "s_Contact"></span>
            <label for="pincode">pincode:</label> 
            <input type="number" id="pincode"name="pincode"placeholder="Enter your pincode"> 
			<span id = "s_pincode"></span>
			<div class="wrap"> 
				<button type="submit" onclick="solve()"> 
				Sign up
				</button>
                <br/>
                
			</div>
            <div style = "text-align:center;">
                <a href="login_org.php" >Log in</a>  
            </div>
		</form> 
	</div> 
	<script>
        function validate()
        {
            event.preventDefault();
			var name = 	document.getElementById('name').value;
			var email = document.getElementById('email').value;
			var pass = document.getElementById('pass').value;
			var Address = document.getElementById('Address').value;
			var Contact = document.getElementById('Contact').value;
			var pincode = document.getElementById('pincode').value;

			var ck_name = /^([A-Za-z\s]{5,})$/;
			var ck_email = /^([a-z0-9]{5,})@([a-z0-9]{3,}).([a-z0-9!@#$%.]+)$/;
			var ck_pass = /^([A-Za-z0-9\W]{8,})$/;
			var ck_Contact = /^([0-9]{10,12})$/;
			var ck_pincode = /^([0-9]{6,6})$/;

			if(ck_name.test(name))
			{
				document.getElementById('name').style.borderColor = "green";
				document.getElementById('s_name').innerHTML = "";
			}
			else
			{
				document.getElementById('name').style.borderColor = "red";
				document.getElementById('s_name').innerHTML = "Enter a valid name";
			}

			if(ck_email.test(email))
			{
				document.getElementById('email').style.borderColor = "green";
				document.getElementById('s_email').innerHTML = "";
			}
			else
			{
				document.getElementById('email').style.borderColor = "red";
				document.getElementById('s_email').innerHTML = "Enter a valid Email ID";
			}

			if(ck_pass.test(pass))
			{
				document.getElementById('pass').style.borderColor = "green";
				document.getElementById('s_password').innerHTML = "";
			}
			else
			{
				document.getElementById('pass').style.borderColor = "red";
				document.getElementById('s_password').innerHTML = "Enter a valid Password";
			}

			if(Address != "")
			{
				document.getElementById('Address').style.borderColor = "green";
				document.getElementById('s_Address').innerHTML = "";
			}
			else
			{
				document.getElementById('Address').style.borderColor = "red";
				document.getElementById('s_Address').innerHTML = "Enter your Address";
			}

			if(ck_Contact.test(Contact))
			{
				document.getElementById('Contact').style.borderColor = "green";
				document.getElementById('s_Contact').innerHTML = "";
			}
			else
			{
				document.getElementById('Contact').style.borderColor = "red";
				document.getElementById('s_Contact').innerHTML = "Enter a valid Contact No.";
			}

			if(ck_pincode.test(pincode))
			{
				document.getElementById('pincode').style.borderColor = "green";
				document.getElementById('s_pincode').innerHTML = "";
			}
			else
			{
				document.getElementById('pincode').style.borderColor = "red";
				document.getElementById('s_pincode').innerHTML = "Enter a valid Pincode";
			}
        }
    </script> 
</body> 

</html>