<?php 

include '../helpers/dbconfig.php';

$itemid = $_GET['info'];



$sql1 = $db -> query("DELETE FROM items WHERE id = '$itemid' ");



	echo "<script>
				alert('Successfully deleted');
				window.location.href='dashboard.php';
		  </script>";




?>