<?php 
 header( 'Content-Type:text/html;charset=utf-8 ');

//验证上传菜谱表单的数据
function checkCookbook($foodName,$foodImg_file,$decript,$main_ingredient,$other_ingredient,$step_img,$step_explain,$trick)
{	
	$errors = array(); 
	if (empty($foodName)) {  // 验证姓名的存在性与长度
      $errors[] = '菜谱名不能为空！';
    } else if (strlen($foodName) > 50) {
      $errors[] = '菜谱名太长了！';
    }  
    if ($foodImg_file['name'][0]=='') {
      $errors[] = '菜谱图片不能为空！';
     } 
    if (empty($decript)) {  // 验证姓名的存在性与长度
      $errors[] = '菜谱描述不能为空！';
    } else if (strlen($decript) > 2000) {
      $errors[] = '菜谱描述太长了！';
    }   
    if (empty($main_ingredient)) {  // 验证姓名的存在性与长度
      $errors[] = '菜谱主料不能为空！';
    } else if (strlen($main_ingredient) > 2000) {
      $errors[] = '菜谱主料太长了！';
    } 
    if (empty($other_ingredient)) {  // 验证姓名的存在性与长度
      $errors[] = '菜谱辅料不能为空！';
    } else if (strlen($other_ingredient) > 2000) {
      $errors[] = '菜谱辅料太长了！';
    }
    if (empty($trick)) {  // 验证姓名的存在性与长度
      $errors[] = '小窍门不能为空！';
    } else if (strlen($trick) > 2000) {
      $errors[] = '小窍门太长了！';
    }
  
     for ($i=0; $i < count($step_img['name']); $i++) { 
          if($step_img['name'][$i]==''){
             $errors[]='请完善步骤图片';
          }         
      }
       for ($i=0; $i < count($step_explain); $i++) { 
          if($step_explain[$i]==''){
             $errors[]='请完善步骤说明';
          }         
      }
return $errors;
}	

