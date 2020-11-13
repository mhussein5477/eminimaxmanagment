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

    $sql = $db->query("SELECT * FROM items");
    $no_items = mysqli_num_rows($sql);
?>



	<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
	</section>


<section>

	<div style="background-color: #F1F1F1; padding-left:  5%; padding-bottom: 1%; padding-top: 1%; margin-left: 5%; margin-right: 5%">
		<h7><a href="dashboard.php" style="text-decoration: none;color: black">Home </a>  / 
			All Items




		</h7>
		
		
	</div>
</section>

	<section>
		<center>
			<h5 style="margin-top: 2%">All <font style="color: green"><?php echo $no_items; ?> </font> items </h5>

			  <table class="table" style="margin-top: 1%; width: 70%">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
       <th scope="col">Day Added Y-m-d</th>
    </tr>
  </thead>
  <tbody>

     <?php  while ($item = mysqli_fetch_assoc($sql)): ?> 
    <tr>
      <th scope="row"><?= $item['id'] ?></th>
      <td><?= $item['name'] ?></td>
      <td><?= $item['quantity'] ?></td>
      <td><?= $item['price'] ?></td>
      <td><?= $item['adate'] ?></td>
      
    </tr>
    <?php endwhile; ?>

  </tbody>
</table>
		</center>
	</section>



</body>
</html>