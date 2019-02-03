{extend name="public/base" /}
{block name="main"}
<link rel="stylesheet" href="__CSS__/swiper.min.css">
<style type="text/css">
/*通用样式*/
/* common */
.flex {
    display: -webkit-box;      /* OLD - iOS 6-, Safari 3.1-6 */
    display: -moz-box;         /* OLD - Firefox 19- (buggy but mostly works) */
    display: -ms-flexbox;      /* TWEENER - IE 10 */
    display: -webkit-flex;     /* NEW - Chrome */
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;             /* NEW, Spec - Opera 12.1, Firefox 20+ */
}
/* 宽度随屏幕改变变化 */
.flex-1 {
    flex: 1;
    -webkit-flex: 1;
}

/* 垂直 水平 居中 */
.flex-center {
    justify-content: center;
    -webkit-justify-content: center;
    align-items: center;
    -webkit-align-items: center;
}
/* 垂直 居中 */
.flex-ver {
    align-items: center;
    -webkit-align-items: center;
}
.flex-col-ver{
    justify-content: center;
    -webkit-justify-content: center;
}
/* 换行 */
.flex-wrap{
    flex-wrap: wrap;
    -moz-flex-wrap:wrap;
    -webkit-flex-wrap: wrap;
}
.flex-reverse{
    flex-direction:row-reverse;
    -webkit-flex-direction:row-reverse;
    -moz-flex-direction:row-reverse;
}
/* flex 容器（设置为flex）内子元素向两边顶齐平分 */
.flex-jcsb {
    justify-content: space-between;
    -webkit-justify-content: space-between;
}
/*中间空白左右各一个*/
.flex-around{
    justify-content: space-between;
    -webkit-justify-content: space-between;
  }
/*平均分每个空间*/
.flex-pjf{
    justify-content: space-around;
    -webkit-justify-content: space-around;
}
.flex-end{
    align-items: flex-end;
    -webkit-align-items: flex-end;
}
.flex-end1{
    justify-content: flex-end;
    -webkit-justify-content: flex-end;
}

.flex-col {

    flex-direction: column;
    -webkit-flex-direction: column;

}
/*通用结束*/
/*新样式*/
p{
	margin: 0;
	padding: 2px;
}
.rucian_tb{
	background: url({$webinfo['bg_pic']}) no-repeat;
    height: 135px;
    background-size: 100% 100%;
    padding: 20px;
}
.rucian_gg{
	background-color: rgb(255, 255, 255);
    height: 35px;
}
.rucian_da{
	width: 100%;
	padding: 2.5%;
}
.rucian_a{
	width: 40%;
    margin: 5%;
    padding: 6%;
    background-color: rgb(255, 255, 255);
    border-radius: 10px;
}
.rucian_a span{
	width: 100%;
    text-align: center;
    color: rgb(0, 0, 0);
    margin-top: 10px;
}
.rucian_aimg{
	width: 100%;
    height: 50px;
    text-align: center;
}
.rucian_aimg img{
	width: 50px;
    height: 50px;
}
.rucian_kf{
    margin: 5% 7.5%;
    /*height: 80px;*/
    padding: 5px 9px;
    border: 1px solid rgba(0, 0, 0, 0.25098039215686274);
    border-radius: 10px;
}
.rucian_kf p{
    /*height: 35px;*/
    line-height: 20px;
}
.rucian_aaaa {
    display: block;
    width: 80%;
    margin: 0 auto;
    text-align: center;
    background-color: rgb(241, 83, 83);
    color: rgb(255, 255, 255) !important;
    line-height: 35px;
    border-radius: 6px;
    margin-top: 10px;
    margin-bottom:30px;
}
.swiper-box,.swiper-container, .swiper-wrapper, .swiper-slide {
    width: 100%;
    height: 172px;
  }
  .swiper-slide img {
    width: 100%;
    height: 100%;
  }
  .advert{
    width: 100%;
    height: 40px;
    background: #fff;
    margin: 0 auto;
    line-height: 40px;
}
.ad-title{
    width: 17%;
    height: 100%;
    float: left;
    padding-left: 10px;
    text-align: right;
}
#ad-main{
    width: 83%;
    float: left;
}
</style>
<div class="rucian_tb">
   <p>ID：{$user['id']}</p>
   <p>等级：普通会员</p>
   <p>姓名：{$user['username']}</p>
    <p>推荐码： 暂无</p>
</div>

<a href="{:url('set')}"><div class="u-set"><img src="__IMG__/set.png"></div></a>
<!-- 轮播图 -->
<!-- <div class="swiper-box"> -->
  <div class="swiper-container swiper-container-horizontal" style="display: none;">
    <div class="swiper-wrapper">
            </div>
  </div>
<!-- </div> -->
<!-- 公告 -->
<div class="advert"><div class="ad-title">公告：</div><marquee scrollamount="5" id="ad-main"><p><?php echo htmlspecialchars_decode($webinfo['notice']);?></p></marquee></div>
<div class="rucian_da flex flex-ver flex-wrap">
	<a href="{:url('share')}" class="rucian_a flex flex-ver flex-wrap">
		<div class="rucian_aimg">
			<img src="__IMG__/help1.png" alt="">
		</div>
		<span>分享推荐</span>
	</a>
	<a href="{:url('user/apply')}" class="rucian_a flex flex-ver flex-wrap">
		<div class="rucian_aimg">
			<img src="__IMG__/help2.png" alt="">
		</div>
		<span>申请升级</span>
	</a>
	<a href="{:url('user/check')}" class="rucian_a flex flex-ver flex-wrap">
		<div class="rucian_aimg">
			<img src="__IMG__/help3.png" alt="">
		</div>
		<span>审核升级</span>
	</a>
	<a href="{:url('user/team')}" class="rucian_a flex flex-ver flex-wrap">
		<div class="rucian_aimg">
			<img src="__IMG__/help4.png" alt="">
		</div>
		<span>我的团队</span>
	</a>

</div>

<div class="rucian_kf">
    <p>客服姓名：{$webinfo['kf_name']}</p>
    <p>客服电话：{$webinfo['kf_tel']}</p>
    <p>咨询电话：{$webinfo['zx_tel']}</p>
</div>
<a href="{:url('login/logout')}" class="rucian_aaaa">退出登录</a>
{/block}
{block name="footer"}
<script src="__JS__/swiper.min.js"></script>
<script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
        autoplay : 3000,
        /*pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,*/
    });
    
var shuzi =$('.swiper-slide').length;
    if ( shuzi =='') {
        $('.swiper-container').hide();
    }
</script>
{/block}