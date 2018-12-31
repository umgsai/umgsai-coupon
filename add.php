<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-21
 * Time: 21:21
 */
header("content-type:text/html;charset=utf-8");
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>发布优惠券</title>
    <?php include 'include/head.php' ?>
</head>
<body>
<?php include 'include/header.php'; ?>
<?php include 'include/navPanel.php'; ?>

<div class="layui-container fly-marginTop">
    <div class="fly-panel" pad20 style="padding-top: 5px;">
        <!--<div class="fly-none">没有权限</div>-->
        <div class="layui-form layui-form-pane">
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <ul class="layui-tab-title">
                    <li class="layui-this">发表新帖<!-- 编辑帖子 --></li>
                </ul>
                <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                    <div class="layui-tab-item layui-show">
                        <form action="addCoupon.php" method="post">
                            <div class="layui-row layui-col-space15 layui-form-item">
                                <div class="layui-col-md6">
                                    <label class="layui-form-label">来源</label>
                                    <div class="layui-input-block">
                                        <select lay-verify="required" v-model="site" name="site" lay-filter="column">
                                            <option value="京东">京东</option>
                                            <option value="淘宝">淘宝</option>
                                            <option value="拼多多">拼多多</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-col-md6">
                                    <label class="layui-form-label">所在专栏</label>
                                    <div class="layui-input-block">
                                        <select lay-verify="required" v-model="type" name="type" lay-filter="column">
                                            <option></option>
                                            <option value="水果生鲜">水果生鲜</option>
                                            <option value="食品饮料">食品饮料</option>
                                            <option value="文学图书">文学图书</option>
                                            <option value="家居日用">家居日用</option>
                                            <option value="个人护理">个人护理</option>
                                            <option value="母婴用品">母婴用品</option>
                                            <option value="美妆护肤">美妆护肤</option>
                                            <option value="服饰内衣">服饰内衣</option>
                                            <option value="家用电器">家用电器</option>
                                            <option value="数码电子">数码电子</option>
                                            <option value="家庭清洁">家庭清洁</option>
                                            <option value="箱包皮具">箱包皮具</option>
                                            <option value="酒类">酒类</option>
                                            <option value="家纺">家纺</option>
                                            <option value="厨具">厨具</option>
                                            <option value="运动户外">运动户外</option>
                                            <option value="鞋靴">鞋靴</option>
                                            <option value="珠宝首饰">珠宝首饰</option>
                                            <option value="玩具乐器">玩具乐器</option>
                                            <option value="宠物生活">宠物生活</option>
                                            <option value="汽车用品">汽车用品</option>
                                            <option value="家具">家具</option>
                                            <option value="礼品">礼品</option>
                                            <option value="钟表">钟表</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-row layui-col-space15 layui-form-item">
                                <div class="layui-col-md12">
                                    <label for="L_title" class="layui-form-label">标题</label>
                                    <div class="layui-input-block">
                                        <input type="text" id="L_title" name="title" required lay-verify="required" v-model="title"
                                               autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                            </div>
                            <div class="layui-row layui-col-space15 layui-form-item">
                                <div class="layui-col-md12">
                                    <label for="L_title" class="layui-form-label">图片链接</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="imgUrls" v-model="imgUrls" class="layui-input" placeholder="英文逗号分隔">
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="layui-row layui-col-space15 layui-form-item layui-hide" id="LAY_quiz">
                                <div class="layui-col-md3">
                                    <label class="layui-form-label">所属产品</label>
                                    <div class="layui-input-block">
                                        <select name="project">
                                            <option></option>
                                            <option value="layui">layui</option>
                                            <option value="独立版layer">独立版layer</option>
                                            <option value="独立版layDate">独立版layDate</option>
                                            <option value="LayIM">LayIM</option>
                                            <option value="Fly社区模板">Fly社区模板</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-col-md3">
                                    <label class="layui-form-label" for="L_version">版本号</label>
                                    <div class="layui-input-block">
                                        <input type="text" id="L_version" value="" name="version" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-col-md6">
                                    <label class="layui-form-label" for="L_browser">浏览器</label>
                                    <div class="layui-input-block">
                                        <input type="text" id="L_browser"  value="" name="browser" placeholder="浏览器名称及版本，如：IE 11" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                            </div>
                                -->
                            <div class="layui-form-item layui-form-text">
                                <div class="layui-input-block">
                                    <textarea id="L_content" name="content" required lay-verify="required"
                                              onkeyup="edit()"
                                              placeholder="详细描述" class="layui-textarea fly-editor"
                                              style="height: 260px;"></textarea>
                                </div>
                            </div>
                            <!--
                                                        <div class="layui-form-item">
                                                            <div class="layui-inline">
                                                                <label class="layui-form-label">悬赏飞吻</label>
                                                                <div class="layui-input-inline" style="width: 190px;">
                                                                    <select name="experience">
                                                                        <option value="20">20</option>
                                                                        <option value="30">30</option>
                                                                        <option value="50">50</option>
                                                                        <option value="60">60</option>
                                                                        <option value="80">80</option>
                                                                    </select>
                                                                </div>
                                                                <div class="layui-form-mid layui-word-aux">发表后无法更改飞吻</div>
                                                            </div>
                                                        </div>
                                                        <div class="layui-form-item">
                                                            <label for="L_vercode" class="layui-form-label">人类验证</label>
                                                            <div class="layui-input-inline">
                                                                <input type="text" id="L_vercode" name="vercode" required lay-verify="required" placeholder="请回答后面的问题" autocomplete="off" class="layui-input">
                                                            </div>
                                                            <div class="layui-form-mid">
                                                                <span style="color: #c00;">1+1=?</span>
                                                            </div>
                                                        </div>
                            -->
                            <div class="layui-form-item">
                                <button class="layui-btn" lay-filter="*" lay-submit>立即发布</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php'; ?>

<!--<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>-->


<script>
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
    }).use('fly');

    var app = new Vue({
        el: '#LAY_ucm',
        data: {
            message: 'Hello Vue!',
            type: "水果生鲜",
            site: "京东",
            title: "",
            imgUrls: ""
        }
    });

    function edit(){
        if (layui.$("textarea").val() && layui.$("textarea").val().length > 1){
            app._data.title = layui.$("textarea").val().split("\n")[0];
        }
    }

    layui.use(['laypage', 'layer'], function () {

        var edit = function () {

        }
    });
</script>

</body>
</html>