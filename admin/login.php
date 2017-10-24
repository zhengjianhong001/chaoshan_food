<?php 
require '../mysql_connect.php';
require './models/admin.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
    $name=$_POST['username'];
    $psw=$_POST['password'];
    if(admin_login($dbc,$name,$psw)){
    	setcookie('admin_name',$name,time()+3600*24*365);
    	echo "<script>alert('登录成功');window.location.href='index.php';</script>";
    }else{
    echo "<script>alert('用户名与密码不匹配！');</script>";
    }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta http-equiv="Pragma" content="no-cache"> 
<meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Expires" content="0"> 
<title>后台登录</title> 
<link href="Css/admins_login.css" type="text/css" rel="stylesheet"> 
</head> 
<body> 
<div class="login">
    <div class="message">食潮天下后台管理系统-登录</div>
    <div id="darkbannerwrap"></div>
    <form action="login.php" method="post">
		<input name="action" value="login" type="hidden">
		<input name="username" placeholder="用户名" required="" type="text">
		<hr class="hr15">
		<input name="password" placeholder="密码" required="" type="password">
		<hr class="hr15">
		<input value="登录" style="width:100%;" type="submit">
		<hr class="hr20">
	</form>	
</div>

<div class="copyright">© 2017 韶关学院</div>
</body>
</html>