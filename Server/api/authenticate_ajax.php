<?php
session_start();
require 'database.php'; 
// Set response header to JSON
header('Content-Type: application/json');

// Get JSON data from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON input']);
    exit;
}

// Extract username and password from the JSON data
$inputUsername = isset($data['username']) ? $data['username'] : '';
$inputPassword = isset($data['password']) ? $data['password'] : '';

// Check if username and password are not empty
if (empty($inputUsername) || empty($inputPassword)) {
    echo json_encode(['success' => false, 'message' => 'Username and password are required']);
    exit;
}

// Prepare and execute SQL query
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Statement preparation failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("s", $inputUsername);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Plaintext password check
    if ($inputPassword === $user['password']) {
        // Password is correct, set session variables
        $_SESSION['username'] = $user['username'];
        $_SESSION['FullName'] = $user['FullName'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['loggedin'] = true;

        // Return success response
        echo json_encode(['success' => true, 'role' => $user['role']]);
    } else {
        // Incorrect password
        echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
    }
} else {
    // User not found
    echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
}

// Close connection
$conn->close();
?>
