<?php
$conn = mysqli_connect("localhost", "root", "", "second_bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

echo "<pre>";
var_export($_POST);
echo "<pre>";


if (!empty($_POST) && !empty($_POST["submit"])) {
    $sql = 
    "UPDATE table1 SET name = '" . $_POST['name'] . "', age = " . $_POST["age"] . ", salary = " . $_POST["salary"] . " WHERE Id = " . $_POST["Id"];
    echo $sql;
    mysqli_query($conn, $sql);
    $url = explode('?', $url);
    $url = $url[0];
    $redirect = $url . "?Id=" . $_POST["Id"] . "&name=" . $_POST["name"] . "&age=" . $_POST["age"] . "&salary=" . $_POST["salary"];
    header("location:" . $redirect);
    exit;
}

if (!empty($_GET)) {?>
    <form action="" method="post">
        <input type="text" name="Id" require value="<?=$_GET["Id"]?>" hidden>
        <input type="text" name="name" require value="<?=$_GET["name"]?>">
        <input type="text" name="age" require value="<?=$_GET["age"]?>">
        <input type="text" name="salary" require value="<?=$_GET["salary"]?>">
        <input type="submit" name="submit" value="сохранить">
    </form>
    <a href="/2.php">вернуться на главную</a>
<?} else {
    header("location:/2.php");
}