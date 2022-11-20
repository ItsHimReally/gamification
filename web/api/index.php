<?php
header('Content-type: text/html; charset=utf-8');
function connectDB() {
    $login = "u31786_gocode";
    $pass = "B5g0R0r6J4";
    $name_db = "u31786_gocode";
    $server = "db4.myarena.ru";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $link = mysqli_connect($server, $login, $pass, $name_db);
    mysqli_set_charset($link, 'utf8');
    return $link;
}
function error($text) {
    $status = array(
        "status" => false,
        "error" => $text
    );
    echo json_encode($status, JSON_FORCE_OBJECT);
    exit;
}
$link = connectDB();
if (!$link) {
    error ("Error connecting to database");
}

if (!$_GET) {
    error ("No parameters in GET response");
}

if ($_GET["awards"] == 1) {
    $query = mysqli_query($link, "SELECT * FROM `awards`");
    $resultArr = array();
    while ($result = mysqli_fetch_array($query)) {
        $resultArr[$result["category"]][] = $result;
    }
    echo json_encode($resultArr, JSON_UNESCAPED_UNICODE);
    exit;
}

if (isset($_GET["user"]) && preg_match("/^[0-9]+$/", $_GET["user"])) {
    // #TODO: Prepared Statement
    $result = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `users` WHERE `id` = ".$_GET["user"]));
    if (!$result) {
        error("There is no such user");
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
} else {
    error("Incorrect user");
}