<?php

include '../helpers/dbconfig.php';

$category = $_POST['category'];



$sql = $db -> query("INSERT INTO category( name ) 
VALUES(  '$category' )");
$category_id = mysqli_insert_id($db);
    header("Location: category-single.php?info=".$category_id);



?>