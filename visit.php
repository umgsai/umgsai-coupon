<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-23
 * Time: 17:26
 */
if (!session_id()) {
    session_start();
}
header("content-type:application/json;charset=utf-8");
$id = $_GET['id'];
require_once("include/checkSql.php");
checkParam($id);

require_once("include/db.php");
$sql = "update umgsai_coupon set visits = visits + 1 where id = " . $id;
//echo $sql;
$result = $conn->query($sql);
echo "{'success':true}";
$conn->close();