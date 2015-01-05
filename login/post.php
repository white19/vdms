<?php
session_start();
//echo $_POST["addr"];
//echo $_POST["user_name"];
//echo $_POST["passwd"];

$connection = ssh2_connect($_POST["addr"], 22);
$_SESSION['addr'] = $_POST["addr"];
$_SESSION['user_name'] = $_POST["user_name"];
$_SESSION['passwd']= $_POST["passwd"];

echo $_SESSION['user_name'];
?>
<center>
<?php
if (ssh2_auth_password($connection,$_POST["user_name"], $_POST["passwd"])) {
  echo "登入成功!\n";
	header("Location: http://vdms.w19.tw/");
	exit;
} 
else {
	header("Location: login_fail.php");
        exit;
}

?>
</center>
