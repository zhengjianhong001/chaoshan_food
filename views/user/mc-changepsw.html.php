<?php 
$title="食潮天下|个人资料";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/left_menu.html');
?>
<div class="mod_right">
 <div class="mc_cookbook">
 <div class="cook_navigation_bar">
 	<a href="mc-info.php" class="cook_navigation <?php if($_SERVER['REQUEST_URI']=='/chaoshan_food/php/mc-info.php') echo 'cook_navigation_on'  ?>">个人资料</a>
 	<a href="mc-changepsw.php" class="cook_navigation <?php if($_SERVER['REQUEST_URI']=='/chaoshan_food/php/mc-changepsw.php') echo 'cook_navigation_on'  ?>">修改密码</a>
 	</div>
 	 <div class="mc_info_img">
  <form action="" method="POST" enctype="multipart/form-data">
  	<ul>
  		<li><label>当前密码</label><br><input class="inputS"  name="password_now" type="password" autocomplete="off"></li>
  		<li><label>新密码</label><br><input class="inputS"  name="password_new" type="password" autocomplete="off">&nbsp;&nbsp;<span class="tip">密码为7-14个字符</span></li>
  		<li><label>确认密码</label><br><input class="inputS"  name="password_renew" type="password" autocomplete="off"></li>
  	</ul>
  	<input name="save_submit" style="width: 140px;height: 38px;margin-bottom: 50px;" value="保存修改" class="btn1" type="submit">
  	</form>
  </div>
</div> 
</div>