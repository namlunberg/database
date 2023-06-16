<?php
header("content-type: text/html");

$conn = mysqli_connect("localhost", "root", "", "second_bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
include 'functions.php';

if (!empty($_GET['mode']) && $_GET['mode'] === 'create') {
    include 'update.php';
    include 'templates/update_form.php';
} else if ((!empty($_GET['mode']) && $_GET['mode'] === 'update') && !empty($_GET['id'])) {
    include 'update.php';
    include 'templates/update_form.php';
} else if ((!empty($_GET['mode']) && $_GET['mode'] === 'delete') && !empty($_GET['id'])) {
    $sql = "DELETE FROM table1 WHERE id = " . $_GET["id"];
    query($conn, $sql);
    header("location:" . $_SERVER['PHP_SELF']);
} else {
    include 'navigation.php';
    include 'templates/list.php';
}
// echo "<pre>";
// var_export($navArray);
// echo "<pre>";