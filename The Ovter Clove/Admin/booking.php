<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

?>

<?php
include 'navbar.php';
include 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

 

    $selectBookings = mysqli_query($conn, "SELECT * FROM bookings 
                                           WHERE DATE(datetime) BETWEEN '$start_date' AND '$end_date'");
} else {
   
    $selectBookings = mysqli_query($conn, "SELECT * FROM bookings");
}


if (isset($_GET['delete_booking_id'])) {
    $deleteBookingId = $_GET['delete_booking_id'];


    $deleteBooking = mysqli_query($conn, "DELETE FROM bookings WHERE id = $deleteBookingId");

    if ($deleteBooking) {

        header("Location: booking.php");
        exit();
    } else {
  
        echo "Error deleting booking: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="product-display">

    <table class="product-display-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date & Time</th>
                <th>No Of People</th>
                <th>Special Request</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php while ($booking = mysqli_fetch_assoc($selectBookings)) { ?>
            <tr>
                <td><?php echo $booking['id']; ?></td>
                <td><?php echo $booking['name']; ?></td>
                <td><?php echo $booking['email']; ?></td>
                <td><?php echo $booking['datetime']; ?></td>
                <td><?php echo $booking['people']; ?></td>
                <td><?php echo $booking['special_request']; ?></td>
                <td>
 
                    <a href="?delete_booking_id=<?php echo $booking['id']; ?>" class="btn">Confirm</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
