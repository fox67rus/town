<?php
    include("include/connect.php");

    if (isset($_GET['id']))
    {
        $id_issue = $_GET['id'];
        $connect->query("DELETE FROM issues WHERE `issues`.`id` = '$id_issue' ");
        header('Location: user.php');
    }
