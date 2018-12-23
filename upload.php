<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-21
 * Time: 22:16
 */
if (!session_id()) {
    session_start();
}
if ($_FILES["file"]["error"] > 0) {
    die ("Error: " . $_FILES["file"]["error"] . "<br />");
} else {
    /*
     *
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Stored in: " . $_FILES["file"]["tmp_name"];
     */

    $fileName = time();
//    echo $fileName;

    if (file_exists("upload/" . $_FILES["file"]["name"])) {
//        die($_FILES["file"]["name"] . " already exists. ");
        $result['status'] = 0;
        $result['url'] = $_FILES["file"]["name"] . " already exists. ";
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode($result));
    } else {
        $fileNameArray = explode('.', $_FILES["file"]["name"]);
        $fileType = $fileNameArray[count($fileNameArray) - 1];
        move_uploaded_file($_FILES["file"]["tmp_name"],
            "upload/" . $fileName . "." . $fileType);
//        echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
        $result['status'] = 0;
        $result['url'] = "upload/" . $fileName . "." . $fileType;
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode($result));
    }

}