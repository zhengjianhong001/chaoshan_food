<?php 
$title="食潮天下|话题";
include('../views/layouts/navigation_bar.html');
?>
<div class="w logo_wrap2">
	<div class="logo_inner left"><a href="index.php">食潮天下</a></div>
	<div class="logo_search right">
	 	 <form action="search.php" id="search_form" target="_blank" method="post"   autocomplete="off">
	  <div> 
			<input type="text" class="search" name="searchName">
			<a href="javascript:document:search_form.submit();" class="search_btn">搜索</a>
	  </div>
	 </form>
	</div>
	<div class="logo_nav">
		<a href="index.php"  target="_blank">首页</a>
		<a href="CookBook.php"  target="_blank">菜谱</a>
		<a href="topic.php" class="on"  target="_blank">话题</a>
		<a href="http://www.chaoshanw.cn/Article/mjwh/"  target="_blank">潮汕文化</a>
	</div>
</div>
<div style="width: 100%;height: 500px;">
	<div class="topic">
	<div class="left">
		<div class="title" style="width: 640px;">
			<h3>话题</h3>
		</div>
		<div class="left-content topic_content">
		<ul>
		<?php $res=hot_topic($dbc);foreach ($res as $row) { ?>
			<li> 
				<div class="per_topic_perInfo">
				
				<a target="_blank" href="personal_index.php?user_id=<?php echo $row['publisher_id']; ?>"><img   src="<?php echo getUserImg($dbc,$row['publisher_id']); ?>" alt=""></a>

			<div class="per_topic_topInfo">
				<a  target="_blank" href="personal_index.php?user_id=<?php echo $row['publisher_id']; ?>"><?php echo getUserName($dbc,$row['publisher_id']); ?></a><br><span><?php echo $row['created_at']; ?></span>
			</div>
				</div>
				<div class="per_topic_otherInfo">
					<div><a target="_blank" href="topic_page.php?topic_id=<?php echo $row['id']; ?>"><?php echo $row['content']; ?></a></div>
					<a class="per_topic_otherInfo_a" href="topic_page.php?topic_id=<?php echo $row['id']; ?>" target="_blank">
						<?php $img_res=fing_topic_img($dbc,$row['id']);foreach($img_res as $img_row){ ?>
						<img src="<?php echo $img_row['topic_img'] ?>"/>
						<?php } ?>
					</a>
					<p><?php echo topic_like_btn($dbc,$row['id']); ?>个喜欢，<?php echo topic_comments_num($dbc,$row['id']); ?>个评论</p>
				</div>
			</li> 
			<?php } ?>			
		</ul>
		</div>		
</div>
<div class="per_cookbook_right">
<a href="mc-editTopic.php" class="edit_topic" target="_blank">发布话题</a>
		<a href="#">
			<img src="../assets/img/right.jpg" />
		</a>
	</div>
</div>
</div>
<?php 
include('../views/layouts/footer.html');
?> 