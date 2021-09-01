<?php

/*including the database connection*/
include ("db_connection.php");
/*end - including the database connection*/
	/*checking if a button is pressed*/
	if( isset ( $_REQUEST['reg_submit'] ) ){

		$email = $_REQUEST['email'];
		$user_name = $_REQUEST['username'];
		$first_name = $_REQUEST['firstname'];
		$last_name = $_REQUEST['lastname'];
		$birthday = $_REQUEST['birthday'];
		$password = $_REQUEST['password'];
		
		$sql_add_con	= "INSERT INTO users(email,fname,lname,username,bday,pw) VALUES ('".$email."','".$first_name."','".$last_name."','".$user_name."','".$birthday."','".$password."')";
		echo $sql_add_con;
		$result_add_con= $link->query($sql_add_con);
		
		/* getting session variables*/
	session_start();
	$_SESSION['user_name'] = $user_name;
	$first_name=$_SESSION['first_name'] = $first_name;
	/*end - getting session variables*/

	header('Location:add_connections.php');
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<style>
	form{
		border: solid 2px black;
		border-radius: 5px;
		width: 25rem;
		text-align: center;
		position: absolute;
		top: 40%;
		left: 50%;
		transform: translate(-50%,-50%);
	}
	input[type="text"], input[type="email"], input[type="password"]{
		display: block;
		margin: 0.3rem 0;
		margin-left: auto;
		margin-right: auto;
		width: 15rem;
		padding: 0.5rem;
		font-size: 1.1rem;
	}
	input[type="submit"]{
		font-size: 1.15rem;
		margin-top: 1rem;
		margin-bottom: 1rem;
		padding: 0.5rem 2rem;
		cursor: pointer;
	}
</style>
</head>

<body>
	<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
	<h1>Register new User</h1>

      <input type="email" name="email" placeholder="Email">

      <input type="text" name="username" placeholder="Username">

      <input type="text" name="firstname" placeholder="First name">

      <input type="text" name="lastname" placeholder="Last name">

      <input type="text" name="birthday" placeholder="Birthday">

      <input type="password" name="password" placeholder="Password">
	 
      <input type="submit" name="reg_submit" value="Register">

	</form>
</body>
</html>