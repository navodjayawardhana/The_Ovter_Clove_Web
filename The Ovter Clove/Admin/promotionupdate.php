<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

?>

<?php
include 'config.php';
include 'navbar.php';

if (isset($_GET['edit'])) {
    $promotion_id = $_GET['edit'];
    $select_promotion = mysqli_query($conn, "SELECT * FROM promotion WHERE id = $promotion_id");

    if ($row_promotion = mysqli_fetch_assoc($select_promotion)) {
        $promotion_name = $row_promotion['name'];
        $promotion_image = $row_promotion['image'];

        if (isset($_POST['update_promotion'])) {
            $new_promotion_name = $_POST['new_promotion_name'];
            $new_promotion_image = $_FILES['new_promotion_image']['name'];
            $new_promotion_image_tmp_name = $_FILES['new_promotion_image']['tmp_name'];

            if (empty($new_promotion_name)) {
                $message[] = 'Please fill out the new promotion name.';
            } else {
             
                if (!empty($promotion_image)) {
                    unlink('uploaded_promotions/' . $promotion_image);
                }

                
                $new_promotion_image = strtolower(str_replace(' ', '_', $new_promotion_name)) . '.jpg';
                $new_promotion_image_folder = 'uploaded_promotions/' . $new_promotion_image;

                $update_promotion = "UPDATE promotion SET name='$new_promotion_name', image='$new_promotion_image' WHERE id=$promotion_id";

                $result = mysqli_query($conn, $update_promotion);

                if ($result) {
                    move_uploaded_file($new_promotion_image_tmp_name, $new_promotion_image_folder);
                    $message[] = 'Promotion updated successfully.';
                    header('location: promotion.php');
                } else {
                    $message[] = 'Could not update the promotion. Error: ' . mysqli_error($conn);
                }
            }
        }
    } else {
        $message[] = 'Promotion not found.';
    }
} else {
    $message[] = 'Invalid promotion ID.';
}
?>

<div class="container">
    <?php
    if (!empty($message)) {
        foreach ($message as $msg) {
            echo "<p>$msg</p>";
        }
    }
    ?>

    <div class="admin-product-form-container">
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?edit=' . $promotion_id; ?>" method="post" enctype="multipart/form-data">
            <h3>Edit Promotion</h3>
            <label for="new_promotion_name">New Promotion Name:</label>
            <input type="text" id="new_promotion_name" name="new_promotion_name" value="<?php echo $promotion_name; ?>" class="box">
            <label for="new_promotion_image">New Promotion Image:</label>
            <input type="file" accept="image/png, image/jpeg, image/jpg" id="new_promotion_image" name="new_promotion_image" class="box">
            <input type="submit" class="btn" name="update_promotion" value="Update Promotion">
        </form>
    </div>
</div>
</body>
</html>
