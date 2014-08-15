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
                <li><a href="/zhaoping/index.php/Department/Verify/index">审核管理</a></li>
                <li><a href="/zhaoping/index.php/Department/User/index">个人中心</a></li>
            </ul>
            <!-- /.nav -->
        </div>
    </div>
</div>
<!-- content -->
<div class="container" style="width: 980px;padding: 0">
    <div class="panel panel-info" id="modifyPsd">
        <div class="panel-heading" style="height: 60px">
            <span class="pull-left" style="text-align: center;align-content: center;font-size: 16px">修改资料</span>
            <a type="button" class="btn btn-danger pull-right" href="/zhaoping/index.php/Admin/Login/login">退出</a>
        </div>
        <form class="form-horizontal" name="modifyForm" method="post" action="/zhaoping/index.php/Department/User/modify" role="form" onsubmit="return checkForm();">
            <div class="row" style="margin: 10px 0">
                <div class="col-lg-6">
                    <div class="input-group" style="margin-bottom: 10px">
                        <span class="input-group-addon">登录名称</span>
                        <input type="text" class="form-control" name="DP_username" placeholder="请输入登录用户名">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon">联系电话</span>
                        <input type="text" class="form-control" name="DP_tel" placeholder="请输入联系电话">
                    </div>
                </div>
            </div>
            <div class="row" style="margin: 10px 0">
                <div class="col-lg-6">
                    <div class="input-group" style="margin-bottom: 10px">
                        <span class="input-group-addon">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</span>
                        <input type="password" class="form-control" name="password" placeholder="密码">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon">确认密码</span>
                        <input type="password" class="form-control" name="confirmPassword" placeholder="请重新输入密码">
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-info" style="margin-right: 20px">修改</button>
                <button class="btn btn-primary">取消</button>
            </div>
        </form>
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
<script type="text/javascript">
    function checkForm(){
        if((document.modifyForm.elements[0].value.length == 0) || (document.modifyForm.elements[1].value.length == 0) || (document.modifyForm.elements[2].value.length == 0) || (document.modifyForm.elements[3].value.length == 0)){
            alert("您有项目未填写！");
            return false;
        }
        if(document.modifyForm.elements[2].value != document.modifyForm.elements[3].value){
            alert("两次输入的密码不同！");
            return false;
        }
        return true;
    }
</script>
</body>
</html>