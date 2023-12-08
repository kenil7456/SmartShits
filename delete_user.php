<?php
include 'connection.php';

if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];

    // Delete user based on the user ID using prepared statement
    $deleteQuery = "DELETE FROM Users WHERE UserID = ?";
    $stmt = mysqli_prepare($con, $deleteQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $userID);
        $deleteResult = mysqli_stmt_execute($stmt);

        if ($deleteResult) {
            // Show alert and redirect to superuser_user_management.php after successful deletion
            echo "<script>
                    alert('User deleted successfully!');
                    window.location.href = 'superuser_user_management.php';
                 </script>";
            exit();
        } else {
            echo "Error deleting user: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing delete statement: " . mysqli_error($con);
    }
} else {
    echo "User ID not provided";
}

mysqli_close($con);
?>
