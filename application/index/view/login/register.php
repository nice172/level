{extend name="public/base" /}
{block name="head"}
<style type="text/css">
    body {margin:0px; background:#fff; font-family:'微软雅黑'; -moz-appearance:none;}
    .info_main {height:auto;  background:#fff; margin-top:14px;}
    .info_main .line {margin:0 10px; height:40px; line-height:40px; color:#999;position: relative;}
    .info_main .line .title {height:40px; width:80px; line-height:40px; color:#444; float:left; font-size:16px;}
    .info_main .line .info { width:100%;float:right;margin-left:-80px; }
    .info_main .line .inner { margin-left:80px; }
    .info_main .line .inner input {height:40px; display:block; padding:0px; margin:0px; border:0px; float:left; font-size:16px;}
    .info_main .line .inner .user_sex {line-height:40px;}
    /*.register {height:44px; margin:14px 5px; background:#31cd00; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}*/
    /*.info_sub {height:44px; margin:14px 5px; background:#31cd00; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}*/
    .nobindmobile {clear:both;height:44px; margin:14px 5px; background:#ccc; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}
    .select { border:1px solid #ccc;height:25px;}
    .info_main {height:auto;  background:#fff; margin-top:30px;}
    .info_main .line {margin:0 3% 15px 3%; height:40px; border:1px solid #e8e8e8; line-height:40px; color:#999;padding: 2px 0;box-sizing: content-box;position: relative;}
    .info_main .line .title {height:40px; width:40px; line-height:40px; color:#444; float:left; font-size:16px;}
    .info_main .line .title img{width: 30px;height: 30px;vertical-align: top;padding: 2px 0 0 5px;box-sizing: content-box;}
    .info_main .line .info { width:100%;float:right;margin-left:-40px; }
    .info_main .line .inner { margin-left:40px; }
    .info_main .line .inner input {height:38px; width:100%;display:block; padding:0px; margin:0px; border:0px; float:left; font-size:16px;color: #aeaeae;background: #fff;outline: none;}
    .info_main .line .inner .user_sex {line-height:40px;}
    .info_sub {height:44px; margin:14px 3%; background:#ff644e; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}
    /*.info_sub {height:44px; margin:14px 5px; background:#ccc; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}*/
    .forget,.register{color: #999;padding-right: 3%;float: right;}
    .nobindmobile {clear:both;height:44px; margin:14px 5px; background:#ccc; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}
    .select { border:1px solid #ccc;height:25px;}
    #btnSendCode{position: absolute;right: 0;top: 0;background:#ff644e;border: none;width: 25%;height: 100%;color: #fff;margin-right: 3%;
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
    <a href="javascript:history.back();" class="back"><i class="fa fa-angle-left"></i></a>
    <div class="title">{$title}</div>
</div>
    <div class="info_main">
        <div class="line"><div class="title"><img src="__IMG__/uname.png" alt=""></div><div class='info'><div class='inner'><input type="text" id="username" readonly="readonly" placeholder="请输入推荐人" {if condition="isset($recommend_user)"}value="{$recommend_user}"{/if} /></div></div></div>
        <div class="line"><div class="title"><img src="__IMG__/uname.png" alt=""></div><div class='info'><div class='inner'><input type="text" id="mobile" placeholder="请输入商家手机号码"  value="" /></div></div></div>
        <div class="line"><div class="title"><img src="__IMG__/uname.png" alt=""></div><div class='info'><div class='inner'><input type="text" id="wechat" placeholder="请输入商家微信号"  value="" /></div></div></div>
        <div class="line"><div class="title"><img src="__IMG__/uname.png" alt=""></div><div class='info'><div class='inner'><input type="text" id="truename" placeholder="请输入商家姓名"  value="" /></div></div></div>
        <!--<div style="position: relative;">
          <div class="line" style="width: 67%;"><div class="title"><img src="__IMG__/tel.png" alt=""></div><div class='info'><div class='inner'><input type="text" id='code' placeholder="请输入验证码"  value="" /></div></div></div>
          <input id="btnSendCode" type="button" value="发送验证码"  />
        </div>-->
        <div class="line"><div class="title"><img src="__IMG__/upsw.png" alt=""></div><div class='info'><div class='inner'><input type="password" id="password" placeholder="请输入商家登录初始密码"  value="" /></div></div></div>
         <div class="line"><div class="title"><img src="__IMG__/upsw.png" alt=""></div><div class='info'><div class='inner'><input type="password" id="cpassword" placeholder="请确认密码"  value="" /></div></div></div>
    </div>
    <div class="info_sub">提交</div>
    <div>
      <div class="forget"><a href="javascript:;">已有帐号>></a></div>
    </div>
</script>
<script type="text/javascript">
    require(['tpl', 'core'], function(tpl, core) {
        $('#container').html(tpl('member_info'));

        $('.forget').click(function(){
            location.href = "{:url('index')}";
          });
        	/*
            var InterValObj; //timer变量，控制时间
            var count = 60; //间隔函数，1秒执行
            var curCount;//当前剩余秒数
            $('#btnSendCode').click(function(){
                if(!$('#mobile').isMobile()){
                    core.tip.show('请输入正确手机号码!');
                    return;
                }
                curCount = count;
            　　
                 core.json('member/sendcode', {
                       'mobile': $('#mobile').val(),
                       'op':'forgetcode'
                       }, function(json) {
                        if(json.status==1){
                             //设置button效果，开始计时
                             $("#btnSendCode").attr("disabled", "true");
                             $("#btnSendCode").val(curCount + "秒后重新获取验证码");
                             InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                        　　  				//向后台发送处理数据 
                        }else{
                            core.tip.show(json.result);
                        }
                    },true);
            });
            //timer处理函数
            function SetRemainTime() {
                if (curCount == 0) {                
                    window.clearInterval(InterValObj);//停止计时器
                    $("#btnSendCode").removeAttr("disabled");//启用按钮
                    $("#btnSendCode").val("重新发送验证码");
                }
                else {
                    curCount--;
                    $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");
                }
            }
            */
            $('.info_sub').click(function() {
            	if($('#username').isEmpty()){
                    core.tip.show('请输入推荐人!');
                    return;
               }
                  if(!$('#mobile').isMobile()){
                       core.tip.show('请输入正确的手机号码!');
                       return;
                  }
                  if($('#wechat').isEmpty()){
                      core.tip.show('请输入商家微信号!');
                      return;
                 }
                  if($('#truename').isEmpty()){
                      //core.tip.show('请输入商家姓名!');
                      //return;
                 }
                  /*
                  if( $('#code').isEmpty()){
                       core.tip.show('请输验证码!');
                       return;
                  }
                  */
                  if( $('#password').isEmpty()){
                       core.tip.show('请输入商家密码!');
                       return;
                  }
                  if( $('#cpassword').isEmpty()){
                       core.tip.show('请再次输入密码!');
                       return;
                  }
                  if( $('#cpassword').val() != $('#password').val()){
                       core.tip.show('两次密码不一致!');
                       return;
                  }
                  //检验验证码
                  /*
                    core.json('member/sendcode', {
                        'code': $('#code').val(),
                        'op':'checkcode'
                       }, function(json) {
   
                      if(json.status == 0)
                      {
                       core.tip.show(json.result.msg);
                       return;
                      }
                        //register post
                    },true,true);*/
                  core.json("{:url()}", {
                      'memberdata':{
                           'q': '{$q}',
                           'recommend_name': $('#username').val(),
                           'mobile': $('#mobile').val(),
                           'wechat': $('#wechat').val(),
                           'truename': $('#truename').val(),
                           'password': $('#password').val(),
                           'cpassword': $('#cpassword').val()
                          }
                      }, function(json) {
                    	  core.tip.show(json.msg);
                       if(json.code==1){
                          setTimeout(() => {window.location.href=json.url;},1500);
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
{/block}
{block name="footer"}

{/block}