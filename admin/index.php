<?php

include "includes/config.php";


$team = mysqli_query(
    $conn,
    "SELECT * FROM employees"
);

?>