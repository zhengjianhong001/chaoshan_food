<?php 
$title="个人中心";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/left_menu.html');
?>
<div class="mod_right" style="position: relative;top: 40px;left: 120px;width: 87%;">
 <div class="updit" style="margin-top: -10px; ">
 	<h3 style="border-bottom: 1px solid #eee;cursor: default;">发布新话题</h3>
</div>
<div class="mc_edt_con">
	<form action="mc-editTopic.php" method="POST" enctype="multipart/form-data">
  	<ul>
  		<li><label>写话题*</label><br/><textarea  name="topi_con"  ><?php if(isset($_POST['topi_con'])) echo $_POST['topi_con']; ?></textarea></li>
  		<li><label>上传图片(图片格式为.jpg,.jpeg,.png,.gif)*</label><br/><a href="javascript:;" class="file">选择图片
    <input type="file" id="file" style="position: absolute;font-size: 100px;right: 0;top: 18px;opacity: 0;" name="topicImg_file[]" multiple="multiple" accept=".jpg,.jpeg,.png,.gif"  onchange="javascript:setImagePreviews();">
</a>
 <div id="dd" style="width:700px;margin-left: -5px;"></div><span style="clear: both;"></span></li>
  		<li style="clear: both;"><label>上传视频(视频格式为.mp4,.MOV,大小不能超过10M)</label><br/><input type="file" name="upload" accept=".mp4,.MOV,.qsv"></li>
  	</ul>
  	<input name="save_submit" id="topic_btn" style="width: 140px;height: 38px;margin-bottom: 50px;" value="发布话题" class="btn1" type="submit" onclick="document.getElementById('topic_btn').value='正在上传...'" >

  	</form>
</div> 
</div>
<script>
	function setImagePreviews() {
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

