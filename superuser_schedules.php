<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superuser Schedules - Smart Shift</title>
    <!-- External CSS file -->
    <link rel="stylesheet" href="styles.css">
    <!-- Font-Awesome CSS for version 6.0.0-Beta3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/fullcalendar@5/main.min.css' rel='stylesheet' />
    <script src='https://unpkg.com/fullcalendar@5/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/interaction@5/main.min.js'></script>

</head>

<body>
    <section>
        <div class="header">
            <!-- Superuser Header -->
            <div class="logo-container">
                <img src="SmartShift.png" alt="Smart Shifts Logo" class="logo">
                <div class="name-slogan-container">
                    <h1>Smart Shifts</h1>
                    <p>Your Workforce, Our Expertise</p>
                </div>
            </div>
            <!-- Superuser Navigation -->
            <div class="nav-bar">
                <a href="superuser.php">Dashboard</a>
                <a href="superuser_schedules.php">Schedules</a>
                <a href="superuser_user_management.php">User Management</a>
                <a href="#reports">Reports</a>
                <a href="#approvals">Approvals</a>
                <a href="payroll.html">Payroll</a>
                <a href="#settings">Settings</a>
                <a href="login.php">Logout</a>
            </div>
        </div>

        <!-- Superuser - Schedules -->
        <main class="schedule-container">
            <section class="schedule-header">
                <h1>Schedules</h1>
                <button type="button" id="createShiftBtn" class="create-shift-btn"> <i class="fa fa-plus"
                        style="font-size: 17px;"></i> Create Shift</button>

                <button type="button" id="publish-button" id="publishScheduleBtn" class="publish-btn">
                    <i class="fa fa-paper-plane" style="font-size: 17px;"></i> Publish Schedule
                </button>
            </section>
            <section class="schedule-list">
                <div id="calendar">
                    <!-- Calendar HTML -->
                </div>
                
            </section>
        </main>
    </section>

    <!-- Superuser Footer -->
    <div class="footer">
        <p>&copy; 2023 Smart Shifts - Superuser Schedules</p>
    </div>

    <script src="script3.js"></script>

</body>

</html>