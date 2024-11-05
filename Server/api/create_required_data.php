<?php


require 'database.php'; 


$stockItems = [
    ['productID' => 1, 'productName' => 'Wireless Earbuds', 'Category' => 'Electronics', 'price' => 10.00, 'stock' => 100],
    ['productID' => 2, 'productName' => 'Smartphone 6.5in display', 'Category' => 'Electronics', 'price' => 25.00, 'stock' => 150],
    ['productID' => 3, 'productName' => 'Noise Cancelling Headphones', 'Category' => 'Electronics', 'price' => 35.00, 'stock' => 150],
    ['productID' => 4, 'productName' => '16in laptop with 1TB SSD', 'Category' => 'Electronics', 'price' => 15.00, 'stock' => 150],
    ['productID' => 5, 'productName' => 'Compact Tablet 10in', 'Category' => 'Electronics', 'price' => 95.00, 'stock' => 150],
    ['productID' => 6, 'productName' => 'Smartwatch with Heart Rate Monitor', 'Category' => 'Electronics', 'price' => 15.00, 'stock' => 150],
    ['productID' => 7, 'productName' => 'Bluetooth Speaker', 'Category' => 'Electronics', 'price' => 12.00, 'stock' => 150],
    ['productID' => 8, 'productName' => 'Action Camera 4k', 'Category' => 'Electronics', 'price' => 13.00, 'stock' => 150],
    ['productID' => 9, 'productName' => 'Portable Charger 10,000mAh', 'Category' => 'Electronics', 'price' => 14.00, 'stock' => 150],
    ['productID' => 10, 'productName' => 'External Hard Drive 2TB', 'Category' => 'Electronics', 'price' => 199.00, 'stock' => 150],
    ['productID' => 11, 'productName' => 'Cordless Vacuum Cleaner', 'Category' => 'Home Appliances', 'price' => 131.00, 'stock' => 150],
    ['productID' => 12, 'productName' => 'Digital Air Fryer', 'Category' => 'Home Appliances', 'price' => 7445.00, 'stock' => 150],
    ['productID' => 13, 'productName' => 'Smart Refrigerator', 'Category' => 'Home Appliances', 'price' => 64.00, 'stock' => 150],
    ['productID' => 14, 'productName' => 'Multi-Function Pressure Cooker', 'Category' => 'Home Appliances', 'price' => 97.00, 'stock' => 150],
    ['productID' => 15, 'productName' => 'Espresso Coffee Machine', 'Category' => 'Home Appliances', 'price' => 123.00, 'stock' => 150],
    ['productID' => 16, 'productName' => 'Microwave + Grill', 'Category' => 'Home Appliances', 'price' => 165.00, 'stock' => 150],
    ['productID' => 17, 'productName' => 'Eco Dishwasher', 'Category' => 'Home Appliances', 'price' => 881.00, 'stock' => 150],
    ['productID' => 18, 'productName' => 'HEPA Air Purifier', 'Category' => 'Home Appliances', 'price' => 11.00, 'stock' => 150],
    ['productID' => 19, 'productName' => 'Clothes Steamer', 'Category' => 'Home Appliances', 'price' => 111.00, 'stock' => 150],
    ['productID' => 20, 'productName' => '1.7L Electric Kettle', 'Category' => 'Home Appliances', 'price' => 84.00, 'stock' => 150],
    ['productID' => 21, 'productName' => 'Fitness Smartwatch', 'Category' => 'Fitness&Health', 'price' => 95.00, 'stock' => 150],
    ['productID' => 22, 'productName' => 'GPS Running Watch', 'Category' => 'Fitness&Health', 'price' => 15.00, 'stock' => 150],
    ['productID' => 23, 'productName' => 'Handheld Muscle Massager', 'Category' => 'Fitness&Health', 'price' => 22.00, 'stock' => 150],
    ['productID' => 24, 'productName' => 'Eco Yoga Mat', 'Category' => 'Fitness&Health', 'price' => 15.00, 'stock' => 150],
    ['productID' => 25, 'productName' => 'Stationary Exercise Bike', 'Category' => 'Fitness&Health', 'price' => 123.00, 'stock' => 150],
    ['productID' => 26, 'productName' => 'Resistance Band Set', 'Category' => 'Fitness&Health', 'price' => 166.00, 'stock' => 150],
    ['productID' => 27, 'productName' => 'Adjustable Dumbbells', 'Category' => 'Fitness&Health', 'price' => 69.00, 'stock' => 150],
    ['productID' => 28, 'productName' => 'Incline Treadmill', 'Category' => 'Fitness&Health', 'price' => 85.00, 'stock' => 150],
    ['productID' => 29, 'productName' => 'Rowing Machine', 'Category' => 'Fitness&Health', 'price' => 15.00, 'stock' => 150],
    ['productID' => 30, 'productName' => 'Foam Roller', 'Category' => 'Fitness&Health', 'price' => 15.00, 'stock' => 150],
    ['productID' => 31, 'productName' => 'Hair Dryer', 'Category' => 'Beauty&Fashion', 'price' => 86.00, 'stock' => 150],
    ['productID' => 32, 'productName' => 'Leather Belt', 'Category' => 'Beauty&Fashion', 'price' => 57.00, 'stock' => 150],
    ['productID' => 33, 'productName' => 'Perfume Bottle 50ml', 'Category' => 'Beauty&Fashion', 'price' => 25.00, 'stock' => 150],
    ['productID' => 34, 'productName' => 'Aviator Sunglasses', 'Category' => 'Beauty&Fashion', 'price' => 132.00, 'stock' => 150],
    ['productID' => 35, 'productName' => 'Fashion Watch', 'Category' => 'Beauty&Fashion', 'price' => 15.00, 'stock' => 150],
    ['productID' => 36, 'productName' => 'Cosmetic Bag', 'Category' => 'Beauty&Fashion', 'price' => 15.00, 'stock' => 150],
    ['productID' => 37, 'productName' => 'Skincare Set', 'Category' => 'Beauty&Fashion', 'price' => 81.00, 'stock' => 150],
    ['productID' => 38, 'productName' => 'Lipstick Set', 'Category' => 'Beauty&Fashion', 'price' => 65.00, 'stock' => 150],
    ['productID' => 39, 'productName' => 'Mens Grooming Kit', 'Category' => 'Beauty&Fashion', 'price' => 22.00, 'stock' => 150],
    ['productID' => 40, 'productName' => 'Portable Makeup Mirror', 'Category' => 'Beauty&Fashion', 'price' => 31.00, 'stock' => 150],
    ['productID' => 41, 'productName' => 'Hair Straightener', 'Category' => 'Beauty&Fashion', 'price' => 12.00, 'stock' => 150],
    ['productID' => 42, 'productName' => 'Nail Care Kit', 'Category' => 'Beauty&Fashion', 'price' => 999.00, 'stock' => 150],
    ['productID' => 43, 'productName' => 'Electric Shaver', 'Category' => 'Beauty&Fashion', 'price' => 23.00, 'stock' => 150],
    ['productID' => 44, 'productName' => 'Makeup Brush Set', 'Category' => 'Beauty&Fashion', 'price' => 77.00, 'stock' => 150],
    ['productID' => 45, 'productName' => 'Face Mask Sheet Pack', 'Category' => 'Beauty&Fashion', 'price' => 125.00, 'stock' => 150],
    ['productID' => 46, 'productName' => 'Hair Shampoo', 'Category' => 'Beauty&Fashion', 'price' => 167.00, 'stock' => 150],
    ['productID' => 47, 'productName' => 'Hair Conditioner', 'Category' => 'Beauty&Fashion', 'price' => 33.00, 'stock' => 150],
    ['productID' => 48, 'productName' => 'Eye Liner', 'Category' => 'Beauty&Fashion', 'price' => 99.00, 'stock' => 150],
    ['productID' => 49, 'productName' => 'Different Eye Liner', 'Category' => 'Beauty&Fashion', 'price' => 7.00, 'stock' => 150],
    ['productID' => 50, 'productName' => 'Another Lipstick Set', 'Category' => 'Beauty&Fashion', 'price' => 4.00, 'stock' => 150],
];


foreach ($stockItems as $item) {
    $stmt = $conn->prepare("INSERT INTO PRODUCTS (productID, productName, Category, price, stock) VALUES (?, ?, ?, ?, ?)
                            ON DUPLICATE KEY UPDATE productName=?, Category=?, price=?, stock=?");
    $stmt->bind_param("issdissdi", 
        $item['productID'], 
        $item['productName'], 
        $item['Category'], 
        $item['price'], 
        $item['stock'], 
        $item['productName'], 
        $item['Category'], 
        $item['price'], 
        $item['stock']
    );
    $stmt->execute();
}

echo "Stock items initialized successfully.";
$conn->close();

?>
