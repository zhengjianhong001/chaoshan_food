<?php 
$title="个人中心|编辑菜谱";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/left_menu.html');
?>

<div class="mod_right" style="position: relative;top: 40px;left: 120px;width: 87%;">
 <div class="updit" style="margin-top: -10px;margin-left: 10px;">
 	<h3>创建菜谱</h3>
	<span class="h2_text">从现在起，不做孤独的美食家。</span>
</div> 
<form action="mc-editCookbook.php" method="POST" enctype="multipart/form-data">

<div class="upfood_form" style="margin-left: 10px;">

<p style="cursor: default;" class="must" >菜谱名称</p>
<input type="text" id="foodName"  name="foodName" class="form-control" style="width: 750px" placeholder="菜谱名称" value="<?php if(isset($_POST['foodName']))echo $_POST['foodName']; ?>" />
<p style="cursor: default;" class="must1">成品图片（最多9张）</p>
<a href="javascript:;" class="file">选择图片
    <input type="file" id="file" accept=".jpg,.jpeg,.png,.gif" name="foodImg_file[]" multiple="multiple"  onchange="javascript:setImagePreviews();">
</a>
 <div id="dd" style="width:700px;margin-left: -5px;"></div>
 <div style="clear: both">
<textarea name="decript" class="J_input"  style="width: 740px;" placeholder="请输入菜谱描述"><?php if(isset($_POST['decript']))echo $_POST['decript']; ?></textarea>
</div>
<div class="parameter"> 
<p style="cursor: default;" class="must2">基本参数</p>
<select id="pref_noopt" name="difficult" class="selectable">
                <option value="简单" <?php if(isset($_POST['difficult'])&&($_POST['difficult']=="简单")) echo 'selected="selected"'; ?>>简单</option>
                <option value="普通" <?php if(isset($_POST['difficult'])&&($_POST['difficult']=="普通")) echo 'selected="selected"'; ?>>普通</option>
                <option value="高级" <?php if(isset($_POST['difficult'])&&($_POST['difficult']=="高级")) echo 'selected="selected"'; ?>>高级</option> 
                <option value="神级" <?php if(isset($_POST['difficult'])&&($_POST['difficult']=="神级")) echo 'selected="selected"'; ?>>神级</option>
</select>
<select id="pref_noopt" name="taste" class="selectable">
                <option value="原味" <?php if(isset($_POST['taste'])&&($_POST['taste']=="原味")) echo 'selected="selected"'; ?>>原味</option> 
                <option value="清淡" <?php if(isset($_POST['taste'])&&($_POST['taste']=="清淡")) echo 'selected="selected"'; ?>>清淡</option>
                 <option value="微辣" <?php if(isset($_POST['taste'])&&($_POST['taste']=="微辣")) echo 'selected="selected"'; ?>>微辣</option>
                <option value="中辣" <?php if(isset($_POST['taste'])&&($_POST['taste']=="中辣")) echo 'selected="selected"'; ?>>中辣</option>
                <option value="超辣" <?php if(isset($_POST['taste'])&&($_POST['taste']=="超辣")) echo 'selected="selected"'; ?>>超辣</option> 
                <option value="麻辣" <?php if(isset($_POST['taste'])&&($_POST['taste']=="麻辣")) echo 'selected="selected"'; ?>>麻辣</option>
                <option value="酸辣" <?php if(isset($_POST['taste'])&&($_POST['taste']=="酸辣")) echo 'selected="selected"'; ?>>酸辣</option>
                <option value="酸咸" <?php if(isset($_POST['taste'])&&($_POST['taste']=="酸咸")) echo 'selected="selected"'; ?>>酸咸</option>
                <option value="咸鲜" <?php if(isset($_POST['taste'])&&($_POST['taste']=="咸鲜")) echo 'selected="selected"'; ?>>咸鲜</option> 
                <option value="咸甜" <?php if(isset($_POST['taste'])&&($_POST['taste']=="咸甜")) echo 'selected="selected"'; ?>>咸甜</option>
                <option value="甜味" <?php if(isset($_POST['taste'])&&($_POST['taste']=="甜味")) echo 'selected="selected"'; ?>>甜味</option>
                <option value="苦味" <?php if(isset($_POST['taste'])&&($_POST['taste']=="苦味")) echo 'selected="selected"'; ?>>苦味</option>
                <option value="其他" <?php if(isset($_POST['taste'])&&($_POST['taste']=="其他")) echo 'selected="selected"'; ?>>其他</option>
                
