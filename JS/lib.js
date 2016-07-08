function observeEvent(target, eventName, observerFunction, useCapture){
	//setting useCapture to true will not affect IE8 and earlier
	if (target.addEventListener) {
		target.addEventListener(eventName, observerFunction, useCapture);
	} else if (target.attachEvent) {
		target.attachEvent("on" + eventName, observerFunction);
	}
}

function stopPropagation(e) {
	e = e || window.event;
	if (e.stopPropagation) {
		e.stopPropagation();
	} else {
		e.cancelBubble = true;
	}
}

function unObserveEvent(target, eventName, observerFunction, useCapture){
	if (target.removeEventListener) {
		target.removeEventListener(eventName, observerFunction, useCapture);
	} else if (target.detachEvent) {
		target.detachEvent("on" + eventName, observerFunction);
	}
}

function getElementsByClassName(node,classSearch) {
	if (node.getElementsByClassName) { //returns nodeList
		return node.getElementsByClassName(classSearch);
	} else { //returns array
		var classElements = [];
		var elems = node.getElementsByTagName("*");
		var pattern = new RegExp("(^|\\s)" + classSearch + "(\\s|$)");
		for (var i in elems) {
			if (pattern.test(elems[i].className) ) {
				classElements.push(elems[i]);
			}
		}
		return classElements;
	}
}

function hasClassName(elem,classSearch) {
	if (elem.classList && elem.classList.contains) {
		return elem.classList.contains(classSearch);
	} else if ( !elem.className.length ) {
		return false;
	} else {
		var pattern = new RegExp("(^|\\s)" + classSearch + "(\\s|$)");
		return pattern.test(elem.className);
	}
}

function addClass(elem,newClass) {
	if (elem.classList && elem.classList.add) {
		elem.classList.add(newClass);
	} else { //for older browsers
		if ( !hasClassName(elem,newClass) ) {
			elem.className += " " + newClass;
		}
	}
}

function removeClass(elem,classSearch) {
	if (hasClassName(elem,classSearch)) {
		if (elem.classList && elem.classList.remove) {
			elem.classList.remove(classSearch);
		} else { //for older browsers
			var pattern = new RegExp("(\\s|^)" + classSearch + "(\\s|$)");
			elem.className=elem.className.replace(pattern," ");
		}
	}
}

function removeElement(elem) {
	elem.parentNode.removeChild(elem);
	elem = null;
}

function removeAllChildren(parent) {	
	while (parent.hasChildNodes()) {
		removeElement(parent.childNodes[0]);
	}
}

function removeWhitespace(node,recursive) {
	var childNode;
	for (var i=node.childNodes.length-1; i>=0; i--) {
		childNode = node.childNodes[i];
		if (childNode.nodeType == 3 && !(/\S/.test(childNode.nodeValue))) {
			node.removeChild(childNode);
		} else if (recursive && childNode.hasChildNodes()) {
			removeWhitespace(childNode,true);
		}
	}
}

function getTarget(e) {
	e = e || window.event;
	var target = e.target || e.srcElement;
	return target;
}

function appendOptionToSelect(sel,opt) {
	try {
		sel.add(opt,null);
	} catch (e) {
		//for IE7 and earlier
		if (e.name == "TypeError") {
			sel.options[sel.options.length] = opt;
		} else {
			throw e;
		}
	}	
}

function getCurrentStyle(elem,property) {
	if (window.getComputedStyle) {
		var	computedStyle = getComputedStyle(elem,null);
		return computedStyle[property];
	} else if (elem.currentStyle) {
		return elem.currentStyle[property];
	}
}

function addRow(tableId, cells){
	var tableElem = document.getElementById(tableId);
	var newRow = tableElem.insertRow(tableElem.rows.length);
	var newCell;
	for (var i = 0; i < cells.length; i++) {
		newCell = newRow.insertCell(newRow.cells.length);
		newCell.innerHTML = cells[i];
	}
	return newRow;
}

function deleteRow(tableId, rowNumber){
	var tableElem = document.getElementById(tableId);
	if (rowNumber >= 0 && rowNumber < tableElem.rows.length) {
		tableElem.deleteRow(rowNumber);
		return true;
	} else {
		return false; //no row to delete
	}
}

/*
	Function Name: FadeElem
	Arguments: ELEM,R1,G1,B1,R2,G2,B2
	Action: Turns element ELEM into some color rgb(R1,G1,B1) and fades it to rgb(R2,B2,G2)
	Returns: nothing
	Note: Used to draw attention to an area of the screen that has changed.
*/
function fadeElem(elem,R1,G1,B1,R2,G2,B2) {
	r1=R1 || 255;
	r2=R2 || 255;
	g1=G1 || 255;
	g2=G2 || 255;
	b1=B1 || 0;
	b2=B2 || 255;
	
	elem.style.backgroundColor="rgb("+r1+","+g1+","+b1+")";
	elem.style.borderStyle="dashed";
	elem.style.display="block";
	
	if (r1 > r2) {
		r1--;
	} else if (r1 < r2) {
		r1++;
	}
	
	if (g1 > g2) {
		g1--;
	} else if (g1 < g2) {
		g1++;
	}
	
	if (b1 > b2) {
		b1--;
	} else if (b1 < b2) {
		b1++;
	}

	if (r1 != r2 || g1 != g2 || b1 != b2) {
		setTimeout(function() {
			fadeElem(elem,r1,g1,b1,r2,g2,b2);
		},5);
	} else {
		elem.innerHTML="";
		elem.style.display="none";
	}
}

