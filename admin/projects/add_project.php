<?php

session_start();

include "../includes/config.php";


if(!isset($_SESSION['admin'])){

    header("Location: ../login.php");

    exit();

}



if(isset($_POST['add_project'])){


    $title = $_POST['title'];

    $description = $_POST['description'];



    $image = $_FILES['image']['name'];

    $tmp = $_FILES['image']['tmp_name'];



    $upload_path = "../assets/images/projects/".$image;



    move_uploaded_file(
        $tmp,
        $upload_path
    );



  $sql = "INSERT INTO projects
  (title, description, image)
  VALUES
  ('$title', '$description', '$image')";

  if(mysqli_query($conn, $sql)){
    echo "Project Inserted Successfully";
  }else{
    die("Database Error: " . mysqli_error($conn));
}



    header("Location: projects.php");

    exit();


}


?>


<!DOCTYPE html>

<html>

<head>

<title>Add Project</title>

<link rel="stylesheet" href="../css/dashboard.css">

</head>


<body>


<div class="main" style="margin-left:40px;">


<h1>
Add Project
</h1>



<form method="POST"
      enctype="multipart/form-data"
      class="employee-form">



<input type="text"
       name="title"
       placeholder="Project Title"
       required>



<textarea 
name="description"
placeholder="Project Description"
required></textarea>



<input type="file"
       name="image"
       required>



<button type="submit"
        name="add_project">

Save Project

</button>



</form>


</div>


</body>

</html>