<?php

# this will conatail functions to list the html code for listing and checkboxes
$deb = false;

function displayCheckBoxes($heading, $array, $id) {
#	echo "<html>";
#	echo "<h1> $heading <\h1>";
	foreach ( explode("\n", $array) as $stud) {
		if($deb)
			echo $stud;
		if(strlen($stud)>0)
			echo "<br/><input type='checkbox' name=\"$id\" value='$stud' form='my_form' />$stud<br>";
	}
} 
?>
