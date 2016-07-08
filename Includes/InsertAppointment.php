<?php
	$dbEntries = $_POST;

	foreach ($dbEntries as &$entry){ $entry = dbString($entry); }

	@$db = new mysqli('localhost','root','pwdpwd','pet_shop');

	if (mysqli_connect_errno()){ echo 'Cannot connect to database: ' . mysqli_connect_error(); }
	
	$query = "INSERT INTO grooming
		(FirstName, LastName, Address,City, State, Zip, 
			PhoneNumber,Email, PetType, Breed, PetName, 
			NeuteredOrSpayed,PetAge)
		VALUES ('" .	$dbEntries['FirstName'] . "','" .
						$dbEntries['LastName'] . "','" .
						$dbEntries['Address'] . "','" .
						$dbEntries['City'] . "','" .
						$dbEntries['State'] . "','" .
						$dbEntries['Zip'] . "','" .
						$dbEntries['PhoneNumber'] . "','" .
						$dbEntries['Email'] . "','" .
						$dbEntries['PetType'] . "','" .
						$dbEntries['Breed'] . "','" .
						$dbEntries['PetName'] . "','" .
						$dbEntries['NeuteredOrSpayed'] . "','" .
						$dbEntries['PetAge'] . "')";
	if ($db->query($query))
	{
		echo '<div id="greeting-msg"> Looking forward to seeing you. </div>
			  <a href="AddAppointment.php" class="link"> Make another appointment</a>
			  <a href="grooming.php" class="link">Back to grooming services</a>';
		
		$showForm = false;
	}
	else 
	{
		echo '<div id="insert-msg">Insert failed</div>';
	}
?>
