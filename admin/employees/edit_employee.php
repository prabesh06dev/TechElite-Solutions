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
    "SELECT * FROM employees WHERE id='$id'"
);


$employee = mysqli_fetch_assoc($result);



if(isset($_POST['update_employee'])){


    $name = $_POST['name'];

    $email = $_POST['email'];

    $position = $_POST['position'];



    if($_FILES['image']['name'] != ""){


        $image = $_FILES['image']['name'];

        $tmp = $_FILES['image']['tmp_name'];


        move_uploaded_file(
            $tmp,
            "../assets/images/team/".$image
        );


        mysqli_query(
            $conn,
            "UPDATE employees SET
            name='$name',
            email='$email',
            position='$position',
            image='$image'
            WHERE id='$id'"
        );


    }

    else{


        mysqli_query(
            $conn,
            "UPDATE employees SET
            name='$name',
            email='$email',
            position='$position'
            WHERE id='$id'"
        );


    }



    header("Location: employees.php");

    exit();


}


?>


<!DOCTYPE html>

<html>

<head>

<title>Edit Employee</title>

<link rel="stylesheet" href="../css/dashboard.css">

</head>


<body>


<div class="main" style="margin-left:40px;">


<h1>
Edit Employee
</h1>



<form method="POST"
enctype="multipart/form-data"
class="employee-form">



<input type="text"
name="name"
value="<?php echo $employee['name']; ?>">



<input type="email"
name="email"
value="<?php echo $employee['email']; ?>">



<input type="text"
name="position"
value="<?php echo $employee['position']; ?>">



<input type="file"
name="image">



<button name="update_employee">

Update Employee

</button>



</form>


</div>


</body>

</html>