//上传菜谱到数据库
function cookbook_save($dbc,$foodName,$decript,$difficult,$taste,$technology,$used_time,$area,$main_ingredient,$other_ingredient,$trick)
{
  $publish_id=getID($dbc,$_COOKIE["userName"]);
  $ct = date("y-m-d H:i:s",time());
  $q="insert into food(publish_id,food_name,descript,difficult,taste,gyi,used_time,area,main_ingredient,other_ingredient,trick,created_at) values('$publish_id','$foodName','$decript','$difficult','$taste','$technology','$used_time','$area','$main_ingredient','$other_ingredient','$trick','$ct')";
    $affect_rows=$dbc->exec($q);
    // print_r($dbc->errorInfo());
      if($affect_rows==1){ 
       //  $last_insert_id=$dbc->lastInsertId();        //多图上传
       // if(food_img_save() && food_step_save())
        return $dbc->lastInsertId();
      }else{
        print_r($dbc->errorInfo());
        return false;
      }
      // echo "<script>alert(".$q.")</script>";
      //   print_r($dbc->errorInfo());
      //   return $dbc->lastInsertId();
}
// 菜谱图片多图上传
function food_img_save($dbc,$last_insert_id,$foodImg_file)
{
     
   for ($i=0; $i < count($foodImg_file['name']); $i++) {       
    $time=date('YmdHis',time()).rand(100,999);  //时间戳  
          if(move_uploaded_file($foodImg_file['tmp_name'][$i], "../uploads/cookbook/".$time.$foodImg_file['name'][$i])){
            $sql_name="../uploads/cookbook/".$time.$foodImg_file['name'][$i];
            $q1="insert into food_img(food_img,food_id)values('{$sql_name}','$last_insert_id')";
          $affect_rows1=$dbc->exec($q1);
          if ($affect_rows1!=1) {
            return false;
          }
          }else{
        return false;
      }          
      }
}
function food_step_save($dbc,$last_insert_id,$step_img,$step_explain){
   
  for ($i=0; $i < count($step_img['name']); $i++){       
    $time=date('YmdHis',time()).rand(100,999);  //时间戳    
          if(move_uploaded_file($step_img['tmp_name'][$i], "../uploads/cookbook/".$time."{$step_img['name'][$i]}")){
            $sql_step_img_name="../uploads/cookbook/".$time.$step_img['name'][$i];
            $q="insert into food_step(food_id,step_img,step_explain)values('$last_insert_id','$sql_step_img_name','$step_explain[$i]')";
          $affect_rows2=$dbc->exec($q);
        if ($affect_rows2!=1) {
            echo "<script>alert('步骤图插入失败')</script>";
          return false;
          }
          }else{
        return false;
         
      }          
      }
}
//主页菜谱显示
function index_new_upfood_one($dbc){
  $q="select * from food where exam=1 order by id desc limit 1";
  $res=$dbc->query($q);
  return $res;

}
function index_new_upfood_other($dbc){
  $q="select * from food where exam=1 order by id desc limit 1,8";
  $res=$dbc->query($q);
  return $res;
}
function index_new_upfood_all($dbc){
  $q="select * from food where exam=1 order by id desc limit 1,100";
  $res=$dbc->query($q);
  return $res;
}
//菜谱排行榜
function rank_food($dbc){
  $q="select food_id, count(food_id) from food_user_like_collect group by food_id desc order by count(food_id) desc ";
  $res=$dbc->query($q);
  return $res;
}
//一周热门
function week_popular_food_one($dbc){
  $q="select food_id, count(food_id) from food_user_like_collect group by food_id desc order by count(food_id) desc limit 1";
  $res=$dbc->query($q);
  return $res;
}
function week_popular_food_other($dbc){
  $q="select food_id, count(food_id) from food_user_like_collect group by food_id desc order by count(food_id) desc limit 1,8";
  $res=$dbc->query($q);
  return $res;
}
//最受欢迎的家常菜
function home_popuular_food_one($dbc){
   $q="select * from food where exam=1 order by view_count desc limit 1";
  $res=$dbc->query($q);
  return $res;
}
function home_popuular_food_two($dbc){
   $q="select * from food where exam=1 order by view_count desc limit 1,2";
  $res=$dbc->query($q);
  return $res;
}
function home_popuular_food_other($dbc){
   $q="select * from food where exam=1 order by view_count desc limit 2,8";
  $res=$dbc->query($q);
  return $res;
}
//个人主页菜谱显示
function per_cookbook($dbc,$user_id){
  $q="select * from food where publish_id=$user_id and exam=1";
  $res=$dbc->query($q);
  return $res;
}
//根据user_id找到用户发布的菜谱数
function per_cookbook_num($dbc,$user_id){
  $q="select count(*) from food where publish_id=$user_id and exam=1";
  $res=$dbc->query($q);
  $num=$res->fetchColumn(0);
  return $num;
}
//个人中心——未审核菜谱0、审核菜谱1、审核失败-1显示
function cookbook_show($dbc,$exam)
{
  $user_id=getID($dbc,$_COOKIE["userName"]);
   $sql = "select * from food  where publish_id=$user_id AND exam=$exam order by id desc";
    $res = $dbc->query($sql);
    return $res;
}
/*显示菜谱收藏*/
function cookbook_colect($dbc){
    $user_id=getID($dbc,$_COOKIE["userName"]);
   $sql = "select * from food_user_like_collect  where user_id=$user_id and attitude=2 order by id desc";
    $res = $dbc->query($sql);
    return $res;
}
/*个人主页显示菜谱收藏*/
function per_cookbook_colect($dbc){
    $user_id=$_GET["user_id"];
   $sql = "select * from food_user_like_collect  where user_id=$user_id and attitude=2 order by id desc";
    $res = $dbc->query($sql);
    return $res;
}
//根据food_id找到菜谱图片第一张
function fing_cookbook_img($dbc,$food_id)
{
    $imgs=array();
   $sql = "select * from food_img where food_id=$food_id limit 1";
   $res = $dbc->query($sql);
   foreach ($res as $row){
      $imgs[]=$row['food_img'];
   }
   return $imgs[0];
}
//用户在个人中心根据food_id取消收藏菜谱
function del_collect_food($dbc,$food_id){
  $user_id=getID($dbc,$_COOKIE["userName"]);
 // $q="update food_user_like_collect set collects=0 where food_id=$food_id and user_id=$user_id";
  $q="delete from food_user_like_collect where food_id=$food_id and user_id=$user_id and attitude=2";
  $affect_rows=$dbc->exec($q);
  if($affect_rows!=1){
     echo "<script>alert('移除失败,请重新操作!');window.location.href='mc-collect.php';</script>";
  }else{
    echo "<script>alert('移除成功!');window.location.href='mc-collect.php';</script>";
  }
}
//根据food_id删除菜谱
function del_food($dbc,$food_id,$cookbook_url)
{
  $sql = "delete  from food where id=$food_id";
  dele_foodImgs($dbc,$food_id);
dele_foodStepImgs($dbc,$food_id);
  $affect_rows=$dbc->exec($sql);
  if($affect_rows!=1){   
      echo "<script>alert('删除失败,请重新操作!');window.location.href='mc-CookBook.php';</script>";
  }else{
    echo "<script>alert('删除成功!');window.location.href='".$cookbook_url."';</script>";
  }
}
function dele_foodImgs($dbc,$food_id){
  $q="select * from food_img where food_id=$food_id";
  $res = $dbc->query($q);
  $imgs=array();
  foreach ($res as $rows) {
    $imgs[]=$rows['food_img'];
  }
  for ($i=0; $i < count($imgs); $i++) { 
    if(!unlink($imgs[$i])){
      echo "<script>alert('删除失败!');window.location.href='mc-CookBook.php';</script>";
    }
  }
}
function dele_foodStepImgs($dbc,$food_id){
  $q1="select * from food_step where food_id=$food_id";
  $res1 = $dbc->query($q1);
  $step_imgs=array();
  foreach ($res1 as $rows1) {
    $step_imgs[]=$rows1['step_img'];
  }
  for ($i=0; $i < count($step_imgs); $i++) { 
    if(!unlink($step_imgs[$i])){ 
      echo "<script>alert('删除失败!');window.location.href='mc-CookBook.php';</script>";
    }
  }
}
//根据food_id查找菜谱
function sel_food($dbc,$food_id)    
{
    $sql = "select * from food  where id=$food_id";
    $food_all = $dbc->query($sql);
    return $food_all;
}
//根据food_id查找菜谱步骤
function find_cookbook_step($dbc,$food_id)
{
  $sql = "select * from food_step  where food_id=$food_id";
    $food_step_all = $dbc->query($sql);
    return $food_step_all;
}
//根据food_id查找user_id
function getUser_id($dbc,$food_id){
  $q="select publish_id from food where id='$food_id'";
  $r=$dbc->query($q);
  $user_id=$r->fetchColumn(0);
  return $user_id;
}
//根据菜谱分类名查找菜谱
function category_food($dbc,$rowName,$rowValue)
{
    $sql = "select * from food  where $rowName='$rowValue' and exam=1";
    $food_all = $dbc->query($sql);
    return $food_all;
}
//根据菜谱喜欢人数查找菜谱
// function rank_food($dbc)
// {
//     $sql = "select * from food_user_like_collect";
//     $food_all = $dbc->query($sql);
//     return $food_all;
// }
// 菜谱喜欢数
function food_like_btn($dbc,$food_id)
{
  $q="select * from food_user_like_collect where  food_id=$food_id and attitude=1";
  $stmt=$dbc->prepare($q);
    $stmt->execute();
    echo $stmt->rowCount();
}
// 菜谱收藏数
function food_collect_btn($dbc,$food_id)
{
  $q="select * from food_user_like_collect where  food_id=$food_id and attitude=2";
  $stmt=$dbc->prepare($q);
    $stmt->execute();
    echo $stmt->rowCount();
}

