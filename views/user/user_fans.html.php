<?php 
$title="个人主页";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/personal_nav.html');
?>
<div class="cookbook">
	<div class="left">
		<div class="title">
			<h3>TA的粉丝</h3>
		</div>
		<div class="left-content">
		<div class="padding_con"></div>
			<ul class="follwer_con">
			<?php $follower_res=sel_user_conn($dbc); foreach($follower_res as $follower_row){
			 ?>
				<li>
				<a  href="personal_index.php?user_id=<?php echo $follower_row['follower_id']; ?>" target="_blank"><img class="follwer_img" src="<?php echo getUserImg($dbc,$follower_row['follower_id']); ?>" alt=""><span><?php echo getUserName($dbc,$follower_row['follower_id']); ?></span>
				</a>
				</li>	
				<?php } ?>			
			</ul>
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