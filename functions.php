<?php
function tableC(string $sql, mysqli $conn): array
{
    if($result = mysqli_query($conn, $sql)) {
        $array = mysqli_fetch_assoc($result);
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