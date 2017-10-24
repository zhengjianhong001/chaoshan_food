<?php 
require '../../mysql_connect.php';
require '../models/admin.php';
if(isset($_GET['action']) && $_GET['action']=='del'){
    if(dele_user($dbc,$_GET['user_id'])=='y'){
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
<form class="form-inline definewidth m20" action="index.php" method="post">    
    用户名称：
    <input type="text" name="username" id="username" class="abc input-default" placeholder="请输入用户名或部分字符" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>用户id</th>
        <th>用户名称</th>
        <th>用户邮箱</th>
        <th>性别</th>
        <th>家乡</th>
        <th>注册时间</th>
        <th>最后一次修改时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
                    $username=$_POST['username'];
                    if(!empty($username)){
                        $user_search_res=user_search($dbc,$username);foreach($user_search_res as $user_search_row){?>
                        <tr>
            <td><?php echo $user_search_row['id']; ?></td>
            <td><?php echo $user_search_row['name']; ?></td>
            <td><?php echo $user_search_row['email']; ?></td>
            <td><?php echo $user_search_row['sex']; ?></td>
            <td><?php echo $user_search_row['hometown_city']; ?></td>
            <td><?php echo $user_search_row['created_at']; ?></td>
             <td><?php echo $user_search_row['updated_at']; ?></td>
            <td>
                <a href="edit.php?user_id=<?php echo $user_search_row['id']; ?>">编辑</a>
                <a href="index.php?action=del&user_id=<?php echo $user_search_row['id'];  ?>" >删除</a>                    
            </td>
           
        </tr>   
         <?php } ?>
</table>
                   <?php }

                }else{
     ?>
     <?php  $res=sel_perInfo($dbc); foreach($res as $row){ ?>
	     <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['sex']; ?></td>
            <td><?php echo $row['hometown_city']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
             <td><?php echo $row['updated_at']; ?></td>
            <td>
                <a href="edit.php?user_id=<?php echo $row['id']; ?>">编辑</a>
                <a href="index.php?action=del&user_id=<?php echo $row['id'];  ?>" >删除</a>                    
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

	function del(id)
	{		
		if(confirm("确定要删除吗？"))
		{
            var xmlObj;
            if (window.ActiveXObject) {
            xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
            }else if(window.XMLHttpRequest){
            xmlObj=new XMLHttpRequest();
            }
            function callBackName(){
            if ((xmlObj.readyState==4)&&(xmlObj.status==200)) {
                var result = xmlObj.responseText;
                if(result=='n'){
                   alert('删除失败');
                    
                }
        }
    }
        xmlObj.onreadystatechange=callBackName;
        xmlObj.open("GET","../php/dele_user_ajax.php?id="+id,true);
        xmlObj.send(null);
				
		}
        window.href='index.php';
	}
</script>