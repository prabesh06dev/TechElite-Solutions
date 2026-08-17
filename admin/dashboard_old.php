<?php

session_start();

include "includes/config.php";


if(!isset($_SESSION['admin'])){

    header("Location: login.php");

    exit();

}


// Dashboard Counts

$projects = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM projects")
);


$employees = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM employees")
);


$clients = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM clients")
);

$messages = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM messages")
);

$recentProjects = mysqli_query(
    $conn,
    "SELECT * FROM projects ORDER BY id DESC LIMIT 5"
);

$recentEmployees = mysqli_query(
    $conn,
    "SELECT * FROM employees ORDER BY id DESC LIMIT 5"
);

$recentMessages = mysqli_query(
    $conn,
    "SELECT * FROM messages ORDER BY id DESC LIMIT 5"
);


?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>TechElite Admin Dashboard</title>


<link rel="stylesheet" href="css/dashboard.css">


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>


<body>


<div class="dashboard">


    <!-- Sidebar -->

    <aside class="sidebar">

    <div class="brand">

        <img src="assets/images/logo.png" alt="Logo">

        <h2>TechElite</h2>

    </div>

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
                <i class="fa-solid fa-folder"></i>
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

    <div class="sidebar-footer">

        <div class="admin-info">

            <i class="fa-solid fa-circle-user"></i>

            <div>

                <strong><?php echo $_SESSION['admin']; ?></strong>

                <small>Administrator</small>

            </div>

        </div>

        <a href="logout.php" class="logout-btn">

            <i class="fa-solid fa-right-from-bracket"></i>

            Logout

        </a>

    </div>

</aside>


    <!-- Main Content -->

    <main class="main">

        <header class="topbar">

    <div class="topbar-left">

        <h1>Dashboard</h1>
        <?php

        date_default_timezone_set("Asia/Kathmandu");

        $hour = date("H");

        if($hour < 12){
            $greeting = "Good Morning";

        }
        elseif($hour < 17){

            $greeting = "Good Afternoon";

        }
        else{

            $greeting = "Good Evening";

        }

        ?>

<p>

<?php echo $greeting; ?>,

<strong>

<?php echo $_SESSION['admin']; ?>

</strong>

👋

</p>
      

    </div>

    <div class="topbar-right">

        <div class="search-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                placeholder="Search...">

        </div>

        <div class="notification">

    <i class="fa-solid fa-bell" id="bell"></i>

    <span class="badge">

        <?php
        echo mysqli_num_rows(
            mysqli_query($conn,"SELECT * FROM messages")
        );
        ?>

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

            <strong><?php echo $msg['name']; ?></strong>

            <small><?php echo $msg['subject']; ?></small>

        </div>

        <?php

            }

        }else{

            echo "<p style='padding:15px;'>No messages found.</p>";

        }

        ?>

    </div>

</div>

        <div class="top-icon">

            <i class="fa-solid fa-envelope"></i>

            <span class="badge">5</span>

        </div>

        <div id="clock" class="clock"></div>

        <div class="profile">

            <div class="profile-info" id="profileBtn">

                <img src="assets/images/admin.png" width="45">

                <div>

                    <strong><?php echo $_SESSION['admin']; ?></strong>

                    <small>Administrator</small>

                </div>

            </div>

            <div class="profile-menu" id="profileMenu">

                <a href="profile.php">
                    <i class="fa-solid fa-user"></i>
                    My Profile
                </a>

                <a href="#">
                <i class="fa-solid fa-gear"></i>
                    Settings
                </a>

                

            </div>

        </div>



</header>
        

        <section class="cards">

    <div class="card projects-card">

        <div class="card-icon">
            <i class="fa-solid fa-folder"></i>
        </div>

        <div class="card-content">

            <h2><?php echo $projects; ?></h2>

            <p>Total Projects</p>

            <small>Active Development</small>

        </div>

    </div>



    <div class="card employees-card">

        <div class="card-icon">
            <i class="fa-solid fa-users"></i>
        </div>

        <div class="card-content">

            <h2><?php echo $employees; ?></h2>

            <p>Total Employees</p>

            <small>Team Members</small>

        </div>

    </div>



    <div class="card clients-card">

        <div class="card-icon">
            <i class="fa-solid fa-user-group"></i>
        </div>

        <div class="card-content">

            <h2><?php echo $clients; ?></h2>

            <p>Total Clients</p>

            <small>Business Partners</small>

        </div>

    </div>



    <div class="card messages-card">

        <div class="card-icon">
            <i class="fa-solid fa-envelope"></i>
        </div>

        <div class="card-content">

            <h2>
                <?php
                echo mysqli_num_rows(
                    mysqli_query($conn,"SELECT * FROM messages")
                );
                ?>
            </h2>

            <p>Messages</p>

            <small>Inbox</small>

        </div>

    </div>

