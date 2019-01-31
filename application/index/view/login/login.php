{extend name="public/base" /}
{block name="head"}
<style type="text/css">
    body {margin:0px; background:#fff; font-family:'微软雅黑'; -moz-appearance:none;}
    .info_main {height:auto;  background:#fff; margin-top:30px;}
    .info_main .line {margin:0 3% 15px 3%; height:40px; border:1px solid #e8e8e8; line-height:40px; color:#999;padding: 2px 0;box-sizing: content-box;}
    .info_main .line .title {height:40px; width:40px; line-height:40px; color:#444; float:left; font-size:16px;}
    .info_main .line .title img{width: 30px;height: 30px;vertical-align: top;padding: 2px 0 0 5px;box-sizing: content-box;}
    .info_main .line .info { width:100%;float:right;margin-left:-40px; }
    .info_main .line .inner { margin-left:40px; }
    .info_main .line .inner input {height:38px; width:100%;display:block; padding:0px; margin:0px; border:0px; float:left; font-size:16px;color: #aeaeae;background: #fff;outline: none;}
    .info_main .line .inner .user_sex {line-height:40px;}
    .select { border:1px solid #ccc;height:25px;}
    .info_sub {height:44px; margin:14px 3%; background:#ff644e; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}
    .forget,.register{color: #999;padding-right: 3%;float: right;}
    .register{float: left;padding-left: 3%;}
</style>
<script src="__JS__/mobiscroll.core-2.5.2.js" type="text/javascript"></script>
<script src="__JS__/mobiscroll.core-2.5.2-zh.js" type="text/javascript"></script>
<link href="__CSS__/mobiscroll.core-2.5.2.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/mobiscroll.animation-2.5.2.css" rel="stylesheet" type="text/css" />
<script src="__JS__/mobiscroll.datetime-2.5.1.js" type="text/javascript"></script>
<script src="__JS__/mobiscroll.datetime-2.5.1-zh.js" type="text/javascript"></script>
<script src="__JS__/mobiscroll.android-ics-2.5.2.js" type="text/javascript"></script>
<link href="__CSS__/mobiscroll.android-ics-2.5.2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__JS__/cascade.js"></script>
{/block}
{block name="main"}
<div id="container"></div>
<script id="member_info" type="text/html">
    <div class="page_topbar">
    <a href="javascript:;" class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></a>
    <div class="title">{$title}</div>
</div>
    <div class="info_main">
        <div class="line"><div class="title"><img src="__IMG__/uname.png" alt=""></div><div class='info'><div class='inner'><input type="text" id='mobile' placeholder="请输入您的手机号码"  value="" /></div></div></div>
        <div class="line"><div class="title"><img src="__IMG__/upsw.png" alt=""></div><div class='info'><div class='inner'><input type="password" id='password' placeholder="请输入您的密码"  value="" /></div></div></div>
    </div>
    
    <div class="info_sub">登录</div>
    <div>
      <div class="register">注册账号</div>
      <div class="forget">忘记密码</div>
    </div>
</script>
{/block}
{block name="footer"}
<script language="javascript">
    require(['tpl', 'core'], function(tpl, core) {
        $('#container').html(tpl('member_info'));
            $('.register').click(function(){
                location.href = "{:url('register')}";
            });
            $('.forget').click(function(){
              location.href = "{:url('find')}";
            });
            
            $('.info_sub').click(function() {
                  if(!$('#mobile').isMobile()){
                       core.tip.show('请输入正确手机号码!');
                       return;
                  }
                  if( $('#password').isEmpty()){
                       core.tip.show('请输入密码!');
                       return;
                  }
                    //发送ajax
                    core.json('{:url()}', {
                      //通过ajax传递给后台的数据
                       'memberdata':{
                            'mobile': $('#mobile').val(),
                            'password': $('#password').val()
                           } 
                           //json用于接收后台返回的数据
                       }, function(json) {
                          //json.status是后台json传递过来的数组中的一个索引值
                        if(json.code==1){
                             //表示一个提示语句（固定格式)
                             core.tip.show('登录成功');
                             window.location.href='/';
                        }
                        else{
                          //表示一个提示，登录失败之后就会出现
                            core.tip.show('用户不存在或密码错误!');
                        }
                    },true,true);
                });
    })
</script>
<script id='tpl_show_message' type='text/html'>
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
<span style='display:none'></span>
 <script>
     require(['http://res.wx.qq.com/open/js/jweixin-1.0.0.js'],function(wx){
          
             
        window.shareData = {"title":"\u521b\u5ba2\u5ba2\u670d","imgUrl":"","desc":"\u5546\u57ce\u7b80\u4ecb","link":"{$domain}"};
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