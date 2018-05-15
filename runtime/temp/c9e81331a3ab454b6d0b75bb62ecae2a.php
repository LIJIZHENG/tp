<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\WWW\tp\public/../application/home/view/default/category\shop.html";i:1526390382;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/static/login/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/login/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
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
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div id="div" class="container-fluid">
        <!--<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>-->
        <!--<div id="aa" class="row noticeList">-->
            <!--<a href="notice-detail.html">-->
                <!--<div class="col-xs-10">-->
                    <!--<div class="span2">-->
                        <!--<a href="/home/article/detail/id/<?php echo $value['id']; ?>.html"><img class="img-thumbnail" src="/static/static/nopic.jpg"></a>-->
                    <!--</div>-->
                    <!--<p class="title"><?php echo $value['title']; ?></p>-->
                    <!--<p class="intro"></p>-->
                    <!--<p class="info">浏览: <?php echo $value['view']; ?><span class="pull-right"><?php echo $value['create_time']; ?></span> </p>-->
                <!--</div>-->
            <!--</a>-->
        <!--</div>-->
        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
    </div>
    <div id="dd">获取更多</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/login/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/login/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(function () {
        var b=1;
         $("#dd").click(function () {
            b++;
             $.get("/home/article/lists/category/shop.html",{per_page:b}, function (data) {
                 console.log(b);
         var html='';
         var n=0;
                 for(var i in data){
                     n++;
//                     console.log(data[i].title)
               html +="<div class='row noticeList'><a href='notice-detail.html'><div class='col-xs-10'><div class='span2'><a href='/home/article/detail/id/"+data[i].id+".html'><img class='img-thumbnail' src='/static/static/nopic.jpg'></a></div>";
                     html+="<p class='title'>"+data[i].title+"</p><p class='intro'></p><p class='info'>浏览: "+data[i].view+"<span class='pull-right'>"+data[i].create_time+"</span> </p></div></a>";
                        }
               $("#div").html(html);
                 if(n==1){
                     alert('没有数据了,请不要骚操作!');
                 }
             });
         });
             $.get("/home/article/lists/category/shop.html",{per_page:b}, function (data) {
                 var html='';
                 for(var i in data){
//                     console.log(data[i].title)
                     html +="<div class='row noticeList'><a href='notice-detail.html'><div class='col-xs-10'><div class='span2'><a href='/home/article/detail/id/"+data[i].id+".html'><img class='img-thumbnail' src='/static/static/nopic.jpg'></a></div>";
                     html+="<p class='title'>"+data[i].title+"</p><p class='intro'></p><p class='info'>浏览: "+data[i].view+"<span class='pull-right'>"+'时间:'+data[i].create_time+"</span> </p></div></a>";
                 }
                 $("#div").html(html);

             });
    });
</script>
</body>
</html>