<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}
require 'database/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ChrisTechEcommerceStore</title>
    <link rel="stylesheet" href="../WebClient/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav>
            <ul>
                <li class="logo-container">
                    <a href="Home.html"><img src="../WebClient/images/Logo.png" alt="ChrisTech Logo" class="logo"></a>
                </li>
                <li><a href="Home.html">Home</a></li>
                <li>
                    <a href="#">Categories</a>
                    <ul class="dropdown">
                        <li><a href="Electronics.html">Electronics</a></li>
                        <li><a href="HomeAppliances.html">Home Appliances</a></li>
                        <li><a href="Fitness&Health.html">Fitness & Health</a></li>
                        <li><a href="Beauty&Fashion.html">Beauty & Fashion</a></li>
                    </ul>
                </li>
        
                <li class="search-container">
                    <input type="text" placeholder="Search..." name="search">
                    <button type="submit">Search</button>
                </li>
                <li><a href="../WebClient/Contact.html">Contact</a></li>
                <li><a href="../WebClient/AboutChrisTech.html">About ChrisTech</a></li>
                <li><a href="login.php">Sign In/ Register</a></li>
                <li><a href="../WebClient/ShoppingCarts.html">Cart</a></li>
            </ul>
    </nav>
    <h1>Admin Dashboard</h1>
    <div class="admin-container">
        <h2>Manage Products</h2>
        <table id="products-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Products";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['ProductID']}</td>";
                        echo "<td>{$row['Name']}</td>";
                        echo "<td>{$row['Description']}</td>";
                        echo "<td>{$row['Price']}</td>";
                        echo "<td>{$row['Category']}</td>";
                        echo "<td>{$row['Stock']}</td>";
                        echo "<td>
                                <button class='edit-btn' data-id='{$row['ProductID']}'>Edit</button>
                                <button class='delete-btn' data-id='{$row['ProductID']}'>Delete</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No products found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <button id="add-product-btn">Add New Product</button>
    </div>

    <!-- Modal for editing product -->
    <div id="edit-modal" class="modal">
        <div class="modal-content">
            <h2>Edit Product</h2>
            <form id="edit-product-form">
                <input type="hidden" id="edit-product-id">
                <label for="edit-name">Name:</label>
                <input type="text" id="edit-name" required>
                <label for="edit-description">Description:</label>
                <textarea id="edit-description" required></textarea>
                <label for="edit-price">Price:</label>
                <input type="number" step="0.01" id="edit-price" required>
                <label for="edit-category">Category:</label>
                <input type="text" id="edit-category" required>
                <label for="edit-stock">Stock:</label>
                <input type="number" id="edit-stock" required>
                <button type="submit">Save Changes</button>
                <button type="button" id="close-edit-modal">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Modal for adding new product -->
    <div id="add-modal" class="modal">
        <div class="modal-content">
            <h2>Add New Product</h2>
            <form id="add-product-form">
                <label for="add-name">Name:</label>
                <input type="text" id="add-name" required>
                <label for="add-description">Description:</label>
                <textarea id="add-description" required></textarea>
                <label for="add-price">Price:</label>
                <input type="number" step="0.01" id="add-price" required>
                <label for="add-category">Category:</label>
                <input type="text" id="add-category" required>
                <label for="add-stock">Stock:</label>
                <input type="number" id="add-stock" required>
                <button type="submit">Add Product</button>
                <button type="button" id="close-add-modal">Cancel</button>
            </form>
        </div>
    </div>

    <script src="../WebClient/js/admin_dashboard.js"></script>
</body>
</html>
