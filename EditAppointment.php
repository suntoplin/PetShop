<?php
	require 'Includes/fnFormValidation.php';
	require 'Includes/fnFormPresentation.php';
	require 'Includes/fnStrings.php';
	require 'Includes/init.php';

	@$db = new mysqli('localhost','root','pwdpwd','pet_shop');
	
	if (mysqli_connect_errno()) { echo 'Cannot connect to database: ' . mysqli_connect_error();}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Employee</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<link rel="stylesheet" type="text/css" href="CSS/grooming.css">
<script type="text/javascript" src="JS/lib.js"></script>
<script type="text/javascript" src="JS/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php
		if (array_key_exists('Updating',$_POST)){
			require 'Includes/ProcessAppointment.php';
		}else{
			echo "<div class='grooming-title'>Editing</div>";
		}
		require 'Includes/AppointmentData.php';
		require 'Includes/AppointmentForm.php';

		$db->close();
	?>

</body>
</html>
