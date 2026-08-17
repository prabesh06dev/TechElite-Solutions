<?php

session_start();

include "includes/config.php";

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

    exit();

}

$admin = mysqli_fetch_assoc(

    mysqli_query(
        $conn,
        "SELECT * FROM admins
        WHERE username='".$_SESSION['admin']."'"
    )

);


if(isset($_POST['update'])){

  

    $username = mysqli_real_escape_string(
        $conn,
        $_POST['username']
    );

    mysqli_query(
        $conn,
        "UPDATE admins
         SET username='$username'
         WHERE username='".$_SESSION['admin']."'"
    );

    $_SESSION['admin'] = $username;

    header("Location: profile.php");

    exit();

}

?>

<!DOCTYPE html>
<html>

<head>

<title>My Profile</title>

<link rel="stylesheet" href="css/dashboard.css">

</head>

<body>

<div class="main">

    <h1>My Profile</h1>

    <!-- STEP 3 STARTS HERE -->

    <form method="POST" enctype="multipart/form-data">

        <label>Username</label>

        <input
        type="text"
        name="username"
        value="<?php echo $admin['username']; ?>">

        <label>Profile Image</label>

        <input
        type="file"
        name="image"
        accept="image/*">

        <label>New Password</label>

        <input
        type="password"
        name="password">

        <button
        type="submit"
        name="update">

        Update Profile

        </button>

    </form>

    <!-- STEP 3 ENDS HERE -->

</div>

</body>

</html>