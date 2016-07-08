
<?php
	// Data validation
	$dbEntries = $_POST;
	foreach ($dbEntries as &$entry)
	{
		$entry = dbString($entry);
	}

	$uncheck = "<img src='Images/uncheck.png' class='checkmark'>";

	if (!checkLength($_POST['FirstName']))
	{
		$errors['FirstName'] = $uncheck;
	}
	else
	{
		$browserEntries['FirstName'] = browserString($_POST['FirstName']);
	}

	if (!checkLength($_POST['LastName']))
	{
		$errors['LastName'] = $uncheck;
	}
	else
	{
		$browserEntries['LastName'] = browserString($_POST['LastName']);
	}

	if (!checkLength($_POST['Address'],5,200))
	{
		$errors['Address'] = $uncheck;
	}
	else
	{
		$browserEntries['Address'] = browserString($_POST['Address']);
	}

	if (!checkLength($_POST['City'],1,100))
	{
		$errors['City'] = $uncheck;
	}
	else
	{
		$browserEntries['City'] = browserString($_POST['City']);
	}

	if ($_POST['State'] == 0)
	{
		$errors['State'] = $uncheck;
	}
	else
	{
		$browserEntries['State'] = browserString($_POST['State']);
	}

	if (!checkLength($_POST['Zip']))
	{
		$errors['Zip'] = $uncheck;
	}
	else
	{
		$browserEntries['Zip'] = browserString($_POST['Zip']);
	}

	if (!checkLength($_POST['PhoneNumber'],10,15))
	{
		$errors['PhoneNumber'] = $uncheck;
	}
	else
	{
		$browserEntries['PhoneNumber'] = browserString($_POST['PhoneNumber']);
	}

	if ( !checkEmail2($_POST['Email']) )
	{
		$errors['Email'] = $uncheck;
	}
	else
	{
		$browserEntries['Email'] = browserString($_POST['Email']);
	}

	if ($_POST['PetType'] == 0)
	{
		$errors['PetType'] = $uncheck;
	}
	else
	{
		$browserEntries['PetType'] = browserString($_POST['PetType']);
	}

	if ($_POST['PetType'] == 1 && $_POST['Breed'] == 0)
	{
		$errors['Breed'] = $uncheck;
	}
	else
	{
		$browserEntries['Breed'] = browserString($_POST['Breed']);
	}

	if (!checkLength($_POST['PetName'],1,100))
	{
		$errors['PetName'] = $uncheck;
	}
	else
	{
		$browserEntries['PetName'] = browserString($_POST['PetName']);
	}


	if ( array_key_exists('NeuteredOrSpayed',$_POST) )
	{
		$browserEntries['NeuteredOrSpayed'] = browserString($_POST['NeuteredOrSpayed']);
		$dbEntries['NeuteredOrSpayed'] = dbString($_POST['NeuteredOrSpayed']);
	}
	else
	{
		$errors['NeuteredOrSpayed'] = $uncheck;
	}

	if ($_POST['PetAge'] < 0)
	{
		$errors['PetAge'] = $uncheck;
	}
	else if ($_POST['PetAge'] == null)
	{
		$browserEntries['PetAge'] = 0;
		$dbEntries['PetAge'] = 0;
	}
	else
	{
		$browserEntries['PetAge'] = browserString($_POST['PetAge']);
	}


?>
<?php
	// Update data
	if (!count($errors) && array_key_exists('GroomingID',$_POST))
	{
		$groomingID = $_POST['GroomingID'];
		$query = "UPDATE grooming
				SET FirstName='" . $dbEntries['FirstName'] . "',
				LastName='" . $dbEntries['LastName'] . "',
				Address='" . $dbEntries['Address'] . "',
				City='" . $dbEntries['City'] . "',
				State='" . $dbEntries['State'] . "',
				Zip='" . $dbEntries['Zip'] . "',
				PhoneNumber='" . $dbEntries['PhoneNumber'] . "',
				Email='" . $dbEntries['Email'] . "',
				PetType='" . $dbEntries['PetType'] . "',
				Breed='" . $dbEntries['Breed'] . "',
				PetName='" . $dbEntries['PetName'] . "',
				NeuteredOrSpayed='" . $dbEntries['NeuteredOrSpayed'] . "',
				PetAge=" . $dbEntries['PetAge'];
		$query .= " WHERE GroomingID = $groomingID";

		if ($db->query($query))
		{
			echo '<div id="grooming-title-update">Record has been updated</div>
				  <div id="BackToAdmin"><a href="admin.php" class="link">Back to Appointment Report</a></div>';
		}
		else
		{
			echo '<div id="grooming-title-update">Update Failed</div>
				  <div id="BackToAdmin"><a href="admin.php" class="link">Back to Appointment Report</a></div>';
		}
	}
	elseif (!count($errors))
	{
		$showForm = false;
?>	
	<form method="post" action="AddAppointment.php" id="confirmform">
		<input type="hidden" name="Confirmed" value="true" >
		<?php
			echo '<h2 id="confirming">Confirming your information</h2>';
			echo '<ol>';
			foreach ($browserEntries as $key=>$entry)
			{
				if ($key=='PetType'){
					echo "<li><b>$key:</b> $PetType[$entry]</li>";
				}
				elseif ($key=='Breed'){
					echo "<li><b>$key:</b>". $ternary = ($entry == 0) ? " Null" : " $breed[$entry]" ."</li>";					
				}
				elseif ($key=='NeuteredOrSpayed'){
					echo "<li><b>$key:</b>". $ternary = ($entry == 0) ? " No" : " Yes" ."</li>";
				}
				elseif ($key == 'State') {
					echo "<li><b>$key:</b> $State[$entry]</li>"; 
				}
				elseif ($key == 'Email'){
					echo "<li><b>$key:</b>". $ternary = ($entry == 0) ? " Null" : " $entry" ."</li>";
				}
				elseif ($key == 'PetAge'){					
					echo "<li><b>$key:</b>". $ternary = ($entry == 0) ? " Null" : " $entry" ."</li>";
				}
				else{
					echo "<li><b>$key:</b> $entry</li>";
				}
			}
			echo "</ol>";
			unset ($dbEntries['Submitted']);		
			foreach ($dbEntries as $key=>$entry)
			{			
		?>
				<input type="hidden" name="<?php echo $key ?>"value="<?php echo $entry ?>" >
		<?php
			}
		?>
		<input type="submit" value="Confirm" id='groomingBTN'>
		<a href="grooming.php" class="link">Back</a>
	</form>
<?php
	}
	else{
		$dbEntries = $_POST;
	}
?>