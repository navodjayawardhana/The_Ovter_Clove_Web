<?php
include 'header1.php';
include 'config.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['register_admin'])) {
   $customer_name = $_POST['name'];
   $customer_email = $_POST['email'];
   $customer_num = $_POST['num'];
   $customer_password = $_POST['password'];

   $hashed_password = password_hash($customer_password, PASSWORD_DEFAULT);

   $insert = "INSERT INTO customer(name, email,num, password) VALUES('$customer_name', '$customer_email','$customer_num',  '$hashed_password')";
   $result = mysqli_query($conn, $insert);

   if($result) {
      $message = 'New customer registered successfully.';
   } else {
      $message = 'Could not register customer. Error: ' . mysqli_error($conn);
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style2.css">

</head>
<body>
   <?php
   
   ?>


<section class="form-container">

<form class="mb-5 mt-7" action="" method="post">
    <h3 >register now</h3>
    <input type="text" name="name" required placeholder="enter your name" class="box" maxlength="50">
    <input type="email" name="email" required placeholder="enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
    <input type="number" name="num" required placeholder="enter your number" class="box" min="0" max="9999999999" maxlength="10">
    <input type="password" name="password" required placeholder="enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
    <input type="password" name="cpass" required placeholder="confirm your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
    <input style="background-color: #A1000E; color:white;" type="submit" value="register now" name="register_admin" class="btn">
    <p>already have an account? <a href="login.php">login now</a></p>
</form>


</section>

<script src="js/script.js"></script>

</body>
</html>