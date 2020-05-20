<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  $service1="Room Service";
  $service2="Table Service";
  $service3="Call Service Boy";
  $service3="Extra Hand";
  $uid=$_SESSION['user']['user_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Service</title>
</head>
<style media="screen">
      .button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: .5rem;
      }
      .button:hover{
        color: #4CAF50;
        background-color: #cceabb;
        font-style: oblique;
        border: 1px solid #4CAF50;
        font-size: 18px;
      }
      .blue {background-color: #008CBA;} /* Blue */
      .blue:hover{
        color: #008CBA;
        background-color: white;
        font-style: oblique;
        border: 5px solid #008CBA;
        font-size: 18px;
      }
      .yellow {background-color: #ffb367;} /* Blue */
      .yellow:hover{
        color: #ffb367;
        background-color: white;
        font-style: oblique;
        border: 5px solid #ffb367;
        font-size: 18px;
      }
    </style>
<body>
	<table align="center">
		<tr>
			<td><a href="chef.php"><img src="pic/back.png" width="40px" height="40px"></a></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td><h1>Service</h1></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td  align="right"><a href="chef.php"><img src="pic/home.png" width="50px" height="50px" align="center"></a></td>
		</tr>
	</table>
	<hr>
	<hr>
<?php $s1=1; ?>
<?php $s2=1; ?>
<?php $s3=1; ?>
<?php $s4=1; ?>

	<table align="center">
    <!-- roomservice -->
    <?php // TODO: checked data may changed in future ?>
<?php $sresult = serviceCheck($uid); ?>
<?php	while($row = mysqli_fetch_assoc($sresult)){ ?>
          <?php if ($row['service_name']=="Room Service" && $row['checked']=="0"){ ?>
                  <tr>
                      <td ><img src="pic/service.png" width="100px" height="100px"></td>
                        <td align="left"><input class="button blue"  type="button" name="Room Service" value="Already sent"></td>
                        <td colspan="2"></td>
                       <td colspan="2"></td>
                 </tr>
                 <?php $GLOBALS['s1']=0; ?>
                 <?php break; ?>
          <?php }?>
<?php } ?>
      <?php if ($GLOBALS['s1']==1) { ?>
              <tr>
                  <td ><img src="pic/service.png" width="100px" height="100px"></td>
                    <td align="left"><input class="button s1"  type="button" name="Room Service" value="Room Service" onclick="service(1)"></td>
                    <td colspan="2"></td>
                   <td colspan="2"></td>
              </tr>
      <?php } ?>
<!-- roomserviceend -->
<!-- tableservice -->
<?php $sresult = serviceCheck($uid); ?>
<?php	while($row = mysqli_fetch_assoc($sresult)){ ?>
          <?php if ($row['service_name']=="Table Service" && $row['checked']=="0"){ ?>
            <tr>
              <td colspan="2"></td>
              <td align="left"><input class="button blue"  type="button" name="Table Service" value="Already sent"></td>
              <td ><img src="pic/service.png" width="100px" height="100px"></td>

              <td colspan="2"></td>
            </tr>
                 <?php $GLOBALS['s2']=0; ?>
                 <?php break; ?>
          <?php }?>
<?php } ?>
      <?php if ($GLOBALS['s2']==1) { ?>
        <tr>
          <td colspan="2"></td>
          <td align="left"><input class="button s2"  type="button" name="Table Service" value="Table Service" onclick="service(2)"></td>
          <td ><img src="pic/service.png" width="100px" height="100px"></td>

          <td colspan="2"></td>
        </tr>
      <?php } ?>
<!-- tableserviceend -->
<!-- call service Boy -->
<?php $sresult = serviceCheck($uid); ?>
<?php	while($row = mysqli_fetch_assoc($sresult)){ ?>
          <?php if ($row['service_name']=="Call service Boy" && $row['checked']=="0"){ ?>
            <tr>
        			<td ><img src="pic/service.png" width="100px" height="100px"></td>
        			<td align="left"><input class="button blue" class="Boy" type="button" name="Call service Boy" value="Already sent"></td>
        			<td colspan="2"></td>
              <td colspan="2"></td>
        		</tr>
                 <?php $GLOBALS['s3']=0; ?>
                 <?php break; ?>
          <?php }?>
<?php } ?>
      <?php if ($GLOBALS['s3']==1) { ?>
          <tr>
      			<td ><img src="pic/service.png" width="100px" height="100px"></td>
      			<td align="left"><input class="button s3" class="Boy" type="button" name="Call service Boy" value="Call service Boy" onclick="service(3)"></td>
      			<td colspan="2"></td>
            <td colspan="2"></td>
      		</tr>
      <?php } ?>
<!-- call service Boyend -->
<!-- Extra hand -->
<?php $sresult = serviceCheck($uid); ?>
<?php	while($row = mysqli_fetch_assoc($sresult)){ ?>
          <?php if ($row['service_name']=="Extra Hand" && $row['checked']=="0"){ ?>
            <tr>
              <td colspan="2"></td>
              <td align="left"><input class="button blue" id="hand" type="button" name="Extra Hand" value="Already sent"></td>
              <td ><img src="pic/service.png" width="100px" height="100px"></td>
              <td colspan="2"></td>
            </tr>
                 <?php $GLOBALS['s4']=0; ?>
                 <?php break; ?>
          <?php }?>
<?php } ?>
      <?php if ($GLOBALS['s4']==1) { ?>
        <tr>
          <td colspan="2"></td>
          <td align="left"><input class="button s4" id="hand" type="button" name="Extra Hand" value="Extra Hand" onclick="service(4)"></td>
          <td ><img src="pic/service.png" width="100px" height="100px"></td>
          <td colspan="2"></td>
        </tr>
      <?php } ?>
<!-- extra hamd end -->






	</table>

  <script type="text/javascript">

  function service(s){
    var service =document.querySelector(".s"+s).value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200){

            document.querySelector(".s"+s).value=this.responseText;
            document.querySelector(".s"+s).classList.add("yellow");
            document.querySelector(".s"+s).disabled = true;

        }
    };

    xhttp.open("GET", "../../php/chef/serviceRequest.php?serviceName="+service, true);
    xhttp.send();
  }

  </script>

</body>
</html>
