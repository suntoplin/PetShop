<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Contact us</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<script type="text/javascript" src="JS/lib.js"></script>
<script type="text/javascript" src="JS/jquery-1.11.1.min.js"></script>
</head>
<body onload="ContactUs()" >
	<header><?php require 'Includes/header.php'; ?></header>	
	<div id="contact-title" >Sending a message</div>
	<form id ="contact">
		<table>
			<tr>
				<td class='contact-head'>First Name:</td>
				<td><input type='text' name='FirstName' placeholder =" Jane" class='contact-txt'></td>
				<td><div id="msg0"></div></td>
			</tr>
			<tr>
				<td class='contact-head'>Last Name:</td>
				<td><input type='text' name='LastName'  placeholder =" Doe" class='contact-txt'> </td>
				<td><div id="msg1"></div></td>
			</tr>
			<tr>
				<td class='contact-head'>Email:</td>
				<td><input type='text' name='Email'  placeholder=' ex: jane.doe@gmail.com' class='contact-txt'></td>
				<td><div id="msg2"></div></td>
			</tr>
			<tr>
				<td class='contact-msg'>Message:</td>
				<td ><textarea name='Message'  placeholder='Great services!' class='contact-content'></textarea></td>
				<td ><div id="msg3"></div></td>
			</tr>
			<tr>
				<td colspan="3"><input type='submit' id='btnSubmit' value='Send'></td>
			</tr>
			<tr>
				<td colspan="3"><div id="results"></div></td>
			</tr>
		</table>
	</form>

	<footer><?php require 'Includes/footer.php'; ?></footer>
</body>
</html>