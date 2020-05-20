<?php
    session_start();
    include('../../service/functions.php');

    if(!isset($_SESSION['admin'])){  
        header("location: Login.php");
    }

    if(isset($_REQUEST['add']))
    {
        $hotel_id = $_POST['hotel_id'];
        $fund = $_POST['fund'];

        $success = addHotelFund($hotel_id, $fund);


        if($success){
            $alert = "Fund added";
            echo $alert;
        }else{
            $alert = "failed!";
            echo $alert;
        }
    }

?>





<!DOCTYPE html>
<html>
<head>
    <title>Add Funds</title>
</head>
<body>
        <form action="" method="POST">
            <fieldset style="width:100%">
            <legend>Add Funds</legend>
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
                        <td>Fund Amouont: </td>
                        <td><input type="num" name="fund" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><input type="submit" name="add" value="Add"></td>
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