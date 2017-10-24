<?php 
$res=sel_topic($dbc,$_GET['topic_id']); foreach ($res as $row){
     $topic_content= $row['content'];  if(strlen($topic_content)>25){$topic_content= mb_substr($topic_content,0,24,"utf-8");}
$title="【美食随手拍】".$topic_content."-美食天下";
include('../views/layouts/navigation_bar.html');
?>
<div class="topi_page_title">
    <span>美食随手拍</span>
</div>
<div class="topi_page_con">
    <a target="_blank" class="topi_page_head_img" href="personal_index.php?user_id=<?php echo $row['publisher_id']; ?>"><img src="<?php echo getUserImg($dbc,$row['publisher_id']); ?>" alt=""></a>
    <div class="topi_page_right">
        <a target="_blank" href="personal_index.php?user_id=<?php echo $row['publisher_id']; ?>" class="topi_page_userName"><?php echo getUserName($dbc,$row['publisher_id']); ?></a> <span class="topi_page_date"><?php echo $row['created_at']; ?></span>
        <br/>
        <span class="topi_page_say"><?php echo $row['content']; ?></span>
    <div class="topi_page_imgs">
       <div class="topi_page_video"> 
       <?php if(!empty($row['video'])){ ?>
<video src="<?php echo $row['video']; ?>" width="352" height="264" controls autobuffer></video>
<?php } ?>
</div>
<div class="topi_page_img" >
<?php $imgs=fing_topic_img($dbc,$row['id']); foreach($imgs as $imgs_row){  ?>
    <img src="<?php echo $imgs_row['topic_img']; ?>" alt="">
    <?php } ?>
     <div style="font-size: 20px;margin-left: -80px;">
        <div style="width: 200px;position: relative;left: 100px;top: 50px;"><a id="a1" onclick="<?php if(isset($_COOKIE['userName']) && $_COOKIE['userName']!='' ){ ?>update_topi_like_num(<?php echo $row['id']; ?>)<?php }else{  ?>alert('请先登录!');<?php } ?>"  href="#a1"><img width="50" height="50" src="../assets/img/like.jpg" alt=""><span id="like_num">
         <?php topic_like_btn($dbc,$_GET['topic_id']);?></span>人喜欢</a></div>
        <div style="width: 200px;position: relative;left: 300px;"><a id="a2" onclick="<?php if(isset($_COOKIE['userName']) && $_COOKIE['userName']!='' ){ ?>update_topi_collect_num(<?php echo $row['id']; ?>)<?php }else{  ?>alert('请先登录!');<?php } ?>"  href="#a2"><img width="50" height="50" src="../assets/img/collect.jpg" alt=""><span id="collect_num">
        <?php topic_collect_btn($dbc,$_GET['topic_id']);?></span>人收藏</a></div>
        </div>
        <?php } ?>
    </div>
    </div>
      
    </div> 
</div>

<div id="comments">
	<ul>
  <?php  $topic_id=$_GET['topic_id'];  $res=topic_comments($dbc,$topic_id);foreach($res as $row){ ?>
		<li id="comments_li">
		<div>
			<a target="_blank" href="personal_index.php?user_id=<?php echo $row['user_id']; ?>"><img class="comments_img" src="<?php echo getUserImg($dbc,$row['user_id']); ?>" alt=""></a>

			<a class="comments_name" target="_blank"  href="personal_index.php?user_id=<?php echo $row['user_id']; ?>"><?php echo getUserName($dbc,$row['user_id']); ?></a>
			<span class="comments_time"><?php $date=date('Y-m-d',strtotime($row['created_at'])); echo $date; ?></span>
			<span class="comments_con">
      <?php echo $row['comments']; ?></span>
		</div>
		</li>
    <?php } ?>
	</ul>

	<div  style="margin-top: 50px;"> 
		<a target="_blank" href="personal_index.php?user_id=<?php echo getID($dbc,$_COOKIE['userName']); ?>"><img class="commenter_img"  src="<?php if((!empty($_COOKIE['userName'])) && $_COOKIE['userName']!=''){ echo getHeadImage($dbc,$_COOKIE['userName']);}else{ echo '../assets/img/default.jpg';} ?>" alt=""></a>
		<div style="float: right;position: relative;width: 482px;zoom: 1;">
			<div class="commenter_text">
     <div style="width: 100%;">
      <?php if((!empty($_COOKIE['userName'])) && $_COOKIE['userName']!=''){ ?>   
     <form action="topic_page.php?topic_id=<?php echo $_GET['topic_id']; ?>" method="post" id="myform" >
       <textarea class="commenter_texts"  name="commenter_text"> </textarea>
    <a href="#" onclick="document.getElementById('myform').submit();" style="width: 453px;"  class="edit_topic">发表评论</a>
    </form>
    <?php }else{ ?>
<textarea  disabled="disabled" class="commenter_texts" style="cursor: default;background-color: white;width: 453px;"   name="commenter_text" disabled="disabled"><?php echo "登录后参与讨论，发表评论"; ?></textarea>
    <span   class="edit_topic">发表评论</span>
    <?php } ?>
     </div>   
      </div>
		</div>
	</div>
</div>

<script src="http://html5media.googlecode.com/svn/trunk/src/html5media.min.js"></script>
 <?php include('../views/layouts/footer.html'); ?>