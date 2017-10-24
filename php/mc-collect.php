<?php 
	require ('../mysql_connect.php');
  	require('../models/users.php');
    require('../models/cookbook.php');
     if (isset($_COOKIE['userName']) && $_COOKIE['userName']!='') {
    include('../views/user/mc-collect-food.html.php');
        if(isset($_GET['action']) && $_GET['action']=='del'){
	  del_collect_food($dbc,$_GET['food_id']);	
}
 }else{
    	header("Location: login.php");
    }

 ?>