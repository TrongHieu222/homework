<?php
//require_once ('config.php');

define('HOST', 'localhost');
define('DATABASE', 'db1656');
define('USERNAME', 'root');
define('PASSWORD', '');

/**
 * insert, update, delete -> su dung function
 */
function execute($sql) {
    //create connection toi database
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, db156);

    //query
    mysqli_query($conn, $sql);

    //dong connection
    mysqli_close($conn);
}

/**
 * su dung cho lenh select => tra ve ket qua
 */
function executeResult($sql) {
    //create connection toi database
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, 'db156');

    //query
    $resultset = mysqli_query($conn, $sql);
    $list      = [];
    while ($row = mysqli_fetch_array($resultset, 1)) {
        $list[] = $row;
    }

    //dong connection
    mysqli_close($conn);

    return $list;
}