<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta http-equiv="Content-Style-type" content="text/css"/>
    <title></title>

    <link rel="stylesheet" type="text/css" href="/zhaoping/Public/Common/Css/Head&Foot.css"/>
    <link rel="stylesheet" type="text/css" href="/zhaoping/Public/Common/Css/Article/articleStyle.css"/>
    <style type="text/css">
        .article_title{
            width: 100%;
            height: 70px;
            padding: 20px 0;
            margin-bottom: 20px;
            border-bottom: solid #c0c0c0 1px;
        }
        .article_title p{
            text-align: center;
        }
        .title_title{
            font-size: 28px;
            color: #303030;
            margin: 10px 0;
            font-family: "微软雅黑";
            line-height: 40px;
        }
        .title_time{
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
<!-- header -->
<div id="header">
    <div class="row-1">
        <div class="slide">
        <img src="/zhaoping/Public/Common/Image/slide.jpg" alt="" />
        </div>
    </div>
    <div class="row-2">
        <div class="container">
            <!-- .nav -->
            <ul class="nav">
                <li class="first"><a href="/zhaoping/index.php/Home/Index/index" class="current">网站首页</a></li>
                <li><a href="/zhaoping/index.php/Home/College/college">学院简介</a></li>
                <li><a href="/zhaoping/index.php/Home/Article/articleList">公告公示</a></li>
                <li><a href="/zhaoping/index.php/Home/Position/positionCenter">招聘中心</a></li>
                <li><a href="/zhaoping/index.php/Home/Person/personCenter">会员中心</a></li>
            </ul>
            <!-- /.nav -->
        </div>
    </div>
</div>
<!-- content -->
<div id="content">
    <div class="container">
        <div class="breadCrumb">
            <img src="/zhaoping/Public/Common/Image/Article/breadCrumb.gif" alt=""/>
            <h4>当前位置 > <a>学院简介</a></h4>
        </div>

        <div class="article">
            <div class="nav_title">
                <h4>学院简介</h4>
            </div>
            <div class="article_content">
                <div class="article_title">
                    <p class="title_title"><?php echo ($college["AR_title"]); ?></p>
                    <p class="title_time"><?php echo(substr($college['AR_createTime'] ,0,10));?></p>
                </div>
                <div class="article_body">
                    <?php echo ($college["AR_content"]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<div id="footer">
    <div class="container">
        <div class="indent" style="margin-left: 330px">
            Copyright &copy; 2014 &nbsp; &nbsp;All right reserved by bingo工作室
        </div>
    </div>
</div>
</body>
</html>