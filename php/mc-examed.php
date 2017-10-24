<?php 
if(isset($_COOKIE['userName']) && $_COOKIE['userName']!='' ){
 	require ('../mysql_connect.php');
  	require('../models/users.php');
   require('../models/cookbook.php');
   include('../views/user/mc-examed.html.php');   
   if(isset($_GET['action']) && $_GET['action']=='del'){
	  del_food($dbc,$_GET['food_id'],'mc-examed.php');	
}
   }else{
	echo "<script>alert('请先登录！');</script>";
	header("location: login.php");
}