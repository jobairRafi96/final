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
    <h1 align="center">Previews</h1>


    <form>
        <center>
        <fieldset style="width: 350px">
        <legend>Guest and Manager preview</legend>

    <table align="center">

        <tr>
            <td>
                <a href="guest_preview.php"><input type="button" name="" value="Guest Previews"></a>
            </td>
            
            <td>
                <a href="manager_preview.php"><input type="button" name="" value="Manager Previews"></a>
              
            </td>
        </tr>
    </table>
    </center>
</fieldset>
    </form>
</body>
</html>