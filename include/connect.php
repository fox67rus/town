<?php
    session_start(); //запуск сессии

    $connect = mysqli_connect("localhost", "admin", "admin", "test"); // подключение к БД

    // Проверка соединения
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
        echo "Ошибка подключения к БД";
    }

