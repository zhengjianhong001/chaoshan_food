<?php 
require '../../mysql_connect.php';
require '../models/admin.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
    $name=$_POST['username'];
    $psw=$_POST['psw'];
    
    if(empty($name) || empty($psw)){
        echo "<script>alert('请完善表单');</script>";
    }else{
         admin_update_admin($dbc,$name,$psw,$_GET['user_id']);
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
<form action="admin_edit.php?user_id=<?php echo $_GET['user_id']; ?>" method="post" class="definewidth m20">
<input type="hidden" name="id" value="{$user.id}" />
    <table class="table table-bordered table-hover definewidth m10">
    <?php $res=sel_admin_id($dbc,$_GET['user_id']); foreach($res as $row){  ?>
        <tr>
            <td width="10%" class="tableleft">登录名</td>
            <td><input type="text" name="username" value="<?php echo $row['name']; ?>"/></td>
        </tr>
       
        <tr>
            <td class="tableleft">密码</td>
            <td><input type="text" name="psw" value="<?php echo $row['password']; ?>"/></td>
        </tr>
     
        <tr>
            <td class="tableleft">注册时间</td>
            <td><?php echo $row['created_at'];  ?></td>
        </tr>
     
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存</button>				 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
        <?php } ?>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="admin.php";
		 });
    });
</script>