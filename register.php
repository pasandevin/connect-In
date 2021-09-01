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

	header('Location:homepage.php');
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<h1>Register new User</h1>
	<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
		<table width="50%" border="1" cellpadding="4">
  <tbody>
    <tr>
      <td>Email</td>
      <td><input type="email" name="email"></td>
    </tr>
    <tr>
      <td>User Name</td>
      <td><input type="text" name="username" ></td>
    </tr>
	<tr>
      <td>First Name</td>
      <td><input type="text" name="firstname" ></td>
    </tr>
	<tr>
      <td>Last Name</td>
      <td><input type="text" name="lastname" ></td>
    </tr>
	<tr>
      <td>BirthDay</td>
      <td><input type="text" name="birthday" ></td>
    </tr>
	 <tr>
      <td>Password</td>
      <td><input type="password" name="password"></td>
	 
    </tr>
	<tr>
      <td><input type="submit" name="reg_submit"></td>

	 
    </tr>

  </tbody>
</table>

	</form>
</body>
</html>