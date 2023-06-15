<?php
header("content-type: text/html");

$conn = mysqli_connect("localhost", "root", "", "second_bd");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// до сюда важное

// функционал для удаления
if(!empty($_GET["id"])) {
    $sql = "DELETE FROM table1 WHERE Id = " . $_GET["id"];
    $result = mysqli_query($conn, $sql);
}
// функционал для удаления

// массив с заголовками
$sql = "SHOW COLUMNS FROM table1";
$thNames = [];
if($result = mysqli_query($conn, $sql)){
    foreach($result as $row){
        $thNames[] = $row['Field'];
    }
}
// массив с заголовками

// постраничная навигация
$sql = "SELECT * FROM table1";
$question = mysqli_query($conn, $sql);
$rowsOnPage = 5;
$numRows = mysqli_num_rows($question);
$numRows = round($numRows/$rowsOnPage);
$navArray = [];
if (isset($_GET['str'])) {
    $nav = $_GET['str'];
}
else {
    $nav = 0;
}

// тело постраничной навигации
echo 'Навигация: ';

for ($i=1; $i<=$numRows; $i++) {
    if ($i != $nav) {
        echo '<a href="'.$_SERVER['PHP_SELF'].'?str='.$i.'">'.$i.'</a> ';
    }
    else {
        echo '<span>'.$i.'</span> ';
    }
}
// тело постраничной навигации

// постраничная навигация

echo "<br>";

// массив со строками с учётом постраничной навигации
if (!isset($_GET['str'])) {
    $str = 0;
} else {
    $str = $_GET['str']*$rowsOnPage - $rowsOnPage;
}
$number = $str + $rowsOnPage;
$sql = ("SELECT * from table1 ORDER by Id asc limit $str, $rowsOnPage");
$tbVAlues = [];
if($question = mysqli_query($conn, $sql)){
    foreach($question as $row){
        $tbVAlues[] = $row;
    }
}
// массив со строками с учётом постраничной навигации

?>

<table>
    <thead>
        <tr>
            <?foreach($thNames as $value){?>
            <th>
                <?=$value?>
            </th>
            <?}?>
            <th>del</th>
            <th>red</th>
        </tr>
    </thead>
    <tbody>
        <?foreach($tbVAlues as $string){?>
        <tr>
            <?foreach($string as $value){?>
            <td>
                <?=$value?>
            </td>
            <?}?>
            <td>
                <a href="?id=<?=$string['Id']?>">удалить</a>
            </td>
            <td>
                <a href="/remake_form.php?Id=<?=$string['Id']?>&name=<?=$string['name']?>&age=<?=$string['age']?>&salary=<?=$string['salary']?>">редактировать</a>
            </td>
        </tr>
        <?}?>
    </tbody>
</table>
<a href="/include_form.php">добавить нового работника</a>

<?php



mysqli_close($conn);