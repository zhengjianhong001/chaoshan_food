<?php 
  require ('../mysql_connect.php');
  require('../models/users.php');
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
    $name=$_POST['user_name'];
    $psw=$_POST['psw'];
    $autoLogin=$_POST['autoLogin'];
      if (!empty($name) && !empty($psw)) {
           if (loginCheck($dbc,$name,$psw)) {
            if($autoLogin=='check'){
                 setcookie('userName',$name,time()+3600*24*365);
                 setcookie('password',$psw,time()+3600*24*365);

            }else{
              setcookie('userName',$name);              
              setcookie('password',$psw);              

            }
           
              header("location: index.php");    
           }else{
              echo "<script>alert('账号或密码输入错误！');</script>";
           }
      }else{
        echo "<script>alert('请输入完整的信息！');</script>";
      }
  }
  include('../views/user/login.html.php');
?>