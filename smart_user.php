<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superuser Schedules - Smart Shift</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="header">
        <!-- user Header -->
        <div class="logo-container">
            <img src="SmartShift.png" alt="Smart Shifts Logo" class="logo" src="smart_user.php">
            <div class="name-slogan-container">
                <h1>Smart Shifts</h1>
                <p>Your Workforce, Our Expertise</p>
            </div>
        </div>
        <!-- user Navigation -->
        <div class="user-nav-bar">
            <a href="smart_user.php">Dashboard</a>
            <a href="user_schedules.php">Schedules</a>
            <a href="#approvals">Approvals</a>
            <a href="#settings">Settings</a>
            <a href="index.php">Logout</a>
            <div class="profile-tab">
                <a href="user_profile.php">Profile</a>
                <img src="profile.png" alt="Profile" class="profile-pic">
            </div>
        </div>
    </div>

    <main class="dashboard">

        <div class="container">
            <div class="widget">
                <h3>Clock</h3>
                <div class="real-time-clock" id="real-time-clock">
                    <!-- JavaScript will update this with the current time -->
                    4:58:08 <span class="ampm">PM</span>
                </div>
                <button type="button" class="button" id="clock-in-btn">Clock In</button>
                <button type="button" class="button" id="clock-out-btn">Clock Out</button>
            </div>
        </div>

            <!-- Personal Schedule Overview Widget -->
            <div class="widget personal-schedule">
                <h3>My Schedule</h3>
                <div class="schedule-content">
                    <table class="schedule-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Shift Start</th>
                                <th>Shift End</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Fri, Dec 05</td>
                                <td>18:00 PM</td>
                                <td>04:00 AM</td>
                            </tr>
                            <tr>
                                <td>Sat, Dec 06</td>
                                <td>15:00 PM</td>
                                <td>23:00 PM</td>
                            </tr>
                            <tr>
                                <td>Mon, Dec 11</td>
                                <td>10:00 AM</td>
                                <td>07:00 PM</td>
                            </tr>
                            <tr>
                                <td>Tue, Dec 12</td>
                                <td>09:00 AM</td>
                                <td>03:00 PM</td>
                            </tr>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>


        
            <!-- Upcoming Shifts Widget -->
            <div class="widget upcoming-shifts">
                <h3>Upcoming Shifts</h3>
                <ul class="shift-list">
                    <li class="shift-item">
                        <span class="shift-date">Sat, Dec 06</span>
                        <span class="shift-time">15:00 PM - 23:00 PM</span>
                    </li>
                    <li class="shift-item">
                        <span class="shift-date">Mon, Dec 11</span>
                        <span class="shift-time">10:00 AM - 07:00 PM</span>
                    </li>
                    <li class="shift-item">
                        <span class="shift-date">Tue, Dec 12</span>
                        <span class="shift-time">09:00 AM - 03:00 PM</span>
                    </li>
                    <!-- More list items as needed -->
                </ul>
                
            </div>
        
            <!-- Recent Activity Log Widget -->
            <div class="widget recent-activity">
                <h3>Recent Activity</h3>
                <ul class="activity-list">
                    <li class="activity-item">
                        <span class="activity-date">Mon, Dec 04</span>
                        <span class="activity-detail">Clock-in at 08:00 AM</span>
                    </li>
                    <li class="activity-item">
                        <span class="activity-date">Mon, Dec 04</span>
                        <span class="activity-detail">Shift exchange request submitted for Dec 06</span>
                    </li>
                    <li class="activity-item">
                        <span class="activity-date">Tue, Dec 04</span>
                        <span class="activity-detail">Clock-out at 05:00 PM</span>
                    </li>
                    <!-- More list items as needed -->
                </ul>
                
            </div>
        

        
    </main>

    <footer class="footer">
        <p>&copy; 2023 Smart Shifts</p>
    </footer>
</body>

<script>
    // Function to update the clock
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
        document.getElementById("real-time-clock").textContent = strTime;
    }

    // Update the clock every second
    setInterval(updateClock, 1000);
    updateClock(); // Initial call to display the clock immediately

    // Get buttons
    var clockInBtn = document.getElementById('clock-in-btn');
    var clockOutBtn = document.getElementById('clock-out-btn');

    // Add event listener for 'Clock In' button
    clockInBtn.addEventListener('click', function() {
        this.classList.add('green-button'); // Add the green class on click
    });

    // Add event listener for 'Clock Out' button
    clockOutBtn.addEventListener('click', function() {
        clockInBtn.classList.remove('green-button'); // Remove the green class on click
    });
</script>

</html>
