$('input[type="radio"]').change(function() {
    console.log("выбран статус");
    var issueId = $(this).data('id');
    var newStatus = $(this).val();

    console.log(issueId);
    console.log(newStatus);

    $.ajax({
        url: '../../ajax/update_status.php',
        method: 'GET',
        data: { issue_id: issueId, new_status: newStatus },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.success) {
                alert('Статус успешно изменен!');
            } else {
                alert('Ошибка при изменении статуса: ' + response.error);
            }
        },
        error: function() {
            alert('Ошибка при отправке запроса на сервер');
        }
    });
});