<?php  include("include/connect.php"); ?>


<?php
    $idUser = $_SESSION['id_user'];
    $error = "";
    $message = "";
    $imgFormats = array("image/jpeg", "image/png", "image/bmp");

    if (isset($_POST["problemTitle"]))
    {
        $title = $_POST["problemTitle"];
        if ($title == "")
        {
            $error .= "Вы не заполнили поле Название<br>";
        }
        $description = $_POST["problemDescription"];
        if ($description == "")
        {
            $error .= "Вы не заполнили поле Описание<br>";
        }
        // валидация загрузки файла
        if (!empty($_FILES["problemPhoto"]["name"]))
        {
            // проверяем, что файл нужного формата
            if (in_array($_FILES["problemPhoto"]["type"], $imgFormats))
            {
                // проверяет картинку на размер, не более 10 Мб
                if ($_FILES["problemPhoto"]["size"] <= 10485760)
                {
                    if (!$error){
                        // переносим на сервер и добавляем ссылку
                        $imgFile = 'img/problems/'.$_FILES["problemPhoto"]["name"];
                        copy($_FILES["problemPhoto"]["tmp_name"], $imgFile);
                        $idCategory = $_POST['problemCategory']; // id категории
                        $today = date("Y-m-d");
                        $sql = $connect->query(" INSERT INTO `issues` (`name`, description, id_category, photo, metka, `id_user`) VALUES ('$title', '$description', '$idCategory', '$imgFile', '$today', '$idUser'); ");

                        if ($sql)
                        {
                            $message .= "Заявка отправлена :)";
                        }
                        else{
                            $error .= "Что-то пошло не так :( Попробуйте ещё раз <br>";
                        }
                    }
                }
                else
                {
                    $error .= "Размер фото не должен превышать 10 Мб";
                }
            }
            else
            {
                $error .= "Не верный формат файла. Разрешены форматы: jpg, bmp, png";
            }
        }
        else{
            $error .= "Вы не добавили фото с проблемой<br>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/head.php"); ?>
    <link rel="stylesheet" href="css/user.css">
    <title>Кабинет пользователя</title>
</head>

<body>
<div class="container">

    <?php include("include/header.php"); ?>

    <section class="welcome-section">
        <h1>Кабинет пользователя</h1>
        <?php  include("include/say_hello.php"); ?>
        <button id="reportProblemButton">Сообщить о проблеме ▼</button>
    </section>

    <section id="reportProblemSection" class="hidden">
        <h2>Сообщить о проблеме</h2>
        <form id="reportProblemForm" method="post" enctype="multipart/form-data">
            <?php
            if ($error) {
                echo "<div class='error'>$error</div>";
            }

            if ($message) {
                echo "<div class='error' style='background: green; color: white; border: none;'>$message</div>";
            }
            ?>

            <label for="problemTitle">Название:</label>
            <input type="text" id="problemTitle" name="problemTitle" required>

            <label for="problemDescription">Описание:</label>
            <textarea id="problemDescription" name="problemDescription" required></textarea>

            <label for="problemCategory">Категория:</label>
            <select id="problemCategory" name="problemCategory" required>
                <?php
                $sql = $connect->query("SELECT * FROM `categories`");
                $mytable = mysqli_fetch_array($sql);
                do
                {
                    echo "<option value='{$mytable['id']}'>{$mytable['name']}</option>";
                }
                while ($mytable = mysqli_fetch_array($sql)); // пока построчно записываются данные из базы

                ?>

            </select>

            <label for="problemPhoto">
                Добавить фото:
                <span>Изображение в формате jpg, jpeg, png, bmp. Максимальный размер 10 Мб</span>
            </label>

            <input type="file" id="problemPhoto" name="problemPhoto" accept="image/*" >
            
            <button type="submit">Создать заявку</button>
        </form>
    </section>

    <section class="requests-section">
        <h2>Мои заявки</h2>
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

        <table id="table_zayavki">
            <thead>
            <tr>
                <th>Временная метка</th>
                <th>Название заявки</th>
                <th>Описание заявки</th>
                <th>Категория заявки</th>
                <th>Статус заявки</th>
                <th>Удаление</th>
            </tr>
            </thead>
            <tbody>
            <!-- Здесь будет отображаться список заявок -->
            </tbody>
        </table>


<!--        <div class="user-requests">-->
<!--            -->
<!--            <div class="user-request">-->
<!--                <img src="img/problems/problem1.jpg" alt="Фото проблемы 1">-->
<!--                <div class="request-info">-->
<!---->
<!--                    <div class="header-section">-->
<!--                        <h3>Сломаны почтовые ящики</h3>-->
<!--                        <p class="lk_date">01.01.2023</p>-->
<!--                        <button class="ico-button delete-button" data-id="1" title="Удалить заявку"></button>-->
<!--                        <span class="status new-status">Новая</span>-->
<!--                    </div>-->
<!---->
<!--                    <p class="lk_category">Мой дом</p>-->
<!--                    <p>В подъезде дома №5 сломано крепление почтового ящика, что вызывает неудобства для жителей данного-->
<!--                        дома и может привести к потере почтовых отправлений</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            -->
<!--        </div>-->

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
<script src="js/ajax/statusFilter.js"></script>

</body>

</html>
