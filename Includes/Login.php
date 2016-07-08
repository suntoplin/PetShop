<?php

	$login = $_POST;
	if($login['Username'] == $root['Username'] && $login['Password'] == $root['Password']){
		$_SESSION['Username'] = $root['Username'];
		$_SESSION['Password'] = $root['Password'];
		require 'appointments.php';
	}else{
		echo '<div id="loginFail">You are not accessible to appointments reports </div>';
		echo '<div id="loginBack"><a href="admin.php" class="link" >Log in again</a></div>';
	}

?>
