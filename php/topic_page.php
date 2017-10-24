<?php 
 	require ('../mysql_connect.php');
  	require('../models/users.php');
  require('../models/cookbook.php');
  if (isset($_GET['topic_id'])) {
  	 
  	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
  			$user_id=getID($dbc,$_COOKIE['userName']);
  			$commenter_text=$_POST['commenter_text'];
  			$topic_id=$_GET['topic_id'];
        if(empty($commenter_text) || $commenter_text==" "){
            echo "<script>alert('请输入评论内容')</script>";
        }else{
        publish_topic_comments($dbc,$user_id,$topic_id,$commenter_text);
            }
      }
        
  	}
  	include('../views/user/topic_page.html.php');
  

 ?>