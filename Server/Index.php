<?php
// Include the external PHP file for fetching products
include 'api/Fetch_products.php';

// Fetch products from the database
$result = FetchProducts($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChrisTechEcommerceStore</title>
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
    <div id="Home">
        <h1>Welcome to Chris's Tech E-Commerce Store</h1>

        <div class="product-grid">
            <?php
            if ($result && $result->num_rows > 0) {
                // Output each product
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product-item">';
                    
                    // Adjust the image path to match the correct folder structure
                    $imagePath = '../WebClient/images/Product-Images/' . $row["Image"];
                    if (!file_exists($imagePath) || empty($row["Image"])) {
                        $imagePath = '../WebClient/images/Product-Images/default.png'; // Use a default image if not found
                    }
            
                    // Display product image, name, and price
                    echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($row["Name"]) . '" class="product-image">';
                    echo '<h3 class="product-title">' . htmlspecialchars($row["Name"]) . '</h3>';
                    echo '<span class="product-price">$' . number_format($row["Price"], 2) . '</span>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products available.</p>';
            }
            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>

    <footer>
        <div class="footer-section">
            <h4>Copyright &copy; 2024 , ChrisTech Online Store</h4>
            <p>All rights reserved, Developed & Maintained by Chris, Joshua, Saugats</p>
        </div>
    </footer>

    <script src="webClient.js"></script>
</body>
</html>
