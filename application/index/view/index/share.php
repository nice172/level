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
{include file="public/topbar" /}

{if condition="$auth==1"}
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
      <span class="weui-form-preview__value">{$user['level_text']}</span>
    </div>
  </div>
  
</div>

<!-- <div id="divOne"></div> -->

<img id="imgOne" src="{$qrcode}" style="margin:10px auto;display:block;"/>
</div>	
<div class="btnWrap">
	<div class="u-btn exitBtn" onclick="_system._guide(true)">分享</div>
</div>
<div id="cover"></div>
<div id="guide"><img src="__IMG__/guide1.png"></div>
{else}

    <div style="padding-top:120px;width:190px;margin:0 auto;">
      <img style="width:60px;display:block;margin:0 auto;" src="__IMG__/Detailed.png" alt="">
      <span style="display:block;margin-top: 18px; text-align:center;">暂无分享权限~</span><br>
  	</div>

{/if}

{/block}
{block name="footer"}
<script type="text/javascript">
var _system={
        $:function(id){return document.getElementById(id);},
   _client:function(){
      return {w:document.documentElement.scrollWidth,h:document.documentElement.scrollHeight,bw:document.documentElement.clientWidth,bh:document.documentElement.clientHeight};
   },
   _scroll:function(){
      return {x:document.documentElement.scrollLeft?document.documentElement.scrollLeft:document.body.scrollLeft,y:document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop};
   },
   _cover:function(show){
      if(show){
     this.$("cover").style.display="block";
     this.$("cover").style.width=(this._client().bw>this._client().w?this._client().bw:this._client().w)+"px";
     this.$("cover").style.height=(this._client().bh>this._client().h?this._client().bh:this._client().h)+"px";
  }else{
     this.$("cover").style.display="none";
  }
   },
   _guide:function(click){
      this._cover(true);
      this.$("guide").style.display="block";
      this.$("guide").style.top=(_system._scroll().y+5)+"px";
      window.onresize=function(){_system._cover(true);_system.$("guide").style.top=(_system._scroll().y+5)+"px";};
  if(click){_system.$("cover").onclick=function(){
         _system._cover();
         _system.$("guide").style.display="none";
 _system.$("cover").onclick=null;
 window.onresize=null;
  };}
   },
   _zero:function(n){
      return n<0?0:n;
   }
}
</script>
{include file="public/footer_share" /}
{/block}