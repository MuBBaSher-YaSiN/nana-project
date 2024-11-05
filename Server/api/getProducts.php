<?php
// Include the database connection file
include 'database/database.php'; // Ensure 'database.php' has the database connection code

if(isset($_GET['category'])) {
    $categoryId = intval($_GET['category']);

    error_log("Category ID: " . $categoryId);

    $sql = "SELECT ProductID, Name, Description, Price, Image, Category FROM Products WHERE CategoryID = ?"; 
    $stmt = $con->prepare($sql); 
    $stmt->bind_param("i", $categoryId);
    $stmt->execute(); 
    $result = $stmt->get_result(); 

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row; 
    }

    error_log("Products found: " . count($products));

    echo json_encode($products); 
} else {
    echo json_encode([]);
}

?>
