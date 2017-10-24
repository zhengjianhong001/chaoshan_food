<?php  
 require ('../mysql_connect.php');
  require('../models/users.php'); 
    require('../models/cookbook.php');
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {// 处理表单
 	$searchName=$_POST['searchName'];
 }elseif (!empty($_GET['searchName'])){
 	$_POST['searchName']=$_GET['searchName'];
 }
  include('../views/user/search.html.php');
 ?>
