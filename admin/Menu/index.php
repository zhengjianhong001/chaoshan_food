<?php 
 require '../../mysql_connect.php';
    require '../models/admin.php';
if(isset($_GET['action']) && $_GET['action']=='del'){
    if(dele_food($dbc,$_GET['food_id'])=='y'){
        echo "<script>alert('删除菜谱成功！');</script>";
    }else{
         echo "<script>alert('删除菜谱失败！');</script>";
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
    菜谱名称：
    <input type="text" name="food_name" id="menuname" class="abc input-default" placeholder="输入菜谱名" >&nbsp;&nbsp; 
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>菜谱id</th>
        <th>菜谱名</th>
        <th>发布者</th>
        <th>发布时间</th>
        <th>审核状态</th>
        <th>管理操作</th>
    </tr>
    </thead>


<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
        if(!empty($_POST['food_name'])){
            $food_name=$_POST['food_name'];
            $food_search_res=food_search($dbc,$food_name);
            foreach($food_search_res as $food_search_row){ ?>
             <tr>
                <td><?php echo $food_search_row['id']; ?></td>
                <td><?php echo $food_search_row['food_name']; ?></td>
                <td><?php echo getUserName($dbc,$food_search_row['publish_id']);  ?></td>
                <td><?php echo $food_search_row['created_at']; ?></td>
                <td><?php  if($food_search_row['exam']==1){echo "<p style='color:green;'>审核通过</p>";}elseif($food_search_row['exam']==0){echo "<p style='color:blue;'>等待审核中</p>";}else{echo "<p style='color:red;'>审核不通过</p>";} ?></td>
                <td><a href="edit.php?check=<?php echo $food_search_row['id']; ?>">操作</a>
                </td>
            </tr>
            <?php  }?>
      <?php   }
    

 }else{ ?>

    <?php $res=food_show($dbc); foreach($res as $row){ ?>
        <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['food_name']; ?></td>
                <td><?php echo getUserName($dbc,$row['publish_id']);  ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><?php  if($row['exam']==1){echo "<p style='color:green;'>审核通过</p>";}elseif($row['exam']==0){echo "<p style='color:blue;'>等待审核中</p>";}else{echo "<p style='color:red;'>审核不通过</p>";} ?></td>
                <td><a href="edit.php?check=<?php echo $row['id']; ?>">操作</a>
                <a href="index.php?action=del&food_id=<?php echo $row['id']; ?>">删除</a>
                </td>
            </tr>
            <?php } }?>
            </table>

</body>
</html>
<script>
    $(function () {
		$('#addnew').click(function(){

				window.location.href="add.php";
		 });

    });
	
</script>