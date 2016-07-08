<?php
	@$db = new mysqli('localhost','root','pwdpwd','pet_shop');

	if (mysqli_connect_errno()) { echo 'Cannot connect to database: ' . mysqli_connect_error();}

	$groomingID = $_POST['GroomingID'];

	$query = "DELETE FROM grooming WHERE GroomingID='". $groomingID ."'";

	if ($db->query($query))
	{
		echo '<link rel="stylesheet" type="text/css" href="../CSS/admin.css">';
		echo '<div id="delmsg"> Appointmant ID= '.$groomingID.' was deleted</div>
			  <div id="delBack"><a href="../admin.php" class="link">Back to Appointment Report</a></div>';
	}
	else
	{
		echo '<div align="center">Failed</div>';
	}
?>