</section>

<section class="analytics">

    <div class="analytics-card">

        <h2>System Analytics</h2>

        <canvas id="dashboardChart"></canvas>

    </div>

</section>

<section class="activity-section">

    <div class="activity-card">

        <h2>Recent Projects</h2>

        <?php
        $recentProjects = mysqli_query(
            $conn,
            "SELECT * FROM projects ORDER BY id DESC LIMIT 5"
        );

        while($row=mysqli_fetch_assoc($recentProjects)){
        ?>

            <div class="activity-item">

                <i class="fa-solid fa-folder"></i>

                <div>

                    <strong><?php echo $row['title']; ?></strong>

                    <small>Project Added</small>

                </div>

            </div>

        <?php } ?>

    </div>



    <div class="activity-card">

        <h2>Recent Employees</h2>

        <?php

        $recentEmployees = mysqli_query(
            $conn,
            "SELECT * FROM employees ORDER BY id DESC LIMIT 5"
        );

        while($row=mysqli_fetch_assoc($recentEmployees)){
        ?>

            <div class="activity-item">

                <i class="fa-solid fa-user"></i>

                <div>

                    <strong><?php echo $row['name']; ?></strong>

                    <small><?php echo $row['position']; ?></small>

                </div>

            </div>

        <?php } ?>

    </div>



    <div class="activity-card">

        <h2>Recent Messages</h2>

        <?php

        $recentMessages = mysqli_query(
            $conn,
            "SELECT * FROM messages ORDER BY id DESC LIMIT 5"
        );

        while($row=mysqli_fetch_assoc($recentMessages)){
        ?>

            <div class="activity-item">

                <i class="fa-solid fa-envelope"></i>

                <div>

                    <strong><?php echo $row['name']; ?> </strong>

                    <small><?php echo $row['subject']; ?></small>

                </div>

            </div>

        <?php } ?>

    </div>

</section>

        

     


<section class="quick-actions">

    <div class="action-card">

        <i class="fa-solid fa-folder-plus"></i>

        <h3>Add Project</h3>

        <a href="projects/add_project.php">Open</a>

    </div>

    <div class="action-card">

        <i class="fa-solid fa-user-plus"></i>

        <h3>Add Employee</h3>

        <a href="employees/add_employee.php">Open</a>

    </div>

    <div class="action-card">

        <i class="fa-solid fa-building"></i>

        <h3>Add Client</h3>

        <a href="clients/add_client.php">Open</a>

    </div>

    <div class="action-card">

        <i class="fa-solid fa-envelope"></i>

        <h3>Messages</h3>

        <a href="messages/messages.php">View</a>

    </div>

</section>



    </main>


</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('dashboardChart');

new Chart(ctx,{

    type:'bar',

    data:{

        labels:[
            'Projects',
            'Employees',
            'Clients',
            'Messages'
        ],

        datasets:[{

            label:'System Overview',

            data:[

                <?php echo $projects; ?>,

                <?php echo $employees; ?>,

                <?php echo $clients; ?>,

                <?php
                echo mysqli_num_rows(
                    mysqli_query($conn,"SELECT * FROM messages")
                );
                ?>

            ],

            backgroundColor:[
                '#2563EB',
                '#10B981',
                '#F59E0B',
                '#EF4444'
            ],

            borderRadius:12

        }]

    },

    options:{

        responsive:true,

        plugins:{
            legend:{
                display:false
            }
        },

        scales:{
            y:{
                beginAtZero:true
            }
        }

    }

});

</script>


<script>

function updateClock(){

    const now = new Date();

    document.getElementById("clock").innerHTML =
    now.toLocaleTimeString();

}

setInterval(updateClock,1000);

updateClock();

</script>

<script>

const bell=document.getElementById("bell");

const menu=document.getElementById("notificationMenu");

bell.onclick=function(){

    if(menu.style.display=="block"){

        menu.style.display="none";

    }else{

        menu.style.display="block";

    }

}

window.onclick=function(e){

    if(!e.target.closest(".notification")){

        menu.style.display="none";

    }

}

</script>

<script>

const profileBtn=document.getElementById("profileBtn");

const profileMenu=document.getElementById("profileMenu");

profileBtn.onclick=function(){

profileMenu.style.display=
profileMenu.style.display=="block"?
"none":"block";

}

window.addEventListener("click",function(e){

if(!e.target.closest(".profile")){

profileMenu.style.display="none";

}

});

</script>

<script>

document.querySelectorAll(".card strong").forEach(counter=>{

    const target=parseInt(counter.innerText);

    let count=0;

    const speed=Math.max(1, Math.ceil(target/40));

    function update(){

        if(count<target){

            count+=speed;

            if(count>target) count=target;

            counter.innerText=count;

            requestAnimationFrame(update);

        }

    }

    update();

});

</script>
</body>

</html>