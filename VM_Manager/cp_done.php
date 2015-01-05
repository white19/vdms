<?php
sleep(10);//////////////////////////////////////////////////////
session_start();
$connection = ssh2_connect($_SESSION["addr"], 22);
if (ssh2_auth_password($connection,$_SESSION["user_name"], $_SESSION["passwd"])) {
} else {
  die('連線失敗，請重試');
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
//$clone='virt-clone -o test_for_dorm -n '.$_SESSION['machine_name'].' --preserve-data -f /mnt/storage/'.$_SESSION['machine_name'].'/disk.img';
$create = 'virsh create /mnt/storage/'.$_SESSION["machine_name"].'/'.$_SESSION["machine_name"].'.xml';
$define = 'virsh define /mnt/storage/'.$_SESSION["machine_name"].'/'.$_SESSION["machine_name"].'.xml';
$stdout_stream = ssh2_exec($connection,$create);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
fclose($stderr_stream);
sleep(1);
$stdout_stream = ssh2_exec($connection,$define);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
fclose($stderr_stream);
sleep(1);
//$stdout_stream = ssh2_exec($connection,$create);
//$sleep(1);
//$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
//fclose($stderr_stream);
echo "機器創建完畢!";

?>
</center>
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
