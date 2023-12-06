window.onload = counter;

function counter() {
    $.ajax({
        url: "../../ajax/action_counter_ajax.php",
        method: "GET",
        dataType: "json",
        success: function(otvet) {
            var counterElement = document.querySelector('#counter');
            var currentCount = parseInt(counterElement.innerHTML, 10);
            var newCount = otvet['count'];

            // Если значение счетчика изменилось, проигрываем звук
            if (newCount !== currentCount) {
                playNotificationSound();
            }

            counterElement.innerHTML = newCount;
        },
        error: function() {}
    });
}

function playNotificationSound() {
    var audioElement = document.getElementById('notificationSound');

    // Проверяем, поддерживает ли браузер элемент <audio>
    if (audioElement && typeof audioElement.play === 'function') {
        audioElement.play();
    }
}

setInterval(counter, 5000);