</select>
<select id="pref_noopt" name="technology" class="selectable">
                <option value="烧" <?php if(isset($_POST['technology'])&&($_POST['technology']=="烧")) echo 'selected="selected"'; ?>>烧</option>
                <option value="炒"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="炒")) echo 'selected="selected"'; ?>>炒</option>
                <option value="炸"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="炸")) echo 'selected="selected"'; ?>>炸</option> 
                <option value="蒸"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="蒸")) echo 'selected="selected"'; ?>>蒸</option>
                <option value="煮"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="煮")) echo 'selected="selected"'; ?>>煮</option>
                <option value="拌"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="拌")) echo 'selected="selected"'; ?>>拌</option>
                <option value="烤"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="烤")) echo 'selected="selected"'; ?>>烤</option> 
                <option value="煎"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="煎")) echo 'selected="selected"'; ?>>煎</option>
                <option value="卤"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="卤")) echo 'selected="selected"'; ?>>卤</option>
                <option value="熏"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="熏")) echo 'selected="selected"'; ?>>熏</option> 
                <option value="烘焙"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="烘焙")) echo 'selected="selected"'; ?>>烘焙</option>
                 <option value="榨"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="榨")) echo 'selected="selected"'; ?>>榨</option> 
                <option value="其他"  <?php if(isset($_POST['technology'])&&($_POST['technology']=="其他")) echo 'selected="selected"'; ?>>其他</option>
</select>
<select id="pref_noopt" name="used_time" class="selectable">
                <option value="十分钟" <?php if(isset($_POST['used_time'])&&($_POST['used_time']=="十分钟")) echo 'selected="selected"'; ?>>十分钟</option>
                <option value="二十分钟" <?php if(isset($_POST['used_time'])&&($_POST['used_time']=="二十分钟")) echo 'selected="selected"'; ?>>二十分钟</option>
                <option value="半个小时" <?php if(isset($_POST['used_time'])&&($_POST['used_time']=="半个小时")) echo 'selected="selected"'; ?>>半个小时</option> 
                <option value="一个小时" <?php if(isset($_POST['used_time'])&&($_POST['used_time']=="一个小时")) echo 'selected="selected"'; ?>>一个小时</option>
                <option value="数小时" <?php if(isset($_POST['used_time'])&&($_POST['used_time']=="数小时")) echo 'selected="selected"'; ?>>数小时</option>
                <option value="一天" <?php if(isset($_POST['used_time'])&&($_POST['used_time']=="一天")) echo 'selected="selected"'; ?>>一天</option>
                <option value="数天" <?php if(isset($_POST['used_time'])&&($_POST['used_time']=="数天")) echo 'selected="selected"'; ?>>数天</option> 
</select>
<select id="pref_noopt" name="area" class="selectable">
                <option value="汕头" <?php if(isset($_POST['area'])&&($_POST['area']=="汕头")) echo 'selected="selected"'; ?>>汕头</option>
                <option value="潮州" <?php if(isset($_POST['area'])&&($_POST['area']=="潮州")) echo 'selected="selected"'; ?>>潮州</option>
                <option value="汕尾" <?php if(isset($_POST['area'])&&($_POST['area']=="汕尾")) echo 'selected="selected"'; ?>>汕尾</option> 
                <option value="普宁" <?php if(isset($_POST['area'])&&($_POST['area']=="普宁")) echo 'selected="selected"'; ?>>普宁</option>
                <option value="陆丰" <?php if(isset($_POST['area'])&&($_POST['area']=="陆丰")) echo 'selected="selected"'; ?>>陆丰</option>
                <option value="揭阳" <?php if(isset($_POST['area'])&&($_POST['area']=="揭阳")) echo 'selected="selected"'; ?>>揭阳</option>
                
</select>
</div>
<div style="padding-top: 15px;"> 
<div style="width: 40%;float: left;" >
    <p style="cursor: default;" class="must2">食材明细（主料）</p>
    <input type="text" name="main_ingredient" value="<?php if(isset($_POST['main_ingredient']))echo $_POST['main_ingredient']; ?>" >
</div>
<div id="other_mat" style="float: left;">
    <p style="cursor: default;" class="must2">食材明细（辅料）</p>
     <input type="text" name="other_ingredient" value="<?php if(isset($_POST['other_ingredient']))echo $_POST['other_ingredient']; ?>" >
</div>
</div>
<div style="clear: both;padding-top: 15px"> 
<p style="cursor: default;" class="must2" >做法步骤</p>
<div class="huizhang" >
<span class="badge badge-success" style="cursor: pointer;"  onclick="insert_one()">增加一步</span>
<span class="badge badge-important" style="cursor: pointer;" onclick="delete_one()">删除最后一步</span>
</div>
</div>


<div style="width:100%;position:relative;left:-25px; ">
<ul id="steps">
<li  style="height: 200px;margin-left: 25px;">
<div id="localImag0" style="width: 250px;height: 200px;">
    <img id="preview0" src="../assets/img/food_step.jpg"  style="display: block; width: 213px; height: 161;"> 
<input  type="file" accept=".jpg,.jpeg,.png,.gif" onchange="javascript:setImagePreviews_steps(0)" style="opacity: 0; filter:alpha(opacity=0);cursor:pointer; font-size: 10px;width:213px;height:161px;background-color: blue;position: relative;top: -160px;"   name="step_img[]" id="doc0" />    
</div>

 <span style="position: relative;top: -200px;left: 250px;">
     <textarea name="step_explain[]"  style="width: 506px;height: 161px;" cols="100" rows="5" placeholder="1、请输入做法说明菜谱描述，最多输入1000字"><?php if(isset($_POST['step_explain'][0]))echo $_POST['step_explain'][0]; ?></textarea>
 </span>
 </li>
 <li  style="height: 200px;margin-left: 25px;">
    <div id="localImag1" style="width: 250px;height: 200px;">
    <img id="preview1" src="../assets/img/food_step.jpg"  style="display: block; width: 213px; height: 161;"> 
