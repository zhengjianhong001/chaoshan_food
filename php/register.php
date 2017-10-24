<?php 
  require ('../mysql_connect.php');
  require('../models/users.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {// 处理表单

  	$name=$_POST['user_name'];
  	$psw=$_POST['psw'];
    $repsw=$_POST['repsw'];
  	$email=$_POST['email'];
    $errors=validates_users_new($dbc);
    if(empty($errors)){
register_user($dbc,$name,$psw,$email);
  } else{
   
    echo "<script>alert('表单数据输入不符合,请重新输入!密码不少于6位字符')</script>";
  }
}
  include('../views/user/register.html.php');
 ?>