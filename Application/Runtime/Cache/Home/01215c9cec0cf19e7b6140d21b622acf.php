<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta http-equiv="Content-Style-type" content="text/css"/>
    <title>招聘中心</title>

    <link rel="stylesheet" type="text/css" href="/zhaoping/Public/Common/Css/Head&Foot.css"/>
    <link rel="stylesheet" type="text/css" href="/zhaoping/Public/Common/Css/Position/style.css"/>
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
        <div class="aside_left">
            <div class="breadCrumb">
                <img src="/zhaoping/Public/Common/Image/Article/breadCrumb.gif" alt=""/>
                <h4>当前位置 > <a>招聘中心</a></h4>
            </div>

            <div class="article">
                <div class="nav_title">
                    <h4>招聘中心</h4>
                </div>
                <div class="article_content">
                    <?php if(is_array($jobs)): $i = 0; $__LIST__ = $jobs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$job): $mod = ($i % 2 );++$i;?><div class="article_zpzw">
                            <div class="content_aside_left">
                                <p class="content_title"><?php echo ($job["AR_title"]); ?></p>
                                <p class="content_row">
                                    招聘人数：<span class="content_row_content"><?php echo ($job["AR_numPerson"]); ?></span>人
                                    学历要求：<span class="content_row_content"><?php echo ($job["AR_education"]); ?></span>
                                </p>
                                <p class="content_row">
                                    年龄要求：<span class="content_row_content"><?php echo ($job["AR_age"]); ?></span>
                                    专业要求：<span class="content_row_content"><?php echo ($job["AR_major"]); ?></span>
                                </p>
                                <p class="content_row_1">
                                    <?php echo(strip_tags($job["AR_content"]));?>
                                </p>
                            </div>
                            <div class="content_aside_right">
                                <p class="content_jzrq">
                                    截止日期：<span><?php echo ($job["AR_deadTime"]); ?></span>
                                </p>
                                <p class="content_ljsq">
                                    <a href="/zhaoping/index.php/Home/Position/positionApply?id=<?php echo ($job["AR_id"]); ?>">
                                        <img src="/zhaoping/Public/Common/Image/Position/btn_ljsq.jpg">
                                    </a>
                                </p>
                            </div>
                            <div style="clear: both"></div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <div class="aside_right">
            <h3>招聘流程</h3>
            <img src="/zhaoping/Public/Common/Image/Position/5.jpg" alt=""/>
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