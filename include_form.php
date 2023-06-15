<?php
$conn = mysqli_connect("localhost", "root", "", "second_bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$sql = "SHOW COLUMNS FROM table1";
$thNames = [];
if($result = mysqli_query($conn, $sql)){
    foreach($result as $row){
        $thNames[] = $row['Field'];
    }
}
$thNames = array_intersect($thNames, ["name", "age", "salary"]);

if (!empty($_POST) && !empty($_POST["submit"])) {
    $sql = 
    "INSERT INTO table1(name, age, salary) 
    VALUES
    ('" . $_POST['name'] . "'," . $_POST["age"] . "," . $_POST["salary"] . ")";
    mysqli_query($conn, $sql);
    $url = explode('?', $url);
    $url = $url[0];
    $redirect = $url . "?name=" . $_POST["name"] . "&age=" . $_POST["age"] . "&salary=" . $_POST["salary"];
    header("location:" . $redirect);
    exit;
}

?>

<form action="" method="post">
    <?foreach ($thNames as $value) {?>
        <input type="text" name="<?=$value?>" placeholder="<?=$value?>" require value="<?if(!empty($_GET["$value"])){echo $_GET["$value"];}?>">
    <?}?>
    <input type="submit" name="submit" value="сохранить">
</form>

<a href="/2.php">вернуться на главную</a>

<?php
mysqli_close($conn);
