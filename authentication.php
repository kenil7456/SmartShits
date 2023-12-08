<?php
include('connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

// To prevent from mysqli injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    // Successful login
    if ($username == "user" && $password == "user123") {
        header("Location: smart_user.php");
        exit();
    } elseif ($username == "admin" && $password == "admin123") {
        header("Location: superuser.php");
        exit();
    } else {
        // Redirect to a different page if needed
        header("Location: loginfailed.php");
        exit();
    }
} else {
    // Unsuccessful login, redirect to loginfailed.php
    header("Location: loginfailed.php");
    exit();
}
?>
