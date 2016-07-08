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
<title>Grooming Services</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<link rel="stylesheet" type="text/css" href="CSS/grooming.css">
<script type="text/javascript" src="JS/lib.js"></script>
<script type="text/javascript" src="JS/jquery-1.11.1.min.js"></script>

</head>
<body>
	<header><?php require 'Includes/header.php'; ?></header>

	<div id='container'> 
		<div class='grooming-title'>
			<span >SPA Services</span>
			<img src="Images/dogbath4.png" class='groomingImgTitle' alt="Image of dog">
		</div>
		<div class='grooming-content'>
			<div class='grooming-block'>
				<img src="Images/dogbath2.gif" class='groomingImgBath' alt='Image of bathing'>
				<div class='table-txt-title'>Bath &#36; 39 </div>
				<div class='table-txt-content'>
					Include bath with organic shampoo, 10-minutes blow dry, nail trim & brush out.
				</div>				
			</div>
			<div class='grooming-block'>
				<img src="Images/doghaircut.jpg" class='groomingImgBath' alt='Images of haircut'>
				<div class='table-txt-title'>Haircut &#36; 49 </div>
				<div class='table-txt-content'>
					Include bath with organic shampoo, 10-minutes blow dry, nail trim & brush out.
					Stylic haircut fits your pet's personality.
				</div>

			</div>

		</div>
		<div class='grooming-title'> 
			 <img src="Images/petcare.jpeg" class='groomingImgTitle' alt='Image of pets'>
			 <span>Body Care</span>
		</div>
		<div class='grooming-content'>
			<div class='grooming-block'>
				<img src="Images/dog-face.png" class='groomingImgBath' alt='Image of dog-face'>
				<div class='table-txt-title'>Face Care &#36; 10 </div>
				<div class='table-txt-content'>
					Cleaning ears, eyes and teeth brushing.
					Ensuring your pet a charming looking with shining teeth.   
				</div>
			</div>
			<div class='grooming-block'>
				<img src="Images/dog-grooming.jpg" class='groomingImgBath' alt='Image of dof-grooming'>
				<div class='table-txt-title'>Skin & Hair Care &#36; 15</div>
				<div class='table-txt-content'>
					Shiny, healthy, and unmatted coat.
				</div>
			</div>
			<div class='grooming-block'>
				<img src="Images/dognail.jpeg" class='groomingImgBath' alt='Image of trimming nails'>
				<div class='table-txt-title'>Nails & Paws Care &#36; 15 </div>
				<div class='table-txt-content'>
					Shiny, healthy nails; moist, uncracked pads.
				</div>
			</div>
		</div>
		<div class='grooming-title'>Make an Appointment</div>
		<?php
			if (array_key_exists('Submitted',$_POST))
			{
				require 'Includes/ProcessAppointment.php';
			}
			elseif (array_key_exists('Confirmed',$_POST))
			{
				require 'Includes/InsertAppointment.php';
			}

			if ($showForm)
			{
				require 'Includes/AppointmentForm.php';
			}
		?>
	</div>



	<footer><?php require 'Includes/footer.php'; ?></footer>

</body>
</html>