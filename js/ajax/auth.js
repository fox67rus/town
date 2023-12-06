// Ждем, пока документ полностью загрузится
$(document).ready(function () {
    // Закрываем модальное окно при загрузке страницы
    $('#loginForm').hide();

    // Открываем модальное окно при клике на кнопку
    $('#loginButton').click(function () {
        $('#loginForm').show();
    });

    // Закрываем модальное окно при клике на крестик
    $('#closeLoginModal').click(function () {
        $('#loginForm').hide();
    });

    // Обработчик события отправки формы
    $("#loginForm").submit(function(e) {
        e.preventDefault(); // Предотвращаем отправку формы

        // Получаем данные из формы
        var username = $("#loginUsername").val();
        var password = $("#loginPassword").val();

        // Отправляем данные на сервер для проверки (вызов PHP-скрипта)
        $.ajax({
            url: "../../ajax/check_login.php",
            method: "POST",
            data: { username: username, password: password },
            dataType: "json",
            success: function(response) {
                console.log(response);
                // Проверяем ответ от сервера
                if (response.success) {
                    // Авторизация прошла успешно
                    alert("Авторизация успешна!");
                    if (sessionStorage.getItem("role") == 1) {
                        window.location.href = 'admin.php';
                    } else {
                        window.location.href = 'user.php';
                    }

                } else {
                    // Авторизация не удалась
                    alert("Неверный логин или пароль");
                }
            },
            error: function () {
                console.log("Ошибка при отправке запроса");
            }
        });
    });

    // Закрываем модальное окно при клике вне окна
    // $(document).mouseup(function (e) {
    //     var modal = $('#loginForm');
    //     if (!modal.is(e.target) && modal.has(e.target).length === 0) {
    //         modal.hide();
    //     }
    // });
});