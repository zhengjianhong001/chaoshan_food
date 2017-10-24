<?php 
$title="个人主页";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/personal_nav.html');
?>
<div class="cookbook">
	<div class="left">
		<div class="title">
			<h3><?php echo getUserName($dbc,$_GET['user_id']); ?>的菜谱</h3>
			<span>共<?php echo per_cookbook_num($dbc,$_GET['user_id']); ?>篇</span>
		</div>
		<?php if(per_cookbook_num($dbc,$_GET['user_id'])==0){?>
<div class="left-content blanks">还没有发布菜谱。</div>
			<?php }else{ ?>
		<div class="left-content">
			<ul>
			<?php $res=per_cookbook($dbc,$_GET['user_id']);foreach ($res as $row) {  ?>
				<li>
					<a target="_blank" class="per_cookbook_pic" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
						<img src="<?php echo  fing_cookbook_img($dbc,$row['id']) ?>"/>
					</a>					

					<div class="per_cookbook_detail">
						<h2>
							<a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>"><?php echo $row['food_name']; ?></a>
						</h2>
						<p class="time"><?php echo $row['created_at']; ?></p>
						<p>原料：<?php echo $row['main_ingredient']; ?>。</p>
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