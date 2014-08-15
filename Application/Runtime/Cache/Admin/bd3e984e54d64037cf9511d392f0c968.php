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
        <div class="panel-body" style="margin: 0;padding-top: 5px;padding-bottom: 5px">
            <p>显示的是等待您审核的事项！</p>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#firstCheck" role="tab" data-toggle="tab">初审</a></li>
            <li><a href="#secondCheck" role="tab" data-toggle="tab">终审</a></li>
            <li><a href="#totalCheck" role="tab" data-toggle="tab">审核汇总</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="firstCheck">
                <table class="table">
                    <tr>
                        <th>序号</th>
                        <th>时间</th>
                        <th>所属招聘</th>
                        <th>人员</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($firstChecks)): $i = 0; $__LIST__ = $firstChecks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$first): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($first["FC_id"]); ?></td>
                            <td><?php echo ($first["FC_time"]); ?></td>
                            <td><?php echo ($first["AR_title"]); ?></td>
                            <td><?php echo ($first["US_name"]); ?></td>
                            <td>
                                <a type="button" class="btn btn-primary"  href="/zhaoping/index.php/Admin/Verify/detailFirstInfo?id=<?php echo ($first["FC_id"]); ?>">详情</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
            <div class="tab-pane" id="secondCheck">
                <table class="table">
                    <tr>
                        <th>序号</th>
                        <th>时间</th>
                        <th>所属招聘</th>
                        <th>人员</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($secondChecks)): $i = 0; $__LIST__ = $secondChecks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($second["EP_id"]); ?></td>
                            <td><?php echo ($second["EP_time"]); ?></td>
                            <td><?php echo ($second["AR_title"]); ?></td>
                            <td><?php echo ($second["US_name"]); ?></td>
                            <td><a type="button" class="btn btn-primary" href="/zhaoping/index.php/Admin/Verify/detailSecondInfo?id=<?php echo ($second["EP_id"]); ?>">详情</button></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>

            <div class="tab-pane" id="totalCheck">
                <table class="table">
                    <tr>
                        <th>序号</th>
                        <th>状态</th>
                        <th>所属招聘</th>
                        <th>人员</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($totalCheck)): $i = 0; $__LIST__ = $totalCheck;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$total): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($total["EP_id"]); ?></td>
                            <td><?php if($total['EP_status'] == 2) echo('录用'); else echo('不录用');?></td>
                            <td><?php echo ($total["AR_title"]); ?></td>
                            <td><?php echo ($total["US_name"]); ?></td>
                            <td><a type="button" class="btn btn-primary" href="/zhaoping/index.php/Admin/Verify/detailInfo?id=<?php echo ($total["EP_id"]); ?>">详情</button></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <ul class="pager" style="margin: 0">
                <li><a href="#">上一页</a></li>
                <li><a href="#">下一页</a></li>
            </ul>
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