function update_like_num($dbc,$user_id,$food_id)
{
  $q1="select * from food_user_like_collect where food_id=$food_id and user_id=$user_id and attitude=1";
  $stmt1=$dbc->prepare($q1);
    $stmt1->execute();
    $rows  =  $stmt1->rowCount();
   if($rows==0){
      $c=date("y-m-d H:i:s",time());
       $q="insert into food_user_like_collect(user_id,food_id,created_at,attitude)values($user_id,$food_id,'$c',1)";
      $affect_rows=$dbc->exec($q);
      if($affect_rows==1){
        $q="select * from food_user_like_collect where  food_id=$food_id and attitude=1";
        $stmt=$dbc->prepare($q);
        $stmt->execute();
        return $stmt->rowCount();
      }
   }else{
    return -1;
   }
 
}
function update_collect_num($dbc,$user_id,$food_id)
{
  $q1="select * from food_user_like_collect where food_id=$food_id and user_id=$user_id and attitude=2";
  $stmt1=$dbc->prepare($q1);
    $stmt1->execute();
    $rows  =  $stmt1->rowCount();
   if($rows==0){
      $c=date("y-m-d H:i:s",time());
       $q="insert into food_user_like_collect(user_id,food_id,created_at,attitude)values($user_id,$food_id,'$c',2)";
      $affect_rows=$dbc->exec($q);
      if($affect_rows==1){
        $q="select * from food_user_like_collect where  food_id=$food_id and attitude=2";
        $stmt=$dbc->prepare($q);
        $stmt->execute();
        return $stmt->rowCount();
      }
   }else{
    return -1;
   }
 
}

