<?php

require 'process.php';
include 'progress.html';



$fileName = $_POST['log_file'];
$logstashConf =  $_POST['conf_file'];

if(!isset($fileName) && !isset($logstashConf)) {
	header('Location: index.html');
        exit;
}

# six supported instance
$instance = rand(1,6); #sec
$debug = true;
$cmd = "cat /var/tmp/lsInstance/$instance/refcount";

if(shell_execute($cmd, $debug, $output)) {
        if($debug)
                echo $output;
} 

$PATH = "/var/tmp/lsInstance/$instance/";
$cmd = "cat /var/tmp/file_location_elk/$fileName | /usr/share/logstash/bin/logstash --path.settings /etc/logstash/ -f /var/tmp/logstash/$logstashConf --path.data $PATH";

#debug
if($debug) {
	echo $fileName;
	echo $logstashConf;
	echo $cmd;
}

$output = "";

if(shell_execute($cmd, $debug, $output)) {
	if($debug)
		echo $output;
	include 'kibana.html';
} else {

}

?>
