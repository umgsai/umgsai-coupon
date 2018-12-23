<?php
/**
 * Created by PhpStorm.
 * User: shangyidong
 * Date: 2018-12-23
 * Time: 19:15
 */

function checkParam($param)
{
    if (strpos($param, "drop") || strpos($param, "set") || strpos($param, "delete") || strpos($param, "or") || strpos($param, "sleep")) {
        die("dangerous SQL!");
    }
}

