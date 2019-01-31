{extend name="public/base" /}
{block name="head"}
<style type="text/css">
body {
    font-family: Arial, Helvetica, Sans-Serif;
    background-color: #fff;
}

/*通用*/
/* common */
.flex {
    display: -webkit-box;      /* OLD - iOS 6-, Safari 3.1-6 */
    display: -moz-box;         /* OLD - Firefox 19- (buggy but mostly works) */
    display: -ms-flexbox;      /* TWEENER - IE 10 */
    display: -webkit-flex;     /* NEW - Chrome */
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;             /* NEW, Spec - Opera 12.1, Firefox 20+ */
}
/* 宽度随屏幕改变变化 */
.flex-1 {
    flex: 1;
    -webkit-flex: 1;
}

/* 垂直 水平 居中 */
.flex-center {
    justify-content: center;
    -webkit-justify-content: center;
    align-items: center;
    -webkit-align-items: center;
}
/* 垂直 居中 */
.flex-ver {
    align-items: center;
    -webkit-align-items: center;
}
.flex-col-ver{
    justify-content: center;
    -webkit-justify-content: center;
}
/* 换行 */
.flex-wrap{
    flex-wrap: wrap;
    -moz-flex-wrap:wrap;
    -webkit-flex-wrap: wrap;
}
.flex-reverse{
    flex-direction:row-reverse;
    -webkit-flex-direction:row-reverse;
    -moz-flex-direction:row-reverse;
}
/* flex 容器（设置为flex）内子元素向两边顶齐平分 */
.flex-jcsb {
    justify-content: space-between;
    -webkit-justify-content: space-between;
}
/*中间空白左右各一个*/
.flex-around{
    justify-content: space-between;
    -webkit-justify-content: space-between;
  }
/*平均分每个空间*/
.flex-pjf{
    justify-content: space-around;
    -webkit-justify-content: space-around;
}
.flex-end{
    align-items: flex-end;
    -webkit-align-items: flex-end;
}
.flex-end1{
    justify-content: flex-end;
    -webkit-justify-content: flex-end;
}

.flex-col {

    flex-direction: column;
    -webkit-flex-direction: column;

}
/*通用结束*/
.rucian_ny{
    width: 85%;
    margin: 0 auto;
    margin-top: 5%;
    padding: 10px;
    background-color: rgb(242, 242, 242);
    position: relative;
}
.rucian_sj{
    width: 80%;
    margin: 19% auto;
    text-align: center;
    font-size: 16px;
    color: rgb(26, 196, 199);
}

</style>
{/block}
{block name="main"}
<div class="page_topbar">
    <a href="javascript:;" class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></a>
    <div class="title">商家信息</div>
</div>

<div class="rucian_ny">
    <div>姓名：申振勇</div>
    <div>手机号码：18903121162</div>
    <div>微信号：weimidi</div>
    <!-- <div>会员等级：</div> -->
</div>

<div class="rucian_ny">
    <div>姓名：李元洁</div>
    <div>手机号码：18928903702</div>
    <div>微信号：dmliuyue</div>
    <!-- <div>会员等级：</div> -->
</div>

<div class="rucian_sj">审核中，请耐心等待！</div>
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
{/block}
{block name="footer"}

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