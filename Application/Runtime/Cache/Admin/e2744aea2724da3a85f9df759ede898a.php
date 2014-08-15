<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>添加文章</title>
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
        function checkForm(){
            if(document.addForm.elements[0].value.length == 0){
                alert("文章标题不能为空！");
                return false;
            }
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
    <form class="form-horizontal" name="addForm" method="post" action="/zhaoping/index.php/Admin/Content/addArticle" role="form" onsubmit="return checkForm();">
    <div class="panel panel-default">
        <div class="panel-heading">
            添加文章
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="title" class="col-sm-1 control-label">标题</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="title" placeholder="标题">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <label for="category" class="col-sm-4 control-label">分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category" name="category" onchange="onChange(this.value)">
                            <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["CG_id"]); ?>"><?php echo ($vo["CG_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6">
                    <label for="age" class="col-sm-4 control-label">年龄要求</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="age" name="age" placeholder="请输入年龄要求">
                    </div>
                </div>
            </div>
            <div class="row"  style="margin-top: 10px;margin-bottom: 10px">
                <div class="col-xs-4">
                    <label for="major" class="col-sm-4 control-label">专业要求</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="major" name="major" placeholder="请输入专业要求">
                    </div>
                </div>
                <div class="col-xs-6">
                    <label for="personNum" class="col-sm-4 control-label">招聘人数</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="personNum" name="personNum" placeholder="请输入要招聘人数">
                    </div>
                </div>
            </div>
            <div class="row"  style="margin-top: 10px;margin-bottom: 10px">
                <div class="col-xs-4">
                    <label for="deadTime" class="col-sm-4 control-label">最后期限</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="deadTime" name="deadTime" placeholder="请输入期限日期">
                    </div>
                </div>
                <div class="col-xs-6">
                    <label for="education" class="col-sm-4 control-label">学历要求</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="education" name="education" placeholder="请输入要学历要求">
                    </div>
                </div>
            </div>
            <div class="">
                <!-- 加载编辑器的容器 -->
                <script id="content" name="content" type="text/plain"></script>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-info" id="saveBtn" type="button" href="#firstCheck" data-toggle="modal">保存</button>
        </div>
    </div>

    <div class="modal fade" id="firstCheck">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    审核部门
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>状态</th>
                                <th>部门名称</th>
                                <th>用户名</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($departments)): $i = 0; $__LIST__ = $departments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$department): $mod = ($i % 2 );++$i;?><tr>
                                    <th><input name="firstCheckBox[]" type="checkbox" value="<?php echo ($department["DP_id"]); ?>"></th>
                                    <th><?php echo ($department["DP_name"]); ?></th>
                                    <th><?php echo ($department["DP_username"]); ?></th>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button name="confirmBtn" class="btn btn-success" type="submit">确定</button>
                </div>
            </div>
        </div>
    </div>
    </form>
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

<!-- 配置文件 -->
<script type="text/javascript" src="/zhaoping/Editor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/zhaoping/Editor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('content');
</script>
<script type="text/javascript">
    function onChange(num){
        if(num != 1){
            $("#education").attr('disabled','');
            $("#personNum").attr('disabled','');
            $("#major").attr('disabled','');
            $("#deadTime").attr('disabled','');
            $("#age").attr('disabled','');

            $("#saveBtn").attr('type','submit');
            $("#saveBtn").removeAttr('href');
            $("#saveBtn").removeAttr('data-toggle');
        }else{
            $("#education").removeAttr('disabled');
            $("#personNum").removeAttr('disabled');
            $("#major").removeAttr('disabled');
            $("#deadTime").removeAttr('disabled');
            $("#age").removeAttr('disabled');

            $("#saveBtn").attr('type','button');
            $("#saveBtn").attr('href','#firstCheck');
            $("#saveBtn").attr('data-toggle','modal');
        }
    }
</script>
</body>
</html>