<?php
	$GLOBALS['print_server'] = array(
		'url'=>'http://192.168.28.128:2333/print.php',
		'access_key'=>'your_key'
	);
	$GLOBALS['users'] = array(
		'user1'=>'password1',
		'user2'=>'password2'
	);
	$GLOBALS['language_whitelist'] = array(
		'cpp',
		'java',
		'python'
	);
	function auth($user,$pass) {
		if (array_key_exists($user,$GLOBALS['users']) && $GLOBALS['users'][$user] == $pass) {
			return true;
		}
		else return false;
	}
?>
