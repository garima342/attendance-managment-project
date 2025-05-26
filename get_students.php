<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "attendancesystem"; 

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student_id, name, roll_number FROM students ORDER BY name ASC LIMIT 15";
$result = $conn->query($sql);

$students = [];
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}

echo json_encode($students);
$conn->close();
?>
