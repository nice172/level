<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
    <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__CSS__/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/animate.css" rel="stylesheet">
    <link href="__CSS__/style.css?v=4.1.0" rel="stylesheet">
    <link href="__PLUGINS__/css/toastr/toastr.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
    <style type="text/css">.middle-box{padding-top:150px;}</style>
</head>
<body class="gray-bg">
<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <h3>欢迎使用 {:config('admin.title')}</h3>
        <form class="m-t" role="form" action="{:url('login')}" method="post">
        {:token()}
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="用户名" >
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="密码" >
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
            <p class="text-muted text-left">
                <label for="remember">
                <input type="checkbox" id="remember" name="remember" value="1" style="vertical-align: sub;"/>记住登录信息</label>
            </p>
        </form>
    </div>
</div>

<!-- 全局js -->
<script type="text/javascript" src="__JS__/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script type="text/javascript" src="__JS__/jquery.form.js"></script>
<script type="text/javascript" src="__PLUGINS__/js/toastr/toastr.min.js"></script>
<script type="text/javascript">
    toastr.options = {
        positionClass: "toast-top-center",
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "2000",
        extendedTimeOut: "1000",
    };

    var remember = 0;
    $('form').submit(function(){
    	$(this).ajaxSubmit({
    		data:{remember: remember},
    		success: function(response){
    	        if (!response.code) {
    	            toastr.warning(response.msg);
    	        } else {
    	            toastr.success(response.msg);
    	            setTimeout(function(){
    	                window.location.href = response.url
    	            }, response.wait * 1000);
    	        }
    		},
    		error: function(msg){
    			toastr.error(msg.statusText);
    		},
    		complete: function(xhr,status,res){},
    	});
    	return false;
    });

</script>
</body>
</html>