<?php 
require '../../mysql_connect.php';
require '../models/admin.php';
if(isset($_GET['action']) && $_GET['action']=='del'){
    if(dele_topic_comments($dbc,$_GET['comments_id'])=='y'){
        echo "<script>alert('删除评论成功！');</script>";
    }else{
         echo "<script>alert('删除评论失败！');</script>";
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
    话题评论内容：
    <input type="text" name="comments" id="rolename" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>所属话题id</th>
        <th>评论内容</th>
        <th>评论人</th> 
        <th>评论时间</th>
        <th>管理操作</th>
    </tr>
    </thead>

<?php  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
                    $comments=$_POST['comments'];
                    if(!empty($comments)){
                        $topic_comments_search_res=topic_comments_search($dbc,$comments);foreach($topic_comments_search_res as $topic_comments_search_row){?>
                        <tr> 
            <td><?php echo $topic_comments_search_row['topic_id']; ?></td>
            <td><?php echo $topic_comments_search_row['comments']; ?></td>
            <td><?php echo getUserName($dbc,$topic_comments_search_row['user_id']); ?></td>
            <td><?php echo $topic_comments_search_row['created_at']; ?></td>
            <td>
                
                <a href="index.php?action=del&comments_id=<?php echo $topic_comments_search_row['id'];  ?>" >删除</a>                    
            </td>
           
        </tr>   
         <?php } ?>
</table>
                   <?php }

                }else{
     ?>
     <?php  $res=sel_topic_comments($dbc); foreach($res as $row){ ?>
         <tr>
            <td><?php echo $row['topic_id']; ?></td>
            <td><?php echo $row['comments']; ?></td>
            <td><?php echo getUserName($dbc,$row['user_id']); ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td> 
                <a href="index.php?action=del&comments_id=<?php echo $row['id'];  ?>" >删除</a>                    
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