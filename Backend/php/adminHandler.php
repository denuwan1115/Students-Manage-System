<?php
session_start(); // Start the session to manage login state
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['message' => 'Method not allowed']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if ($data === null || !isset($data['action'])) {
    echo json_encode(['message' => 'Invalid request']);
    exit;
}

$jsonFilePath = 'admin.json';

if (!file_exists($jsonFilePath)) {
    file_put_contents($jsonFilePath, json_encode([])); // Initialize file if it doesn't exist
}

$adminsData = file_get_contents($jsonFilePath);
$admins = json_decode($adminsData, true);

if ($admins === null) {
    echo json_encode(['message' => 'Error reading JSON data']);
    exit;
}

$action = $data['action'];

if ($action === 'register') {
    // Handle admin registration
    $email = $data['email'];
    $password = $data['password'];

    foreach ($admins as $admin) {
        if ($admin['email'] === $email) {
            echo json_encode(['message' => 'Admin with this email already exists']);
            exit;
        }
    }

    $admins[] = [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT) // Hash the password securely
    ];

    if (file_put_contents($jsonFilePath, json_encode($admins, JSON_PRETTY_PRINT))) {
        echo json_encode(['message' => 'Registration successful']);
    } else {
        echo json_encode(['message' => 'Error saving admin']);
    }
} elseif ($action === 'login') {
    // Handle admin login
    $email = $data['email'];
    $password = $data['password'];

    foreach ($admins as $admin) {
        if ($admin['email'] === $email && password_verify($password, $admin['password'])) {
            // Set session variables on successful login
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_email'] = $email;

            echo json_encode(['message' => 'Login successful']);
            exit;
        }
    }

    echo json_encode(['message' => 'Invalid email or password']);
} elseif ($action === 'logout') {
    // Handle admin logout
    session_unset(); // Clear session variables
    session_destroy(); // Destroy the session
    echo json_encode(['message' => 'Logout successful']);
} else {
    echo json_encode(['message' => 'Invalid action']);
}
?>
