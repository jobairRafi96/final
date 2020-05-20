<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  // session data from database
  $id = $_GET['Id'];
  $value= $_GET['value'];

  if ($id==2) {
          if ($value=="") {
            echo "<h2 class='seMsg'>Null submission</h2>";
          }else{
            $cid=$_SESSION['chefpi']['chef_id'];
            $result = editPIname($value,$cid);
            if ($result) {
              echo "<h2>Edit Succesfull</h2>";
            }else{
              echo "<h2 class='seMsg'>Problem with updating try again</h2>";
            }
          }
  }elseif ($id==4) {
            if ($value == "") {
                echo "<h2 class='seMsg'>Null submission</h2>";
            }else {
                $cid=$_SESSION['chefpi']['chef_id'];
                $result = editPIemail($value,$cid);
                if ($result) {
                  echo "<h2>Edit Succesfull</h2>";
                }else{
                  echo "<h2 class='seMsg'>Problem with updating try again</h2>";
                }
            }

  }elseif ($id==5) {
          if ($value == "") {
                echo "<h2 class='seMsg'>Null submission</h2>";
          }else{
                $cid=$_SESSION['chefpi']['chef_id'];
                $result = editPIadd($value,$cid);
                if ($result) {
                  echo "<h2>Edit Succesfull</h2>";
                }else{
                  echo "<h2 class='seMsg'>Problem with updating try again</h2>";
                }
          }

  }elseif ($id==6) {
          if ($value == "") {
                echo "<h2 class='seMsg'>Null submission</h2>";
          }else{
                $cid=$_SESSION['chefpi']['chef_id'];
                $result = editPIphone($value,$cid);
                if ($result) {
                  echo "<h2>Edit Succesfull</h2>";
                }else{
                  echo "<h2 class='seMsg'>Problem with updating try again</h2>";
                }
          }

  }elseif ($id==1) {


          $pic = explode ("\\", $value);
          $ex = explode(".", $value);


          if ($value=="") {
                    echo "<h2 class='seMsg'>Null submission</h2>";
          }elseif ($ex[1]=="gif"||$ex[1]=="png" || $ex[1]=="jpg") {
                    $cid=$_SESSION['chefpi']['chef_id'];
                    $pic = explode ("\\", $value);

                    //profile pic
                    $filename = $pic[2];
                    $dest = "../upload/".$filename;
                    $pp1= $dest;
                    $result = editPIpic($pp1,$cid);

                      if ($result) {
                          echo "<h2>Edit Succesfull</h2>";
                      }else{
                          echo "<h2 class='seMsg'>Problem with updating try again</h2>";
                      }
                  }
          else{
                  echo "File Not Support";
            }
  }elseif ($id==3) {
          if ($value=="") {
              echo"<h2 class='seMsg'>Null submission</h2>";
          }else{
              $uid=$_SESSION['chefpi']['user_id'];
              $result = editPasswordsingle($value,$uid);
              if ($result) {
                echo "<h2>Edit Succesfull</h2>";
              }else{
                echo "<h2 class='seMsg'>Problem with updating try again</h2>";
              }
          }

  }elseif ($id==7) {
          if ($value=="") {
              echo"<h2 class='seMsg'>Null submission</h2>";
          }else{
              $cid=$_SESSION['chefpi']['chef_id'];
              $result = editPIdob($value,$cid);
              if ($result) {
                echo "<h2>Edit Succesfull</h2>";
              }else{
                echo "<h2 class='seMsg'>Problem with updating try again</h2>";
              }
          }

  }
  else{
    echo"test";
  }

?>
