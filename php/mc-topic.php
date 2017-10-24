<?php 
	require ('../mysql_connect.php');
  	require('../models/users.php');
    require('../models/cookbook.php');
    if (isset($_COOKIE['userName']) && $_COOKIE['userName']!='') {
    include('../views/user/mc-topic.html.php');
           if(isset($_GET['action']) && $_GET['action']=='del'){
           	
	  		del_topic($dbc,$_GET['topic_id'],'mc-topic.php');	
}
}else{
    	header("Location: login.php");
    }
 ?>