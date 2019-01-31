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
</style>
<script type="text/javascript" src="__JS__/jquery.qrcode.min.js"></script>
{/block}
{block name="main"}
{include file="public/topbar" /}
<div class="weui-cells" style="margin-top:0px">
<div class="weui-form-preview">
  <div class="weui-form-preview__bd">
    <div class="weui-form-preview__item">
      <label class="weui-form-preview__label">编号：</label>
      <span class="weui-form-preview__value">{$user['id']}</span>
    </div>
    <div class="weui-form-preview__item">
      <label class="weui-form-preview__label">姓名：</label>
      <span class="weui-form-preview__value">{$user['username']}</span>
    </div>
    <div class="weui-form-preview__item">
      <label class="weui-form-preview__label">会员等级：</label>
      <span class="weui-form-preview__value">{$user['level']}</span>
    </div>
  </div>
  
</div>

<!-- <div id="divOne"></div> -->
<img id="imgOne" src="{$qrcode}" style="margin:10px auto;display:block;"/>

</div>
		
<div class="btnWrap">
	<div class="u-btn exitBtn">分享</div>
</div>
{/block}
{block name="footer"}
<script type="text/javascript">
$(function(){

// 	$("#code").qrcode({ 
// 	    render: "table", //table方式 
// 	    width: 200, //宽度 
// 	    height:200, //高度 
// 	    text: "www.helloweba.com" //任意内容 
// 	});
});
</script>
{include file="public/footer_share" /}
{/block}