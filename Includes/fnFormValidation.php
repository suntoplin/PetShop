<?php
/********* FORM VALIDATION FUNCTIONS *********/

/*
	Function Name: checkLength
	Arguments: $text,$min?,$max?,$trim?
	Returns:
		false if $text has fewer than $min characters
		false if $text has more than $max characters
		true otherwise
*/
function checkLength($text,$min=1,$max=10000,$trim=true)
{
	if ($trim)
	{
		$text = trim($text);
	}
	if (strlen($text) < $min || strlen($text) > $max)
	{
		return false;
	}
	return true;
}


/*
	Function Name: checkEmail2
	Arguments: $email
	Returns:
		false if $email has fewer than 6 characters
		false if $email does not contain @ symbol
		false if $email does not contain a period (.)
		false if the last @ symbol comes after the last period (.)
		true otherwise
*/
function checkEmail2($email)
{
	$email = trim($email);
	if (strlen($email) == 0) 
	{
		return true;
	}
	else
	{
		if (!checkLength($email,6))
		{
			return false;
		}
		elseif (!strpos($email,'@'))
		{
			return false;
		}
		elseif (!strpos($email,'.'))
		{
			return false;
		}
		elseif (strrpos($email,'.') < strrpos($email,'@'))
		{
			return false;
		}
		return true;
	}
}


/*
	Function Name: checkEmail
	Arguments: $email
	Returns:
		false if $email has fewer than 6 characters
		false if $email does not contain @ symbol
		false if $email does not contain a period (.)
		false if the last @ symbol comes after the last period (.)
		true otherwise
*/
function checkEmail($email)
{
	$email = trim($email);
	if (!checkLength($email,6))
	{
		return false;
	}
	elseif (!strpos($email,'@'))
	{
		return false;
	}
	elseif (!strpos($email,'.'))
	{
		return false;
	}
	elseif (strrpos($email,'.') < strrpos($email,'@'))
	{
		return false;
	}
	return true;
}



// 	Function Name: checkNumber
// 	Arguments: $num
// 	Returns:
// 		false if $num is not a numeric.
// 		false if $num less is a negative integer.
// 		true otherwise

// function checkNumber($num)
// {	
// 	if (is_numeric($num) && $num > 0)
// 	{
// 		return true;
// 	}
// 	if (strlen($num) == 0)
// 	{
// 		return true;
// 	}
// 	return false;
// }

?>
