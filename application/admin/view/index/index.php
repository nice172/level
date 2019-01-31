<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>后台管理</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/animate.css" rel="stylesheet">
    <link href="__CSS__/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="text-muted text-xs block">{$loginUser['user_name']}<b class="caret"></b></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="J_menuItem" href="{:url('admin/edit', ['id' => $loginUser['id']])}">个人资料</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{:url('Login/logout')}">安全退出</a>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">LEVEL</div>
                </li>
                <li>
                    <a href="{:url('index/index')}">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">主页</span>
                    </a>
                </li>
                {foreach $permissions as $key=>$permission}
                    <li>
                        <a class="J_menuItem" href="{$permission['url']}" data-index="{$key}">
                            <i class="{$permission['icon']}"></i>
                            <span class="nav-label">{$permission['title']}</span>
                        </a>
                    </li>
                {/foreach}
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <!-- <ul class="nav navbar-top-links navbar-right">
                     <li class="dropdown">
                         <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                             <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                         </a>
                         <ul class="dropdown-menu dropdown-messages">
                             <li class="m-t-xs">
                                 <div class="dropdown-messages-box">
                                     <a href="profile.html" class="pull-left">
                                         <img alt="image" class="img-circle" src="__IMG__/a7.jpg">
                                     </a>
                                     <div class="media-body">
                                         <small class="pull-right">46小时前</small>
                                         <strong>小四</strong> 这个在日本投降书上签字的军官，建国后一定是个不小的干部吧？
                                         <br>
                                         <small class="text-muted">3天前 2014.11.8</small>
                                     </div>
                                 </div>
                             </li>
                             <li class="divider"></li>
                             <li>
                                 <div class="dropdown-messages-box">
                                     <a href="profile.html" class="pull-left">
                                         <img alt="image" class="img-circle" src="__IMG__/a4.jpg">
                                     </a>
                                     <div class="media-body ">
                                         <small class="pull-right text-navy">25小时前</small>
                                         <strong>国民岳父</strong> 如何看待“男子不满自己爱犬被称为狗，刺伤路人”？——这人比犬还凶
                                         <br>
                                         <small class="text-muted">昨天</small>
                                     </div>
                                 </div>
                             </li>
                             <li class="divider"></li>
                             <li>
                                 <div class="text-center link-block">
                                     <a class="J_menuItem" href="mailbox.html">
                                         <i class="fa fa-envelope"></i> <strong> 查看所有消息</strong>
                                     </a>
                                 </div>
                             </li>
                         </ul>
                     </li>
                     <li class="dropdown">
                         <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                             <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                         </a>
                         <ul class="dropdown-menu dropdown-alerts">
                             <li>
                                 <a href="mailbox.html">
                                     <div>
                                         <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                         <span class="pull-right text-muted small">4分钟前</span>
                                     </div>
                                 </a>
                             </li>
                             <li class="divider"></li>
                             <li>
                                 <a href="profile.html">
                                     <div>
                                         <i class="fa fa-qq fa-fw"></i> 3条新回复
                                         <span class="pull-right text-muted small">12分钟钱</span>
                                     </div>
                                 </a>
                             </li>
                             <li class="divider"></li>
                             <li>
                                 <div class="text-center link-block">
                                     <a class="J_menuItem" href="notifications.html">
                                         <strong>查看所有 </strong>
                                         <i class="fa fa-angle-right"></i>
                                     </a>
                                 </div>
                             </li>
                         </ul>
                     </li>
                 </ul>-->
             </nav>
         </div>
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a></li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a></li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a></li>
                </ul>
            </div>
            <a href="{:url('login/logout')}" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="{:url('index/main')}" frameborder="0" data-id="index_v1.html" seamless></iframe>
        </div>
        <div class="footer">
            <div class="pull-right">&copy; 2014-2015 <a href="javascript:;" target="_blank">{:config('admin.title')}</a>
            </div>
        </div>
    </div>
    <!--右侧部分结束-->
</div>

<!-- 全局js -->
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__PLUGINS__/js/metisMenu/jquery.metisMenu.js"></script>
<script src="__PLUGINS__/js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="__PLUGINS__/js/layer/layer.min.js"></script>

<!-- 自定义js -->
<script src="__JS__/hplus.js?v=4.1.0"></script>
<script type="text/javascript" src="__JS__/contabs.js"></script>

<!-- 第三方插件 -->
<script src="__PLUGINS__/js/pace/pace.min.js"></script>

</body>

</html>