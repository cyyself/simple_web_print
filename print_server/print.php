<?php
	include_once 'config.php';
	$author = $_POST['author'];
	$language = $_POST['language'];
	$code = $_POST['code'];
	$sign = $_POST['sign'];
	$result = array('status'=>1,'msg'=>'打印成功，请等待志愿者送代码');
	if ($sign == md5($GLOBALS['print_server']['access_key'].$author.$language.$code)) {
		file_put_contents($sign.'.md',"### ".$author."\n```".$language."\n".$code."\n```");
		if (system("pandoc ".$sign.".md -o ".$sign.".pdf ".$GLOBALS['print_server']['pandoc_args']) == 0) {
			/*
			if (system("\"".$GLOBALS['print_server']['acrord']."\" /t " . $sign.".pdf") == 0) {
				$result['status'] = 0;
			}
			else $result['msg'] = "adobe reader print error";
			*/
			if (system("PDFtoPrinter.exe ".$sign.".pdf") == 0) {
				$result['status'] = 0;
			}
			else $result['msg'] = "printer error";
		}
		else {
			$result['msg'] = 'pandoc execute error';
		}
		unlink($sign.".md");
		unlink($sign.".pdf");
	}
	else $result['msg'] = 'signature check failed';
	echo json_encode($result);
?>
