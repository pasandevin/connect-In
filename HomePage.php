<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HomePage</title>
</head>

<body>
	<?php
	if( isset ( $_REQUEST['Reg_Log'] ) ){
	
	$value = $_REQUEST['Reg_Log']; 
	
	if ($value == 'Reg'){
		header('Location:register.php');
		
	}
		elseif($value == 'Log'){
			header('Location:login.php');
			
		}
	
}
?>

	
	
	
	<h1>Welcome to connect-In</h1>
<form  method="get" action="<?php $_SERVER['PHP_SELF'];?>">
Get Started
<button name="Reg_Log" type="submit" value="Reg">Register</button>
	<button name="Reg_Log" type="submit" value="Log">Log-In</button>

</form>



</form>
	

</body>
</html>