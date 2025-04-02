﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php" class="active">Cart</a></li>
            <li><a href="user.php">My Profile</a></li>
            <li><a href="login.php">Sign In</a></li>
        </ul>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank" class="text-light mr-2"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="https://instagram.com" target="_blank" class="text-light mr-2"><i class="fab fa-instagram fa-2x"></i></a>
            <a href="https://twitter.com" target="_blank" class="text-light"><i class="fab fa-twitter fa-2x"></i></a>
        </div>
    </div>
    <h2 style="text-align: center; padding-right: 220px;">My Cart</h2>
    <div class="container">
        <div class="text">
            <table style="width: 90%;">
                <tr>
                    <td>
                        <a href="details.html">Product Name</a>
                    </td>
                    <td>Each: Price</td>
                    <td>Quantity: </td>
                    <td>Total:</td>
                </tr>
                <tr>
                    <td>
                        <a href="details.html">Product Name</a>
                    </td>
                    <td>Each: Price</td>
                    <td>Quantity: </td>
                    <td>Total:</td>
                </tr>
            </table>
            <br> <br>
            <table style="width: 147%";>
                <tr>
                    <td># Items: </td>
                    <td>$XX.XX</td>
                </tr>
            </table>
            <br><br><br><br><br>
            <div class="container">
                <button type="button" class="btn btn-primary btn-sm btn-block" style="width: 50%; margin-left: 230px;">Checkout</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
