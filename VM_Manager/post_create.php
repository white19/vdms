<?php
session_start();
$_SESSION['machine_name'] = $_POST["machine_name"];
$_SESSION['cpu'] = $_POST["cpu"];
$_SESSION['memory'] = $_POST["memory"];
$_SESSION['size']= $_POST["size"];
$_SESSION["System"]= $_POST["System"];
$_SESSION["boot"]= $_POST["boot"];
$_SESSION["Mac_Addr"]= $_POST["Mac_Addr"];
$_SESSION["VNC_Port"]= $_POST["VNC_Port"];
$_SESSION["UUID"] = exec('uuidgen');

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
$add_dir='mkdir /mnt/storage/'.$_POST['machine_name'];
//echo $start;
$add_disk='cp /mnt/storage/'.$_POST["size"].' /mnt/storage/'.$_POST['machine_name'].'/disk.img';
$get_file="wget http://vewms.w19.tw/VM_Manager/xmlCreator/xmlCreator.exe";
$can_exe_xml='chmod 777 xmlCreator.exe';
//$mv_exe_xml='mv xmlCreator.exe /mnt/storage/'.$_POST['machine_name'].'/xmlCreator.exe';
$create_xml='./xmlCreator.exe '.$_SESSION['machine_name'].' '.$_SESSION["UUID"].' '.$_SESSION['memory'].' '.$_SESSION['cpu'].' '.'/mnt/storage/'.$_POST['machine_name'].'/disk.img '.'/mnt/storage/ubuntu-12.04.1-server-i386.iso '.$_SESSION["Mac_Addr"].' '.$_SESSION["VNC_Port"].' > '.'/mnt/storage/'.$_POST['machine_name'].'/'.$_SESSION['machine_name'].'.xml';
$rm_creator='rm xmlCreator.exe ';


//$clone='virt-clone -o test_for_dorm -n '.$_POST['machine_name'].' --preserve-data -f /mnt/storage/'.$_POST['machine_name'].'/disk.img';

$stdout_stream = ssh2_exec($connection,$add_dir);
sleep(1);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
fclose($stderr_stream);


$stdout_stream = ssh2_exec($connection,$get_file);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
fclose($stderr_stream);
sleep(1);
$stdout_stream = ssh2_exec($connection,$can_exe_xml);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
fclose($stderr_stream);
sleep(1);
$stdout_stream = ssh2_exec($connection,$mv_exe_xml);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
fclose($stderr_stream);
sleep(1);

$stdout_stream = ssh2_exec($connection,$create_xml);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
fclose($stderr_stream);
sleep(1);
$stdout_stream = ssh2_exec($connection,$rm_creator);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
fclose($stderr_stream);
sleep(1);

$stdout_stream = ssh2_exec($connection,$add_disk);
$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
fclose($stderr_stream);
sleep(1);

?>
<a href="/VM_Manager/cp_done.php">確定創立機器請點我~按下後請稍待3分鐘。。。</a>
<?php
//$stdout_stream = ssh2_exec($connection,$clone);
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
                c 2023 Vistida. All Rights Reserved.
        </p>
</div>
</body>
</html>
