<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendancesystem";

$conn = new mysqli($servername, $username, $password, $dbname);
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['us'];
    $password = $_POST['ps'];

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Get the user's data
        $row = $result->fetch_assoc();

        // Check if the user is a student
        if ($row['role'] === 'student') {
            $_SESSION['login_user'] = $username;
            header("Location: studenthome.html");
            exit();
        } else {
            // User exists but is not a student
            echo "<script>alert('Access Denied! Only students are allowed.'); window.location.href='stulogin.html';</script>";
        }
    } else {
        // Invalid login
        echo "<script>alert('Login failed! Incorrect username or password.'); window.location.href='stulogin.html';</script>";
    }
}
?>
