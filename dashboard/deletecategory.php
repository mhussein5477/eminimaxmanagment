<?php 

include '../helpers/dbconfig.php';

$categoryid = $_GET['info'];



$sql1 = $db -> query("DELETE FROM items WHERE category_id = '$categoryid' ");
$sql2 = $db -> query("DELETE FROM category WHERE id = '$categoryid' ");



	echo "<script>
				alert('Successfully deleted');
				window.location.href='dashboard.php';
		  </script>";




?>