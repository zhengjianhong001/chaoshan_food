<?php 
	require ('../mysql_connect.php');
  	require('../models/users.php');
    require('../models/cookbook.php');
     if (isset($_COOKIE['userName']) && $_COOKIE['userName']!='') {
	    include('../views/user/mc-changepsw.html.php');
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {       // 处理表单
   			$password_now=$_POST['password_now'];
  			$password_new=$_POST['password_new'];
    		$password_renew=$_POST['password_renew'];
  			changepsw($dbc,$password_now,$password_new,$password_renew);
    }
    }else{
    	header("Location: login.php");
    }
?>