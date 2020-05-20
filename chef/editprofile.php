<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<style media="screen">
  body{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  .button {
  background-color: #f79071; /* Green */
  border: none;
  color: white;
  padding: 10px 28px;
  text-align: center;
  display: inline-block;
  cursor: pointer;
  border-radius: 2rem;
  margin-top: 10px;
  }

  .green {background-color: #4CAF50;} /* green */
  .green:hover{
    color: #4CAF50;
    background-color: white;
    font-style: oblique;
    border: 2px solid #4CAF50;
  }
  .errorMsg,.resMsg{
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f5a7a7;
    border: 2px solid #f44336;
    border-radius: 2rem;
    color: white;
    font-family: fantasy;
    width: 100vh;
    height: 50px;
    font-size: 1rem;
    left: 24vw;
    top: 35vw;
  }
  .seMsg{
    background-color: #f5a7a7;
    border: 2px solid #f44336;
    border-radius: 2rem;
    color: white;
    font-family: fantasy;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100vh;
    height: 50px;

  }
  .resMsg{
    background-color: #cceabb;
    border: 2px solid #4CAF50;
  }
  .edit{
    padding: 2px;
    font-size: 18px;
  }
  .edit:hover{
    color: #f79071;
    background-color: white;
    font-style: oblique;
    border: 1px solid #f79071;
  }
</style>
<body>

	<table align="center">
		<tr>
			<td><a href="profile.php"><img src="pic/back.png" width="40px" height="40px"></a></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td><h1>Profile</h1></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td  align="right"><a href="chef.php"><img src="pic/home.png" width="50px" height="50px" align="center"></a></td>
		</tr>
	</table>
	<hr>
	<hr>

<fieldset>
	<legend>Profile</legend>
  <div class="msg">
<!-- <h3>at least 5 character for password</h3> -->
  </div>

  <form id="editprofileValidation" action="../../php/chef/editcheck.php" method="post" enctype="multipart/form-data">
    <table align="center">

  		<tr>
  			<td>Profile Pic</td>
  			<td>:</td>
  			<td>
  				<input id="input1" type="file" name="mypic" value="">
  			</td>
        <td align="center"><input class="edit button" type="button"  value="edit" onclick="editAjax(1)"></td>
  		</tr>



  		<tr>
  			<td>Chef Name</td>
  			<td>:</td>
  			<!-- use chef name by session -->
  			<td><input id="input2" type="text" name="cname"  onblur="nValidate()" required></td>
        <td align="center"><input class="edit button" type="button" value="edit" onclick="editAjax(2)"></td>
  		</tr>

  		<tr>
  			<td>Password</td>
  			<td>:</td>
  			<td>
  				<input id="input3" type="Password" name="cpass" value="" onblur="passValidation()">
  			</td>
        <td align="center"><input class="edit button" type="button"  value="edit" onclick="editAjax(3)" ></td>
  		</tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input id="input4" type="text" name="cemail" value="" onblur="eValidate()" required>
        </td>
        <td align="center"><input class="edit button" type="button"  value="edit" onclick="editAjax(4)"></td>
      </tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input id="input5" type="text" name="cadd" value="" onblur="addValidation()">
        </td>
        <td align="center"><input class="edit button" type="button"  value="edit" onclick="editAjax(5)"></td>
      </tr>

      <tr>
        <td>Phone_no</td>
        <td>:</td>
        <td>
          <input id="input6" type="number" name="cphn" onblur="phoneValidation()">
        </td>
        <td align="center"><input class="edit button" type="button"  value="edit" onclick="editAjax(6)"></td>
      </tr>

      <tr>
        <td>DOB</td>
        <td>:</td>
        <td>
          <input id="input7" type="date" name="cdob" value="" onblur="dobValidation()">
        </td>
        <td><input class="edit button" type="button"  value="edit" onclick="editAjax(7)"></td>
      </tr>
      <tr>
        <td><br /></td>
      </tr>

  		<tr>
  			<td colspan="3" align="center"><input class="green button" type="button"  value="Done" onclick="editprofileValidation()"></td>
  		</tr>

  	</table>
  </form>

  <script charset="utf-8">
  //name validate
//edit name with ajex;
  function editAjax(id){
    var name=document.getElementById("input"+id).value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var msgDiv = document.querySelector(".msg");
        var msgDivclass = document.querySelector(".msg").classList;
        if (this.readyState == 4 && this.status == 200){
          msgDivclass.add("resMsg");
          msgDiv.innerHTML=this.responseText;
            // document.getElementById("input"+id).value="";
              setTimeout(function(){
                msgDivclass.remove("resMsg");
                msgDiv.innerHTML="";
              },2500);
        }
    };

    xhttp.open("GET", "../../php/chef/singleInputUpdate.php?Id="+id+"&value="+name, true);
    xhttp.send();
  }
  //edit with ajex/php end;


  //name validate start;
  function nValidate(){

    var name = document.getElementById('input2').value;
      var words = name.split(' ');
      var wordCount = words.length;
      var canContain = " abcdefghijklmnopqrstuvwxyz.ABCDEFGHIJKLMNOPQRSTUVWXYZ-";
      var nameL = name.length;
      var temp = "";
      var valid = false;

      for(var i=0 ; i<nameL ; i++ ){
        temp = name.charAt(i);
        var matchCheck = 0;

        for(var j=0 ; j<canContain.length ; j++){

          if(temp == canContain.charAt(j)){
            matchCheck = 1;
          }
        }

        if(matchCheck == 1){
          valid = true;
        }else if(matchCheck == 0){
          valid = false;
          break;
        }else{
          window.alert("ERROR");
        }
      }
      var msgDiv = document.querySelector(".msg");
      var msgDivclass = document.querySelector(".msg").classList;
    if(!name){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Empty Name fields</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;
    }else if(wordCount<2){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Name should be at least of 2 words.</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;
    }else if(!valid){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Type valid characters!</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;
    }else{
      //ok
    }
  }
  //name validate end


  //email validation start
  function eValidate(){

    var email = document.getElementById('input4').value;
    var atPosition = email.indexOf('@');
    var valid = false;

    if(atPosition>-1){                             // if @ exists continues
      if(email.includes('.',atPosition+3)){      // after @ checks '.' and domain name length (min 2)
        valid = true;
      }
    }
      //errormsg class
      var msgDiv = document.querySelector(".msg");
      var msgDivclass = document.querySelector(".msg").classList;

    if(!email){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Empty Email fields</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;
    }else if(!valid){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Type valid Email !</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;
    }
    else{

    }
  }
  //email validation end

  //pass validation start

  function passValidation(){

    var password = document.getElementById('input3').value;
    //errormsg class
    var msgDiv = document.querySelector(".msg");
    var msgDivclass = document.querySelector(".msg").classList;
    if(!password){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Empty password fields</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;
    }else if(password.length<6){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Password must be at least 6 characters</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;

    }
    else{
//ok
    }
  }
  //pass validation end

  //address validate start
  function addValidation(){

    var address = document.getElementById('input5').value;
    //errormsg class
    var msgDiv = document.querySelector(".msg");
    var msgDivclass = document.querySelector(".msg").classList;

    if(!address){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Empty Address Fields</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;
    }else if(address.length<2){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Need at least 2 character</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;
    }
    else{

    }
  }
  //address validate end

  //phone validate start
  function phoneValidation(){
    var phoneNo = document.getElementById('input6').value;
    //errormsg class
    var msgDiv = document.querySelector(".msg");
    var msgDivclass = document.querySelector(".msg").classList;
			if(!phoneNo){
        msgDivclass.add("errorMsg");
        msgDiv.innerHTML="<h2>Empty Phone Fields</h2>";

            setTimeout(function(){
              msgDivclass.remove("errorMsg");
              msgDiv.innerHTML="";
            },2500);

        return false;
			}else if(phoneNo.length!=11){
        msgDivclass.add("errorMsg");
        msgDiv.innerHTML="<h2>Invalid Phone No</h2>";

            setTimeout(function(){
              msgDivclass.remove("errorMsg");
              msgDiv.innerHTML="";
            },2500);

        return false;
			}else{
          //ok
			}

  }
  //phone validate end

  //date validate start
  function dobValidation(){
    var date = document.getElementById('input7').value;
    dmy = date.split('-');
    var msgDiv = document.querySelector(".msg");
    var msgDivclass = document.querySelector(".msg").classList;

    if(date == "" || date == null){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Empty Date Field</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;

    }else if(dmy[0]>2002){
      msgDivclass.add("errorMsg");
      msgDiv.innerHTML="<h2>Your are not adult</h2>";

          setTimeout(function(){
            msgDivclass.remove("errorMsg");
            msgDiv.innerHTML="";
          },2500);

      return false;
    }else{

    }
  }
  //date validate end
  //profile pic validation start
  //profile pic validation end

//full form validation;
  function editprofileValidation(){
    var name = document.getElementById("input2").value;
    var pass = document.getElementById("input3").value;
    var email = document.getElementById("input4").value;
    var phn = document.getElementById("input6").value;
    var dob = document.getElementById("input7").value;
    var add = document.getElementById("input5").value;
    var mypic = document.getElementById("input1").value;

    var msgDiv = document.querySelector(".msg");
    var msgDivclass = document.querySelector(".msg").classList;
        if (name=="" || pass =="" || email =="" || phn =="" || dob =="" || add =="" || !mypic) {
            msgDivclass.add("errorMsg");
            msgDiv.innerHTML="<h2>Empty fields</h2>";

                setTimeout(function(){
                  msgDivclass.remove("errorMsg");
                  msgDiv.innerHTML="";
                },2500);

            return false;
        } else {
            document.getElementById("editprofileValidation").submit();
        }
      }
//full form validation;

  </script>


</body>
</html>
