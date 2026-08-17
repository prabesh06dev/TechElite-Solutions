<?php

session_start();

include "../includes/config.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

if(isset($_POST['add_client'])){

    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    mysqli_query(
        $conn,
        "INSERT INTO clients(name,company,email,phone)
        VALUES('$name','$company','$email','$phone')"
    );

    header("Location: clients.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Client</title>

<link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>

<div class="main" style="margin-left:40px;">

<h1>Add Client</h1>

<form method="POST" class="employee-form">

<input
type="text"
name="name"
placeholder="Client Name"
required>

<input
type="text"
name="company"
placeholder="Company Name"
required>

<input
type="email"
name="email"
placeholder="Email"
required>

<input
type="text"
name="phone"
placeholder="Phone Number"
required>

<button
type="submit"
name="add_client">

Save Client

</button>

</form>

</div>

</body>

</html>