<?php 
$title="个人中心|我的收藏";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/left_menu.html');
include('../views/layouts/mc-collect.html');
?>
<div class="my_cookbook_list">
	<ul class="my_cookbook_list_ul"  style="">
		<?php $res = topic_colect($dbc);  foreach ($res as $row){   
			$topics=sel_topic($dbc,$row['topic_id']); foreach ($topics as $topic_row){?>
		<li>
		<div style="height: 180px;">
		<a href="" target="_blank"><img class="topi_collect_user_img"  src="<?php echo getUserImg($dbc,$topic_row['publisher_id']); ?>"  alt=""></a>
		<div class="topi_collect_con">
			<div class="topi_collect_name">
			<a href="" target="_blank"><?php echo getUserName($dbc,$topic_row['publisher_id']); ?></a>
			<br/>
			<span><?php echo $topic_row['created_at'] ?></span>
			<div class="topi_collect_say">
			<a href="topic_page.php?topic_id=<?php echo $row['topic_id']; ?>" target="_blank"><?php  $topic_content= $topic_row['content'];  if(strlen($topic_content)>25){echo mb_substr($topic_content,0,24,"utf-8")."......";}else{echo $topic_content;}} ?></a>
			</div>	
			<div>
			<?php $res_imgs=fing_topic_img($dbc,$row['topic_id']);foreach ($res_imgs as $imgs_row){ ?>
				<a href="topic_page.php?topic_id=<?php echo $row['topic_id']; ?>" target="_blank">
					<img src="<?php echo  $imgs_row['topic_img']; ?>" style="max-width: 100px;max-height: 100px;"  alt="">
				</a>
			<?php } ?>
			</div>
			</div>
		</div>	
			<a class="del" href="mc-collect-topic.php?action=del&topic_id=<?php echo $row['topic_id']; ?>"><p>移除</p></a>
		</div>
		</li>
		<?php } ?>
		
	</ul>
</div>