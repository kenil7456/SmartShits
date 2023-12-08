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
            <a href="smart_user.php"><img src="SmartShift.png" alt="Smart Shifts Logo" class="logo"></a>
            <div class="name-slogan-container" href="smart_user.php">
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
            <a href="logout.php">Logout</a>
            <div class="profile-tab">
                <a href="user_profile.php">Profile</a>
                <img src="profile.png" alt="Profile" class="profile-pic">
            </div>
        </div>
    </div>

    <section class="user-container">
        <main class="profile-container">
            <h1>My Account</h1>
            <div class="profile-grid">
                <div class="form-section">
                    <!-- First Name -->
                    <div class="form-field">
                        <label for="firstName">First name</label>
                        <input type="text" id="firstName" name="firstName" value="User">
                    </div>

                    <!-- Last Name -->
                    <div class="form-field">
                        <label for="lastName">Last name</label>
                        <input type="text" id="lastName" name="lastName" value="User">
                    </div>

                    <!-- Email -->
                    <div class="form-field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="user1234@gmail.com">
                    </div>

                    <!-- Mobile Number -->
                    <div class="form-field">
                        <label for="mobileNumber">Mobile number</label>
                        <input type="tel" id="mobileNumber" name="mobileNumber"
                            placeholder="Area code required for text messaging.">
                    </div>

                    <!-- Alternative Number -->
                    <div class="form-field">
                        <label for="altNumber">Alternate number</label>
                        <input type="tel" id="altNumber" name="altNumber">
                    </div>

                    <!-- Birth Date -->
                    <div class="form-field">
                        <label for="birthDate">Birth date</label>
                        <input type="date" id="birthDate" name="birthDate">
                    </div>

                    <!-- Pronouns -->
                    <div class="form-field">
                        <label for="pronouns">Pronouns</label>
                        <select id="pronouns" name="pronouns">
                            <option value="prefer_not_to_share">Prefer not to share</option>
                            <option value="he_him">He/Him</option>
                            <option value="she_her">She/Her</option>
                            <option value="they_them">They/Them</option>
                            <!-- Additional options here -->
                        </select>
                    </div>

                    <!-- User ID -->
                    <div class="form-field">
                        <label for="userID">User ID</label>
                        <input type="text" id="userID" value="2">
                    </div>

                    <!-- Language -->
                    <div class="form-field">
                        <label for="language">Language</label>
                        <select id="language" name="language">
                            <option value="english">English</option>
                            <option value="french">French</option>
                            <!-- Additional language options here -->
                        </select>
                    </div>

                    <!-- Emergency Contact Name -->
                    <div class="form-field">
                        <label for="contactName">Emergency Contact Name</label>
                        <input type="text" id="contactName" name="contactName">
                    </div>

                    <!-- Emergency Contact Number -->
                    <div class="form-field">
                        <label for="contactNumber">Emergency Contact Number</label>
                        <input type="tel" id="contactNumber" name="contactNumber">
                    </div>


                </div>

                <div class="photo-section">
                    <div class="profile-photo">
                        <img src="profile.png" alt="Profile Photo">
                        <button class="upload-btn">Upload photo</button>
                    </div>

                    <div class="login-security">
                        <h2>Login & Security</h2>
                        <p>Password: *********</p>
                        <button class="change-password-btn">Change password</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="save-btn">Save</button>
        </main>
    </section>




    <footer class="footer">
        <p>&copy; 2023 Smart Shifts</p>
    </footer>
</body>

</html>