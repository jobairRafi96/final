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
    <h1 align="center">Guests information</h1>


    <form>
        <center>
    <fieldset style="width: 350px">
        <legend>Guest</legend>
    <table align="center">

        <tr>
            <td>
                <a href="guest_info.php"><input type="button" name="" value="Guest's information"></a>
            </td>
            
            <td>
                <a href="guest_feedback.php"><input type="button" name="" value="Guest's Feedbacks"></a>
              
            </td>
        </tr>
        <tr>
             <td colspan="9" align="center">
                <a href="home.php">Goto Homepage</a></br>
             </td>
      </tr>
    </table>
    </center>
    </fieldset>
    </form>
</body>
</html>