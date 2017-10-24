<?php 
$title="注册食潮天下";
include('../views/layouts/login_header.html');
?>
<div id="login" class="login">
	<div class="login-h">注册食潮天下</div>
	<form action="" method="POST" name="form_register" >
	<div class="login-c">
		<ul>
			<li>
				<input type="text" name="user_name" value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name']; ?>"  placeholder="注册昵称：" onblur="javascript:veript(form_register.user_name.value)" /><span id="inner" style="position: relative;left: 300px;display:none;top:-35px;"><img id='img_inner' style='width:20px;height:20px;' src='../assets/img/ok.png'  /></span>
			</li>
			<li>
				<input type="password" name="psw"  placeholder="密 码：" />
			</li>
			<li>
				<input type="password" name="repsw" placeholder="再次输入密码：" />
			</li>
			<li style="border:0;">
				<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="输入电子邮箱：" onblur="javascript:veript1(form_register.email.value)" /><span id="inner_email" style="position: relative;left: 300px;display:none;top:-35px;"><img id='img_inner_email' style='width:20px;height:20px;' src='../assets/img/ok.png'  /></span>
			</li>
		</ul>
		<input class="loginbtn" name="register" type="submit" value="注册" />
		<div class="login-bottom">
			已有账号？
			<a href="login.php">立即登录</a>
		</div>
	</div>
	</form>
</div>
<?php 
include('../views/layouts/login_footer.html');

 ?>