//************话题页面操作****************
////包含视频上传
function upTopic($dbc,$topi_con,$upload){
    $publish_id=getID($dbc,$_COOKIE["userName"]);
    $ct = date("y-m-d H:i:s",time());
     $time=date('YmdHis',time()).rand(100,999);  //时间戳 
     $video_name="../uploads/topic_video/".$time."_".$upload['name'];
    if(move_uploaded_file($upload['tmp_name'], "../uploads/topic_video/".$time."_".iconv("UTF-8", "GB2312",$upload['name']))){
       $q="insert into topic(publisher_id,content,video,created_at)values('$publish_id','$topi_con','$video_name','$ct')";
        $affect_rows=$dbc->exec($q);
      if($affect_rows==1){ 
        return $dbc->lastInsertId();
      }else{
        print_r($dbc->errorInfo());
        return false;
      }
      }else{
         echo "<script>alert('上传失败')</script>";
      }
}
//无视频上传
function upTopic_none_video($dbc,$topi_con){
    $publish_id=getID($dbc,$_COOKIE["userName"]);
    $ct = date("y-m-d H:i:s",time());
     $time=date('YmdHis',time()).rand(100,999);  //时间戳 
       $q="insert into topic(publisher_id,content,created_at)values('$publish_id','$topi_con','$ct')";
        $affect_rows=$dbc->exec($q);
      if($affect_rows==1){ 
        return $dbc->lastInsertId();
      }else{
        print_r($dbc->errorInfo());
        return false;
      }
     print_r($dbc->errorInfo());
}
//话题多图上传
function topic_img_save($dbc,$last_insert_id,$topicImg_file)
{
   for ($i=0; $i < count($topicImg_file['name']); $i++) {       
          $time=date('YmdHis',time()).rand(100,999);  //时间戳  
          if(move_uploaded_file($topicImg_file['tmp_name'][$i], "../uploads/topic/".$time."_".$topicImg_file['name'][$i])){ 
            $sql_name="../uploads/topic/".$time."_".$topicImg_file['name'][$i];
            $q1="insert into topic_img(topic_img,topic_id)values('{$sql_name}',$last_insert_id)";
          $affect_rows1=$dbc->exec($q1);
          if ($affect_rows1!=1) {
            return false;
          }
          }else{
        return false;
      }          
      }
}
//根据cookieName查找话题信息
function topic_show($dbc)
{
  $user_id=getID($dbc,$_COOKIE["userName"]);
   $sql = "select * from topic  where publisher_id=$user_id order by id desc";
    $res = $dbc->query($sql);
    return $res;
}
function sel_topicImgs($dbc,$topic_id){
   $q="select * from topic_img where topic_id=$topic_id";
  $res = $dbc->query($q);
  $imgs=array();
  foreach ($res as $rows) {
    $imgs[]=$rows['topic_img'];
  }
  return $imgs[0];
}
function del_topic($dbc,$topic_id){
 $sql = "delete  from topic where id=$topic_id";
 dele_topicImgs($dbc,$topic_id);
 dele_topicVideo($dbc,$topic_id);
  $affect_rows=$dbc->exec($sql);
  if($affect_rows!=1){
      echo "<script>alert('删除失败,请重新操作!');window.location.href='mc-topic.php';</script>";
  }else{
    echo "<script>alert('删除成功!');window.location.href='mc-topic.php';</script>";
  }
}
function dele_topicImgs($dbc,$topic_id){
  $q="select * from topic_img where topic_id=$topic_id";
  $res = $dbc->query($q);
  $imgs=array();
  foreach ($res as $rows) {
    $imgs[]=$rows['topic_img'];
  }
  for ($i=0; $i < count($imgs); $i++) { 
    if(!unlink($imgs[$i])){
      echo "<script>alert('删除失败!');window.location.href='mc-topic.php';</script>";
    }
  }
}
function dele_topicVideo($dbc,$topic_id){
 $q="select * from topic where id=$topic_id";
  $res = $dbc->query($q);
  $videos=array();
  foreach ($res as $rows) {
    $videos[]=$rows['video'];
  }
  if($videos[0]==null || $videos[0]==''){
    
  }else{
  for ($i=0; $i < count($videos); $i++) { 
    if(!unlink($videos[$i])){
      echo "<script>alert('删除失败!');window.location.href='mc-topic.php';</script>";
    }
  }
}
}
/*显示话题收藏*/
function topic_colect($dbc){
    $user_id=getID($dbc,$_COOKIE["userName"]);
   $sql = "select * from topic_user_like_collect  where user_id=$user_id and attitude=2 order by id desc";
    $res = $dbc->query($sql);
    return $res;
}
/*个人主页显示话题收藏*/
function per_topic_colect($dbc){
    $user_id=$_GET['user_id'];
   $sql = "select * from topic_user_like_collect  where user_id=$user_id and attitude=2 order by id desc";
    $res = $dbc->query($sql);
    return $res;
}
//根据topic_id查找话题
function sel_topic($dbc,$topic_id)    
{
    $sql = "select * from topic  where id=$topic_id";
    $topic_all = $dbc->query($sql);
    return $topic_all;
}
//根据topic_id找到话题图片
function fing_topic_img($dbc,$topic_id)
{
   
   $sql = "select * from topic_img where topic_id=$topic_id";
  $imgs=$dbc->query($sql);
   return $imgs;
}
//用户在个人中心根据topic_id取消收藏话题
function del_collect_topic($dbc,$topic_id){
  $user_id=getID($dbc,$_COOKIE["userName"]);
  //$q="update topic_user_like_collect set collects=0 where topic_id=$topic_id and user_id=$user_id";
  $q="delete from topic_user_like_collect where topic_id=$topic_id and user_id=$user_id and attitude=2";
  $affect_rows=$dbc->exec($q);
  if($affect_rows!=1){
     echo "<script>alert('移除失败,请重新操作!');window.location.href='mc-collect-topic.php';</script>";
  }else{
    echo "<script>alert('移除成功!');window.location.href='mc-collect-topic.php';</script>";
  }
}
// 话题喜欢数
function topic_like_btn($dbc,$topic_id)
{
  $q="select * from topic_user_like_collect where  topic_id=$topic_id and attitude=1";
  $stmt=$dbc->prepare($q);
    $stmt->execute();
    echo $stmt->rowCount();
}
// 话题收藏数
function topic_collect_btn($dbc,$topic_id)
{
  $q="select * from topic_user_like_collect where  topic_id=$topic_id and attitude=2";
  $stmt=$dbc->prepare($q);
    $stmt->execute();
    echo $stmt->rowCount();
}
function update_topi_like_num($dbc,$user_id,$topic_id)
{
  $q1="select * from topic_user_like_collect where topic_id=$topic_id and user_id=$user_id and attitude=1";
  $stmt1=$dbc->prepare($q1);
    $stmt1->execute();
    $rows  =  $stmt1->rowCount();
   if($rows==0){
      $c=date("y-m-d H:i:s",time());
       $q="insert into topic_user_like_collect(user_id,topic_id,created_at,attitude)values($user_id,$topic_id,'$c',1)";
      $affect_rows=$dbc->exec($q);
      if($affect_rows==1){
        $q="select * from topic_user_like_collect where  topic_id=$topic_id and attitude=1";
        $stmt=$dbc->prepare($q);
        $stmt->execute();
        return $stmt->rowCount();
      }
   }else{
    return -1;
   }
 
}
function update_topi_collect_num($dbc,$user_id,$topic_id)
{
  $q1="select * from topic_user_like_collect where topic_id=$topic_id and user_id=$user_id and attitude=2";
  $stmt1=$dbc->prepare($q1);
    $stmt1->execute();
    $rows  =  $stmt1->rowCount();
   if($rows==0){
      $c=date("y-m-d h:i:s",time());
       $q="insert into topic_user_like_collect(user_id,topic_id,created_at,attitude)values($user_id,$topic_id,'$c',2)";
      $affect_rows=$dbc->exec($q);
      if($affect_rows==1){
        $q="select * from topic_user_like_collect where  topic_id=$topic_id and attitude=2";
        $stmt=$dbc->prepare($q);
        $stmt->execute();
        return $stmt->rowCount();
      }
   }else{
    return -1;
   }
}
//根据user_id找到用户发布的话题数
function per_topic_num($dbc,$user_id){
  $q="select count(*) from topic where publisher_id=$user_id";
  $res=$dbc->query($q);
  $num=$res->fetchColumn(0);
  return $num;
}
/*主页热门话题*/
function hot_topic($dbc){
  $q="select * from topic order by id desc";
  $res=$dbc->query($q);
  return $res;
}
/*根据user_id查找用户话题*/
function per_topic($dbc,$user_id){
  $q="select * from topic where publisher_id = $user_id order by id desc";
  $res=$dbc->query($q);
  return $res;
}
/*菜谱查询*/
function search_food($dbc){
  $searchs=$_POST['searchName'];
  $q="select * from food where food_name like '%$searchs%'";
  $res=$dbc->query($q); 
       return $res; 
}
/*显示话题评论*/
function topic_comments($dbc,$topic_id){
  $q="select * from topic_commnet where  topic_id=$topic_id";
  $res=$dbc->query($q);
  return $res;
}
/*发表话题评论*/
function publish_topic_comments($dbc,$user_id,$topic_id,$commenter_text){
 
       $c=date("y-m-d H:i:s",time());
       $q="insert into topic_commnet(user_id,topic_id,created_at,comments)values($user_id,$topic_id,'$c','$commenter_text')";
      $affect_rows=$dbc->exec($q);
      if($affect_rows!=1){
        echo "<script>alert('发表评论失败！');</script>";
      }
      
}
/*显示话题评论数*/
function topic_comments_num($dbc,$topic_id){
  $q="select * from topic_commnet where  topic_id=$topic_id";
  $stmt=$dbc->prepare($q);
    $stmt->execute();
    echo $stmt->rowCount();
}
 ?> 








