<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>

    <?php
    include 'header1.php';
    ?>

    <?php
    include 'config.php';

    $cartQuery = "SELECT cart.product_id, product.name, product.price, cart.quantity
                  FROM cart
                  INNER JOIN product ON cart.product_id = product.id
                  WHERE cart.user_id = 1";

    $cartResult = mysqli_query($conn, $cartQuery);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["updateQuantity"])) {
            $updateProductId = $_POST["productId"];
            $newQuantity = $_POST["quantity"];
    
            $updateQuery = "UPDATE cart SET quantity = $newQuantity WHERE user_id = 1 AND product_id = $updateProductId";
            $updateResult = mysqli_query($conn, $updateQuery);
    
            if ($updateResult) {
                header("Location: {$_SERVER['PHP_SELF']}");
                exit();
            }
        }
    } 


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteFromCart"])) {
        $deleteProductId = $_POST["productId"];

        $deleteQuery = "DELETE FROM cart WHERE user_id = 1 AND product_id = $deleteProductId";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        }
    }
    ?>

    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5 " style="margin-top: 70px;">Your Cart</h1>
            </div>
            <div class="row g-4">
                <?php
                $totalSum = 0;
                if ($cartResult && mysqli_num_rows($cartResult) > 0) {
                    while ($cartItem = mysqli_fetch_assoc($cartResult)) {
                        $itemTotal = $cartItem['price'] * $cartItem['quantity'];
                        $totalSum += $itemTotal;
                ?>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item text-center rounded overflow-hidden">
                                <h6 class="mb-0"><?php echo $cartItem['name']; ?></h6>
                                <p>Price: RS<?php echo $cartItem['price']; ?>/=</p>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="productId" value="<?php echo $cartItem['product_id']; ?>">
                                    <p>Quantity:
                                        <input type="number" name="quantity" value="<?php echo $cartItem['quantity']; ?>" min="1">
                                        <button type="submit" name="updateQuantity" class="btn btn-primary">Update</button>
                                    </p>
                                </form>
                                <p>Item Total: RS<?php echo $itemTotal; ?>/=</p>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="productId" value="<?php echo $cartItem['product_id']; ?>">
                                    <button type="submit" name="deleteFromCart" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="col-12 text-center"><p>Your cart is empty.</p></div>';
                }
                ?>
            </div>
            <div class="text-center mt-4">
                <h4>Total Sum: RS<?php echo $totalSum; ?>/=</h4>
                <div class="col-12 text-center">
                    <form method="post" action="checkout.php">
                        <button type="submit" name="checkout" class="btn btn-primary">Checkout</button>
                    </form>
                    <form method="post" action="menu.php">
                        <button type="submit" name="addmore" class="btn btn-primary" style="background-color: forestgreen;">ADD MORE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    </script>

</body>

</html>
