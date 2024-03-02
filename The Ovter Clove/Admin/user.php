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
   <title>Register Admin</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
   include 'config.php';
   include_once 'navbar.php';

   
   if(isset($_POST['register_admin'])) {
      $admin_name = $_POST['admin_name'];
      $admin_email = $_POST['admin_email'];
      $admin_password = $_POST['admin_password'];
      $user_type = $_POST['user_type'];

      $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

      $insert = "INSERT INTO admin(name, email, password, type) VALUES('$admin_name', '$admin_email', '$hashed_password', '$user_type')";
      $result = mysqli_query($conn, $insert);

      if($result) {
         $message = 'New admin registered successfully.';
      } else {
         $message = 'Could not register admin. Error: ' . mysqli_error($conn);
      }
   }

  
   if(isset($_POST['delete_user'])) {
      $user_id = $_POST['user_id'];

      $delete = "DELETE FROM admin WHERE id = '$user_id'";
      $result = mysqli_query($conn, $delete);

      if($result) {
         $delete_message = 'User deleted successfully.';
      } else {
         $delete_message = 'Could not delete user. Error: ' . mysqli_error($conn);
      }
   }

  
   $query = "SELECT * FROM admin";
   $result = mysqli_query($conn, $query);
?>

<div class="container">

<button id="openModalBtn" class="btn" style="margin-top: 20px;">Add New User</button>
<div id="myModal" class="modal">
      <span id="closeModalBtn" class="btn">&times;</span>
      <div class="admin-product-form-container">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <h3>Register a New Admin</h3>
         <?php if(isset($message)) { echo '<p class="message">' . $message . '</p>'; } ?>
         <input type="text" placeholder="Enter Admin Name" name="admin_name" class="box" required>
         <input type="email" placeholder="Enter Admin Email" name="admin_email" class="box" required>
         <input type="password" placeholder="Enter Admin Password" name="admin_password" class="box" required>
         <select name="user_type" class="box">
            <option value="admin">Admin</option>
            <option value="super_admin">Super Admin</option>
         </select>
         <input type="submit" class="btn" name="register_admin" value="Register Admin">
      </form>
      </div>
   </div>

     
      <h1>Registered Admins</h1>
      <div class="product-display">
         <table class="product-display-table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Type</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                  <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['email']; ?></td>
                     <td><?php echo $row['type']; ?></td>
                     <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                           <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                           <button type="submit" class="btn" name="delete_user">Delete</button>
                        </form>
                     </td>
                  </tr>
               <?php endwhile; ?>
            </tbody>
         </table>
      </div>

      <?php if(isset($delete_message)) { echo '<p class="message">' . $delete_message . '</p>'; } ?>
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
