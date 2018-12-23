<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-22
 * Time: 10:46
 */
//$type = $_GET['type'];
//$site = $_GET['site'];
if (!session_id()) {
    session_start();
}

if (!isset($_GET['type']) || true === empty($_GET['type'])) {
    $type = "all";
} else {
    $type = $_GET['type'];
}
if (!isset($_GET['site']) || true === empty($_GET['site'])) {
    $site = 1;
} else {
    $site = $_GET['site'];
}
if (!isset($_GET['pageNum']) || true === empty($_GET['pageNum'])) {
    $pageNum = 1;
} else {
    $pageNum = $_GET['pageNum'];
}
if (!isset($_GET['pageSize']) || true === empty($_GET['pageSize'])) {
    $pageSize = 20;
} else {
    $pageSize = $_GET['pageSize'];
}
$offSet = $pageSize * ($pageNum - 1);

require_once("include/db.php");

require_once("include/checkSql.php");
checkParam($type);
checkParam($site);
checkParam($pageNum);
checkParam($pageSize);

if (true === empty($site) || $site == "all") {
    if (true === empty($type) || $type == "all") {
        $sql = "select * from umgsai_coupon order by id desc limit " . $offSet . " , " . $pageSize;
        $countSql = "select count(1) as totalCount from umgsai_coupon";
    } else {
        $sql = "select * from umgsai_coupon where type = '" . $type . "' order by id desc limit " . $offSet . " , " . $pageSize;
        $countSql = "select count(1) as totalCount from umgsai_coupon where type = '" . $type . "'";
    }
} else {
    if (true === empty($type) || $type == "all") {
        $sql = "select * from umgsai_coupon where site = '" . $site . "' order by id desc limit " . $offSet . " , " . $pageSize;
        $countSql = "select count(1) as totalCount from umgsai_coupon where site = '" . $site . "'";
    } else {
        $sql = "select * from umgsai_coupon where site = '" . $site . "' and type = '" . $type . "' order by id desc limit " . $offSet . " , " . $pageSize;
        $countSql = "select count(1) as totalCount from umgsai_coupon where site = '" . $site . "' and type = '" . $type . "'";
    }
}

//echo $sql;
//echo "<br/>";
//echo $countSql;
$result = $conn->query($sql);
//echo json_encode($result);
//die();
$couponList = array();

$resultMap = array();
$resultMap['totalCount'] = 0;
$resultMap['pageNum'] = $pageNum;
$resultMap['pageSize'] = $pageSize;
//echo json_encode($result);
if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        array_push($couponList, $row);
    }
//    echo json_encode($couponList);

    $resultMap['couponList'] = $couponList;
    $totalCountResult = $conn->query($countSql);
    if ($totalCountResult->num_rows > 0) {
        while ($row = $totalCountResult->fetch_assoc()) {
//            array_push($couponList, $row);
//            echo json_encode($row);
            $totalCount = $row['totalCount'];
            $resultMap['totalCount'] = $totalCount;
            $resultMap['totalPage'] = intval($totalCount / $pageSize) + 1;

            break;

        }
    }
    /*
        while ($row = $totalCountResult->fetch_assoc()) {
//            echo json_encode($row);
            $totalCount = $row['totalCount'];
            $resultMap['totalCount'] = $totalCount;
        }
    }
    */

} else {
//    echo "{}";
    $resultMap['totalCount'] = 0;
}
echo json_encode($resultMap);
$conn->close();
?>