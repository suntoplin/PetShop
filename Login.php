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

		if (!array_key_exists('LoggingIn',$_POST))
		{
	?>
<!--
			<h2>Log in</h2>
			<form method="post" action="Login.php">
			<input type="hidden" name="LoggingIn" value="true">
				<table id='loginform'>
				<tr>
					<td id='test'>Username:</td>
					<td>
						<input type="text" name="Username" value="<?php echo $username?>" size="25">
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<input type="password" name="Password" size="10">
					</td>
				</tr>
				<tr>
					<td align="right" colspan="2">
						<input type="submit" value="Log in">
					</td>
				</tr>
				</table>
			</form>
-->

	<?php
		}
	?>
	<footer><?php require 'Includes/footer.php'; ?></footer>
</body>
</html>