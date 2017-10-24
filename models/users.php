<?php header( 'Content-Type:text/html;charset=utf-8');

//用户注册
	function register_user($dbc,$name,$psw,$email){  
		$c=date("y-m-d H:i:s",time());
		$q="insert into personal_info(name,password_digest,email,created_at,updated_at)values('$name',SHA1('$psw'),'$email','$c','$c')";
			$affect_rows=$dbc->exec($q);
			if($affect_rows==1){
				echo "<script>alert('注册成功！');</script>";
			}else{
					echo "<script>alert('注册失败');</script>";
					print_r($dbc->errorInfo());
			}
	}

//验证注册表单的数据 
  function validates_users_new($dbc) {
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $errors = array(); // 初始化errors数组    
    if (empty($_POST['user_name'])) {  // 验证姓名的存在性与长度
      $errors[] = '姓名不能为空！';
    } else if (strlen($_POST['user_name']) > 50) {
      $errors[] = '姓名太长了！';
    }   
    if (empty($_POST['email'])) { //验证email的存在性、长度与格式
      $errors[] = 'emai不能为空！';
    } else if (strlen($_POST['email']) > 255) {
      $errors[] = 'email太长了！';
    } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'email格式错误！';
    } 
    
    if (empty($_POST['psw']) || empty($_POST['repsw'])) {  // 验证密码的存在性、长度与匹配
      $errors[] = '密码或密码确认不能为空！';
    } else if (strlen($_POST['psw']) < 6 || strlen($_POST['repsw']) < 6) {
      $errors[] = '密码不能太短！';
    } else if ($_POST['psw'] != $_POST['repsw']) {
      $errors[] = '密码不匹配！';
    } 
      $q="select * from personal_info where name='$user_name'";
      $r=$dbc->prepare($q);
      $r->execute();
      if($r->rowCount()!=0){
      $errors[] = '用户名已存在！';
     }

     $q1="select * from personal_info where email='$email'";
  $r1=$dbc->prepare($q1);
  $r1->execute();
  if($r1->rowCount()!=0){
    $errors[] = '邮箱已存在！';
  }
    return $errors;
  }

  //用户更新信息
  function update_userInfo($dbc,$step_img,$radio,$city,$personal_write,$email){  
    $c=date("y-m-d h:i:s",time());
    $time=date('YmdHis',time()).rand(100,999);  //时间戳  
    if(move_uploaded_file($step_img['tmp_name'], "../uploads/head_img/".$time.iconv("UTF-8", "GB2312",$step_img['name']))){
     $imgName="../uploads/head_img/".$time.$step_img['name'];
    $name=$_COOKIE['userName'];
    $q="update  personal_info set head_img='$imgName',sex='$radio',hometown_city='$city',email='$email',personal_write='$personal_write',updated_at='$c' where name='$name'";
      $affect_rows=$dbc->exec($q);
      if($affect_rows==1){
        echo "<script>alert('修改成功！');window.location.href='mc-info.php'</script>";
      }else{
          echo "<script>alert('修改失败');</script>";
          echo $step_img['name'];
          print_r($dbc->errorInfo());
      }
    }elseif(empty($step_img['name'])){
         $name=$_COOKIE['userName'];
        $q="update  personal_info set sex='$radio',hometown_city='$city',email='$email',personal_write='$personal_write',updated_at='$c' where name='$name'";
      $affect_rows=$dbc->exec($q);
      if($affect_rows==1){
        echo "<script>alert('修改成功！');window.location.href='mc-info.php'</script>";
      }else{
          echo "<script>alert('修改失败');</script>";
          print_r($dbc->errorInfo());
    }
}
  }
  //用户修改密码
  function changepsw($dbc,$password_now,$password_new,$password_renew){
    if(empty($password_renew) && empty($password_new) && empty($password_now)){
  echo "<script>alert('请将表单信息填写完整');</script>";
  }else{
    if(loginCheck($dbc,$_COOKIE['userName'],$password_now)){
      if(strlen($password_new)<7){
        echo "<script>alert('新密码长度不能小于7个字符');</script>";
      }elseif(strlen($password_new)>14){
        echo "<script>alert('新密码长度不能超过14个字符');</script>";
      }elseif($password_new!=$password_renew){
      echo "<script>alert('确认密码不一样');</script>";
      }else{
        $password=SHA1($password_new);
        $name=$_COOKIE['userName'];
          $q="update personal_info set password_digest='$password' where name='$name'";
            $affect_rows=$dbc->exec($q);
      if($affect_rows==1){
        echo "<script>alert('修改成功');</script>";
      }else{
         echo "<script>alert('修改失败');</script>";
      }
      }
    }else{
      echo "<script>alert('您输入的当前密码有误');</script>";
    }
  }
}

//用户登录(防止SQL注入)
function loginCheck($dbc,$name,$psw){
  $psw_sh1=SHA1($psw);
  $q="select * from personal_info where name=? and password_digest=?";
  $r=$dbc->prepare($q);
  $r->execute(array($name,$psw_sh1));
  if($r->rowCount()==1){
    return 1;
  }else{
    return 0;
  }
}
//用户退出登录
function login_exit()
{
  if (isset($_COOKIE['userName'])) { 
  setcookie('userName','',time()-3600);
}
}
function sel_userInfo($dbc,$userName)    
{
    $sql = "select * from personal_info  where name='$userName'";
    $userInfo = $dbc->query($sql);
    return $userInfo;
}
//根据用户名获取用户id
function getID($dbc,$name){
  $q="select id from personal_info where name='$name'";
  $r=$dbc->query($q);
  $id=$r->fetchColumn(0);
  return $id;
}

