<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["checkout"])) {
    $userId = 1;

    $cartQuery = "SELECT cart.product_id, product.name, product.price, cart.quantity
                  FROM cart
                  INNER JOIN product ON cart.product_id = product.id
                  WHERE cart.user_id = $userId";
    $cartResult = mysqli_query($conn, $cartQuery);

    while ($cartItem = mysqli_fetch_assoc($cartResult)) {
        $productId = $cartItem['product_id'];
        $quantity = $cartItem['quantity'];
        $price = $cartItem['price'];

        $insertOrderQuery = "INSERT INTO orders (user_id, product_id, quantity, price) 
                             VALUES ($userId, $productId, $quantity, $price)";
        mysqli_query($conn, $insertOrderQuery);
    }

    $clearCartQuery = "DELETE FROM cart WHERE user_id = $userId";
    mysqli_query($conn, $clearCartQuery);

    header("Location: confirmation.php");
    exit();
}
?>
