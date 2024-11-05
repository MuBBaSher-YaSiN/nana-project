<?php
// Include the database connection file
require 'database.php';

// Set response header to JSON
header('Content-Type: application/json');

// Check if the ProductID is provided via POST
if (!isset($_POST['productId'])) {
    echo json_encode(['success' => false, 'message' => 'Product ID is required']);
    exit;
}

$productId = $_POST['productId'];

// Prepare SQL statement to fetch product details
$sql = "SELECT * FROM Products WHERE ProductID = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'SQL preparation failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    echo json_encode(['success' => true, 'product' => $product]);
} else {
    echo json_encode(['success' => false, 'message' => 'Product not found']);
}

$stmt->close();
$conn->close();
?>
