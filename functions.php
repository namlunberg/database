<?php
function query(mysqli $conn, string $sql): void
{
    mysqli_query($conn, $sql);
}

function tableColsName(string $sql, mysqli $conn): array
{
    if($result = mysqli_query($conn, $sql)) {
        $result = mysqli_fetch_assoc($result);
        $array = array_keys($result);
    }
    return $array;
}


function tableRowsFields(string $sql, mysqli $conn, array $fileds = []): array
{
    $array = [];
    if($result = mysqli_query($conn, $sql)) {
        foreach($result as $row){
            $resRow = [];
            if (!empty($fileds)) {
                foreach ($fileds as $fild) {
                    $resRow[$fild] = $row[$fild];
                }
            } else {
                $resRow = $row;
            }
            $array[] = $resRow;
        }
    }
    return $array;
}