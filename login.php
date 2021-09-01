<?php
/*including the database connection*/
include ("db_connection.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LogIn</title>
<style>
	form{
		border: solid 2px black;
		border-radius: 5px;
		width: 25rem;
		text-align: center;
		position: absolute;
		top: 30%;
		left: 50%;
		transform: translate(-50%,-50%);
	}
	input[type="text"], input[type="password"]{
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
				$fname = $row["fname"];
				
				
				/*starting a session*/
	session_start();
			$_SESSION['user_name']=$uname;
			$_SESSION['first_name']=$fname;
			header('Location:homepage.php');
			
			
			
		}
	} else{
		echo "No records matched, please check your username and password";
		}

	}
	
?>
	
	<form method="Post" action="<?php $_SERVER['PHP_SELF'];?>">
		<h1>Log In</h1>
		<table width="50%" border="0">
  			<!-- <tbody>
    			<tr>
      				<td>User Name</td>
				</tr>
				<tr>
					<td>Password</td>
				</tr>
			</tbody> -->
		</table>
		<input name="uname" type="text" placeholder="Username">
		<input name="pwd" type="password" placeholder="Password">
		<input name="loginsubmit" type="submit" value="Login">
	</form>

	
</body>
</html>