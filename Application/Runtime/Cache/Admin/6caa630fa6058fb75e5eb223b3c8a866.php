<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>会员管理</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/zhaoping/Public/Common/Css/Head&Foot.css" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/zhaoping/Public/Bootstrap/css/bootstrap.min.css">

    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        function onCheckForm(){
            var i;
            for(i=0;i < 5;i++){
                if(document.addDepartmentForm.elements[i].value.length == 0){
                    alert("您还有项目未填写！");
                    return false;
                }
            }
            if(document.addDepartmentForm.elements[2].value != document.addDepartmentForm.elements[3].value){
                alert("两次密码输入不同！");
                return false;
            }
            return true;
        }
    </script>
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
            会员管理
        </div>
        <table class="table">
            <tr>
                <th>序号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>最高学历</th>
                <th>政治面貌</th>
                <th>Email</th>
                <th>所学专业</th>
            </tr>
            <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["US_id"]); ?></td>
                    <td><?php echo ($vo["US_name"]); ?></td>
                    <td>
                        <?php
 if($vo['US_sex'] == 1){ echo('男'); }else{ echo('女'); } ?>
                    </td>
                    <td><?php echo ($vo["US_highest"]); ?></td>
                    <td><?php echo ($vo["US_face"]); ?></td>
                    <td><?php echo ($vo["US_Email"]); ?></td>
                    <td><?php echo ($vo["US_major"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="panel-footer">
            <ul class="pager" style="margin: 0">
                <li><a href="#">上一页</a></li>
                <li><a href="#">下一页</a></li>
            </ul>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading" style="padding-bottom: 40px">
            <h5 class="pull-left">用人部门管理</h5>
            <a type="button" class="btn btn-info pull-right" href="#addDepartment" data-toggle="modal">添加</a>
        </div>
        <table class="table">
            <tr>
                <th>序号</th>
                <th>用户名</th>
                <th>部门名称</th>
                <th>手机号</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($departments)): $i = 0; $__LIST__ = $departments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$department): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($department["DP_id"]); ?></td>
                    <td><?php echo ($department["DP_username"]); ?></td>
                    <td><?php echo ($department["DP_name"]); ?></td>
                    <td><?php echo ($department["DP_tel"]); ?></td>
                    <td>
                        <a type="button" class="btn btn-primary" href="/zhaoping/index.php/Admin/Person/deleteDepartment?DP_id=<?php echo ($department["DP_id"]); ?>" onclick="return confirm('你确定要删除此用户么？');">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="panel-footer">
            <ul class="pager" style="margin: 0">
                <li><a href="#">上一页</a></li>
                <li><a href="#">下一页</a></li>
            </ul>
        </div>
    </div>

    <div id="addDepartment" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><span class="glyphicon glyphicon-user">添加用人部门</span></h3>
                </div>
                <form role="form" method="post" action="/zhaoping/index.php/Admin/Person/addDepartment" name="addDepartmentForm" id="addDepartmentForm" onsubmit="return onCheckForm();">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="department">部门名称</label>
                            <input type="text" class="form-control" id="department" name="DP_name" placeholder="请输入部门名称">
                        </div>
                        <div class="form-group">
                            <label for="departmentName">用户名</label>
                            <input type="text" class="form-control" id="departmentName" name="DP_username" placeholder="请输入登陆用户名">
                        </div>
                        <div class="form-group">
                            <label for="departmentPsd">密码</label>
                            <input type="password" class="form-control" id="departmentPsd" name="DP_psd" placeholder="请输入密码">
                        </div>
                        <div class="form-group">
                            <label for="confirmPsd">确认密码</label>
                            <input type="password" class="form-control" id="confirmPsd" placeholder="请重新输入密码">
                        </div>
                        <div class="form-group">
                            <label for="departmentTel">联系人手机号</label>
                            <input type="text" class="form-control" id="departmentTel" name="DP_tel" placeholder="请输入联系人手机号码">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">添加</button>
                        <button type="button" data-dismiss="modal" class="btn btn-default">取消</button>
                    </div>
                </form>
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/zhaoping/Public/jquery-1.11.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/zhaoping/Public/Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>