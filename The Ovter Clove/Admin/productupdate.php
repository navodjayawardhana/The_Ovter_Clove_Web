<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Product</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
   include 'config.php';
   include_once 'navbar.php';
   if (isset($_GET['edit'])) {
      $edit_id = $_GET['edit'];
      $select_product = mysqli_query($conn, "SELECT * FROM product WHERE id = $edit_id");
      $row_product = mysqli_fetch_assoc($select_product);

      if ($row_product) {
       
         ?>

         <div class="container">
            <div class="admin-product-form-container">
               <form action="<?php echo $_SERVER['PHP_SELF'] . '?edit=' . $edit_id; ?>" method="post" enctype="multipart/form-data">
                  <h3>Edit Product</h3>
                  <input type="text" placeholder="enter product name" name="product_name" class="box" value="<?php echo $row_product['name']; ?>">
                  <input type="number" placeholder="enter product price" name="product_price" class="box" value="<?php echo $row_product['price']; ?>">
                  <select name="category" class="box">
                        <option value="">Select Category</option>
                        <option value="1" <?php echo ($row_product['category'] == 1) ? 'selected' : ''; ?>>Noodles</option>
                        <option value="2" <?php echo ($row_product['category'] == 2) ? 'selected' : ''; ?>>Pasta</option>
                        <option value="3" <?php echo ($row_product['category'] == 3) ? 'selected' : ''; ?>>Soup</option>
                  </select>
                  <textarea placeholder="Enter Product Description" name="product_description" class="box"><?php echo $row_product['description']; ?></textarea>
                  <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                  <input type="submit" class="btn" name="update_product" value="Update Product">
               </form>
            </div>
         </div>

         <?php
      } else {
         echo 'Product not found.';
      }
   }

 
if (isset($_POST['update_product'])) {
    $updated_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $updated_price = $_POST['product_price'];
    $updated_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $updated_category = $_POST['category'];


    $update_query = "UPDATE product SET name='$updated_name', price='$updated_price', description='$updated_description', category='$updated_category' WHERE id=$edit_id";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo 'Product updated successfully.';
        header('Location: product.php');
        exit();
    } else {
        echo 'Error updating product: ' . mysqli_error($conn);
    }
}

?>

</body>
</html>
