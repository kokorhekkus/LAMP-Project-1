<?php

require('conf.php');

//reindex an array to contiguous integer keys
function reindex_array($arr) {
	foreach ($arr as $val) {
		$ret_arr[] = $val;
	}  
	return $ret_arr;
}

// converts an integer to min:sec format
// returns -1 on error,
function sec_to_min($secs) {
	
	if (!is_numeric($secs)) { 
		return 0; 
	}

	if ($secs < 60) {
		return "00:$secs";
	}

	$mins = floor($secs / 60);
	$secs_left = $secs % 60;

	if ($mins < 10) {
		$mins = "0$mins";
	}

	if ($secs_left >= 10) {
		return "${mins}:${secs_left}";
	}

	if ($secs_left < 10) {
		return "${mins}:0${secs_left}";
	}
	
}

// returns 1 if email address is valid, 0 if not
function check_email($email) {
	$re = '^(.+)@(.+)\.(.+)$';

	if (ereg($re,$email,$regs)) {
		return 1;
	} else {
		return 0;
	}
}

// cookie stuff to log a user in
function set_login_ck($client_id) {
	global $LOGINTIME;
	setcookie("lp1_ck", $client_id, time() + $LOGINTIME);
}

// returns 1 if user is logged in
function is_logged_in() {
	$ck = $_COOKIE["lp1_ck"];

	if (is_numeric($ck)) {
		return 1;
	} else {
		return 0;
	}
}

?>
