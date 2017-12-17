<?php
header('Content-Type: text/html; Charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (is_numeric(htmlspecialchars($_POST['qqnumber']))) {
		$qq = htmlspecialchars($_POST['qqnumber']);
		$jsondata = file_get_contents(dirname(__FILE__).'/whitelist.json');
		$whitelist = json_decode($jsondata);
		foreach ($whitelist as $key=>$value) {
			if ($value->QQ == $qq) {
				setcookie('login_signature', sha1($qq), time() + 3600, '/', $_SERVER['HTTP_HOST']);
				setcookie('login_nickname', $value->Name, time() + 3600, '/', $_SERVER['HTTP_HOST']);
				$session_file = fopen(dirname(__FILE__).'/tmp/'.sha1($qq).'.dat', 'w') or die('<script>alert("系统忙碌，暂时无法处理您的登录请求！\n错误细节描述：Unable to open or create session database.");history.go(-1);</script>');
				$timestamp_LoginString = md5(date('YmdHis',time()));
				fwrite($session_file, $timestamp_LoginString);
				fclose($session_file);
				setcookie('logintime_encrypt', $timestamp_LoginString, time() + 3600, '/', $_SERVER['HTTP_HOST']);
				header('Location: ./index.php');
				break;
				exit();
			}
		}
		echo '<script>alert("抱歉，您输入的QQ号尚未录入白名单！\n错误细节描述：The QQ number you inputed has not been entered on the white list.");history.go(-1);</script>';
	}
	else {
		echo '<script>alert("无效的QQ号，请重试。注意：QQ号只能为纯数字！\n错误细节描述：Invaild QQ Number.");history.go(-1);</script>';
	}
	exit();
}
?>
<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="小丁工作室-VIP观影平台">
  <meta name="keywords" content="小丁工作室,VIP观影平台,浅忆博客站群系统">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>观影平台-身份验证</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="stylesheet" href="css/amazeui.min.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
<!--[if lte IE 8 ]>
<script>
	alert('检测到您正在使用的浏览器版本过低，无法支持本页面使用的最新网页技术！强烈建议您升级浏览器后再次访问。');
</script>
<![endif]-->
<div class="am-g myapp-login">
	<div class="myapp-login-logo-block">
		<div class="myapp-login-logo">
			<i class="am-icon-jsfiddle"></i>
		</div>
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				身份<span>验证</span>
				<div class="info">系统需要确认您的身份</div>
			</div>
		</div>
		<div class="am-u-sm-10 login-am-center">
			<form class="am-form" method="post" action="">
				<fieldset>
					<div class="am-form-group">
						<input type="text" name="qqnumber" id="qqnumber" placeholder="键入已由管理员加入白名单的QQ号" style="background: #E6E6FA">
					</div>
					<p><button type="submit" class="am-btn am-btn-default">验证身份并继续</button></p>
				</fieldset>
			</form>
		</div>
		<div id="nowTime" class="info" style="color: #ffffff" align="center"></div>
	</div>
</div>
<div id="footer" align="center" style="filter: alpha(Opacity=80);-moz-opacity: 0.5;opacity: 0.5;position: fixed;bottom: 0;left: 0;height: 20px;width: 100%;background-color: #000000;color: #ffffff">Powered By DingStudio | Author: <a href="http://954759397.qzone.qq.com" target="_blank">alone◎浅忆</a></div>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="js/jquery.min.js"></script>
<!--<![endif]-->
<script src="js/amazeui.min.js"></script>
<script src="js/app.js"></script>
<script>
	var w = setInterval(function () {
		document.getElementById('nowTime').innerHTML = '当前时间：' + new Date().toLocaleString();
	}, 1000);
</script>
</body>
</html>