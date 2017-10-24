<?php    
$title="食潮天下|主页";
include('../views/layouts/navigation_bar.html');
?>
<div class="w logo_wrap2">
	<div class="logo_inner left"><a  href="index.php">食潮天下</a></div>
	<div class="logo_search right">
	  <form action="search.php" id="search_form" method="post"  target="_blank"  autocomplete="off">
	  <div> 
			<input type="text" class="search" name="searchName">
			<a href="javascript:document:search_form.submit();" class="search_btn">搜索</a>
	  </div>
	 </form>
	</div>
	<div class="logo_nav">
		<a  href="index.php" class="on" target="_blank">首页</a>
		<a href="CookBook.php"  target="_blank">菜谱</a>
		<a href="topic.php"  target="_blank">话题</a>
		<a href="http://www.chaoshanw.cn/Article/mjwh/"  target="_blank">潮汕文化</a>
	</div>
</div>
<div style="width: 100%;">
	<div id="slider">
	<ul class="slides clearfix">
		<li><img  onclick="window.open('https://world.taobao.com/item/546213629840.htm?fromSite=main&spm=a230r.1.14.21.ebb2eb2olTiLr&ns=1&abbucket=3#detail');" class="responsive" src="../assets/img/6.jpg"></li>
		<li><img  onclick="window.open('https://world.taobao.com/item/546213629840.htm?fromSite=main&spm=a230r.1.14.21.ebb2eb2olTiLr&ns=1&abbucket=3#detail');" class="responsive" src="../assets/img/7.jpg"></li>
		<li><img  onclick="window.open('https://world.taobao.com/item/553177784552.htm?fromSite=main&spm=a230r.1.14.25.ebb2eb29yzCQP&ns=1&abbucket=3#detail');" class="responsive" src="../assets/img/8.jpg"></li>
		<li><img  onclick="window.open('https://world.taobao.com/item/546213629840.htm?fromSite=main&spm=a230r.1.14.21.ebb2eb2olTiLr&ns=1&abbucket=3#detail');" class="responsive" src="../assets/img/9.jpg"></li>
	</ul>
	<ul class="controls">
		<li><img src="../assets/img/prev.png" alt="previous"></li>
		<li><img src="../assets/img/next.png" alt="next"></li>
	</ul>
	<ul class="pagination">
		<li class="active"></li>
		<li></li>
		<li></li>
		<li id="area_food_sel"></li>
	</ul>
</div>
<script src="../assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="../assets/js/easySlider.js"></script>
<script type="text/javascript">
	$(function() {
		$("#slider").easySlider( {
			slideSpeed: 500,
			paginationSpacing: "15px",
			paginationDiameter: "12px",
			paginationPositionFromBottom: "20px",
			slidesClass: ".slides",
			controlsClass: ".controls",
			paginationClass: ".pagination"					
		});
	});
</script>
<div class="area_food">
<div  class="area_food_title">
<h3 class="select area_food_sel">地区美食</h3>
</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="hovereffect area_all">
        <img class="img-responsive" style="height:200px;" src="../assets/img/area1.jpg"   alt="">
        <div class="overlay area_tail">
            <h2>汕头</h2>
            <a class="info" target="_blank" href="category_search.php?searchName=汕头&row=area">link here</a>
        </div>
    </div>
    <div class="hovereffect area_all">
        <img class="img-responsive" src="../assets/img/area3.jpg"   alt="">
        <div class="overlay area_tail">
            <h2>汕尾</h2>
            <a class="info" target="_blank" href="category_search.php?searchName=汕尾&row=area">link here</a>
        </div>
    </div>
    <div class="hovereffect area_all">
        <img class="img-responsive" style="height:200px;" src="../assets/img/area2.jpg"   alt="">
        <div class="overlay area_tail">
            <h2>潮州</h2>
            <a class="info" target="_blank" href="category_search.php?searchName=潮州&row=area">link here</a>
        </div>
    </div>
    <div class="hovereffect area_all">
        <img class="img-responsive" src="../assets/img/area4.jpg"   alt="">
        <div class="overlay area_tail">
            <h2>揭阳</h2>
            <a class="info" target="_blank" href="category_search.php?searchName=揭阳&row=area">link here</a>
        </div>
    </div>
     <div class="hovereffect area_all">
        <img class="img-responsive" src="../assets/img/area5.jpg"   alt="">
        <div class="overlay area_tail">
            <h2>陆丰</h2>
            <a class="info" target="_blank" href="category_search.php?searchName=陆丰&row=area">link here</a>
        </div>
    </div>
     <div class="hovereffect area_all">
        <img class="img-responsive" src="../assets/img/area6.jpg"   alt="">
        <div class="overlay area_tail">
            <h2>普宁</h2>
            <a class="info" target="_blank" href="category_search.php?searchName=普宁&row=area">link here</a>
        </div>
    </div>
    </div>
