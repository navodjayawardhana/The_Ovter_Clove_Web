<?php
include 'config.php';


if (isset($_POST['login'])) {
    $customer_email = mysqli_real_escape_string($conn, $_POST['email']);
    $customer_password = mysqli_real_escape_string($conn, $_POST['pass']);

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
            $login_message = 'Invalid email or password';
        }
    } else {
        $login_message = 'Invalid email or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
</head>

<body>


   <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <a href="home.php" class="navbar-brand p-0">
                <h1 style="color: #A1000E;"><i><img src="img/logo (5).png" alt="Logo"></i>Outer Clove </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="home.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="home.php#service" class="nav-item nav-link">Service</a>
                    <a href="menu.php" class="nav-item nav-link">Order</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="bokking.php" class="dropdown-item">Booking</a>
                            <a href="chef.php" class="dropdown-item">Our Team</a>
                            <a href="menuview.php" class="dropdown-item">Our Menu</a>
                            <a href="home.php#rate" class="dropdown-item">Rate</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <?php
                    if (isset($_SESSION['customer_name'])) {
                        echo '<span class="nav-item nav-link">Welcome, ' . $_SESSION['customer_name'] . '</span>';
                        echo '<a href="logout.php" class="nav-item nav-link">Logout</a>';
                        echo '<a href="viewcart.php" class="nav-item nav-link">Cart</a>';

                    } else {
                        echo '<a href="login.php" class="nav-item nav-link">LogIn</a>';
                    }
                    ?>
                </div>
                <a href="bokking.php" class="btn btn-primary py-2 px-4">Book A Table</a>
            </div>
        </nav>
    </div>

</body>
</html>