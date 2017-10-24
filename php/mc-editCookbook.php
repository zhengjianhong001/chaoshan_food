<?php 
 header( 'Content-Type:text/html;charset=utf-8 ');
if(isset($_COOKIE['userName']) && $_COOKIE['userName']!='' ){
 	require ('../mysql_connect.php');
  	require('../models/users.php');
   require('../models/cookbook.php');
   include('../views/user/upfood.html.php');    //这句如果放在最后会出现样式混乱
    if ($_SERVER['REQUEST_METHOD']=='POST') {
  		  $foodName=$_POST['foodName'];   //获取菜谱名称
		  $foodImg_file = $_FILES['foodImg_file'];  //菜谱图片多图（二维数组）
		  $decript=$_POST['decript'];   //菜谱描述
		  $difficult=$_POST['difficult'];  //难度
		  $taste=$_POST['taste'];  //口味
		  $technology=$_POST['technology'];  //工艺
		  $used_time=$_POST['used_time'];   //耗时
		  $area=$_POST['area'];   //所属地区
		  $main_ingredient=$_POST['main_ingredient'];  //食材主料
		  $other_ingredient=$_POST['other_ingredient'];  //食材辅料
		  $step_img=$_FILES['step_img'];    //菜谱步骤图上传（二维数组）
		  $step_explain=$_POST['step_explain'];  //菜谱步骤说明（二维数组）
		  $trick=$_POST['trick'];
		   
          $errors = checkCookbook($foodName,$foodImg_file,$decript,$main_ingredient,$other_ingredient,$step_img,$step_explain,$trick); // 验证数据返回错误消息
    		if (!empty($errors)) {  
    			echo "<script>alert('请完善表单——".$errors[0]."')</script>";
			}else{         //表单输入正常
				$last_insert_id=cookbook_save($dbc,$foodName,$decript,$difficult,$taste,$technology,$used_time,$area,$main_ingredient,$other_ingredient,$trick);
				if(!food_img_save($dbc,$last_insert_id,$foodImg_file)&&!food_step_save($dbc,$last_insert_id,$step_img,$step_explain)){
					
					echo "<script>alert('菜谱上传成功，请等待审核');window.location.href='mc-examing.php';</script>";
					echo "<script>alert('话题发表成功');window.location.href='mc-topic.php';</script>";
				}else{
					echo "<script>alert('菜谱上传失败，请重新上传!');</script>";
				}
			}
}
   }else{
	echo "<script>alert('请先登录！');</script>";
	header("location: login.php");
}

  // if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  //   include('../views/user/upfood.html.php');
  // } 
 
?>
