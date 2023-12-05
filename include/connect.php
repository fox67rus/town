<?php
    session_start(); //запуск сессии
    $connect = mysqli_connect("localhost", "admin", "admin", "test"); // подключение к БД
    if (!$connect) {
        echo "Не удалось подключиться к БД";
    }
