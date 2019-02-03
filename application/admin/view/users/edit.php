{extend name="public:form" /}
{block name="menu"}用户管理 / 编辑用户{/block}
{block name="class"}ajaxPost{/block}
{block name='action'}{:url('edit')}{/block}
{block name="form"}
    <div class="form-group" {$style}>
        <label class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$user['username']}" name="username">
        </div>
    </div>
        <div class="form-group" {$style}>
        <label class="col-sm-2 control-label">微信号</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$user['wechat']}" name="wechat" required>
        </div>
    </div>
    <div class="form-group" {$style}>
        <label class="col-sm-2 control-label">手机号码</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$user['mobile']}" name="mobile" required>
        </div>
    </div>
    <div class="form-group" {$style}>
        <label class="col-sm-2 control-label">密码</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" placeholder="留空则不修改" name="password">
        </div>
    </div>
    <div class="form-group" {$style}>
        <label class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" placeholder="留空则不修改" name="password_confirm">
        </div>
    </div>
            <div class="form-group" {$style}>
        <label class="col-sm-2 control-label">推荐人</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{$user['recommend_name']}" name="recommend_name" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">当前等级</label>
        <div class="col-sm-4 checkbox i-checks">
        	<label><input type="radio" value="0" {if condition="0 eq $user['level']"}checked="checked"{/if} name="level" item="普通会员" /><i></i> 普通会员</label>
         	{foreach $level as $val}
                <label><input type="radio" value="{$val['level']}" item="{$val['name']}" {if condition="$val['level'] eq $user['level']"}checked="checked"{/if} name="level" /><i></i> {$val['name']}</label>
            {/foreach}
        </div>
    </div>
    <input type="hidden" name="id" value="{$user['id']}">
{/block}