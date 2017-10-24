<?php 
    require '../../mysql_connect.php';
    require '../models/admin.php';


 if ($_SERVER['REQUEST_METHOD'] == 'POST') { // 处理表单
     if(isset($_POST['status'])){
    $status=$_POST['status'];
    $cause=$_POST['cause'];
    $food_id=$_GET['check'];
    food_check($dbc,$status,$cause,$food_id);
    }else{
        echo "<script>alert('请审核');</script>";
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
<form action="edit.php?check=<?php echo $_GET['check']; ?>" method="post" class="definewidth m20">
<input type="hidden" name="id" value="{$menu.id}" />
<table class="table table-bordered table-hover m10">
 <?php $res=food_check_edit($dbc,$_GET['check']); foreach($res as $row){ ?>
    <tr>
        <td class="tableleft">菜谱id</td>
        <td><p><?php echo $row['id']; ?></p></td>
    </tr> 
    <tr>
        <td class="tableleft">菜谱名称</td>
        <td><p><?php echo $row['food_name']; ?></p></td>
    </tr>
     <tr>
        <td class="tableleft">菜谱图片</td>
        <td>
        <?php $img_res=fing_cookbook_img($dbc,$row['id']); foreach($img_res as $img_row){?>
        <img width="100" height="100" src="../<?php echo $img_row['food_img']; ?>" alt="">
        <?php } ?>
        </td> 
    </tr>
    <tr>
        <td class="tableleft">发布者</td>
        <td><p><?php echo getUserName($dbc,$row['publish_id']); ?></p></td>
    </tr>
      <tr>
        <td class="tableleft">菜谱描述</td>
        <td><p><?php echo $row['descript']; ?></p></td>
    </tr>
     <tr>
        <td class="tableleft">菜谱制作步骤</td>
        <td>
        <ul style="list-style: none;">
        <?php $food_step_res=find_cookbook_step($dbc,$_GET['check']);  foreach($food_step_res as $food_step_row){ ?>
            <li style="padding-bottom: 20px;">
               <img width="100" height="100" src="../<?php echo $food_step_row['step_img']; ?>" alt="">
               <?php echo $food_step_row['step_explain']; ?> 
            </li>
            <?php } ?>
        </ul>
            

        </td>
    </tr>
    <tr>
        <td class="tableleft">菜谱参数</td>
        <td><p><?php echo $row['difficult']." ".$row['taste']." ".$row['gyi']." ".$row['used_time']." ".$row['area']; ?></p></td>
    </tr>
     <tr>
        <td class="tableleft">所用食材</td>
        <td><p><?php echo $row['main_ingredient']."".$row['other_ingredient']; ?></p></td>
    </tr>
      <tr>
        <td class="tableleft">小窍门</td>
        <td><p><?php echo $row['trick']; ?></p></td>
    </tr>
    <tr>
        <td class="tableleft">发布时间</td>
        <td><p><?php echo $row['created_at']; ?></p></td>
    </tr>
    <tr>
        <td class="tableleft">请审核</td>
        <td><input type="radio" name="status" value="1" <?php if($row['exam']==1){  echo 'checked';  }?> /> 通过
            <input type="radio" name="status" <?php if($row['exam']==-1){  echo 'checked';  }?> value="-1"/> 不通过</td>
    </tr>
    <tr>
        <td class="tableleft">备注</td>
        <td>
           <input type="text" placeholder="审核不通过原因" value="<?php echo $row['check_text']; ?>" name="cause"/>
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
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