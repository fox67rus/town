<?php
    include("include/connect.php");

    $error = ""; // переменная для ошибок
    $message = ""; // переменная для сообщений

if (isset($_POST['fullName'])) // првоеряем, что существует массив == нажата кнопка
{
    // проверяем поле ФИО
    $fullName = $_POST['fullName'];
    if (!$fullName) {
        $error = 'Вы не заполнили поле ФИО<br>';
    }

    // проверяем поле логин
    $login = $_POST['login'];
    if (!$login) {
        $error .= 'Вы не заполнили поле логин<br>';
    }

    // проверяем поле email
    $email = $_POST['email'];
    if (!$email) {
        $error .= 'Вы не заполнили поле email<br>';
    }

    // проверяем поле пароль
    $password = $_POST['password'];
    if (!$password) {
        $error .= 'Вы не заполнили поле пароль<br>';
    }

    // проверяем поле повтор пароль
    $confirmPassword = $_POST['confirmPassword'];
    if (!$confirmPassword) {
        $error .= 'Вы не заполнили поле повтор пароль<br>';
    }

    // проверяем поле повтор пароль
    if ($password != $confirmPassword) {
        $error .= 'Поле Пароль и Повтор пароля не совпадают<br>';
    }

    if (strlen($password) > 0 && strlen($password) < 6) {
        $error .= 'Длина пароля не должна быть меньше 6 символов<br>';
    }


    // проверка наличия галочки
    if (!isset($_POST['agree'])) {
        $error .= 'Вы не поставили согласие на обработку персональных данных<br>';
    }

    // Если нет ошибок
    if (!$error) {

        $sql = $connect->query(" SELECT * FROM `users` WHERE `login` = '$login' ");
        $mytable = mysqli_fetch_array($sql); //преобразование ответа запроса в массив

        if ($mytable)
        {
            $error = "Пользователь с таким логином уже зарегистрирован";
        }
        else
        {
            $connect->query("INSERT INTO `users` (`fio`, `login`, `email`, `pass`) 
                                    VALUES ('$fullName', '$login', '$email', '$password');");
            $message = 'Вы успешно зарегистрировались';
            header('Location: index.php');
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!--<a href="user.php">Перейти в личный кабинет</a>-->

<div class="modal" id="myModal">
    <div class="modal-content">
        <span class="close">&times;</span>

        <form class="registration-form" method="POST">
            <h2>Регистрационная форма</h2>

            <!-- <div class="error">Ошибка</div> -->

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
            ?>


            <div class="form-group">
                <label for="fullName">ФИО:</label>
                <input type="text" id="fullName" name="fullName">
            </div>
            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" id="login" name="login">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Повторите пароль:</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
            </div>
            <div class="form-group">
                <input type="checkbox" id="agree" name="agree" style="width: 15px;">
                <label for="agree">Согласие на обработку персональных данных</label>
            </div>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <br><a href="auth.php" style='padding-left:30px;'>Войти</a>
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