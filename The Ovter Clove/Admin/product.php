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
   <title>admin page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="style.css">

</head>

<body>

<?php
   @include 'config.php';
   include_once 'navbar.php';

   if (isset($_POST['add_product'])) {
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_description = $_POST['product_description'];
      $product_category = $_POST['category']; 
      $product_image = $_FILES['product_image']['name'];
      $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
      $product_image_folder = 'uploaded_img/' . $product_image;

      if (empty($product_name) || empty($product_price) || empty($product_image) || empty($product_description) || empty($product_category)) {
          $message[] = 'Please fill out all fields.';
      } else {
          $insert = "INSERT INTO product(name, price, description, category, image) VALUES('$product_name', '$product_price', '$product_description', '$product_category', '$product_image')";
          $upload = mysqli_query($conn, $insert);

          if ($upload) {
              move_uploaded_file($product_image_tmp_name, $product_image_folder);
              $message[] = 'New product added successfully.';
          } else {
              $message[] = 'Could not add the product. Error: ' . mysqli_error($conn);
          }
      }
   }


   if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      mysqli_query($conn, "DELETE FROM product WHERE id = $id");
      header('location:product.php');
   }


   $select = mysqli_query($conn, "SELECT * FROM product");

   
   if (isset($_POST['filter_products'])) {
      $filter_category = $_POST['filter_category'];
      $search = $_POST['search'];

      $filter_query = "SELECT * FROM product WHERE 1=1";

      if (!empty($filter_category)) {
         $filter_query .= " AND category = '$filter_category'";
      }

      if (!empty($search)) {
         $filter_query .= " AND name LIKE '%$search%'";
      }


      $select = mysqli_query($conn, $filter_query);
   }
?>

<div class="container">

   <button id="openModalBtn" class="btn">Add New Product</button>

   <div id="myModal" class="modal">
      <span id="closeModalBtn" class="btn">&times;</span>
      <div class="admin-product-form-container">
         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3 style="margin-top: 70px;">add a new product</h3>
            <input type="text" placeholder="enter product name" name="product_name" class="box">
            <input type="number" placeholder="enter product price" name="product_price" class="box">
            <select name="category" class="box">
                  <option value="">Select Category</option>
                  <option value="1">Noodles</option>
                  <option value="2">Pasta</option>
                  <option value="3">Soup</option>
            </select>
            <textarea placeholder="Enter Product Description" name="product_description" class="box"></textarea>
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
            <input type="submit" class="btn" name="add_product" value="add product">
         </form>
      </div>
   </div>

   <div class="admin-product-form-container">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Search and Filter Products</h3>
         <input type="text" placeholder="Search by product name" name="search" class="box">
         <select name="filter_category" class="box">
            <option value="">Filter by Category</option>
            <option value="1">Noodles</option>
            <option value="2">Pasta</option>
            <option value="3">Soup</option>
         </select>
         <input type="submit" class="btn" name="filter_products" value="Filter">
      </form>
   </div>

   <div class="product-display">
      <table class="product-display-table">
         <thead>
            <tr>
               <th>ID</th>
               <th>product image</th>
               <th>product name</th>
               <th>Product Description</th>
               <th>Category</th>
               <th>product price</th>
               <th>action</th>
            </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
               <td><?php echo $row['name']; ?></td>
               <td><?php echo $row['description']; ?></td>
               <td><?php echo $row['category']; ?></td>
               <td>RS:<?php echo $row['price']; ?>/=</td>
               <td>
                  <a href="productupdate.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                  <a href="product.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>


               </td>
            </tr>
         <?php } ?>
      </table>
   </div>
</div>

<script>
   var modal = document.getElementById('myModal');
   var openBtn = document.getElementById('openModalBtn');
   var closeBtn = document.getElementById('closeModalBtn');
   openBtn.onclick = function() {
      modal.style.display = 'block';
   }
   closeBtn.onclick = function() {
      modal.style.display = 'none';
   }
   window.onclick = function(event) {
      if (event.target == modal) {
         modal.style.display = 'none';
      }
   }

   
</script>
</body>
</html>
