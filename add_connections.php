<?php
/*including the database connection*/
include ("db_connection.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
		  <?php
	 /*retrieving and displaying connection details*/
	session_start();
	$user_name=$_SESSION['user_name'];
	$first_name=$_SESSION['first_name'];
	  /*retrieving and displaying connection details*/
     	foreach ( $connection_ids as $connection_id ) {
			
		$sql_ret_names	= "SELECT username,fname FROM users WHERE username='".$connection_id."'";
		$result_names= $link->query($sql_ret_names);
		while( $row = $result_names -> fetch_array() ) {
			?>
		     <tr>
			 <td><?php echo $row['fname']; ?></td>
			 <td><?php echo $row['username']; ?></td>
             <td>
				 <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="hidden" name="uname" value="<?php echo $user_name; ?>"/>
    <input type="hidden" name="dname" value="<?php echo $row['username']; ?>"/>
<input type="submit" name="rem_con" value="Remove Connection">
</form>
				 
			</td>
             	              
		     </tr>
			<?php
		}
			
		}	
	  ?>
</body>
</html>