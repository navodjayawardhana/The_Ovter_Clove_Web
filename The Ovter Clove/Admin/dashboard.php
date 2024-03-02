<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

?>

<?php

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php' ?>




<section class="dashboard">

   <h1 style="margin-top: 50px;">dashboard</h1>

   <div class="box-container">
    

   <div class="box">
    <h3>TOTAL ORDERS!</h3>
    <?php
    $order_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders");
    $order_count_result = mysqli_fetch_assoc($order_count_query);
    $total_orders = $order_count_result['total'];
    ?>
    <div class="order-count">
        <h3><?php echo $total_orders; ?></h3>
    </div>
    <a href="order.php" class="btn">See Orders</a>
</div>


   <div class="box">
      <h3>TOTLE PRODUCT!</h3>
      <?php
        
        $product_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM product");
        $product_count_result = mysqli_fetch_assoc($product_count_query);
        $total_products = $product_count_result['total'];
      ?>
      <div class="product-count">
        <h3> <?php echo $total_products; ?></h3>
      </div>
      <a href="product.php" class="btn">see product</a>
   </div>

   <div class="box">
      <h3>Total Admins!</h3>
      <?php
 
        $admin_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM admin");
        $admin_count_result = mysqli_fetch_assoc($admin_count_query);
        $total_admins = $admin_count_result['total'];
      ?>
      <div class="product-count">
        <h3> <?php echo $total_admins; ?></h3>
      </div>
      <a href="user.php" class="btn">view admin</a>
   </div>

   <div class="box">
    <h3>TOTAL PROMOTIONS!</h3>
    <?php
    $promotion_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM promotion");
    $promotion_count_result = mysqli_fetch_assoc($promotion_count_query);
    $total_promotions = $promotion_count_result['total'];
    ?>
    <div class="promotion-count">
        <h3><?php echo $total_promotions; ?></h3>
    </div>
    <a href="promotion.php" class="btn">See Promotions</a>
</div>

<div class="box">
    <h3>TOTAL BOOKINGS!</h3>
    <?php
    $promotion_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM bookings");
    $promotion_count_result = mysqli_fetch_assoc($promotion_count_query);
    $total_promotions = $promotion_count_result['total'];
    ?>
    <div class="booking-count">
        <h3><?php echo $total_promotions; ?></h3>
    </div>
    <a href="booking.php" class="btn">See Bookings</a>
</div>

<div class="box">
    <h3>Client Say!</h3>
    <?php
    $promotion_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM feedback");
    $promotion_count_result = mysqli_fetch_assoc($promotion_count_query);
    $total_promotions = $promotion_count_result['total'];
    ?>
    <div class="booking-count">
        <h3><?php echo $total_promotions; ?></h3>
    </div>
    <a href="feedback.php" class="btn">See feedback</a>
</div>


<div class="box">
    <h3>TOTAL MESSAGE!</h3>
    <?php
    $promotion_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM contact_form");
    $promotion_count_result = mysqli_fetch_assoc($promotion_count_query);
    $total_promotions = $promotion_count_result['total'];
    ?>
    <div class="booking-count">
        <h3><?php echo $total_promotions; ?></h3>
    </div>
    <a href="message.php" class="btn">See Message</a>
</div>

<div class="box">
    <h3>TOTAL CUSTOMER!</h3>
    <?php
    $promotion_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM customer");
    $promotion_count_result = mysqli_fetch_assoc($promotion_count_query);
    $total_promotions = $promotion_count_result['total'];
    ?>
    <div class="booking-count">
        <h3><?php echo $total_promotions; ?></h3>
    </div>
    
</div>


   

   

   </div>

</section>

<script src="../js/admin_script.js"></script>

</body>
</html>