<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-21
 * Time: 20:46
 */
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>优惠券分享社区</title>
    <?php include 'include/head.php' ?>
</head>
<body>

<?php include 'include/header.php'; ?>
<?php include 'include/navPanel.php'; ?>


<div class="layui-container" id="coupon-index">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8">
            <!--
            <div class="fly-panel">
                <div class="fly-panel-title fly-filter">
                    <a>置顶</a>
                    <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin"
                       style="color: #FF5722;">去签到</a>
                </div>
                <ul class="fly-list">
                    <li>
                        <a href="user/home.html" class="fly-avatar">
                            <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"
                                 alt="贤心">
                        </a>
                        <h2>
                            <a class="layui-badge">动态</a>
                            <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        </h2>
                        <div class="fly-list-info">
                            <a href="user/home.html" link>
                                <cite>贤心</cite>
                                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                                <i class="layui-badge fly-badge-vip">VIP3</i>
                            </a>
                            <span>刚刚</span>

                            <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻">
                                <i class="iconfont icon-kiss"></i>
                                60
                            </span>
                            <span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>
                            <span class="fly-list-nums">
                                <i class="iconfont icon-pinglun1" title="回答"></i> 66
                            </span>
                        </div>
                        <div class="fly-list-badge">
                            <span class="layui-badge layui-bg-black">置顶</span>
                            <span class="layui-badge layui-bg-red">精帖</span>
                        </div>
                    </li>
                </ul>
            </div>
            -->


            <div class="fly-panel" style="margin-bottom: 0;">

                <div class="fly-panel-title fly-filter">
                    <a href="index.php?site=all"
                       :class="{ 'layui-this': site == 'all' || site == '', '': site != 'all' || site != ''}">综合</a>
                    <span class="fly-mid"></span>
                    <a href="index.php?site=京东" :class="{ 'layui-this': site == '京东', '': site != '京东'}">京东</a>
                    <span class="fly-mid"></span>
                    <a href="index.php?site=淘宝" :class="{ 'layui-this': site == '淘宝', '': site != '淘宝'}">淘宝</a>
                    <span class="fly-mid"></span>
                    <a href="index.php?site=拼多多" :class="{ 'layui-this': site == '拼多多', '': site != '拼多多'}">拼多多</a>
                    <span class="fly-filter-right layui-hide-xs">
                        <a href="" class="layui-this">按最新</a>
                        <span class="fly-mid"></span>
                        <a href="">按最热</a>
                    </span>
                </div>

                <ul class="fly-list">

                    <li v-for="coupon in couponList">
                        <a :href="coupon.link" class="fly-avatar">
                            <img v-if="coupon.site == '京东'" src="static/images/jd.png" alt="京东">
                            <img v-if="coupon.site == '拼多多'" src="static/images/pdd.png" alt="拼多多">
                            <img v-if="coupon.site == '淘宝'" src="static/images/tb.png" alt="淘宝">
                            <img v-if="coupon.site != '淘宝' &&  coupon.site != '拼多多' && coupon.site != '京东'"
                                 src="static/images/coupon.png" alt="淘宝">
                        </a>

                        <h2>
                            <!--                            <a class="layui-badge">动态</a>-->
                            <a :href="coupon.link">
                                {{coupon.title}}
                            </a>
                        </h2>

                        <div class="fly-list-info">
                            <!--
                        <a href="user/home.html" link>
                            <cite>贤心</cite>
                            <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                            <i class="layui-badge fly-badge-vip">VIP3</i>
                        </a>
                            -->
                            <span>
                                {{coupon.create_time}}
                            </span>

                            <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻">
                                <i class="iconfont icon-kiss"></i>
                                {{coupon.stars}}
                            </span>
                            <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                            <span class="fly-list-nums">

<!--<span class="layui-badge">-->
                                {{coupon.visits}}
