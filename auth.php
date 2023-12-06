<?php
include("include/connect.php");

$error = ""; // переменная для ошибок
$message = ""; // переменная для сообщений

if (isset($_POST['login'])) // првоеряем, что существует массив == нажата кнопка
//    echo "<pre>";
//    echo print_r($_POST);
//    echo "</pre>";
{
    // проверяем поле логин
    $login = $_POST['login'];
    if (!$login) {
        $error .= 'Вы не заполнили поле логин<br>';
    }

    // проверяем поле пароль
    $password = $_POST['password'];
    if (!$password) {
        $error .= 'Вы не заполнили поле пароль<br>';
    }

    // Если нет ошибок
    if (!$error) {

        $sql = $connect->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
        $mytable = mysqli_fetch_array($sql); //преобразование ответа запроса в массив

        if ($mytable["id"]) {
            $_SESSION["id_user"] = $mytable["id"]; //записываем в сессию данные пользователя данные из БД
            $_SESSION["fio"] = $mytable["fio"];
            $_SESSION["role"] = $mytable["role"];
            if ($_SESSION["role"] == 1) {
                header('Location: admin.php');
            } else {
                header('Location: user.php');
            }

        } else {
            $error .= "Пользователь не зарегистрирован";
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="modal" id="myModal">
    <div class="modal-content">
        <span class="close">&times;</span>

        <form class="auth-form" method="POST">
            <h2>Авторизация</h2>

            <?php
            /* echo "<pre>";
             print_r($_POST);
             echo "</pre>";

             echo "Вы ввели:  {$_POST['fullName']} <br> Ваш логин:  {$_POST['login']} ";

         */

            if ($error) {
                echo "<div class='error'>$error</div>";
            }

            if ($message) {
                echo "<div class='error' style='background: green'>$message</div>";
            }

            //            echo "<pre>";
            //            print_r($_SESSION);
            //            echo "</pre>";
            ?>

            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" id="login" name="login">
            </div>

            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit">Войти</button>

            <br>
            <a href="reg.php">Зарегистрироваться</a>


        </form>

    </div>
</div>

<button id="openModal" style="margin-top: 50px;">Открыть модальное окно</button>

<script>
    const openModalBtn = document.getElementById('openModal');
    const modal = document.getElementById('myModal');
    const closeModalBtn = document.querySelector('.close');

    openModalBtn.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    closeModalBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });
</script>


<style>

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .error {
        padding: 5px;
        background: #9f4f4f;
        color: white;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .modal {
        display: block;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        overflow: scroll; /* добавить скрол форме */
    }

    .modal-content {
        background-color: #fefefe;
        padding: 20px;
        border-radius: 5px;
        width: 360px;
        margin: 0 auto;
        margin-top: 20px;
    }

    .close {
        float: right;
        cursor: pointer;
    }

    .close:hover {
        color: red;
    }

    .registration-form {
        width: 300px;
        margin: 0 auto;
    }

    h2 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="checkbox"] {
        width: calc(100% - 12px);
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button {
        display: block;
        width: 300px;
        padding: 10px;
        margin-top: 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin: 0 auto;
    }

    button:hover {
        background-color: #0056b3;
    }


</style>


</body>
</html>