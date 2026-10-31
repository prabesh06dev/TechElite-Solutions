<?php

/* =====================================================
   TechElite Solutions - Admin Dashboard
   Dashboard Controller
===================================================== */

session_start();

include "includes/config.php";

/* =====================================================
   Authentication
===================================================== */

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

/* =====================================================
   Dashboard Statistics
===================================================== */

$projectQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM projects"
);

$employeeQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM employees"
);

$clientQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM clients"
);

$messageQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM messages"
);

$projects = mysqli_fetch_assoc($projectQuery)['total'];

$employees = mysqli_fetch_assoc($employeeQuery)['total'];

$clients = mysqli_fetch_assoc($clientQuery)['total'];

$messages = mysqli_fetch_assoc($messageQuery)['total'];


/* =====================================================
   Monthly Project Growth
===================================================== */

$monthlyProjects = [];

for ($month = 1; $month <= 12; $month++) {

    $query = mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
         FROM projects
         WHERE MONTH(created_at) = $month
         AND YEAR(created_at) = YEAR(CURDATE())"
    );

    $result = mysqli_fetch_assoc($query);

    $monthlyProjects[] = $result['total'];
}

/* =====================================================
   Recent Projects
===================================================== */

$recentProjects = mysqli_query(
    $conn,
    "SELECT * FROM projects ORDER BY id DESC LIMIT 5"
);

/* =====================================================
   Recent Employees
===================================================== */

$recentEmployees = mysqli_query(
    $conn,
    "SELECT * FROM employees ORDER BY id DESC LIMIT 5"
);

/* =====================================================
   Recent Messages
===================================================== */

$recentMessages = mysqli_query(
    $conn,
    "SELECT * FROM messages ORDER BY id DESC LIMIT 5"
);

/* =====================================================
   Greeting
===================================================== */

date_default_timezone_set("Asia/Kathmandu");

$currentHour = date("H");

