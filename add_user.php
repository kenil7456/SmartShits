<?php
include 'connection.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming form data is submitted through POST method
    $userID = isset($_POST['userID']) ? $_POST['userID'] : null;
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if UserID is a valid integer
    if (!is_numeric($userID)) {
        echo "Error: UserID must be a valid integer.";
    } else {
        // SQL query to insert a new user into the Users table
        $sql = "INSERT INTO Users (UserID, UserName, Password) VALUES ('$userID', '$username', '$password')";

        if (mysqli_query($con, $sql)) {
            
            header("Location: superuser_user_management.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

// Close the database connection
mysqli_close($con);
?>
