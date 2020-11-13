<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/animated.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>


	<?php

	include '../helpers/dbconfig.php';
	$item_id = $_GET['info'];
 	 $sql = $db->query("SELECT * FROM items WHERE id =  '$item_id'  ");

  	$items_details = mysqli_fetch_assoc($sql);
	


?>

<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
</section>

<section>
	<center>
		 <form style=" margin-top: 2%; width: 40%"  method="POST" action="boughtdb.php" enctype="multipart/form-data"> 

		 	<input type="text" name="itemid" value="<?=  $item_id ?>" style="visibility: hidden;">
		 	<h5><?= $items_details['name'] ?> </h5>
		 
		 	<input type="text" name="name" value=" <?= $items_details['name'] ?> " style="visibility: hidden">

         <div class="form-group">
          <label>Previous Quantity : <?= $items_details['quantity'] ?> </label>
          <input type="text" class="form-control" placeholder="Quantity Sold" name="quantity" >
        </div>

         <div class="form-group">
          <label>Main Price : <?= $items_details['price'] ?> </label>
          <input type="text" class="form-control" placeholder="Price Sold" name="price" >
        </div>

        <div class="form-group">
          <label>Type of sale</label>
        <select name="saletype">
          <option value="Retail Sale">Retail Sale</option>
            <option value="Whole Sale">Whole Sale</option>

        </select>
        </div>

         <div class="form-group">
          <label>Bought Date : </label>
          <input type="date"  name="sdate">
        </div>



        <input type="text" name="itemid" value="<?= $items_details['id'] ?>" style="visibility: hidden">


              <br>

              <input type="submit" style="margin-top: -3%;" class="btn btn-success py-2 px-4" >  
 
       </form>
	</center>
	
</section>

</body>
</html>