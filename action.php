<?php
require 'process.php';
include 'progress.html';

$ipaddr = $_POST['ip'];
$daemon = $_POST['daemonName'];
$timeout = rand(10,20); #sec
$debug = false;

session_start();
$_SESSION['ip'] = $_POST['ip'];

if($debug) {
	echo $daemon;
	echo $ipaddr;
	echo $_SESSION['ip'];
}

echo "\n Please wait... coping the log files from $ipaddr for $daemon\n";

$cmd = "/usr/share/nginx/elk_website/copy.sh $ipaddr $daemon $timeout";
$output = "";
if(shell_execute($cmd, $debug, $output)) {
	echo "Done copying file..\n";
	include 'list.php';
} else {
	header('Location: index.html');
	exit;
}
?>

