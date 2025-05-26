<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendancesystem";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$course = $_POST['course'];
$date = $_POST['date'];
$studentsPresent = $_POST['status']; // Array of student_ids

foreach ($studentsPresent as $student_id) {
    $sql = "INSERT INTO attendance (student_id, course_id, date, status)
            VALUES ('$student_id', '$course', '$date', 'Present')";
    $conn->query($sql);
}

echo "success";
$conn->close();
?>
