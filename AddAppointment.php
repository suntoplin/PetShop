<?php
	require 'Includes/fnFormValidation.php';
	require 'Includes/fnFormPresentation.php';
	require 'Includes/fnStrings.php';
	require 'Includes/init.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Add Appointment</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<link rel="stylesheet" type="text/css" href="CSS/grooming.css">
<script type="text/javascript" src="JS/lib.js"></script>
<script type="text/javascript" src="JS/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php
		
		if (array_key_exists('Submitted',$_POST)){
			require 'Includes/ProcessAppointment.php';
		}
		
		if (array_key_exists('Confirmed',$_POST)){
			require 'Includes/InsertAppointment.php';
		}

		if ($showForm)
		{
			echo '<div class="grooming-title">Make an Appointment</div>';
			require 'Includes/AppointmentForm.php';
			echo '<a href="grooming.php" class="link">Back to grooming services</a>';
		}

	?>
</body>
</html>
