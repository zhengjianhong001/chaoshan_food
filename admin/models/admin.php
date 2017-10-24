<?php 
function sel_perInfo($dbc)
{
	$q="select * from personal_info";
	$res=$dbc->query($q);
	return $res;
}
function sel_admin_perInfo($dbc)
{
  $q="select * from admin";
  $res=$dbc->query($q);
  return $res;
}
function sel_perInfo_id($dbc,$user_id)
{
	$q="select * from personal_info where id=$user_id";
	$res=$dbc->query($q);
	return $res;
}
function sel_admin_id($dbc,$user_id)
{
  $q="select * from admin where id=$user_id";
  $res=$dbc->query($q);
  return $res;
}
function dele_user($dbc,$user_id)
{
	$q="delete from personal_info where id = $user_id";
	$affet_rows=$dbc->exec($q);
	if($affet_rows!=1){
		return "n";
	}else{
		return 'y';
	}
}
function dele_admin($dbc,$user_id)
{
  $q="delete from admin where id = $user_id";
  $affet_rows=$dbc->exec($q);
  if($affet_rows!=1){
    return "n";
  }else{
    return 'y';
  }
}
function dele_food($dbc,$food_id)
{
  $q="delete from food where id = $food_id";
  $affet_rows=$dbc->exec($q);
  if($affet_rows!=1){
    return "n";
  }else{
    return 'y';
  }
}
//管理员登录(防止SQL注入)
function admin_login($dbc,$name,$psw){
  $q="select * from admin where name=? and password=?";
  $r=$dbc->prepare($q);
  $r->execute(array($name,$psw));
  if($r->rowCount()==1){
    return 1;
  }else{
    return 0;
  }
}
/*管理员更新用户信息*/
 function admin_update_userInfo($dbc,$name,$sex,$personal_write,$email,$hometown_city,$user_id){  
$c=date("y-m-d H:i:s",time());
 $q="update  personal_info set name='$name', sex='$sex',hometown_city='$hometown_city',email='$email',personal_write='$personal_write',updated_at='$c' where id='$user_id'";
 $affect_rows=$dbc->exec($q);
      if($affect_rows==1){
        echo "<script>alert('修改成功！');</script>";
      }else{
echo "<script>alert('修改失败！');</script>";
      }
 	}
  /*管理员更新管理员信息*/
 function admin_update_admin($dbc,$name,$psw,$user_id){  

 $q="update  admin set name='$name', password='$psw' where id='$user_id'";
 $affect_rows=$dbc->exec($q);
      if($affect_rows==1){
        echo "<script>alert('修改成功！');</script>";
      }else{
echo "<script>alert('修改失败！');</script>";
      }
  }
 	/*用户模糊查询*/
 	function user_search($dbc,$username){
  $q="select * from personal_info where name like '%$username%'";
  $res=$dbc->query($q); 
       return $res; 
}
  /*管理员模糊查询*/
  function admin_search($dbc,$username){
  $q="select * from admin where name like '%$username%'";
  $res=$dbc->query($q); 
       return $res; 
}
/*菜谱审核*/
  function food_check($dbc,$status,$cause,$food_id){
  $q="update food  set exam=$status,check_text='$cause' where id = $food_id";
  $affect_rows=$dbc->exec($q); 
      if($affect_rows!=1){
        echo "<script>alert('审核失败！');</script>";
      }else{
        echo "<script>alert('审核成功！');window.location.href='index.php';</script>";
      }
}
  function food_show($dbc){
  $q="select * from food ";
  $res=$dbc->query($q); 
 return $res; 
}
function getUserName($dbc,$user_id){
  $q="select name from personal_info where id='$user_id'";
  $r=$dbc->query($q);
  $userName=$r->fetchColumn(0);
  return $userName;
}
 function food_check_edit($dbc,$food_id){
  $q="select * from food  where id=$food_id";
  $res=$dbc->query($q); 
 return $res; 
}
//根据food_id找到菜谱图片
function fing_cookbook_img($dbc,$food_id)
{
   
   $sql = "select * from food_img where food_id=$food_id";
   $res = $dbc->query($sql);
   return $res;
}
//根据food_id查找菜谱步骤
function find_cookbook_step($dbc,$food_id)
{
  $sql = "select * from food_step  where food_id=$food_id";
    $food_step_all = $dbc->query($sql);
    return $food_step_all;
}
  /*菜谱模糊查询*/
  function food_search($dbc,$food_name){
  $q="select * from food where food_name like '%$food_name%'";
  $res=$dbc->query($q); 
   return $res; 
}
function add_admin($dbc,$name,$psw){
  $c=date("y-m-d H:i:s",time());
  $q="insert into admin(name,password,created_at)values('$name','$psw','$c');";
  $affect_rows=$dbc->exec($q);
  if($affect_rows==1){
    echo "<script>alert('添加管理员成功');window.location.href='admin.php';</script>";

  }else{
 echo "<script>alert('添加管理员失败');</script>";
  }
}
function sel_topic($dbc)
{
  $q="select * from topic";
  $res=$dbc->query($q);
  return $res;
} 
//根据topic_id找到话题图片
function fing_topic_img($dbc,$topic_id)
{
   
   $sql = "select * from topic_img where topic_id=$topic_id";
   $res = $dbc->query($sql);
   return $res;
}
function dele_topic($dbc,$topic_id)
{ 
  $q="delete from topic where id = $topic_id";
  $affet_rows=$dbc->exec($q);
  if($affet_rows!=1){
    return "n";
  }else{
    return 'y';
  }
}
function topic_search($dbc,$topic_con){
    $q="select * from topic where content like '%$topic_con%'";
  $res=$dbc->query($q); 
       return $res; 
}
function sel_topic_comments($dbc){
  $q="select * from topic_commnet";
  $res=$dbc->query($q);
  return $res;
}
function topic_comments_search($dbc,$comments){
   $q="select * from topic_commnet where comments like '%$comments%'";
  $res=$dbc->query($q); 
       return $res; 
}
function dele_topic_comments($dbc,$comments_id)
{ 
  $q="delete from topic_commnet where id = $comments_id";
  $affet_rows=$dbc->exec($q);
  if($affet_rows!=1){
    return "n";
  }else{
    return 'y';
  }
}
 ?>




