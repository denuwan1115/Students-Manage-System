<?php
// searchStudent.php

// Check if search value is provided
if (isset($_GET['searchValue'])) {
    $searchValue = strtolower($_GET['searchValue']); // Convert search value to lowercase for case-insensitive matching

    // Read the students data from the JSON file
    $students = json_decode(file_get_contents('students.json'), true);

    // Initialize result variable
    $matchedStudents = [];

    foreach ($students as $student) {
        // Convert each field to lowercase for case-insensitive comparison
        if (
            strpos(strtolower($student['SID']), $searchValue) !== false ||
            strpos(strtolower($student['FirstName']), $searchValue) !== false ||
            strpos(strtolower($student['LastName']), $searchValue) !== false ||
            strpos(strtolower($student['Email']), $searchValue) !== false ||
            strpos(strtolower($student['NearCity']), $searchValue) !== false ||
            strpos(strtolower(implode(', ', $student['Course'])), $searchValue) !== false || // Search within Course array
            strpos(strtolower($student['Guardian']), $searchValue) !== false
        ) {
            $matchedStudents[] = $student;
        }
    }

    // Return results
    if (!empty($matchedStudents)) {
        echo json_encode(['status' => 'success', 'students' => $matchedStudents]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No students found matching the provided criteria.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Search value is required.']);
}
?>
