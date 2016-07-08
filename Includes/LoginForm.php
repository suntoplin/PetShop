<h1>Log in</h1>
<form method="post" action="admin.php">
	<input type="hidden" name="LoggingIn" value="true">
	<table id='loginform'>
		<?php
			echo textEntry('Username','Username',$login,$errors,15);
			echo pwEntry('Password','Password',$errors,15,false);
		?>
		<tr>
			<td colspan="2" class='btnlogin' >
				<input type="submit" value="Go" class='btn'>
			</td>
		</tr>
	</table>
</form>
