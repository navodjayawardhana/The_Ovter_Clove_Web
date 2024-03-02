<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navigation Bar with Search Box</title>

    <link rel="stylesheet" href="style.css" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="script.js" defer></script>
  </head>
  <body>
    <?php
      

      if (isset($_SESSION['admin_name'])) {
        $user_type = $_SESSION['admin_type'];
    ?>
      <nav class="nav">
        <i class="uil uil-bars navOpenBtn"></i>

        <a href="" class="logo">Welcome, <?php echo $_SESSION['admin_name']; ?>!</a>

        <ul class="nav-links">
          <i class="uil uil-times navCloseBtn"></i>

          <h1><li><a href="dashboard.php">DASHBOARD</a></li></h1>
          <h1><li><a href="product.php">PRODUCT</a></li></h1>
          <h1><li><a href="user.php">USER</a></li></h1>
          <h1><li><a href="promotion.php">PROMOTION</a></li></h1>
          <h1><li><a href="chef.php">CHEF</a></li></h1>

          <?php
            if ($user_type === 'super_admin') {
          ?>
            <h1><li><a href="order.php">ORDERS</a></li></h1>
          <?php
            }
          ?>

          <h1><li><a href="booking.php">BOOKING</a></li></h1>
          <h1><li><a href="service.php">SERVICE</a></li></h1>
          <h1><li><a href="message.php">MESSAGE</a></li></h1>
          <h1><li><a href="login.php">LOGOUT</a></li></h1>
        </ul>
        <i id="searchIcon"></i>
      </nav>
    <?php
      } else {
    ?>
      <nav class="nav">
        <i class="uil uil-bars navOpenBtn"></i>
        <h1><li><a href="login.php">LOGIN</a></li></h1>
        <i id="searchIcon"></i>
      </nav>
    <?php
      }
    ?>
  </body>
</html>