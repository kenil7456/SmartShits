<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SmartShifts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON POST body
$json = file_get_contents('php://input');
$data = json_decode($json, true); // true to get associative array

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO shifts (ShiftDate, StartTime, EndTime, Notes) VALUES (?, ?, ?, ?)");

// Execute the prepared statement for each shift
foreach ($data['shifts'] as $shift) {
    $stmt->bind_param("ssss", $shift['shiftDate'], $shift['startTime'], $shift['endTime'], $shift['notes']);
    $stmt->execute();
}

// Check for any SQL errors
if ($stmt->error) {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
} else {
    echo json_encode(['status' => 'success']);
}

$stmt->close();
$conn->close();
?>
