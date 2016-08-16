<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?=Html::cssFile('@web/css/bootstrap.min.css')?>
    <?=Html::cssFile('@web/css/matrix-style.css')?>
    <?=Html::cssFile('@web/css/matrix-media.css')?>
    <?=Html::cssFile('@web/font-awesome/css/font-awesome.css')?>
    <link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <?=Html::jsFile('@web/js/jquery.min.js')?>
    <?=Html::jsFile('@web/js/bootstrap.min.js')?>

</head>
<body>
    <?php $this->beginBody() ?>

    <!--Header-part-->
    <div id="header">
        <h1><a href="home.html">明源云工作流</a></h1>
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>

            <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->
    <!--start-top-serch-->
    <div id="search">
        <input type="text" placeholder="Search here..."/>
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <!--close-top-serch-->
    <?php
        $controllerId = Yii::$app->controller->id;
        $actionId = Yii::$app->controller->action->id;
    ?>
    <!--sidebar-menu-->
    <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard<?=Yii::$app->controller->action->id?></a>
        <ul>
            <li <?php if($controllerId=='workflow-log' && $actionId=='bar-chart') {echo 'class="active"';} ?> ><a href="/workflow-log/bar-chart"><i class="icon icon-home"></i> <span>柱状图</span></a> </li>
            <li <?php if($controllerId=='workflow-log' && $actionId=='line-chart') {echo 'class="active"';} ?>> <a href="/workflow-log/line-chart"><i class="icon icon-signal"></i> <span>线状图</span></a> </li>
            <li <?php if($controllerId=='workflow-log' && $actionId=='index') {echo 'class="active"';} ?>> <a href="/workflow-log/index"><i class="icon icon-inbox"></i> <span>日志列表</span></a> </li>
            <li <?php if($controllerId=='workflow-log' && $actionId=='custom-bar-chart') {echo 'class="active"';} ?>><a href="/workflow-log/custom-bar-chart"><i class="icon icon-th"></i> <span>客户柱状图</span></a></li>

            <li <?php if($controllerId=='custom-xj' ) {echo 'class="active"';} ?>><a href="/custom-xj/index"><i class="icon icon-fullscreen"></i> <span>客户巡检</span></a></li>
            <li <?php if($controllerId=='xun-jian-type' ) {echo 'class="active"';} ?>><a href="/xun-jian-type/index"><i class="icon icon-tint"></i> <span>巡检类别</span></a></li>
            <li <?php if($controllerId=='custom') {echo 'class="active"';} ?>><a href="/custom/index"><i class="icon icon-pencil"></i> <span>客户列表</span></a></li>

        </ul>
    </div>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="/index.php/workflow-log/bar-chart" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 主页</a></div>
        </div>
        <!--End-breadcrumbs-->
        <div class="container">
            <?= $content ?>
        </div>
    </div>

    <!--end-main-container-part-->

    <!--Footer-part-->

    <div class="row-fluid">
        <div id="footer" class="span12"> 2016 &copy;明源云<a href="#" target="_blank" title="工作流">工作流</a> - Collect from <a href="#" title="工作流" target="_blank">产品</a> </div>
    </div>

    <!--end-Footer-part-->




    <script type="text/javascript">

        var ul = $('#sidebar > ul');

        // === Resize window related === //
        $(window).resize(function()
        {
            if($(window).width() > 479)
            {
                ul.css({'display':'block'});
                $('#content-header .btn-group').css({width:'auto'});
            }
            if($(window).width() < 479)
            {
                ul.css({'display':'none'});
                fix_position();
            }
            if($(window).width() > 768)
            {
                $('#user-nav > ul').css({width:'auto',margin:'0'});
                $('#content-header .btn-group').css({width:'auto'});
            }
        });

        if($(window).width() < 468)
        {
            ul.css({'display':'none'});
            fix_position();
        }

        if($(window).width() > 479)
        {
            $('#content-header .btn-group').css({width:'auto'});
            ul.css({'display':'block'});
        }

        // === Fixes the position of buttons group in content header and top user navigation === //
        function fix_position()
        {
            var uwidth = $('#user-nav > ul').width();
            $('#user-nav > ul').css({width:uwidth,'margin-left':'-' + uwidth / 2 + 'px'});

            var cwidth = $('#content-header .btn-group').width();
            $('#content-header .btn-group').css({width:cwidth,'margin-left':'-' + uwidth / 2 + 'px'});
        }
    </script>


</body>
</html>
<?php $this->endPage() ?>
