{extend name="public/base" /}
{block name="head"}
    <style>
        .team_list_head {
            height: 46px;
            width: 100%;
            background: #fff;
            padding: 13px 3% 10px 3%;
            border-bottom: 1px solid #eaeaea;
        }
        .team_list_head .info {
            height: 20px;
            float: left;
            font-size: 14px;
            color: #666;
            line-height: 20px;
            text-align: left;
        }
        .team_list_head .num2 {
            height: 20px;
            float: right;
            text-align: right;
            font-size: 14px;
            color: #666;
            line-height: 20px;
            font-size: 14px;
            color: #989898;
        }
        .team_list {
            height: 70px;
            width: 100%;
            padding: 15px 3%;
            background: white;
            border-bottom: 1px solid #eaeaea;
        }
        .team_list .img {
            width: 16%;
            height: 40px;
            float: left;
            text-align: left;
        }
        .team_list .img img {
            height: 40px;
            width: 40px;
        }
        .team_list .info {
            height: 40px;
            width: 47%;
            float: left;
            font-size: 14px;
            color: #666;
            line-height: 20px;
            text-align: left;
        }
        .team_list .info span {
            font-size: 12px;
            color: #989898;
        }
        .team_list .num2 {
            height: 40px;
            width: 49%;
            float: right;
            text-align: right;
            font-size: 14px;
            color: #666;
            line-height: 20px;
            margin-right: 10px;
        }
        .team_list .num2 span {
            font-size: 12px;
            color: #989898;
        }
    </style>
{/block}
{block name="main"}
    <div class="page_topbar">
        <a href="javascript:history.back()" class="back"><i class="fa fa-angle-left"></i></a>
        <div class="title">我的团队（0人）</div>
    </div>

    <div class="team_list_head">
        <div class="info">成员信息</div>
        <div class="num2">一星及一星以上人数:0</div>
    </div>
    <div id="container"><div style="padding-top:120px;width:190px;margin:0 auto;">
      <img style="width:60px;display:block;margin:0 auto;" src="./我的团队_files/Detailed.png" alt="">
      <span style="display:block;margin-top: 18px; text-align:center;">您还没有相关纪录~</span><br>

  </div></div>
    <div id="log_loading"></div>

    <script id="tpl_log" type="text/html">
   <%each list as row%>

    <div id="container" style="width: 100%;height: auto;">
        <div class="team_list">
            <!-- <div class="img">
                <img src="<%if row.avatar%>../addons/sz_yi/template/mobile/style1/static/images/quyuJJ.png<%else%><%row.avatar%><%/if%>">
            </div> -->
            <div class="info">
                昵称：<%row.realname%>

                <br>
                <span>手机号：<%row.mobile%></span>
            </div>
                    <div class="num2">等级：<%if row.level == 0 %>普通会员<%else%><%row.levelname%><%/if%><br><span>微信：<%if row.weixin%><%row.weixin%><%else%>暂无微信号<%/if%></span></div>
            <div class="f-cb"></div>
        </div>
    </div>
    <%/each%>
    </script>
     <script id="tpl_empty" type="text/html">
    <div style="padding-top:120px;width:190px;margin:0 auto;">
      <img style="width:60px;display:block;margin:0 auto;" src="../addons/sz_yi/plugin/suppliermenu/template/mobile/default/images/Detailed.png" alt="">
      <span style="display:block;margin-top: 18px; text-align:center;">您还没有相关纪录~</span></br>

  </div>
  </script>
{/block}
{block name="footer"}
<script language="javascript">

    var page = 1;
    require(['tpl', 'core'], function (tpl, core) {

    function bindScroller(){
        //加载更多
        var loaded = false;
        // alert('111');
        var stop = true;
        $(window).scroll(function () {
            if (loaded) {
                return;
            }
            totalheight = parseFloat($(window).height()) + parseFloat($(window).scrollTop());
            if ($(document).height() <= totalheight) {

                if (stop == true) {
                    stop = false;
                    $('#log_loading').html('<i class="fa fa-spinner fa-spin"></i>正在加载...');
                    page++;
                    core.json('member/team', {page:page}, function (morejson) {
                     // core.json('member/team', {}, function (morejson) {
                        stop = true;
                        $("#container").append(tpl('tpl_log', morejson.result));

                        if (morejson.result.list.length < 10) {
                            // 加载完成
                            $('#log_loading').html('已经加载完全部记录');

                            loaded = true;
                            $(window).scroll = null;
                            return;
                        }
                    }, true);
                }
            }


        });
    }
    function getLog(status) {
        core.json('member/team', {page:page}, function (json) {
        // core.json('member/team', {}, function (json) {
          console.log(json);
            $('#total').html( json.result.total);
           // $('#commissioncount').html( json.result.list);
            if (!json.result.list.length) {
                $('#container').html(tpl('tpl_empty'));
                return;
            }


            $('#container').html(tpl('tpl_log', json.result));



            bindScroller();
        }, true);
    }


    getLog('');


})
</script>
<div id="core_loading" style="top: 50%; left: 50%; margin-left: -35px; margin-top: -30px; position: absolute; width: 80px; height: 80px; z-index: 999999; display: none;"><img src="./我的团队_files/loading.gif" width="80"></div>
{/block}