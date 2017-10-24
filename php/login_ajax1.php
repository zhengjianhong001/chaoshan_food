<?php 
require_once '../mysql_connect.php'; 
function login_verify($dbc,$email){
	$q="select * from personal_info where email='$email'";
	$r=$dbc->prepare($q);
	$r->execute();
	if($r->rowCount()==0){
		echo  'y';
	}else{
		echo 'n';
	}
}
echo login_verify($dbc,$_GET['email']);
?>