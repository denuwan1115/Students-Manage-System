<?php
$data = $_POST;

if (!isset($data['sid'])) {
    echo json_encode(['message' => 'No SID provided']);
    exit;
}

// Read existing students
$studentsData = file_get_contents('students.json');
$students = json_decode($studentsData, true);

if (!$students) {
    echo json_encode(['message' => 'Error reading students data']);
    exit;
}

// Find and update the student
foreach ($students as $index => $student) {
    if ($student['SID'] === $data['sid']) {
        $students[$index] = [
            'SID' => $data['sid'],
            'FirstName' => $data['firstName'],
            'LastName' => $data['lastName'],
            'Email' => $data['email'],
            'NearCity' => $data['nearCity'],
            'Course' => explode(',', $data['course']),
            'Guardian' => $data['guardian'],
            'Subjects' => explode(',', $data['subjects'])
        ];
        break;
    }
}

// Save the updated data back to the JSON file
file_put_contents('students.json', json_encode($students, JSON_PRETTY_PRINT));

echo json_encode(['message' => 'Student updated successfully']);
?>
