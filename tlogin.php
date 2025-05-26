<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendancesystem";

$conn = new mysqli($servername, $username, $password, $dbname);
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['ut'];
    $password = $_POST['pt'];

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Get the user's data
        $row = $result->fetch_assoc();

        // Check if the user is a teacher
        if ($row['role'] === 'teacher') {
            $_SESSION['login_user'] = $username;
            header("Location: home.html");
            exit();
        } else {
            // User exists but is not an admin
            echo "<script>alert('Access Denied! Only teachers are allowed.'); window.location.href='teachlogin.html';</script>";
        }
    } else {
        // Invalid login
        echo "<script>alert('Login failed! Incorrect username or password.'); window.location.href='teachlogin.html';</script>";
    }
}
?>
