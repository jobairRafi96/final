<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<body>
	<form method="POST" action="data.php">
			<table align="">
				<tr>
					<td colspan="3" align="center"><h1>Registration</h1></td>
				</tr>
				<tr>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>User Name</td>
					<td>:</td>
					<td><input type="text" name="uname" value="" size="40" placeholder="Name"></td>
				</tr>
				<tr>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="Password" name="pass" value="" size="40" placeholder="Password"></td>
				</tr>
				<tr>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td>:</td>
					<td><input type="Password" name="cpass" value="" size="40" placeholder="Confirm Password"></td>
				</tr>
				<tr>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="3" align="right"><input type="submit" name="submit" value="Sign UP"> <a href="login.php">Sign In</a></td>
				</tr>
				<tr>
             <td colspan="9" align="center">
                <a href="home.php">Goto Homepage</a></br>
             </td>
      </tr>
			</table>
	</form>
</body>
</html>