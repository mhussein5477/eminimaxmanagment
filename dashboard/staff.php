<!DOCTYPE html>
<html>
<head>
	<title>Staff</title>
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

   $sql = $db->query("SELECT * FROM users  ");


	


?>

<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
</section>

<SECTION>
	<center>
		<h5 style="margin-top: 5%">Staff</h5>
		<table class="table" style="width: 50%; margin-top: 1%">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th>Type</th>
       <th scope="col">Last login ( Y-M-D , H-M-S )</th>
 
    </tr>
  </thead>
  <tbody>

  	 <?php  while ($DETAILS = mysqli_fetch_assoc($sql)): ?> 
    <tr>
      <th scope="row"><?= $DETAILS['id'] ?></th>
      <td><?= $DETAILS['username'] ?></td>
      <td><?= $DETAILS['type'] ?></td>
      <td><?= $DETAILS['last_login'] ?></td>

    </tr>
    <?php endwhile; ?>

  </tbody>
</table>
	</center>
		

</SECTION>
</body>
</html>