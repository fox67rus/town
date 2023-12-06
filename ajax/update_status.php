<?php
    include("../include/connect.php");

    // Получение данных из GET-запроса
    $issueId = $_GET['issue_id'];
    $newStatus = $_GET['new_status'];

    // Обновление статуса в БД
    $sql = "UPDATE issues SET status = '$newStatus' WHERE id = '$issueId'";

    if ($connect->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $connect->error]);
    }

    // Закрытие соединения с БД
    $connect->close();







