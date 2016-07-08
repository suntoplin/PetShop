<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Store Location</title>
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
	<script type="text/javascript" src="JS/lib.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAa1kVDDrqY27IOoMaWfLOZUk0ycSVpIj8&language=EN" type="text/javascript"></script>
	<script>
		google.maps.event.addDomListener(window,'load',initialize);
	</script>
</head>
<body>	
	<header><?php require 'Includes/header.php'; ?></header>

	<div id="location">
		<div class= 'location-title'>Opening Hours</div>
			<span class='location-content'>Mon - Fri 11:00am - 9:00pm | Sat - Sun 10:00am - 6:00pm</span>
		<div class= 'location-title'>Address</div>
			<span class='location-content'>Donaldson street, Highland Park, NJ 08904</span>
	</div>	
	<div id="googleMap-outer">
		<div id="googleMap" class="Map">Loading map please wait!!</div>
	</div>

	<footer><?php require 'Includes/footer.php'; ?></footer>
</body>
</html>