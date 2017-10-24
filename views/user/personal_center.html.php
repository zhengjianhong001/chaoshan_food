<?php 
$title="个人中心";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/left_menu.html');
include('../views/layouts/right_content.html');
?>
<div style="margin-left: 130px;margin-top: 100px;width: 1150px;">
<div class="w1" id="tab" style="clear: both;">
			<div class="tablist">
				<h3 class="select">我的粉丝</h3>
				<h3>我关注的</h3>
			</div>
			<div class="tabcontent">
			<!--我的粉丝-->
				<ul class="active">
					<?php $res=follow_me($dbc); foreach($res as $row){?>
					<li id="per_center_li">
						<div class="per_center_div">
							<a target="_blank" id="per_center_img"  href="personal_index.php?user_id=<?php echo $row['follower_id']; ?>"><img  src="<?php $name=getUserName($dbc,$row['follower_id']); echo getHeadImage($dbc,$name); ?>" alt=""></a>
							<a target="_blank"  id="per_center_name"  href="personal_index.php?user_id=<?php echo $row['follower_id']; ?>"><?php echo getUserName($dbc,$row['follower_id']); ?></a>
							<span id="per_center_follow">关注（<?php show_attention_num($dbc,$row['follower_id']); ?>） 粉丝（<?php show_fans_num($dbc,$row['follower_id']); ?>）</span>
							
						</div>
					</li> 
<?php } ?>
					
					
					
				</ul>
				<!--我关注的-->
				<ul>
					
					<?php $num=0; $res=my_follows($dbc); foreach($res as $row){?>
					<li id="per_center_li" >
						<div class="per_center_div">
							<a target="_blank" id="per_center_img"  href="personal_index.php?user_id=<?php echo $row['followed_id']; ?>"><img  src="<?php $name=getUserName($dbc,$row['followed_id']); echo getHeadImage($dbc,$name); ?>" alt=""></a>
							<a target="_blank"  id="per_center_name"  href="personal_index.php?user_id=<?php echo $row['followed_id']; ?>"><?php echo getUserName($dbc,$row['followed_id']);; ?></a>
							<span id="per_center_follow">关注（<?php show_attention_num($dbc,$row['followed_id']); ?>） 粉丝（<?php show_fans_num($dbc,$row['followed_id']); ?>）</span>
							
							<a id="per_center_dele" href="mc.php?do_dele=del&people_id=<?php echo $row['followed_id']; ?>">取消关注</a>
						</div>
					</li>
<?php } ?>
				</ul>
				
			</div>
</div> 
</div>

<script>
	window.onload = function () {
    tab();
}

</script>