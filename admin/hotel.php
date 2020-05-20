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
        <tr> 
        <td align="center"><img src="add.png" height="50px" width="50px"> </td>

        <td align="center"><img src="remove.png" height="50px" width="50px"> </td>

        <td align="center"><img src="discount.png" height="70px" width="60px"> </td>
        <td align="center"><img src="hotellist.png" height="50px" width="50px"> </td>
    </tr>   
        <tr></br>
            <td>
                <a href="add_hotel.php"><input type="button" name="" value="Add Hotel"></br></br></a>
            </td>
            
            <td>
                <a href="remove_hotel.php"><input type="button" name="" value="Remove hotel"></br></br></a>
            </td>
            <td>
                <a href="discount.php"><input type="button" name="" value="Discount hotel"></br></br></a>
            </td>
            <td>
                 <a href="hotel_list.php"><input type="button" name="" value="Hotel List"></br></br></a>
            </td>
        </tr>
        <tr>
                <td align="center"></br>
                    <a href="pay.php"> <input type="button" name="" value="Add funds to hotels"></br></br></a>
                </td>
        </tr>
        <tr>
            <td></td>
            <td align="center"></br></br>
               <a href="home.php">Goto Home</a></br>
            </td>
        </tr>

    </table>
    </center>
    </fieldset>
    </form>
</body>
</html>