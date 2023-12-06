<?php
    $sql = $connect->query("SELECT * FROM `categories`");
    $mytable = mysqli_fetch_array($sql);
    do
    {
        echo "<option value='{$mytable['id']}'>{$mytable['name']}</option>";
    }
    while ($mytable = mysqli_fetch_array($sql)); // пока построчно записываются данные из базы

?>
