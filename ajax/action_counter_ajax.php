<?php
    include("../include/connect.php");

    $sql = $connect->query("
                            SELECT COUNT(*) AS kolvo FROM `issues` WHERE `status` = 'Решена'
                            ");

    $myRow = mysqli_fetch_array($sql);
    $otvet = array("count" => $myRow['kolvo']);

    echo json_encode($otvet);
