
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
    <title>admin Home Page</title>
</head>
<body>
    <h1 align="center">Welcome Admin</h1>


    <form>
        <center>
    <fieldset style="width: 350px">
        <legend>Admin access</legend>
    <table align="center">
        
        <tr></br>
            <td align="center">
                <a href="add_manager.php"> <input type="button" name="" value="Add manager"> </br></br> </a>
            </td>
            
            <td align="center">
                <a href="delete_manager.php"><input type="button" name="" value="Delete manager"></br></br></a>
            </td>
        </tr>
        
        <tr>
              <td align="center">
               <a href="assign.php"> <input type="button" name="" value="Assign manager"></a>
             </td>
             <td>
               <a href="manager_list.php"><input type="button" name="" value="Manager List"></a>
             </td>
        </tr>
        <tr>
            <td></br></td>
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

