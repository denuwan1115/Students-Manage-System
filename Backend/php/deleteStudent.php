<?php
$sid = $_POST['sid'] ?? null;

if (!$sid) {
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

// Find and remove the student
foreach ($students as $index => $student) {
    if ($student['SID'] === $sid) {
        unset($students[$index]);
        break;
    }
}

// Re-index array and save to file
$students = array_values($students);
file_put_contents('students.json', json_encode($students, JSON_PRETTY_PRINT));

echo json_encode(['message' => 'Student deleted successfully']);
?>
