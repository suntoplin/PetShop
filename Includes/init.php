<?php
	

	$showForm = true;

	$errors = array();

	$PetType = array();
	$PetType[1]='Dogs';
	$PetType[2]='Cats';
	$PetType[3]='Turtles';
	$PetType[4]='Rabbits';
	$PetType[5]='Ducks';
	$PetType[6]='Birds';
	$PetType[7]='Rats';
	$PetType[8]='Wolves';

	$breed = array();
	$breed[1] = "Bulldog";
	$breed[2] = "Shepherd";
	$breed[3] = "Maremmano";
	$breed[4] = "Retriever";
	$breed[5] = "Chihuahua";
	$breed[6] = "Pit bull";
	$breed[7] = "Bull Terrier";
	$breed[8] = "Boxer";
	$breed[9] = "Pointer";

	$dbEntries = array(	'FirstName'=>'',
						'LastName'=>'',
						'Address'=>'',
						'City'=>'',
						'State'=>'',
						'Zip'=>'',
						'PhoneNumber'=>'',
						'Email'=>'',
						'PetType'=>'',
						'Breed'=>'',
						'PetName'=>'',
						'NeuteredOrSpayed'=>'',
						'PetAge'=>'');	
	
	$browserEntries = array();

	$login = array(	'Username'=>'',
					'Password'=>'');
	$root = array('Username'=>'root',
				  'Password'=>'pwdpwd');


	$State = array();
	$State[1] = 'Alabama';
	$State[2] = 'Alaska'  ;
	$State[3] = 'Arizona' ;
	$State[4] = 'Arkansas';
	$State[5] = 'California';
	$State[6] = 'Colorado';
	$State[7] = 'Connecticut';
	$State[8] = 'Delaware';
	$State[9] = 'Florida';
	$State[10] = 'Georgia';
	$State[11] = 'Hawaii';
	$State[12] = 'Idaho';
	$State[13] = 'Illinois';
	$State[14] = 'Indiana';
	$State[15] = 'Iowa';
	$State[16] = 'Kansas';
	$State[17] = 'Kentucky';
	$State[18] = 'Louisiana';
	$State[19] = 'Maine';
	$State[20] = 'Maryland';
	$State[21] = 'Massachusetts';
	$State[22] = 'Michigan';
	$State[23] = 'Minnesota';
	$State[24] = 'Mississippi';
	$State[25] = 'Missouri';
	$State[26] = 'Montana';
	$State[27] = 'Nebraska';
	$State[28] = 'Nevada';
	$State[29] = 'New Hampshire';
	$State[30] = 'New Jersey';
	$State[31] = 'New Mexico';
	$State[32] = 'New York';
	$State[33] = 'North Carolina';
	$State[34] = 'North Dakota';
	$State[35] = 'Ohio';
	$State[36] = 'Oklahoma';
	$State[37] = 'Oregon';
	$State[38] = 'Pennsylvania';
	$State[39] = 'Rhode Island';
	$State[40] = 'South Carolina';
	$State[41] = 'South Dakota';
	$State[42] = 'Tennessee';
	$State[43] = 'Texas';
	$State[44] = 'Utah';
	$State[45] = 'Vermont';
	$State[46] = 'Virginia';
	$State[47] = 'Washington';
	$State[48] = 'West Virginia';
	$State[49] = 'Wisconsin';
	$State[50] = 'Wyoming';

	$AbState = array();
	$AbState[1] = 'AL';
	$AbState[2] = 'AK';
	$AbState[3] = 'AZ';
	$AbState[4] = 'AR';
	$AbState[5] = 'CA';
	$AbState[6] = 'CO';
	$AbState[7] = 'CT';
	$AbState[8] = 'DE';
	$AbState[9] = 'FL';
	$AbState[10] = 'FA';
	$AbState[11] = 'HI';
	$AbState[12] = 'ID';
	$AbState[13] = 'IL';
	$AbState[14] = 'IN';
	$AbState[15] = 'IA';
	$AbState[16] = 'KS';
	$AbState[17] = 'KY';
	$AbState[18] = 'LA';
	$AbState[19] = 'ME';
	$AbState[20] = 'MD';
	$AbState[21] = 'MA';
	$AbState[22] = 'MI';
	$AbState[23] = 'MN';
	$AbState[24] = 'MS';
	$AbState[25] = 'MO';
	$AbState[26] = 'MT';
	$AbState[27] = 'NE';
	$AbState[28] = 'NV';
	$AbState[29] = 'NH';
	$AbState[30] = 'NJ';
	$AbState[31] = 'NM';
	$AbState[32] = 'NY';
	$AbState[33] = 'NC';
	$AbState[34] = 'ND';
	$AbState[35] = 'OH';
	$AbState[36] = 'OK';
	$AbState[37] = 'OR';
	$AbState[38] = 'PA';
	$AbState[39] = 'RI';
	$AbState[40] = 'SC';
	$AbState[41] = 'SD';
	$AbState[42] = 'TN';
	$AbState[43] = 'TX';
	$AbState[44] = 'UT';
	$AbState[45] = 'VT';
	$AbState[46] = 'VA';
	$AbState[47] = 'WA';
	$AbState[48] = 'WV';
	$AbState[49] = 'WI';
	$AbState[50] = 'WY';

?>
