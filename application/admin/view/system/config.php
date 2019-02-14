{extend name="public:form" /}
{block name="menu"}基础设置{/block}
{block name='action'}{:url('update')}{/block}
{block name="form"}
    <div class="form-group">
        <label class="col-sm-2 control-label">首页背景图片</label>
        <div class="col-sm-4" style="position: relative;">
        	<input type="text" class="form-control bg_pic" readonly="readonly" name="bg_pic" value="{$webinfo['bg_pic']}" />
            <input type="file" style="display: none;" class="form-control uploadfile" value="{$webinfo['bg_pic']}" name="file" />
            <button class="btn selectfile" type="button" style="position: absolute;right:-50px;top:0px;">上传</button>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="col-sm-2 control-label"></label>
    	<div class="col-sm-4">
    		<img src="{$webinfo['bg_pic']}" class="div-img" width="100" alt="" />
    	</div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">微信APPID</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['appid']}" name="appid">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">AppSecret</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['appSecret']}" name="appSecret">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">短信签名</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['SignName']}" name="SignName">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">AccessKeyId</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['AccessKeyId']}" name="AccessKeyId">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">AccessKeySecret</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['AccessKeySecret']}" name="AccessKeySecret">
        </div>
    </div>
        
   <div class="form-group">
        <label class="col-sm-2 control-label">初始用户数</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" {if condition="isset($webinfo['init_count'])"}value="{$webinfo['init_count']}"{/if} name="init_count">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">关注二维码</label>
        <div class="col-sm-4" style="position: relative;">
        	<input type="text" class="form-control qrcode" readonly="readonly" name="qrcode" {if condition="isset($webinfo['qrcode'])"}value="{$webinfo['qrcode']}"{/if} />
            <input type="file" style="display: none;" class="form-control uploadqrcode" {if condition="isset($webinfo['qrcode'])"}value="{$webinfo['qrcode']}"{/if} name="uploadqrcode" />
            <button class="btn selectQrcode" type="button" style="position: absolute;right:-50px;top:0px;">上传</button>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="col-sm-2 control-label"></label>
    	<div class="col-sm-4">
    		<img {if condition="isset($webinfo['qrcode'])"}src="{$webinfo['qrcode']}"{/if} class="qrcode-img" width="100" alt="" />
    	</div>
    </div>
    
         <div class="form-group">
        <label class="col-sm-2 control-label">关注引导语</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" {if condition="isset($webinfo['sub_msg'])"}value="{$webinfo['sub_msg']}"{/if} name="sub_msg">
        </div>
    </div>
    
     <div class="form-group">
        <label class="col-sm-2 control-label">微信分享标题</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['share_title']}" name="share_title">
        </div>
    </div>
    
         <div class="form-group">
        <label class="col-sm-2 control-label">微信分享描述</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['share_desc']}" name="share_desc">
        </div>
    </div>
    
     <div class="form-group">
        <label class="col-sm-2 control-label">公告</label>
        <div class="col-sm-4">
            <textarea name="notice" class="form-control" style="height:150px;resize: none;">{$webinfo['notice']}</textarea>
        </div>
    </div>
{/block}
{block name="js"}
<script type="text/javascript">
$(function(){
	$('.uploadfile').change(function(){
		$('form').ajaxSubmit({
			url: "{:url('upload_file')}",
			data:{flag:'uploadfile'},
			success: function(res){
				$('.bg_pic').val(res.path);
				$('.div-img').attr('src',res.path);
			}
		});
	});
	$('.uploadqrcode').change(function(){
		$('form').ajaxSubmit({
			url: "{:url('upload_file')}",
			data:{flag:'uploadqrcode'},
			success: function(res){
				$('.qrcode').val(res.path);
				$('.qrcode-img').attr('src',res.path);
			}
		});
	});
	$('.selectfile').click(function(){
		$('.uploadfile').click();
	});
	$('.selectQrcode').click(function(){
		$('.uploadqrcode').click();
	});
	$('form').submit(function(){
		$(this).ajaxSubmit({
			success: function(response){
    	        if (!response.code) {
    	            toastr.warning(response.msg);
    	        } else {
    	            toastr.success(response.msg);
    	        }
			}
		});
		return false;
	});
});
</script>
{/block}