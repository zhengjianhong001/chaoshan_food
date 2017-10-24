<?php 
$res=sel_food($dbc,$_GET['food_id']); foreach ($res as $row){
$title="【图文】".$row['food_name'];
include('../views/layouts/navigation_bar.html');
include('../views/layouts/cookbook_bar.html');
?>

<div class="recipe_path">
	<p>所属分类： 潮汕菜系  </p>
</div>
<div class="recipe_content">
	<div class="space_left">
		<div class="recipe_name" style="width: 550px;">
			<h1 class="recipe_h"><a class="recipe_cook_name" href=""><?php  echo $row['food_name'];  ?></a></h1>
		</div>
		<a target="_blank" class="recipe_imgs" href="personal_cookbook.php?user_id=<?php echo $row['publish_id']; ?>"><img class="recipe_img" src="<?php echo getHeadimg_food_id($dbc,$_GET['food_id']) ?>" alt="" >
		<span><?php echo  getName_food_id($dbc,$_GET['food_id']); ?></span></a>
<div class="recipe_De_imgBox"><a href=""><img src="<?php echo fing_cookbook_img($dbc,$_GET['food_id']); ?>" alt=""></a></div>
		<div class="recipe_txt">
		<span class="recipe_text_start">“</span>
		<span class="recipe_text">	<?php  echo $row['descript'];?></span>
    	<span class="recipe_text_start">”</span>
    	</div>
    	<div class="mo">
    		<h3 class="recipe_h">食材明细</h3>
    	</div>
    	<div class="mo_main"><b><?php  echo $row['main_ingredient'];?></b></div>
    	<div class="mo_other" ><b><?php  echo $row['other_ingredient'];?></b></div>
    	<div class="mo_para">
    		<ul>
    			<li>
    			<h4><?php  echo $row['taste'];?></h4>
    			<span>口味</span>
    			</li>
    		<li>
    			<h4><?php  echo $row['gyi'];?></h4>
    			<span>工艺</span>
    			</li>
    			<li>
    			<h4><?php  echo $row['used_time'];?></h4>
    			<span>耗时</span>
    			</li>
    			<li>
    			<h4><?php  echo $row['difficult'];?></h4>
    			<span>难度</span>
    			</li>

    		</ul>
    	</div>
    	<div class="mo">
    		<h3 class="recipe_h"><?php  echo $row['food_name'];?>的做法步骤</h3>
    	</div>
    	<div class="recipe_step">
    		<ul>
            <?php $num=1; $cookbook_step= find_cookbook_step($dbc,$_GET['food_id']);foreach ($cookbook_step as $cookbook_step_row){ ?>
    			<li>
    			<div class="recipe_step_img"><img  src="<?php  echo $cookbook_step_row['step_img']; ?>" alt=""></div>
    			<div class="recipe_step_word">
    				<div class="recipe_step_num"><?php echo $num; ?></div>
    				<p style="width: 335px;"><?php  echo $cookbook_step_row['step_explain']; ?>
    				</p>
    			</div>
    			</li>
                <?php $num+=1; } ?>
    				
    		</ul>
    	</div>
    	<div class="mo">
    		<h3 class="recipe_h">小窍门</h3>
    	</div>
    	<div class="recipeTip">
    		<?php  echo $row['trick'];?>
    	</div>
    	<div style="font-size: 20px;height: 250px;">
    	<div style="width: 200px;position: relative;left: 100px;top: 50px;"><a id="a1" onclick="<?php if(isset($_COOKIE['userName']) && $_COOKIE['userName']!='' ){ ?>update_like_num(<?php echo $row['id']; ?>)<?php }else{  ?>alert('请先登录!');<?php } ?>"  href="#a1"><img width="50" height="50" src="../assets/img/like.jpg" alt=""><span id="like_num">
        <?php food_like_btn($dbc,$_GET['food_id']);?></span>人喜欢</a></div>

    	<div style="width: 200px;position: relative;left: 300px;"><a id="a2" onclick="<?php if(isset($_COOKIE['userName']) && $_COOKIE['userName']!='' ){ ?>update_collect_num(<?php echo $row['id']; ?>)<?php }else{  ?>alert('请先登录!');<?php } ?>"  href="#a2"><img width="50" height="50" src="../assets/img/collect.jpg" alt=""><span id="collect_num">
        <?php food_collect_btn($dbc,$_GET['food_id']);?></span>人收藏<?php } ?></a></div>
    	</div>
	</div>


	<div class="space_right">
	<a target="_blank" href="https://world.taobao.com/item/536177886204.htm?fromSite=main&spm=a230r.1.14.203.ebb2eb2W70gsl&ns=1&abbucket=3#detail">
		<img src="../assets/img/taobao.jpg" alt="">
		</a>
	</div>	
</div>
<?php 
include('../views/layouts/footer.html');
 ?>