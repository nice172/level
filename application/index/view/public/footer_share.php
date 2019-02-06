<script>
     //require(['http://res.wx.qq.com/open/js/jweixin-1.0.0.js'],function(wx){
     require(['http://res.wx.qq.com/open/js/jweixin-1.4.0.js'],function(wx){
        window.shareData = {"title":"\u521b\u5ba2\u5ba2\u670d","imgUrl":"{if condition="isset($img)"}{$img}{/if}","desc":"\u5546\u57ce\u7b80\u4ecb","link":"{if condition="isset($link)"}{$link}{/if}"};
        // console.log(window.shareData);
		jssdkconfig = null || { jsApiList:[] };
	   	jssdkconfig.debug =false;
	   	jssdkconfig.appId = "<?php echo $signPackage["appId"];?>";
	   	jssdkconfig.timestamp = <?php echo $signPackage["timestamp"];?>;
	   	jssdkconfig.nonceStr = "<?php echo $signPackage["nonceStr"];?>";
	   	jssdkconfig.signature = "<?php echo $signPackage["signature"];?>";
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