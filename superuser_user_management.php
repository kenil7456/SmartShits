<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superuser User-Management - Smart Shift</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<style>
    .user-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .user-form h3 {
            color: #E63C5A;
        }

        .user-form label {
            display: block;
            margin: 10px 0;
        }

        .user-form input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .user-form button {
            background-color: #E63C5A;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .user-table {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user-table h3 {
            color: #E63C5A;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #E63C5A;
            color: white;
        }

            /* Add this style to customize the appearance of action buttons */
    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .action-buttons button {
        padding: 8px;
        cursor: pointer;
    }

    /* Style for the Edit button */
    .edit-button {
        background-color: #4285f4; /* Change the color as needed */
        color: white;
        border: none;
        border-radius: 4px;
    }

    /* Style for the Delete button */
    .delete-button {
        background-color: #dc3545; /* Change the color as needed */
        color: white;
        border: none;
        border-radius: 4px;
    }
    /* Add this style for the password text and input */
.password-text,
.password-input {
    display: inline;
}

.password-input {
    display: none;
}

.password-icon {
    cursor: pointer;
    font-size: 18px;
}

</style>
<body>
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
            <a href="#payroll">Payroll</a>
            <a href="#settings">Settings</a>
            <a href="login.php">Logout</a>
        </div>
    </div>

    <!-- Superuser - User Management -->
    
    <!-- Superuser - User Management -->
    <div class="user-management-container">
        <h1>User Management</h1>
<br>
        <!-- Add User Form -->
        <div class="user-form">
            <h3>Add User</h3>
            <form action="add_user.php" method="post">
                <label for="userID">EmployeeID:</label>
                <input type="number" name="userID" id="userID" required>

                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Add User</button>
            </form>
        </div>

        <!-- Display Users Table -->
        <div class="user-table">
            <h3>Employee List</h3>
            <table>
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Username</th>
                        <th>Employee Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connection.php';

                    // Fetch data from Users table
                    $result = mysqli_query($con, "SELECT UserID, UserName, Password FROM Users");

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['UserID'] . "</td>";
                        echo "<td>" . $row['UserName'] . "</td>";
                        // echo "<td class='password-column'>" . str_repeat('*', strlen($row['Password'])) . "<span class='eye-icon' onclick='togglePasswordVisibility(this)'>👁️</span></td>";
                        echo "<td class='password-column'>";
                        echo "<span class='password-text' style='display: none;'>" . $row['Password'] . "</span>";
                        echo "<span class='password-icon' onclick='togglePasswordVisibility(this)'>   👁️</span>";
                        echo "</td>";


                                        // Actions column with Edit and Delete buttons
                                        echo "<td class='action-buttons'>";
                                        echo "<form action='edit_user.php' method='get'>";
                                        echo "<input type='hidden' name='userID' value='" . $row['UserID'] . "'>";
                                        echo "<button class='edit-button' type='submit'>Edit</button>";
                                        echo "</form>";


                                        echo "<form action='delete_user.php' method='get'>";
                                        echo "<input type='hidden' name='userID' value='" . $row['UserID'] . "'>";
                                        echo "<button class='delete-button' type='submit'>Delete</button>";
                                        echo "</form>";
                                        echo "</td>";

                echo "</tr>";
                        echo "</tr>";
                    }

                    // Close the database connection
                    mysqli_close($con);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Superuser Footer -->
    

    <div class="footer">
        <p>&copy; 2023 Smart Shifts - Superuser Schedules</p>
    </div>
                </section>
    <!-- JavaScript -->
    <script src="script.js"></script>

    <script>
       function togglePasswordVisibility(eyeIcon) {
    const passwordColumn = eyeIcon.closest('.password-column');
    const passwordText = passwordColumn.querySelector('.password-text');
    
    if (passwordText) {
        passwordText.style.display = passwordText.style.display === 'none' ? 'inline' : 'none';
    }
}
    </script>

</body>

</html>