<!--</span>-->
                            </span>
                        </div>
                        <div class="fly-list-badge">
                            <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                        </div>
                    </li>
                </ul>
                <div style="text-align: center">
                    <!--
                                        <div class="laypage-main">
                                            <a href="jie/index.html" class="laypage-next">更多求解</a>
                                        </div>
                    -->
                    <div id="demo0"></div>
                </div>


            </div>
        </div>
        <div class="layui-col-md4">

            <div class="fly-panel">
                <h3 class="fly-panel-title">热券榜单</h3>
                <ul class="fly-panel-main fly-list-static">
                    <li v-for="hotCoupon in hotCouponList">
                        <a :href="hotCoupon.link" target="_blank">
                            {{hotCoupon.title}}
                        </a>
                    </li>
                </ul>
            </div>


            <!--
                        <div class="fly-panel fly-signin">
                            <div class="fly-panel-title">
                                签到
                                <i class="fly-mid"></i>
                                <a href="javascript:;" class="fly-link" id="LAY_signinHelp">说明</a>
                                <i class="fly-mid"></i>
                                <a href="javascript:;" class="fly-link" id="LAY_signinTop">活跃榜<span class="layui-badge-dot"></span></a>
                                <span class="fly-signin-days">已连续签到<cite>16</cite>天</span>
                            </div>
                            <div class="fly-panel-main fly-signin-main">
                                <button class="layui-btn layui-btn-danger" id="LAY_signin">今日签到</button>
                                <span>可获得<cite>5</cite>飞吻</span>

                                <button class="layui-btn layui-btn-disabled">今日已签到</button>
                                <span>获得了<cite>20</cite>飞吻</span>
                            </div>
                        </div>


            <div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">
                <h3 class="fly-panel-title">回贴周榜</h3>
                <dl>
                    <dd>
                        <a href="user/home.html">
                            <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                        </a>
                    </dd>
                </dl>
            </div>

            <dl class="fly-panel fly-list-one">
                <dt class="fly-panel-title">本周热议</dt>
                <dd>
                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                    <span><i class="iconfont icon-pinglun1"></i> 16</span>
                </dd>


            </dl>

            <div class="fly-panel">
                <div class="fly-panel-title">
                    这里可作为广告区域
                </div>
                <div class="fly-panel-main">
                    <a href="http://layim.layui.com/?from=fly" target="_blank" class="fly-zanzhu"
                       time-limit="2017.09.25-2099.01.01" style="background-color: #5FB878;">LayIM 3.0 - layui 旗舰之作</a>
                </div>
            </div>

            <div class="fly-panel fly-link">
                <h3 class="fly-panel-title">友情链接</h3>
                <dl class="fly-panel-main">
                    <dd><a href="http://www.layui.com/" target="_blank">layui</a>
                    <dd>
                    <dd><a href="http://layim.layui.com/" target="_blank">WebIM</a>
                    <dd>
                    <dd>
                        <a href="mailto:xianxin@layui-inc.com?subject=%E7%94%B3%E8%AF%B7Fly%E7%A4%BE%E5%8C%BA%E5%8F%8B%E9%93%BE"
                           class="fly-link">申请友链</a>
                    <dd>
                </dl>
            </div>
-->
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>

<script>
    var app = new Vue({
        el: '#coupon-index',
        data: {
            site: "",
            couponList: [],
            hotCouponList: []
        }
    });

    let type = getQueryString("type");
    if (!type) {
        type = "all";
    }
    app._data.type = type;
    let site = getQueryString("site");
    if (!site) {
        site = "all";
    }
    app._data.site = site;
    let pageNum = getQueryString("pageNum");
    if (!pageNum) {
        pageNum = "1";
    }
    let pageSize = 20;


    layui.cache.page = '';
    layui.cache.user = {
        username: '游客'
        , uid: -1
        , avatar: 'static/images/avatar/00.jpg'
        , experience: 83
        , sex: '男'
    };
    layui.config({
        version: "3.0.0"
        , base: 'static/mods/' //这里实际使用时，建议改成绝对路径
    }).extend({
        fly: 'index'
    }).use('fly');


    function queryCouponList(pageNum) {
        layui.$.ajax({
            type: "GET",
            url: "queryList.php?site=" + site + "&type=" + type + "&pageSize=" + pageSize + "&pageNum=" + pageNum,
            dataType: "json",
            // data: args,
            success: function (data) {
                if (!data) {
                    layui.layer.alert("未查询到优惠券！");
                    return;
                }
                let couponList = data.couponList;
                let totalCount = data.totalCount;
                let pageNum = data.pageNum;
                console.log(data);
                if (!couponList || couponList.length == 0) {
                    app._data.couponList = [];
                    return;
                }
                for (let i = 0; i < couponList.length; i++) {
                    couponList[i].link = "detail.php?id=" + couponList[i].id;
                    if (!couponList[i].stars) {
                        couponList[i].stars = 0;
                    }
                }
                app._data.couponList = couponList;
                layui.laypage.render({
                    elem: 'demo0',
                    count: totalCount,
                    curr: pageNum,
                    limit: pageSize,
                    jump: function (obj) {
                        let curr = obj.curr;
                        console.log(curr);
                        // let pageNum = getQueryString("pageNum");
                        if (curr == pageNum) {
                            return;
                        }
                        queryCouponList(curr);
                    }
                });
            }
        });
    }

    layui.use(['laypage', 'layer'], function () {
        queryCouponList(1);

    });


</script>
</body>
</html>