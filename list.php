<?php
require 'helper.php';

$debug = false;

// list log files
$cmd = "ls /var/tmp/file_location_elk";
$output = "";
if(shell_execute($cmd, $debug, $output)) {
	if($debug)
		echo $output;
} else {
        header('Location: index.html');
        exit;
}

displayCheckBoxes("Files" , $output, 'log_file');

// list conf files
$cmd = "ls /var/tmp/logstash/";
$output = "";
if(shell_execute($cmd, $debug, $output)) {
	if($debug)
        	echo $output;
} else {
        header('Location: index.html');
        exit;
}
displayCheckBoxes("Config files" , $output, 'conf_file');


echo '<form id = "my_form" method="post" action="logstash.php">';
echo  '<input type =  "submit" value = "Run Logstash"/>';
echo '</form>';

?>