<input  type="file" accept=".jpg,.jpeg,.png,.gif" onchange="javascript:setImagePreviews_steps(1)" style="opacity: 0;
        filter:alpha(opacity=0);cursor:pointer; font-size: 10px;width:213px;height:161px;background-color: blue;position: relative;top: -160px;"   name="step_img[]" id="doc1" />    
</div>
 <span style="position: relative;top: -200px;left: 250px;">
     <textarea name="step_explain[]"  placeholder="2、请输入做法说明菜谱描述，最多输入1000字"  style="width: 506px;height: 161px;" cols="100" rows="5"><?php if(isset($_POST['step_explain'][1]))echo $_POST['step_explain'][1]; ?></textarea>
 </span>
 </li>
 </ul>
</div>
<div style="position: relative;top: 20px;left: 0;">
 <p style="cursor: default;" class="must2">小窍门</p>
<textarea name="trick" style="width: 760px;height: 161px;" cols="100" rows="5"><?php if(isset($_POST['trick']))echo $_POST['trick']; ?></textarea></div>
<input type="submit"  name="submit" value="发布菜谱" style="
    margin-top: 50px;
    background: #ff6767;
    border: 1px solid #ff6767;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
    height: 38px;
    margin-right: 16px;
    width: 140px;
">

</form>
</div> 
</div>
<!-- Modal -->
<div id="myModal"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-body">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p>菜谱上传成功,等待审核!</p>
  </div>
</div>










<script>
var session=1;
//上传菜谱的步骤缩略图(单图)
function setImagePreviews_steps(avalue) {
	var num=avalue;
	var docObj=document.getElementById("doc"+num);
	 
	var imgObjPreview=document.getElementById("preview"+num);
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
	var localImagId = document.getElementById("localImag"+num);
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

//增加一步
function insert_one(num){
	// var nums=num+1;
	session+=1;
	var step=document.getElementById('steps');
	var newli=document.createElement("li");
	newli.innerHTML+=" <li  style='height: 200px;margin-left:25px;'><div id='localImag"+session+"' style='width: 250px;height: 200px;'><img id='preview"+session+"' src='../assets/img/food_step.jpg'  style='display: block; width: 213px; height: 161;'> <input  type='file' accept='.jpg,.jpeg,.png,.gif' onchange='javascript:setImagePreviews_steps("+session+")' style='opacity: 0;     filter:alpha(opacity=0);cursor:pointer; font-size: 10px;width:213px;height:161px;background-color: blue;position: relative;top: -160px;'   name='step_img[]' id='doc"+session+"' />    </div><span style='position: relative;top: -200px;left: 250px;'><textarea name='step_explain[]' placeholder='"+(session+1)+"、请输入做法说明菜谱描述，最多输入1000字' style='width: 506px;height: 161px;' cols='100' rows='5'></textarea></span> </li>";
	step.appendChild(newli);
}
function delete_one(){
	if(session==1){
		alert('不能小于两步');
	}else{		
	var step=document.getElementById('steps');
	var x=step.removeChild(step.lastChild);
	x=null;
		session-=1;
	}
	
}


	
   
//下面用于多图片上传预览功能

function setImagePreviews(avalue) {
        var docObj = document.getElementById("file");
        var dd = document.getElementById("dd");
        dd.innerHTML = "";
        var fileList = docObj.files;
        if (fileList.length>5) {
           alert("不能超过五张图片");
           docObj="";
        }else{
        for (var i = 0; i < fileList.length; i++) {            
            dd.innerHTML += "<div style='float:left;padding:5px;' > <img id='img" + i + "'  /> </div>";

            var imgObjPreview = document.getElementById("img"+i); 

            if (docObj.files && docObj.files[i]) {

                //火狐下，直接设img属性

                imgObjPreview.style.display = 'block';

                imgObjPreview.style.width = '150px';

                imgObjPreview.style.height = '180px';

                //imgObjPreview.src = docObj.files[0].getAsDataURL();

                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式

                imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);

            }

            else {

                //IE下，使用滤镜

                docObj.select();

                var imgSrc = document.selection.createRange().text;

                alert(imgSrc)

                var localImagId = document.getElementById("img" + i);

                //必须设置初始大小

                localImagId.style.width = "150px";

                localImagId.style.height = "180px";

                //图片异常的捕捉，防止用户修改后缀来伪造图片

                try {

                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";

                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;

                }

                catch (e) {

                    alert("您上传的图片格式不正确，请重新选择!");

                    return false;

                }

                imgObjPreview.style.display = 'none';

                document.selection.empty();

            }

        }  
        return true;
    }
}

</script>