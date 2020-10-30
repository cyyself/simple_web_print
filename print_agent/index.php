<?php
	include_once 'config.php';
	session_start();
	if (empty($_SESSION['username'])) {
		header("Location: login.php");
		exit(0);
	}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>打印系统</title>
</head>
<body>
	<h1>打印系统</h1>
	<h5>当前用户：<?php echo $_SESSION['username']; ?> <a href="logout.php">注销</a></h5>
	<center>
		<form action="print.php" method="POST">
			打印语言：
			<select name="language"><?php 
					foreach ($GLOBALS['language_whitelist'] as $each) {
						echo sprintf("<option value=\"%s\">%s</option>",$each,$each);
					}
			?>
			</select>
			<br>
			<textarea name="code" style="width: 70%; height: 200px" placeholder="your code..."></textarea>
			<br>
			<input type="submit" value="提交打印" />
		</form>
		<hr>
		Powered by <a href="https://github.com/cyyself/simple_web_print">cyyself/simple_web_print</a>
	</center>
</body>