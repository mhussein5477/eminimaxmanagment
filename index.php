<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	 <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>

	<section>
		
		<div class="loginsection" style="">



			<form action="actionpage.php?login" method="POST">
			  <div class="form-group">
			    <label for="Username">Username:</label>
			    <input type="text" class="form-control" placeholder="Username" name="username">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" placeholder="Password" name="password">
			  </div>
			 <center>
			 	 <button type="submit" class="btn btn-primary py-2 px-5" >Login</button>
			 </center>
			 
		</form> 

	
		  
			
		</div>
		 
	</section>




</body>


<style type="text/css">
	.loginsection{
		width: 35%; 
	 
		padding: 3% ; 
		border-radius: 10px;
		  margin: auto;
		   margin-top: 10%;
		     box-shadow: 5px 10px 18px #888888;
	}
	.raisedbox { 
    
}
</style>

</html>