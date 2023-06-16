<?php
// постраничная навигация
    
    $sql = "SELECT * FROM table1";
    $question = mysqli_query($conn, $sql);
    $rowsOnPage = 5;
    $numRows = ceil(mysqli_num_rows($question)/$rowsOnPage);
    $navArray = [];
    if (isset($_GET['str'])) {
        $nav = $_GET['str'];
        $str = $_GET['str']*$rowsOnPage - $rowsOnPage;
    }
    else {
        $nav = 0;
        $str = 0;
    }

    for ($i=1; $i<=$numRows; $i++) {
        if ($i != $nav) {
            $navArray[] = '<a href="'.$_SERVER['PHP_SELF'].'?str='.$i.'">'.$i.'</a> ';
        }
        else {
            $navArray[] = '<span>'.$i.'</span> ';
        }
    }
    // постраничная навигация

    // массив со строками и заголовками с учётом постраничной навигации
    $sql = "SELECT * from table1 ORDER by id asc limit $str, $rowsOnPage";
    $tbVAlues = tableRowsFields($sql, $conn, ['id', 'name', 'age', 'salary']);
    $thNames = array_keys($tbVAlues[0]);
    // массив со строками и заголовками с учётом постраничной навигации