</div>
</div>
<div style="width:72%;margin-left: 180px;margin-top: -50px;">
	<!--新秀菜谱-->
		<div class="w1" id="tab" style="clear: both;">
			<div class="tablist">
				<h3 class="select">新秀菜谱</h3>
				<h3>一周热门</h3>
				<h3>最受欢迎的家常菜</h3>
			</div>
			<div class="tabcontent">
			<!--新秀菜谱-->
				<ul class="active">
					<li style="margin-left: -110px;">
					<?php $res=index_new_upfood_one($dbc);  foreach($res as $row){?>
						<a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
							<span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
						</a>

						<a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); }?></a>	
					</li>
					<?php $res=index_new_upfood_other($dbc);  foreach($res as $row){?>
					<li>
						<a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
							<span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
							
						</a>
						<a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); ?></a>
					</li>
					<?php } ?>
					
				</ul>
				<!--一周热门-->
				<ul>
					<li style="margin-left: -210px;">
					<?php $res=week_popular_food_one($dbc);
									foreach ($res as $row) {?>
						<a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['food_id']; ?>">
						
							<span><img src="<?php $food_res=sel_food($dbc,$row['food_id']);foreach ($food_res as $food_row) {
								echo fing_cookbook_img($dbc,$food_row['id']);
							 ?>"></span>
						</a>
						<a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $food_row['publish_id']; ?>"><?php echo getUserName($dbc,$food_row['publish_id']); }}?></a>
					
					</li>
					<?php $res=week_popular_food_other($dbc);
									foreach ($res as $row) {?>
					<li>			
						<a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['food_id']; ?>">
						
							<span><img src="<?php $food_res=sel_food($dbc,$row['food_id']);foreach ($food_res as $food_row) {
								echo fing_cookbook_img($dbc,$food_row['id']);
							 ?>"></span>
						</a>
						<a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $food_row['publish_id']; ?>"><?php echo getUserName($dbc,$food_row['publish_id']); }?></a>
					
					</li>
					<?php } ?>
				</ul>
				<!--最受欢迎的家常菜-->
				<ul>
					<li style="margin-left: -390px;">
					<?php $res=home_popuular_food_one($dbc); foreach ($res as  $row) {?>
						<a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
							<span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
						</a>
						<a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); }?></a>
					</li>
					<li style="margin-left: -137px;">
						<?php $res=home_popuular_food_two($dbc); foreach ($res as  $row) {?>
						<a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
							<span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
						</a>
						<a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); }?></a>
					</li>
					<?php $res=home_popuular_food_other($dbc); foreach ($res as  $row) {?>
					<li>
						<a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
							<span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
						</a>
						<a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); ?></a>
					</li>
				<?php } ?>	
				</ul>
			</div>
		</div>
		<!--热门话题-->
		<div class="w2">
			<div class="title">
				<h3>热门话题</h3>
			</div>
			<div class="w2-content">
			<?php $res=hot_topic($dbc);foreach ($res as $row) { ?>
				<div class="w2-box">
					<div class="user">
						<a target="_blank" href="personal_index.php?user_id=<?php echo $row['publisher_id']; ?>">
							<img src="<?php echo getUserImg($dbc,$row['publisher_id']); ?>">
						</a>
						<div>
							<a target="_blank" class="name" href="personal_index.php?user_id=<?php echo $row['publisher_id']; ?>"><?php echo getUserName($dbc,$row['publisher_id']); ?></a>
							<span><?php echo $row['created_at']; ?></span>
						</div>
					</div>
					<div class="user-text">
					<div class="u-p">
						<a target="_blank" href="topic_page.php?topic_id=<?php echo $row['id']; ?>"><?php echo $row['content']; ?></a>
					</div>							
					<a target="_blank" class="u-img" href="topic_page.php?topic_id=<?php echo $row['id']; ?>">
					<?php $img_res=fing_topic_img($dbc,$row['id']);foreach($img_res as $img_row){ ?>
						<img src="<?php echo $img_row['topic_img'] ?>"/>
					<?php } ?>
					</a>
					<span><?php echo topic_like_btn($dbc,$row['id']); ?>个喜欢，<?php echo topic_comments_num($dbc,$row['id']); ?>条评论</span>
					</div>
				</div>
				<?php } ?>			
			</div>
		</div>
	</div>
</div>
<script>
	window.onload = function () {
    tab();
}
</script>
<?php
include('../views/layouts/footer.html');
?>