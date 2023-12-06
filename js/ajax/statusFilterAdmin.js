window.onload = sendFiltr('all');

function displayProblems(data) {
    // Получаем контейнер, куда будем добавлять карточки
    var userRequestsContainer = $(".user-requests");

    // Очищаем контейнер от предыдущих элементов
    userRequestsContainer.empty();

    // Итерируем по массиву данных и создаем карточки
    data.forEach(function (problem) {
        // Создаем элементы DOM для карточки
        var userRequest = $("<div>").addClass("user-request");
        var imageContainer = $("<div>").addClass("lk-image-container"); // Контейнер для изображения
        var img = $("<img>").attr("src", problem.photo).attr("alt", "Фото проблемы");
        var requestInfo = $("<div>").addClass("request-info");
        var headerSection = $("<div>").addClass("header-section");
        var h3 = $("<h3>").text(problem.issue_name);
        var lkDate = $("<p>").addClass("lk_date").text(problem.metka);

        var resolveButton = $("<div>").addClass("ico-button resolved-button").attr("title", "Сменить статус на Решено").attr("data-id", problem.id);
        var rejectButton = $("<div>").addClass("ico-button rejected-button").attr("title", "Отклонить заявку").attr("data-id", problem.id);

        var status = $("<span>").addClass("status").text(problem.status);

        if (problem.status === 'Новая') {
            status.addClass("new-status");
        } else if (problem.status === 'Решена') {
            status.addClass("resolved-status");
        } else if (problem.status === 'Отклонена') {
            status.addClass("rejected-status");
        }

        // Добавляем элементы DOM карточки
        imageContainer.append(img);
        if (problem.status === 'Новая') {
            headerSection.append(lkDate, h3, resolveButton, rejectButton, status);
        } else {
            headerSection.append(lkDate, h3, status);
        }

        requestInfo.append(headerSection, lkDate, $("<p>").addClass("lk_category").text(problem.category_name), $("<p>").text(problem.description));
        userRequest.append(imageContainer, requestInfo);

        // Добавляем карточку в контейнер
        userRequestsContainer.append(userRequest);
    });

}

function sendFiltr(filter) {
    $.ajax({
        url: '../../ajax/action_admin_filter_ajax.php',
        method: "GET",
        dataType: "json",
        data: {'filter': filter},
        success: function (otvet) {
            // console.log(otvet);
            displayProblems(otvet);
        },
        error: function () {
        }
    });
}