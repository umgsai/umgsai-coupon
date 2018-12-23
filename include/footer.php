<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-21
 * Time: 21:07
 */
if (!session_id()) {
    session_start();
}
if (isset($_SESSION['admin'])) {
    ?>
    <script>
        layui.use(['util', 'layer'], function () {
            //固定Bar
            layui.util.fixbar({
                bar1: '&#xe642;'
                , bgcolor: '#009688'
                , click: function (type) {
                    if (type === 'bar1') {
                        // layer.msg('打开 index.js，开启发表新帖的路径');
                        location.href = 'add.php';
                    }
                }
            });
        });
    </script>
    <?php
}
?>
<div class="fly-footer">
    <p>
        <a href="http://www.umgsai.cn/" target="_blank">优赛社区</a>
        2018 &copy;
        <a href="http://www.umgsai.cn/" target="_blank">umgsai.cn 出品</a>
    </p>
    <p>
        <!--        <a href="http://fly.layui.com/jie/3147/" target="_blank">付费计划</a>-->
        <!--        <a href="http://www.layui.com/template/fly/" target="_blank">获取Fly社区模版</a>-->
        <!--        <a href="http://fly.layui.com/jie/2461/" target="_blank">微信公众号</a>-->
    </p>
</div>
<script>
    layui.use(['util', 'layer'], function () {


        layui.$.ajax({
            type: "GET",
            url: "queryHotList.php",
            dataType: "json",
            // data: args,
            success: function (data) {
                if (!data) {
                    // layui.layer.alert("未查询到优惠券！");
                    return;
                }
                for (let i = 0; i < data.hotCouponList.length; i++) {
                    data.hotCouponList[i].link = 'detail.php?id=' + data.hotCouponList[i].id;
                }
                let hotCouponList = data.hotCouponList;
                app.hotCouponList = hotCouponList;
            }
        });
    });


</script>
