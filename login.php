<?php
/*including the database connection*/
include ("db_connection.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LogIn</title>
</head>

<body>
	<h1>Log In</h1>
		<?php
	/*checking if the form is submitted*/
	if( isset ( $_REQUEST['loginsubmit'] ) ){
		
		$username = $_REQUEST['uname'];
		$password = $_REQUEST['pwd'];
		$sql="SELECT fname,username,pw from users where username='".$username."' AND pw='".$password."'";

		$result	= $link->query($sql);
		if ($result->num_rows == 1){
		while ( $row = $result->fetch_array()){
		
				$uname = $row["username"];
				$userid = $row["uid"];
				$fname = $row["fname"];
				
		
    /*starting a session*/
	session_start();
			$_SESSION['user_name']=$uname;
			$_SESSION['first_name']=$fname;
			$_SESSION['user_id']=$userid;
			header('Location:homepage.php');
			
	 
			
				}
		} else{
			echo "No records matched, please check your username and password";
		}

	}

?>
	
	<form method="Post" action="<?php $_SERVER['PHP_SELF'];?>">
		<table width="50%" border="0">
  <tbody>
    <tr>
      <td>User Name</td>
      <td><input name="uname" type="text"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name="pwd" type="password"></td>
    </tr>
  </tbody>
</table>
		<input name="loginsubmit" type="submit">

</form>

	
</body>
</html>