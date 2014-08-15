<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta http-equiv="Content-Style-type" content="text/css"/>
    <title>公告公示</title>

    <link rel="stylesheet" type="text/css" href="/zhaoping/Public/Common/Css/Head&Foot.css"/>
    <link rel="stylesheet" type="text/css" href="/zhaoping/Public/Common/Css/Article/style.css"/>
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
            <h4>当前位置 > <a>公告公示</a></h4>
        </div>

        <div class="articleList">
            <div class="nav_title">
                <h4>公告公示</h4>
            </div>
            <div class="articleList_content">
                <ul class="articleList_ul">
                    <?php if(is_array($announcements)): $i = 0; $__LIST__ = $announcements;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$announcement): $mod = ($i % 2 );++$i;?><li>
                            <span class="article_name"><b>>></b><?php echo ($announcement["AR_title"]); ?></span>
                            <span class="article_time"><?php echo(mb_substr($announcement['AR_createTime'],0,10));?></span>
                            <p class="article_shortMessage">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo(mb_substr(strip_tags($announcement["AR_content"]),0,40,'utf-8'));?>……
                            </p>
                            <p class="article_more"><a href="/zhaoping/index.php/Home/Article/article?id=<?php echo ($announcement["AR_id"]); ?>">阅读更多</a></p>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="articleList_foot">
                    <span style="padding-left:15px;line-height:25px;height:25px;margin-left: 40px;">
                        共&nbsp;&nbsp;<span style="font-weight:bold;"><?php echo ($totalNum); ?></span>&nbsp;&nbsp;条记录
                    </span>
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