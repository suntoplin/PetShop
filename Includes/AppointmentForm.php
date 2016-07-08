<?php
	if (array_key_exists('GroomingID',$_POST))
	{
		$action = 'Edit';
		$formFlag = 'Updating';
	}
	else
	{
		$action = 'Add';
		$formFlag = 'Submitted';
	}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#Breed").hide();
		if ($( "#PetType" ).val()==1) {
	    	$("#Breed").show();
	    };	
	    
	    $('#PetType').change(function(){
	    	if($( "#PetType" ).val() !==0){
	    		$('.Error1').html('');
	    	};

	    	if ($( "#PetType" ).val()==1) {
	    		$("#Breed").show(100);
	    	}else{
	    		$("#Breed").val('0');
	    		$("#Breed").hide();
	    	};  	
	    });

    	$('#Breed').change(function(){
	    	if($( "#Breed" ).val() !==0){
	    		$('.Error2').html('');
	    	};
    	});
		   
	});
</script>

<form method="post" action="<?php echo $action ?>Appointment.php">
	<input type="hidden" name="<?php echo $formFlag ?>" value="true">
		<?php
			if (array_key_exists('GroomingID',$_POST))
			{
				echo "<input type='hidden' name='GroomingID' value='$groomingID'>";
			}
		?>
	<table id='addform'>
		<?php
			echo textEntry('First Name &#42;','FirstName',$dbEntries,$errors,25);
			echo textEntry('Last Name &#42;','LastName',$dbEntries,$errors,25);
			echo textEntry('Address &#42;','Address',$dbEntries,$errors,25);
			echo textEntry('City &#42;','City',$dbEntries,$errors,25);
			echo selectEntry3('State &#42;','State',$State,$errors,$dbEntries['State']);
			echo textEntry('Zip &#42;','Zip',$dbEntries,$errors,25);
			echo textEntry('Phone Number &#42;','PhoneNumber',$dbEntries,$errors,25);
			echo textEntry('Email','Email',$dbEntries,$errors,25);
			echo selectEntry('Pet Type &#42;','PetType',$PetType,$errors,$dbEntries['PetType']);
			echo selectEntry2('Breed &#42;','Breed',$breed,$errors,$dbEntries['Breed']);
			echo textEntry('Pet Name &#42;','PetName',$dbEntries,$errors,25);
			echo radioEntry('Neutered or Spayed','NeuteredOrSpayed',$dbEntries,$errors,array(1,0));
			echo textEntry('Pet Age','PetAge',$dbEntries,$errors,25);
		?>
		<tr>
			<td colspan="2" id='btnCenter'>
				<input type="submit" id='groomingBTN' value="<?php echo $action ?> an Appointment">
			</td>
		</tr>
	</table>
</form>
