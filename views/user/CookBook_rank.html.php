<?php 
$title="食潮天下|菜谱排行";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/cookbook_bar.html');
?>
<div class="CookBook_category_content">
	<div class="ui_title_wrap">
	<h1><a  href="">菜谱排行</a></h1>
	</div>
	<div style="width: 945px; height: 200px;">
	<ul class="my_cookbook_list_ul food_rank_ul">
	<?php $food_id_res=rank_food($dbc); foreach($food_id_res as $food_id_row){	 ?>
		<li>
		<div class="food_rank_con">
		    <div><a target="_blank" class="food_rank_img"   href="CookBook_recipe.php?food_id=<?php echo $food_id_row['food_id']; ?>"><img class="my_cookbook_list_img "  src="<?php echo fing_cookbook_img($dbc,$food_id_row['food_id']); ?>" alt="" >
		    </a></div>
			<div class="my_cookbook_list_detail">
			<?php $food_res=sel_food($dbc,$food_id_row['food_id']);foreach($food_res as $food_row){ 	 ?>
							<h2><a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $food_id_row['food_id']; ?>"><?php echo $food_row['food_name']; ?></a></h2>
							<p class="my_cookbook_list_detail_p" style="margin-left: 0;"><a target="_blank" href="personal_cookbook.php?user_id=<?php echo getUser_id($dbc,$food_id_row['food_id']); ?>"><?php echo getName_food_id($dbc,$food_id_row['food_id']); ?></a></p>
							<p class="my_cookbook_list_detail_p" style="margin-top:-10px;" >原料：<?php echo $food_row['main_ingredient'];} ?>。</p>
			</div>
		</div>
		</li>
		<?php } ?>	
			
	</ul>
</div>
</div>
<?php 
include('../views/layouts/footer.html');
?> 