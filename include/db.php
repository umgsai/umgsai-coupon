<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-22
 * Time: 11:55
 */

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "umgsai";

$mysqli = new mysqli('127.0.0.1', 'root', '123456', 'umgsai', '3306');

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
mysqli_set_charset($conn, 'utf8');