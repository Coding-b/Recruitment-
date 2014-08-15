<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>后台管理</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/zhaoping/Public/Common/Css/Head&Foot.css" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/zhaoping/Public/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/zhaoping/Public/Bootstrap/css/fileinput.min.css">

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
            横幅管理
        </div>
        <div class="panel-content row" style="padding-top: 10px">
            <?php if(is_array($slides)): $i = 0; $__LIST__ = $slides;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide): $mod = ($i % 2 );++$i;?><div class="col-md-3">
                    <div class="thumbnail">
                        <img src="<?php echo ($slide["SL_addr"]); ?>" order="<?php echo ($slide["SL_order"]); ?>" alt="..." slideId="<?php echo ($slide["SL_id"]); ?>" onclick="slideOnclick(this)">
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><span class="glyphicon glyphicon-inbox"> 横幅设置</span></h3>
                    </div>
                    <form role="form" action="/zhaoping/index.php/Admin/Content/modifySlide" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="slideImage" name="slideImage[]" type="file">
                            </div>
                            <div class="form-group">
                                <label for="order">排序</label>
                                <input type="number" class="form-control" id="order" name="SL_order" placeholder="请输入图片序号">
                            </div>
                            <input type="hidden" name="SL_id" id="SL_id">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">修改</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">取消</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading" style="padding-bottom: 40px">
            <h5 class="pull-left">文章管理</h5>
            <a type="button" class="btn btn-success pull-right" href="/zhaoping/index.php/Admin/Content/add">添加</a>
        </div>
        <table class="table">
            <tr>
                <th>序号</th>
                <th>所属分类</th>
                <th>名称</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["AR_id"]); ?></td>
                    <td><?php echo ($vo["CG_name"]); ?></td>
                    <td><?php echo ($vo["AR_title"]); ?></td>
                    <td>
                        <a class="btn btn-primary" style="margin-right: 20px"  href="/zhaoping/index.php/Admin/Content/modify?AR_id=<?php echo ($vo["AR_id"]); ?>">修改</a>
                        <a class="btn btn-danger" href="/zhaoping/index.php/Admin/Content/delete?AR_id=<?php echo ($vo["AR_id"]); ?>" onclick="return confirm('你确定要删除这篇文章么？');">删除</a>
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
<script src="/zhaoping/Public/Bootstrap/js/fileinput.min.js"></script>
<script type="text/javascript">
    function slideOnclick(slide){
        $('#myModal').modal('show');
        document.getElementById('order').setAttribute("value",slide.getAttribute('order'))
        document.getElementById('SL_id').setAttribute("value",slide.getAttribute('slideId'))
    }
    // with plugin options
    $("#slideImage").fileinput({'showUpload':false, 'previewFileType':'any' , 'previewFileType':'image'});
</script>
</body>
</html>