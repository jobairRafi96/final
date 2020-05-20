<?php

 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  $sid=$_POST['Id'];

  $item['id'] = getAllorder1($sid);
  $itemId = (int)$item['id']['item_id'];
  $orderedQuantity = (int)$item['id']['quantity'];
  $item['qNum'] = item($itemId);
  $itemQuantity = (int)$item['qNum']['quantity'];
  $newItemQuantity = $itemQuantity-$orderedQuantity;

//if ordered item is grater than the item quantity then no action will happened, validation
  if ($newItemQuantity>=0) {
    updateQuantityItem($newItemQuantity,$itemId);
    orderCmp($sid);
    $check = true;
  }else{
    $check = false;
  }

    if($GLOBALS['check']){
      echo "COMPLEMENTED";
    }
    else{
      echo "NO ITEM";
    }


 ?>
