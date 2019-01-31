{extend name="public:form" /}
{block name="menu"}修改资料{/block}
{block name="class"}ajaxPost{/block}
{block name='action'}{:url('edit')}{/block}
{block name="form"}
    <div class="form-group">
        <label class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-4">
            <span class="form-control">{$loginUser['user_name']}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" name="user_email" value="{$loginUser['user_email']}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">密码</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="password">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="password_confirm">
        </div>
    </div>
    <!--<div class="form-group">
        <label class="col-sm-2 control-label">角色分配</label>
        <div class="col-sm-4 checkbox i-checks">
            {foreach $roles as $role}
                <label><input type="checkbox" value="{$role->id}" name="roles[]" {if condition="$role->checked"}checked{/if}><i></i>{$role->name}</label>
            {/foreach}
        </div>
    </div>-->
    <input type="hidden" name="id" value="{$loginUser['id']}">
{/block}