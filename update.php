<?php
$mode = $_GET['mode'];
if (!empty($_GET['id']) && $mode==='update') {

    if (!empty($_POST) && !empty($_POST["submit"])) {
        $sql = 
        "UPDATE table1 SET name = '" . $_POST['name'] . "', age = " . $_POST["age"] . ", salary = " . $_POST["salary"] . " WHERE id = " . $_POST["id"];
        $urlGet = "?id=" . $_POST["id"]."&mode=update";
        mysqli_query($conn, $sql);
        $url = explode('?', $url);
        $url = $url[0];
        $redirect = $url . $urlGet;
        header("location:" . $redirect);
        exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * from table1 WHERE id =" . $id;
    $row = tableC($sql, $conn, ['name', 'age', 'salary']);
    $name = $row["name"];
    $age = $row["age"];
    $salary = $row["salary"];

} elseif($mode==='create') {

    if (!empty($_POST) && !empty($_POST["submit"])) {
        $sql = 
        "INSERT INTO table1(name, age, salary) 
        VALUES
        ('" . $_POST['name'] . "'," . $_POST["age"] . "," . $_POST["salary"] . ")";
        mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        $urlGet = "?id=" . $id."&mode=update";
        
        $url = explode('?', $url);
        $url = $url[0];
        $redirect = $url . $urlGet;
        header("location:" . $redirect);
        exit;
    }
}



