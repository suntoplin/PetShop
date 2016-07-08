<?php
	$groomingID = $_POST['GroomingID'];
	$query = "SELECT * FROM grooming 
				WHERE GroomingID = $groomingID";
	$result = $db->query($query);
	$dbEntries = $result->fetch_assoc();
	$result->free();
?>
