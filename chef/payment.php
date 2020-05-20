
<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  $userId=$_SESSION['user']['user_id'];
  $result = chefpi($userId);
?>
<!DOCTYPE html>
<html>
<head>
  <title> Withdraw Tip Amounts</title>
</head>
<style media="screen">
body{
  margin: 0;
  padding:0;
  box-sizing: border-box;

}

.button {
background-color: white; /* Green */
border: none;
color: white;
padding: 10px 28px;
text-align: center;
display: inline-block;
cursor: pointer;
border-radius: 2rem;
}

.green {background-color: #4CAF50;} /* green */
.green:hover{
  color: #4CAF50;
  background-color: white;
  font-style: oblique;
  border: 2px solid #4CAF50;
}
.black {background-color: #000000;} /* black */
.black:hover{
  color: #000000;
  background-color: white;
  font-style: oblique;
  border: 2px solid #000000;
}

.pform{
  position: absolute;
  display: flex;
  flex-direction: column;
  align-items: center;
  top: 14vh;
  left: 70vh;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin: 0;
}
.fs{
  padding: 40px 130px 40px;
  border-color: #4CAF50;
}
</style>
<body>

<div class="pform">
  <fieldset class="fs" >
  <form method="post" action="../../php/chef/tipAmount.php"><h4>

            <table align="center">
                <tr>
                  <td align="center">Withdraw Tip Amounts</td>
                </tr>
                <tr>
                  <td><hr><hr /></td>
                </tr>

                <tr>
                  <td align="center">hi! <?=$result['name']; ?></td>
                </tr>
                <tr>
                  <td><hr></td>
                </tr>
                <tr>
                    <td><br /></td>
                </tr>
                <tr>
                  <td align="center">Current Tip Balance</td>
                </tr>
                <tr>
                  <td align="center">
                    <?= $result['tip_amount']?>TK
                  </td>
                </tr>
                <tr>
                    <td><br /></td>
                </tr>
                <tr>
                  <td align="center">Amount Withdraw</td>
                </tr>
                <tr>
                  <td align="center">
                    <input type="number" name="requestAmount" value="">
                  </td>
                </tr>
                <tr>
                    <td><br /></td>
                </tr>
                <tr>
                  <td align="center"><input class="green button" type="submit" name="Confirm" value="Confirm"></td>
                </tr>
                <tr>
                  <td align="center"><a href="chef.php"><input class="black button" type="button" name="Back" value="Back"></a></td>
                </tr>

            </table>

          </form>
  </fieldset>
</div>

</body>
</html>
