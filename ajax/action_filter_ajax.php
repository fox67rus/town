<?php
    include("../include/connect.php");

    $idUser = $_SESSION['id_user'];
    $allowedStatuses = ["all", "Новая", "Решена", "Отклонена"];

    // Получаем данные из AJAX-запроса
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $filter = isset($_GET["filter"]) ? $_GET["filter"] : "all";

        if (!in_array($filter, $allowedStatuses)) {
            // Значение не допустимо, используем значение по умолчанию
            echo $filter;
            $filter = "all";
        }
    }

    if ($filter == 'all' || empty($filter)) {
        $sql2 = $connect->query("
                            SELECT 
                                `issues`.`id`,
                                `issues`.`metka`,
                                `issues`.`name` AS issue_name,
                                `issues`.`description`,
                                `categories`.`name` AS category_name,
                                `issues`.`status` 
                            FROM 
                                `issues`, `categories` 
                            WHERE 
                                `issues`.`id_category` = `categories`.`id` AND `issues`.`id_user` = '$idUser'
                            ORDER BY `issues`.`id` DESC
                            ");

    } elseif (in_array($filter, $allowedStatuses)){
        $sql2 = $connect->query("
                            SELECT 
                                `issues`.`id`,
                                `issues`.`metka`,
                                `issues`.`name` AS issue_name,
                                `issues`.`description`,
                                `categories`.`name` AS category_name,
                                `issues`.`status` 
                            FROM 
                                `issues`, `categories` 
                            WHERE 
                                `issues`.`id_category` = `categories`.`id` AND `issues`.`id_user` = '$idUser' AND `issues`.`status` = '$filter'
                            ORDER BY `issues`.`id` DESC
                            ");
    } else {
        echo "Что-то пошло не так при получении заявок с выбранным фильтром";
    }

    if ($sql2->num_rows > 0)
    {
        $data = [];

        while ($row = $sql2->fetch_assoc())
        {
            $data[] = $row;
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);

    }


