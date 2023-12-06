let select = document.querySelector("#statusFilter"); //Получаем select

let table_zayavki = document.querySelector("#table_zayavki");
window.onload = sendFiltr('all');

function sendFiltr(filter)
{
    $.ajax({
        url: "../../ajax/action_filter_ajax.php",
        method: "GET",
        dataType: "json",
        data: {'filter': filter},
        success: function(otvet){

            // console.log(otvet);

            if (otvet) {
                // удаляем все строки таблицы
                for (let i = table_zayavki.rows.length - 1; i > 0; i--) {
                    table_zayavki.deleteRow(i);
                }
                //
                for (let i = 0; i < otvet.length; i++) {
                    // Создание новой строки таблицы
                    let newRow = table_zayavki.insertRow();

                    // Создаем ячейки
                    let cell1 = newRow.insertCell(0);
                    let cell2 = newRow.insertCell(1);
                    let cell3 = newRow.insertCell(2);
                    let cell4 = newRow.insertCell(3);
                    let cell5 = newRow.insertCell(4);
                    let cell6 = newRow.insertCell(5);


                    // Добавляем данные из Ajax запроса в ячейки таблицы
                    cell1.innerHTML = otvet[i].metka;
                    cell2.innerHTML = otvet[i].issue_name;
                    cell3.innerHTML = otvet[i].description;
                    cell4.innerHTML = otvet[i].category_name;
                    cell5.innerHTML = otvet[i].status;
                    if (otvet[i].status == 'Новая') {
                        cell6.innerHTML = `<a href='delete_z.php?id=${otvet[i].id}'>Удалить</a>`;
                    } else {
                        cell6.innerHTML = "";
                    }
                }
            } else {
                let newRow = table_zayavki.insertRow();
                let cell1 = newRow.insertCell(0);
                cell1.innerHTML = 'У Вас пока нет добавленных заявок!!!';
                cell1.setAttribute('colSpan', '6');
            }
        },
        error: function (){}
    });
}