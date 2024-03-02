<?php
include 'header1.php';
?>

<?php
include 'config.php';


$query = "SELECT id, name, image, description, price FROM product ";
$result = mysqli_query($conn, $query);
?>

<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5 " style="margin-top: 100px;">Our Menu</h1>
        </div>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $productId = $row['id'];
                $productName = $row['name'];
                $productImage = $row['image'];
                $productPrice = $row['price'];
                $productdescription = $row['description'];


                if ($count % 2 == 0) {
                    echo '<div class="row g-4">';
                }
        ?>

                <div class="col-lg-6">
                    <div class="d-flex align-items-center">
                        <div class="rounded overflow-hidden m-4">
                            <img class="flex-shrink-0 img-fluid rounded" src="../Admin/uploaded_img/<?php echo $productImage; ?>" style="width: 80px;" alt="">
                        </div>
                        <div class="w-100 d-flex flex-column text-start ps-4">
                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                <span><h6 class="mb-0"><?php echo $productName; ?></h6></span>
                                <span class="text-primary"><h4 style="color: #A1000E;" class="mb-0">RS:<?php echo $productPrice; ?>/=</h4></span>
                            </h5>
                            <small class="fst-italic"><p class="mb-0"><?php echo $productdescription; ?></p></small>
                        </div>
                    </div>
                </div>

        <?php
     
                if ($count % 2 == 1) {
                    echo '</div>';
                }

                $count++;
            }

          
            if ($count % 2 == 1) {
                echo '</div>';
            }
        } else {
            echo '<div class="col-12 text-center"><p>No items found.</p></div>';
        }
        ?>
    </div>
</div>

<?php
include 'footer.php';
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>
