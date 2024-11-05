<?php
// Include the database connection file
require 'database.php';

// Set response header to JSON
header('Content-Type: application/json');

// Decode JSON input from AJAX
$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['productId'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input or missing Product ID']);
    exit;
}

// Extract and validate input fields
$productId = $data['productId'];
$name = $data['name'];
$description = $data['description'];
$price = $data['price'];
$category = $data['category'];
$stock = $data['stock'];

// Prepare SQL statement for updating product details
$sql = "UPDATE Products SET name = ?, description = ?, price = ?, category = ?, stock = ? WHERE ProductID = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'SQL preparation failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("ssdsii", $name, $description, $price, $category, $stock, $productId);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Product updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update product: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
