<?php 
$title="个人中心|菜谱退稿箱";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/left_menu.html');
include('../views/layouts/mc-cookbook_navigation_bar.html');
?>
<div class="my_cookbook_list">
	<ul class="my_cookbook_list_ul"  style="width: 1180px;margin-left:0px;">
		<?php $res=cookbook_show($dbc,-1); foreach ($res as $row){  ?>
		<li>
		<div style="height: 180px;">
		    <div><a href=""><img src="<?php $imgs=fing_cookbook_img($dbc,$row['id']); echo $imgs; ?>" alt="" class="my_cookbook_list_img" ></a></div>
			<div class="my_cookbook_list_detail">
							<h2><a href=""><?php echo $row['food_name']; ?></a></h2>
							<p class="my_cookbook_list_detail_p"><?php echo $row['created_at']; ?></p>
							<p class="my_cookbook_list_detail_p" style="color: red;">退稿原因：<?php echo $row['check_text']; ?>。</p>
			</div>
			
				<a class="del" href="mc-examed.php?action=del&food_id=<?php echo $row['id']; ?>"><p style="margin-left: 30px;">删除</p></a>
		
		</div>
		</li>
			<?php } ?>
	</ul>
</div>