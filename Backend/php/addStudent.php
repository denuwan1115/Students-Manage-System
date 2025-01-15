<?php
header('Content-Type: application/json');

// Read JSON data from request
$data = json_decode(file_get_contents("php://input"), true);

if ($data === null) {
    echo json_encode(['message' => 'Invalid JSON data']);
    exit;
}

// Define the file path
$jsonFilePath = 'students.json';

// Check if the file exists; if not, create an empty JSON file
if (!file_exists($jsonFilePath)) {
    file_put_contents($jsonFilePath, json_encode([]));
}

// Read existing students data
$studentsData = file_get_contents($jsonFilePath);
$students = json_decode($studentsData, true);

if ($students === null) {
    echo json_encode(['message' => 'Error reading JSON data']);
    exit;
}

// Create a new student entry
$newStudent = [
    'SID' => $data['sid'],
    'FirstName' => $data['firstName'],
    'LastName' => $data['lastName'],
    'Email' => $data['email'],
    'NearCity' => $data['nearCity'],
    'Course' => $data['course'], // Array of courses
    'Guardian' => $data['guardian'],
    'Subjects' => $data['subjects'] // Array of subjects
];

// Append the new student to the existing list
$students[] = $newStudent;

// Save updated data back to the file
if (file_put_contents($jsonFilePath, json_encode($students, JSON_PRETTY_PRINT))) {
    echo json_encode(['message' => 'Student added successfully']);
} else {
    echo json_encode(['message' => 'Error saving to the file']);
}
?>
