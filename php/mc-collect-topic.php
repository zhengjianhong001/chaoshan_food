<?php 
	require ('../mysql_connect.php');
  	require('../models/users.php');
    require('../models/cookbook.php');
     if (isset($_COOKIE['userName']) && $_COOKIE['userName']!='') {
    include('../views/user/mc-collect-topic.html.php');
        if(isset($_GET['action']) && $_GET['action']=='del'){
	 		del_collect_topic($dbc,$_GET['topic_id']);		
}
}else{
    	header("Location: login.php");
    }

 ?>