<?php
require 'database.php';
header('Content-Type: application/json');

// Check if the product ID is provided in the POST data
if (!isset($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'Product ID is required']);
    exit;
}

$productId = intval($_POST['id']);

// Prepare the SQL statement to delete the product
$sql = "DELETE FROM Products WHERE ProductID = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'SQL preparation failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("i", $productId);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Product not found or already deleted']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete product: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
