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
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<div id="logo">
				<h1>Virtual Device</br> Management System</h1>
			</div>
			<ul id="navigation">
				<li>
					<a href="index.html">Home</a>
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
					<a href="clear_session.php">Login/out</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="contents">
		<div id="about">
			<h3>VM list</h3>

<p>
			<?php
//require_once('../login/post.php');
//echo $_SESSION["user_name"];
//echo $_POST["user_name"];
?>
</br>
<?php
$stdout_stream = ssh2_exec($connection, "virsh list --all");
sleep(1);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);

?>
</br>
<?php
echo "------------";
while($line = fgets($stderr_stream)) { flush(); echo $line."\n"; }
echo "------------\n";
?>
</br>
<?php

while($line = fgets($stdout_stream)) { flush(); echo $line."\n
";
?>
</br>
<?php
}

fclose($stdout_stream);
?>
<form action="VM_Manager/cmd.php" method="post">
<p>
enter the machine domain:</br>
<input type="text" name="mc_name" value="">
</br>
<select name="opt">
<option value="-1">請選擇開機或關機</option>
<option value="2">查看詳細資訊</option>
<option value="1">開機</option>
<option value="0">關機</option>
</select>
</br>
<input type="submit" name="subm" value="go!!">
</form>
<form action="VM_Manager/default_option.php" method="post">
<input type="submit" name="create" value="另創一個新機器">
</p>
</form>
	
</p>
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
