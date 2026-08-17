<?php

session_start();

include "../includes/config.php";


if(!isset($_SESSION['admin'])){

    header("Location: ../login.php");

    exit();

}


$result = mysqli_query(
    $conn,
    "SELECT * FROM projects ORDER BY id DESC"
);


?>


<!DOCTYPE html>
<html>

<head>

<title>Projects | TechElite Admin</title>

<link rel="stylesheet" href="../css/dashboard.css">

</head>


<body>


<div class="main" style="margin-left:40px;">


<header class="topbar">


<h1>
Projects
</h1>


<a href="add_project.php">

<i class="fa-solid fa-plus"></i>

Add Project

</a>


</header>



<table class="employee-table">


<tr>

<th>Image</th>

<th>Title</th>

<th>Description</th>

<th>Action</th>

</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<img src="../assets/images/projects/<?php echo $row['image']; ?>"

width="60"

height="60"

style="border-radius:10px;object-fit:cover;">


</td>



<td>

<?php echo $row['title']; ?>

</td>



<td>

<?php echo $row['description']; ?>

</td>



<td>


<a href="edit_project.php?id=<?php echo $row['id']; ?>">

Edit

</a>


|

<a href="delete_project.php?id=<?php echo $row['id']; ?>">
     onclick="return confirm('Are you sure you want to delete this project?');">
Delete

</a>


</td>


</tr>


<?php } ?>



</table>


</div>


</body>

</html>