<header class="topbar">

    <div class="topbar-left">

        <h2>Dashboard</h2>

        <p>Welcome, <?php echo $_SESSION['admin']; ?></p>

    </div>

    <div class="topbar-right">

        <input
            type="text"
            placeholder="Search..."
            class="search-box">

        <i class="fa-solid fa-bell notification"></i>

        <div class="admin-profile">

            <img src="../assets/images/admin/default.png" alt="Admin">

            <span><?php echo $_SESSION['admin']; ?></span>

        </div>

    </div>

</header>