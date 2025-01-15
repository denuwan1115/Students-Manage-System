<?php
header('Content-Type: application/json');

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['name']) || !isset($data['email']) || !isset($data['message'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid input']);
    exit;
}

// Path to the JSON file
$jsonFile = 'contacts.json';

// Load existing records
$records = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

// Append the new record
$records[] = $data;

// Save back to JSON file
file_put_contents($jsonFile, json_encode($records, JSON_PRETTY_PRINT));

echo json_encode(['message' => 'Record added successfully']);
?>
