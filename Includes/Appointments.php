<?php
	@$db = new mysqli('localhost','root','pwdpwd','pet_shop');
	
	if (mysqli_connect_errno()){echo 'Cannot connect to database: ' . mysqli_connect_error();}
	else
		{
			$query = 'SELECT * FROM grooming';
			$result = $db->query($query);
			$numResults = $result->num_rows;

			echo "<div id='Appointment-title'>$numResults Appointment</div>";
			echo '<div style="overflow-x:auto;">'; 	
		 	echo '<table id="Appointment">';
		 	echo '<tr>';
		 	echo '<th>First Name</th>';
		 	echo '<th>Last Name</th>';
			echo '<th>Address</th>';
			echo '<th>City</th>';
			echo '<th>State</th>';
			echo '<th>Zip</th>';
			echo '<th>Phone Number</th>';
			echo '<th>Email</th>';
			echo '<th>Pet Type</th>';
			echo '<th>Breed</th>';
			echo '<th>Pet Name</th>';
			echo '<th>Neutered or Spayed</th>';
			echo '<th>Age</th>';
			echo '<th>Edit</th>';
			echo '<th>Delete</th>';

			require 'Includes/init.php';
			while ($row = $result->fetch_assoc())
				{
					echo '<tr>';
					echo '<td>' . $row['FirstName'] . '</td>';
					echo '<td>' . $row['LastName'] . '</td>';
					echo '<td>' . $row['Address'] . '</td>';
					echo '<td>' . $row['City'] . '</td>';
					echo '<td>' . $AbState[$row['State']] . '</td>';
					echo '<td>' . $row['Zip'] . '</td>';
					echo '<td>' . $row['PhoneNumber'] . '</td>';
					echo '<td>' . $row['Email'] . '</td>';
					echo '<td>' . $PetType[$row['PetType']] . '</td>';
					echo '<td>' . $temp = ($row['Breed'] == 0)? ' Null': $breed[$row['Breed']] . '</td>';
					echo '<td>' . $row['PetName'] . '</td>';
					echo '<td>' . $temp = ($row['NeuteredOrSpayed'] == 0)? ' No': 'Yes' . '</td>';
					echo '<td>' . $row['PetAge'] . '</td>';
					echo '<td><form method="post" action="EditAppointment.php">
							<input type="hidden" name="GroomingID"
								value="' . $row['GroomingID'] . '">
							<input type="submit" name="Editing" value="Edit">
							</form></td>';
					echo '<td><form method="post" action="Includes/DeleteAppointment.php">
							<input type="hidden" name="GroomingID"
								value="' . $row['GroomingID'] . '">
							<input type="submit" name="Deleting" value="Delete">
							</form></td>';
					echo '</tr>';
				}
			echo '</table>';
			echo '</div>';
			$result->free();
			$db->close();
		}
?>