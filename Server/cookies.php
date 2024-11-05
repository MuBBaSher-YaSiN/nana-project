<?php
// Include the database connection file
include 'Server/database/database.php'; // Ensure 'database.php' has the database connection code

date_default_timezone_set('Australia/Perth');

if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = $_COOKIE['lastVisit'];

    $welcomeMessege = "Welcome back to Chris's Tech. Your last visit was at " . $lastVisit;
} else {
    $welcomeMessege = "Welcome to Chris's Tech"; 
}
// set new cookie with the current date and time 
setcookie('lastVisit', date('H:i \o\n j F Y'), time() + (86400 * 30));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChrisTech Ecommerce Store</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <nav>
        <ul>
            <li class="logo-container">
                <a href="Home.html"><img src="images/logo.png" alt="ChrisTech Logo" class="logo"></a>
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
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="AboutChrisTech.html">About ChrisTech</a></li>
            <li><a href="Login.html">Sign In/ Register</a></li>
            <li><a href="ShoppingCarts.html">Cart</a></li>
        </ul>
    </nav>
    

    <div id="Home">
        <h1>Welcome to Chris's Tech E-Commerce Store</h1>
    </div>


    <footer>
        <div class="footer-section">
            <h4>Copyright &copy; 2024 , ChrisTech Online Store</h4>
            <p>All rights reserved, Developed & Maintained by Chris, Joshua, Saugats</p>
        </div>
    </footer>

    <script src = "webClient.js"></script>

</body>
</html>
