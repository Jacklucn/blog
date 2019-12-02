<?php
/* @var $content string */

use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="jacklucn">

    <meta name="google-site-verification" content="5dJ1r-gKi1VwcE-TC0zyOLfaam9z1OW2FmeT3SBhWio" />

    <title>Jacklucn</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/images/IMG_0128.jpg') ?>">

    <!-- Bootstrap Core CSS -->
    <link href="<?= Url::to('@web/css/admin/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= Url::to('@web/css/admin/metisMenu.min.css') ?>" rel="stylesheet">

    <?php
    $path = \Yii::$app->request->pathInfo;
    if ($path == 'admin/tables') {
        ?>
        <!-- Timeline CSS -->
        <link href="<?= Url::to('@web/css/admin/timeline.css') ?>" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="<?= Url::to('@web/css/admin/morris.css') ?>" rel="stylesheet">
        <?php
    }
    ?>
    <!-- Custom CSS -->
    <link href="<?= Url::to('@web/css/admin/startmin.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= Url::to('@web/css/admin/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= Url::to('@web/css/admin/fileinput.css') ?>" rel="stylesheet" type="text/css">

    <?php
    $path = \Yii::$app->request->pathInfo;
    if ($path == 'admin/tables') {
        ?>
        <!-- DataTables CSS -->
        <link href="<?= Url::to('@web/css/admin/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="<?= Url::to('@web/css/admin/dataTables/dataTables.responsive.css') ?>" rel="stylesheet">
        <?php
    }
    ?>

    <!-- simditor CSS -->
    <?php
    $path = \Yii::$app->request->pathInfo;
    if ($path == 'admin/forms') {
        ?>
        <link rel="stylesheet" type="text/css" href="<?= Url::to('@web/simditor/site/assets/styles/simditor.css') ?>"/>
        <?php
    }
    ?>

    <?= \yii\bootstrap\Html::csrfMetaTags() ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= Url::to(['admin/index']) ?>"> 管理后台</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="https://www.jacklucn.com"><i class="fa fa-home fa-fw"></i> 网站首页</a></li>
        </ul>

        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <script type="application/javascript">
                            window.location = 'https://admin.jacklucn.com/admin/login'
                        </script>
                    <?php } else { ?>
                        <?= Yii::$app->user->identity->username ?>
                    <?php } ?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> 个人信息</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> 账号设置</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?= Url::to(['admin/logout']) ?>">
                            <i class="fa fa-sign-out fa-fw"></i>
                            退出登录
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?= Url::to(['admin/index']) ?>" class="active">
                            <i class="fa fa-dashboard fa-fw"></i>
                            首页
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['admin/tables']) ?>">
                            <i class="fa fa-table fa-fw"></i>
                            文章列表
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['admin/category']) ?>">
                            <i class="fa fa-table fa-fw"></i>
                            分类列表
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['admin/forms']) ?>" class='nav-tag'>
                            <i class="fa fa-edit fa-fw"></i>
                            发布文章
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['admin/blank']) ?>">
                            <i class="fa fa-files-o fa-fw"></i>
                            Blank Page
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['admin/morris']) ?>blank.html"><i class="fa fa-wrench fa-fw"></i> Blank
                            Page</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $content; ?>

    <!-- 信息删除确认 -->
    <div class="modal fade" id="delcfmModel">
        <div class="modal-dialog">
            <div class="modal-content message_align">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title">提示信息</h4>
                </div>
                <div class="modal-body">
                    <p>您确认要执行该操作吗？</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="params"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <a onclick="urlSubmit()" class="btn btn-success" data-dismiss="modal">确定</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= Url::to('@web/js/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= Url::to('@web/js/bootstrap.min.js') ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= Url::to('@web/js/metisMenu.min.js') ?>"></script>

    <!-- Morris Charts JavaScript -->
    <?php
    $path = \Yii::$app->request->pathInfo;
    if ($path == 'admin/index') {
        ?>
        <script src="<?= Url::to('@web/js/raphael.min.js') ?>"></script>
        <script src="<?= Url::to('@web/js/morris.min.js') ?>"></script>
        <script src="<?= Url::to('@web/js/morris-data.js') ?>"></script>
        <?php
    }
    ?>

    <!-- DataTables JavaScript -->
    <?php
    $path = \Yii::$app->request->pathInfo;
    if ($path == 'admin/tables') {
        ?>
        <script src="<?= Url::to('@web/js/dataTables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= Url::to('@web/js/dataTables/dataTables.bootstrap.min.js') ?>"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
        <?php
    }
    ?>

    <!-- simditor JavaScript -->
    <?php
    $path = \Yii::$app->request->pathInfo;
    if ($path == 'admin/forms') {
        ?>
        <script type="text/javascript" src="<?= Url::to('@web/simditor/site/assets/scripts/module.js') ?>"></script>
        <script type="text/javascript" src="<?= Url::to('@web/simditor/site/assets/scripts/hotkeys.js') ?>"></script>
        <script type="text/javascript" src="<?= Url::to('@web/simditor/site/assets/scripts/uploader.js') ?>"></script>
        <script type="text/javascript" src="<?= Url::to('@web/simditor/site/assets/scripts/simditor.js') ?>"></script>
        <!-- simditor-mark JavaScript -->
        <script src="<?= Url::to('@web/simditor-mark/lib/simditor-mark.js') ?>"></script>
        <script type="application/javascript">
            var editor = new Simditor({
                textarea: $('#editor'),
                //optional options
                toolbar: [
                    'mark', 'title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', 'image', 'link', 'hr', 'indent', 'outdent', 'alignment'
                ],
                upload: {
                    url: 'ImgUpload.action', //文件上传的接口地址
                    params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
                    fileKey: 'fileDataFileName', //服务器端获取文件数据的参数名
                    connectionCount: 3,
                    leaveConfirm: '正在上传文件'
                }
            });
        </script>
    <?php } ?>

    <!-- Custom Theme JavaScript -->
    <script src="<?= Url::to('@web/js/startmin.js') ?>"></script>

    <!-- 侧边栏当前选中效果 -->
    <script type="application/javascript">
        var url = "<?=Yii::$app->request->url?>";
        var current_url = url.substring(url.lastIndexOf('/') + 1, url.length);
        if (current_url === 'forms') {
            $('.nav-tag').css('background-color', '#e7e7e7')
        }
    </script>

    <!-- 操作确认框 -->
    <script type="application/javascript">
        function delcfm(params) {
            $('#params').val(params);
            $('#delcfmModel').modal();
        }

        function urlSubmit() {
            var params = $.trim($("#params").val());
            params = params.split(",");
            var csrfToken = "<?= Yii::$app->request->csrfToken ?>";
            var data = {'_csrf-backend': csrfToken, id: '' + params[0] + '', status: '' + params[1] + ''};
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: $(".operate").attr('data-action'),
                data: data,
                success: function (data) {
                    if (data.code === 200) {
                        window.location.href = "<?=Url::toRoute([\Yii::$app->request->pathInfo])?>"
                    } else {
                        alert(data.message);
                    }
                }
            });
        }
    </script>

    <!-- 调整页面高度用的 -->
    <script type="application/javascript">
        // $(window).on("load resize",function(){
        // var h=window.innerHeight||document.body.clientHeight||document.documentElement.clientHeight;
        //        var h=$(window).height();
        //             $("#page-wrapper").css("min-height",h);
        //         });
    </script>

</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
