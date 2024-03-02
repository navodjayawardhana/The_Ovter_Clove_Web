<?php
include 'header1.php';
?>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addToCart"])) {
    $productId = $_POST["productId"];
    $quantity = 1;

    $insertQuery = "INSERT INTO cart (product_id, quantity, user_id) VALUES ($productId, $quantity, 1)";
    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo '<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="successModalLabel">Success</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Product added to the cart successfully!Log  and View Cart
                        </div>
                        <div class="modal-footer">
                            <a href="login.php" class="btn btn-primary">Log In</a>
                        </div>
                        <div class="modal-body">
                            Also Log in close!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>';
    }
}

$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
$whereClause = '';

switch ($filter) {
    case 'noodles':
        $whereClause = "WHERE category = '1'";
        break;
    case 'pasta':
        $whereClause = "WHERE category = '2'";
        break;
    case 'soup':
        $whereClause = "WHERE category = '3'";
        break;
}

if (!empty($searchTerm)) {
    $whereClause .= " AND name LIKE '%$searchTerm%'";
}

$query = "SELECT id, name, image, price FROM product $whereClause";
$result = mysqli_query($conn, $query);
?>

<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5 " style="margin-top: 100px;">Order Here</h1>
        </div>
        <div class="mb-3">
            <form method="post" action="menu.php">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search by name" name="search">
                    <button type="submit" class="btn btn-outline-secondary" type="button">Search</button>
                </div>
                <button type="submit" name="filter" value="noodles" class="btn btn-primary">Noodles</button>
                <button type="submit" name="filter" value="pasta" class="btn btn-primary">Pasta</button>
                <button type="submit" name="filter" value="soup" class="btn btn-primary">Soup</button>
                <button type="submit" name="filter" value="" class="btn btn-primary">Show All</button>
            </form>
        </div>
        <div class="row g-4">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $productId = $row['id'];
                    $productName = $row['name'];
                    $productImage = $row['image'];
                    $productPrice = $row['price'];
            ?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded overflow-hidden m-4">
                                <img class="img-fluid" src="../Admin/uploaded_img/<?php echo $row['image']; ?>" height="100" alt="">
                            </div>
                            <h6 class="mb-0"><?php echo $productName; ?></h6>
                            <h4 style="color: #A1000E;" class="mb-0">RS:<?php echo $productPrice; ?>/=</h4>
                            <div class="d-flex justify-content-center mt-3">
                                <form method="post" action="menu.php">
                                    <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                                    <button type="submit" name="addToCart" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<div class="col-12 text-center"><p>No items found.</p></div>';
            }
            ?>
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
