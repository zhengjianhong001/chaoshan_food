<?php 
require '../../mysql_connect.php';
require '../models/admin.php';
if(isset($_GET['action']) && $_GET['action']=='del'){
    if(dele_topic($dbc,$_GET['topic_id'])=='y'){
        echo "<script>alert('删除话题成功！');</script>";
    }else{
         echo "<script>alert('删除话题失败！');</script>";
    }
}
 ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script> 
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="index.php" method="post">  
   话题内容：
    <input type="text" name="topic_con" id="rolename" class="abc input-default" placeholder="" >&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>话题id</th>
        <th>话题内容</th>
        <th>话题发布者</th>
        <th>视频</th>
        <th>图片</th> 
        <th>注册时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
                    $topic_con=$_POST['topic_con'];
                    if(!empty($topic_con)){
                        $topic_search_res=topic_search($dbc,$topic_con);foreach($topic_search_res as $topic_search_row){?>
                        <tr>
            <td><?php echo $topic_search_row['id']; ?></td>
            <td><?php echo $topic_search_row['content']; ?></td>
            <td><?php echo getUserName($dbc,$topic_search_row['publisher_id']); ?></td>
            <td><?php echo $topic_search_row['video']; ?></td>
            <td>
            <?php $img_res=fing_topic_img($dbc,$topic_search_row['id']); foreach($img_res as $img_topic_search_row){ ?>
                <img src="../<?php echo $img_topic_search_row['topic_img']; ?>" width="100" height="100" alt="">
                <?php } ?>
            </td>
            <td><?php echo $topic_search_row['created_at']; ?></td>
            <td>
                
                <a href="index.php?action=del&user_id=<?php echo $topic_search_row['id'];  ?>" >删除</a>                    
            </td>
           
        </tr>   
         <?php } ?>
</table>
                   <?php }

                }else{
     ?>
     <?php  $res=sel_topic($dbc); foreach($res as $row){ ?>
         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo getUserName($dbc,$row['publisher_id']); ?></td>
            <td>
            <?php if(!empty($row['video'])&&$row['video']!=''){ ?>
			<video src="../<?php echo $row['video']; ?>" width="200" height="200" controls autobuffer></video>
			<?php } ?>
            <td>
            <?php $img_res=fing_topic_img($dbc,$row['id']); foreach($img_res as $img_row){ ?>
                <img src="../<?php echo $img_row['topic_img']; ?>" width="100" height="100" alt="">
                <?php } ?>
            </td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
         
                <a href="index.php?action=del&topic_id=<?php echo $row['id'];  ?>" >删除</a>                    
            </td>
           
        </tr>   
         <?php } ?>
</table>
<?php } ?>
		</body>
		</html>

<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="add.php";
		 });

    });


</script>