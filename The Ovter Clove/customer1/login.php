<?php
session_start(); 
include 'config.php';

if (isset($_POST['login'])) {
    $customer_email = $_POST['email'];
    $customer_password = $_POST['pass'];

    $query = "SELECT * FROM customer WHERE email = '$customer_email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($customer_password, $row['password'])) {
            $_SESSION['customer_id'] = $row['id'];
            $_SESSION['customer_name'] = $row['name'];

       
            header('Location: home.php');
            exit();
        } else {
            $login_message = 'Invalid password';
        }
    } else {
        $login_message = 'Invalid email address';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>

    <section class="form-container">
        <form action="" method="post">
            <h3>Login Now</h3>
            <input type="email" name="email" required placeholder="Enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="pass" required placeholder="Enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
            <input style="background-color: #A1000E; color:white; margin-top: 50px;" type="submit" value="Login Now" name="login" class="btn">
            <p>Don't have an account? <a href="register.php">Register Now</a></p>
        </form>
    </section>

    <script src="js/script.js"></script>

</body>

</html>
