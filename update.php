<?php
$mode = $_GET['mode'];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * from table1 WHERE id =" . $id;
    $row = tableRowsFields($sql, $conn, ['name', 'age', 'salary']);
    $name = $row[0]["name"];
    $age = $row[0]["age"];
    $salary = $row[0]["salary"];
} elseif((isset($_GET['name']) && !empty($_GET['name'])) && $mode==='create') {
    $name = $_GET["name"];
    $age = $_GET["age"];
    $salary = $_GET["salary"];
}


if (!empty($_POST) && !empty($_POST["submit"])) {
    if ($_POST['mode'] === 'create') {
        $sql = 
        "INSERT INTO table1(name, age, salary) 
        VALUES
        ('" . $_POST['name'] . "'," . $_POST["age"] . "," . $_POST["salary"] . ")";
        $urlGet = "?name=" . $_POST["name"] . "&age=" . $_POST["age"] . "&salary=" . $_POST["salary"] . "&mode=" . $_POST["mode"];
    } elseif ($_POST['mode'] = 'update') {
        $sql = 
        "UPDATE table1 SET name = '" . $_POST['name'] . "', age = " . $_POST["age"] . ", salary = " . $_POST["salary"] . " WHERE id = " . $_POST["id"];
        $urlGet = "?id=" . $_POST["id"] . "&name=" . $_POST["name"] . "&age=" . $_POST["age"] . "&salary=" . $_POST["salary"] . "&mode=" . $_POST["mode"];
    }
    mysqli_query($conn, $sql);
    $url = explode('?', $url);
    $url = $url[0];
    $redirect = $url . $urlGet;
    header("location:" . $redirect);
    exit;
}
?>






