<?php 

include '../helpers/dbconfig.php';

$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$saletype = $_POST['saletype'];
$itemid = $_POST['itemid'];



$sdate = date('Y-m-d', strtotime($_POST['sdate']));



$sql = $db -> query("INSERT INTO sales( name , quantity , price , saletype , sdate , itemid) 
VALUES( '$name'  , '$quantity' ,  '$price' , '$saletype' , '$sdate' , '$itemid' )");

$sql1  = $db->query("
	UPDATE items SET 
	quantity = quantity - '$quantity'

	 WHERE id = '$itemid' ");

	echo "<script>
				alert('Successfully Made a sale !! ');
				window.location.href='dashboard.php';
		  </script>";



?>