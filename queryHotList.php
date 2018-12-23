<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-23
 * Time: 16:49
 */
if (!session_id()) {
    session_start();
}
require_once("include/db.php");
$sql = "select id, title, visits from umgsai_coupon order by visits desc limit 20";

require_once("include/checkSql.php");

$result = $conn->query($sql);

$hotCouponList = array();

$resultMap = array();

if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        array_push($hotCouponList, $row);
    }
    $resultMap['hotCouponList'] = $hotCouponList;
} else {
//    $resultMap['totalCount'] = 0;
}
echo json_encode($resultMap);
$conn->close();