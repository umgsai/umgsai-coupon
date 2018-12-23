<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-21
 * Time: 21:54
 */
if (!session_id()) {
    session_start();
}
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
if ("POST" != $REQUEST_METHOD) {
    die("非法请求");
}
//echo $_SESSION['admin'];
if (!isset($_SESSION['admin'])) {
    die("error! please login as admin");
}
$type = $_POST['type'];
$site = $_POST['site'];
$title = $_POST['title'];
$content = $_POST['content'];

require_once("include/checkSql.php");
checkParam($type);
checkParam($site);
checkParam($title);
checkParam($content);

require_once("include/db.php");


$sql = "INSERT INTO umgsai_coupon (site, type, title, content, create_time, update_time) VALUES ('" . $site . "','" . $type . "', '" . $title . "','" . $content . "', now(), now())";

//die("");
//echo $sql;

if ($conn->query($sql) === TRUE) {
    $result['status'] = 0;
    $result['action'] = "index.php";
    $result['msg'] = "添加成功";
//    $result['url'] = "upload/" . $fileName . "." . $fileType;
    header('Content-Type:application/json; charset=utf-8');
    exit(json_encode($result));
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();