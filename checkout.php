<?php
session_start();
require 'db.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    $user_id = $_SESSION['user-id'] ?? 0;

    if (!empty($name) && !empty($address) && !empty($payment)) {
        $stmt = $con->prepare("INSERT INTO orders (user_id, name, address, total_price, payment_method) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issds", $user_id, $name, $address, $total, $payment);
        $stmt->execute();
        $order_id = $stmt->insert_id;
        foreach($_SESSION['cart'] as $productID => $item){
            $stmt = $con->prepare("INSERT INTO order_details (order_id, product_id, product_name, price, quantity) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iisdi", $order_id, $productId, $item['title'], $item['price'], $item['quantity']);
            $stmt->execute();
        }

        $_SESSION['cart'] = [];
        $_SESSION['success_message'] = "Your order has been placed successfully!";
        header("Location: success.php");
        exit();
    } else {
        $error = "Please fill out all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="logout.php">Log Out</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="user.php">My Profile</a></li>

        </ul>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank" class="text-light mr-2"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="https://instagram.com" target="_blank" class="text-light mr-2"><i class="fab fa-instagram fa-2x"></i></a>
            <a href="https://twitter.com" target="_blank" class="text-light"><i class="fab fa-twitter fa-2x"></i></a>
        </div>
    </div>

    <h2 style="text-align: center; padding-right: 220px;">Checkout</h2>
    
    <div class="container">
        <div class="text">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST">
                <table style="width: 90%;">
                    <tr>
                        <td><label>Name</label></td>
                        <td><input type="text" name="name" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Address</label></td>
                        <td><textarea name="address" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Payment Method</label></td>
                        <td>
                            <select name="payment" class="form-control">
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="cash_on_delivery">Cash on Delivery</option>
                            </select>
                        </td>
                    </tr>
                </table>
                
                <br>
                <table style="width: 147%;">
                    <tr>
                        <td><strong>Total:</strong></td>
                        <td>$<?php echo number_format($total, 2); ?></td>
                    </tr>
                </table>
                
                <br><br>
                <div class="container">
                    <button type="submit" class="btn btn-primary btn-sm btn-block" style="width: 50%; margin-left: 300px;">Place Order</button>
                    <a href="cart.php" class="btn btn-secondary btn-sm btn-block" style="width: 50%; margin-left: 300px; margin-top: 10px;">Back to Cart</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

