<?php 	include '../helpers/dbconfig.php'; ?>
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



	 $sql = $db->query("SELECT  name , price , COUNT(name) as x FROM sales GROUP BY name HAVING COUNT(name)>1 ORDER BY x DESC LIMIT 6");


	 $sql1 = $db->query("SELECT sales.itemid , items.id , sales.name , sales.price as c , items.price , (sales.price - items.price) as x FROM sales INNER JOIN items ON  items.id = sales.itemid ORDER BY x DESC LIMIT 4");
	
	 $sql2 = $db->query("SELECT * FROM items WHERE quantity = 0 LIMIT 5");
 

?>
<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
</section>

<section>
	<div class="row" style="width: 100%; padding-top: 3%">
	
		

			<div class="col" style=" padding-top: 2%;padding-left: 5%;">
				<div style="border: 1px solid grey ; padding: 5%; border-radius: 5%">
						<h4 style="color: blue">Most Sale Product</h4>
	<table class="table" style="width: 100% ; margin-top: 5%; ">

		<tr>
			<th scope="col">Name</th>
			<th>Sales</th>
			<th>Total Amount</th>

		</tr>
 		<?php  while ($stats = mysqli_fetch_assoc($sql)): ?> 
		<tr>
			<td><?= $stats['name'] ?></td>
			<td><?= $stats['x']  ?></td>
			<td><?= 
			$Tamount = $stats['x'] * $stats['price'];
			

			 ?></td>

		</tr>
		
 		<?php endwhile; ?>

	</table>
				</div>
		
	</div>




<div class="col" style=" padding-top: 2%">
<div style="border: 1px solid grey ; padding: 5%; border-radius: 5%" >
	<h4 style="color: green">Runed out products</h4>
	<table class="table" style="width: 80% ; margin-top: 5%; ">

		<tr>
			<th scope="col">Name</th>
			<th>Quantity</th>


		</tr>
 		<?php  while ($stats = mysqli_fetch_assoc($sql2)): ?> 
		<tr>
			<td><?= $stats['name'] ?></td>
			<td><?= $stats['quantity']  ?></td>
		

		</tr>
		
 		<?php endwhile; ?>

	</table>
	
</div>

</div>

		<div class="col"  style="  padding-top: 2% ;">
			<div style="border: 1px solid grey ; padding: 5%; border-radius: 5%">
				<h4 style="color: red">Most Profit Product</h4>
	<table class="table" style="width: 100% ; margin-top: 5%; ">

		<tr>
			<th scope="col">Name</th>
			<th>Main Price</th>
			<th>Sold Price</th>
			<th>Profit</th>

		</tr>
 		<?php  while ($stats1 = mysqli_fetch_assoc($sql1)): ?> 
		<tr>
			<td><?= $stats1['name'] ?></td>
			<td><?= $stats1['price'] ?></td>
				<td><?= $stats1['c'] ?></td>
				<td><?= $stats1['x'] ?></td>
			

		</tr>
		
 		<?php endwhile; ?>

	</table>
			</div>
					
		</div>

		
	</div>


</section>

</body>
</html>