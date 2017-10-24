<?php 
 if( isset($_GET['login']) && $_GET['login']=="out"){
 	setcookie('userName','',time()-3600);
 	header("location: index.php");
}else{
 require ('../mysql_connect.php');
  require('../models/users.php');
  require('../models/cookbook.php');
 include('../views/user/index.html.php');

}
 ?>
