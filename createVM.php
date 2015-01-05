<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
session_start();
//echo $_POST["addr"];
//echo $_POST["user_name"];
//echo $_POST["passwd"];

$connection = ssh2_connect($_SESSION["addr"], 22);

if (ssh2_auth_password($connection,$_SESSION["user_name"], $_SESSION["passwd"])) {}
 else {
        header("Location: /continue.php");
        exit;

}
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Virtual Device Management System</title>
	<link rel="stylesheet" href="/css/style.css" type="/text/css">
</head>
<body>
	<div id="header">
		<div>
			<div id="logo">
				<h1>Virtual Device</br> Management System</h1>
			</div>
			<ul id="navigation">
				<li>
					<a href="/index.html">Home</a>
				</li>
				<li>
					<a href="about.html">About</a>
				</li>
				<li class="selected">
					<a href="vm.php">VM</a>
				</li>
				<li>
					<a href="ovs.php">Virtual switch</a>
				</li>
				
				<li>
					<a href="contact.html">Login/out</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="contents">
		<div id="about">
			<h3>新增虛擬機器</h3></br></br>
<form action="cmd.php" method="post">
<p>命名新機器:
<input type="text" name="mc_name" value=""></p>
<p>輸入MAC卡號:
<input type="text" name="mac" value="00:00:00:00"></p>
<p>選擇虛擬機器需求
<select name="opt">
<option value="-1">預設選項</option>
<option value="2">硬碟大空間</option>
<option value="1">大量運算需求</option>
<option value="0">自訂</option>
</select>
</p>
<input type="submit" name="subm" value="建立!!">
</form>

	
		</div>
	</div>
	<div id="footer">
		<div id="connect">
			<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a><a href="http://www.freewebsitetemplates.com/misc/contact/" target="_blank" class="email"></a><a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a><a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a>
		</div>
		<p>
			c 2023 Vistida. All Rights Reserved.
		</p>
	</div>
</body>
</html>
