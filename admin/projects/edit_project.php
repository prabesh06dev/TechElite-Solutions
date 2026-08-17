<?php

session_start();

include "../includes/config.php";


if(!isset($_SESSION['admin'])){

    header("Location: ../login.php");

    exit();

}



$id = $_GET['id'];



$result = mysqli_query(
    $conn,
    "SELECT * FROM projects WHERE id='$id'"
);


$project = mysqli_fetch_assoc($result);



if(isset($_POST['update_project'])){


    $title = $_POST['title'];

    $description = $_POST['description'];



    if($_FILES['image']['name'] != ""){


        $image = $_FILES['image']['name'];

        $tmp = $_FILES['image']['tmp_name'];



        move_uploaded_file(
            $tmp,
            "../assets/images/projects/".$image
        );



        mysqli_query(
            $conn,
            "UPDATE projects SET

            title='$title',

            description='$description',

            image='$image'

            WHERE id='$id'"
        );


    }

    else{


        mysqli_query(
            $conn,
            "UPDATE projects SET

            title='$title',

            description='$description'

            WHERE id='$id'"
        );


    }



    header("Location: projects.php");

    exit();


}


?>


<!DOCTYPE html>

<html>

<head>

<title>Edit Project</title>

<link rel="stylesheet" href="../css/dashboard.css">

</head>


<body>


<div class="main" style="margin-left:40px;">


<h1>
Edit Project
</h1>



<form method="POST"
enctype="multipart/form-data"
class="employee-form">



<input type="text"
name="title"
value="<?php echo $project['title']; ?>">



<textarea name="description">

<?php echo $project['description']; ?>

</textarea>



<input type="file"
name="image">



<button name="update_project">

Update Project

</button>



</form>


</div>


</body>

</html>