<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
</head>
<body>
	<header><?php require 'Includes/headerAdmin.php'; ?></header>
	<?php
		$msg='';
		if (array_key_exists('LoggingIn',$_POST)) 
		{
			$username = $_POST['Username'];
			$pw = $_POST['Password'];
			if ($username == 'root' && $pw == 'pwdpwd')
			{
				require 'admin.php';
			}
			else
			{
				echo '<div align="center">Login Failed</div>';
				unset($_POST['LoggingIn']);
			}
		}
	?>
	<footer><?php require 'Includes/footer.php'; ?></footer>
</body>
</html>