<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header1.php'; ?>

<div class="container-xxl pt-5 pb-5" >
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="margin-top: 100px;">
            <h1 class="mb-5 mt-5">Order Confirmation</h1>
            <p>Your order has been successfully placed. Thank you for shopping with us!</p>
            <?php include 'feedbackform.php'; ?>
        </div>
    </div>
</div>

<?php 
include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
