<?php 
require_once '../mysql_connect.php'; 
require_once '../models/cookbook.php';
require_once '../models/users.php';

	$user_id =  getID($dbc,$_COOKIE['userName']);
echo update_like_num($dbc,$user_id,$_GET['food_like_id']);
	

 ?>