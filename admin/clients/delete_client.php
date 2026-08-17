<?php

session_start();

include "../includes/config.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

$id=(int)$_GET['id'];

mysqli_query(
$conn,
"DELETE FROM clients WHERE id=$id"
);

header("Location: clients.php");

exit();

?>