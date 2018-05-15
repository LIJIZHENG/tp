<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\WWW\tp\public/../application/home/view/default/index\index.html";i:1526389311;}*/ ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>物业管理系统</title>

    <!-- Bootstrap -->
    <link href="/static/login/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/login/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/service.html" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/find.html" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/user/login/index.html" class="navbar-link">我的</a></p>
                <?php if(!(empty($uid) || (($uid instanceof \think\Collection || $uid instanceof \think\Paginator ) && $uid->isEmpty()))): ?>
                    <p class="navbar-text"><a href="/user/login" class="navbar-link">退出</a></p>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">

        <div class="indexImg row">
            <img src="/static/login/image/index.png" width="100%" />
        </div>
        <div class="serviceList text-center">
            <div class="container">
                <div class="row">



                    <div class="col-xs-4">
                        <a href="/home/article/tong">
                            <div class="indexLabel label-danger">
                                <span class="glyphicon glyphicon-bullhorn"></span><br/>
                                小区通知
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="/home/article/bian">
                            <div class="indexLabel label-warning">
                                <span class="glyphicon glyphicon-ok-circle"></span><br/>
                                便民服务
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="/home/article/add">
                            <div class="indexLabel label-info">
                                <span class="glyphicon glyphicon-heart-empty"></span><br/>
                                在线报修
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="/home/article/shop">
                            <div class="indexLabel label-success">
                                <span class="glyphicon glyphicon-briefcase"></span><br/>
                                商家活动
                            </div>
                        </a>
                    </div>
                    <!--<div class="col-xs-4">-->
                        <!--<a href="/home/index/house.html">-->
                            <!--<div class="indexLabel label-primary">-->
                                <!--<span class="glyphicon glyphicon-usd"></span><br/>-->
                                <!--小区租售-->
                            <!--</div>-->
                        <!--</a>-->
                    <!--</div>-->
                    <!--<div class="col-xs-4">-->
                        <!--<a href="/home/article/lists/category/46.html">-->
                            <!--<div class="indexLabel label-default">-->
                                <!--<span class="glyphicon glyphicon-apple"></span><br/>-->
                                <!--小区活动-->
                            <!--</div>-->
                        <!--</a>-->
                    <!--</div>-->
                </div>
            </div>

        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/static/login/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/static/login/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        (function(){
            var ThinkPHP = window.Think = {
                "ROOT"   : "", //当前网站地址
                "APP"    : "__APP__", //当前项目地址
                "PUBLIC" : "/static", //项目公共目录地址
                "DEEP"   : "", //PATHINFO分割符
                "MODEL"  : ["", "", "html"],
                "VAR"    : ["", "", ""]
            }
        })();
    </script>
    <!-- 用于加载js代码 -->
    <!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
    <div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->

    </div>
</body>
</html>