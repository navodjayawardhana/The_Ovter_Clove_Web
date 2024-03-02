<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

?>

<?php
include 'navbar.php';
include 'config.php';


$selectOrders = mysqli_query($conn, "SELECT * FROM orders");


if (isset($_GET['confirm_order_id'])) {
    $confirmOrderId = $_GET['confirm_order_id'];


    $deleteOrder = mysqli_query($conn, "DELETE FROM orders WHERE order_id = $confirmOrderId");

    if ($deleteOrder) {

        header("Location: order.php");
        exit();
    } else {

        echo "Error deleting order: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="product-display">

    <table class="product-display-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Order Date</th>
                <th>Action</th> 
            </tr>
        </thead>
        <?php while ($order = mysqli_fetch_assoc($selectOrders)) { ?>
            <tr>
                <td><?php echo $order['user_id']; ?></td>
                <td><?php echo $order['product_id']; ?></td>
                <td><?php echo $order['quantity']; ?></td>
                <td><?php echo $order['price']; ?></td>
                <td><?php echo $order['order_date']; ?></td>
                <td>

                    <a href="?confirm_order_id=<?php echo $order['order_id']; ?>" class="btn">Confirm</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
