<?php   
    session_start();
    include('../../service/functions.php');
    //require('../../service/db.php');

    if(!isset($_SESSION['admin'])){  
        header("location: Login.php");
    }

    if(isset($_REQUEST['remove']))
    {
        $hotel_id = $_POST['hotel_id'];
        $success = deleteHotel($hotel_id);


        if($success){
            $alert = "Delete Successful.";
            echo $alert;
        }else{
            $alert = "Delete failed!";
            echo $alert;
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Remove Hotel</title>
</head>
<body>
        <form action="" method="POST">
            <fieldset style="width:100%">
            <legend>Remove Hotel</legend>
                <table border="0" align="center" align="center" cellspacing="20" cellpadding=”10″>
                    <tr>
                        <td colspan="2" align="center">

                        </td>
                    </tr>
                    <tr>
                        <td>Hotel id: </td>
                        <td><input type="num" name="hotel_id" required></td>
                    </tr>
        
                    <tr>
                        <td></td>
                        <td align="right"><input type="submit" name="remove" value="Remove"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align="center">
                            <hr><a href="home.php">Home Page</a></br>
                        </td>
                    </tr>
                </table>
            </fieldset> 

        </form>

</body>
</html>