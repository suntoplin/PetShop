<?php
/********* FORM PRESENTATION FUNCTIONS *********/

/*
	Function Name: textEntry
	Arguments: $display,$name,$entries,$errors,$size?
	Returns:
		one table row as string
*/
function textEntry($display,$name,$entries,$errors,$size=15)
{
	$returnVal = "
	<tr>
		<td align='right'>$display:</td>
		<td>
			<input type='text' name='$name' size='$size' id='$name'
			value='" . browserString($entries[$name]) . "'>";

	if (array_key_exists($name,$errors))
	{
		$returnVal .= '<span class="Error" style="white-space:nowrap">* ' .
				$errors[$name] .
			'</span>';
	}

	$returnVal .= '</td></tr>';

	return $returnVal;
}

/*
	Function Name: pwEntry
	Arguments: $pw1,$pw2,$errors,$size?
	Returns:
		table rows as string
*/
function pwEntry($pw1,$pw2,$errors,$size=10)
{
	$returnVal = "
	<tr>
		<td align='right'>Password:</td>
		<td>
			<input type='password' name='$pw1' size='$size' id='$pw1'>
		</td>
	</tr>
	<tr>
		<td align='right'>Repeat Password:</td>
		<td>
			<input type='password' name='$pw2' size='$size' id='$pw2'>
		</td>
	</tr>";

	if (array_key_exists('Password',$errors))
	{
		$returnVal .= addErrorRow('Password',$errors);
	}
	return $returnVal;
}

/*
	Function Name: textAreaEntry
	Arguments: $display,$name,$entries,$errors,$cols?,$rows?
	Returns:
		table rows as string
*/
function textAreaEntry($display,$name,$entries,$errors,$cols=45,$rows=5)
{
	$returnVal = "
	<tr>
		<td colspan='2'>$display:</td>
	</tr>
	<tr>
		<td colspan='2'>
			<textarea name='$name' cols='$cols' rows='$rows'>";
			$returnVal .= $entries[$name];
			$returnVal .= "</textarea>
		</td>
	</tr>";

	if (array_key_exists($name,$errors))
	{
		$returnVal .= addErrorRow($name,$errors);
	}
	return $returnVal;
}

/*
	Function Name: radioEntry
	Arguments: $display,$name,$entries,$errors,$values
	Returns:
		table rows as string
*/
function radioEntry($display,$name,$entries,$errors,$values)
{
	$returnVal = "
	<tr>
		<td align='right'>$display:</td>
		<td>";
		foreach ($values as $value)
		{
			if (array_key_exists($name,$entries) && $entries[$name]==$value)
			{
				$returnVal .= "<input type='radio' name='$name' value='$value' checked>";

			}
			else
			{
				$returnVal .= "<input type='radio' name='$name' value='$value'>";
			}
			if ($value == 1) {
				$returnVal .= " YES ";
			}
			else
			{
				$returnVal .= " NO ";
			}
		}
	$returnVal .= "</td>
			</tr>";

	if (array_key_exists($name,$errors))
	{
		$returnVal .= addErrorRow($name,$errors);
	}
	return $returnVal;
}



/*
	Function Name: selectEntry
	Arguments: $display,$name,$entries,$errors,$selected?
	Returns:
		table rows as string
*/
function selectEntry($display,$name,$options,$errors,$selected=0)
{
	$returnVal = "
	<tr>
		<td align='right'>$display:</td>
		<td>
			<select name='$name' id='$name' >
			<option value='0'>Choose one...</option>";
			foreach ($options as $key=>$option)
			{				
				if ($key == $selected)
				{
					$returnVal .= "<option value='$key' selected>
									$option</option>";
				}
				else
				{
					$returnVal .= "<option value='$key'>
									$option</option>";
				}
			}
			$returnVal .= "</select>";
		
		if (array_key_exists($name,$errors))
		{
			$returnVal .= '<span class="Error1" style="white-space:nowrap">*'.$errors[$name] .'</span>';
		}

	
	return $returnVal;
}

/*
	Function Name: selectEntry2
	Arguments: $display,$name,$entries,$errors,$selected?
	Returns:
		table rows as string
*/
function selectEntry2($display,$name,$options,$errors,$selected=0)
{
	$returnVal = 
	"<span>
			<select name='$name' id='$name' >
			<option value='0'>Choose one...</option>";
			foreach ($options as $key=>$option)
			{
				
			if ($key == $selected)
				{
					$returnVal .= "<option value='$key' selected>
									$option</option>";
				}
				else
				{
					$returnVal .= "<option value='$key'>
									$option</option>";
				}
			}
			$returnVal .= "</select>";
			if (array_key_exists($name,$errors))
			{
				$returnVal .= '<span class="Error2" style="white-space:nowrap">'.$errors[$name] .'</span>';
			}
		
			$returnVal .= "</span>
		</td>
	</tr>";
	return $returnVal;
}

/*
	Function Name: selectEntry
	Arguments: $display,$name,$entries,$errors,$selected?
	Returns:
		table rows as string
*/
// function selectEntry3($display,$name,$options,$errors,$selected=0)
// {	
// 	require 'init-state.php';
// 	$index = array_search($selected, $AbState);

// 	// $temp = (array_key_exists($name,$errors)) ? 'True' : 'False';
// 	// echo count($errors);
// 	// echo $index;
// 	// echo $temp;
// 	// echo $AbState[$selected];
// 	$returnVal = "
// 	<tr>
// 		<td align='right'>$display:</td>
// 		<td>
// 			<select name='$name' id='$name'>
// 			<option value='0'>Choose one...</option>";
// 			foreach ($options as $key=>$option)
// 			{				
// 				if ($key == $index)
// 				{
// 					$returnVal .= "<option value='$key'selected>
// 									$option</option>";
// 				}
// 				else
// 				{
// 					$returnVal .= "<option value='$key'>
// 									$option</option>";
// 				}
// 			}
// 			$returnVal .= "</select>";
		
// 		if (array_key_exists($name,$errors))
// 		{
// 			$returnVal .= '<span class="Error3" style="white-space:nowrap">*'.$errors[$name] .'</span>';
// 		}

// 	return $returnVal;
// }



function selectEntry3($display,$name,$options,$errors,$selected=0)
{
	//require 'init-state.php';
	//$index = array_search($selected, $State);
	//$temp = $errors[$name];
	$returnVal = "
	<tr>
		<td align='right'>$display:</td>
		<td>
			<select name='$name' id='$name' >
			<option value='0'>Choose one...</option>";
			foreach ($options as $key=>$option)
			{				
				if ($key == $selected)
				{
					$returnVal .= "<option value='$key' selected>
									$option</option>";
				}
				else
				{
					$returnVal .= "<option value='$key'>
									$option</option>";
				}
			}
			$returnVal .= "</select>";
		
		if (array_key_exists($name,$errors))
		{
			$returnVal .= '<span class="Error1" style="white-space:nowrap">*'.$errors[$name] .'</span>';
		}
			$returnVal .= "
		</td>
	</tr>";
	
	return $returnVal;
}
/*
	Function Name: addErrorRow
	Arguments: $name
	Returns:
		table row as string
*/
function addErrorRow($name,$errors)
{
	$errorRow = 
		"<tr>
			<td colspan='2' class='Error'>" . $errors[$name] ."</td>
		</tr>";
	return $errorRow;
}

?>





