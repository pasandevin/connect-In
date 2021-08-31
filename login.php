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
	/*checking if a button is pressed*/
	if( isset ( $_REQUEST['loginsubmit'] ) ){
		
		$username = $_REQUEST['uname'];
		$password = $_REQUEST['pwd'];
			$sql="SELECT username,pw from users where username='".$username."' AND pw='".$password."'";

		$result	= $link->query($sql);
		if ($result->num_rows>0){
		while ( $row = $result->fetch_array()){
		
				$uname=$row["username"];
				$pw=$row["pw"];	
			echo $uname;
			echo $pw;
				
			
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