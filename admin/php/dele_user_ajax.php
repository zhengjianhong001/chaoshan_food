<?php 
require '../models/admin.php';
$user_id=$_GET['id'];
 dele_user($dbc,$user_id);
 ?>