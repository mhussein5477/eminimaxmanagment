<?php

include '../helpers/dbconfig.php';

$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];

$adate = date('Y-m-d', strtotime($_POST['adate']));

$sql = $db -> query("INSERT INTO items( category_id , name , quantity , price , adate ) 
VALUES(  '$category_id' ,  '$name' , '$quantity', '$price', '$adate' )");


    header("Location: category-single.php?info=".$category_id);



?>