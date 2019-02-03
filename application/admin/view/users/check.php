{extend name="public:base" /}
{block name="menu"}会员升级审批管理{/block}
{block name="search"}
        <div class="form-group">
            <label for="username" class="sr-only">姓名</label>
            <input type="text" name="username" placeholder="请输入姓名" id="username" class="form-control" value="{$Request.param.username}">
        </div>
        <div class="form-group">
            <label for="mobile" class="sr-only">联系电话</label>
            <input type="text" name="mobile" placeholder="请输入联系电话" id="mobile" class="form-control" value="{$Request.param.mobile}">
        </div>
        <div class="form-group">
        	<label for="checku">审核人</label>
        	<input type="text" name="checku" placeholder="请输入审核人" id="checku" class="form-control" value="{$Request.param.checku}">
        </div>
        {:searchButton()}
{/block}
{block name="table-head"}
    <tr>
        <th>会员编号</th>
        <th>姓名</th>
        <th>手机号码</th>
        <th>准等级</th>
        <th>第一审核人</th>
        <th>审核时间</th>
        <th>第二审核人</th>
        <th>审核时间</th>
        <th>状态</th>
    </tr>
{/block}
{block name="table-body"}
    {if condition="!$count"}
        <tr>
            <td colspan="7" class="text-center">没有数据</td>
        </tr>
    {else/}
        {foreach $data as $key => $value}
            <tr>
                <td>{$value['user_id']}</td>
                <td>{$value['myuser']}</td>
                <td>{$value['mobile']}</td>
                <td>{$value['level_text']}</td>
                {if condition="$value['level']==1"}
                	{foreach $value['recommend_info'] as $val}
                	<td>{$val['check_name']}</td>
                	<td>{if condition="$val['check_time']"}{:date('Y-m-d H:i:s', $val['check_time'])}{/if}</td>
                	{/foreach}
                {else}
                <td>{$value['check_name']}</td>
                <td>{if condition="$value['check_time']"}{:date('Y-m-d H:i:s', $value['check_time'])}{/if}</td>
                {/if}
                <td>{if condition="$value['status']"}已审核{else}未审核{/if}</td>
            </tr>
        {/foreach}
    {/if}
{/block}
{block name="paginate"}
{$message_log->render()|raw}
{/block}
{block name="js"}
<script type="text/javascript" src="__PLUGINS__/js/laydate/laydate.js"></script>
<script type="text/javascript">
//执行一个laydate实例
laydate.render({
  elem: '#start_date' //指定元素
});
laydate.render({
  elem: '#end_date' //指定元素
});
</script>
{/block}
