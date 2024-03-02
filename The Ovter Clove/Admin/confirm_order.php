<?php
include 'config.php';

if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];


    $deleteOrder = mysqli_query($conn, "DELETE FROM orders WHERE order_id = $orderId");

    if ($deleteOrder) {

        header("Location: admin_orders.php");
        exit();
    } else {

        echo "Error deleting order: " . mysqli_error($conn);
    }
} else {
    
    echo "Invalid request";
}
?>
