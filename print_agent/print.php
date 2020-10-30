<?php
	session_start();
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>打印系统</title>
</head>
<body>
<?php
	include_once 'config.php';
	if (empty($_SESSION['username'])) {
		header("Location: login.php");
		exit(0);
	}
	if (in_array($_POST['language'],$GLOBALS['language_whitelist'])) {
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$GLOBALS['print_server']['url']);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,array(
			'author'=>$_SESSION['username'],
			'language'=>$_POST['language'],
			'code'=>$_POST['code'],
			'sign'=>md5($GLOBALS['print_server']['access_key'].$_SESSION['username'].$_POST['language'].$_POST['code'])
		));
		$res = json_decode(curl_exec($ch),true);
		if (empty($res['msg'])) $res['msg'] = "print server error";
		echo htmlspecialchars($res['msg']);
	}
	else {
		echo "语言选择错误";
	}
?>
</body>
