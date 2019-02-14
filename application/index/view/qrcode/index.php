{extend name="public/base" /}
{block name="head"}
<style type="text/css">
body{background:#fff;}
.weui-cell__bd p{color: #282828;font-size: 15px;}
.btnWrap{width: 90%;margin:15px auto;}
.exitBtn{width: 100%;background: #e45050;height: 45px;line-height: 45px;font-size: 15px;}
a,a:hover,a:active{color: #282828;text-decoration: none;}
.weui-form-preview:before{border:none;}
.weui-form-preview__label{text-align:right;text-align-last:right;min-width:5em;}
.weui-form-preview__value{text-align:left;}
label{font-weight:normal;}
#mess_share{margin:15px 0;}
#share_1{float:left;width:49%;}
#share_2{float:right;width:49%;}
#mess_share img{width:22px;height:22px;}
#cover{display:none;position:absolute;left:0;top:0;z-index:18888;background-color:#000000;opacity:0.7;}
#guide{display:none;position:absolute;right:18px;top:5px;z-index:19999;}
#guide img{width:260px;height:180px;}
</style>
<script type="text/javascript" src="__JS__/jquery.qrcode.min.js"></script>
{/block}
{block name="main"}
<div class="page_topbar">
    <a href="/" class="back"><i class="fa fa-angle-left"></i></a>
    <div class="title">{if condition="isset($title)"}{$title}{/if}</div>
</div>
<p style="padding:10px;text-align:center;">{$webinfo['sub_msg']}</p>
<p style="padding-left:10px;padding-right:10px;text-align:center;">长按识别关注</p>
<div class="weui-cells" style="margin-top:0px">
<img id="imgOne" src="<?php echo $webinfo['qrcode'];?>" style="margin:10px auto;display:block;"/>
</div>	
<div class="btnWrap">
	<a href="/" class="u-btn exitBtn">关闭</a>
</div>

{/block}
{block name="footer"}
<script type="text/javascript">

</script>
{include file="public/footer_share" /}
{/block}