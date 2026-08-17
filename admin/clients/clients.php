<?php

session_start();

include "../includes/config.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM clients ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Clients | TechElite Admin</title>

<link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>

<div class="main" style="margin-left:40px;">

<header class="topbar">

<h1>Clients</h1>

<a href="add_client.php">

Add Client

</a>

</header>

<table class="employee-table">

<tr>

<th>Client Name</th>

<th>Company</th>

<th>Email</th>

<th>Action</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['company']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>

<a href="edit_client.php?id=<?php echo $row['id']; ?>">Edit</a>

|

<a href="delete_client.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this client?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>