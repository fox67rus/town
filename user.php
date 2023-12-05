<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/user.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Кабинет пользователя</title>
</head>

<body>
<div class="container">

    <?php include("include/header.php"); ?>

    <section class="welcome-section">
        <h1>Кабинет пользователя</h1>
        <p class="hello">Привет, <span>Александр Исаевич Солженицын!</span></p>
        <button id="reportProblemButton">Сообщить о проблеме ▼</button>
    </section>

    <section id="reportProblemSection" class="hidden">
        <h2>Сообщить о проблеме</h2>
        <form id="reportProblemForm">
            <label for="problemTitle">Название:</label>
            <input type="text" id="problemTitle" name="problemTitle" required>

            <label for="problemDescription">Описание:</label>
            <textarea id="problemDescription" name="problemDescription" required></textarea>

            <label for="problemCategory">Категория:</label>
            <select id="problemCategory" name="problemCategory" required>
                <option value="Дворовая территория">Дворовая территория</option>
                <option value="Освещение">Освещение</option>
                <option value="Другое">Другое</option>
            </select>

            <label for="problemPhoto">
                Добавить фото:
                <span>Изображение в формате jpg, jpeg, png, bmp. Максимальный размер 10 Мб</span>
            </label>

            <input type="file" id="problemPhoto" name="problemPhoto">

            <button type="submit">Сообщить о проблеме</button>
        </form>
    </section>

    <section class="requests-section">
        <h2>Мои заявки</h2>
        <div class="filter-section">
            <label for="statusFilter">Фильтр по статусу:</label>
            <select id="statusFilter">
                <option value="all">Все заявки</option>
                <option value="new">Новые</option>
                <option value="resolved">Решенные</option>
                <option value="rejected">Отклоненные</option>
            </select>
        </div>
        <div class="user-requests">
            <div class="user-request">
                <img src="img/problems/problem1.jpg" alt="Фото проблемы 1">
                <div class="request-info">

                    <div class="header-section">
                        <h3>Сломаны почтовые ящики</h3>
                        <p class="lk_date">01.01.2023</p>
                        <button class="ico-button delete-button" data-id="1" title="Удалить заявку"></button>
                        <span class="status new-status">Новая</span>
                    </div>

                    <p class="lk_category">Мой дом</p>
                    <p>В подъезде дома №5 сломано крепление почтового ящика, что вызывает неудобства для жителей данного
                        дома и может привести к потере почтовых отправлений</p>
                </div>
            </div>
            <div class="user-request">
                <img src="img/problems/problem1.jpg" alt="Фото проблемы 1">
                <div class="request-info">

                    <div class="header-section">
                        <h3>Сломаны почтовые ящики</h3>
                        <p class="lk_date">01.01.2023</p>
                        <button class="ico-button delete-button" data-id="1" title="Удалить заявку"></button>
                        <span class="status new-status">Новая</span>
                    </div>

                    <p class="lk_category">Мой дом</p>
                    <p>В подъезде дома №5 сломано крепление почтового ящика, что вызывает неудобства для жителей данного
                        дома и может привести к потере почтовых отправлений</p>
                </div>
            </div>
        </div>
    </section>

    <?php include("include/footer.php"); ?>

</div>

<!-- Модальное окно для удаления заявки -->
<div id="deleteModal" class="modal">
    <div class="modal-content delete-modal-content">
        <span class="close" id="closeDeleteModal">&times;</span>
        <img src="img/exclamation.svg" alt="Удаление заявки">
        <h2>Вы уверены, что хотите удалить заявку?</h2>
        <p>Отменить это действие невозможно!!!</p>
        <div class="buttons-container">
            <button class="modal-button cancel" id="cancelDelete">Отмена</button>
            <button class="modal-button delete-issue" id="confirmDelete">Да, удалить</button>
        </div>
    </div>
</div>

<script src="js/user.js" type="text/javascript"></script>

</body>

</html>
