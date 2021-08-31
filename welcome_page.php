<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome</title>
</head>

<body>
	<?php
	/*checking if a button is pressed*/
	if( isset ( $_REQUEST['Reg_Log'] ) ){
	
	$value = $_REQUEST['Reg_Log']; 
	/*redirecting to register page*/
	if ($value == 'Reg'){
		header('Location:register.php');
		
	}    
		/*redirecting to login page*/
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