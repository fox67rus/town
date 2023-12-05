<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
            <h2>Решенные проблемы</h2>
            <p>Решено проблем: <span id="counter">345</span></p>
        </div>

        <div class="solved-problems">
            <div class="problem-card">
                <div class="hover-image-container">
                    <img
                        src="img/problems/problem1-after.jpg"
                        alt="Фото проблемы"
                        class="hover-image"
                        data-original="img/problems/problem1-after.jpg"
                        data-hover="img/problems/problem1.jpg"
                    >
                </div>
                <div class="problem-info">
                    <h3>Сломаны почтовые ящики</h3>
                    <p class="category">Мой дом</p>
                    <p class="date">01.01.2023</p>
                    <p>В подъезде дома №5 сломано крепление почтового ящика, что вызывает
                        неудобства для жителей данного дома и может привести к потере почтовых отправлений</p>
                </div>
            </div>
            <div class="problem-card">
                <div class="hover-image-container">
                    <img
                        src="img/problems/problem2-after.jpg"
                        alt="Фото проблемы"
                        class="hover-image"
                        data-original="img/problems/problem2-after.jpg"
                        data-hover="img/problems/problem2.jpg"
                    >
                </div>
                <div class="problem-info">
                    <h3>Не горят фонари</h3>
                    <p class="category">Дворовая территория</p>
                    <p class="date">01.01.2023</p>
                    <p>В переулке между улицами Пушкина и Лермонтова возникла серьезная проблема – уличные фонари
                        перестали работать. Эта ситуация создает темные и небезопасные условия для пешеходов и жителей
                        района.</p>
                </div>
            </div>
            <div class="problem-card">
                <div class="hover-image-container">
                    <img
                        src="img/problems/problem3-after.jpg"
                        alt="Фото проблемы"
                        class="hover-image"
                        data-original="img/problems/problem3-after.jpg"
                        data-hover="img/problems/problem3.jpg"
                    >
                </div>
                <div class="problem-info">
                    <h3>Темно в подъезде</h3>
                    <p class="category">Освещение в жилых домах</p>
                    <p class="date">01.01.2023</p>
                    <p>В подъезде дома №17 по улице Советская обнаружена проблема с освещением. Светильники в подъезде
                        перестали работать, создавая неудобства и угрозу безопасности для жильцов</p>
                </div>
            </div>
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
                    Нажимая на кнопку, вы соглашаетесь с условиями <a href="privacy-policy.html">обработки персональных данных</a>
                </label>
            </form>
        </div>
    </div>

    <!-- Модальное окно для авторизации -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeLoginModal">&times;</span>
            <h2>Авторизация</h2>
            <form id="loginForm">
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

    <script>
        window.onload = counter;

        function counter(){
            $.ajax({
                url: "ajax/action_counter_ajax.php",
                method: "GET",
                dataType: "json",
                success: function(otvet){
                    console.log(otvet);
                    document.querySelector('#counter').innerHTML = otvet['count'];
                },
                error: function (){}
            });
        }
        setInterval(function (){}, 5000);

    </script>
    <script src="js/main.js" type="text/javascript"></script>

</body>

</html>
