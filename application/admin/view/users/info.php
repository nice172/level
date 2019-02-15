{extend name="public:form" /}
{block name="menu"}会员管理 / 用户资料{/block}
{block name="back"}<span class="btn btn-white" onclick="history.back()" style="position:absolute;top:5px;right:10px;">返回</span>{/block}
{block name="main"}
<style>.user_info{font-weight:normal;}</style>
<h4 class="user_info">会员编号：{$userinfo['id']}</h4>
<h4 class="user_info">姓名：{$userinfo['username']}</h4>
<h4 class="user_info">手机号码：{$userinfo['mobile']}</h4>
<h4 class="user_info">微信号：{$userinfo['wechat']}</h4>
<h4 class="user_info">会员等级：{$userinfo['level_text']} <a href="{:url('edit',['x' => 'u','id' => $userinfo['id']])}" class="btn btn-default btn-xs">修改等级</a></h4>
<h4 class="user_info">推荐人：{$userinfo['recommend_name']}</h4>
<h4 class="user_info">团队成员：{$count}</h4>

<div class="row">

  <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>普通会员：{:count($common)}人</h3>
        {foreach name="common" item="v"}
        <p>{$v['username']}&nbsp;{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>一星会员：{:count($star_user1)}人</h3>
        {foreach name="star_user1" item="v"}
        <p>姓名：{$v['username']}&nbsp;手机号：{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
    <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>二星会员：{:count($star_user2)}人</h3>
        {foreach name="star_user2" item="v"}
        <p>姓名：{$v['username']}&nbsp;手机号：{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
    <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>三星会员：{:count($star_user3)}人</h3>
        {foreach name="star_user3" item="v"}
        <p>姓名：{$v['username']}&nbsp;手机号：{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
    <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>四星会员：{:count($star_user4)}人</h3>
        {foreach name="star_user4" item="v"}
        <p>姓名：{$v['username']}&nbsp;手机号：{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
    <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>五星会员：{:count($star_user5)}人</h3>
        {foreach name="star_user5" item="v"}
        <p>姓名：{$v['username']}&nbsp;手机号：{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
    <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>六星会员：{:count($star_user6)}人</h3>
        {foreach name="star_user6" item="v"}
        <p>姓名：{$v['username']}&nbsp;手机号：{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
    <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>七星会员：{:count($star_user7)}人</h3>
        {foreach name="star_user7" item="v"}
        <p>姓名：{$v['username']}&nbsp;手机号：{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
      <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>八星会员：{:count($star_user8)}人</h3>
        {foreach name="star_user8" item="v"}
        <p>姓名：{$v['username']}&nbsp;手机号：{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
      <div class="col-sm-3">
    <div class="thumbnail">
      <div class="caption">
        <h3>九星会员：{:count($star_user9)}人</h3>
        {foreach name="star_user9" item="v"}
        <p>姓名：{$v['username']}&nbsp;手机号：{$v['mobile']}</p>
        {/foreach}
      </div>
    </div>
  </div>
  
</div>

{/block}