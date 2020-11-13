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

<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        background-color: white;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<body>

<?PHP 
    include '../helpers/dbconfig.php';
     

    $entry = trim($_POST['entry']);
    $category_id =  $_POST['category_id'];

     $result_array = explode(' ', $entry);
     
        foreach ($result_array as $key => $value) {
          $sql = $db->query("SELECT * FROM items WHERE name LIKE '$entry' OR ID = '$entry' ");
          $no_item = 	mysqli_num_rows ( $sql);
        }


  ?>

  <section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
</section>

<section>
	<?php 

  $category_details = $db->query("SELECT * FROM category WHERE id = '$category_id' ");
   $details = mysqli_fetch_assoc($category_details);

	?>
	<div style="background-color: #F1F1F1; padding-left:  5%; padding-bottom: 1%; padding-top: 1%; margin-left: 5%; margin-right: 5%">
		<h7><a href="dashboard.php" style="text-decoration: none;color: black">Home </a>  / 
			<a href="category-single.php?info=<?= $category_id ?>" style='text-decoration: none;color: black'><?php echo $details['name'] ?></a>  

			/ <?php echo $entry; ?>


		</h7>
		
		
	</div>
</section>


<section>

		<div class="container" style="margin-top: 2%">
		
		<center>
			
			<button class="btn btn-outline-success  py-2 px-5" onclick="document.getElementById('id02').style.display='block'" style="margin-top: 2%"> <span class="fa fa-plus" ></span>  Add item</button>
<br>
			<a  onclick="printDiv('printableArea')" style="float: right; margin-right: 5%; "><button class="btn btn-danger"><span class="fa fa-print" ></span> Print</button></a>

				<?php include 'additem.php'; ?>
				

		</center>



	</section>

  <section id="printableArea">
    
    <center>
      <div class="search" style="margin-top: 3%; margin-left: 14%" >
            <form action="itemresult.php" method="post" class="form-inline" >
             <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search " name="entry" />
        <div class="result"></div>
      </div>
                <input type="text" name="category_id" value="<?php echo $category_id  ?>" style="visibility: hidden">
                <button type="submit" class="btn btn-info" id="label" style="margin-left: -13%">Search</button>
                    <h6 style="margin-left: 5%">No of items : <?php echo $no_item; ?></h6>
            </form>
    </div>
 
    <table class="table" style="margin-top: 1%; width: 70%">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
       <th scope="col">Day Added Y-m-d</th>
       <th>Delete</th>
       <th>Edit</th>
       <th>Sales</th>
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
     <td><a href="deleteitem.php?info=<?= $item['id'] ?>" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this item')" style="color: red"><span class="fa fa-trash" ></span></a> </td>
       <td> <a href="edite.php?info=<?= $item['id']?>">
          <span class="fa fa-pencil" style="color: black" ></span>
        </a></td>
         <td><a href="bought.php?info=<?= $item['id']?>"><button class="btn btn-success">Sold</button></a></td>
    </tr>
    <?php endwhile; ?>

  </tbody>
</table>
</center>
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