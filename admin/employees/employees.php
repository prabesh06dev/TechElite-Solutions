<?php

session_start();

require_once "../includes/config.php";

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

/*
|--------------------------------------------------------------------------
| Employee Statistics
|--------------------------------------------------------------------------
*/
$totalEmployees = 0;
$activeEmployees = 0;
$leaveEmployees = 0;
$inactiveEmployees = 0;

$statsQuery = mysqli_query(
    $conn,
    "SELECT
        COUNT(*) AS total,
        SUM(status = 'Active') AS active,
        SUM(status = 'On Leave') AS on_leave,
        SUM(status = 'Inactive') AS inactive
     FROM employees"
);

if ($statsQuery) {
    $stats = mysqli_fetch_assoc($statsQuery);

    $totalEmployees    = (int) ($stats['total'] ?? 0);
    $activeEmployees   = (int) ($stats['active'] ?? 0);
    $leaveEmployees    = (int) ($stats['on_leave'] ?? 0);
    $inactiveEmployees = (int) ($stats['inactive'] ?? 0);
}

/*
|--------------------------------------------------------------------------
| Fetch Employees
|--------------------------------------------------------------------------
*/
$result = mysqli_query(
    $conn,
    "SELECT *
     FROM employees
     ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Employees | TechElite Solutions</title>

    <!-- Main CSS -->
    <link
        rel="stylesheet"
        href="css/employees.css"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >

</head>

<body>

<div class="container">

    <!-- =========================================================
         PAGE HEADER
    ========================================================== -->

    <div class="page-header">

        <div>
            <h1>Employees</h1>

            <p>
                Manage all company employees.
            </p>
        </div>

        <a
            href="add_employee.php"
            class="btn"
        >
            <i class="fa-solid fa-user-plus"></i>
            Add Employee
        </a>

    </div>


    <!-- =========================================================
         EMPLOYEE STATISTICS
    ========================================================== -->

    <div class="stats-grid">

        <!-- Total Employees -->
        <div class="stat-card">

            <i class="fa-solid fa-users"></i>

            <h2>
                <?php echo $totalEmployees; ?>
            </h2>

            <span>
                Total Employees
            </span>

        </div>


        <!-- Active Employees -->
        <div class="stat-card active">

            <i class="fa-solid fa-user-check"></i>

            <h2>
                <?php echo $activeEmployees; ?>
            </h2>

            <span>
                Active
            </span>

        </div>


        <!-- Employees On Leave -->
        <div class="stat-card leave">

            <i class="fa-solid fa-user-clock"></i>

            <h2>
                <?php echo $leaveEmployees; ?>
            </h2>

            <span>
                On Leave
            </span>

        </div>


        <!-- Inactive Employees -->
        <div class="stat-card inactive">

            <i class="fa-solid fa-user-xmark"></i>

            <h2>
                <?php echo $inactiveEmployees; ?>
            </h2>

            <span>
                Inactive
            </span>

        </div>

    </div>


    <!-- =========================================================
         SEARCH & FILTERS
    ========================================================== -->

    <div class="employee-controls">

        <!-- Search -->
        <div class="search-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                id="searchEmployee"
                placeholder="Search employee..."
                autocomplete="off"
            >

        </div>


        <!-- Filters -->
        <div class="filters">

            <!-- Department Filter -->
            <select id="departmentFilter">

                <option value="">
                    All Departments
                </option>

                <option value="Development">
                    Development
                </option>

                <option value="Design">
                    Design
                </option>

                <option value="HR">
                    HR
                </option>

                <option value="Marketing">
                    Marketing
                </option>

            </select>


            <!-- Status Filter -->
            <select id="statusFilter">

                <option value="">
                    All Status
                </option>

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

    </div>


    <!-- =========================================================
         EMPLOYEE TABLE
    ========================================================== -->

    <?php if ($result && mysqli_num_rows($result) > 0): ?>

        <div class="employee-table-wrapper">

            <table class="employee-table">

                <!-- Table Header -->
                <thead>

                    <tr>

                        <th>Employee</th>

                        <th>Department</th>

                        <th>Position</th>

                        <th>Email</th>

                        <th>Phone</th>

                        <th>Status</th>

                        <th>Actions</th>

                    </tr>

                </thead>


                <!-- Table Body -->
                <tbody>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                    <?php
                        $employeeId = (int) $row['id'];
                        $employeeStatus = $row['status'] ?? '';
                        $employeeDepartment = $row['department'] ?? '';

                        $statusClass = strtolower(
                            str_replace(' ', '-', $employeeStatus)
                        );
                    ?>

                    <tr
                        class="employee-row"
                        data-department="<?php echo htmlspecialchars($employeeDepartment); ?>"
                        data-status="<?php echo htmlspecialchars($employeeStatus); ?>"
                    >

                        <!-- =================================================
                             EMPLOYEE
                        ================================================== -->

                        <td>

                            <div class="employee-profile">

                                <?php if (!empty($row['image'])): ?>

                                    <img
                                        src="../assets/images/team/<?php echo htmlspecialchars($row['image']); ?>"
                                        alt="<?php echo htmlspecialchars($row['name']); ?>"
                                    >

                                <?php else: ?>

                                    <img
                                        src="../assets/images/admin.png"
                                        alt="Employee"
                                    >

                                <?php endif; ?>


                                <div class="employee-name">

                                    <strong>
                                        <?php echo htmlspecialchars($row['name']); ?>
                                    </strong>

                                    <span>
                                        Employee ID:
                                        #<?php echo $employeeId; ?>
                                    </span>

                                </div>

                            </div>

                        </td>


                        <!-- =================================================
                             DEPARTMENT
                        ================================================== -->

                        <td>

                            <span class="department-badge">

                                <?php echo htmlspecialchars($employeeDepartment); ?>

                            </span>

                        </td>


                        <!-- =================================================
                             POSITION
                        ================================================== -->

                        <td>

                            <?php echo htmlspecialchars($row['position']); ?>

                        </td>


                        <!-- =================================================
                             EMAIL
                        ================================================== -->

                        <td>

                            <?php echo htmlspecialchars($row['email']); ?>

                        </td>


                        <!-- =================================================
                             PHONE
                        ================================================== -->

                        <td>

                            <?php echo htmlspecialchars($row['phone']); ?>

                        </td>


                        <!-- =================================================
                             STATUS
                        ================================================== -->

                        <td>

                            <span
                                class="status <?php echo htmlspecialchars($statusClass); ?>"
                            >

                                <?php echo htmlspecialchars($employeeStatus); ?>

                            </span>

                        </td>


                        <!-- =================================================
                             ACTIONS
                        ================================================== -->

                        <td>

                            <div class="employee-actions">

                                <!-- View -->
                                <a
                                    href="view_employee.php?id=<?php echo $employeeId; ?>"
                                    class="view"
                                    title="View Employee"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                </a>


                                <!-- Edit -->
                                <a
                                    href="edit_employee.php?id=<?php echo $employeeId; ?>"
                                    class="edit"
                                    title="Edit Employee"
                                >
                                    <i class="fa-solid fa-pen"></i>
                                </a>


                                <!-- Delete -->
                                <a
                                    href="delete_employee.php?id=<?php echo $employeeId; ?>"
                                    class="delete"
                                    title="Delete Employee"
                                    onclick="return confirm('Are you sure you want to delete this employee?');"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                            </div>

                        </td>

                    </tr>

                <?php endwhile; ?>

                </tbody>

            </table>

        </div>


    <?php else: ?>

        <!-- =========================================================
             EMPTY STATE
        ========================================================== -->

        <div class="empty-state">

            <i class="fa-solid fa-users-slash"></i>

            <h2>
                No Employees Found
            </h2>

            <p>
                Start by adding your first employee.
            </p>

            <a
                href="add_employee.php"
                class="btn"
            >
                <i class="fa-solid fa-user-plus"></i>
                Add Employee
            </a>

        </div>

    <?php endif; ?>

</div>


<!-- =============================================================
     JAVASCRIPT
============================================================= -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    /*
    |--------------------------------------------------------------------------
    | Elements
    |--------------------------------------------------------------------------
    */

    const searchInput = document.getElementById("searchEmployee");

    const departmentFilter =
        document.getElementById("departmentFilter");

    const statusFilter =
        document.getElementById("statusFilter");

    const employeeRows =
        document.querySelectorAll(".employee-row");


    /*
    |--------------------------------------------------------------------------
    | Employee Filtering
    |--------------------------------------------------------------------------
    */

    function filterEmployees() {

        const searchValue =
            searchInput.value.toLowerCase().trim();

        const departmentValue =
            departmentFilter.value;

        const statusValue =
            statusFilter.value;


        employeeRows.forEach(function (row) {

            const rowText =
                row.innerText.toLowerCase();

            const rowDepartment =
                row.dataset.department;

            const rowStatus =
                row.dataset.status;


            const matchesSearch =
                rowText.includes(searchValue);

            const matchesDepartment =
                departmentValue === "" ||
                rowDepartment === departmentValue;

            const matchesStatus =
                statusValue === "" ||
                rowStatus === statusValue;


            if (
                matchesSearch &&
                matchesDepartment &&
                matchesStatus
            ) {

                row.style.display = "";

            } else {

                row.style.display = "none";

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Search Event
    |--------------------------------------------------------------------------
    */

    searchInput.addEventListener(
        "input",
        filterEmployees
    );


    /*
    |--------------------------------------------------------------------------
    | Department Filter Event
    |--------------------------------------------------------------------------
    */

    departmentFilter.addEventListener(
        "change",
        filterEmployees
    );


    /*
    |--------------------------------------------------------------------------
    | Status Filter Event
    |--------------------------------------------------------------------------
    */

    statusFilter.addEventListener(
        "change",
        filterEmployees
    );

});


/*
|--------------------------------------------------------------------------
| Success Alert
|--------------------------------------------------------------------------
*/

const alertBox =
    document.querySelector(".success-alert");

if (alertBox) {

    setTimeout(function () {

        alertBox.style.opacity = "0";

        setTimeout(function () {

            alertBox.remove();

        }, 400);

    }, 3000);

}

</script>

</body>

</html>