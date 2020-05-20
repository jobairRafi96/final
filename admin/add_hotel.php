<?php
    session_start();
    require('../../service/db.php');

//if session was destroy in log out page we need to do login again.
    if (!isset($_SESSION['admin'])) {
        header("location: Login.php");
    }

    if(isset($_REQUEST['add']))
    {
        $mid = 1;
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phoneNo = $_POST['phoneNo'];
        $avg_rating = 0;
        $discount = 0;
        $fund = 0;

        $filename = $_FILES['mypic']['name'];
        $dbDest = $filename;
        $dest = "../hotel/".$filename;
        $src = $_FILES['mypic']['tmp_name'];

        if(move_uploaded_file($src, $dest)){
            echo "File Uploaded.";
        }else{
            echo "File Upload Error!";
        }




        $con = getConnection();
        $sql = "insert into hotel values('','{$mid}','{$name}', '{$address}','{$phoneNo}','{$dbDest}', '{$avg_rating}','{$discount}','{$fund}')";
        $result = mysqli_query($con, $sql);

        if(mysqli_affected_rows($con)){
            $alert = "hotel added";
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
    <title></title>
</head>
<body>
    <h1 align="center">Give Hotel informations</h1>


    <form action="" method="POST" enctype="multipart/form-data">
        <center>
    <fieldset style="width: 500px">
        <legend>Add New Hotel</legend>
                <table>

                    <tr>
                        <td align="center" colspan="3">
                           
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>Hotel Name:</td>
                        <td></td>
                        <td align="right"><input type="text" name="name"  required></td>
                    </tr>

                    <tr>
                        <td>Address: </td>
                        <td></td>
                        <td align="right"><input type="text" name="address"  required></td>
                    </tr>
                    <tr>
                        <td>Phone Number: </td>
                        <td></td>
                        <td align="right"><input type="text" name="phoneNo"  required></td>
                    </tr>
                    <tr>
                        <td>Picture:</td>
                        <td></td>
                        <td align="right"><input type="file" name="mypic" required></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td align="right"><input type="submit" name="add" value="Add Hotel" ></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4">                        
                            </br><a href="home.php">Goto Home</a>
                        </td>
                    </tr>
                </table>
    </fieldset>
    </form>
</body>
</html>