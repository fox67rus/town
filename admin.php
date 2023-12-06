<?php  include("include/connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/head.php"); ?>

    <link rel="stylesheet" href="css/admin.css">
    <title>Кабинет администратора</title>
</head>

<body>
<div class="container">

    <?php include("include/header.php"); ?>

    <section class="welcome-section">
        <h1>Кабинет администратора</h1>

        <?php  include("include/say_hello.php"); ?>
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
                    <?php include("include/get_category.php"); ?>
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
            <span id="counter-value"> 2</span>
        </div>

        <div class="filter">
            <form>
                <label for="statusFilter">Фильтр по статусу:</label>
                <select id="statusFilter" name="statusFilter" onchange="sendFiltr(this.value)">
                    <option value="all">Все</option>
                    <option value="Новая">Новые</option>
                    <option value="Решена">Решенные</option>
                    <option value="Отклонена">Отклоненные</option>
                </select>
            </form>

        </div>

        <div class="user-requests">
            <!-- Карточки с заявками-->
        </div>

        <div class="user-request">
            <div class="lk-image-container">
                <img src="img/problems/problem1.jpg" alt="Фото проблемы 1">
            </div>
            <div class="request-info">

                <div class="header-section">
                    <h3>Сломаны почтовые ящики</h3>

                    <form>
                        <label for="resolvedButton">
                            <div class="ico-button resolved-button" title="Сменить статус на Решено"></div>
                        </label>
                        <input id="resolvedButton" type="radio" name="status" data-id="11" value="Решена">

                        <label>
                            <div class="ico-button rejected-button"  title="Отклонить"></div>
                            <input type="radio" name="status" data-id="11" value="Отклонена">
                        </label>

                    </form>

                    <span class="status new-status">Новая</span>
                </div>
                <p class="lk_date">01.01.2023</p>

                <p class="lk_category">Мой дом</p>
                <p>В подъезде дома №5 сломано крепление почтового ящика, что вызывает неудобства для жителей данного
                    дома и может привести к потере почтовых отправлений</p>
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

<script src="js/admin.js" type="text/javascript"></script>
<script src="js/ajax/statusFilterAdmin.js"></script>
<script src="js/ajax/counterAdmin.js"></script>
<script src="js/ajax/changeStatus.js"></script>

</body>
</html>
