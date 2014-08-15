<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>杭州电子科技大学信息工程学院网上招聘系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <link href="/zhaoping/Public/Common/Css/index/style.css" rel="stylesheet" type="text/css" />
    <link href="/zhaoping/Public/Common/Css/Head&Foot.css" rel="stylesheet" type="text/css"/>
    <!--[if lt IE 7]>
    <link href="/zhaoping/Public/Common/Css/index/ie_style.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <link rel="stylesheet" href="/zhaoping/Public/Common/Css/index/nivo-slider.css" type="text/css"/>
    <script type="text/javascript" src="/zhaoping/Public/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/zhaoping/Public/Common/Js/index/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider();
        });
    </script>

</head>

<body id="page1">
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
    <div class="slide">
        <div class="indent">
            <div class="wrapper">
                <div class="mainContent">
                    <!-- .imageShow-box -->
                    <div class="nivoSlider" id="slider">
                        <?php if(is_array($slides)): $i = 0; $__LIST__ = $slides;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide): $mod = ($i % 2 );++$i;?><img src="<?php echo ($slide["SL_addr"]); ?>" alt=""/><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <!-- /.imageShow-box -->
                    <h2><strong>公告</strong>公示</h2>
                    <?php if(is_array($announcements)): $i = 0; $__LIST__ = $announcements;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$announcement): $mod = ($i % 2 );++$i;?><div class="img-box">
                            <img src="/zhaoping/Public/Common/Image/index/icon1.jpg" alt="" />
                            <strong><?php echo ($announcement["AR_title"]); ?></strong><br/>
                            <span style=""><?php echo(mb_substr(strip_tags($announcement["AR_content"]),0,40,'utf-8'));?>……</span>
                            <a href="/zhaoping/index.php/Home/Article/article?id=<?php echo ($announcement["AR_id"]); ?>" class="link1">read more</a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="aside right">
                    <h3>最新职位</h3>
                    <!-- .box -->
                    <div class="box">
                        <dl>
                            <?php if(is_array($jobs)): $i = 0; $__LIST__ = $jobs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$job): $mod = ($i % 2 );++$i;?><dt><?php echo ($job["AR_createTime"]); ?></dt>
                                <dd>
                                    <strong><?php echo ($job["AR_title"]); ?></strong><br/>
                                    <span><?php echo(mb_substr(strip_tags($job["AR_content"]),0,40,'utf-8'));?>……</span>
                                    <a href="/zhaoping/index.php/Home/Position/positionCenter">
                                        <img src="/zhaoping/Public/Common/Image/index/arrow1.gif" alt="" />
                                    </a>
                                </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                        </dl>
                        <a href="/zhaoping/index.php/Home/Position/positionCenter" class="link1">所 有 职 位</a>
                    </div>
                    <!-- /.box -->
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

<script type="text/javascript">
    $('#slider').nivoSlider({
        animSpeed: 500,
        pauseTime: 3000,
        startSlide: 0,
        directionNav: false,
        controlNav: true,
        controlNavThumbs: false
    });
</script>
</body>
</html>