<?php 
if(isset($_COOKIE['userName']) && $_COOKIE['userName']!='' ){
	require ('../mysql_connect.php');
  require('../models/users.php');
  if(!empty($_GET['do_dele']) && $_GET['do_dele']=='del' && !empty($_GET['people_id']) ){
  		per_center_deluser_connect($dbc);
  }
 include('../views/user/personal_center.html.php');
}else{
	echo "<script>alert('请先登录！');</script>";
	header("location: login.php");
}


 ?>