<?php
	include_once 'config.php';
	session_start();
	$msg = "请登录";
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		if (auth($_POST['username'],$_POST['password'])) {
			$_SESSION['username'] = $_POST['username'];
			header("Location: index.php");
		}
		else $msg = "用户名或密码不正确";
	}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>登录</title>
</head>
<body>
	<h1>打印系统登录</h1>
	<p><?php echo $msg; ?></p>
	<form action="login.php" method="POST">
		<input type="text" name="username" placeholder="用户名" />
		<br>
		<input type="password" name="password" placeholder="密码" />
		<br>
		<input type="submit" value="登录" />
	</form>
</body>