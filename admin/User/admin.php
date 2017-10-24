<?php 
require '../../mysql_connect.php';
require '../models/admin.php';
if(isset($_GET['action']) && $_GET['action']=='del'){
    if(dele_admin($dbc,$_GET['user_id'])=='y'){
        echo "<script>alert('删除用户成功！');</script>";
    }else{
         echo "<script>alert('删除用户失败！');</script>";
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
<form class="form-inline definewidth m20" action="admin.php" method="post">    
    管理员名称：
    <input type="text" name="username" id="username" class="abc input-default" placeholder="请输入管理员名或部分字符" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增角色</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>管理员id</th>
        <th>管理员名称</th>
        <th>管理员密码</th>
        <th>注册时间</th>
         <th>操作</th>
    </tr>
    </thead>
    <?php  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
                    $username=$_POST['username'];
                    if(!empty($username)){
                        $user_search_res=admin_search($dbc,$username);foreach($user_search_res as $user_search_row){?>
                        <tr>
            <td><?php echo $user_search_row['id']; ?></td>
            <td><?php echo $user_search_row['name']; ?></td>
            <td><?php echo $user_search_row['password']; ?></td>
            <td><?php echo $user_search_row['created_at']; ?></td>
            <td>
                <a href="admin_edit.php?user_id=<?php echo $user_search_row['id']; ?>">编辑</a>
                <a href="admin.php?action=del&user_id=<?php echo $user_search_row['id'];  ?>" >删除</a>                    
            </td>
           
        </tr>   
         <?php } ?>
</table>
                   <?php }

                }else{
     ?>
     <?php  $res=sel_admin_perInfo($dbc); foreach($res as $row){ ?>
	     <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <a href="admin_edit.php?user_id=<?php echo $row['id']; ?>">编辑</a>
                <a href="admin.php?action=del&user_id=<?php echo $row['id'];  ?>" >删除</a>                    
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
				window.location.href="admin_add.php";
		 });
    });


</script>