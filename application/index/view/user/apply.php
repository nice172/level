{extend name="public/base" /}
{block name="head"}
<style type="text/css">
body {
    font-family: Arial, Helvetica, Sans-Serif;
    background-color: #fff;
}

/*通用*/
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
.rucian_sj{
    width: 85%;
    margin: 0 auto;
    margin-top: 15%;
    margin-bottom: 15%;
    padding: 10px;
    background-color: rgb(242, 242, 242);
    position: relative;
}
.rucian_tj{
    width: 40%;
    margin: 0 auto;
    line-height: 40px;
    border-radius: 7px;
    background-color: rgb(255, 255, 255);
    text-align: center;
    border: 1px solid rgb(27, 25, 25);
}

.wsjxx{
    position: absolute;
    top: 0;
    right: 11px;
}


</style>
{/block}
{block name="main"}
<div class="page_topbar">
    <a href="javascript:;" class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></a>
    <div class="title">申请升级</div>
</div>

<div class="rucian_sj">
    <div>您当前的等级：{$current_level}</div>
    <div>您可申请升级的等级：{$update_level_text}</div>
    <div>是否提交申请？</div>
</div>
<a href="javascript:;" class="rucian_tj flex flex-center" id="tijiao">提交申请</a>
{/block}
{block name="footer"}
<script>
require(['tpl', 'core'], function(tpl, core) {
    var type  = 1;
    $('body').on('click','.rucian_tj',function(){
         core.json("{:url('postcheck')}",{type:type},function(json){
            if(json.code == 1){
               core.tip.show(json.msg);
               setTimeout(function(){
					window.location.reload();
                   },1500);
             }else{
                core.tip.show(json.msg);
            }
         },true,true);

    });
});
</script>
{/block}