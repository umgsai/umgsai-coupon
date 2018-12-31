<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-21
 * Time: 20:54
 */
?>
<div class="fly-panel fly-column layui-hide-xs" style="min-height: 100px">
    <div class="layui-container">
        <ul class="layui-clear" id="nav-type">
            <li :class="{'layui-this': type == 'all' || !type, '': type != 'all' || type}"><a href="javascript:void(0)" type="all">首页</a></li>
            <li :class="{'layui-this': type == '水果生鲜', '': type != '水果生鲜'}"><a href="javascript:void(0)" type="水果生鲜">水果生鲜</a></li>
            <li :class="{'layui-this': type == '食品饮料', '': type != '食品饮料'}"><a href="javascript:void(0)" type="食品饮料">食品饮料</a></li>
            <li :class="{'layui-this': type == '文学图书', '': type != '文学图书'}"><a href="javascript:void(0)" type="文学图书">文学图书</a></li>
            <li :class="{'layui-this': type == '家居日用', '': type != '家居日用'}"><a href="javascript:void(0)" type="家居日用">家居日用</a></li>
            <li :class="{'layui-this': type == '个人护理', '': type != '个人护理'}"><a href="javascript:void(0)" type="个人护理">个人护理</a></li>
            <li :class="{'layui-this': type == '母婴用品', '': type != '母婴用品'}"><a href="javascript:void(0)" type="母婴用品">母婴用品</a></li>
            <li :class="{'layui-this': type == '美妆护肤', '': type != '美妆护肤'}"><a href="javascript:void(0)" type="美妆护肤">美妆护肤</a></li>
            <li :class="{'layui-this': type == '服饰内衣', '': type != '服饰内衣'}"><a href="javascript:void(0)" type="服饰内衣">服饰内衣</a></li>
            <li :class="{'layui-this': type == '家用电器', '': type != '家用电器'}"><a href="javascript:void(0)" type="家用电器">家用电器</a></li>
            <li :class="{'layui-this': type == '数码电子', '': type != '数码电子'}"><a href="javascript:void(0)" type="数码电子">数码电子</a></li>
            <li :class="{'layui-this': type == '家庭清洁', '': type != '家庭清洁'}"><a href="javascript:void(0)" type="家庭清洁">家庭清洁</a></li>
            <li :class="{'layui-this': type == '箱包皮具', '': type != '箱包皮具'}"><a href="javascript:void(0)" type="箱包皮具">箱包皮具</a></li>
            <li :class="{'layui-this': type == '酒类', '': type != '酒类'}"><a href="javascript:void(0)" type="酒类">酒类</a></li>
            <li :class="{'layui-this': type == '家纺', '': type != '家纺'}"><a href="javascript:void(0)" type="家纺">家纺</a></li>
            <li :class="{'layui-this': type == '厨具', '': type != '厨具'}"><a href="javascript:void(0)" type="厨具">厨具</a></li>
            <li :class="{'layui-this': type == '运动户外', '': type != '运动户外'}"><a href="javascript:void(0)" type="运动户外">运动户外</a></li>
            <li :class="{'layui-this': type == '鞋靴', '': type != '鞋靴'}"><a href="javascript:void(0)" type="鞋靴">鞋靴</a></li>
            <li :class="{'layui-this': type == '珠宝首饰', '': type != '珠宝首饰'}"><a href="javascript:void(0)" type="珠宝首饰">珠宝首饰</a></li>
            <li :class="{'layui-this': type == '玩具乐器', '': type != '玩具乐器'}"><a href="javascript:void(0)" type="玩具乐器">玩具乐器</a></li>
            <li :class="{'layui-this': type == '宠物生活', '': type != '宠物生活'}"><a href="javascript:void(0)" type="宠物生活">宠物生活</a></li>
            <li :class="{'layui-this': type == '汽车用品', '': type != '汽车用品'}"><a href="javascript:void(0)" type="汽车用品">汽车用品</a></li>
            <li :class="{'layui-this': type == '家居', '': type != '家居'}"><a href="javascript:void(0)" type="家具">家具</a></li>
            <li :class="{'layui-this': type == '礼品', '': type != '礼品'}"><a href="javascript:void(0)" type="礼品">礼品</a></li>
            <li :class="{'layui-this': type == '钟表', '': type != '钟表'}"><a href="javascript:void(0)" type="钟表">钟表</a></li>
<!--
            <li>
                <span class="fly-search"><i class="layui-icon"></i></span>
            </li>
-->
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><span class="fly-mid"></span></li>

            <!-- 用户登入后显示
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="user/index.html">我发表的贴</a></li>
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="user/index.html#collection">我收藏的贴</a></li>
            -->
        </ul>

        <div class="fly-column-right layui-hide-xs">
            <a href="add.php" class="layui-btn" style="display: none">发表新帖</a>
        </div>
        <!--
                <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center; display: none;">
                    <a href="add.php" class="layui-btn">发表新帖</a>
                </div>
        -->
    </div>
</div>

<script>
    var navPanel = new Vue({
        el: '#nav-type',
        data: {
            type: "all"
        }
    });

    function getQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return decodeURI(r[2]);
        return null;
    }


    layui.use(['laypage', 'layer'], function () {
        let type = getQueryString("type");
        if (type) {
            navPanel._data.type = type;
        } else {
            navPanel._data.type = "all";
        }

        layui.$("#nav-type a").click(function (event) {
            event.preventDefault();
            let type = event.target.getAttribute("type");
            let site = getQueryString("site");
            if (!site) {
                site = "all";
            }

            window.location = "index.php?site=" + site + "&type=" + type
        });
    });
</script>
