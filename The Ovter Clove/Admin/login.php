<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
   include 'config.php';
   
   if(isset($_POST['login'])) {
      $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
      $admin_password = $_POST['admin_password'];

      $query = "SELECT * FROM admin WHERE email = ?";
      $stmt = mysqli_prepare($conn, $query);
      
      mysqli_stmt_bind_param($stmt, 's', $admin_email);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      if($result && mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);

         if(password_verify($admin_password, $row['password'])) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_type'] = $row['type'];
            header('Location: dashboard.php'); 
            exit();
         } else {
            $login_message = 'Invalid password';
         }
      } else {
         $login_message = 'Invalid email address';
      }
   }
?>

<div class="container">
   <div class="admin-product-form-container">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <h3>Login</h3>
         <h4>Email-navodthishan@gmail.com</h4>
         <h4>Login-1234</h4>
         <?php if(isset($login_message)) { echo '<p class="message">' . $login_message . '</p>'; } ?>
         <input type="email" placeholder="Enter Admin Email" name="admin_email" class="box" required>
         <input type="password" placeholder="Enter Admin Password" name="admin_password" class="box" required>
         <input type="submit" class="btn" name="login" value="Login">
      </form>
   </div>
</div>

</body>
</html>
