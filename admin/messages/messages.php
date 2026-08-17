<?php

session_start();

include "../includes/config.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM messages ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Messages | TechElite Admin</title>

<link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>

<div class="main" style="margin-left:40px;">

<header class="topbar">

<h1>Contact Messages</h1>

</header>

<table class="employee-table">

<tr>

<th>Name</th>

<th>Email</th>

<th>Subject</th>

<th>Message</th>

<th>Date</th>
<th>Action</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['subject']; ?></td>

<td><?php echo $row['message']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="delete_message.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this message?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>