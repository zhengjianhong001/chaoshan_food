<?php 
if(isset($_GET['a']) && $_GET['a']==logout){
    setcookie('admin_name','',time()-3600);
    header("location: login.php");
}
 if (!isset($_COOKIE['admin_name']) || $_COOKIE['admin_name']=='') {
    header("location: login.php");
 }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/main-min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/img/title.ico" type="image/x-icon" rel="shortcut icon" />
</head>
<body>

<div class="header">

    <div class="dl-title">
        <!--<img src="/chinapost/Public/assets/img/top.png">-->
    </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo $_COOKIE['admin_name']; ?></span><a href="index.php?a=logout" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>		<li class="nav-item dl-selected"><div class="nav-item-inner nav-order">管理员管理</div></li>

        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
</div>
<script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="assets/js/bui-min.js"></script>
<script type="text/javascript" src="assets/js/common/main-min.js"></script>
<script type="text/javascript" src="assets/js/config-min.js"></script>
<script>
    BUI.use('common/main',function(){
        var config = [{id:'1',menu:[{text:'系统管理',items:[{id:'12',text:'评论管理',href:'Comments/index.php'},{id:'3',text:'话题管理',href:'Topic/index.php'},{id:'4',text:'用户管理',href:'User/index.php'},{id:'6',text:'菜谱管理',href:'Menu/index.php'}]}]},{id:'7',homePage : '9',menu:[{text:'管理员',items:[{id:'9',text:'管理员信息',href:'User/admin.php'}]}]}];
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
</body>
</html>