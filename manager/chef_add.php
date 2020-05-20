<?php	
	session_start();
	include('../../service/functions.php');

	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

	if(isset($_REQUEST['register']))
    {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['pass1'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$phoneNo = $_POST['phoneNo'];
		$tip = 0;
		$type = "chef";
		$manager_id = $_SESSION['manager']['manager_id'];

		$filename = $_FILES['pic']['name'];
		$dbDest = "upload/".$filename;
		$dest = "../chef/upload/".$filename;
		$src = $_FILES['pic']['tmp_name']; 

		$ruser=userregi($email,$pass,$type);                  //creates user row in db
		$user = userAll($email);
		$userId = $user['user_id'];                           //gets the user id

		if(move_uploaded_file($src, $dest)){
			echo "File Uploaded.";
		}else{
			echo "File Upload Error!";
		}




		$con = getConnection();
		$sql = "insert into chefpi values('','{$userId}','{$dbDest}','{$username}', '{$address}','{$email}','{$phoneNo}','{$dob}', '{$tip}','{$manager_id}')";

		/*$sql = "UPDATE chefpi SET name='{$username}', email='{$email}', address='{$address}', dob='{$dob}', phone_no='{$phoneNo}', profile_pic='{$dbDest}' WHERE manager_id='{$managerId}'";*/
		$result = mysqli_query($con, $sql);

		if(mysqli_affected_rows($con)){
			$alert = "<script>
	        alert('Registration Successful.');
	        </script>";
	        echo $alert;
		}else{
			$alert = "<script>
	        alert('Registration failed!');
	        </script>";
	        echo $alert;
		}

		

       $alert = "<script>
       alert('inserted successfully');
       </script>";
       echo $alert;

    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Chef Registration</title>
</head>
<body>
		<form action="" method="POST" enctype="multipart/form-data">
			<fieldset style="width:100%">
			<legend>CHEF REGISTRATION</legend>
				<table border="0" align="center" align="center" cellspacing="20" cellpadding=”10″>
					<tr> 
                		<th colspan="3"><h5 align="center">Please fill the required information</h5></th> 
            		</tr> 
            		<tr>
            			<td align="center" colspan="3">
            				<div id="msg"></div></br><hr>
            			</td>
            		</tr>
            		<tr></tr>
					<tr>
						<td>Full Name:</td>
						<td></td>
						<td align="right"><input type="text" name="username" id="username" onblur="nameSubmit()" required></td>
					</tr>
					<tr>
						<td>Address: </td>
						<td></td>
						<td align="right"><input type="text" name="address" id="address" onblur="addressSubmit()" required></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td></td>
						<td align="right"><input type="email" name="email" id="email" onblur="emailSubmit()" required></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td></td>
						<td align="right"><input type="password" name="pass1" id="pass1" onblur="pass1Submit()" required></td>
					</tr>

					<tr>
						<td>Date of Birth: </td>
						<td></td>
						<td align="right"><input type="date" style="width:167px" name="dob" id="dob" onblur="dobSubmit()" required></td>
					</tr>
					<tr>
						<td>Phone Number: </td>
						<td></td>
						<td align="right"><input type="text" name="phoneNo" id="phn" onblur="phoneNoSubmit()" required></td>
					</tr>
					<tr>
						<td>Profile Picture:</td>
						<td></td>
						<td align="right"><input type="file" name="pic" required></td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
						<td align="right"><input type="submit" name="register" value="Register"></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="3" align="center">
							<hr><a href="manager_home.php">Back to Homepage</a>	
						</td>
					</tr>

				</table>
		</fieldset>

		</form>

	<script type="text/javascript">

		function nameSubmit(){
			"use strict"

			var name = document.getElementById('username').value;
  			var words = name.split(' ');
  			var wordCount = words.length;
  			var canContain = " abcdefghijklmnopqrstuvwxyz.ABCDEFGHIJKLMNOPQRSTUVWXYZ-";      // range of characters for input
  			var nameL = name.length;
  			var temp = "";
  			var valid = false;

  			for(var i=0 ; i<nameL ; i++ ){                                                  // one by one input characters checking
  				temp = name.charAt(i);
  				var matchCheck = 0;

  				for(var j=0 ; j<canContain.length ; j++){
  					
  					if(temp == canContain.charAt(j)){
  						matchCheck = 1;
  					}
  				}

  				if(matchCheck == 1){
  					valid = true;
  				}else if(matchCheck == 0){
  					valid = false;
  					break;
  				}else{
  					window.alert("ERROR");
  				}
  			}

			if(name == "" || name == null){
				document.getElementById('msg').innerHTML = "Please enter your name.";
				/*window.alert("Please enter your name.");
				document.getElementById('msg').innerHTML = "Null submission";*/
			}else if(wordCount<2){
				document.getElementById('msg').innerHTML = "Name should be at least of 2 words.";
				/*window.alert("Name should be at least of 2 words.");
				document.getElementById('msg').innerHTML = "Name should be at least of 2 words.";*/
			}else if(!valid){
				document.getElementById('msg').innerHTML = "Type valid characters!";
				/*window.alert("Type valid characters!");
				document.getElementById('msg').innerHTML = "Type valid characters!";*/
			}else{
				/*window.alert("Seems Ok");
				window.alert(wordCount);
				document.getElementById('msg').innerHTML = "Seems Ok";*/
			}

		}


		function emailSubmit(){
			"use strict";

			var email = document.getElementById('email').value;
			var atPosition = email.indexOf('@'); 
			var valid = false;

			if(atPosition>-1){                             // if @ exists continues
				if(email.includes('.',atPosition+3)){      // after @ checks '.' and domain name length (min 2)
					valid = true;
				}
			}
			

			if(email == "" || email == null){
				document.getElementById('msg').innerHTML = "Please type your email. ";
				//alert("Please type your email. ");
			}else if(!valid){
				document.getElementById('msg').innerHTML = "Type a valid email address. ";
				//alert("Type a valid email address. ");
			}
			else{

			}
		}

		function pass1Submit(){
			"use strict";
			var password1 = document.getElementById('pass1').value; 

			if(password1 == "" || password1 == null){
				document.getElementById('msg').innerHTML = "Please type a password. ";
				//alert("Please type a password. ");
			}else if(password1.length<6){
				document.getElementById('msg').innerHTML = "Password must be at least 6 characters in length. ";
				//alert("Password must be at least 6 characters in length. ");
			}
			else{
				 
			}
		}

		function addressSubmit(){
			"use strict";
			var address = document.getElementById('address').value;

			if(address == "" || address == null){
				document.getElementById('msg').innerHTML = "Please type your address. ";
				//alert("Please type your address. ");
			}else if(address.length<2){
				document.getElementById('msg').innerHTML = "Please enter a valid address. ";
				//alert("Please enter a valid address. ");
			}
			else{
				 
			}	
		}

		function dobSubmit(){
			var date = document.getElementById('dob').value;
			dmy = date.split('-');

			if(date == "" || date == null){
				document.getElementById('msg').innerHTML = "Please select your date of birth. ";

			}else if(dmy[0]>2002){
				document.getElementById('msg').innerHTML = "You have to be at least of 18 years old.";
				//alert(dmy[0]);
			}else{

			}
		}

		function phoneNoSubmit(){
			var phoneNo = document.getElementById('phn').value;
			var canContain = "- +0123456789()";                                             // range of characters for input
  			var numL = phoneNo.length;
  			var temp = "";
  			var valid = false;

  			for(var i=0 ; i<numL ; i++ ){                                                  // one by one input characters checking
  				temp = phoneNo.charAt(i);
  				var matchCheck = 0;

  				for(var j=0 ; j<canContain.length ; j++){
  					
  					if(temp == canContain.charAt(j)){
  						matchCheck = 1;
  					}
  				}

  				if(matchCheck == 1){
  					valid = true;
  				}else if(matchCheck == 0){
  					valid = false;
  					break;
  				}else{
  					window.alert("ERROR");
  				}
  			}


			if(phoneNo == "" || phoneNo == null){
				document.getElementById('msg').innerHTML = "Please type your phone number.";
			}else if(phoneNo.length<8 || phoneNo.length>16){
				document.getElementById('msg').innerHTML = "Please type a valid phone number.";
				//alert(dmy[0]);
			}else if(!valid){
				document.getElementById('msg').innerHTML = "Please type a valid phone number.";
			}else{

			}
		}


		
/*		function ajax(){
			var name = document.getElementById("name").value;

			var xhttp = new XMLHttpRequest();	
			xhttp.onreadystatechange = function() {

			    if (this.readyState == 4 && this.status == 200){
			    	document.getElementById("abc").innerHTML = this.responseText;
			    }
			};
			
			//xhttp.open("GET", "abc.php?name="+name, true);
			xhttp.open("POST", "abc.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("name="+name); 
		}*/

	</script>

</body>
</html>