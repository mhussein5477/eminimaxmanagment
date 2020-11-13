<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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

    $sql = $db->query("SELECT * FROM category");
?>



	<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
	</section>


		
		


	<section>

		<div class="container" style="margin-top: 2%">
		
		<center>
   
			<button class="btn btn-outline-success  py-2 px-4" onclick="document.getElementById('id01').style.display='block'" style="margin-top: 2%"> <span class="fa fa-plus" ></span>  Add Category</button>

				<?php include 'addcategory.php'; ?>
			<a href="allitems.php"> <button class="btn btn-info  py-2 px-5" style="margin-top: 2%">All Items</button></a>

		</center>

			
		<div class="row">

 <?php  while ($category = mysqli_fetch_assoc($sql)): ?> 
  		<div class="box" style="width: 20%; padding: 3%; text-align: center;  box-shadow: 1px 1px 5px grey; margin-left: 3%; margin-top: 3%; border-radius: 2px; border-radius: 25px">
  		<a href="deletecategory.php?info=<?= $category['id'] ?>" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this category')" style="color: red">	
  		<span class="fa fa-trash" style="margin-left: 100%;" ></span>
  	</a>
  		<br>
  				<a href="category-single.php?info=<?= $category['id'] ?>" style="color: black; text-decoration: none">
  				<img src="../images/category.jpg" style="width: 60%">
  		<h5 style="margin-top: 5%"><?= $category['name']?></h5>
  		</a>

  			</div>

<?php endwhile; ?>

 
</div>
	
	</section>



</body>
<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>    

</html>