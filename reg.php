<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendancesystem";

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_POST['ur'];
$password = $_POST['pr'];
$role = $_POST['rr'];
$emailid = $_POST['er'];

$sql = "INSERT INTO users VALUES ('', '$username', '$password', '$role', '$emailid')";
$s = $conn->query($sql);

if ($s === TRUE) {
    echo "User registered successfully.<br>";

    // Get the last inserted user_id
    $user_id = $conn->insert_id;

    // If the role is teacher, insert into teachers
    if ($role == 'teacher') {
        $teacher_sql = "INSERT INTO teachers VALUES ('', '$user_id', '$username', '', '$emailid')";
        $t = $conn->query($teacher_sql);
        if ($t === TRUE)
            echo "Teacher added successfully.<br>";
        else
            echo "Error adding teacher: " . $conn->error . "<br>";
    }

    // If the role is student, insert into students
    if ($role == 'student') {
        $roll_number = ''; // You can change this to auto-generate or collect via form
        $branch = ''; // Same as above

        $student_sql = "INSERT INTO students VALUES ('', '$user_id', '$username', '$roll_number', '$branch', '$emailid')";
        $st = $conn->query($student_sql);
        if ($st === TRUE)
            echo "Student added successfully.<br>";
        else
            echo "Error adding student: " . $conn->error . "<br>";
    }

} else {
    echo "Error inserting user: " . $conn->error . "<br>";
}

mysqli_close($conn);
?>
