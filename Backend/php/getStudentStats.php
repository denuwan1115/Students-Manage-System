<?php
header('Content-Type: application/json');

// Path to the JSON file
$jsonFile = 'students.json';

// Check if the JSON file exists
if (file_exists($jsonFile)) {
    $students = json_decode(file_get_contents($jsonFile), true);

    $totalStudents = count($students);
    $uniqueCourses = [];
    $uniqueGuardians = [];

    foreach ($students as $student) {
        if (isset($student['Course']) && is_array($student['Course'])) {
            $uniqueCourses = array_merge($uniqueCourses, $student['Course']);
        }
        if (isset($student['Guardian'])) {
            $uniqueGuardians[] = $student['Guardian'];
        }
    }

    $totalCourses = count(array_unique($uniqueCourses));
    $totalGuardians = count(array_unique($uniqueGuardians));

    echo json_encode([
        'totalStudents' => $totalStudents,
        'totalCourses' => $totalCourses,
        'totalGuardians' => $totalGuardians,
    ]);
} else {
    echo json_encode([
        'totalStudents' => 0,
        'totalCourses' => 0,
        'totalGuardians' => 0,
    ]);
}
?>
