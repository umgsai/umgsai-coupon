<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-23
 * Time: 18:53
 */
if (!session_id()) {
    session_start();
}
if (!isset($_SESSION['admin'])){
    die("error");
}

header("content-type:application/json;charset=utf-8");
$id = $_GET['id'];
require_once("include/checkSql.php");
checkParam($id);

require_once("include/db.php");
$sql = "delete from umgsai_coupon where id = " . $id;

//echo $sql;
$result = $conn->query($sql);
//echo "{'success':true}";
$conn->close();
header("location:index.php");