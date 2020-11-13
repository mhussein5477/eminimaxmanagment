 <?php 

    $current_user = $_SESSION['SBUser'];
    $userdetails = $db->query("SELECT * FROM users WHERE id = '$current_user' ");
    $user_info = mysqli_fetch_assoc($userdetails);
     ?> 



    
    </div>
<nav class="navbar navbar-expand-lg  navbar-dark bg-light" style="padding-left: 5%; padding-right: 5%; margin-top: -1%">

<?php 
  $type = $user_info['type'];
  if ($type == 'Admin') {
    echo '<a class="navbar-brand" href="dashboard.php" style="color: black">Admin panel</a>';
  }else{
     echo '<a class="navbar-brand" href="dashboard.php" style="color: black">Staff panel</a>';
  }

?>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav" >

      <a class="nav-item nav-link " href="sales.php" style="color: black; font-size: 16px; margin-left: 5%">Sales</a>
      
      <?php
    
      if ( $type == 'Admin' ) {
        echo '   <a class="nav-link" href="staff.php" style="color: black">Staff <span class="sr-only">(current)</span></a>';
      }

      ?>

       <a class="nav-item nav-link " href="statistics.php" style="color: black; font-size: 16px; margin-left: 5%">Statistics</a>
   
    </div>
  </div>

  <div class="dropdown" style="margin-top: 0.5%; margin-right: 5%">
              <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                   <?php echo $user_info['username']; ?>
               </button>
               <div class="dropdown-menu">
                   <a class="dropdown-item" href="../index.php">Log Out</a>
               </div>
           </div>
  

</nav>

<style type="text/css">
  .navbar{
     box-shadow: 1px 1px 10px grey;
  }

</style>