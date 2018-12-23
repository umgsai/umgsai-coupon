<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-21
 * Time: 23:09
 */
if (!session_id()) {
    session_start();
}

$id = $_GET['id'];
require_once("include/checkSql.php");
checkParam($id);
require_once("include/db.php");

$sql = "select * from umgsai_coupon where id = " . $id;
//echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"] . " - Name: " . $row["create_time"] . " " . $row["update_time"] . "<br>";
        if (isset($_SESSION['admin'])) {
            $row['deleteLink'] = "delete.php?id=" . $row['id'];
        }
        echo json_encode($row);
    }
} else {
    echo "{}";
}
$conn->close();

