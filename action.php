<?php 
	if(!isset($_GET['action'])) die();

	session_start();
	if(!isset($_SESSION['user'])) $_SESSION['user'] = 0; 

	switch ($_GET['action']) {
		case 'S':
			$file = "conta.txt";
			$fh = fopen($file,"r") or die();
			$counterVal = fread($fh, filesize($file));
			fclose($f);
			$counterVal++;
			$fh = fopen($file, "w") or die();
			fwrite($fh, $counterVal);
			fclose($fh);
			break;
		case 'U':
			$_SESSION['user']++;
			break;
		default:
			die();
			break;
	}
?>