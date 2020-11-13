<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>

	<section>
		
		<div class="loginsection">
			<form action="actionpage.php?signup" method="POST">
			  <div class="form-group">
			    <label for="Username">Username:</label>
			    <input type="text" class="form-control" placeholder="Username" name="username">
			  </div>
			<div class="form-group">
			    <label for="exampleFormControlSelect1">Example select</label>
			    <select class="form-control" name="type">
			      <option value="Admin">Admin</option>
			      <option value="Staff">Staff</option>
			     
			    </select>
			  </div>
			    <div class="form-group">
			    <label for="Username">Password:</label>
			    <input type="password" class="form-control" placeholder="Password" name="password">
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
		</form> 
		</div>
			
	</section>

</body>
<style type="text/css">
	.loginsection{
		width: 65%; 
		border: solid 1px grey; 
		padding: 3% ; 
		border-radius: 10px;
		  margin: auto;
		   margin-top: 5%;
		   margin-bottom:  5%;
	}
	
</style>
</html>