<?php

session_start();

include "../includes/config.php";


if(!isset($_SESSION['admin'])){

    header("Location: ../login.php");

    exit();

}



$id = $_GET['id'];



mysqli_query(
    $conn,
    "DELETE FROM projects WHERE id='$id'"
);



header("Location: projects.php");

exit();


?>