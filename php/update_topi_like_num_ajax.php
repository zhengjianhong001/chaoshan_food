<?php 
require_once '../mysql_connect.php'; 
require_once '../models/cookbook.php';
require_once '../models/users.php';
$user_id =  getID($dbc,$_COOKIE['userName']);
echo update_topi_like_num($dbc,$user_id,$_GET['topic_like_id']);
 ?>