<?php 
$title="个人主页";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/personal_nav.html');
?>
<div class="topic">
	<div class="left">
		<div class="title" style="width: 640px;">
			<h3><?php echo getUserName($dbc,$_GET['user_id']); ?>的话题</h3>
			<span>共<?php echo per_topic_num($dbc,$_GET['user_id']); ?>篇</span>
		</div>
		<?php if(per_topic_num($dbc,$_GET['user_id'])==0){?>
<div class="left-content topic_content blanks">还没有发布话题。</div>
		<?php  	}else{ ?>
		<div class="left-content topic_content">
		<ul>
		<?php  $topic_res=per_topic($dbc,$user_id);  foreach($topic_res as $topic_row){  
		   ?>
			<li> 
				<div class="per_topic_perInfo">
				<?php $res=user_info($dbc,$_GET['user_id']);foreach($res as $row){ ?>
				<a  href="personal_index.php?user_id=<?php  echo $topic_row['publisher_id']; ?>"><img   src="<?php echo $row['head_img'] ?>" alt=""></a>

			<div class="per_topic_topInfo">
				<a  href=""><?php echo $row['name'];}?></a><br><span><?php echo $topic_row['created_at']; ?></span>
			</div>
				</div>
				<div class="per_topic_otherInfo">
					<div><a target="_blank" href="topic_page.php?topic_id=<?php echo $topic_row['id']; ?>"><?php echo $topic_row['content']; ?></a></div>
					<a class="per_topic_otherInfo_a" href="topic_page.php?topic_id=<?php echo $topic_row['id']; ?>" target="_blank">
						<?php $img_res=fing_topic_img($dbc,$topic_row['id']);foreach($img_res as $ims_row){  ?>
						<img src="<?php echo $ims_row['topic_img']; ?>"/>
						<?php } ?>
					</a>
					<p><?php echo topic_like_btn($dbc,$topic_row['id']); ?>个喜欢，<?php echo topic_comments_num($dbc,$topic_row['id']); ?>个评论</p>
				</div>
			</li>
			<?php } ?>
		</ul>
		</div>
			<?php } ?>
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