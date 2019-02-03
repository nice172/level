{extend name="public:form" /}
{block name="menu"}会员管理 / 用户资料{/block}
{block name="main"}
<style>.user_info{font-weight:normal;}</style>
<h4 class="user_info">会员编号：{$userinfo['id']}</h4>
<h4 class="user_info">姓名：{$userinfo['username']}</h4>
<h4 class="user_info">手机号码：{$userinfo['mobile']}</h4>
<h4 class="user_info">微信号：{$userinfo['wechat']}</h4>
<h4 class="user_info">会员等级：{$userinfo['level_text']} <a href="{:url('edit',['x' => 'u','id' => $userinfo['id']])}" class="btn btn-default btn-xs">修改等级</a></h4>
<h4 class="user_info">推荐人：{$userinfo['recommend_name']}</h4>
<h4 class="user_info">团队成员：{$count}</h4>
{/block}