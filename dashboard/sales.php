<!DOCTYPE html>
<html>
<head>
	<title>Sales</title>
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
	
  $sql = $db->query("SELECT DISTINCT sdate FROM sales  ORDER BY sdate DESC  ");
	


?>

<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
</section>

<section id="printableArea">
	
	<div class="row" style="margin-top: 3%">

		<div class="col" style="padding-right: 5%; padding-left: 5%">
			<div style="background-color: #EEEEEE; width: 50% ; padding:10%; border-radius: 15px;">
				<table style="">
		<tr>
			<th scope="col">Dates (Y-M-D)</th>
		</tr>
 		<?php  while ($dates = mysqli_fetch_assoc($sql)): ?> 
		<tr>
			<td><a href="sdate.php?info=<?= $dates['sdate'] ?>"><?= $dates['sdate'] ?></a></td>
		</tr>
 		<?php endwhile; ?>

		</table>
			</div>
				
		</div>




		<div class="col">
			<?php 
			$currentdate = date("Y-m-d") ;
			 $sql1 = $db->query("SELECT * FROM sales  WHERE sdate =  '$currentdate'  ");
			 $currentprice = 0;
			?>
		<h5 style="text-align: center; margin-top: 1%; color:red">Today</h5>
		<table  class="table"  style="margin-left: -5%; margin-top: 3%; width: 100%; margin-bottom: 5% ">
		<tr>
			<th>id</th>
			<th scope="col">Name</th>
			<th>Quantity sold</th>
				<th>Quantity remaining</th>
			<th>Price</th>
			<th>Sale type</th>

		</tr>
 		<?php  while ($currentitems = mysqli_fetch_assoc($sql1)): ?> 

 			<?php 
			$id = $currentitems['itemid'];
 			 $sql2 = $db->query("SELECT * FROM items  WHERE id =  '$id'  ");
 			?>

 		<?php  while ($currentitems1 = mysqli_fetch_assoc($sql2)): ?> 
		<tr>
			<td><?= $currentitems['itemid'] ?></td>
			<td><?= $currentitems['name'] ?></td>
			<td><?= $currentitems['quantity'] ?></td>
			<td><?= $currentitems1['quantity'] ?></td>	
			<td><?= $currentitems['price'] ?></td>
			<td><?= $currentitems['saletype'] ?></td>


		</tr>
		
		<?php
		$currentprice = $currentprice +  $currentitems['price'];  
		?>
<?php endwhile; ?>
 		<?php endwhile; ?>

		</table>

			
<h5 style="text-align: right;">Total : <?php echo $currentprice; ?>  </h5>
		</div>



		<div class="col">
			<a  onclick="printDiv('printableArea')" style="float: center; margin-left:  35%; "><button class="btn btn-danger"><span class="fa fa-print" ></span> Print</button></a>
			
		</div>




		
	</div>




		
	
</section>




</body>

<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</html>