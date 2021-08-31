<?php


/*connection details*/
$host	=	"localhost";
$user	=	"root";
$passwd	=	"";
$db		=	"connect-in";


/*linking the database*/
$link=new MySQLi($host, $user, $passwd, $db);

//$sql="INSERT INTO student values ('SE/2018/074','R.N.P. Bandara',21,'Kegalle')";

//$sql="UPDATE student SET age=20 WHERE stdno='SE/2018/074'";

//$sql="DELETE from student where city='Matale'";
/*
$result	=	$link->query($sql);

if ( $result ){
	
	echo "Record added to DB";
}else{
	
	echo "Error in SQL...";
}
*/



?>