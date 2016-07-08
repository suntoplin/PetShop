<?php
	session_start();
	require 'Includes/fnFormPresentation.php';
	require 'Includes/fnStrings.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<link rel="stylesheet" type="text/css" href="CSS/admin.css">
</head>
<body>
	<header><?php require 'Includes/headerAdmin.php'; ?></header>
	<?php	
		require 'Includes/init.php';

		if (array_key_exists('Username',$_SESSION) && array_key_exists('Password',$_SESSION)){
			require 'Includes/Appointments.php';
		}
		else
		{
			if (array_key_exists('LoggingIn',$_POST)){
				require 'Includes/Login.php';			
			}
			else {
				require 'Includes/LoginForm.php';
			}
		}
	?>
	<footer><?php require 'Includes/footerAdmin.php'; ?></footer>
</body>
</html>
