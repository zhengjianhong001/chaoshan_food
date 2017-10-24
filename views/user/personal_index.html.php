<?php 
$title="个人主页";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/personal_nav.html');
?>
	<!--菜谱-->
	<div class="cookbook">
		<div class="title">
			<h3><?php echo getUserName($dbc,$_GET['user_id']); ?>的菜谱</h3>
			<a href="personal_cookbook.php?user_id=<?php echo $_GET['user_id'] ?>">共<?php echo per_cookbook_num($dbc,$_GET['user_id']); ?>篇</a>
		</div>
		<?php if(per_cookbook_num($dbc,$_GET['user_id'])==0){?>
<div class="cookbook-content blanks">
	还没有发布菜谱。
</div>
		<?php }else{ ?>
		<div class="cookbook-content">
			<ul>
			<?php $res=per_cookbook($dbc,$_GET['user_id']);foreach ($res as $row) { ?>
				<li>
					<a href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
						<span><img src="<?php 	echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
					</a>
					<a class="user" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>"><?php echo $row['food_name']; ?></a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
	</div>

	<div style="clear:both;"></div>	
	<!--话题-->
	<div class="topic">
		<div class="title">
			<h3><?php echo getUserName($dbc,$_GET['user_id']); ?>的话题</h3>
			<a href="personal_topic.php?user_id=<?php echo $_GET['user_id']; ?>">共<?php echo per_topic_num($dbc,$_GET['user_id']); ?>个</a>
		</div>
<?php if(per_topic_num($dbc,$_GET['user_id'])==0){?>
<div class="topic-content blanks">还没有发布话题。</div>
	<?php  }else{ ?>
		<div class="topic-content">
		<?php $topic_res=per_topic($dbc,$user_id);  foreach($topic_res as $topic_row){  
		  $res=user_info($dbc,$_GET['user_id']);foreach($res as $row){?>
				<div class="w2-box">
					<div class="user">
						<a target="_blank" href="personal_index.php?user_id=<?php echo $topic_row['publisher_id']; ?>">
							<img src="<?php echo $row['head_img'] ?>">
						</a>
						<div>
							<a target="_blank" class="name" href="personal_index.php?user_id=<?php echo $topic_row['publisher_id']; ?>"><?php echo $row['name'];?></a><?php } ?>
							<span><?php echo $topic_row['created_at']; ?></span>
						</div>
					</div>
					<div class="user-text">
					<div class="u-p">
						<a target="_blank" href="topic_page.php?topic_id=<?php echo $topic_row['id']; ?>"><?php echo $topic_row['content']; ?></a>
					</div>							
					<a target="_blank" class="u-img" href="topic_page.php?topic_id=<?php echo $topic_row['id']; ?>">
					<?php $img_res=fing_topic_img($dbc,$topic_row['id']);foreach($img_res as $ims_row){  ?>
						<img src="<?php echo $ims_row['topic_img']; ?>"/>
						<?php } ?>
					</a>
					<span><?php echo topic_like_btn($dbc,$row['id']); ?>个喜欢，<?php echo topic_comments_num($dbc,$topic_row['id']); ?>条评论</span>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
	</div>
</div>
</div>
<div style="clear:both;"></div>
<?php 
include('../views/layouts/footer.html');
 ?>
