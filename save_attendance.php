<?php
include 'conn.php';

$data = json_decode(file_get_contents("php://input"), true);

// Debug check
if ($data === null) {
    echo json_encode(["success" => false, "message" => "No data received or JSON malformed"]);
    exit();
}

$lecture = $data['lecture'];
$date = $data['date'];
$attendanceList = $data['attendance'];

$response = ["success" => false, "message" => ""];

try {
    $conn->begin_transaction();

    foreach ($attendanceList as $entry) {
        $student_id = $entry['student_id'];
        $status = $entry['status'];

        $stmt = $conn->prepare("INSERT INTO attendance (student_id, course_id, date, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iisi", $student_id, $course_id, $date, $status);

        // Assume course_id is mapped from lecture name
        $course_id = getCourseId($lecture, $conn);
        $stmt->execute();
    }

    $conn->commit();
    $response["success"] = true;

} catch (Exception $e) {
    $conn->rollback();
    $response["message"] = $e->getMessage();
}

echo json_encode($response);

// Helper function to map course name to ID
function getCourseId($courseName, $conn) {
    $stmt = $conn->prepare("SELECT course_id FROM courses WHERE course_name = ?");
    $stmt->bind_param("s", $courseName);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        return $row['course_id'];
    }
    return null; // or handle error
}
?>