if ($currentHour < 12) {

    $greeting = "Good Morning";

} elseif ($currentHour < 17) {

    $greeting = "Good Afternoon";

} else {

    $greeting = "Good Evening";

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- =====================================================
         Meta Information
    ====================================================== -->

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- =====================================================
         Page Title
    ====================================================== -->

    <title>TechElite Solutions | Admin Dashboard</title>

    <!-- =====================================================
         Dashboard Stylesheet
    ====================================================== -->

    <link
        rel="stylesheet"
        href="css/dashboard.css"
    >

    <!-- =====================================================
         Font Awesome Icons
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >

    <!-- =====================================================
         Chart.js
    ====================================================== -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

    <!-- =====================================================
         Dashboard Wrapper
    ====================================================== -->

    <div class="dashboard">

        <aside class="sidebar">

    <!-- ================= Brand ================= -->

            <div class="brand">
                <a href ="../index.php" class="brand">

                    <div class="brand-logo">

                        <img src="assets/images/logo.png"
                            alt="TechElite Logo">

                    </div>

                    <div class="brand-text">

                        <h2>TechElite</h2>

                        <span>Solutions</span>

                    </div>
                </a>

            </div>

    <!-- ================= Navigation ================= -->

    <nav>

        <ul class="sidebar-menu">

            <li class="active">

                <a href="dashboard.php">

                    <i class="fa-solid fa-chart-line"></i>

                    <span>Dashboard</span>

                </a>

            </li>

            <li>

                <a href="employees/employees.php">

                    <i class="fa-solid fa-users"></i>

                    <span>Employees</span>

                </a>

            </li>

            <li>

                <a href="projects/projects.php">

                    <i class="fa-solid fa-folder-open"></i>

                    <span>Projects</span>

                </a>

            </li>

            <li>

                <a href="clients/clients.php">

                    <i class="fa-solid fa-user-group"></i>

                    <span>Clients</span>

                </a>

            </li>

            <li>

                <a href="messages/messages.php">

                    <i class="fa-solid fa-envelope"></i>

                    <span>Messages</span>

                </a>

            </li>

            <li>

                <a href="settings/settings.php">

                    <i class="fa-solid fa-gear"></i>

                    <span>Settings</span>

                </a>

            </li>

        </ul>

    </nav>

    <!-- ================= Footer ================= -->

    <div class="sidebar-footer">

        <div class="admin-info">

            <i class="fa-solid fa-circle-user"></i>

            <div>

                <strong>
                    <?php echo $_SESSION['admin']; ?>
                </strong>

                <small>Administrator</small>

            </div>

        </div>

        <a href="logout.php" class="logout-btn">

            <i class="fa-solid fa-right-from-bracket"></i>

            <span>Logout</span>

        </a>

    </div>

        </aside>

        <main class="main">

            <header class="topbar">

    <!-- ================= Left Side ================= -->

                <div class="topbar-left">

                    <h1>Dashboard</h1>

                    <p> <?php echo $greeting; ?>,

                    <strong><?php echo $_SESSION['admin']; ?></strong>

                    👋 Welcome Back

                    </p>

                </div>

    <!-- ================= Right Side ================= -->

                <div class="topbar-right">

        <!-- Search Box -->

                    <div class="search-box">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input type="text" placeholder="Search anything...">

                    </div>

        <!-- Notifications -->

                    <div class="notification">

                        <i class="fa-solid fa-bell" id="bell"></i>

                        <span class="badge">

                        <?php echo $messages; ?>

                        </span>

                        <div class="notification-menu" id="notificationMenu">

                            <h4>Recent Messages</h4>

                            <?php

                                $notify = mysqli_query(
                                $conn,
                                "SELECT * FROM messages ORDER BY id DESC LIMIT 5"
                                );

                                if(mysqli_num_rows($notify)>0){

                                    while($msg=mysqli_fetch_assoc($notify)){

                            ?>

                            <div class="notify-item">

                                <strong>

                                    <?php echo $msg['name']; ?>

                                </strong>

                                <small>

                                     <?php echo $msg['subject']; ?>

                                </small>

                            </div>

                            <?php

                            }

                            }else{

                                echo "<p style='padding:15px;'>No messages found.</p>";

                            }

                            ?>

                        </div>

                    </div>

           
        <!-- Profile -->

                    <div class="profile">

                        <div class="profile-info" id="profileBtn">

                            <img src="assets/images/admin.png" class="avatar">

                            <div class="profile-text">

                                <h4><?php echo $_SESSION['admin'];?></h4>
                                <span>Administrator</span>
                            </div>

                            <i class="fa-solid fa-angle-down"></i>

                        </div>

                        <div class="profile-menu" id="profileMenu">
            

                            <a href="profile.php">

                                <i class="fa-solid fa-user"></i>

                                My Profile

                            </a>

                            <a href="settings/settings.php">

                                <i class="fa-solid fa-gear"></i>

                                Settings

                            </a>

                            <a href="logout.php">

                                <i class="fa-solid fa-right-from-bracket"></i>

                                    Logout

                            </a>

                        </div>

                    </div>

                </div>

            </header>

<!-- =====================================================
     Hero Section
===================================================== -->

<section class="hero-section">

    <!-- ================= Welcome Card ================= -->

    <div class="welcome-card">

        <div class="welcome-content">

            <span class="welcome-tag">

                TechElite Solutions Dashboard

            </span>

            <h2>

                <?php echo $greeting; ?>,

                <?php echo $_SESSION['admin']; ?> 👋

            </h2>

            <p>

                Welcome back to your administration dashboard.
                Monitor projects, employees, clients and business operations from one powerful dashboard designed dor TechElite Solutions.

            </p>

            <div class="hero-buttons">

                <a href="projects/add_project.php" class="btn-primary">

                    <i class="fa-solid fa-folder-plus"></i>

                    New Project

                </a>

                <a href="employees/add_employee.php" class="btn-secondary">

                    <i class="fa-solid fa-user-plus"></i>

                    Add Employee

                </a>

            </div>

        </div>

    </div>

    <!-- ================= Today's Overview ================= -->

    <div class="overview-card">

        <h3>

            Today's Overview

        </h3>

        <div class="overview-item">

            <span>Total Projects</span>

            <strong>

                <?php echo $projects; ?>

            </strong>

        </div>

        <div class="overview-item">

            <span>Total Employees</span>

            <strong>

                <?php echo $employees; ?>

            </strong>

        </div>

        <div class="overview-item">

            <span>Total Clients</span>

            <strong>

                <?php echo $clients; ?>

            </strong>

        </div>

        <div class="overview-item">

            <span>Messages</span>

            <strong>

                <?php echo $messages; ?>

            </strong>

        </div>

    </div>

</section>

<!-- =====================================================
     Dashboard Statistics Cards
===================================================== -->

<section class="cards">
    <!-- ================= Projects ================= -->
    <div class="card projects-card">

        <div class="card-header">
            <div class="card-title">
                <span>Total Projects</span>
                <h2><?php echo $projects; ?></h2>
            </div>

            <div class="card-icon">
                <i class="fa-solid fa-folder-open"></i>
            </div>
        </div>

        <div class="card-footer">
            <span class="trend up">+12%</span>

        <div class="progress-bar">
            <div class="progress-fill blue"></div>
        </div>
        </div>

    </div>

<!-- ================= Employees ================= -->
    <div class="card employees-card">

        <div class="card-header">
            <div class="card-title">
                <span>Total Employees</span>
                <h2><?php echo $employees; ?></h2>
            </div>

            <div class="card-icon">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>

        <div class="card-footer">
            <span class="trend up">+8%</span>

            <div class="progress-bar">
                <div class="progress-fill green"></div>
            </div>
        </div>

    </div>

<!-- ================= Clients ================= -->
    <div class="card clients-card">

        <div class="card-header">
            <div class="card-title">
                <span>Total Clients</span>
                <h2><?php echo $clients; ?></h2>
            </div>

            <div class="card-icon">
                <i class="fa-solid fa-user-group"></i>
            </div>
        </div>

        <div class="card-footer">
            <span class="trend up">+5%</span>

            <div class="progress-bar">
                <div class="progress-fill orange"></div>
            </div>
        </div>

    </div>

<!-- ================= Messages ================= -->
    <div class="card messages-card">

        <div class="card-header">
            <div class="card-title">
                <span>Messages</span>
                <h2><?php echo $messages; ?></h2>
            </div>

            <div class="card-icon">
                <i class="fa-solid fa-envelope"></i>
            </div>
        </div>

        <div class="card-footer">
            <span class="trend down">New</span>

            <div class="progress-bar">
                <div class="progress-fill red"></div>
            </div>
        </div>

    </div>

</section>

<!-- =====================================================
     Analytics Section
===================================================== -->

<section class="analytics-row">


    <!-- ================= Monthly Growth Chart ================= -->

    <div class="analytics-card">

        <div class="section-header">

            <h2>
                Monthly Growth
            </h2>

            <span>
                2026
            </span>

        </div>


        <div class="chart-container">

            <canvas id="growthChart"></canvas>

        </div>


    </div>



    <!-- ================= Project Distribution Chart ================= -->

    <div class="analytics-card">

        <div class="section-header">

            <h2>
                Project Distribution
            </h2>

            <span>
                Overview
            </span>

        </div>


        <div class="chart-container">

            <canvas id="dashboardChart"></canvas>

        </div>


    </div>


</section>


<!-- =====================================================
     Recent Employees & Messages
===================================================== -->

<section class="activity-row">


    <!-- ================= Recent Employees ================= -->

    <div class="activity-card">

        <div class="section-header">

            <h2>
                Recent Employees
            </h2>

            <a href="employees/employees.php">
                View All
            </a>

        </div>


        <?php

        $recentEmployees = mysqli_query(
            $conn,
            "SELECT * FROM employees ORDER BY id DESC LIMIT 5"
        );


        if(mysqli_num_rows($recentEmployees) > 0){


            while($row = mysqli_fetch_assoc($recentEmployees)){


        ?>



        <div class="activity-item">


            <div class="activity-icon employee">

                <i class="fa-solid fa-user"></i>

            </div>



            <div class="activity-content">


                <strong>

                    <?php echo $row['name']; ?>

                </strong>


                <small>

                    <?php echo $row['position']; ?>

                </small>


                <span class="activity-time">

                    Recently Added

                </span>


            </div>


        </div>



        <?php

            }

        }else{


            echo "<p class='empty'>No employees found</p>";


        }

        ?>


    </div>




    <!-- ================= Recent Messages ================= -->


    <div class="activity-card">


        <div class="section-header">

            <h2>
                Recent Messages
            </h2>


            <a href="messages/messages.php">
                View All
            </a>


        </div>



        <?php


        $recentMessages = mysqli_query(
            $conn,
            "SELECT * FROM messages ORDER BY id DESC LIMIT 5"
        );


        if(mysqli_num_rows($recentMessages) > 0){


            while($row = mysqli_fetch_assoc($recentMessages)){


        ?>



        <div class="activity-item">


            <div class="activity-icon message">


                <i class="fa-solid fa-envelope"></i>


            </div>



            <div class="activity-content">


                <strong>

                    <?php echo $row['name']; ?>

                </strong>



                <small>

                    <?php echo $row['subject']; ?>

                </small>



                <span class="activity-time">

                    New Message

                </span>


            </div>



        </div>



        <?php


            }


        }else{


            echo "<p class='empty'>No messages found</p>";


        }


        ?>


    </div>


</section>


<!-- =====================================================
     Recent Activity Timeline
===================================================== -->

<section class="activity-timeline">


    <div class="section-header">

        <h2>
            Recent Activity
        </h2>

    </div>



    <div class="timeline">


        <?php


        $activities = [];



        /* ================= Projects ================= */


        $projectQuery = mysqli_query(
            $conn,
            "SELECT title FROM projects ORDER BY id DESC LIMIT 3"
        );


        while($row = mysqli_fetch_assoc($projectQuery)){


            $activities[] = [

                "icon" => "fa-folder-open",

                "color" => "blue",

                "title" => $row['title'],

                "desc" => "New project created"

            ];

        }





        /* ================= Employees ================= */


        $employeeQuery = mysqli_query(
            $conn,
            "SELECT name, position FROM employees ORDER BY id DESC LIMIT 3"
        );


        while($row = mysqli_fetch_assoc($employeeQuery)){


            $activities[] = [


                "icon" => "fa-user",

                "color" => "green",

                "title" => $row['name'],

                "desc" => "Joined as ".$row['position']


            ];

        }





        /* ================= Messages ================= */


        $messageQuery = mysqli_query(
            $conn,
            "SELECT name, subject FROM messages ORDER BY id DESC LIMIT 3"
        );


        while($row = mysqli_fetch_assoc($messageQuery)){


            $activities[] = [


                "icon" => "fa-envelope",

                "color" => "red",

                "title" => $row['name'],

                "desc" => $row['subject']


            ];

        }





        foreach($activities as $item){


        ?>



        <div class="timeline-item">


            <div class="timeline-icon <?php echo $item['color']; ?>">


                <i class="fa-solid <?php echo $item['icon']; ?>"></i>


            </div>



            <div class="timeline-content">


                <strong>

                    <?php echo $item['title']; ?>

                </strong>


                <p>

                    <?php echo $item['desc']; ?>

                </p>


            </div>


        </div>



        <?php

        }

        ?>


    </div>


</section>

<!-- =====================================================
     Quick Actions
===================================================== -->

<section class="quick-actions">


    <!-- ================= Add Project ================= -->

    <div class="action-card">


        <div class="action-icon blue">

            <i class="fa-solid fa-folder-plus"></i>

        </div>



        <div class="action-content">


            <h3>
                Add Project
            </h3>


            <p>
                Create a new company project
            </p>


        </div>



        <a href="projects/add_project.php">

            Add Now

        </a>


    </div>





    <!-- ================= Add Employee ================= -->


    <div class="action-card">


        <div class="action-icon green">

            <i class="fa-solid fa-user-plus"></i>

        </div>



        <div class="action-content">


            <h3>
                Add Employee
            </h3>


            <p>
                Add a new team member
            </p>


        </div>



        <a href="employees/add_employee.php">

            Add Now

        </a>


    </div>





    <!-- ================= Add Client ================= -->


    <div class="action-card">


        <div class="action-icon orange">

            <i class="fa-solid fa-building"></i>

        </div>



        <div class="action-content">


            <h3>
                Add Client
            </h3>


            <p>
                Create client profile
            </p>


        </div>



        <a href="clients/add_client.php">

            Add Now

        </a>


    </div>





    <!-- ================= Messages ================= -->


    <div class="action-card">


        <div class="action-icon red">

            <i class="fa-solid fa-envelope"></i>

        </div>



        <div class="action-content">


            <h3>
                Messages
            </h3>


            <p>
                View customer messages
            </p>


        </div>

        <a href="messages/messages.php">

            View

        </a>

<   /div>

</section>


</main>


</div>



       


<!-- =====================================================
     JavaScript Section
===================================================== -->


<!-- Chart.js -->

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->



<script>

<script>

/* =====================================================
   Project Distribution Chart
===================================================== */

const dashboardChart =
    document.getElementById("dashboardChart");

new Chart(dashboardChart, {

    type: "doughnut",

    data: {

        labels: [
            "Projects",
            "Employees",
            "Clients",
            "Messages"
        ],

        datasets: [{

            data: [
                <?php echo $projects; ?>,
                <?php echo $employees; ?>,
                <?php echo $clients; ?>,
                <?php echo $messages; ?>
            ],

            backgroundColor: [
                "#2563EB",
                "#10B981",
                "#F59E0B",
                "#EF4444"
            ],

            borderWidth: 0

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {

                position: "bottom",

                labels: {

                    usePointStyle: true

                }

            }

        }

    }

});


/* =====================================================
   Monthly Project Growth Chart
===================================================== */

const growthChart =
    document.getElementById("growthChart");

new Chart(growthChart, {

    type: "line",

    data: {

        labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec"
        ],

        datasets: [{

            label: "Projects Created",

            data: <?php echo json_encode($monthlyProjects); ?>,

            borderColor: "#2563EB",

            backgroundColor: "rgba(37, 99, 235, 0.15)",

            fill: true,

            tension: 0.4

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {

                display: false

            }

        }

    }

});

</script>






<script>

/* =====================================================
   Notification Dropdown
===================================================== */


const bell =
document.getElementById("bell");


const notificationMenu =
document.getElementById("notificationMenu");



bell.onclick=function(e){


    e.stopPropagation();


    notificationMenu.style.display =

    notificationMenu.style.display === "block"

    ? "none"

    : "block";


};



window.addEventListener("click",function(e){


    if(!e.target.closest(".notification")){


        notificationMenu.style.display="none";


    }


});



</script>





<script>

/* =====================================================
   Profile Dropdown
===================================================== */


const profileBtn =
document.getElementById("profileBtn");


const profileMenu =
document.getElementById("profileMenu");



profileBtn.onclick=function(e){


    e.stopPropagation();


    profileMenu.style.display =

    profileMenu.style.display === "block"

    ? "none"

    : "block";


};



window.addEventListener("click",function(e){


    if(!e.target.closest(".profile")){


        profileMenu.style.display="none";


    }


});



</script>





<script>

/* =====================================================
   Counter Animation
===================================================== */


document
.querySelectorAll(".card h2")
.forEach(counter=>{


    const target =
    parseInt(counter.innerText);



    let count=0;



    const speed =
    Math.max(1,Math.ceil(target/40));



    function update(){


        if(count < target){


            count += speed;


            if(count > target){

                count = target;

            }


            counter.innerText=count;


            requestAnimationFrame(update);


        }


    }



    update();



});



</script>



</body>

</html>