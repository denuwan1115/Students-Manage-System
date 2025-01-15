<?php
header('Content-Type: application/json');

// Path to the JSON file
$jsonFile = 'contacts.json';

// Load records if the file exists
if (file_exists($jsonFile)) {
    $records = json_decode(file_get_contents($jsonFile), true);
    echo json_encode($records);
} else {
    echo json_encode([]);
}
?>
