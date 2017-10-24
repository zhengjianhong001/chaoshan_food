<?php 
$title="食潮天下|个人资料";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/left_menu.html');
?>
<div class="mod_right" style="width: 80%;">
 <div class="mc_cookbook">
  <div class="cook_navigation_bar">
 	<a href="mc-info.php" class="cook_navigation cook_navigation_on">个人资料</a>
 	<a href="mc-changepsw.php" class="cook_navigation">修改密码</a>
  </div>
  <div class="mc_info_img">
  <form action="mc-info.php" method="POST" enctype="multipart/form-data">
  	<ul>
  		<li><label>头像</label><br><div id="localImag" style="width: 250px;height: 200px;margin-top: -20px;">
    <img id="preview" src="<?php  echo $row['head_img']; ?>"  style="display: block; width: 213px; height: 161;"> <input  type="file" onchange="javascript:setImagePreviews_steps()"  style="opacity: 0; filter:alpha(opacity=0);cursor:pointer; font-size: 10px;width:213px;height:161px;position: relative;top: -160px;"   name="step_img" id="doc" />    </div></li>
  		<li><label>性别</label><br><input style="margin-right: 80px;"   type="radio" name="radio" value="男" <?php  if($row['sex']=='男') echo "checked"; ?> ><input type="radio" name="radio" value="女" <?php  if($row['sex']=='女') echo "checked"; ?>><span class="mc_info_sex1">男</span><span class="mc_info_sex2">女</span></li>
  		<li><label>家乡</label><br><select name="province"><option value="潮汕">潮汕</option></select> <select name="city"><option value="汕头" <?php if($row['hometown_city']=='汕头') echo "selected"; ?>>汕头</option><option value="汕尾" <?php if($row['hometown_city']=='汕尾') echo "selected"; ?>>汕尾</option><option value="潮州" <?php if($row['hometown_city']=='潮州') echo "selected"; ?>>潮州</option><option value="陆丰" <?php if($row['hometown_city']=='陆丰') echo "selected"; ?>>陆丰</option><option value="揭阳" <?php if($row['hometown_city']=='揭阳') echo "selected"; ?>>揭阳</option><option value="普宁" <?php if($row['hometown_city']=='普宁') echo "selected"; ?>>普宁</option></select> </li>
  		<li><label>电子邮箱</label><br><input name="email"  class="mc_info_email" value="<?php echo $row['email']; ?>" type="email"></li>
  		<li><label>个人签名</label><br><input name="personal_write" class="mc_info_write" type="text" value="<?php  echo $row['personal_write']; ?>"></li>
  		
  	</ul>
  	<input name="save_submit" style="width: 140px;height: 38px;margin-bottom: 50px;" value="保存修改" class="btn1" type="submit">
  	</form>
  </div>
</div> 
</div>
<script>
	function setImagePreviews_steps() {
var docObj=document.getElementById("doc");
 
var imgObjPreview=document.getElementById("preview");
if(docObj.files &&docObj.files[0])
{
//火狐下，直接设img属性
imgObjPreview.style.display = 'block';
imgObjPreview.style.width = '213px';
imgObjPreview.style.height = '161px'; 
//imgObjPreview.src = docObj.files[0].getAsDataURL();
 
//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
}
else
{
//IE下，使用滤镜
docObj.select();
var imgSrc = document.selection.createRange().text;
var localImagId = document.getElementById("localImag");
//必须设置初始大小
localImagId.style.width = "213px";
localImagId.style.height = "161px";
//图片异常的捕捉，防止用户修改后缀来伪造图片
try{
localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
}
catch(e)
{
alert("您上传的图片格式不正确，请重新选择!");
return false;
}
imgObjPreview.style.display = 'none';
document.selection.empty();
}

return true;
}

</script>
