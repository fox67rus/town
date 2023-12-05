window.onload = counter;

function counter(){
    $.ajax({
        url: "../../ajax/action_counter_ajax.php",
        method: "GET",
        dataType: "json",
        success: function(otvet){
            // console.log(otvet);
            document.querySelector('#counter').innerHTML = otvet['count'];
        },
        error: function (){}
    });
}
setInterval(function (){}, 5000);