$(document).ready(function () {

    let categorySectionContent = $( "#categorySectionContent" );

    // скрываем содержимое раздела при загрузке страницы
    $(categorySectionContent).hide();

    // Обработчик клика по кнопке "▲/▼"
    $("#toggleCategorySection").click(function () {
        // Изменяем текст кнопки и скрываем/показываем содержимое раздела
        if ($(categorySectionContent).is(":visible")) {
            $(categorySectionContent).slideUp();
            $(this).text("▼");
        } else {
            $(categorySectionContent).slideDown();
            $(this).text("▲");
        }
    });


    // кнопка для возврата наверх страницы
    const scrollTopButton = $('#scrollTopButton');

    // Показываем или скрываем кнопку при прокрутке страницы
    $(window).scroll(function () {
        if ($(this).scrollTop() > 20) {
            scrollTopButton.fadeIn();
        } else {
            scrollTopButton.fadeOut();
        }
    });

    // Прокручиваем страницу вверх при клике на кнопку
    scrollTopButton.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });


    // Открытие модального окна при нажатии на кнопку "Удалить заявку"
    $('#deleteCategoryButton').on('click', function () {
        $('#deleteModal').css('display', 'block');
    });

    // Закрытие модального окна при нажатии на кнопку "Отмена" или крестик
    $('#cancelDelete, #closeDeleteModal').on('click', function () {
        $('#deleteModal').css('display', 'none');
    });

    // Закрытие модального окна при клике вне его области
    $(window).on('click', function (event) {
        if (event.target.id === 'deleteModal') {
            $('#deleteModal').css('display', 'none');
        }
    });


});
