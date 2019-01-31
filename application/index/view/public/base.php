<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>{if condition="isset($site_name)"}{$site_name}{/if}{if condition="isset($title)"}{$title}{/if}</title>
<link href="__CSS__/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="__JS__/require.js"></script>
<script type="text/javascript" src="__JS__/config.js?v=2"></script>
<script type="text/javascript" src="__JS__/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="__JS__/jquery.gcjs.js"></script>
<link rel="stylesheet" type="text/css" href="__CSS__/base.css">
<link rel="stylesheet" type="text/css" href="__CSS__/jquery-weui.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/weui.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/style.css">
<link rel="stylesheet"  type="text/css" href="__CSS__/font-awesome.min.css">
<link rel="stylesheet"  type="text/css" href="__CSS__/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/style1.css">
<link rel="stylesheet" type="text/css" href="__CSS__/main.css">
<link rel="stylesheet" type="text/css" href="__CSS__/iconfont.css">
<script type="text/javascript">
window.PointerEvent = undefined;
require(['core','tpl'],function(core,tpl){
    core.init({
    siteUrl: "{$domain}/",
    baseUrl: "{$domain}"
});
});
</script>
{block name="head"}{/block}
</head>
<body>
{block name="main"}{/block}
{block name="footer"}{/block}
</body>
</html>