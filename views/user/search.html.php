<?php  
$title="食潮天下|综合搜索"; 
include('../views/layouts/navigation_bar.html');
?>
<div class="search_con">
	 <form action="search.php" id="search_form" method="post"   autocomplete="off">
		<div class="search_form"> 
			<input type="text" name="searchName" value="<?php if(!empty($_POST['searchName'])){	echo $_POST['searchName'];} ?>">
			<a href="javascript:document:search_form.submit();">搜索</a>
		</div>  
	</form>
	<div class="search_res">
	<?php if(!empty($_POST['searchName'])){  ?>
		<div class="se_title">
		<div class="se_title_wrap">
    <span class="se_title_name"><?php echo $_POST['searchName']; ?></span>
    <span class="se_title_num">约<?php echo search_food($dbc)->rowCount();  ?>条结果</span>
		</div>
		</div>
		<div class="se_res">  
			<ul>	
			<?php  $res=search_food($dbc); foreach($res as $row){?>			
				<li> 
					<div class="se_pic">
						<a href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>"  target="_blank">
							<img  src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>" alt="" >
						</a>
					</div>
					<div class="se_detail">
						<a target="_blank" class="se_detail_name" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>"><?php echo $row['food_name']; ?></a><br/>
						<a target="_blank" class="se_detail_user"  href="personal_cookbook.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getName_food_id($dbc,$row['id']); ?></a>
						<p class="se_detail_main">原料:<?php echo $row['main_ingredient'];  ?> 。</p>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php }else{ ?>

<div class="se_title">
		<div class="se_title_wrap">
    <span class="se_title_name"></span>
    <span class="se_title_num"></span>
		</div>
		</div>
		<div class="se_res"> 
			<div class="blanks">搜索你想要的美食。</div>
		</div>
		<?php } ?>
		<div class="user_search">
			<div class="user_search_pic">
				<span>大家都在搜</span>
			</div>
			
			<ul class="user_search_ul">
				<li><a class="user_search_name"   href="search.php?searchName=牛肉火锅">牛肉火锅</a></li>
				<li><a class="user_search_name"  href="search.php?searchName=潮汕肠粉">潮汕肠粉</a></li>
				<li><a class="user_search_name"  href="search.php?searchName=耗烙">耗烙</a></li>
				<li><a class="user_search_name"  href="search.php?searchName=鱼丸">鱼丸</a></li>
				<li><a class="user_search_name"  href="search.php?searchName=潮汕草粿">潮汕草粿</a></li>
				<li><a class="user_search_name"  href="search.php?searchName=潮汕甘草水果">潮汕甘草水果</a></li>
				<li><a class="user_search_name"  href="search.php?searchName=潮汕浮豆干">潮汕浮豆干</a></li>
				<li><a class="user_search_name"  href="search.php?searchName=潮汕腌蚌">潮汕腌蚌</a></li>
			</ul>
			
		</div>
	</div>
</div>
<?php 
include('../views/layouts/footer.html');
 ?>