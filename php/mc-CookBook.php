<?php 
	require ('../mysql_connect.php');
  	require('../models/users.php');
    require('../models/cookbook.php');
     if (isset($_COOKIE['userName']) && $_COOKIE['userName']!='') {
    include('../views/user/mc-CookBook.html.php');
        if(isset($_GET['action']) && $_GET['action']=='del'){
	  del_food($dbc,$_GET['food_id'],'mc-CookBook.php');	
}
}else{
    	header("Location: login.php");
    }
 ?>
 