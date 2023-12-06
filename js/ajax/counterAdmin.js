window.onload = counter;
function counter() {
    $.ajax({
        url: "../../ajax/action_counter_ajax.php",
        method: "GET",
        dataType: "json",
        success: function(otvet) {
            var counterElement = document.querySelector('#counter-value');
            var newCount = otvet['count'];
            counterElement.innerHTML = newCount;
        },
        error: function() {}
    });
}


// обновляем каждые 60 сек
setInterval(counter, 60000);