<?php 
require '../../mysql_connect.php';
require '../models/admin.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
    $name=$_POST['username'];
    $sex=$_POST['sex'];
    $email=$_POST['email'];
    $hometown_city=$_POST['hometown_city'];
    $personal_write=$_POST['personal_write'];
    if(empty($name) || empty($email)){
        echo "<script>alert('请完善表单');</script>";
    }else{
         admin_update_userInfo($dbc,$name,$sex,$personal_write,$email,$hometown_city,$_GET['user_id']);
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
<form action="edit.php?user_id=<?php echo $_GET['user_id']; ?>" method="post" class="definewidth m20">
<input type="hidden" name="id" value="{$user.id}" />
    <table class="table table-bordered table-hover definewidth m10">
    <?php $res=sel_perInfo_id($dbc,$_GET['user_id']); foreach($res as $row){  ?>
        <tr>
            <td width="10%" class="tableleft">登录名</td>
            <td><input type="text" name="username" value="<?php echo $row['name']; ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">性别</td>
            <td> <input type="radio" name="sex" <?php if($row['sex']=='男') echo "checked='checked'"; ?>  value="男" > 男
              <input type="radio" <?php if($row['sex']=='女') echo "checked='checked'"; ?> name="sex" value="女">
                    女</td>
        </tr>
        <tr>
            <td class="tableleft">邮箱</td>
            <td><input type="email" name="email" value="<?php echo $row['email']; ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">家乡</td>
             <td> <select name="hometown_city">
            <option <?php if($row['hometown_city']=='汕头') echo "selected='selected'"; ?> value="汕头">&nbsp;&nbsp;汕头</option><option value='汕尾' <?php if($row['hometown_city']=='汕尾') echo "selected='selected'"; ?>   />&nbsp;&nbsp;汕尾</option><option value='揭阳' <?php if($row['hometown_city']=='揭阳') echo "selected='selected'"; ?>   />&nbsp;&nbsp;揭阳</option> <option value='陆丰' <?php if($row['hometown_city']=='陆丰') echo "selected='selected'"; ?>    />&nbsp;&nbsp;陆丰</option> <option value='普宁' <?php if($row['hometown_city']=='普宁') echo "selected='selected'"; ?>   />&nbsp;&nbsp;普宁</option> <option value='潮州' <?php if($row['hometown_city']=='潮州') echo "selected='selected'"; ?>   />&nbsp;&nbsp;潮州</option> </select></td>
        </tr>
        <tr>
            <td class="tableleft">个性签名</td>
            <td><input type="text" value="<?php echo $row['personal_write'];  ?>" name="personal_write" /></td>
        </tr>
        <tr>
            <td class="tableleft">注册时间</td>
            <td><?php echo $row['created_at'];  ?></td>
        </tr>
        <tr>
            <td class="tableleft">最后一次修改时间</td>
            <td><?php echo $row['updated_at'];  ?></td>
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
				window.location.href="index.php";
		 });
    });
</script>