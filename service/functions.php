<?php

	require('db.php');

	function validateLogin($email, $password){

		$con = getConnection();
		$sql = "select * from user where email='{$email}' and password='{$password}'";
		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}

	function validateAdminLogin($email, $password){

		$con = getConnection();
		$sql = "select * from adminpi where email='{$email}' and pass='{$password}'";
		$result = mysqli_query($con, $sql);
		$admin = mysqli_fetch_assoc($result);

		return $admin;
	}

	function addHotelFund($hotel_id, $fund){
		$con = getConnection();
		$success = false;

		$sql = "UPDATE hotel SET fund='{$fund}' WHERE hotel_id ='{$hotel_id}'";
		mysqli_query($con, $sql);
		$success = mysqli_affected_rows($con);

		return $success;
	}

	function addHotelDiscount($hotel_id, $discount){
		$con = getConnection();
		$success = false;

		$sql = "UPDATE hotel SET discount='{$discount}' WHERE hotel_id ='{$hotel_id}'";
		mysqli_query($con, $sql);
		$success = mysqli_affected_rows($con);

		return $success;
	}

	function deleteHotel($hotel_id){
		$con = getConnection();
		$success = false;

		$sql = "DELETE FROM hotel WHERE hotel_id = '{$hotel_id}'";
		mysqli_query($con, $sql);
		$success = mysqli_affected_rows($con);

		return $success;
	}

	function deleteChefAndUser($chef_id){
		$con = getConnection();
		$success = false;
		$userId = getUserIdByByChefId($chef_id);

		$sql = "DELETE FROM chefpi WHERE chef_id = '{$chef_id}'";
		mysqli_query($con, $sql);
		$success = mysqli_affected_rows($con);

		$sql = "DELETE FROM user WHERE user_id = '{$userId}'";
		mysqli_query($con, $sql);
		$success = mysqli_affected_rows($con);

		return $success;
	}

	function getUserIdByByChefId($chef_id){
		$con = getConnection();
		$sql = "select user_id FROM chefpi WHERE chef_id = $chef_id";
		$result = mysqli_query($con, $sql);
		$chefpi = mysqli_fetch_assoc($result);
		$userId = $chefpi['user_id'];

		return $userId;
	}

	function getChefListByManagerId($manager_id){
		$con = getConnection();
		$sql = "select * from chefpi where manager_id = '{$manager_id}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function getFundValue($hotel_id){
		$con = getConnection();
		$sql = "select fund from hotel where hotel_id='{$hotel_id}'";
		$result = mysqli_query($con, $sql);
		$fund = mysqli_fetch_assoc($result);

		return $fund;
	}

	function getRoomsNotAvailable($hotel_id){
		$con = getConnection();
		$sql = "select * from room where available = 'false' and hotel_id='{$hotel_id}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function getVacantRooms($hotel_id){
		$con = getConnection();
		$sql = "select * from room where available = '1' and hotel_id='{$hotel_id}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function getUserDataById($userId){
		$con = getConnection();
		$sql = "select * from user where user_id='{$userId}'";
		$result = mysqli_query($con, $sql);
		$userRow = mysqli_fetch_assoc($result);

		return $userRow;
	}

	function getGuestDataByGuestId($guestId){
		$con = getConnection();
		$sql = "select * from guestpi where guest_id='{$guestId}'";
		$result = mysqli_query($con, $sql);
		$guestRow = mysqli_fetch_assoc($result);

		return $guestRow;
	}

	function getGuestDataByUserId($userId){
		$con = getConnection();
		$sql = "select * from guestpi where user_id='{$userId}'";
		$result = mysqli_query($con, $sql);
		$guestRow = mysqli_fetch_assoc($result);

		return $guestRow;
	}

	function getChefDataByUserId($userId){
		$con = getConnection();
		$sql = "select * from chefpi where user_id='{$userId}'";
		$result = mysqli_query($con, $sql);
		$chefRow = mysqli_fetch_assoc($result);

		return $chefRow;
	}

	function getGroceryRowById($orderId){
		$con = getConnection();
		$sql = "select * from grocery where grocery_orderid = '{$orderId}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}


	function getGroceryList(){
		$con = getConnection();
		$sql = "select * from grocery where checked = 'false'";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function getServiceList(){
		$con = getConnection();
		$sql = "select * from service where checked = 'false'";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function getComplainList(){
		$con = getConnection();
		$sql = "select * from complain where checked = 'false'";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function getAdminInfo(){
		$con = getConnection();
		$sql = "select * from adminpi where admin_id='1'";
		$result = mysqli_query($con, $sql);
		$admin = mysqli_fetch_assoc($result);

		return $admin;
	}

	function getManagerInfo($user_id){
		$con = getConnection();
		$sql = "select * from managerpi where user_id='{$user_id}'";
		$result = mysqli_query($con, $sql);
		$manager = mysqli_fetch_assoc($result);

		return $manager;
	}

	function getAllManagerInfo(){
		$con = getConnection();
		$sql = "select * from managerpi ";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function getAllHotelInfo(){
		$con = getConnection();
		$sql = "select * from hotel ";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function getHotelInfo($manager_id){
		$con = getConnection();
		$sql = "select * from hotel where manager_id='{$manager_id}'";
		$result = mysqli_query($con, $sql);
		$hotel = mysqli_fetch_assoc($result);

		return $hotel;
	}

	function getVerifiedGuestList(){
		$con = getConnection();
		$sql = "select * from guestpi where verified= 'true'";
		$result = mysqli_query($con, $sql);
		//$list = mysqli_fetch_assoc($result);

		return $result;
	}


	function getAllUsers(){
		$con = getConnection();
		$sql = "select * from users";
		$result = mysqli_query($con, $sql);
		return $result;
	}


	function deleteUser($id){
		$con = getConnection();
		$sql = "DELETE FROM users WHERE id = $id";
		$result = mysqli_query($con, $sql);
		return $result;
	}


	function updateUserData($sql){
		$con = getConnection();
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function updateUserData1($username, $password, $email, $type){
		$con = getConnection();
		$sql ="UPDATE users SET username='{$username}', password='{$password}', email='{$email}', type='{$type}'' WHERE id='{$GLOBALS['id']}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function userregi($email,$pass,$type){
		$con = getConnection();
		$sql = "insert into user values('','{$email}','{$pass}','{$type}')";
    	$result = mysqli_query($con, $sql);

		return $result;
	}

	function guestregi($uid,$username,$email,$address,$date,$phoneNo){
		$con = getConnection();
		$sql = "insert into guestpi values('','{$uid}','{$username}','{$email}', '{$address}', '{$date}','{$phoneNo}','online','genaral','0','0','')";
    	$result = mysqli_query($con, $sql);


		return $result;
	}

	function userAll($email){
		$con = getConnection();
		$sql = "select * from user where email='{$email}'";
		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}


	//chef

	function validate($username, $password){

		$con = getConnection();
		$sql = "select * from user where email='{$username}' and password='{$password}'";
		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}

	function usertype($username){

		$con = getConnection();
		$sql = "select type from users where username='{$username}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}


	// function getAllUsers(){
	// 	$con = getConnection();
	// 	$sql = "select * from users";
	// 	$result = mysqli_query($con, $sql);
	// 	return $result;
	// }

  function getAllInfo(){
    $con = getConnection();
    $sql = "select * from chefpi";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    return $user;
  }

	function chefpi($id){

    $con = getConnection();
    $sql = "select * from chefpi where user_id='{$id}'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    return $user;
  }
	function chefpiTomng($mid){

    $con = getConnection();
    $sql = "select * from managerpi where manager_id='{$mid}'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    return $user;
  }

	function editPI($filename,$un,$em,$add,$dob,$phn,$id){

		$con = getConnection();
		$sql = "update chefpi set profile_pic = '{$filename}', name = '{$un}', email ='{$em}', address ='{$add}', dob ='{$dob}', phone_no ='{$phn}'  where chef_id='{$id}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}
	function editPIname($value,$cid){
		$con = getConnection();
		$sql = "update chefpi set  name = '{$value}' where chef_id='{$cid}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}
	function editPIemail($value,$cid){
		$con = getConnection();
		$sql = "update chefpi set  email = '{$value}' where chef_id='{$cid}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}
	function editPIadd($value,$cid){
		$con = getConnection();
		$sql = "update chefpi set  address = '{$value}' where chef_id='{$cid}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function editPIphone($value,$cid){
		$con = getConnection();
		$sql = "update chefpi set  phone_no = '{$value}' where chef_id='{$cid}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}
	function editPIdob($value,$cid){
		$con = getConnection();
		$sql = "update chefpi set  dob = '{$value}' where chef_id='{$cid}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}


	function editPassword($uid,$pass,$em){
		$con = getConnection();
		$sql = "update user set password = '{$pass}', email ='{$em}' where user_id='{$uid}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}
function	editPasswordsingle($value,$uid){
	$con = getConnection();
	$sql = "update user set password = '{$value}' where user_id='{$uid}'";
	$result = mysqli_query($con, $sql);

	return $result;
}
		function editPIpic($pp1,$cid){
			$con = getConnection();
			$sql = "update chefpi set profile_pic = '{$pp1}' where chef_id='{$cid}'";
			$result = mysqli_query($con, $sql);

			return $result;
		}

	function getAllorder(){
		$con = getConnection();
		$sql = "select * from orderlist";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function getAllorder1($sid){
		$con = getConnection();
		$sql = "select * from orderlist where serial_id='{$sid}'";
		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}


	function Guestpi($gid){
		$con = getConnection();
    $sql = "select * from guestpi where guest_id='{$gid}'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    return $user;
	}

	function item($iid){
		$con = getConnection();
    $sql = "select * from item where item_id='{$iid}'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    return $user;
	}

	function itemDlt($iname){
		$con = getConnection();
		$sql = "delete from item where item_name='{$iname}'";
    $result = mysqli_query($con, $sql);

    return $result;
	}

	function itemEdit($itemName,$itemPrice,$iname){
		$con = getConnection();
    $sql = "update item set item_name = '{$itemName}', price='{$itemPrice}' where item_name='{$iname}'";
    $result = mysqli_query($con, $sql);

    return $result;
	}

	function itemAdd($itemName,$itemQuantity,$itemPrice,$mid){
		$con = getConnection();
    $sql = "insert into item values('','{$itemName}','{$itemQuantity}','{$itemPrice}', '{$mid}')";
    $result = mysqli_query($con, $sql);

    return $result;
	}

	function getAllitem(){
		$con = getConnection();
		$sql = "select * from item";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function updateQuantityItem($newItemQuantity,$itemId){
		$con = getConnection();
    $sql = "update item set quantity = '{$newItemQuantity}' where item_id='{$itemId}'";
    $result = mysqli_query($con, $sql);

    return $result;
	}


	function orderCmp($sid){
		$comment = "complemented";
		$con = getConnection();
    $sql = "update orderlist set order_state = '{$comment}' where serial_id='{$sid}'";
    $result = mysqli_query($con, $sql);

    return $result;
	}

	function orderDone($sid){
		$comment = "Done";
		$con = getConnection();
    $sql = "update orderlist set order_state = '{$comment}' where serial_id='{$sid}'";
    $result = mysqli_query($con, $sql);

    return $result;
	}

	function orderDlt($sid){
		$con = getConnection();
    $sql = "delete from orderlist where serial_id='{$sid}'";
    $result = mysqli_query($con, $sql);

    return $result;
	}

	function getAllDailyOrder(){
		$con = getConnection();
		$sql = "select * from dailyorderlist";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function menu($menuName){
		$con = getConnection();
		$sql = "select * from menu where menu_name='{$menuName}'";
		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);

    return $user;
	}

	function grocery(){
		$con = getConnection();
		$sql = "select * from grocery";
		$result = mysqli_query($con, $sql);

		return $result;
	}
	function grocerySearch($search){
		$con = getConnection();
		$sql = "select * from grocery where grocery_name like '%{$search}%'";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function groceryOrderExist($groceryName,$reqQuantity,$checked,$groid){
		$con = getConnection();
    $sql = "update grocery set grocery_name = '{$groceryName}',req_quantity = '{$reqQuantity}', checked ='{$checked}' where grocery_orderid='{$groid}'";
    $result = mysqli_query($con, $sql);

		return $result;
	}

	function groceryNewOrder($groceryName,$avQuantity,$reqQuantity,$checked,$cid){
		$con = getConnection();
		$sql = "insert into grocery values('','{$groceryName}','{$avQuantity}','{$reqQuantity}', '{$checked}', '{$cid}')";
    $result = mysqli_query($con, $sql);

		return $result;
	}

	function review(){
		$con = getConnection();
		$sql = "select * from review";
		$result = mysqli_query($con, $sql);

		return $result;
	}

	function service($serviceName,$reqBy){
		$con = getConnection();
		$sql = "insert into service values('','{$serviceName}','{$reqBy}','{0}')";
		$result = mysqli_query($con, $sql);

		return $result;
	}
	function serviceCheck($uid){
		$con = getConnection();
		$sql = "select * from service where reqby_user='{$uid}'";
		$result = mysqli_query($con, $sql);

		return $result;
	}
	function updateBalanceT($newBalance,$chefid){
		$con = getConnection();
    $sql = "update chefpi set tip_amount = '{$newBalance}' where chef_id='{$chefid}'";
    $result = mysqli_query($con, $sql);

    return $result;
	}

	//g
	function HotelsAll(){

		$con = getConnection();
		$sql = "select * from hotel";
		$result = mysqli_query($con, $sql);


		return $result;
	}

	function HotelsAllGuest($hid){

		$con = getConnection();
		$sql = "select * from hotel where hotel_id='{$hid}'";
		$result = mysqli_query($con, $sql);
		$user=mysqli_fetch_assoc($result);

		return $user;
	}
	// function guestregi($uid,$username,$email,$address,$date,$phoneNo){
	//
	// 	$con = getConnection();
	// 	$sql = "insert into guestpi values('','{$uid}','{$username}','{$email}', '{$address}', '{$date}','{$phoneNo}','0','0','0','0')";
  //   $result = mysqli_query($con, $sql);
	//
	// 	return $result;
	// }
	// function userregi($email,$pass,$type){
	// 	$con = getConnection();
	// 	$sql = "insert into user values('','{$email}','{$pass}','{$type}')";
  //   $result = mysqli_query($con, $sql);
	//
	// 	return $result;
	// }
	function roomavailableGuest($hid){
		$con = getConnection();
		$sql = "select * from room where hotel_id='{$hid}'";
		$result = mysqli_query($con, $sql);
		$user=mysqli_fetch_assoc($result);


		return $user;
	}
	function hotelbooking($hid,$rid,$guestid,$checkIn,$checkout,$price){
		$con = getConnection();

		$sql = "insert into booking values('','{$hid}','{$rid}','{$guestid}', '{$checkIn}', '{$checkout}', '{$price}')";
		$result = mysqli_query($con, $sql);

		return $result;
	}
	function bookedGuest($gid){
		$con = getConnection();
		$sql = "select * from booking where guest_id='{$gid}'";
		$result = mysqli_query($con, $sql);


		return $result;
	}
	function guestGuest($uid){
		$con = getConnection();
		$sql = "select * from guestpi where user_id='{$uid}'";
		$result = mysqli_query($con, $sql);
		$user=mysqli_fetch_assoc($result);

		return $user;
	}
	function bookingDlt($bid){
		$con = getConnection();
		$sql = "delete from booking where booking_id='{$bid}'";
		$result = mysqli_query($con, $sql);


		return $result;
	}
	function roomserviceGuest($serviceName,$uid,$check){
		$con = getConnection();
		$sql = "insert into service values('','{$serviceName}','{$uid}','{$check}')";
		$result = mysqli_query($con, $sql);


		return $result;
	}
	function guestNameGuest($gid){
		$con = getConnection();
		$sql = "select * from guestpi where guest_id='{$gid}'";
		$result = mysqli_query($con, $sql);
		$user=mysqli_fetch_assoc($result);

		return $user;
	}
	function reviewGuest(){
		$con = getConnection();
		$sql = "select * from review";
		$result = mysqli_query($con, $sql);

		return $result;
	}
	function complainGuest($complain,$check,$gid){
		$con = getConnection();
		$sql = "insert into complain values('','{$complain}','{$check}','{$gid}')";
		$result = mysqli_query($con, $sql);


		return $result;
	}
	function givereviewGuest($gid,$hid,$review,$rate){
		$fr="";
		$con = getConnection();
		$sql = "insert into review values('','{$gid}','{$hid}','{$review}','{$rate}','{$fr}')";
		$result = mysqli_query($con, $sql);


		return $result;
	}
	function requestGuest($req,$gid){
		$con = getConnection();
		$sql = "update guestpi set Membership_status='{$req}' where guest_id='{$gid}'";
		$result = mysqli_query($con, $sql);


		return $result;
	}


?>
