<?php 
$title="个人中心|我的收藏";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/left_menu.html');
include('../views/layouts/mc-collect.html');
?>
<div class="my_cookbook_list">
	<ul class="my_cookbook_list_ul">
		<?php $res = cookbook_colect($dbc);  foreach ($res as $row){  ?>
		<li>
		<div style="height: 180px;">
		<?php  $foods=sel_food($dbc,$row['food_id']); foreach ($foods as $food_row){ ?>
		    <div><a href="CookBook_recipe.php?food_id=<?php echo $food_row['id']; ?>"><img  src="<?php $imgs=fing_cookbook_img($dbc,$food_row['id']); echo $imgs; ?>" alt="" class="my_cookbook_list_img" ></a></div>
			<div class="my_cookbook_list_detail">
							<h2><a href="CookBook_recipe.php?food_id=<?php echo $food_row['id']; ?>"><?php echo $food_row['food_name']; ?></a></h2>
							<p class="my_cookbook_list_detail_p"><?php echo $food_row['created_at']; ?></p>
							<p class="my_cookbook_list_detail_p">原料：<?php echo $food_row['main_ingredient']; ?>。</p>
			</div>
			
			<a class="del" href="mc-collect.php?action=del&food_id=<?php echo $food_row['id']; ?>"><p>移除</p></a>
		
		</div>
		</li>
		<?php }} ?>
	</ul>
</div>