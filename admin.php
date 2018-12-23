<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-23
 * Time: 18:05
 */
if (!session_id()) {
    session_start();
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == "445013022") {
        $_SESSION['admin'] = "445013022";
        header("location:index.php");
    }
} else {
    unset($_SESSION['admin']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登入</title>
    <?php include 'include/head.php'; ?>

</head>
<body>
<?php include 'include/header.php'; ?>
<div class="layui-container fly-marginTop">
    <div class="fly-panel fly-panel-user" pad20>
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title">
                <li class="layui-this">登入</li>
                <!--                <li><a href="reg.html">注册</a></li>-->
            </ul>
            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form layui-form-pane">
                        <form action="admin.php" method="post">
                            <div class="layui-form-item">
                                <label for="L_pass" class="layui-form-label">密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" id="L_pass" name="password" required lay-verify="required"
                                           autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button class="layui-btn" lay-filter="*" lay-submit>立即登录</button>
                                <span style="padding-left:20px;">
<!--                  <a href="forget.html">忘记密码？</a>-->
                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    layui.cache.page = 'user';
    layui.cache.user = {
        username: '游客'
        , uid: -1
        , avatar: 'static/images/avatar/00.jpg'
        , experience: 83
        , sex: '男'
    };
    layui.config({
        version: "3.0.0"
        , base: "static/mods/'
    }).extend({
        fly: 'index'
    }).use('fly');
</script>

</body>
</html>
