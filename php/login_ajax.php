<?php 
require_once '../mysql_connect.php'; 
function login_verify($dbc,$user_name){
	$q="select * from personal_info where name='$user_name'";
	$r=$dbc->prepare($q);
	$r->execute();
	if($r->rowCount()==0){
		echo  'y';
	}else{
		echo 'n';
	}
}
echo login_verify($dbc,$_GET['userName']);
?>