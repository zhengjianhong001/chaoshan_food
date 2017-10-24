<?php 
$title="个人主页";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/personal_nav.html');
?>
<div class="cookbook">
	<div class="left">
		<div class="title">
			<h3><?php echo getUserName($dbc,$_GET['user_id']); ?>的菜谱</h3>
			<a class="per_collect_a"  onclick="var per_collect_food=document.getElementById('per_collect_food');var per_collect_topic=document.getElementById('per_collect_topic');per_collect_food.style.display='block';per_collect_topic.style.display='none';" href="javascript:void(0);">菜谱</a>
			<a class="per_collect_a"  onclick="var per_collect_food=document.getElementById('per_collect_food');var per_collect_topic=document.getElementById('per_collect_topic');per_collect_food.style.display='none';per_collect_topic.style.display='block';"  href="javascript:void(0);">话题</a>
		</div>
		<div class="left-content" id="per_collect_food" style="display: block;">
		<?php if(per_cookbook_colect($dbc)->rowCount()==0){?>
						<span class="blanks" style="position: relative;top: 100px;">还没有收藏菜谱。</span>
			<?php }else{?>
			<ul>
			<?php $res=per_cookbook_colect($dbc);foreach ($res as $row) {  ?>
				<li>
					<a target="_blank" class="per_cookbook_pic" href="CookBook_recipe.php?food_id=<?php echo $row['food_id']; ?>">
						<img src="<?php echo  fing_cookbook_img($dbc,$row['food_id']) ?>"/>
					</a>					

					<div class="per_cookbook_detail">
						<h2>
							<a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['food_id']; ?>"><?php $food_res=sel_food($dbc,$row['food_id']);foreach($food_res as $food_row){ echo $food_row['food_name']; ?></a>
						</h2>
						<p class="time"><?php echo $food_row['created_at']; ?></p>
						<p>原料：<?php echo $food_row['main_ingredient']; }?>。</p>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		<div class="left-content topic_content" id="per_collect_topic" style="display:none;">
		<?php  if(per_topic_colect($dbc)->rowCount()==0){?>
							<span class="blanks" style="position: relative;top: 80px;left: 140px;">还没有收藏话题。</span>
			<?php }else{ ?>
		<ul>
		<?php $topic_id_res=per_topic_colect($dbc);foreach($topic_id_res as $topic_id_row) {  ?>
			<li> 
				<div class="per_topic_perInfo">
				<?php $res=user_info($dbc,$_GET['user_id']);foreach($res as $row){ ?>
				<a  href="personal_index.php?user_id=<?php  echo $topic_row['publisher_id']; ?>"><img   src="<?php echo $row['head_img'] ?>" alt=""></a>

			<div class="per_topic_topInfo">
				<a  href=""><?php echo $row['name'];}?></a><br><span><?php   $topic_res=sel_topic($dbc,$topic_id_row['topic_id']);foreach($topic_res as $topic_row) {  $topic_row['created_at']; ?></span>
			</div>
				</div>
				<div class="per_topic_otherInfo">
					<div><a target="_blank" href="topic_page.php?topic_id=<?php echo $topic_row['id']; ?>"><?php echo $topic_row['content']; ?></a></div>
					<a class="per_topic_otherInfo_a" href="topic_page.php?topic_id=<?php echo $topic_row['id']; ?>" target="_blank">
						<?php $img_res=fing_topic_img($dbc,$topic_row['id']);foreach($img_res as $ims_row){  ?>
						<img src="<?php echo $ims_row['topic_img']; ?>"/>
						<?php } ?>
					</a>
					<p><?php echo topic_like_btn($dbc,$topic_row['id']);} ?>个喜欢，<?php echo topic_comments_num($dbc,$topic_row['id']); ?>个评论</p>
				</div>
			</li>
			<?php } ?>
		</ul>
		<?php } ?>
		</div>
	</div>
	<div class="per_cookbook_right">
		<a href="#">
			<img src="../assets/img/right.jpg" />
		</a>
	</div>
	</div>
</div>

<?php 
include('../views/layouts/footer.html');
 ?>