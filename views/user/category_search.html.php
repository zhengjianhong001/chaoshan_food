<?php 
$title="食潮天下|菜谱";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/cookbook_bar.html');
?>
<div class="CookBook_category_content">
	<div class="ui_title_wrap">
	<h1><a href=""><?php echo $_GET['searchName']; ?>菜谱</a></h1>
	</div>
	<div style="width: 945px; height: 200px;">
	<ul class="my_cookbook_list_ul"  style="width: 945px;margin-left:0px;">
		<?php $res=category_food($dbc,$_GET['row'],$_GET['searchName']); foreach ($res as $row){  ?>
		<li>
		<div style="height: 180px;">
		    <div><a style="font-size: 16px;color: #ccc;height: 40px;line-height: 40px;text-decoration: none;display: inline-block;"  href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>"><img class="my_cookbook_list_img "  src="<?php $imgs=fing_cookbook_img($dbc,$row['id']); echo $imgs; ?>" alt="" ></a></div>
			<div class="my_cookbook_list_detail">
							<h2><a href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>"><?php echo $row['food_name']; ?></a></h2>
							<p class="my_cookbook_list_detail_p" style="margin-left: 0;"><a href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); ?></a></p>
							<p class="my_cookbook_list_detail_p" style="margin-top:-10px;" >原料：<?php echo $row['main_ingredient']; ?>。</p>
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