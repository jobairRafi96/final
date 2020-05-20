<?php
    session_start();
//if session was destroy in log out page we need to do login again.
    if (!isset($_SESSION['uname'])) {
        header("location: Login.php");
    }


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Assign manager</h1>


    <form>
    <fieldset style="width: 350px">
        <legend>Manager assigning</legend>
    <table align="center">
        <tr>
            <td>Assigning In:</td>
            <td>
                <input type="checkbox" name="">Hotel 1
                <input type="checkbox" name="">Hotel 2
                <input type="checkbox" name="">Hotel 3
            </td>
        </tr>
        <tr>
            <td>ID: </td>
            <td><input type="number" name="" value=""/></td>
        </tr>
        <tr>
            <td></td>
            <td></br>
                <input type="submit" name="" value="Search">
              
            </td>
        </tr>
        <tr>
             <td colspan="9" align="center">
                <a href="home.php">Goto Homepage</a></br>
             </td>
      </tr>
    </table>
    </body>

</html>