<?php

session_start();

include "../includes/config.php";


if(!isset($_SESSION['admin'])){

    header("Location: ../login.php");

    exit();

}



if(isset($_POST['add_employee'])){


    $name = $_POST['name'];

    $email = $_POST['email'];

    $phone = $_POST['phone'];

    $position = $_POST['position'];

    $department = $_POST['department'];

    $salary = $_POST['salary'];

    $joining_date = $_POST['joining_date'];

    $status = $_POST['status'];

    $address = $_POST['address'];



    $image = $_FILES['image']['name'];

    $tmp = $_FILES['image']['tmp_name'];



    $upload_path = "../assets/images/team/".$image;



    move_uploaded_file(
        $tmp,
        $upload_path
    );

    mysqli_query(
    $conn,
    "INSERT INTO employees
    (
        name,
        email,
        phone,
        position,
        department,
        status,
        image
    )

    VALUES

    (
        '$name',
        '$email',
        '$phone',
        '$position',
        '$department',
        '$status',
        '$image'
    )"
);



    $_SESSION['success'] = "Employee added successfully.";

    header("Location: employees.php");
    exit();


}


?>


<!DOCTYPE html>
<html>

<head>

<title>Add Employee</title>

<link rel="stylesheet" href="../css/dashboard.css">

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>


<body>

<!-- <div class="main"> -->
    <div class="employee-wraapper">
        <div class="employee-card">
            <div class="employee-heade">
                <h1> Add New Employee</h1>

                <p>
                    Fill in the employee information below.
                </p>
            </div>

            <form method="POST"
                enctype="multipart/form-data">
               <div class="employee-form-grid">
                    <div class="image-upload">
                        <img 
                            id="preview"
                            src="../assets/images/admin.png"
                            alt="preview">
                        <input
                            type="file"
                            name="image"
                            id="imageInput"
                            accept="image/*"
                            required>
                    </div> 
                    
                    <div class="form-fields">
                        <div>
                            <label>Employee Name</label>

                            <input
                                type="text"
                                name="name"
                                placeholder="Enter Employee Name"
                                required>

                        </div>

                        <div>
                            <label>Email Address</label>

                            <input
                                type="email"
                                name="email"
                                placeholder="Enter Email"
                                required>

                            <input type="text"
                                name="phone"
                                placeholder="Phone Number"
                                required>
                        </div>

                        <div>
                            <label>Position</label>

                            <input
                                type="text"
                                name="position"
                                placeholder="Software Enginner"
                                required>

                            <select name="department" required>

                                <option value="">
                                    Select Department
                                </option>

                                <option value="Development">
                                    Development
                                </option>

                                <option value="Design">
                                    Design
                                </option>

                                <option value="Marketing">
                                    Marketing
                                </option>

                                <option value="HR">
                                    HR
                                </option>

                            </select>

                            <select name="status" required>

                                <option value="Active">
                                    Active
                                </option>

                                <option value="Inactive">
                                    Inactive
                                </option>

                                <option value="On Leave">
                                    On Leave
                                </option>

                            </select>
                        </div>

                        <button
                            type="submit"
                            name="add_employee"
                            id="saveBtn"
                            class="save-btn">


                            <i class="fa-solid fa-floppy-disk"></li>

                            Save Employee

                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
                        
                

<script>

const imageInput =
document.getElementById("imageInput");

const preview =
document.getElementById("preview");

imageInput.addEventListener("change",function(){

    const file=this.files[0];

    if(file){

        preview.src=URL.createObjectURL(file);

    }

});

</script>

<script>

document.querySelector("form").addEventListener("submit",function(){

    const btn=document.getElementById("saveBtn");

    btn.disabled=true;

    btn.innerHTML="Saving...";

});

</script>

</body>

</html>