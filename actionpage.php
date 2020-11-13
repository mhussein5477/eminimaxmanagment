<?php

include 'helpers/dbconfig.php';

$username = $_POST['username'];
$type = $_POST['type'];
$password = $_POST['password'];


$salt = "d!bss8)4b12@ks45";
$password_encrypted = sha1($password.$salt);

/*Sign up back end part */
if (isset($_GET['signup'])) {

	$sql = $db -> query("INSERT INTO users( type , username , password   ) 
			VALUES(  '$type' , '$username' ,  '$password_encrypted'  )");
    header('Location: index.php');
}


/*login part back end*/
if (isset($_GET['login'])) {
		$user = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password_encrypted' ");
		$count = mysqli_num_rows($user);

		if ($count>0) {
		    $user_id = mysqli_fetch_assoc($user);
		    Login($user_id['id']);
		}
		else{
		    ?>
		    <script>
		        alert('Invalid Username or Password . Try again !');   
		        window.location.pathname="inventory/index.php";
		    </script>
<?php
}

}
