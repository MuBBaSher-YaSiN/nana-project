<?php
// Include the database connection file
include 'database/database.php'; // Ensure 'database.php' has the database connection code

$keyword = $_GET['keyword'] ?? null;

if ($keyword) {
    $sql = "SELECT ProductID, Name, Description, Price, Image, Category FROM Products WHERE Name LIKE ? OR Description LIKE ?";
    $stmt = $conn->prepare($sql);

    // Check if prepare was successful
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $searchTerm = "%" . $conn->real_escape_string($keyword) . "%"; // Use real_escape_string for security
    $stmt->bind_param('ss', $searchTerm, $searchTerm);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    // Close the statement and connection
    $stmt->close();
} else {
    $products = []; // No keyword provided, return empty array
}

$conn->close();
