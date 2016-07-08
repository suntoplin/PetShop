<?php
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$from = 'From:'.$_POST["Email"];
	$message = $_POST["Message"];
	$to = 'suntop.lin@gmail.com';

	if(mail($to, $FirstName." ".$LastName , $message, $from))
	{ echo "<img src='Images/sendmail.png' width='50'><br>
			We will contact you as soon as possible! ";}
	else
	{ echo "Message was not sent";}
?>
