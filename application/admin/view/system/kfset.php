{extend name="public:form" /}
{block name="menu"}客服资料{/block}
{block name="main"}
<style>.form-padding{padding-top:10px;}</style>
<form class="form-inline ajaxPost" action="?" method="post">
	<div>  <div class="form-group">
    <label for="title">客服姓名</label>
    <input type="text" class="form-control" {if condition="isset($kf['title'][0])"}value="{$kf['title'][0]}"{/if} name="title[]" />
  </div>
  <div class="form-group">
    <label for="value"></label>
    <input type="text" class="form-control" {if condition="isset($kf['value'][0])"}value="{$kf['value'][0]}"{/if} name="value[]"/>
  </div></div>
<div class="form-padding">
    <div class="form-group">
    <label for="title">客服电话</label>
    <input type="text" class="form-control" {if condition="isset($kf['title'][1])"}value="{$kf['title'][1]}"{/if} name="title[]" />
  </div>
  <div class="form-group">
    <label for="value"></label>
    <input type="text" class="form-control" {if condition="isset($kf['value'][1])"}value="{$kf['value'][1]}"{/if} name="value[]"/>
  </div>
</div>
<div class="form-padding">
    <div class="form-group">
    <label for="title">咨询电话</label>
    <input type="text" class="form-control" {if condition="isset($kf['title'][2])"}value="{$kf['title'][2]}"{/if} name="title[]" />
  </div>
  <div class="form-group">
    <label for="value"></label>
    <input type="text" class="form-control" {if condition="isset($kf['value'][2])"}value="{$kf['value'][2]}"{/if} name="value[]"/>
  </div>
</div>
<div class="form-padding" style="padding-top:20px;">
<div class="form-group">
<div class="col-sm-12 col-sm-offset-12">
    <button class="btn btn-primary submit" type="submit">保存</button>
    <span class="btn btn-white" onclick="history.back()">返回</span>
</div>
</div>
</div>
</form>
{/block}
{block name="js"}
<script type="text/javascript">
$(function(){
	
});
</script>
{/block}