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
		session_start();
	 $user_name=$_SESSION['user_name'];
	$first_name=$_SESSION['first_name'];
	$user_id=$_SESSION['user_id'];
	
	
	
	$sql	= "SELECT uid1,uid2 FROM connections where uid1='".$user_id."' OR uid2='".$user_id."'";

	$result= $link->query($sql);
	$totalrec=$result->num_rows;

	if( $totalrec > 0 ) {
		
		while( $row = $result->fetch_array() ) {
			echo $row['uid1'],$row['uid2'];
		}
	}
	else{
		echo "You have no friends";
	}
	
	?>
	
</body>
</html>