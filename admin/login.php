<?php

session_start();

include "includes/config.php";


if(isset($_POST['login'])){


    $username = $_POST['username'];

    $password = $_POST['password'];


    $query = mysqli_query(
        $conn,
        "SELECT * FROM admins WHERE username='$username'"
    );


    $admin = mysqli_fetch_assoc($query);



    if($admin && $password == $admin['password']){


        $_SESSION['admin'] = $admin['username'];


        header("Location: dashboard.php");

        exit();


    }else{


        $error = "Invalid Username or Password";


    }


}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TechElite Admin Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

</head>

<body>

<div class="login-page">

    <!-- LEFT SIDE -->

    <div class="left-panel">

        <div class="left-content">

            <h1>
                TechElite Solutions
            </h1>

            <p>
                Smart Digital Solutions for Modern Businesses
            </p>

            <!-- Hero image goes here -->
            <div class="hero-image">


                <div class="floating-card card-one">

                    <i class="fa-solid fa-chart-line"></i>

                    <div>

                        <span>Projects</span>

                        <strong>150+</strong>

                    </div>

                </div>



                <img src="assets/images/herp2.png"
                    alt="TechElite">



                <div class="floating-card card-two">

                    <i class="fa-solid fa-users"></i>

                    <div>

                        <span>Clients</span>

                        <strong>98%</strong>

                    </div>

                </div>



                <div class="floating-card card-three">

                    <i class="fa-solid fa-robot"></i>

                    <div>

                        <span>AI Solutions</span>

                        <strong>25+</strong>

                    </div>

                </div>


            </div>

        </div>

    </div>



    <!-- RIGHT SIDE -->

    <div class="right-panel">

        <div class="login-card">

            <div class="logo">

                <img src="assets/images/logo.png"
                     alt="Logo">

            </div>

            <h2>
                Welcome Back
            </h2>

            <p>
                Login to Admin Dashboard
            </p>

            <div class="secure-badge">

                <i class="fa-solid fa-shield-halved"></i>

                    Secure Admin Access

            </div>

            <?php if(isset($error)){ ?>

            <p class="error">
                <?php echo $error; ?>
            </p>

            <?php } ?>


            <form action="" method="POST">

                <div class="input-box">

                    <i class="fa-solid fa-user"></i>

                    <input
                        type="text"
                        name="username"
                        placeholder="Username"
                        required>

                </div>


                <div class="input-box">

                    <i class="fa-solid fa-lock"></i>

                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        required>

                </div>

                <div class="login-options">

                    <label>

                        <input type="checkbox">

                        Remember me

                    </label>


                    <a href="#">
                        Forgot Password?
                    </a>

                </div>


                <button type="submit" name="login">

                    Login

                </button>

                <div class="login-footer">

                    © 2026 TechElite Solutions

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>