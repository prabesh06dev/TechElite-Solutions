<?php

session_start();

include "../includes/config.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

$id = (int)$_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM messages WHERE id=$id"
);

header("Location: messages.php");
exit();

?>