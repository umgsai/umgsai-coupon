<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-21
 * Time: 23:00
 */
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'include/head.php' ?>

</head>
<body>

<?php include 'include/header.php'; ?>
<?php include 'include/navPanel.php'; ?>

<div class="layui-container" id="coupon-detail">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8 content detail">
            <div class="fly-panel detail-box">
                <h1>
                    {{title}}
                </h1>
                <!--
                                <div class="fly-detail-info">
                                    <span class="fly-list-nums">
                                        <i class="iconfont" title="人气">&#xe60b;</i>
                                        {{visits}}
                                    </span>
                                </div>
                -->
                <div class="fly-detail-info">
                    <span class="layui-badge layui-bg-green fly-detail-column">
                        {{site}}
                    </span>
                    <div class="fly-admin-box" data-id="46425"></div>
                    <span class="fly-list-nums">
                        <a href="javascript: void(0)" v-on:click="star">
                            <i class="iconfont icon-kiss" title="飞吻"></i>
                            {{stars}}
                        </a>
                        <a href="javascript: void()" style="margin-left: 30px">
                            <span class="layui-badge">
                            {{visits}}
                            </span>
                        </a>

                        <a :href="deleteLink" style="margin-left: 50px" v-if="deleteLink">
                            <span class="layui-badge">
                            删除
                            </span>
                        </a>

                        <a href="javascript:void(0)" id="btn-copy" style="margin-left: 50px">
                            <span class="layui-badge">
                            点击复制
                            </span>
                        </a>
                    </span>
                </div>
                <!--
                                <div class="detail-about">
                                    <a class="fly-avatar" href="../user/home.html">
                                        <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"
                                             alt="贤心">
                                    </a>
                                    <div class="fly-detail-user">
                                        <a href="../user/home.html" class="fly-link">
                                            <cite>贤心</cite>
                                            <i class="iconfont icon-renzheng" title="认证信息：{{ rows.user.approve }}"></i>
                                            <i class="layui-badge fly-badge-vip">VIP3</i>
                                        </a>
                                        <span>2017-11-30</span>
                                    </div>
                                    <div class="detail-hits" id="LAY_jieAdmin" data-id="123">
                                        <span style="padding-right: 10px; color: #FF7200">悬赏：60飞吻</span>
                                        <span class="layui-btn layui-btn-xs jie-admin" type="edit"><a href="add.html">编辑此贴</a></span>
                                    </div>
                                </div>
                -->
                <div class="detail-body photos" id="content">
                    <pre>{{content}}</pre>
                    <img v-for="imgUrl in imgUrls" :src="imgUrl">
                </div>
            </div>

        </div>


        <div class="layui-col-md4">
            <dl class="fly-panel fly-list-one">
                <dt class="fly-panel-title">热券</dt>
                <dd v-for="hotCoupon in hotCouponList">
                    <a :href="hotCoupon.link">
                        {{hotCoupon.title}}
                    </a>
                    <span class="layui-badge">
                        {{hotCoupon.visits}}
                    </span>
                </dd>

                <!-- 无数据时 -->
                <!--
                <div class="fly-none">没有相关数据</div>
                -->
            </dl>

            <!--
                        <div class="fly-panel" style="padding: 20px 0; text-align: center;">
                            <img src="../../res/images/weixin.jpg" style="max-width: 100%;" alt="layui">
                            <p style="position: relative; color: #666;">微信扫码关注 layui 公众号</p>
                        </div>
            -->
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>


<!--<script src="static/layui/lay/modules/jquery.js"></script>-->
<script src="static/js/vue.min.js"></script>
<script type="text/javascript" src="static/js/clipboard.min.js"></script>

<script>

    var app = new Vue({
        el: '#coupon-detail',
        data: {
            id: 0,
            title: "",
            site: "",
            content: "",
            visits: 0,
            stars: 0,
            imgUrls: [],
            deleteLink: '',
            hotCouponList: []
        },
        methods: {
            star: function () {
                // console.log(this.stars);
                layui.$.ajax({
                    type: "GET",
                    url: "star.php?id=" + this.id,
                    dataType: "json",
                    success: function (data) {
                        if (data && data.success){
                            this.stars = this.stars + 1;
                        }
                    }
                });
            }
        }
    });



    layui.cache.page = 'jie';
    layui.cache.user = {
        username: '游客'
        , uid: -1
        , avatar: 'static/images/avatar/00.jpg'
        , experience: 83
        , sex: '男'
    };
    layui.config({
        version: "3.0.0"
        , base: 'static/mods/'
    }).extend({
        fly: 'index'
    }).use(['fly', 'face'], function () {
        var $ = layui.$
            , fly = layui.fly;
        //如果你是采用模版自带的编辑器，你需要开启以下语句来解析。
        /*
        $('.detail-body').each(function(){
          var othis = $(this), html = othis.html();
          othis.html(fly.content(html));
        });
        */

        layui.$.fn.tweetify = function () {
            this.each(function () {
                layui.$(this).html(
                    layui.$(this).html()
                        .replace(/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi, '<a href="$1">$1</a>')
                        .replace(/(^|\s)#(\w+)/g, '$1<a href="http://search.twitter.com/search?q=%23$2">#$2</a>')
                        .replace(/(^|\s)@(\w+)/g, '$1<a href="http://twitter.com/$2">@$2</a>')
                );
            });
            return layui.$(this);
        }

        let id = getQueryString("id");


        $.ajax({
            type: "GET",
            url: "queryDetail.php?id=" + id,
            dataType: "json",
            // data: args,
            success: function (data) {
                if (!data) {
                    layui.layer.alert("未查询到优惠券！");
                    return;
                }
                console.log(data);
                app._data.id = data.id;
                app._data.title = data.title;
                app._data.site = data.site;
                app._data.visits = data.visits;
                app._data.stars = data.stars;
                app._data.content = data.content;
                app._data.imgUrls = eval(data.img_urls);
                app._data.deleteLink = data.deleteLink;
                // $("#content").html(data.content);
                $("title").text(data.title);
                setTimeout(function () {
                    layui.$("pre").tweetify();
                }, 200);


                layui.$.ajax({
                    type: "GET",
                    url: "visit.php?id=" + app._data.id,
                    // dataType: "json",
                    success: function (data) {
                        if (data && data.success){
                            app._data.visits = this.visits + 1;
                        }
                    }
                });
            }
        });


    });

    function getQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]);
        return null;
    }

    var clipboard = new Clipboard('#btn-copy', {
        text: function() {
            var text = layui.$("pre").text();
            if (text == "") {
                layui.layer.msg("没有可以复制的内容！");
            } else {
                layui.layer.msg("已复制到剪切板！");
            }
            return text;
        }
    });

</script>

</body>
</html>
