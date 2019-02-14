{extend name="public/base" /}
{block name="head"}
<style type="text/css">
.weui-cell__bd p{color: #282828;font-size: 15px;}
.btnWrap{width: 90%;margin:15px auto;}
.exitBtn{width: 100%;background: #e45050;height: 45px;line-height: 45px;font-size: 15px;}
a,a:hover,a:active{color: #282828;text-decoration: none;}
</style>
{/block}
{block name="main"}
{include file="public/topbar" /}
		<div class="weui-cells" style="margin-top:10px">
		       <a class="weui-cell weui-cell_access" href="{:url('info')}">
		         <div class="weui-cell__bd">
		           <p>修改个人资料</p>
		         </div>
		         <div class="weui-cell__ft"></div>
		       </a>
		          
		       <a class="weui-cell weui-cell_access" href="{:url('setpwd')}">
		         <div class="weui-cell__bd">
		           <p>修改密码</p>
		         </div>
		         <div class="weui-cell__ft"></div>
		       </a>
		</div>
		
		<div class="btnWrap">
			<a class="u-btn exitBtn" href="{:url('login/logout')}">退出账户</a>
		</div>
	
{/block}
{block name="footer"}
<script type="text/javascript">
</script>
{/block}