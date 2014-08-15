<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>后台管理</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/zhaoping/Public/Common/Css/Head&Foot.css" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/zhaoping/Public/Bootstrap/css/bootstrap.min.css">

    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                <!--<li class="first"><a href="" class="current">后台首页</a></li>-->
                <li class="first"><a href="/zhaoping/index.php/Admin/Content/index">内容管理</a></li>
                <li><a href="/zhaoping/index.php/Admin/Verify/index">审核管理</a></li>
                <li><a href="/zhaoping/index.php/Admin/Person/index">会员管理</a></li>
                <li><a href="/zhaoping/index.php/Admin/User/index">个人中心</a></li>
            </ul>
            <!-- /.nav -->
        </div>
    </div>
</div>
<!-- content -->
<div class="container" style="width: 980px;padding: 0">
    <div class="panel panel-info">
        <div class="panel-heading">
            审核管理
        </div>
        <div class="departmentContent">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    职位信息
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row" style="margin: 10px 0">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位</span>
                                    <input type="text" class="form-control" placeholder="职位" value="<?php echo ($information["AR_title"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin: 10px 0">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">招聘人数</span>
                                    <input type="text" class="form-control" placeholder="招聘人数" value="<?php echo ($information["AR_numPerson"]); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">学历要求</span>
                                    <input type="text" class="form-control" placeholder="学历要求" value="<?php echo ($information["AR_education"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin: 10px 0">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">年龄要求</span>
                                    <input type="text" class="form-control" placeholder="年龄要求" value="<?php echo ($information["AR_age"]); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">专业要求</span>
                                    <input type="text" class="form-control" placeholder="专业要求" value="<?php echo ($information["AR_major"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div style="margin: 0 15px">
                            <span class="content"><?php echo ($information["AR_content"]); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="userContent">
                <div class="panel-primary">
                    <div class="panel-heading">
                        用户信息
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="userResume"><?php echo ($information["EP_resume"]); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback">
                <?php if(is_array($feedbacks)): $i = 0; $__LIST__ = $feedbacks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feedback): $mod = ($i % 2 );++$i;?><div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#123">
                                        <?php echo ($feedback["DP_name"]); ?>反馈
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div id="123" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">状态</span>
                                            <input type="text" class="form-control" placeholder="状态" value="<?php if($feedback['FC_status'] == 1) echo('通过');else echo('不通过');?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px 0">
                                    <div class="col-lg-10" style="padding: 0">
                                        <div class="input-group">
                                            <span class="input-group-addon">反馈意见</span>
                                            <textarea class="form-control" rows="5" readonly><?php echo ($feedback["FC_reason"]); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="panel-footer">
            <a type="button" class="btn btn-success" href="/zhaoping/index.php/Admin/Verify/dealSecondInfo?id=<?php echo ($information["EP_id"]); ?>&type=1">通&nbsp;&nbsp;&nbsp;&nbsp;过</a>
            <a type="button" class="btn btn-danger" href="/zhaoping/index.php/Admin/Verify/dealSecondInfo?id=<?php echo ($information["EP_id"]); ?>&type=0">不通过</a>
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/zhaoping/Public/jquery-1.11.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/zhaoping/Public/Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>