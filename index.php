<?php
session_start();
include 'config.php';

// Get products
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koliloko Electronics Accessories</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Koliloko Electronics</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php" class="home-link">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="cart.php">Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="admin/login.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h2>Welcome to Koliloko Electronics</h2>
                <p>Your one-stop shop for premium electronics accessories</p>
                <p>At Koliloko, we pride ourselves on offering only the highest quality electronics accessories. Our products undergo rigorous testing to ensure durability, performance, and reliability. From cables and chargers to audio devices and peripherals, each item is sourced from trusted manufacturers and designed to meet the demands of modern technology users. Experience the difference with accessories that not only look great but also deliver exceptional functionality and longevity.</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2026 Koliloko Electronics. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>