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
        <label class="col-sm-2 control-label">客服姓名</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['kf_name']}" name="kf_name">
        </div>
    </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">客服电话</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['kf_tel']}" name="kf_tel">
        </div>
    </div>
     <div class="form-group">
        <label class="col-sm-2 control-label">咨询电话</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$webinfo['zx_tel']}" name="zx_tel">
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
			success: function(res){
				$('.bg_pic').val(res.path);
				$('.div-img').attr('src',res.path);
			}
		});
	});
	$('.selectfile').click(function(){
		$('.uploadfile').click();
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