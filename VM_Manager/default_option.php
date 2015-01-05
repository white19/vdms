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
			<p><center>
        <form action="post_create.php" method="post">
        請輸入機器名稱 : <input type="text" name="machine_name" value=""></br></br>
        請選擇虛擬機器建立方式 :
                <select name="type"></br>
                 <option Value="0">推薦預設值</option>
                 <option Value="1">大硬碟</option>
		 <option value="2">較佳運算</option>
		 <option value="3">自訂選項</option>
                </select></br></br>
        輸入網路卡卡號：<input type="text" name="Mac_Addr" value=""></br></br>
        輸入VNC Port：<input type="text" name="VNC_Port" value=""></br></br>

        <input type="submit" name="button" value ="創建新機器">
</form>
    </center>
	</p>
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