//根据用户名获取头像
function getHeadImage($dbc,$name){
  $q="select head_img from personal_info where name='$name'";
  $r=$dbc->query($q);
  $head_img=$r->fetchColumn(0);
  return $head_img;
}
//根据用户id获取用户姓名
function getUserName($dbc,$user_id){
  $q="select name from personal_info where id='$user_id'";
  $r=$dbc->query($q);
  $userName=$r->fetchColumn(0);
  return $userName;
}
//根据用户id获取用户头像
function getUserImg($dbc,$user_id){
  $q="select head_img from personal_info where id='$user_id'";
  $r=$dbc->query($q);
  $headImg=$r->fetchColumn(0);
  return $headImg;
}
//根据food_id获取姓名
function getName_food_id($dbc,$food_id){
  $q="select publish_id from food where id='$food_id'";
  $r=$dbc->query($q);
  $user_id=$r->fetchColumn(0);       //第一步：先通过food_id取出publish_id


  $q="select name from personal_info where id=$user_id";
  $r=$dbc->query($q);
  $user_name=$r->fetchColumn(0);        //第二步，根据pubish_id也就是user_id取出user_name

   return $user_name;
}
//根据food_id获取头像
function getHeadimg_food_id($dbc,$food_id){
  $q="select publish_id from food where id='$food_id'";
  $r=$dbc->query($q);
  $user_id=$r->fetchColumn(0);       //第一步：先通过food_id取出publish_id


  $q="select head_img from personal_info where id=$user_id";
  $r=$dbc->query($q);
  $head_img=$r->fetchColumn(0);        //第二步，根据pubish_id也就是user_id取出头像

   return $head_img;
}
//工具user_id获取个人信息表里的内容
function user_info($dbc,$user_id){
  $q="select *from personal_info where id=$user_id";
  $res=$dbc->query($q);
  return $res;
}
//计算粉丝数量
function show_fans_num($dbc,$user_id){
  $q="select * from relationships where followed_id=$user_id";
  $stmt=$dbc->prepare($q);
    $stmt->execute();
    echo $stmt->rowCount();
}
//计算关注数量
function show_attention_num($dbc,$user_id){
   $q="select * from relationships where follower_id=$user_id";
  $stmt=$dbc->prepare($q);
    $stmt->execute();
    echo $stmt->rowCount();
}
//判断用户是否已经关注
function sel_user_connect($dbc){
    if(isset($_COOKIE['userName'])){
      $follower_id=getID($dbc,$_COOKIE['userName']);
    $followed_id=$_GET['user_id'];
    $q="select * from relationships  where follower_id=$follower_id and followed_id=$followed_id";
   $r=$dbc->prepare($q);
  $r->execute();
  if($r->rowCount()==1){
    return 1;
  }else{
    return 0;
  }
    }
    
}
//用户关注
function user_connect($dbc){
    $c=date("y-m-d H:i:s",time());
    $followed_id=$_GET['followed_id'];
    $follower_id=$_GET['follower_id'];
    $q1="select * from relationships where follower_id=$follower_id and followed_id=$followed_id";
    $res=$dbc->query($q1);
    if($res->rowCount()!=0){
      echo 0;
    }else{
    $q="insert into relationships(follower_id,followed_id,created_at)values($follower_id,$followed_id,'$c')";
    $affect_rows=$dbc->exec($q); 
        echo $affect_rows; 
         }
}
//用户取消关注
function deluser_connect($dbc){
    $followed_id=$_GET['followed_id'];
    $follower_id=$_GET['follower_id'];
    $q="delete from  relationships where follower_id=$follower_id and followed_id=$followed_id";
    $affect_rows=$dbc->exec($q); 
    if($affect_rows==1){
      show_fans_num($dbc,$_GET['followed_id']);
    }else{
      echo "<script>alert(取消关注失败!);</script>";
    }
}
//会员中心取消关注
function per_center_deluser_connect($dbc){

    $followed_id=$_GET['people_id'];
    $follower_id=getID($dbc,$_COOKIE['userName']);
    $q="delete from  relationships where follower_id=$follower_id and followed_id=$followed_id";
    $affect_rows=$dbc->exec($q); 
    if($affect_rows!=1){
      echo "<script>alert(取消关注失败!);</script>";
    }
}
function sel_user_conn($dbc){
  $followed_id=$_GET['user_id'];
   $q="select *  from  relationships where followed_id=$followed_id";
   $res=$dbc->query($q);
   return $res;
}
function sel_user_attention($dbc){
  $follower_id=$_GET['user_id'];
   $q="select *  from  relationships where follower_id=$follower_id";
   $res=$dbc->query($q);
   return $res;

}
function follow_me($dbc){
   $followed_id=getID($dbc,$_COOKIE['userName']);
   $q="select *  from  relationships where followed_id=$followed_id";
   $res=$dbc->query($q);
   return $res;
}
function my_follows($dbc){
    $follower_id=getID($dbc,$_COOKIE['userName']);
   $q="select *  from  relationships where follower_id=$follower_id";
   $res=$dbc->query($q);
   return $res;
}
 ?>



