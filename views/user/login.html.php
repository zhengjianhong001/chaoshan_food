<?php 
$title="用户登录";
include('../views/layouts/login_header.html');
?>
<div id="login" class="login">
	<div class="login-h">登录食潮天下</div>
	<form action="" method="POST">
	<div class="login-c">
		<ul>
			<li>
				<input type="text" name="user_name" value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name']; ?>" placeholder="昵 称：" />
			</li>
			<li style="border:0;">
				<input type="password" name="psw" placeholder="密 码：" />
			</li>
		</ul>
		<p>
			<label>
				<input type="checkbox" value="check" name="autoLogin" /> 下次自动登录
			</label>
			<a class="right" href="#">忘记密码？</a>
		</p>
		<input class="loginbtn" type="submit" value="登录" />
		<div class="login-bottom">
			还没账号？
			<a href="register.php">立即注册</a>
		</div>
	</div>
	</form>
</div>
<?php 
include('../views/layouts/login_footer.html');
 ?>