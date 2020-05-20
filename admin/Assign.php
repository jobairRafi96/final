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
    <h1>Give information</h1>


    <form>
    <fieldset style="width: 350px">
        <legend>Assign manager to hotel</legend>
    <table align="center">
        <tr>
            <td>ID: </td>
            <td><input type="number" name="" value=""/></td>
        </tr>
        <tr>
            <td>Assigning In:</td>
            <td>
                <select>
                    <option>Hotel 1</option>
                    <option>Hotel 2</option>
                    <option>Hotel 3</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>

            <td></br>
                <input type="submit" name="" value="Submit">
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