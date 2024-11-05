<?php

include 'database.php';

function FetchProducts($conn, $category = null, $search = null) {
    if ($search) {
        // Use the correct column name "Name"
        $sql = "SELECT ProductID, Name, Price, Image FROM Products WHERE Name LIKE ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('SQL preparation failed: ' . $conn->error);
        }
        $searchTerm = '%' . $search . '%';
        $stmt->bind_param("s", $searchTerm);
    } elseif ($category) {
        // Use the correct column name "Name"
        $sql = "SELECT ProductID, Name, Price, Image FROM Products WHERE Category = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('SQL preparation failed: ' . $conn->error);
        }
        $stmt->bind_param("s", $category);
    } else {
        // Use the correct column name "Name"
        $sql = "SELECT ProductID, Name, Price, Image FROM Products";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('SQL preparation failed: ' . $conn->error);
        }
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    return $result;
}
