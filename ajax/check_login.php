<?php
    include("../include/connect.php");

    echo "<b> запустили php </b>";

    // Получаем данные из AJAX-запроса
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Защита от SQL-инъекций (используйте подготовленные запросы, если это возможно)
    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);

    // Подготовка и выполнение SQL-запроса
    $sql = "SELECT * FROM `users` WHERE `login` = '$username' AND `pass` = '$password'";
    $result = $connect->query($sql);

    // Проверка наличия пользователя в базе данных
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array('success' => true);

        // Добавляем данные пользователя в сессию
        $_SESSION["id_user"] = $row["id"];
        $_SESSION["fio"] = $row["fio"];
        $_SESSION["role"] = $row["role"];
    } else {
        // Пользователь не найден
        $response = array('success' => false);
    }

    // Отправка ответа в формате JSON
    header('Content-Type: application/json');
    echo json_encode($response);

    // Закрытие соединения с базой данных
    $connect->close();

