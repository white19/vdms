<?php
session_start();
//echo $_POST["addr"];
//echo $_POST["user_name"];
//echo $_POST["passwd"];

$connection = ssh2_connect($_SESSION["addr"], 22);

if (ssh2_auth_password($connection,$_SESSION["user_name"], $_SESSION["passwd"])) {
} else {
	die('Authentication Failed...');
}
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
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
<li class="selected">
<a href="/index.html">Home</a>
</li>
<li>
<a href="/about.html">About</a>
</li>
<li>
<a href="/vm.php">VM</a>
</li>
<li>
<a href="/ovs.php">Virtual switch</a>
</li>

<li>
<a href="/clear_session.php">Login/out</a>
</li>
</ul>
</div>
</div>
<div id="contents">
<div id="about">
<center>

<?php
//echo $_POST['opt'];
$info='virsh '.'dominfo '.$_POST['mc_name'];
$start='virsh '.'start '.$_POST['mc_name'];
//echo $start;
$shutdown='virsh '.'destroy '.$_POST['mc_name'];
if($_POST['opt']=="1"){
$stdout_stream = ssh2_exec($connection,$start);
echo "機器已開機";
}
elseif($_POST['opt']=="2")
$stdout_stream = ssh2_exec($connection,$info);
else{
$stdout_stream = ssh2_exec($connection,$shutdown);
echo	"機器已關機";
}
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
</center>
</div>
</div>
<div id="footer">
<div id="connect">
<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a><a href="http://www.freewebsitetemplates.com/misc/contact/" target="_blank" class="email"></a><a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a><a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a>
</div>
<p>
© 2023 Vistida. All Rights Reserved.
</p>
</div>
</body>
</html>
