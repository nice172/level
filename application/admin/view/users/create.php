{extend name="public:form" /}
{block name="menu"}会员管理 / 创建会员{/block}
{block name="back"}<span class="btn btn-white" onclick="history.back()" style="position:absolute;top:5px;right:10px;">返回</span>{/block}
{block name="class"}ajaxPost{/block}
{block name='action'}{:url('create')}{/block}
{block name="form"}
    <div class="form-group">
        <label class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="username">
        </div>
    </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">微信号</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="wechat" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">手机号码</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="mobile" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">密码</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="password" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="password_confirm" required>
        </div>
    </div>
            <div class="form-group">
        <label class="col-sm-2 control-label">推荐人</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="recommend_name" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">当前等级</label>
        <div class="col-sm-4 checkbox i-checks">
        <label><input type="radio" value="0" checked="checked" name="level" /><i></i> 普通会员</label>
         	{foreach $level as $key => $val}
                <label><input type="radio" value="{$val['level']}" name="level" /><i></i> {$val['name']}</label>
            {/foreach}
        </div>
    </div>
{/block}