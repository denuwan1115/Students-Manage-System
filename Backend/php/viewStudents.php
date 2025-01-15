<?php
header('Content-Type: application/json');

// Read data from JSON file
$studentsData = file_get_contents('students.json');
$students = json_decode($studentsData, true);

if (!$students) {
    echo json_encode(['message' => 'Error reading students data']);
    exit;
}

// Return the students as JSON
echo json_encode(['students' => $students]);
?>
