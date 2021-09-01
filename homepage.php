<?php

/*including the database connection*/
include ("db_connection.php");
/*end - including the database connection*/

/* getting session variables*/
session_start();
$user_name=$_SESSION['user_name'];
$first_name=$_SESSION['first_name'];
/*end - getting session variables*/

/*removing a connection*/
/*retrieving session variables*/
if ( isset($_REQUEST["rem_con"]) ) {
	$my_user_name = $_REQUEST['uname'];
	$user_name_to_remove = $_REQUEST['dname'];
/*end - retrieving session variables*/
	$sql_del_con	= "Delete from connections where (username1='".$user_name_to_remove."' AND username2='".$my_user_name."') OR  (username2='".$user_name_to_remove."' AND username1='".$my_user_name."')";
	$result_del_con= $link->query($sql_del_con);		
}	
/*end - removing a connection*/

/*pagination:1*/
if ( isset($_REQUEST['page']) ) {
	$pageno=$_REQUEST['page'];	
} else {
	$pageno=1;
}
$recPerPage=3;
$end = $pageno * $recPerPage;
if ( $pageno == 1 ) {
	$start	= 0;
} else {
	$start = (($pageno-1) * $recPerPage )+1;
}
			
$sql_get_no_rec	= "SELECT username1,username2 FROM connections WHERE username1='".$user_name."' OR username2='".$user_name."'";
$result_no_rec= $link->query($sql_get_no_rec);
$totalrec=$result_no_rec->num_rows;
$totalPages =	ceil ($totalrec / $recPerPage);
/*end - pagination:1*/

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php

	/*retrieve connections' usernames*/
	$sql_ret_conn	= "SELECT username1,username2 FROM connections WHERE username1='".$user_name."' OR username2='".$user_name."' LIMIT ".$start.", ".$recPerPage."";
	$result_conn= $link->query($sql_ret_conn);
	$totalrec_conn=$result_conn->num_rows;
 
	if( $totalrec_conn > 0 ) {
			
		$connection_unames = [];
		while( $row = $result_conn -> fetch_array() ) {	
			if ( $row['username1']!= $user_name ) {
				array_push($connection_unames,$row['username1']);	
			} elseif ( $row['username2']!= $user_name ) {
				array_push($connection_unames,$row['username2']);
			}
			
		}
	/*end - retrieve connections' usernames*/
		
	
?>
	<p>Hello <?php echo $user_name; ?>, Welcome to connect in</p>
	<table width="50%" border="2">
  <tbody>
    <tr>
      <td>First Name</td>
      <td>User Name</td>
      <td>&nbsp;</td>
    </tr>
    
	   
	  
<?php
	    /*retrieving and displaying connection details*/
     	foreach ( $connection_unames as $connection_uname ) {
			
			$sql_ret_names	= "SELECT username,fname FROM users WHERE username='".$connection_uname."'";
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
		/*end - retrieving and displaying connection details*/
?>
	<td>
		<form action="add_connections.php" method="POST">
			<input type="submit" align="left" name="new_conn" value="Add new Connections">
		</form>
	</td>	  
  </tbody>
	</table>
	
	
<?php
	} else {
		echo "You have no connections";
	}
	
	/*display prev link*/
	if ( $pageno>1){
?>
	<a href="homepage.php?page=<?php echo $pageno-1;?>">PREVIOUS</a>
<?php
    }
	/*end - display prev link*/
	
	/*display page numbers*/
	for ( $k =1 ; $k <=$totalPages;	$k++){

	if ( $k==$pageno) {
		echo " $k ";
	}
	else {
?>
	
		<a href="homepage.php?page=<?php echo $k; ?>"> <?php echo $k; ?></a>
<?php
		}
	}
	/*end - display page numbers*/
?>
	
<?php
	/*display next button*/
	if ( $pageno!=$totalPages){
	?>
	<a href="homepage.php?page=<?php echo $pageno+1;?>">NEXT</a>
<?php
		}
	/*end - display next button*/
?>	

	
	
</body>
</html>