<?php 
$title="食潮天下|我的话题";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/left_menu.html');
?>
<div class="mod_right" style="position: relative;top: 40px;left: 120px;">
 <div class="mc_cookbook">
 <div class="cook_navigation_bar">
 	<a  href="mc-topic.php" class="cook_navigation cook_navigation_on">我的话题</a>
 	<button class="cook_navigation_btn" onclick="window.open('mc-editTopic.php')">发布新话题</button>
 	</div>
</div> 
</div>

<div class="my_cookbook_list">
	<ul class="my_cookbook_list_ul"  style="width: 1180px;margin-left:0px;">
		<?php $res=topic_show($dbc); foreach ($res as $row){  ?>
		<li>
		<div style="height: 180px;">
		    <div><a href="topic_page.php?topic_id=<?php echo $row['id']; ?>"><img  src="<?php echo sel_topicImgs($dbc,$row['id']); ?>" alt="" class="my_cookbook_list_img" ></a></div>
			<div class="my_cookbook_list_detail">
							<h2><a href="topic_page.php?topic_id=<?php echo $row['id']; ?>"><?php  $topic_content= $row['content'];if(strlen($topic_content)>20){echo mb_substr($topic_content,0,19,"utf-8")."......";}else{echo $topic_content;} ?></a></h2>
							<p class="my_cookbook_list_detail_p"><?php echo $row['created_at']; ?></p>
							<p class="my_cookbook_list_detail_p"><?php topic_like_btn($dbc,$row['id']); ?>个喜欢，<?php echo topic_comments_num($dbc,$row['id']); ?>条评论</p>
			</div>			
			<a class="del" href="mc-topic.php?action=del&topic_id=<?php echo $row['id']; ?>"><p style="margin-left: 30px;">删除</p></a>		
		</div>
		</li>
		<?php } ?>	 
	</ul>
</div>
