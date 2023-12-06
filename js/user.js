$(document).ready(function () {
    // Находим кнопку "Сообщить о проблеме"
    var reportProblemButton = $("#reportProblemButton");
    var $reportProblemSection = $("#reportProblemSection");

    // Добавляем обработчик события на кнопку "Сообщить о проблеме"
    reportProblemButton.click(function () {
        // Переключаем видимость формы
        $reportProblemSection.slideToggle('slow');

        setTimeout(function() {
            // Меняем текст кнопки в зависимости от видимости формы
            var buttonText = $("#reportProblemSection").is(":visible") ? "Сообщить о проблеме ▲" : "Сообщить о проблеме ▼";
            $("#reportProblemButton").text(buttonText);
        }, 700);
    });

    // Открытие модального окна при нажатии на кнопку "Удалить заявку"
    $('.delete-button').on('click', function () {
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