<?php

    if (isset($_SESSION['fio'])) {
        echo "<p class='hello'>Привет, <span>{$_SESSION['fio']}</span>!</p>";
    } else {
        echo "<p class='hello'>Привет, <span>НЛО</span> Тебя не должно здесь быть</p>";
    }

?>
