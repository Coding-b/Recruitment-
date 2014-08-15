<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta http-equiv="Content-Style-type" content="text/css"/>
    <title>我的求职中心</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/zhaoping/Public/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/zhaoping/Public/Bootstrap/css/fileinput.min.css">
    <link rel="stylesheet" href="/zhaoping/Public/Admin/Css/Login/style.css">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/zhaoping/Public/Common/Css/Head&Foot.css"/>
    <link rel="stylesheet" type="text/css" href="/zhaoping/Public/Common/Css/Person/personCenter_style.css"/>
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
    <div class="container" style="padding: 0;margin: auto">
        <div class="aside_left">
            <div class="aside_left_personalInfo">
                <div class="personalInfo_image">
                    <?php
 if(!isset($user['US_image'])){ echo('<img src="/zhaoping/Public/Common/Image/Person/noImage.jpg" alt=""/>'); }else{ echo('<img style="width: 120px;height: 160px" src="'.$user['US_image'].'"/>'); } ?>
                </div>
                <table class="personalInfo">
                    <tr>
                        <td>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</td>
                        <td><?php echo ($user["US_name"]); ?></td>
                    </tr>
                    <tr>
                        <td>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
                        <td>
                            <?php
 if($user['US_sex'] == 1){ echo('男'); }else{ echo('女'); } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>出生日期：</td>
                        <td><?php echo ($user["US_birth"]); ?></td>
                    </tr>
                    <tr>
                        <td>政治面貌：</td>
                        <td><?php echo ($user["US_face"]); ?></td>
                    </tr>
                    <tr>
                        <td>最高学历：</td>
                        <td><?php echo ($user["US_highest"]); ?></td>
                    </tr>
                    <tr>
                        <td>所学专业：</td>
                        <td><?php echo ($user["US_major"]); ?></td>
                    </tr>
                </table>
                <div class="personalInfo_redone">
                    <a type="button" class="btn btn-success" href="#modifyUser" data-toggle="modal">修改</a>
                </div>
            </div>
            <div class="contactUs">
                <div class="contactUs_title">
                    <h4>联系我们</h4>
                </div>
                <table class="contactUs_info">
                    <tr>
                        <td>联系人：</td>
                        <td>李老师</td>
                    </tr>
                    <tr>
                        <td>电话：</td>
                        <td>15958102642</td>
                    </tr>
                    <tr>
                        <td>Email：</td>
                        <td>15958102642@qq.com</td>
                    </tr>
                    <tr>
                        <td>邮编：</td>
                        <td>310018</td>
                    </tr>
                    <tr>
                        <td>地址：</td>
                        <td>杭州电子电子科技大学10教413</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="aside_right">
            <div class="offerList">
                <div class="offer_title">
                    <h4>应聘状态</h4>
                </div>
                <div class="offer_content">
                    <table>
                        <thead>
                        <tr>
                            <th>应聘岗位</th>
                            <th>应聘日期</th>
                            <th>应聘状态</th>
                            <th>回复</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($employments)): $i = 0; $__LIST__ = $employments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$employment): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($employment["AR_title"]); ?></td>
                                    <td><?php echo ($employment["EP_time"]); ?></td>
                                    <td>
                                        <?php
 if($employment["EP_status"] == 0){ echo('初审中'); }else if($employment["EP_status"] == 1){ echo('终审中'); }else if($employment["EP_status"] == 2){ echo('通过终审'); }else if($employment["EP_status"] == 3){ echo('终审不通过'); } ?>
                                    </td>
                                    <td><?php echo ($employment["EP_feedback"]); ?></td>
                                    <td>
                                        <a class="btn btn-danger" style="margin: 5px 0" href="/zhaoping/index.php/Home/Person/cancelEmployment?id=<?php echo ($employment["EP_id"]); ?>">取消</a>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modifyUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">修改个人资料</h4>
                </div>
                <form action="/zhaoping/index.php/Home/Person/modify" method="post" role="form" name="registerForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <input id="US_image" name="US_image[]" type="file" placeholder="请选择您的头像">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <div class="input-group">
                                    <div class="input-group-addon">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</div>
                                    <input type="text" class="form-control" id="US_name" name="US_name" placeholder="请输入姓名" value="<?php echo ($user["US_name"]); ?>">
                                </div>
                            </div>
                            <div class="col-xs-5">
                                <div class="input-group">
                                    <div class="input-group-addon">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别</div>
                                    <select class="form-control" id="US_sex" name="US_sex">
                                        <?php
 if($user['US_sex'] == 1){ echo('<option value="1" selected="true">男</option>
                                                <option value="2">女</option>'); }else{ echo('<option value="1">男</option>
                                                <option value="2"  selected="true">女</option>'); } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <div class="input-group">
                                    <div class="input-group-addon">出生日期</div>
                                    <input type="date" class="form-control" id="US_birth" name="US_birth" value="<?php echo ($user["US_birth"]); ?>">
                                </div>
                            </div>
                            <div class="col-xs-5">
                                <div class="input-group">
                                    <div class="input-group-addon">政治面貌</div>
                                    <input type="text" class="form-control" id="US_face" name="US_face" value="<?php echo ($user["US_face"]); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <div class="input-group">
                                    <div class="input-group-addon">最高学历</div>
                                    <input type="text" class="form-control" id="US_highest" name="US_highest" value="<?php echo ($user["US_highest"]); ?>">
                                </div>
                            </div>
                            <div class="col-xs-5">
                                <div class="input-group">
                                    <div class="input-group-addon">所学专业</div>
                                    <input type="text" class="form-control" id="US_major" name="US_major" value="<?php echo ($user["US_major"]); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register_btn">修改</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
<style type="text/css">
    .row{
        margin: 10px 0;
    }
</style>
<script src="/zhaoping/Public/Bootstrap/js/fileinput.min.js"></script>
<script type="text/javascript">
    // with plugin options
    $("#US_image").fileinput({'showUpload':false, 'previewFileType':'any' , 'previewFileType':'image'});
</script>
</body>
</html>