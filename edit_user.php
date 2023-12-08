<?php
include 'connection.php';

if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];

    // Fetch user data based on the user ID
    $result = mysqli_query($con, "SELECT * FROM Users WHERE UserID = $userID");

    if ($result) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "Error fetching user data: " . mysqli_error($con);
        exit();
    }
} else {
    echo "User ID not provided";
    exit();
}

// Handle form submission for updating the user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and update user data in the database
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    // Add more fields as needed

    // Example of using password_hash for password hashing
    //$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $updateQuery = "UPDATE Users SET UserName = ?, Password = ? WHERE UserID = ?";
    $stmt = mysqli_prepare($con, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $newUsername, $newPassword, $userID);

        if (mysqli_stmt_execute($stmt)) {
            echo "User updated successfully!";
            mysqli_stmt_close($stmt);

            // Redirect to superuser.php after successful update
            header("Location: superuser_user_management.php");
            exit();
        } else {
            echo "Error updating user: " . mysqli_stmt_error($stmt);
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-container h2 {
            color: #E63C5A;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-top: 10px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #E63C5A;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #C63C4A;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Edit User</h2>
        <form action="" method="post">
            <label for="newUsername">New Username:</label>
            <input type="text" name="newUsername" id="newUsername" value="<?php echo $user['UserName']; ?>" required>

            <label for="newPassword">New Password:</label>
            <input type="password" name="newPassword" id="newPassword" value="<?php echo $user['Password']; ?>" required>

            <button type="submit">Update User</button>
        </form>
    </div>
</body>

</html>


