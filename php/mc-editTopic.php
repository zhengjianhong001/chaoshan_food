<?php 
if(isset($_COOKIE['userName']) && $_COOKIE['userName']!='' ){
 require ('../mysql_connect.php');
  require('../models/users.php');
  require('../models/cookbook.php');
   include('../views/user/mc-editTopic.html.php');
  if ($_SERVER['REQUEST_METHOD']=='POST') {
			// echo "<pre>";
			// foreach ($_FILES['upload'] as $key => $value) {
			// echo "key为$key<br/>值为$value<hr/>";}
			// echo "</pre>";
			 $topicImg_file = $_FILES['topicImg_file'];  //话题图片多图（二维数组）
			 $topi_con=$_POST['topi_con'];                //话题内容
			 $upload = $_FILES['upload'];                   //话题视频
			 if(empty($topi_con)){
			 	echo "<script>alert('话题内容不能为空!')</script>";
			 }elseif ($topicImg_file['name'][0]=='') {
			 	echo "<script>alert('话题图片不能为空!')</script>";
			 }elseif($upload['size']>10000000){
			 		echo "<script>alert('视频最大不能超过10M!')</script>";
			 }else{
			 	if($upload['name']==''){
						$last_insert_id = upTopic_none_video($dbc,$topi_con);
			 	}else{ 
 						$last_insert_id = upTopic($dbc,$topi_con,$upload);
			 	}
			 	       
			 			if(topic_img_save($dbc,$last_insert_id,$topicImg_file)=='false'){
			 				echo "<script>alert('话题发表失败')</script>";
			 			}else{
									echo "<script>alert('话题发表成功');window.location.href='mc-topic.php';</script>";
			 			}
			 		
			 }
				 
	}	
	  }else{
	echo "<script>alert('请先登录！');</script>";
	header("location: login.php");
}
		
 ?>