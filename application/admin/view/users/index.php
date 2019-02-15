{extend name="public:base" /}
{block name="menu"}会员管理{/block}
{block name="back"}<span class="btn btn-white" onclick="history.back()" style="position:absolute;top:5px;right:10px;">返回</span>{/block}
{block name="search"}
        <div class="form-group">
            <label for="start_date" class="sr-only">加入时间</label>
            <input type="text" name="start_date" readonly="readonly" placeholder="选择开始加入时间" id="start_date" class="form-control" value="{$Request.param.start_date}">
        </div>
        <div class="form-group">
            <label for="end_date" class="sr-only">至</label>
            <input type="text" name="end_date" readonly="readonly" placeholder="选择结束加入时间" id="end_date" class="form-control" value="{$Request.param.end_date}">
        </div>
        <div class="form-group">
            <label for="username" class="sr-only">会员姓名</label>
            <input type="text" name="username" placeholder="请输入会员姓名" id="username" class="form-control" value="{$Request.param.username}">
        </div>
        <div class="form-group">
            <label for="mobile" class="sr-only">手机号码</label>
            <input type="text" name="mobile" placeholder="请输入手机号码" id="mobile" class="form-control" value="{$Request.param.mobile}">
        </div>
        {:searchButton()}
        {:exportButton()}
{/block}
{block name="button-create"}
    {:createButton(url('create'), '创建会员')}
{/block}
{block name="table-head"}
    <tr>
        <th>会员编号</th>
        <th>姓名</th>
        <th>手机号码</th>
        <th>微信号</th>
        <th>会员等级</th>
        <th>推荐人</th>
        <th>团队人数</th>
        <th>一星以上人数</th>
        <th>加入时间</th>
        <th>操作</th>
    </tr>
{/block}
{block name="table-body"}
    {if condition="!$count"}
        <tr>
            <td colspan="7" class="text-center">没有数据</td>
        </tr>
    {else/}
        {foreach $users as $key => $user}
            <tr>
                <td>{$user['id']}</td>
                <td>{$user['username']}</td>
                <td>{$user['mobile']}</td>
                <td>{$user['wechat']}</td>
                <td>{$user['level']}</td>
                <td>{$user['recommend_name']}</td>
                <td>{$user['team_count']}</td>
                <td>{$user['star_count']}</td>
                <td>{$user['create_time']|date='Y-m-d H:i:s'}</td>
                <td>
                    {:infoButton(url('info', ['id' => $user['id']]))}
                    {:editButton(url('edit', ['id' => $user['id']]))}
                    {:deleteButton(url('delete'), $user['id'])}
                </td>
            </tr>
        {/foreach}
    {/if}
{/block}
{block name="paginate"}
{$page|raw}
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
