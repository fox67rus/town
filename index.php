<?php include("include/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/head.php"); ?>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>-->
    <title>Городской портал</title>
</head>

<body>
    <div class="container">

    <?php include("include/header.php"); ?>

    <div class="welcome-section">
        <h1>Городской портал</h1>
        <h2>по приёму заявок на устранение проблем в городе</h2>
        <p>Добро пожаловать на городской портал! Мы заботимся о благополучии нашего города и приглашаем вас
            присоединиться к улучшению жизни в нашем сообществе. Сообщите нам о проблемах, с которыми вы сталкиваетесь,
            и вместе мы сделаем наш город лучше!</p>
    </div>

    <section class="problem-section">

        <div class="problem-header">
            <h2>Последние решённые проблемы</h2>
            <p>Решено проблем: <span id="counter">345</span></p>
        </div>

        <div class="solved-problems">

            <?php
                $sql = $connect->query("
                                SELECT 
                                    `issues`.`id`,
                                    `issues`.`metka`,
                                    `issues`.`photo`,
                                    `issues`.`photo_after`,
                                    `issues`.`description`,
                                    `issues`.`name` AS issue_name,
                                    `categories`.`name` AS category_name
                                
                                FROM 
                                    `issues`, `categories` 
                                WHERE 
                                    `issues`.`id_category` = `categories`.`id` AND `issues`.`status` = 'Решена'
                                ORDER BY `issues`.`id` DESC 
                                LIMIT 3
                                ");

                $myRow = mysqli_fetch_array($sql);

                do {
                    echo
                    "
                        <div class='problem-card'>
                            <div class='hover-image-container'>
                                <img
                                    src='{$myRow["photo_after"]}'
                                    alt='Фото проблемы'
                                    class='hover-image'
                                    data-original='{$myRow["photo_after"]}'
                                    data-hover='{$myRow["photo"]}'
                                >
                            </div>
                            <div class='problem-info'>
                                <h3>{$myRow['issue_name']}</h3>
                                <p class='category'>{$myRow['category_name']}</p>
                                <p class='date'>{$myRow['metka']}</p>
                                <p>{$myRow['description']}</p>
                            </div>
                        </div>
                    ";
                }
                while($myRow = mysqli_fetch_array($sql))
            ?>

        </div>
    </section>

    <?php include("include/footer.php"); ?>

</div>  <!-- Закрытие контейнера -->


    <!-- TODO: перенести регистрацию в отдельный файл -->
    <!-- Модальное окно для регистрации -->
    <div id="registrationModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeRegistrationModal">&times;</span>
            <h2>Регистрация</h2>
            <form id="registrationForm">
                <label for="fullName">ФИО:</label>
                <input type="text" id="fullName" name="fullName" required>

                <label for="username">Логин:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirmPassword">Повторите пароль:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>

                <button type="submit">Зарегистрироваться</button>
                <label>
                    <input type="checkbox" id="agree" name="agree" checked required>
                    Нажимая на кнопку, вы соглашаетесь с условиями <a href="privacy-policy.php">обработки персональных данных</a>
                </label>
            </form>
        </div>
    </div>

<!--     Модальное окно для авторизации-->
    <div id="loginForm" class="modal">
        <div class="modal-content">
            <span class="close" id="closeLoginModal">&times;</span>
            <h2>Авторизация</h2>
            <form id="loginForm" method="post">
                <label for="loginUsername">Логин:</label>
                <input type="text" id="loginUsername" name="loginUsername" placeholder="Email" required>

                <label for="loginPassword">Пароль:</label>
                <input type="password" id="loginPassword" name="loginPassword" placeholder="Пароль" required>
                <div class="loginButtons">
                    <button type="submit">Войти</button>
                    <span class="repairPassword"><a href="#">Восстановить пароль</a></span>
                </div>

            </form>
        </div>
    </div>

<!--    <audio id="notificationSound" src="js/tik.wav" autoplay="false"></audio>-->

    <script src="js/ajax/counter.js"></script>
<!--    <script src="js/ajax/auth.js"></script>-->
    <script src="js/main.js" type="text/javascript"></script>

</body>

</html>
