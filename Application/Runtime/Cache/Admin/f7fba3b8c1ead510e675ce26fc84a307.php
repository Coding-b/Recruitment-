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
    <div class="panel panel-default">
        <div class="panel-heading">修改文章</div>
        <form class="form-horizontal" name="addForm" method="post" action="/zhaoping/index.php/Admin/Content/modifyArticle" role="form" onsubmit="return checkForm();">
            <div class="panel-body">
                <div class="form-group">
                    <label for="title" class="col-sm-1 control-label">标题</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="title" name="AR_title" placeholder="标题" value="<?php echo ($article['AR_title']); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-1 control-label">分类</label>
                    <div class="col-sm-5">
                        <select class="form-control" id="category" name="AR_category">
                            <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["CG_id"]) == $article["AR_category"]): ?><option value="<?php echo ($vo["CG_id"]); ?>" selected="true"><?php echo ($vo["CG_name"]); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo ($vo["CG_id"]); ?>"><?php echo ($vo["CG_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="">
                    <!-- 加载编辑器的容器 -->
                    <script id="content" name="AR_content" type="text/plain"><?php echo ($article["AR_content"]); ?></script>
                </div>
                <input type="hidden" name="AR_id" value="<?php echo ($article["AR_id"]); ?>">
            </div>
            <div class="panel-footer">
                <button class="btn btn-info" type="submit">保存</button>
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

<!-- 配置文件 -->
<script type="text/javascript" src="/zhaoping/Editor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/zhaoping/Editor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('content');
</script>
</body>
</html>