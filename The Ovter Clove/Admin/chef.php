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

   if (isset($_POST['add_chef'])) {
      $chef_name = $_POST['chef_name'];
      $chef_image = $_FILES['chef_image']['name'];
      $chef_image_tmp_name = $_FILES['chef_image']['tmp_name'];
      $chef_image_folder = 'chef_img/' . $chef_image;
      
      if (empty($chef_name) || empty($chef_image) ) {
          $message[] = 'Please fill out all fields.';
      } else {
          $insert = "INSERT INTO chef(name,image) VALUES('$chef_name', '$chef_image')";
          $upload = mysqli_query($conn, $insert);

          if ($upload) {
              move_uploaded_file($chef_image_tmp_name, $chef_image_folder);
              $message[] = 'New product added successfully.';
          } else {
              $message[] = 'Could not add the product. Error: ' . mysqli_error($conn);
          }
      }
   }


   if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      mysqli_query($conn, "DELETE FROM chef WHERE id = $id");
      header('location:chef.php');
   }


   $select = mysqli_query($conn, "SELECT * FROM chef");


?>

<div class="container">

   <button id="openModalBtn" class="btn" style="margin-top: 20px;">Add New Chef</button>

   <div id="myModal" class="modal">
      <span id="closeModalBtn" class="btn">&times;</span>
      <div class="admin-product-form-container">
         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>add a new chef</h3>
            <input type="text" placeholder="enter chef name" name="chef_name" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="chef_image" class="box">
            <input type="submit" class="btn" name="add_chef" value="add chef">
         </form>
      </div>
   </div>


   <div class="product-display">
      <table class="product-display-table">
         <thead>
            <tr>
               <th>ID</th>
               <th>Chef name</th>
               <th>Chef image</th>
               <th>Action</th>
            </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['name']; ?></td>
               <td><img src="chef_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
               <td>
                  <a href="chef.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
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
