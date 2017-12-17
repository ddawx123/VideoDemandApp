<?php
header('Content-Type: text/html; Charset=UTF-8');
if (!isset($_COOKIE['login_signature']) || !isset($_COOKIE['login_nickname']) || !isset($_COOKIE['logintime_encrypt'])) {
    header('Location: ./login.php?callback='.urlencode($_SERVER['REQUEST_URI']));
    exit();
}
else if (!file_exists(dirname(__FILE__).'/tmp/'.$_COOKIE['login_signature'].'.dat')) {
    header('Location: ./logout.php?callback='.urlencode($_SERVER['REQUEST_URI']));
    exit();
}
else {
    $ticket = file_get_contents(dirname(__FILE__).'/tmp/'.$_COOKIE['login_signature'].'.dat');
    if ($_COOKIE['logintime_encrypt'] != $ticket) {
        die('<script>alert("抱歉，由于当前账号已在另一设备登录，您已被迫下线！请尝试重新登录。\n错误细节描述：No multiple devices are allowed to log in at the same time.");location.href = "./logout.php?callback='.urlencode($_SERVER['REQUEST_URI']).'";</script>');
    }
}
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="小丁工作室-VIP观影平台">
<meta name="keywords" content="小丁工作室,VIP观影平台,浅忆博客站群系统">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>影片列表</title>
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<script>
    function goPlayer(vid) {
        location.href = 'http://blog.dingstudio.cn/DMVPlayer.php?src=https://static2.dingstudio.cn/videos/TV/SevenOfMe/' + vid + '.mp4&bgid=bgcsplayer&autoplay=0&title=柒个我第' + vid + '集';
    }
    function showAlert() {
        alert('该集尚未更新。');
        return false;
    }
</script>
</head>
<body style="background: #E6E6FA">
<h3>影集列表：</h3>
<table border="1">
<tr align="center">
  <td colspan="6">《柒个我》【实时更新】</td>
</tr>
<tr>
  <td onclick="goPlayer(1)"><a href="#">第1集</a></td>
  <td onclick="goPlayer(2)"><a href="#">第2集</a></td>
  <td onclick="goPlayer(3)"><a href="#">第3集</a></td>
  <td onclick="goPlayer(4)"><a href="#">第4集</a></td>
  <td onclick="goPlayer(5)"><a href="#">第5集</a></td>
  <td onclick="goPlayer(6)"><a href="#">第6集</a></td>
</tr>
<tr>
  <td onclick="goPlayer(7)"><a href="#">第7集</a></td>
  <td onclick="goPlayer(8)"><a href="#">第8集</a></td>
  <td onclick="goPlayer(9)"><a href="#">第9集</a></td>
  <td onclick="goPlayer(10)"><a href="#">第10集</a></td>
  <td onclick="goPlayer(11)"><a href="#">第11集</a></td>
  <td onclick="goPlayer(12)"><a href="#">第12集</a></td>
</tr>
<tr>
  <td onclick="showAlert()"><a href="#">第13集</a></td>
  <td onclick="showAlert()"><a href="#">第14集</a></td>
  <td onclick="showAlert()"><a href="#">第15集</a></td>
  <td onclick="showAlert()"><a href="#">第16集</a></td>
  <td onclick="showAlert()"><a href="#">第17集</a></td>
  <td onclick="showAlert()"><a href="#">第18集</a></td>
</tr>
<tr>
  <td onclick="showAlert()"><a href="#">第19集</a></td>
  <td onclick="showAlert()"><a href="#">第20集</a></td>
  <td onclick="showAlert()"><a href="#">第21集</a></td>
  <td onclick="showAlert()"><a href="#">第22集</a></td>
  <td onclick="showAlert()"><a href="#">第23集</a></td>
  <td onclick="showAlert()"><a href="#">第24集</a></td>
</tr>
<tr>
  <td onclick="showAlert()"><a href="#">第25集</a></td>
  <td onclick="showAlert()"><a href="#">第26集</a></td>
  <td onclick="showAlert()"><a href="#">第27集</a></td>
  <td onclick="showAlert()"><a href="#">第28集</a></td>
  <td onclick="showAlert()"><a href="#">第29集</a></td>
  <td onclick="showAlert()"><a href="#">第30集</a></td>
</tr>
<tr>
  <td onclick="showAlert()"><a href="#">第31集</a></td>
  <td onclick="showAlert()"><a href="#">第32集</a></td>
  <td onclick="showAlert()"><a href="#">第33集</a></td>
  <td onclick="showAlert()"><a href="#">第34集</a></td>
  <td colspan="2"></td>
</tr>
</table>
<p>Hello <?php echo @$_COOKIE['login_nickname']; ?><br><a href="./logout.php" target="_self">点这里</a>退出</a></p>
<div id="footer" align="center" style="filter: alpha(Opacity=80);-moz-opacity: 0.5;opacity: 0.5;position: fixed;bottom: 0;left: 0;height: 20px;width: 100%;background-color: #000000;color: #ffffff">Powered By DingStudio | Author: <a href="http://954759397.qzone.qq.com" target="_blank" style="color: #ffffff">alone◎浅忆</a></div>
</body>
</html>