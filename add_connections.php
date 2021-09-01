<?php

/*including the database connection*/
include ("db_connection.php");
/*end - including the database connection*/

/*get session variables*/
session_start();
$user_name=$_SESSION['user_name'];
$first_name=$_SESSION['first_name'];
/*end - get session variables*/

/*adding a connection*/
if ( isset($_REQUEST["add_con"]) ) {
	
	$my_user_name = $_REQUEST['uname'];
	$user_name_to_add = $_REQUEST['addname'];

	$sql_add_con	= "INSERT INTO connections(username1,username2) VALUES ('".$my_user_name."','".$user_name_to_add."')";
	$result_add_con= $link->query($sql_add_con);		
}	
/*end - adding a connection*/

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add friends</title>
<style>
	body{
		text-align: center;
	}
</style>
</head>

<body>
		<h1>Hello <?php echo $first_name; ?>, Welcome to connect in</h1>
	<table width="50%" border="2" cellpadding="3" align="center">
  <tbody>
    <tr>
      <td>First Name</td>
      <td>User Name</td>
      <td>&nbsp;</td>
    </tr>
<?php
	  
/*retrieve connection names*/
$sql_ret_conn	= "SELECT username1,username2 FROM connections WHERE username1='".$user_name."' OR username2='".$user_name."'";
$result_conn= $link->query($sql_ret_conn);
$totalrec_non_conn=$result_conn->num_rows;
$connection_unames = [];	 
	
while( $row = $result_conn -> fetch_array() ) {
	if ( $row['username1'] != $user_name ) {
		
		array_push($connection_unames,$row['username1']);	
	} elseif ( $row['username2'] !=$user_name ) {

		array_push($connection_unames,$row['username2']);
	}
}
/*end - retrieve connection names*/		  

/*retrieve non connection details*/
$sql_ret_non_conn	= "SELECT username1,username2 FROM connections WHERE username1!='".$user_name."' AND username2!='".$user_name."'";
$result_non_conn= $link->query($sql_ret_non_conn);
$totalrec_non_conn=$result_non_conn->num_rows;
$non_connection_unames = [];
	 
	
while( $row = $result_non_conn -> fetch_array() ) {
	if (!(in_array($row['username1'], $connection_unames)) && !(in_array($row['username1'], $non_connection_unames))) {
		
		array_push($non_connection_unames,$row['username1']);	
	} elseif (!(in_array($row['username2'], $connection_unames)) && !(in_array($row['username2'], $non_connection_unames))) {

		array_push($non_connection_unames,$row['username2']);
	}
}
/*end - retrieve non connection details*/	  

	    /*displaying non-connection details*/
     	foreach ( $non_connection_unames as $non_connection_uname ) {
			
			$sql_ret_names	= "SELECT username,fname FROM users WHERE username='".$non_connection_uname."'";
			$result_names= $link->query($sql_ret_names);
			while( $row = $result_names -> fetch_array() ) {
?>
				 <tr>
				 <td><?php echo $row['fname']; ?></td>
				 <td><?php echo $row['username']; ?></td>
				 <td>
					 <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
						<input type="hidden" name="uname" value="<?php echo $user_name; ?>"/>
						<input type="hidden" name="addname" value="<?php echo $row['username']; ?>"/>
						<input type="submit" name="add_con" value="Add Connection">
					</form>	 
				</td>	              
				</tr>
	  
<?php
			
			}	
		}
		/*end -  displaying non-connection details*/
?>
	  	<td colspan="3">
		<form action="homepage.php" method="POST">
			<input type="submit" align="left" name="new_conn" value="Back to Connections">
		</form>
	</td>	  
  </tbody>
	</table>
	
	
</body>
</html>