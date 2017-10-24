<?php 
	require ('../mysql_connect.php');
  	require('../models/users.php');
    require('../models/cookbook.php');
    if (isset($_COOKIE['userName']) && $_COOKIE['userName']!='') {
    	$userInfo=sel_userInfo($dbc,$_COOKIE['userName']);
    	foreach ($userInfo as $row){
    	include('../views/user/mc-info.html.php');
    }
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {       // 处理表单
   			$step_img=$_FILES['step_img'];
   			$radio=$_POST['radio'];
  			$city=$_POST['city'];
    		$personal_write=$_POST['personal_write'];
  			$email=$_POST['email'];
  			if(!empty($email))
  			{
		    	update_userInfo($dbc,$step_img,$radio,$city,$personal_write,$email);
  			}
    }
    }else{
    	header("Location: login.php");
    }
    
?>