function addChild(doc, parent, child, childText, attributes) {
	if (typeof(child) == "string") {
		childNode = doc.createElement(child);
	} else {
		childNode = child;
	}
	
	if (typeof childText == "string") {
		childTextNode = doc.createTextNode(childText);
		childNode.appendChild(childTextNode);
	}
	
	if (attributes) {
		for (var att in attributes) {
			childNode.setAttribute(att,attributes[att]);	
		}
	}
	
	parent.appendChild(childNode);
	return childNode;
}

/*
	Function Name: checkName
	Arguments: NAME
	Action: Validate NAME are strings
	Returns: Boolean
	Note: 
*/

function checkName(NAME){
	var reName = /^[A-Za-z]+$/;
	return reName.test(NAME);
}

/*
	Function Name: checkEmail
	Arguments: EMAIL
	Action: Validate EMAIL
	Returns: Boolean
	Note: 
*/
function checkEmail(EMAIL){
	 var reEmail = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;
	 return reEmail.test(EMAIL);
}


/*
	Function Name: selection
	Arguments: NONE
	Action: Create a second selection if 'Dogs' is choosen.
	Returns: nothing
	Note: Used to draw attention to an area of the screen that has changed.
*/
function selection(){
	var PetType = document.getElementById('PetType')
	var selection = PetType.options[PetType.selectedIndex].text;
	var breed = new Array(); 
		breed[1] = "Shepherd";
		breed[2] = "Maremmano";
		breed[3] = "Retriever";
		breed[4] = "Chihuahua";
		breed[5] = "Pit bull";
		breed[6] = "Bull Terrier";
		breed[7] = "Boxer";
		breed[8] = "Pointer";
		breed[9] = "Pug";
	if (selection == 'Dogs') {
		var breedtype = '<select name="Breed" id="Breed"><option value="0">Choose one...</option>';
		for (var i = 1; i < breed.length; i++) {
			breedtype += "<option value='"+breed[i]+"'>" +breed[i]+ "</option>";
		};
		breedtype += '</select>';
		$('#breed').html(breedtype);
	}
}

/*
	Function Name: initialize
	Arguments: NONE
	Action: Create Google map
	Returns: NONE
*/
function initialize() {
  var mapProp = 
  {
    center: new google.maps.LatLng(40.493533, -74.423022),
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  
  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
  
  var marker = new google.maps.Marker
  ({
    position: new google.maps.LatLng(40.493533, -74.423022), 
    map: map,
    title: "Sandy's Pet shop"
  });
}

/*
	Function Name: ContactUs
	Arguments: NONE
	Action: Handle window effects in contact.php
	Returns: NONE
*/

function ContactUs(){
	function checkStatus(error){
		var btnSubmit = document.getElementById('btnSubmit');
		if(error >3){ btnSubmit.disabled = false;}
	}

	$(document).ready(function() {
		var contact = document.getElementById('contact');
		var btnSubmit = document.getElementById('btnSubmit');
		var error = 0;
		var check = "<img src='Images/check.png' class='checkmark'>";
		var uncheck = "<img src='Images/uncheck.png' class='checkmark'>";
		btnSubmit.disabled = true;

		observeEvent(contact[0], "blur",function(){
			if (checkName(this.value)) { $("#msg0").html(check); error++;}
			else { $("#msg0").html(uncheck);  error--;}
			checkStatus(error);
		});  

		observeEvent(contact[1], "blur",function(){
			if (checkName(this.value)) { $("#msg1").html(check); error++;}
			else { $("#msg1").html(uncheck);  error--;}
			checkStatus(error);
		}); 

		observeEvent(contact[2], "blur",function(){
			if (checkEmail(this.value)) { $("#msg2").html(check); error++;}
			else { $("#msg2").html(uncheck);  error--;}
			checkStatus(error);
		});

		observeEvent(contact[3], "blur",function(){
			if (contact[3].value.length > 0) { $("#msg3").html(check); error++;}
			else { $("#msg3").html(uncheck);  error--;}
			checkStatus(error);
		});

		observeEvent(btnSubmit,"mouseover",function() {
			btnSubmit.style.color = '#026';
			btnSubmit.style.borderColor = '#026';
			btnSubmit.style.backgroundColor = 'white';
			btnSubmit.style.cursor = 'pointer';	
		});

		observeEvent(btnSubmit,"mouseout",function() {
			btnSubmit.style.color = 'hsl(0, 0%, 70%)';
			btnSubmit.style.borderColor = 'hsl(0, 0%, 70%)';
			btnSubmit.style.cursor = 'none';		
		});

	     //Submitting data to server(mail.php) by Ajax
		$('#btnSubmit').click(function() {
			$.ajax({
				type: "post",
				url: "Includes/mail.php",
				data: {
					FirstName:  contact[0].value,
					LastName:   contact[1].value,
					Email: 		contact[2].value,
					Message: 	contact[3].value
				},
				dataType: "text"
			}).done(function(data){
				// Show the results
				$("#results").html(data);
				// clean precheck message 
				for (var i = 0; i < contact.length; i++) { 
					$('#msg'+i).html("");
					contact[i].value = '';
				};
				// Hide Submit button
				$('#btnSubmit').hide(1000);
				// Redirect to contact.php after 5 second.
				window.setTimeout(function(){window.location.href = 'contact.php';}, 5000);
			});
			return false;
		});
	});
}





