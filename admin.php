<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Кабинет администратора</title>
</head>

<body>
<div class="container">

    <?php include("include/header.php"); ?>

    <section class="welcome-section">
        <h1>Кабинет администратора</h1>
        <p class="hello">Привет, <span>Император Николай Александрович Романов!</span></p>
    </section>

    <!-- Раздел "Управление категориями" -->
    <section class="category-section">
        <h2>
            <label for="toggleCategorySection">Управление категориями</label>
            <button id="toggleCategorySection" class="toggle-button">▼</button>

        </h2>

        <div id="categorySectionContent">
            <!-- Форма добавления новой категории -->
            <form id="addCategoryForm">
                <label for="categoryName">Название категории:</label>
                <input type="text" id="categoryName" name="categoryName" required>
                <button id="addCategoryButton" type="submit">Добавить</button>
            </form>
            <!-- Форма удаления категории -->
            <form id="deleteCategoryForm">
                <label for="categoryToDelete">Выберите категорию для удаления:</label>
                <select id="categoryToDelete" name="categoryToDelete" required>
                    <option value="category1">Дворовая территория</option>
                    <option value="category2">Освещение</option>
                    <option value="category3">Другое</option>
                </select>
                <button type="button" id="deleteCategoryButton">Удалить</button>
            </form>
        </div>

    </section>

    <!-- Раздел "Управление заявками" -->
    <section class="admin-requests-section">
        <h2>Управление заявками</h2>

        <!-- блок для счетчика новых заявок -->
        <div id="newRequestsCounter" class="new-requests-counter">
            <span class="counter-label">Новых заявок:</span>
            <span class="counter-value"> 2</span>
        </div>

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
                        <button class="ico-button resolved-button" data-id="1" title="Сменить статус на Решено"></button>
                        <button class="ico-button rejected-button" data-id="1" title="Отклонить"></button>
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
                        <button class="ico-button resolved-button" data-id="1" title="Сменить статус на Решено"></button>
                        <button class="ico-button rejected-button" data-id="1" title="Отклонить"></button>
                        <span class="status resolved-status">Решена</span>
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
                    <button class="ico-button resolved-button" data-id="1" title="Сменить статус на Решено"></button>
                    <button class="ico-button rejected-button" data-id="1" title="Отклонить"></button>
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
                    <button class="ico-button resolved-button" data-id="1" title="Сменить статус на Решено"></button>
                    <button class="ico-button rejected-button" data-id="1" title="Отклонить"></button>
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
                    <button class="ico-button resolved-button" data-id="1" title="Сменить статус на Решено"></button>
                    <button class="ico-button rejected-button" data-id="1" title="Отклонить"></button>
                    <span class="status new-status">Новая</span>
                </div>

                <p class="lk_category">Мой дом</p>
                <p>В подъезде дома №5 сломано крепление почтового ящика, что вызывает неудобства для жителей данного
                    дома и может привести к потере почтовых отправлений</p>
            </div>
        </div>


        </div>
    </section>

    <div id="scrollTopButton" class="scroll-top-button">↑</div>

    <?php include("include/footer.php"); ?>

</div>

<!-- Модальное окно для удаления категории -->
<div id="deleteModal" class="modal">
    <div class="modal-content delete-modal-content">
        <span class="close" id="closeDeleteModal">&times;</span>
        <img src="img/exclamation.svg" alt="Удаление заявки">
        <h2>Вы уверены, что хотите удалить категорию?</h2>
        <p>Отменить это действие невозможно!!! Все заявки в данной категории будут удалены</p>
        <div class="buttons-container">
            <button class="modal-button cancel" id="cancelDelete">Отмена</button>
            <button class="modal-button delete-issue" id="confirmDelete">Да, удалить</button>
        </div>
    </div>
</div>

<!-- Модальное окно для отклонения заявки-->
<div id="rejectModal" class="modal">
    <div class="modal-content delete-modal-content">
        <span class="close" id="closeRejectModal">&times;</span>
        <img src="img/rejected.svg" alt="Удаление заявки">
        <h2>Вы уверены, что хотите удалить категорию?</h2>
        <p>Отменить это действие невозможно!!! Все заявки в данной категории будут удалены</p>
        <div class="buttons-container">
            <button class="modal-button cancel" id="cancelReject">Отмена</button>
            <button class="modal-button reject-issue" id="confirmReject">Да, удалить</button>
        </div>
    </div>
</div>


<script src="js/user.js" type="text/javascript"></script> <!--подключаем для использования скрипта фильтрации-->
<script src="js/admin.js" type="text/javascript"></script>

</body>
</html>
