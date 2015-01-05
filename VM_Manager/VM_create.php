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
        請輸入需要的CPU上限 :
                <select name="cpu">
                 <option value="1">1</option></br>
                 <option Value="2">2</option></br>
                 <option Value="4">4</option></br>
                </select></br></br>
        請輸入記憶體大小 (M) :
                <select name="memory">
                 <option Value="131072">128</option>
                 <option Value="262144">256</option>
                <option Value="524288">512</option>
                </select></br></br>
        請輸入配置硬碟大小 (G) :
                <select name="size"></br>
                 <option Value="empty10G.img">10G</option>
                 <option Value="empty10G.img">20G</option>
                </select></br></br>
        請輸入要載入的開機光碟 :
                <select name="System"></br>
                 <option Value="ubuntu">Ubuntu 12.04</option>
                 <option Value="gentoo">Gentoo-install</option>
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
