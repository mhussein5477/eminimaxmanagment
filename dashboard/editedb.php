<?php

include '../helpers/dbconfig.php';

$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$item_id = $_POST['item_id'];


$sql = $db->query("
	UPDATE items SET 
	name  = '$name',
	quantity = '$quantity',
	price = '$price'
	 WHERE id = '$item_id' ");



	echo "<script>
				alert('Successfully Updated');
				window.location.href='dashboard.php';
		  </script>";






?>