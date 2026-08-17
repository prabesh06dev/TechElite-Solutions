<?php

session_start();

include "../includes/config.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

$id = (int)$_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM clients WHERE id=$id");

$client = mysqli_fetch_assoc($result);

if(isset($_POST['update_client'])){

$name=$_POST['name'];
$company=$_POST['company'];
$email=$_POST['email'];
$phone=$_POST['phone'];

mysqli_query($conn,"
UPDATE clients
SET
name='$name',
company='$company',
email='$email',
phone='$phone'
WHERE id=$id
");

header("Location: clients.php");
exit();

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Client</title>

<link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>

<div class="main" style="margin-left:40px;">

<h1>Edit Client</h1>

<form method="POST" class="employee-form">

<input
type="text"
name="name"
value="<?php echo $client['name']; ?>"
required>

<input
type="text"
name="company"
value="<?php echo $client['company']; ?>"
required>

<input
type="email"
name="email"
value="<?php echo $client['email']; ?>"
required>

<input
type="text"
name="phone"
value="<?php echo $client['phone']; ?>"
required>

<button
type="submit"
name="update_client">

Update Client

</button>

</form>

</div>

</body>

</html>