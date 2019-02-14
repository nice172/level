{extend name="public/base" /}
{block name="head"}
<style type="text/css">
body {margin:0px; background:#f2f2f2; font-family:'微软雅黑'; -moz-appearance:none;}

input{outline: none!important;}
.hs {
  font-family:"iconfont" !important;
  font-style:normal;
  -webkit-font-smoothing: antialiased;
  -webkit-text-stroke-width: 0.2px;
  -moz-osx-font-smoothing: grayscale;
}
.hs-xuan:before { content: "\e739"; }
.hs-wei:before { content: "\e651"; }
.hs-xuanzhong:before { content: "\d622"; }
.info_main {height:auto;  background:#fff; margin-top:14px; border-bottom:1px solid #eaeaea; border-top:1px solid #e8e8e8;}
.info_main .line {margin:0 10px; height:50px; border-bottom:1px solid #e8e8e8;/*border-top:10px solid #f2f2f2;*/ line-height:40px; color:#999;}
.info_main .my_line{height:60px;border-top:10px solid #f2f2f2;margin:0px 0 0 0;padding:0 10px;}
.info_main .line .title {height:50px; width:90px; line-height:50px; color:#444; float:left; font-size:16px;padding-left:25px }
.info_main .line .info { width: 100%; float: right; margin-left: -100px; height: 50px; overflow: hidden; }
.info_main .line .inner { margin-left:100px;height: 48px;line-height: 48px; }
.info_main .line input {height:48px; width:100%;display:block; padding:0px; margin:0px; border:0px; float:left; font-size:16px;}
.info_main .line .inner .user_sex {line-height:40px;}
.info_sub {height:44px; margin:14px 5px; background:#e45050; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}
.info_main{margin-top: 0}
.select { border: 1px solid #f2f2f2; height: 30px; margin-top: 6px; line-height: 20px; background: #f2f2f2; color: #656565 ; padding: 0 5px; border-radius: 3px; }
.page_topbar{background:#fff;}
.home{position: absolute;right: 15px;top: 0;color: #000}

.line .pic { width:100%;height:50px;border-radius:5px;color:#999;padding:3px;line-height:35px;font-size:13px;padding-left:10px;}
    .line .pic span {float:left;width:150px;}
    .line .pic .plus {left:-100px;padding:0 0 0 100px;position: absolute; margin-right:0px; width:100%;height:30px; color:#dedede; font-size:18px;line-height:30px;text-align:center;z-index: 100}
    .line .pic .plus i { right:-100px;top:7px;}
    .line .pic .images { width:auto;}
    .line .pic .images .img { float:left; position:relative;width:30px;height:30px;border:1px solid #e9e9e9;margin-right:5px;}
   .line .pic .images .img img { position:absolute;top:0; width:100%;height:100%;}
    .line .pic .images .img .minus { position:absolute;color:red;width:8px;height:12px;top:-15px;right:-1px;}
    a:hover{
      text-decoration:none;
    }
</style>
{/block}
{block name="main"}
<div id="container">
  <div class="page_topbar">
    <a class="back" onclick="history.back()" style="line-height: 40px;">
        <i class="iconfont arrow" style="color: #282828;"></i>
     </a>
    <div class="title" style=" color: #282828;">我的资料</div>
  <a href="{:url('index')}">
      <i class="iconfont  headerRightIcon" style="color: #282828;"></i>
  </a>
</div>
  <div style="margin:10px;color:#999">账号设置</div>
    <div class="info_main">
            <div class="line"><div class="title">编号</div><div class="info">
        <div class="inner"><input type="text" readonly="readonly" value="{$user_id}"></div></div></div>
        <div class="line"><div class="title">姓名</div><div class="info">
        <div class="inner"><input type="text" id="realname" placeholder="请输入您的姓名" value="{$user['username']}"></div></div></div>
        <div class="line my_line"><div class="title">微信号</div><div class="info">
        <div class="inner">
        <input type="text" id="weixin" placeholder="请输入微信号" value="{$user['wechat']}">
        </div></div></div>
    </div><div class="info_sub">确认修改</div>
{/block}
{block name="footer"}
<script language="javascript">

    require(['tpl', 'core'], function(tpl, core) {
    	$('.info_sub').click(function() {
            if($(this).attr('saving')=='1')
            {
                return;
            }

               if( $('#realname').isEmpty()){
                   core.tip.show('请输入姓名!');
                   return;
               }

              if( $('#weixin').isEmpty()){
                   core.tip.show('请输入微信号!');
                   return;
               }
          
           $(this).html('正在处理...').attr('saving',1);
            core.json('{:url()}', {
               'memberdata':{
                    'realname': $('#realname').val(),
                    'weixin': $('#weixin').val(),
               }
            }, function(json) {
               
                if(json.code==1){
                     core.tip.show('保存成功');
                    
            }
                else{
                    $('.info_sub').html('确认修改').removeAttr('saving');
                    core.tip.show(json.msg);
                }
            },true,true);
        });
    })
</script>
<style type="text/css">
    .num1{right: 10px;top:3px;width: 7px;height: 7px;}
    footer#footer-nav{bottom: -1px;}
    footer#footer-nav .menu-list li.active a > span{color: #e45050;}
    footer#footer-nav .menu-list li.active a > i{color: #e45050;}
    footer#footer-nav{    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fff), color-stop(1, #fff));}
    footer#footer-nav{height: 57px !important}

    .f-tac{text-align: center;} 
    .weui-flex .weui-flex__item i,.weui-flex .weui-flex__item .ftext{color: #747474;line-height: 17px;font-size: 14px;}
    .weui-flex .weui-flex__item a.active i,.weui-flex .weui-flex__item a.active .ftext{color: #e45050;}
    .weui-flex .weui-flex__item a .iconfont{font-size: 25px;line-height: 25px;}
    .weui-flex .weui-flex__item a {padding: 6px 0;display: block;}
    .weui-flex .weui-flex__item a:hover,.weui-flex .weui-flex__item a:active{text-decoration: none;}
</style>

<div style="height:50px; width:100%;margin:0;padding:0;float:left;display:block;"></div>
        <style type="text/css">
                footer#footer-nav .menu-list li { width:20%}
            </style>
    
    
    <script id="tpl_show_message" type="text/html">
	<style>
		body{ background: #fff; }
	</style>
	<div class="sweet-alert" style="display:block;">
        <%if type=='error'%><div class="icon error animateErrorIcon" style="display: block;"><span class="x-mark animateXMark"><span class="line left"></span><span class="line right"></span></span></div><%/if%>
        <%if type=='warning'%><div class="icon warning pulseWarning" style="display: block;"><span class="body pulseWarningIns"></span><span class="dot pulseWarningIns"></span></div><%/if%>
        <%if type=='success'%><div class="icon success animate" style="display: block;"><span class="line tip animateSuccessTip"></span><span class="line long animateSuccessLong"></span><div class="placeholder"></div><div class="fix"></div></div><%/if%>
        <div class="info"><%message%><%if url%><br><span>如果您的浏览器没有自动跳转请点击此处</span><%/if%></div>
        
        <div class="sub" 
             <%if url%>
                    onclick="location.href='<%url%>'"
             <%else%>
                    <%if js%>
                        onclick="<%js%>"
                    <%else%>
                        onclick="history.back()"
                    <%/if%>
             <%/if%>
             >
        <%if type=='success'%><div class="green">确认</div><%/if%>
        <%if type=='warning'%><div class="grey">确认</div><%/if%>
        <%if type=='error'%><div class="red">确认</div><%/if%>
    </div>
</script>
<span style="display:none"></span>
 <script>
     require(['http://res.wx.qq.com/open/js/jweixin-1.0.0.js'],function(wx){
        window.shareData = {"title":"\u521b\u5ba2\u5ba2\u670d","imgUrl":"","desc":"\u5546\u57ce\u7b80\u4ecb","link":""};
        // console.log(window.shareData);
		jssdkconfig = null || { jsApiList:[] };
	    	    jssdkconfig.debug =false;
		jssdkconfig.jsApiList = ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','showOptionMenu','scanQRCode','chooseWXPay'];
		wx.config(jssdkconfig);
		wx.ready(function () {
			wx.showOptionMenu();
			wx.onMenuShareAppMessage(window.shareData);
			wx.onMenuShareTimeline(window.shareData);
			wx.onMenuShareQQ(window.shareData);
			wx.onMenuShareWeibo(window.shareData);
       

                                                               
	
	            $("#a_logo1").click(function(){
	          
	            wx.scanQRCode({
	                needResult: 0, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
	                scanType: ["qrCode","barCode"], // 可以指定扫二维码还是一维码，默认二者都有
	                success: function (res) {
	                var result = res.resultStr; // 当needResult 为 1 时，扫码返回的结果
	            }
	            });
	        });
	
	      });

    
	});
</script>
{/block}