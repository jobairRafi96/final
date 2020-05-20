<!DOCTYPE html>
<html>
<head>
	<title>Admin pannel</title>
</head>
<body>
	<h1>Admin?</h1>


	<form method="POST" action="../../php/loginCheckAdmin.php">
		<fieldset style="width: 350px">
			<legend>Login</legend>
		<table align="center">
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" value="" size="" required /></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td> <input type="password" name="password" required /></td>
			</tr>

			<tr>
				<td></td>
				<td>
					
					<input type="submit" name="login" value="Submit"> 
					
					
				</td>
			</tr>

		</fieldset>
	</form>


	</body>
</html>